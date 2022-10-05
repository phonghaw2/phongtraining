<?php

namespace App\Models;

use Core\Model;
use PDO;
use Core\QueryBuilder;

/**
 * Example user model
 *
 */
class Home extends Model
{
    // binding

    use QueryBuilder;

    /**
     * Get all the users as an associative array with pagination
     *
     * @return array
     */
    public static function compare()
    {
        define('BIRD', 'Dodo bird');
        if(isset($_POST['importSubmit'])){

            
                // $ini_array = file("before.inc", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                // print_r($ini_array);



                // ngonnn
                // $fh = fopen("before.inc", 'r');
                // while(($line  = fgets($fh)) !== false) {
                //     echo $line .' </br>';
                // }
                // fclose($fh);
                
                $ary = array(
                    array(
                        'name' => 'img_1', 
                        'width' => 178, 
                        'height' => '', 
                        'exp' => '.jpg'
                    ), 
                    array(
                        'name' => '_1', 
                        'width' => 110, 
                        'height' => '', 
                        'exp' => '.jpg'
                    )
                );
                function setDefineArray($name, $ary) {
                    echo '1';
                    if ($name == "") return;
                    global $$name;
                    if (isset($$name)) return;
                    $temp = array();
                    foreach ($ary as $key => $value) {
                        $temp[$key] = $value;
                    }
                    $$name = $temp;
                    print_r($$name);
                    echo '</br>';
                    return $$name;
                }
                $ar = setDefineArray('IMAGE_TEST_2222', $ary);
                $ary2 = array(
                    array(
                        'name' => '', 
                        'width' => 178, 
                        'height' => '', 
                        'exp' => '.jpg'
                    ), 
                    array(
                        'name' => '_1', 
                        'width' => 110, 
                        'height' => '', 
                        'exp' => '.jpg'
                    )
                );

                $hhe1 = array(
                    'name' => '', 
                    'width' => 178, 
                    'height' => '', 
                    'exp' => '.jpg'
                );
                $hhe2 = array(
                    'name' => '_1', 
                        'width' => 110, 
                        'height' => '3', 
                        'exp' => '.jpg'
                );
                $ar2 = setDefineArray('hege', $ary2);
                
                // $result=array_diff($ar,$ar2);
                // print_r($result);
                
        }
    }

    public function setDefineArray($name, $ary) {
        if ($name == "") return;
        global $$name;
        if (isset($$name)) return;
        $temp = array();
        foreach ($ary as $key => $value) {
            $temp[$key] = $value;
        }
        $$name = $temp;
    }


    
}
