<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:03 PM
 */

require_once __DIR__.'/../models/Employee.php';
require_once __DIR__."/../models/email/Email.php";
require_once __DIR__."/../utilities/Constants.php";

class RegistrationController
{
        function getUserInput()
        {
            $emp_id=$_POST['emp_id'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $role=$_POST['role'];

            if($emp_id != null && $first_name != null && $last_name!= null && $email!= null && $phone != null && $role!= null)
            {
                if(isset($_POST['department']))
                    $department=$_POST['department'];
                else
                    $department = NULL;
                if($role == Constants::rolePrincipal)
                    $department = NULL;

                $objEmployee = new Employee();
                if(!$objEmployee->checkEmail($email))
                {
                    $result = $objEmployee->register($emp_id,$first_name,$last_name,$email,$phone,$department,$role);
                    if($result)
                    {
                        //send mail code here
                        $from = "PBSA SYSTEM";
                        $to = $email;
                        $subject = "Registration Successful for PBSA System";
                        $message = "Registration For PBSA System Is Successful , Please Wait For Approval From Admin";
                        $objEmail = new Email();
                        $objEmail->sendMail($from,$to,$subject,$message);

                        echo '<script>alert("Registration Success Wait For Approval"); window.location.href="../views"</script>';
                    }
                    else
                    {
                        echo '<script>alert("Registration Failed Try Again After Some Time"); window.location.href="../views/join.php"</script>';
                    }
                }
                else
                {
                    echo '<script>alert("Already Registered Wait For Approval"); window.location.href="../views"</script>';
                }


            }
            else
            {
                echo '<script>alert("Fill All fields"); window.location.href="../views/join.php"</script>';
            }

        }
}

if(isset($_POST['submit']))
{
    $obj=new RegistrationController();
    $obj->getUserInput();
}
