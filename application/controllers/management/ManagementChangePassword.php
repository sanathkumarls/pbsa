<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 06/02/20
 * Time: 8:37 PM
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
    if($role != Constants::roleManagement)
    {
        header("Location: ../LogoutController.php");
        exit();
    }
}
else
{
    header('Location: ../../views/management/index.php');
    exit();
}

if(isset($_POST['submit']))
{
    $objMgmtPassword = new ManagementChangePassword();
    $objMgmtPassword->getInput();
}


class ManagementChangePassword
{
    function getInput()
    {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];
        $hashedpassword = hash("SHA512", $oldpassword);
        $objManagement = new Management();

        if ($email != null && $oldpassword != null && $newpassword != null && $cpassword != null)
        {
            if ($objManagement->checkPassword($email,$hashedpassword))
            {
                if ($newpassword == $cpassword)
                {
                    $this->changePassword($email, $newpassword);
                }
                else
                {
                    echo "<script>alert('Passwords not matching.');
                    window.location.href='../../views/management/changePassword.php';</script>";
                }

            }
            else
            {
                echo "<script>alert('Old Password not matching.');
                 window.location.href='../../views/management/changePassword.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Form is empty.');
             window.location.href='../../views/management/changePassword.php';</script>";

        }
    }

    function changePassword($email, $newpassword)
    {
        $hashednewpassword = hash("SHA512", "$newpassword");
        $objManagement = new Management();
        if($objManagement->updatePassword($email, $hashednewpassword))
        {
            echo "<script>alert('Password Changed Successfully'); </script>";
            session_destroy();
            echo "<script>window.location.href='../../views/management/index.php'</script>";
        }
        else
        {
            echo '<script>alert("Password Change Failed"); 
            window.location.href="../../views/management/changePassword.php"</script>';
        }
    }
}