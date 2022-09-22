<?php
class Controller{

    public function model($model){
        require_once "./App/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        extract($data);
        require_once "./App/views/".$view.".php";
    }

}
?>