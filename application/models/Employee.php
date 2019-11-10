<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:04 PM
 */

require_once __DIR__."/../utilities/Database.php";
require_once __DIR__.'/../utilities/Constants.php';


class Employee
{
        function register($emp_id,$first_name,$last_name,$email,$phone,$department,$role)
        {
            $db = new Database();
            $con = $db->open_connection();

            $query = "insert into employee values (NULL,'$emp_id','$role','$department',NULL,'$first_name','$last_name','$email','".Constants::defaultPassword."','$phone',NULL,NULL,0,0,1)";
            $result = $con->query($query);
            return $result;
        }


        function checkEmail($email)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select * from employee where `email`='$email'";

            $result = $con->query($query);

            if($result->num_rows > 0)
                return true;
            return false;
        }

        function checkEmailRole($email,$role)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select * from employee where `email`='$email' and `role` = '$role' and `is_active` = 1";

            $result = $con->query($query);

            if($result->num_rows > 0)
                return true;
            return false;
        }

        function canLogin($email,$password,$role)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select * from employee where `email` = '$email' and `password` = '$password' and `role` = '$role' and `is_active` = 1 and `is_department_active` = 1";

            $result = $con->query($query);

            if($result->num_rows > 0)
                return true;
            return false;
        }

        function updatePassword($email,$password)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "update employee set `password` = '$password' where `email` = '$email'";

            $result = $con->query($query);
            return $result;
        }

        function pendingEmployee()
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select * from employee where `is_active` = 0 and `is_rejected` = 0";

            return $con->query($query);
        }

        function approveEmployee($id)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "update employee set `is_active` = 1 where `e_id` = '$id'";

            return $con->query($query);
        }

    function rejectEmployee($id)
    {
        $db = new Database();
        $con =$db->open_connection();

        $query = "update employee set `is_rejected` = 1 where `e_id` = '$id'";

        return $con->query($query);
    }

    function getEmail($id)
    {
        $db = new Database();
        $con =$db->open_connection();

        $query = "select * from employee where `e_id`='$id'";

        $result = $con->query($query);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['email'];
        }
        return "";
    }
}