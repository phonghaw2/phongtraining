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
        
    }

    public static function setDefineArray($name, $ary) {
        if ($name == "") return;
        global $$name;
        if (isset($$name)) return;
        $temp = array();
        foreach ($ary as $key => $value) {
            $temp[$key] = $value;
        }
        $$name = $temp;
        return $$name;
    }
    

    
}
