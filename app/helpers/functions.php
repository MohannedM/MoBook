<?php
session_start();

function redirect($location){
    header("Location: " . URLROOT . '/' . $location);
}

function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(empty($_SESSION[$name]) && !empty($message)){
        $_SESSION[$name] = $message;
        $_SESSION[$name . '_class'] = $class;
    }elseif(!empty($_SESSION[$name]) && empty($message)){
        echo "<div class='$class text-center'>" . $_SESSION[$name] . "</div>";
        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
    }
}
function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}