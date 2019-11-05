<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 7:29 PM
 */

class Database
{
    public function open_connection()
    {
        $host="localhost";
        $user="root";
        $pass="";
        $database="pbsa";
        return mysqli_connect($host,$user,$pass,$database);
    }

    public function close_connection()
    {
        return null;
    }
}