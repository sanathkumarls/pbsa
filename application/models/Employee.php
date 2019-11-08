<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:04 PM
 */

require_once __DIR__."/../utilities/Database.php";


class Employee
{
        function register($emp_id,$first_name,$last_name,$email,$phone,$department,$role)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "insert into employee values (NULL,'$emp_id','$role','$department','$first_name','$last_name','$email',NULL,'$phone',NULL,NULL,0,0)";

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

            $query = "select * from employee where `email` = '$email' and `password` = '$password' and `role` = '$role' and `is_active` = 1";

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
}