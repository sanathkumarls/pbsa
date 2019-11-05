<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:04 PM
 */

require_once '../utilities/Database.php';

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
}