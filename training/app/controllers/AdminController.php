<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;
use Core\Http\Request;

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
        $this->data['content'] = 'admin/dashboard';
        View::render('layouts/master.php',$this->data);
    }

    public function testAction()
    {
        $request = new Request();
        $data = $request->getGet();
        // $reflection = new Request($data);
        // $result = $reflection->getGet();
        
        // function getProtectedValue($obj, $name) {
        //     $array = (array)$obj;
        //     $prefix = chr(0).'*'.chr(0);
        //     return $array[$prefix.$name];
        //   }
        // echo $object_decoded;
        // $data = User::test();
        // $phong = getProtectedValue($data, 'container');
        echo '<pre>';
        print_r($data['name']);
        echo '</pre>';
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
        $number_per_page = 3;

        $pages = ceil($number_of / $number_per_page);
        $skip = $number_per_page * ($page - 1 );

        $this->data['users'] = User::getAll($number_per_page, $skip , $search);
        $this->data['title'] = 'All Users';
        $this->data['pages'] = $pages;
        View::render('admin/user/userlist.php',$this->data);
    }
}
