<?php

namespace App\Models;

use Core\Model;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll($number_per_page, $skip , $search)
    {
        $db = static::getDB();

        $stmt = $db->query("SELECT * FROM user 
        where 
        name like '%$search%' OR  email like '%$search%'
        limit $number_per_page offset $skip");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPage($search)
    {
        $db = static::getDB();

        $count = $db->query("SELECT count(*) FROM user  WHERE 
        name LIKE '%$search%' OR  email LIKE '%$search%' ");

        $count->fetchAll(PDO::FETCH_ASSOC);

        var_dump($count);
        $number_of = $count['count(*)'];

        return $number_of;
    }
}
