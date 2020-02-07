<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 06/02/20
 * Time: 9:33 PM
 */

require_once __DIR__ . "/../../models/Admin.php";
require_once __DIR__ . "/../../utilities/Constants.php";
require_once __DIR__."/../../models/Employee.php";
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

if(isset($_POST['changeStatus']))
{
    $e_id = $_POST['e_id'];
    $status = $_POST['status'];

    $objChangeEmployeeStatus = new ChangeEmployeeStatus();
    $objChangeEmployeeStatus->changeStatus($status,$e_id);
}

class ChangeEmployeeStatus
{
    function changeStatus($status,$e_id)
    {
        if($status != null && $e_id != null)
        {
            $objEmployee = new Employee();
            if($objEmployee->changeStatus($status,$e_id))
            {
                echo "<script>alert('Status Changed');window.location.href='../../views/admin/employees.php';</script>";
            }
            else
            {
                echo "<script>alert('Status Change Failed');window.location.href='../../views/admin/employees.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Null Fields');window.location.href='../../views/admin/employees.php';</script>";
        }
    }
}