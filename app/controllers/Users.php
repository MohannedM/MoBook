<?php

class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
        if(isLoggedIn()){
            redirect('pages/index');
        }
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Clean posted inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'fullname'=>rtrim($_POST['fullname']),
                'email'=>rtrim($_POST['email']),
                'password'=>rtrim($_POST['password']),
                'confirm_password'=>rtrim($_POST['confirm_password']),
                'fullname_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];

            //Validate fullname
            if(empty($data['fullname'])){
                $data['fullname_err'] = "Please enter fullname";
            }
            //Validate email
            if(empty($data['email'])){
                $data['email_err'] = "Please enter email";
            }elseif($this->userModel->getUserByEmail($data['email'])){
                $data['email_err'] = "Email already exists";
            }
            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = "Please enter password";
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = "Password has to be at least 6 characters";
            }
            //Validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = "Please confirm password";
            }elseif($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = "Password don't match";
            }

            //Check if there are no errors
            if(empty($data['fullname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, ['cost'=>12]);
                //Validate
                if($this->userModel->register($data)){
                    //Set flash message and redirect
                    flash("user_registered", "Your account has been created. Please login.");
                    redirect('users/login');
                }else{
                    die("Something went wrong");
                }
            }else{
                //Load view with errors
                $this->view('users/register', $data);
            }


        }else{
            //Init View with data
            $data = [
                'fullname'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'fullname_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>''
            ];
            $this->view('users/register', $data);
        }
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Clean posted inputs
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email'=>rtrim($_POST['email']),
                'password'=>rtrim($_POST['password']),
                'email_err'=>'',
                'password_err'=>'',
            ];

            //Validate email
            if(empty($data['email'])){
                $data['email_err'] = "Please enter email";
            }elseif(!$this->userModel->getUserByEmail($data['email'])){
                $data['email_err'] = "Email doesn't exist";
            }
            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = "Please enter password";
            }elseif(!$this->userModel->verifyPassword($data)){
                $data['password_err'] = "Password is incorrect";
            }


            //Check if there are no errors
            if(empty($data['email_err']) && empty($data['password_err'])){
                //Validate, Set sessions and redirect
                $user = $this->userModel->getUserByEmail($data['email']);
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->fullname;
                $_SESSION['user_email'] = $user->email;
                redirect('posts/index');
            }else{
                //Load view with errors
                $this->view('users/login', $data);
            }


        }else{
            //Init View with data
            $data = [
                'email'=>'',
                'password'=>'',
                'email_err'=>'',
                'password_err'=>''
            ];
            $this->view('users/login', $data);
        }
    }
    public function logout(){
        if(isset($_SESSION['user_id'])){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            session_destroy();
        }
    }
}