<?php

class Admin extends Controller{

    public $data =[] ;
 
    function dashboard(){
        $this->view("dashboard");

    }

    function userlist(){
        $getUser = $this->model("AdminModel");
        $this->data['users'] = $getUser->getUser();
        $this->view("user/userlist", $this->data);

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

    public function importData(){
        $action = $this->model("AdminModel");
        $action->importData();
    }

    public function detail($id){
        $ma = $_GET["ma"];
        echo 'id san pham bang :'. $id;
        echo 'ma san pham bang :'. $ma;
    }
}
?>