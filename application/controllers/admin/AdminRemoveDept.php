<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */

require_once __DIR__ . "/../../models/Admin.php";
require_once __DIR__ . "/../../utilities/Constants.php";
require_once __DIR__."/../../models/Department.php";
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];
    $objAdmin = new Admin();
    if (!$objAdmin->checkEmail($email))//check realtime role
    {
        header("Location: ../LogoutController.php");
        exit();
    }
    if($role != Constants::roleAdmin)
    {
        header("Location: ../LogoutController.php");
        exit();
    }
    if ($changePassword == 1)
    {
        header("Location: ../../views/admin/changePassword.php");
        exit();
    }
}
else
{
    header('Location: ../../views/admin/index.php');
    exit();
}


if(isset($_POST['submit']))
{
    $obj = new AdminRemoveDept();
    $obj->getDeptInput();
}
class AdminRemoveDept
{
    public function getDeptInput()
    {
        $deptId=$_POST['deptId'];
       // print_r($deptname);
        if($deptId!=null)
            $this->deleteDept($deptId);
        else
            echo "<script>alert('Please select department');
              window.location.href='../../views/admin/removeDepartment.php';</script>";

    }

    public function deleteDept($deptId)
    {
        $admin=new Department();
        $user= $admin->deleteDept($deptId);
        if($user)
        {
            echo "<script>alert('Successfully Deleted Department');
                   window.location.href='../../views/admin/removeDepartment.php';</script>";
        }
        else
        {
           echo "<script>alert('Department Delete Failed');
                   window.location.href='../../views/admin/removeDepartment.php';</script>";
        }
    }
}

