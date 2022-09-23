<?php
class App{

    // private 
    private $controller,$action,$params , $__route;


    function __construct(){
        global $routes, $config;


        
        $this->__route = new Route();
        
        
        $this->controller= $routes['default_controller'];
        $this->action="index";
        $this->params=[];

        
 
        $arr = $this->handleUrl();
 
        // Controller
        if( file_exists("./App/controllers/".ucfirst($arr[0]).".php") ){
            $this->controller = ucfirst($arr[0]);
            unset($arr[0]);
        }
        require_once "./App/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(!empty($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params );

    }

    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }else {
            $url = '/' ;
        }

        return $url;
    }

    function handleUrl(){
        
        $url = $this->getUrl();

        $url = $this->__route -> handleRoute($url);

        return array_values(array_filter(explode('/', $url)));
        
    }
}
?>