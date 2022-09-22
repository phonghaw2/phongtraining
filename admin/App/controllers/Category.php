<?php

class Category extends Controller{

    public $data =[] ;

    function index(){
        $Category = $this->model("CategoryModel");
        $this->data['categories'] = $Category->getCategory();
        $this->view('category/index',$this->data);
    }

    
}
?>