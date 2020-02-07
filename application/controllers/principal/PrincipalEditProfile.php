<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */
require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
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

if(isset($_POST['submit']))
{
    $objPrincipalEdit=new PrincipalEditProfile();
    $objPrincipalEdit->getInput();
}


class PrincipalEditProfile
{
    public function getInput()
    {
        $initial=$_POST['initial'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $doj=$_POST['doj'];
        $objEmployee = new Employee();
        $result = $objEmployee->getUserDetails($email);
        $row = $result->fetch_assoc();
        $photo = $row['photo'];
        if(!empty($_FILES['photo']['name']))
        {
            $size = $_FILES['photo']['size'];
            $type = $_FILES['photo']['type'];
            if (($size > 5242880))
            {
                $message = 'File too large. File must be less than 5 megabytes.';
                echo '<script type="text/javascript">alert("'.$message.'");window.location.href="../../views/principal/editProfile.php";</script>';
            }
            elseif ($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png")
            {
                $message = 'Invalid file type';
                echo '<script type="text/javascript">alert("'.$message.'");window.location.href="../../views/principal/editProfile.php";</script>';
            }
            else
            {
                $extention= substr_replace($type,"",0,6);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $img = '';
                for ($i = 0; $i < 10; $i++)
                {
                    $index = rand(0, strlen($characters) - 1);
                    $img .= $characters[$index];
                }
                move_uploaded_file($_FILES['photo']['tmp_name'],__DIR__.'/../../../uploads/principal/profile/'.$img.".".$extention);
                $photo="uploads/principal/profile/".$img.".".$extention;
            }
        }
        if($initial!=null && $firstName!=null && $lastName!=null && $email!=null && $dob!=null && $doj!=null && $phone!=null)
        {
            $this->employeeProfileEdit($initial,$firstName,$lastName,$email,$dob,$doj,$phone,$photo);
        }
        else
        {
            echo "<script>alert('Fill All Fields.');
                window.location.href='../../views/principal/editProfile.php';</script>";
        }
    }

    function employeeProfileEdit($initial,$firstName,$lastName,$email,$dob,$doj,$phone,$photo)
    {
        $objEmployee = new Employee();
        $user=$objEmployee->employeeUpdateProfile($initial,$firstName,$lastName,$email,$dob,$doj,$phone,$photo);
        if($user)
        {
            echo "<script>alert('Updated Successfully'); window.location.href='../../views/principal/home.php';</script>";

        }
        else
        {
            echo "<script>alert('Profile Edit Failed');
                window.location.href='../../views/principal/editProfile.php';</script>";
        }
    }

}