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
        }
    }
}
// Configs
// require_once "./App/configs/routes.php";


// Route
require_once "./App/core/Route.php";



// Process URL from browser
require_once "./App/core/App.php";

// //Kiểm tra config và load Database
// if (!empty($config['database'])){
//     $db_config = array_filter($config['database']);

//     if (!empty($db_config)){
//         require_once './App/core/Connection.php';
//         require_once './App/core/Database.php';
//         // require_once 'core/QueryBuilder.php';
//         // require_once 'core/DB.php';
//     }
// }

require_once "./App/core/Model.php";

// How controllers call Views & Models
require_once "./App/core/Controller.php";

// Connect Database
require_once "./App/core/DB.php";
?>