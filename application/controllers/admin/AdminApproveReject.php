<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 7:42 PM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../models/Email/Email.php";

if(isset($_POST['approve']))
{
    $objApproval = new AdminApproveReject();
    $objApproval->approveEmployee($_POST['approve']);
}
if(isset($_POST['reject']))
{
    $objReject = new AdminApproveReject();
    $objReject->rejectEmployee($_POST['reject']);
}

class AdminApproveReject
{
    function approveEmployee($id)
    {
        $objEmployee = new Employee();
        if($objEmployee->approveEmployee($id))
        {
            $to = $objEmployee->getEmail($id);
            $from = "PBSA";
            $sub = "Your Join Request Has Been Approved";
            $msg = "Welcome to PBSA<br>Please Login And Change Your default Password<br>Contact Admin For default Password<br>Otherwise You Can Create Your New Password By Clicking Forgot Password";
            $objEmail = new Email();
            $objEmail->sendMail($from,$to,$sub,$msg);
            echo '<script>alert("Employee Approved"); window.location.href="../../views/admin/employees.php"</script>';
        }
    }

    function rejectEmployee($id)
    {
        $objEmployee = new Employee();
        if($objEmployee->rejectEmployee($id))
        {
            $to = $objEmployee->getEmail($id);
            $from = "PBSA";
            $sub = "Your Join Request Has Been Rejected";
            $msg = "Your Join Request Has Been Rejected<br>Please Contact Admin For Rejecting.";
            $objEmail = new Email();
            $objEmail->sendMail($from,$to,$sub,$msg);
            echo '<script>alert("Employee Rejected"); window.location.href="../../views/admin/employees.php"</script>';
        }
    }

}