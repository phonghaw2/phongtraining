<?php

class Admin extends Controller{

    public $data =[] ;
 
    function dashboard(){
        if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
            $this->view("dashboard");
            
        }else {
            header('location:../auth/login');
            exit;
        }

    }

    function post(){
        $this->view("post/index");

    }

    function userlist(){
        $UserModel = $this->model("UserModel");
        $search = '';
        $page = 1;
        if(isset($_GET['search'])){
            $search = $_GET['search'];
   
        }
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            
        } 
        $number_of =  $UserModel->getPage($search);

        $number_per_page = 3;

        $pages = ceil($number_of / $number_per_page);
        $skip = $number_per_page * ($page - 1 );
        
        $this->data['users'] = $UserModel->getUser($number_per_page, $skip , $search);
        $this->data['pages'] = $pages;
        $this->view("user/userlist", $this->data);

    }

    function addUser(){
        $this->view("user/addUser");
    }


    function addUserAction(){
        $fullname = addslashes($_POST['fullname']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $role = addslashes($_POST['role']);
        

        $UserModel = $this->model("UserModel");
        $UserModel->create($fullname, $email, $password ,$role);
    }

    function updateUser(){
        $fullname = addslashes($_POST['fullname']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $role = addslashes($_POST['role']);

        $UserModel = $this->model("UserModel");
        $UserModel->update($fullname, $password ,$role ,$email);

        $result = [
            'success' => true,
            'data' => [],
            'message' => 'Updated successfully',
        ];
        // return json_encode($result);
        echo json_encode($result);
    }

    function createNewPost(){
        $this->view("post/createNewPost");
    }

    

    function export(){
        $action = $this->model("UserModel");
        $action->export();
    }

    public function importData(){
        $action = $this->model("UserModel");
        $action->importData();
    }

    public function detail($id){
        $ma = $_GET["ma"];
        echo 'id san pham bang :'. $id;
        echo 'ma san pham bang :'. $ma;
    }

    public function deleteUser(){
        try {
            $id = $_GET["id"];

            $UserModel = $this->model("UserModel");
            $UserModel->delete($id);
    
            $successResponese = [
                'success' => true,
                'data' => [],
                'message' => 'Delete successfully',
            ];
            echo json_encode($successResponese);
        } catch (\Throwable $th) {
            $errorsResponese = [
                'success' => false,
                'data' => [],
                'message' => 'Action false',
            ];
            echo json_encode($errorsResponese, 400);
        }
       
        

    }

    

}
?>