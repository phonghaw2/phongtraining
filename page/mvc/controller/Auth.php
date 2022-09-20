CONTROLLER - AUTH
<?php 

class Auth extends Controller 
{
    public function register(){
        $test = $this->model('UserModel');
        echo $test->register();
        $this->view("register");
        echo " hello phonghaw2";
        
        // require_once "./mvc/views/admin/auth/register-blade.php";
    }

    // public function register_action(){
    //     if( isset($_POST))
        
    //     // require_once "./mvc/views/admin/auth/register-blade.php";
    // }
    

}
?>