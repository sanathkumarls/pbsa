<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 10:40 PM
 */

require_once __DIR__.'/../utilities/Database.php';

class Department
{
    function getDepartments()
    {
        $db=new Database();
        $con=$db->open_connection();

        $query="select * from department where `is_active` = 1";

        $result=$con->query($query);
        return $result;
    }
}