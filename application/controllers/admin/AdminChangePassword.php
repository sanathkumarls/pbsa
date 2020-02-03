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
    $objAdmin= new Admin();

    if(!$objAdmin->checkEmail($email))//check realtime role
    {
        header("Location: ../LogoutController.php");
    }
}
else
{
    header('Location: ../../views/admin/index.php');
}

if(isset($_POST['submit']))
{
    $objpassword=new AdminChangePassword();
    $objpassword->getInput();
}

class AdminChangePassword
{

    function getInput()
    {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];
        $hashedpassword = hash("SHA512", $oldpassword);
        $objAdmin = new Admin();

        if ($email != null && $oldpassword != null && $newpassword != null && $cpassword != null)
        {
            if ($objAdmin->checkPassword($email, $hashedpassword))
            {
                if ($newpassword == $cpassword)
                {
                    $this->changePassword($email, $newpassword);
                }
                else
                {
                    echo "<script>alert('Passwords not matching.');
                    window.location.href='../../views/admin/changePassword.php';</script>";
                }

            }
            else
            {
                    echo "<script>alert('Old Password not matching.');
                 window.location.href='../../views/admin/changePassword.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Fill All Fields');
             window.location.href='../../views/admin/changePassword.php';</script>";

        }
    }



    function changePassword($email, $newpassword)
    {
        $hashednewpassword = hash("SHA512", "$newpassword");
        $objAdmin = new Admin();
        if($objAdmin->updatePassword($email, $hashednewpassword))
        {
            echo "<script>alert('Password Changed Successfully'); </script>";
            session_destroy();
            echo "<script>window.location.href='../../views/admin/index.php'</script>";
        }
        else
        {
            echo '<script>alert("Password Change Failed"); 
            window.location.href="../../views/admin/changePassword.php"</script>';
        }
    }

}






   

