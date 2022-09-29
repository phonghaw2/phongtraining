<?php

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();
$request = new Core\Http\Request();

// Add the routes
$router->add('', ['controller' => 'Default', 'action' => 'index']);
$router->add('{controller}/{action}');
/**
 * Group Admin routes
 */

// $router->add('/admin', ['controller' => 'Admin', 'action' => 'dashboard']);
// $router->add('{controller}/{action}');

// // Login routes
// $router->add('/admin/login', ['controller' => 'Auth', 'action' => 'login']);
// $router->add('{controller}/{action}');

// // Register routes
// $router->add('/admin/register', ['controller' => 'Auth', 'action' => 'register']);
// $router->add('{controller}/{action}');
    

    
$router->dispatch($request);