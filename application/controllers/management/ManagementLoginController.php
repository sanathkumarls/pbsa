<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 07/11/19
 * Time: 2:17 AM
 */

require_once '../../models/Management.php';
require_once '../../utilities/Constants.php';
if(isset($_POST['submit']))
{
    $obj = new ManagementLoginController();
    $obj->getUserInput();
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
            session_start();
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