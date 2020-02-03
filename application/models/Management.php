<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 3:17 PM
 */

require_once __DIR__."/../utilities/Database.php";
require_once __DIR__."/../utilities/Constants.php";

class Management
{
    function checkEmail($email)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query ="select * from management where `email` = '$email'";

        $result = $con->query($query);

        if($result->num_rows > 0)
            return true;
        return false;
    }

    function canLogin($email,$password)
    {
        $db = new Database();
        $con =$db->open_connection();

        $query = "select * from management where `email` = '$email' and `password` = '$password' and `is_active` = 1";

        $result = $con->query($query);

        if($result->num_rows > 0)
            return true;
        return false;
    }

    function updatePassword($email,$password)
    {
        $db = new Database();
        $con =$db->open_connection();
        $query = "update management set `password` = '$password' where `email` = '$email'";
        return $con->query($query);
    }

    function addManagement($initial,$firstName,$lastName,$email,$phone)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query="insert into management values (NULL,'$initial','$firstName','$lastName','$email','".Constants::defaultPassword."','$phone',NULL,NULL,1)";

        return $con->query($query);
    }
}