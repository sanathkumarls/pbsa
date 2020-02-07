<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 7:42 PM
 */

require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Employee.php";
require_once __DIR__ . "/../../models/email/Email.php";
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



if(isset($_POST['approve']))
{
    $objApproval = new AdminApproveReject();
    $objApproval->approveEmployee($_POST['approve']);
}
if(isset($_POST['reject']))
{
    $objReject = new AdminApproveReject();
    $objReject->rejectEmployee($_POST['reject']);
}

class AdminApproveReject
{
    function approveEmployee($id)
    {
        $objEmployee = new Employee();
        if($objEmployee->approveEmployee($id))
        {
            $to = $objEmployee->getEmail($id);
            $from = "PBSA System";
            $sub = "Your Join Request Has Been Approved";
            $msg = "Welcome to PBSA<br>Please Login And Change Your default Password<br>Contact Admin For default Password<br>Otherwise You Can Create Your New Password By Clicking Forgot Password";
            $objEmail = new Email();
            $objEmail->sendMail($from,$to,$sub,$msg);
            echo '<script>alert("Employee Approved"); window.location.href="../../views/admin/approvals.php"</script>';
        }
    }

    function rejectEmployee($id)
    {
        $objEmployee = new Employee();
        $to = $objEmployee->getEmail($id);
        if($objEmployee->rejectEmployee($id))//delete join request
        {
            $from = "PBSA System";
            $sub = "Your Join Request Has Been Rejected";
            $msg = "Your Join Request Has Been Rejected.<br>Please Contact Admin For Rejecting and Submit Join Request Again.";
            $objEmail = new Email();
            $objEmail->sendMail($from,$to,$sub,$msg);
            echo '<script>alert("Employee Rejected"); window.location.href="../../views/admin/approvals.php"</script>';
        }
    }

}