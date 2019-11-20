<?php
 require_once __DIR__."/../../models/Admin.php";
 require_once __DIR__."/../../utilities/Constants.php";
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
    }
    if($changePassword == 1)
    {
        header("Location: ../../views/admin/changePassword.php");
    }
    else
    {
        header('Location: ../../views/admin/home.php');
    }
}
else
{
    if(isset($_POST['submit']))
    {
        $loginController = new AdminLoginController();
        $loginController->getUserInput();
    }
}

class AdminLoginController
{
    public function getUserInput()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //print_r($name);
        //print_r($password);
        if($email != null && $password != null)
            $this->checkLogin($email,$password);
        else
            echo "<script>
                        alert('Please Enter Useremail And Password');
                       window.location.href='../../views/admin/index.php';
                </script>";
    }
    public function checkLogin($email,$password)
    {
        $hashPassword=hash("SHA512",$password);
        $objAdmin = new Admin();
        if($objAdmin->canLogin($email,$hashPassword))
        {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = Constants::roleAdmin;
            $_SESSION['changePassword'] = 0;
            if($hashPassword == Constants::defaultPassword)
            {
                $_SESSION['changePassword'] = 1;
            }
            echo '<script>window.location.href="../../views/admin/home.php"</script>';
        }
        else
        {
            echo '<script>alert("Incorrect Username Or Password"); window.location.href="../../views/admin/index.php"</script>';
        }
    }

}