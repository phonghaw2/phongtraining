<?php
/*
 * Tự động load configs
 *
 * */

$configs_dir = scandir('configs');
if (!empty($configs_dir)){
    foreach ($configs_dir as $item){
        if ($item!='.' && $item!='..' && file_exists('.App/configs/'.$item)){
            require_once '.App/configs/'.$item;
            var_dump($item);
        }
    }
}
// Configs
require_once "./App/configs/routes.php";


// Route
require_once "./App/core/Route.php";



// Process URL from browser
require_once "./App/core/App.php";



// How controllers call Views & Models
require_once "./App/core/Controller.php";

// Connect Database
require_once "./App/core/DB.php";


// QueryBuilder
require_once "./App/core/QueryBuilder.php";
?>