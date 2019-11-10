<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 3:17 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Management
{
    function checkEmail($email)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query ="select * from management";

        $result = $con->query($query);

        if($result->num_rows > 0)
            return true;
        return false;

    }

    function addManagement($initial,$firstName,$lastName,$email,$phone,$password)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query="insert into management values (NULL,'$initial','$firstName','$lastName','$email','$password',NULL,'$phone',1)";

        return $con->query($query);
    }
}