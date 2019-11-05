<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 11:03 PM
 */

require_once '../models/Employee.php';

class RegistrationController
{
        function getUserInput()
        {
            $emp_id=$_POST['emp_id'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $department=$_POST['department'];
            $role=$_POST['role'];

            if($emp_id != null && $first_name != null && $last_name!= null && $email!= null && $phone != null && $department!= null && $role!= null)
            {
                $objEmployee = new Employee();

                if(!$objEmployee->checkEmail($email))
                {
                    $result = $objEmployee->register($emp_id,$first_name,$last_name,$email,$phone,$department,$role);
                    if($result)
                    {
                        //send mail code here
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
