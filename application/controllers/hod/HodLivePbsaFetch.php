<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 30/01/20
 * Time: 5:45 PM
 */

require_once __DIR__.'/../../models/Employee.php';
require_once __DIR__.'/../../utilities/Constants.php';
require_once __DIR__."/../../models/Pbsa.php";
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
    if($changePassword == 1)
    {
        header("Location: ../../views/hod/changePassword.php");
        exit();
    }
}
else
{
    header('Location: ../../views/hod/index.php');
    exit();
}

$objHod = new HodLivePbsaFetch();
$objHod->fetch($email);

class HodLivePbsaFetch
{
    function fetch($email)
    {
        $objPbsa = new Pbsa();
        $result = $objPbsa->getPbsaApprovalsHodFetch($email);
        echo json_encode($result->fetch_assoc());
    }
}