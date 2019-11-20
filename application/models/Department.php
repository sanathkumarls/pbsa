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

    function addDepartment($deptAbbr,$deptName)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="INSERT INTO `department`( `d_name`, `d_abbr`,`is_active`) VALUES ('$deptName','$deptAbbr',1);";
        return $con->query($query);

    }

    function checkDeptName($deptName,$deptAbbr)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="SELECT * from department where d_abbr='$deptAbbr' or `d_name`='$deptName' and is_active=1";
        $result=$con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;

    }

    function deleteDept($deptId)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="UPDATE `department` SET `is_active`=0 WHERE d_id='$deptId' ";
        return $con->query($query);
    }

    function getDepartmentName($id)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select * from department where `d_id` = '$id' and `is_active` = 1";

        $result=$con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['d_abbr'];
        }
        return "";
    }
}