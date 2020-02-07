<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 06/02/20
 * Time: 9:07 PM
 */
require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::roleHod))//check realtime role
    {
        header("Location: ../LogoutController.php");
        exit();
    }
}
else
{
    header('Location: ../../views/hod/index.php');
    exit();
}

if(isset($_POST['submit']))
{
    $objHodPassword=new HodChangePassword();
    $objHodPassword->getInput();
}

class HodChangePassword
{
    function getInput()
    {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];
        $hashedpassword = hash("SHA512", $oldpassword);
        $objEmployee = new Employee();

        if ($email != null && $oldpassword != null && $newpassword != null && $cpassword != null)
        {
            if ($objEmployee->checkPassword($email,$hashedpassword))
            {
                if ($newpassword == $cpassword)
                {
                    $this->changePassword($email, $newpassword);
                }
                else
                {
                    echo "<script>alert('Passwords not matching.');
                    window.location.href='../../views/hod/changePassword.php';</script>";
                }

            }
            else
            {
                echo "<script>alert('Old Password not matching.');
                 window.location.href='../../views/hod/changePassword.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Form is empty.');
             window.location.href='../../views/hod/changePassword.php';</script>";

        }
    }



    function changePassword($email, $newpassword)
    {
        $hashednewpassword = hash("SHA512", "$newpassword");
        $objEmployee = new Employee();
        if($objEmployee->updatePassword($email, $hashednewpassword))
        {
            echo "<script>alert('Password Changed Successfully'); </script>";
            session_destroy();
            echo "<script>window.location.href='../../views/hod/index.php'</script>";
        }
        else
        {
            echo '<script>alert("Password Change Failed"); 
            window.location.href="../../views/hod/changePassword.php"</script>';
        }
    }
}