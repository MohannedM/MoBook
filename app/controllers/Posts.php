<?php

class Posts extends Controller{
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        if(!isLoggedIn()){
            redirect('pages/index');
        }
    }
    public function index(){
        $posts = $this->postModel->getPosts();
        $data = [
            "posts"=>$posts
        ];
        $this->view('posts/index', $data);
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Clean posted inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];

            $data = [
                'user_id'=>$_SESSION['user_id'],
                'title'=>rtrim($_POST['title']),
                'body'=>rtrim($_POST['body']),
                'image'=>$image,
                'title_err'=>'',
                'body_err'=>'',
                'image_err'=>''
            ];
            

            //Validate title
            if(empty($data['title'])){
                $data['title_err'] = "Please enter a title";
            }
            //Validate body
            if(empty($data['body'])){
                $data['body_err'] = "Please enter a body";
            }
            //Validate image
            if($_FILES["image"]["size"] > 500000){
                $data['image_err'] = "Image size is too large to be uploaded";
            }

            //Check if there are no errors
            if(empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])){
                //Move image
                //Validate
                if($this->postModel->addPost($data)){
                    //Move image to images publuic folder, set flash message, and redirect
                    move_uploaded_file($image_tmp, 'images/' . $image);
                    flash("post_message", "Post has been added");
                    redirect('posts/index');
                }else{
                    die("Something went wrong");
                }
            }else{
                //Load view with errors
                $this->view('posts/add', $data);
            }


        }else{
            //Init View with data
            $data = [
                'title'=>'',
                'body'=>'',
                'image'=>'',
                'title_err'=>'',
                'body_err'=>'',
                'image_err'=>''
            ];
            $this->view('posts/add', $data);
        }
    }
    public function show($id = ''){
        if(!empty($id)){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            $data = [
                'post'=>$post,
                'user'=>$user
            ];
            $this->view('posts/show', $data);
        }else{
            redirect('posts/index');
        }
    }
    public function edit($id = ''){
        if(!empty($id)){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                //Clean posted inputs
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
    
                $data = [
                    'id'=>$id,
                    'user_id'=>$_SESSION['user_id'],
                    'title'=>rtrim($_POST['title']),
                    'body'=>rtrim($_POST['body']),
                    'image'=>$image,
                    'title_err'=>'',
                    'body_err'=>'',
                    'image_err'=>''
                ];
                
    
                //Validate title
                if(empty($data['title'])){
                    $data['title_err'] = "Please enter a title";
                }
                //Validate body
                if(empty($data['body'])){
                    $data['body_err'] = "Please enter a body";
                }
                //Validate image
                if($_FILES["image"]["size"] > 500000){
                    $data['image_err'] = "Image size is too large to be uploaded";
                }
    
                //Check if there are no errors
                if(empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])){
                    //Validate
                    if($this->postModel->editPost($data)){
                        //Move image to images publuic folder, set flash message, and redirect
                        if(!empty($data['image'])){
                            move_uploaded_file($image_tmp, 'images/' . $image);
                        }
                        flash("post_message", "Post has been updated");
                        redirect('posts/index');
                    }else{
                        die("Something went wrong");
                    }
                }else{
                    //Load view with errors
                    $this->view('posts/edit', $data);
                }
    
    
            }else{
                //Init View with data
                $post = $this->postModel->getPostById($id);
                $data = [
                    'id'=>$id,
                    'title'=>$post->title,
                    'body'=>$post->body,
                    'image'=>$post->image,
                    'title_err'=>'',
                    'body_err'=>'',
                    'image_err'=>''
                ];
                $this->view('posts/edit', $data);
            }
        }else{
            redirect("posts/index");
        }
    }
    public function delete($id = ''){
        if(!empty($id)){
            if($this->postModel->delete($id)){
                flash('post_message', 'Post has been deleted');
                redirect('posts/index');
            }else{
                die("Something went wrong");
            }
        }else{
            redirect('posts/index');
        }
    }
}