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

        $query="select * from department";

        $result=$con->query($query);
        return $result;
    }

    function addDepartment($deptAbbr,$deptName)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="INSERT INTO `department`( `d_name`, `d_abbr`) VALUES ('$deptName','$deptAbbr');";
        return $con->query($query);

    }

    function checkDeptName($deptName,$deptAbbr)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="SELECT * from department where d_abbr='$deptAbbr' or `d_name`='$deptName'";
        $result=$con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;

    }

    function deleteDept($deptId)
    {
        $db=new Database();
        $con=$db->open_connection();
        $query="delete from department where `d_id` = '$deptId' ";
        return $con->query($query);
    }

    function getDepartmentName($id)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select * from department where `d_id` = '$id'";

        $result=$con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['d_abbr'];
        }
        return "";
    }

    function getDepartmentNameFromEmployeeId($e_id)
    {
        $db = new Database();
        $con =$db->open_connection();

        $query = "select d_abbr from department where `d_id` = (select department from employee where `e_id` = '$e_id')";

        $result = $con->query($query);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['d_abbr'];
        }
        return "";
    }
}