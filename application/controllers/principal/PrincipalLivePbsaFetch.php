<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 02/02/20
 * Time: 8:40 PM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Pbsa.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
    {
        header("Location: ../LogoutController.php");
        exit();
    }
    if($changePassword == 1)
    {
        header("Location: ../../views/principal/changePassword.php");
        exit();
    }
}
else
{
    header('Location: ../../views/principal/index.php');
    exit();
}

$objPrincipal = new PrincipalLivePbsaFetch();
$objPrincipal->fetch();

class PrincipalLivePbsaFetch
{
    function fetch()
    {
        $objPbsa = new Pbsa();
        $result = $objPbsa->getPbsaApprovalsPrincipalFetch();
        echo json_encode($result->fetch_assoc());
    }
}