<?php

namespace App\Models;

use Core\Model;
use PDO;
use Core\QueryBuilder;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends Model
{
    private $_table = 'user';

    use QueryBuilder;

    /**
     * Get all the users as an associative array with pagination
     *
     * @return array
     */
    public static function getAll($number_per_page, $skip , $search)
    {
        $db = static::getDB();

        $stmt = $db->query("SELECT * FROM user 
        WHERE 
        name LIKE '%$search%' OR  email LIKE '%$search%'
        LIMIT $number_per_page OFFSET $skip");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get total page with search parameter
     *
     * @return int
     */
    public static function getPage($search)
    {
        $db = static::getDB();

        $count = $db->query("SELECT count(*) FROM user  WHERE 
        name LIKE '%$search%' OR  email LIKE '%$search%' ");

        $count->fetchAll(PDO::FETCH_ASSOC);

        $number_of = $count['count(*)'];

        return $number_of;
    }

    public static function test(){
        
        $user = new User();
        $data = $user->table('user')->where('name','=','hehe')->get();
        return $data;
    }

    
}
