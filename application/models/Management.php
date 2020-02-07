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

        $query ="select * from management where `email` = '$email' and `is_active` = 1";

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

    function checkPassword($email,$hashedpassword)//to check old password
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from management where email='$email' and password='$hashedpassword' and is_active=1 ";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;
    }

    function addManagement($initial,$firstName,$lastName,$email,$phone)
    {
        $db = new Database();
        $con = $db->open_connection();

        $photo = "assets/management/images/a.png";

        $query="insert into management values (NULL,'$initial','$firstName','$lastName','$email','".Constants::defaultPassword."','$phone',$photo,NULL,1)";

        return $con->query($query);
    }

    function getUserDetails($email)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query = "select * from management where `email` = '$email'";

        return $con->query($query);
    }

    function UpdateProfile($initial,$firstName,$lastName,$email,$dob,$phone,$photo)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query = "UPDATE `management` SET `initial`='$initial',`first_name`='$firstName',`last_name`='$lastName',`dob`='$dob',`phone`='$phone',`photo` = '$photo' WHERE `email`='$email'";
        return $con->query($query);
    }
}