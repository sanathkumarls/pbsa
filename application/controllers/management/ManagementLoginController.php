<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 07/11/19
 * Time: 2:17 AM
 */

require_once __DIR__.'/../../models/Management.php';
require_once __DIR__.'/../../utilities/Constants.php';

session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

   $objMgmt = new Management();
    if(!$objMgmt->checkEmail($email))
    {
        header("Location: ../LogoutController.php");
        exit();
    }
    if($changePassword == 1)
    {
        header("Location: ../../views/management/changePassword.php");
        exit();
    }
    else
    {
        header("Location: ../../views/management/home.php");
        exit();
    }
}
else
{
    if(isset($_POST['submit']))
    {
        $obj = new ManagementLoginController();
        $obj->getUserInput();
    }
}


class ManagementLoginController
{
    function getUserInput()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email != null && $password != null)
            self::checkLogin($email,$password);
        else
        {
            echo '<script>alert("Fill All Fields"); window.location.href="../../views/management/index.php"</script>';
        }
    }

    function checkLogin($email,$password)
    {
        $hashPassword=hash("SHA512",$password);
        $objManagement = new Management();
        if($objManagement->canLogin($email,$hashPassword))
        {
            $_SESSION['changePassword'] = 0;
            if($hashPassword == Constants::defaultPassword)
            {
                $_SESSION['changePassword'] = 1;
            }
            $_SESSION['email'] = $email;
            $_SESSION['role'] = Constants::roleManagement;
            echo '<script>window.location.href="../../views/management/home.php"</script>';
        }
        else
        {
            echo '<script>alert("Incorrect Username Or Password"); window.location.href="../../views/management/index.php"</script>';
        }
    }
}