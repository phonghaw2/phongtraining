<?php 

class App{

    protected $controller = "Auth";
    protected $action = "register";
    protected $params = [];
    function __construct() {

        $arr = $this->UrlProcess();
        
        // Controller
        if( file_exists("page/mvc/controller/". $arr[0].".php" )) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once("./mvc/controller/". $this->controller.".php");
        $this->controller = new $this->controller;
        
        // Action Controller
        if(isset($arr[1])){
            if( method_exists($this->controller, "register")){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params);

    }
    function UrlProcess()   {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"])));
        }
    
    }
}
?>