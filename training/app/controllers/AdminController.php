<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class AdminController extends Controller
{

    public $data =[] ;
    /**
     * Show the Dashboard page
     * $title  for title tag
     * $content  for @yield('content')
     * @return void
     */
    public function dashboardAction()
    {
        $this->data['title'] = 'Dashboard';
        $this->data['content'] = 'admin/test';
        View::render('layouts/master.php',$this->data);
    }

    public function indexAction()
    {
        echo 111;
    }


    public function userListAction()
    {
        $search = '';
        $page = 1;
        if(isset($_GET['search'])){
            $search = $_GET['search'];
   
        }
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            
        } 
        $number_of =  User::getPage($search);
        var_dump($number_of);
        $number_per_page = 3;

        $pages = ceil($number_of / $number_per_page);
        $skip = $number_per_page * ($page - 1 );

        $this->data['users'] = User::getAll($number_per_page, $skip , $search);
        $this->data['title'] = 'All Users';
        $this->data['pages'] = $pages;
        View::render('admin/user/userlist.php',$this->data);
    }
}
