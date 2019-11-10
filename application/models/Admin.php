<?php

require_once __DIR__."/../utilities/Database.php";
class Admin
{

    function canLogin($email, $password)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from admin where `email`='$email' and `password`='$password' and `is_active`=1";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;
    }

    function checkEmail($email)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="select * from admin where `email`='$email' and `is_active`=1";
        $result=$con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;
    }

    function updatePassword($email,$password)
    {
        $db = new Database();
        $con =$db->open_connection();
        $query = "update admin set `password` = '$password' where `email` = '$email'";
        $result = $con->query($query);
        return $result;
    }

    function CheckPassword($email,$hashedpassword)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from admin where email='$email' and password='$hashedpassword' and is_active=1";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;
    }

    function adminUpdateProfile($initial,$firstName,$lastName,$email,$dob,$phone,$photo)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="UPDATE `admin` SET `initial`='$initial',`first_name`='$firstName',`last_name`='$lastName',`dob`='$dob',`phone`='$phone',`photo` = '$photo' WHERE email='$email'";
        return $con->query($query);
    }

    function getUserDetails($email)
    {
        $db=new Database();
        $con=$db->open_connection();

        $query = "select * from admin where `email` = '$email' and `is_active` = 1";

        return $con->query($query);
    }


}
?>