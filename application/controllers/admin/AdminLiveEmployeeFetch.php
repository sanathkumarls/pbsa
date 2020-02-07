<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 11/11/19
 * Time: 10:30 AM
 */

require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../models/Employee.php";

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
        exit();
    }
    if($role != Constants::roleAdmin)
    {
        header("Location: ../LogoutController.php");
        exit();
    }
    if($changePassword == 1)
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

$objAdmin = new AdminLiveEmployeeFetch();
$objAdmin->fetch();

class AdminLiveEmployeeFetch
{
    function fetch()
    {
        $objEmployee = new Employee();
        $result = $objEmployee->pendingEmployeeFetch();
        echo json_encode($result->fetch_assoc());
    }
}