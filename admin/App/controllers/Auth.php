<?php

// http://localhost

class Auth extends Controller{

    function register(){
        // $teo = $this->model("AdminMOdel");
        $this->view("register");

    }

    function login(){
        // $teo = $this->model("AdminMOdel");
        $this->view("login");

    }

    function registerAction(){
        $fullname = addslashes($_POST['fullname']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        $role = 'admin';
        $UserModel = $this->model("UserModel");
        $UserModel->create($fullname, $email, $password ,$role);
    }

    function loginAction(){
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        $UserModel = $this->model("UserModel");
        $UserModel->loginProcess($email, $password);
    }

    function logout(){
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['fullname']);
        unset($_SESSION['role']);
        setcookie('remember',null,-1);

        header('location:../auth/login');

    }
   
}
?>