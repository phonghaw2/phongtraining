<?php

class Admin extends Controller{

 
    function dashboard(){
        $this->view("dashboard");

    }

    function userlist(){
        $getUser = $this->model("AdminModel");
        $allUser = $getUser->getUser();
        $this->view("user/userlist",[
            "users" => $allUser,
        ]);

    }

    function addUser(){
        $this->view("user/addUser");
    }

    function createNewPost(){
        $this->view("post/createNewPost");
    }

    function addUserAction(){
        $fullname = addslashes($_POST['fullname']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $role = addslashes($_POST['role']);
        

        $UserModel = $this->model("AdminModel");
        $UserModel->create($fullname, $email, $password ,$role);
    }

    function export(){
        $action = $this->model("AdminModel");
        $action->export();
    }

    function importData(){
        $action = $this->model("AdminModel");
        $action->importData();
    }
}
?>