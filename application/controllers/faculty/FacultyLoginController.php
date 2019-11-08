<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 07/11/19
 * Time: 2:17 AM
 */

require_once __DIR__.'/../../models/Employee.php';
require_once __DIR__.'/../../utilities/Constants.php';

if(isset($_POST['submit']))
{
    $obj = new FacultyLoginController();
    $obj->getUserInput();
}

class FacultyLoginController
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
        if($objEmployee->canLogin($email,$hashPassword,Constants::roleFaculty))
        {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['role'] = Constants::roleFaculty;
            $_SESSION['changePassword'] = 0;
            if($hashPassword == Constants::defaultPassword)
            {
                $_SESSION['changePassword'] = 1;
            }
            echo '<script>window.location.href="../../views/faculty/home.php"</script>';
        }
        else
        {
            echo '<script>alert("Incorrect Username Or Password"); window.location.href="../../views/faculty/index.php"</script>';
        }
    }

}