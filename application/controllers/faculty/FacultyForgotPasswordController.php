<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 4:02 AM
 */

require_once __DIR__.'/../../models/Email/Email.php';
require_once __DIR__.'/../../models/Employee.php';
require_once __DIR__.'/../../utilities/Constants.php';
if(isset($_POST['submit']))
{
    $objForgotPassword = new FacultyForgotPasswordController();
    $objForgotPassword->getUserEmail();
}
class FacultyForgotPasswordController
{
    function getUserEmail()
    {
        $email = $_POST['email'];
        if($email != null)
        {
            $objEmployee = new Employee();
            if($objEmployee->checkEmailRole($email,Constants::roleFaculty))
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $newPassword = '';
                for ($i = 0; $i < Constants::forgotPasswordLength; $i++)
                {
                    $index = rand(0, strlen($characters) - 1);
                    $newPassword .= $characters[$index];
                }
                $from = "PBSA";
                $subject = "Password Reset Successful";
                $message = "Hello , Here Is Your New Password For Logging In To PBSA : ".$newPassword;
                //echo $subject.'<br>'.$message;
                $objEmail = new Email();
                if($objEmail->sendMail($from,$email,$subject,$message))
                {
                    //update password in database if mail is sent
                    $hashPassword = hash("SHA512",$newPassword);
                    if($objEmployee->updatePassword($email,$hashPassword))
                    {
                        echo '<script>alert("Password Reset Success. New Password Has Been Sent To Your Registered Email Id"); window.location.href="../../views/faculty/index.php"</script>';
                    }
                    else
                    {
                        echo '<script>alert("Password Reset Failed. Try Again Later"); window.location.href="../../views/faculty/index.php"</script>';
                    }
                }
                else
                {
                    echo '<script>alert("Password Reset Failed. Try Again Later"); window.location.href="../../views/faculty/index.php"</script>';
                }
            }
            else
            {
                echo '<script>alert("Email Id Does Not Exist"); window.location.href="../../views/faculty/index.php"</script>';
            }
        }
        else
        {
            echo '<script>alert("Please Enter Your Email Id"); window.location.href="../../views/faculty/index.php"</script>';
        }

    }
}