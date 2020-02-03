<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 02/02/20
 * Time: 4:22 PM
 */

require_once __DIR__.'/../models/Employee.php';
require_once __DIR__."/../utilities/Constants.php";
require_once __DIR__."/../models/Pbsa.php";
require_once __DIR__ . "/../models/email/Email.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    $objPbsa = new Pbsa();

    if(isset($_POST['e_id']) && isset($_POST['year']))
    {
        $e_id = $_POST['e_id']; //echo $e_id;
        $year = $_POST['year']; //echo $year;

        //check for submitted
        if(!$objPbsa->checkPbsaSubmitted($e_id,$year))
            header("Location: verifyPbsa.php");
    }
    else
    {
        header("Location: verifyPbsa.php");
        exit();
    }


    if($role == Constants::roleHod)
    {
        if(!$objEmployee->checkEmailRole($email,Constants::roleHod))
        {
            header("Location: ../LogoutController.php");
            exit();
        }

        //check for same department
        if(!$objEmployee->checkSameDepartment($e_id,$email))
            header("Location: verifyPbsa.php");
    }
    elseif($role == Constants::rolePrincipal)
    {
        if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
        {
            header("Location: ../LogoutController.php");
            exit();
        }
    }
    else
    {
        header("Location: ../LogoutController.php");
        exit();
    }

    if($changePassword == 1)
    {
        if($role == Constants::roleHod)
        {
            header("Location: ../../views/hod/changePassword.php");
            exit();
        }
        if($role == Constants::rolePrincipal)
        {
            header("Location: ../../views/principal/changePassword.php");
            exit();
        }
    }
}
else
{
    header('Location: ../../views/index.php');
    exit();
}

if(isset($_POST['approve']) || isset($_POST['reject']))
{
    $objApproveReject = new PbsaApproveRejectController();
    if(isset($_POST['approve']))
        $objApproveReject->approve($e_id,$year,$role);

    if(isset($_POST['reject']))
    {
        $comments = "";
        if(isset($_POST['rejection_comments']))
            $comments = $_POST['rejection_comments'];
        $objApproveReject->reject($e_id,$year,$role,$comments);
    }

}


class PbsaApproveRejectController
{
    function approve($e_id,$year,$role)
    {
        $objPbsa = new Pbsa();
        $objEmployee = new Employee();
        if($role == Constants::roleHod)
            $path = "hod";
        if($role == Constants::rolePrincipal)
            $path = "principal";
        if($objPbsa->approvePbsa($e_id,$year,$role))
        {
            //send mail
            $from = "PBSA System";
            $objEmail = new Email();
            $to = $objEmployee->getEmail($e_id);
            if($role == Constants::roleHod)
            {
                $subject = "PBSA Approved By HOD";
                $message = "Your PBSA Submission For The Year '$year' Has Been Approved By HOD , Please Wait For The Approval From Principal";

                //send another mail to principal,
                $to1 = $objEmployee->getPrincipalEmail();
                $faculty_name = $objEmployee->getName($e_id);
                $subject1 = "PBSA Submitted By '$faculty_name' Has Been Approved By HOD";
                $message1 = "PBSA Submitted By '$faculty_name' For The Year '$year' Has Been Approved By HOD , Please Review Their Submission";
                $objEmail->sendMail($from,$to1,$subject1,$message1);
            }
            if($role == Constants::rolePrincipal)
            {
                $subject = "PBSA Approved By Principal";
                $message = "Your PBSA Submission For The Year '$year' Has Been Approved By Principal , Please Login To View Your Performance";
            }


            $objEmail->sendMail($from,$to,$subject,$message);

            echo '<script>alert("PBSA Approved Successfully"); window.location.href="../views/'.$path.'/verifyPbsa.php";</script>';

        }
        else
        {
            echo '<script>alert("PBSA Approval Failed , Try Again Later "); window.location.href="../views/'.$path.'/verifyPbsa.php";</script>';
        }
    }

    function reject($e_id,$year,$role,$comments)
    {
        $objPbsa = new Pbsa();
        $objEmployee = new Employee();
        if($role == Constants::roleHod)
            $path = "hod";
        if($role == Constants::rolePrincipal)
            $path = "principal";
        if($objPbsa->rejectPbsa($e_id,$year,$role,$comments))
        {
            //send mail
            $from = "PBSA System";
            $to = $objEmployee->getEmail($e_id);
            if($role == Constants::roleHod)
            {
                $subject = "PBSA Rejected By HOD";
                $message = "Your PBSA Submission For The Year '$year' Has Been Rejected By HOD ,<br> Reason For Rejection : '$comments'";
            }
            if($role == Constants::rolePrincipal)
            {
                $subject = "PBSA Rejected By Principal";
                $message = "Your PBSA Submission For The Year '$year' Has Been Rejected By Principal , <br> Reason For Rejection : '$comments'";
            }

            $objEmail = new Email();
            $objEmail->sendMail($from,$to,$subject,$message);

            echo '<script>alert("PBSA Rejected Successfully"); window.location.href="../views/'.$path.'/verifyPbsa.php";</script>';
        }
        else
        {
            echo '<script>alert("PBSA Rejection Failed , Please Try Again Later"); window.location.href="../views/'.$path.'/verifyPbsa.php";</script>';
        }
    }
}