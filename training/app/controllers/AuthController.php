<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class AuthController extends Controller
{
  
     /**
     * Show the register page
     */
    function register()
    {
        View::render('admin/register.php');
    }
     /**
     * Show the register page
     */
    function login()
    {
        View::render('admin/login.php');
    }
}
