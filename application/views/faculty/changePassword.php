<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 3:14 AM
 */

require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Employee.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::roleFaculty))//check realtime role
    {
        header("Location: ../../controllers/LogoutController.php");
    }
}
else
{
    header('Location: index.php');
}

?>