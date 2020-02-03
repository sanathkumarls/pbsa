<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 07/11/19
 * Time: 2:17 AM
 */

require_once __DIR__.'/../../models/Employee.php';
require_once __DIR__.'/../../utilities/Constants.php';
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
    }
    if($changePassword == 1)
    {
        header("Location: ../../views/hod/changePassword.php");
    }
    else
    {
        header("Location: ../../views/hod/home.php");
    }
}
else
{
    if(isset($_POST['submit']))
    {
        $obj = new HodLoginController();
        $obj->getUserInput();
    }
}




class HodLoginController
{
    function getUserInput()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email != null && $password != null)
            self::checkLogin($email,$password);
        else
        {
            echo '<script>alert("Fill All Fields"); window.location.href="../../views/faculty/index.php"</script>';
        }
    }

    function checkLogin($email,$password)
    {
        $hashPassword=hash("SHA512",$password);
        $objEmployee = new Employee();
        if($objEmployee->canLogin($email,$hashPassword,Constants::roleHod))
        {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = Constants::roleHod;
            $_SESSION['changePassword'] = 0;
            if($hashPassword == Constants::defaultPassword)
            {
                $_SESSION['changePassword'] = 1;
            }
            echo '<script>window.location.href="../../views/hod/home.php"</script>';
        }
        else
        {
            echo '<script>alert("Incorrect Username Or Password"); window.location.href="../../views/hod/index.php"</script>';
        }
    }

}