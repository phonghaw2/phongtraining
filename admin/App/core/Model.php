<?php 
class Model extends Database 
{
    protected $db;
    
    function __construct(){
        
        $db = new Database();
    }
}

?>