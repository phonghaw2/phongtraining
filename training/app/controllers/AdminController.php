<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class AdminController extends Controller
{

    
    /**
     * Show the Dashboard page
     * $title  for title tag
     * $content  for @yield('content')
     * @return void
     */
    public function dashboard()
    {
        $content  = 'admin/dashboard';
        $title =  'Dashboard';
        View::render('layouts/master.php',[$content, $title]);
    }
}
