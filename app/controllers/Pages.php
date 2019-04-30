<?php 
class Pages extends Controller{
    public function __construct(){
        if(isLoggedIn()){
            redirect('posts/index');
        }
    }
    public function index(){
        $data = [
            'title'=>'Welcome'
        ];
        $this->view('pages/index', $data);
    }
    public function about(){
        $data = [
            'title'=>'About'
        ];
        $this->view('pages/about', $data);
    }
}
