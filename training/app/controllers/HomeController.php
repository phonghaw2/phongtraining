<?php

namespace App\Controllers;

use App\Models\Home;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('default/index.php1');
    }

    public function testAction()
    {
        View::render('default/test.php');
    }

    public function compareAction()
    {
        
        if(isset($_POST['importSubmit'])){
            if(is_uploaded_file($_FILES['file1']['tmp_name']) && is_uploaded_file($_FILES['file2']['tmp_name'])){
                echo 'Uploaded file1';
                $fileroot1 = fopen($_FILES['file1']['tmp_name'], 'r');
                $fileroot2 = fopen($_FILES['file2']['tmp_name'], 'r');
    
                $fh1 = fopen("../core/inc/file1.inc", 'r+');
                $fh2 = fopen("../core/inc/file2.inc", 'r+');
                    // var_dump(fgets($fileroot1));
                    
                    $content = file_get_contents('../public/after.inc.php');
                    var_dump($content);
                    // while(($line1  = fgets($fileroot1)) !== false) {
                    //     while(($line2  = fgets($fileroot2)) !== false) {
                    //                 fwrite($fh2, $line2); 
                    //             }
                    //     // fwrite($fh1, 'hehe'); 
                    //     // fwrite($fh1, $line); 
                    // }
            
                fclose($fh1);
                // $fh2 = fopen("../core/inc/file2.inc", 'r+');
                
                //     while(($line  = fgets($fileroot2)) !== false) {
                //         fwrite($fh2, $line); 
                //     }
            
                // fclose($fh2);
               
            }
            
        // Check define in line
            // if(preg_match('/define/', $line)) {

            // }
                
                
                
                

                
                // print_r($ar2);
                // echo '</br>';
                // $result=array_diff($ar,$ar2);
                // print_r($result);

                 // $content = file_get_contents($_FILES['file']['tmp_name']);
                // $filename  = basename($_FILES['file']['name']);
                // $my_save_dir = 'public/';
                // $complete = $my_save_dir . $filename . '.php';
                // // file_put_contents($complete,$content);
                // var_dump(file_put_contents($complete,$content));

                
        }
        
       
    }
}
