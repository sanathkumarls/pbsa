<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__.'/../../models/Management.php';
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
if(isset($_POST['submit']))
{
    $objAddManagement=new AdminAddManagement();
    $objAddManagement->getInput();
}


class AdminAddManagement
{
    function getInput()
    {
        $initial=$_POST['initial'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        if($initial!=null && $firstName!=null && $lastName!=null && $email!=null && $phone!=null)
        {
            //check already exists
            $objManagement = new Management();
            if(!$objManagement->checkEmail($email))
            {
                $this->addManagement($initial,$firstName,$lastName,$email,$phone);
            }
            else
            {
                echo "<script>alert('Email Already Exists');
                window.location.href='../../views/admin/addManagement.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Fill All Fields');
                window.location.href='../../views/admin/addManagement.php';</script>";
        }
    }

    function addManagement($initial,$firstName,$lastName,$email,$phone)
    {
        $objManagement = new Management();
        $user=$objManagement->addManagement($initial,$firstName,$lastName,$email,$phone);
        if($user)
        {
            echo "<script>alert('New Management User Added');
 window.location.href='../../views/admin/addManagement.php';</script>";

        }
        else
        {
            echo "<script>alert('Management Add Failed');
 window.location.href='../../views/admin/addManagement.php';</script>";
        }
    }

}