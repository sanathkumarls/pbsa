<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 10:02 PM
 */

require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Employee.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
    {
        header("Location: ../LogoutController.php");
    }
}
else
{
    header('Location: ../../views/principal/index.php');
}


if(isset($_POST['submit']))
{
    $objpassword=new PrincipalChangePassword();
    $objpassword->getInput();
}

class PrincipalChangePassword
{
    function getInput()
    {
        session_start();
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
                    echo "<script>alert('Password not matching.');
                    window.location.href='../../views/principal/changePassword.php';</script>";
                }

            }
            else
            {
                echo "<script>alert('Old Password not matching.');
                 window.location.href='../../views/principal/changePassword.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Form is empty.');
             window.location.href='../../views/principal/changePassword.php';</script>";

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
            echo "<script>window.location.href='../../views/principal/index.php'</script>";
        }
        else
        {
            echo '<script>alert("Password Change Failed"); 
            window.location.href="../../views/principal/changePassword.php"</script>';
        }
    }
}