<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../utilities/Constants.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];
    $objAdmin= new Admin();
    if(!$objAdmin->checkEmail($email))//check realtime role
    {
        header("Location: ../LogoutController.php");
    }
    if($changePassword == 1)
    {
        header("Location: ../../views/admin/changePassword.php");
    }
}
else
{
    header('Location: ../../views/admin/index.php');
}

require_once __DIR__.'/../../models/Department.php';
if(isset($_POST['submit']))
{
    $addDept = new AdminAddDept();
    $addDept->getDeptInput();;

}
class AdminAddDept
{
public function getDeptInput()
{
    $objAddDept=new Department();
    $deptName=$_POST['deptName'];
    $deptAbbr=$_POST['deptAbbr'];
    if($deptName!=null && $deptAbbr!=null)
    {
        if($objAddDept->checkDeptName($deptName,$deptAbbr))
        {
            echo "<script>alert('Department Name Already Exists.');
                    window.location.href='../../views/admin/newDepartment.php';</script>";
        }
        else
        {
            $this->addDepartment($deptAbbr,$deptName);
        }
    }
    else
    {
        echo "<script>alert('Fill All Fields');
            window.location.href='../../views/admin/newDepartment.php';</script>";
    }
}
public function addDepartment($deptAbbr,$deptName)
{
    $objAddDept=new Department();
    $user=$objAddDept->addDepartment($deptAbbr,$deptName);
    if($user)
    {
        echo "<script>alert('Department Name Added.');
window.location.href='../../views/admin/newDepartment.php';</script>";
    }
    else
    {
        echo "<script>alert('Failed.');
window.location.href='../../views/admin/newDepartment.php';</script>";

    }


}
}
