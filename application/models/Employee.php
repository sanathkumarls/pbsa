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

            $photo = "";
            if($role == Constants::roleFaculty)
                $photo = "assets/faculty/images/a.png";
            elseif ($role == Constants::roleHod)
                $photo = "assets/hod/images/a.png";
            elseif ($role == Constants::rolePrincipal)
                $photo = "assets/principal/images/a.png";

            $query = "insert into employee values (NULL,'$emp_id','$role',";

            if($department == NULL)
                $query.="NULL";
            else
                $query.="'$department'";


            $query.= ",NULL,'$first_name','$last_name','$email','".Constants::defaultPassword."','$phone','$photo',NULL,NULL,0)";

            return $con->query($query);
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

            $query = "select * from employee where `email`='$email' and `role` = '$role' and `is_active` = 1 ";

            $result = $con->query($query);

            if($result->num_rows > 0)
                return true;
            return false;
        }

        function canLogin($email,$password,$role)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select * from employee where `email` = '$email' and `password` = '$password' and `role` = '$role' and `is_active` = 1 ";

            $result = $con->query($query);

            if($result->num_rows > 0)
                return true;
            return false;
        }

        function checkPassword($email,$hashedpassword)//to check old password
        {
           $db = new Database();
           $con = $db->open_connection();
            $query = "select * from employee where email='$email' and password='$hashedpassword' and is_active=1 ";
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

        function pendingEmployeeFetch()
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select count(*) as 'count' from employee where `is_active` = 0 ";

            return $con->query($query);
        }

        function pendingEmployee()
        {
            $db = new Database();
            $con = $db->open_connection();

            $query = "select * from employee where `is_active` = 0 ";

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

            $query = "delete from employee where `e_id` = '$id'";

            return $con->query($query);
        }

        function getEmail($id)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select email from employee where `e_id`='$id'";

            $result = $con->query($query);

            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['email'];
            }
            return "";
        }

        function getName($id)
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select first_name,last_name from employee where `e_id`='$id'";

            $result = $con->query($query);

            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['first_name']." ".$row['last_name'];
            }
            return "";
        }

        function getEid($email)//email is unique
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select e_id from employee where `email`='$email' ";

            $result = $con->query($query);

            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['e_id'];
            }
            return "";
        }

        function getEmpid($id)//only for viewing purpose
        {
            $db = new Database();
            $con =$db->open_connection();

            $query = "select emp_id from employee where `e_id`='$id'";

            $result = $con->query($query);

            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['emp_id'];
            }
            return "";
        }

        function getUserDetails($email)
        {
            $db=new Database();
            $con=$db->open_connection();

            $query = "select * from employee where `email` = '$email'";

            return $con->query($query);
        }

        function employeeUpdateProfile($initial,$firstName,$lastName,$email,$dob,$doj,$phone,$photo)
        {
            $db=new Database();
            $con=$db->open_connection();

            $query = "UPDATE `employee` SET `initial`='$initial',`first_name`='$firstName',`last_name`='$lastName',`dob`='$dob',`doj`= '$doj',`phone`='$phone',`photo` = '$photo' WHERE `email`='$email'";
            return $con->query($query);
        }

        function checkSameDepartment($e_id,$hod_email)
        {
            $db=new Database();
            $con=$db->open_connection();

            $query1 = "select department from employee where `e_id` = '$e_id'";

            $query2 = "select department from employee where `email` = '$hod_email' ";

            $result1 = $con->query($query1);
            $result2 = $con->query($query2);

            if($result1->num_rows > 0 && $result2->num_rows > 0)
            {
                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();

                if($row1['department'] == $row2['department'])
                    return true;
            }
            return false;
        }

        function getHodEmail($faculty_id)
        {
            $db=new Database();
            $con=$db->open_connection();

            $role = Constants::roleHod;
            $query = "SELECT email from employee where `role` = '$role' and `is_active` = 1 and  `department` = (SELECT department from employee where `e_id` = '$faculty_id')";
            $result = $con->query($query);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['email'];
            }
            return "";
        }

        function getPrincipalEmail()
        {
            $db=new Database();
            $con=$db->open_connection();

            $role = Constants::rolePrincipal;

            $query = "SELECT email from employee where `role` = '$role' and `is_active` = 1";
            $result = $con->query($query);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['email'];
            }
            return "";
        }

        function getDepartmentFromEmail($email)
        {
            $db=new Database();
            $con=$db->open_connection();

            $query = "select department from employee where `email` = '$email'";

            $result = $con->query($query);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row['department'];
            }
            return "";
        }

        function getApprovedUsers()
        {
            $db=new Database();
            $con=$db->open_connection();

            $query = "select * from employee where `is_active` = 1 or `is_active` = 2";
            return $con->query($query);
        }

        function changeStatus($status,$e_id)
        {
            $db=new Database();
            $con=$db->open_connection();

            if($status == 1)
                $status = 2;
            elseif ($status == 2)
                $status = 1;

            $query = "update employee set `is_active` = '$status' where `e_id` = '$e_id'";
            return $con->query($query);
        }
}

//$objEmployee = new Employee();
//echo $objEmployee->checkSameDepartment(8,"hodbio@sdmit.in");