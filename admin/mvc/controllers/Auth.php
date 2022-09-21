<?php

// http://localhost/live/Home/Show/1/2

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
        $UserModel = $this->model("AdminModel");
        $UserModel->create($fullname, $email, $password ,$role);
    }

    function loginAction(){
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        $UserModel = $this->model("AdminModel");
        $UserModel->loginProcess($email, $password);
    }

   
}
?>