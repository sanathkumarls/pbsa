<?php

require_once __DIR__.'/../../models/Admin.php';
if(isset($_POST['submit']))
{
    $admineditprofile=new AdminEditProfile();
    $admineditprofile->getInput();
}


class AdminEditProfile
{
    public function getInput()
    {
        session_start();
        $initial=$_POST['initial'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $objAdmin = new Admin();
        $result = $objAdmin->getUserDetails($email);
        $row = $result->fetch_assoc();
        $photo = $row['photo'];
        if(!empty($_FILES['photo']['name']))
        {
            $size = $_FILES['photo']['size'];
            $type = $_FILES['photo']['type'];
            if (($size > 5242880))
            {
                $message = 'File too large. File must be less than 5 megabytes.';
                echo '<script type="text/javascript">alert("'.$message.'");window.location.href="../../views/admin/editProfile.php"</script>';
            }
            elseif ($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png")
            {
                $message = 'Invalid file type';
                echo '<script type="text/javascript">alert("'.$message.'");</script>';
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
                move_uploaded_file($_FILES['photo']['tmp_name'],__DIR__.'/../../../uploads/admin/profile/'.$img.".".$extention);
                $photo="uploads/admin/profile/".$img.".".$extention;
            }
        }
        if($initial!=null && $firstName!=null && $lastName!=null && $email!=null && $dob!=null && $phone!=null)
        {
            $this->adminProfileEdit($initial,$firstName,$lastName,$email,$dob,$phone,$photo);
        }
        else
        {
            echo "<script>alert('Fill All Fields.');
                window.location.href='../../views/admin/editProfile.php';</script>";
        }
    }

    function adminProfileEdit($initial,$firstName,$lastName,$email,$dob,$phone,$photo)
    {
        $objEditPrfile=new Admin();
        $user=$objEditPrfile->adminUpdateProfile($initial,$firstName,$lastName,$email,$dob,$phone,$photo);
        if($user)
        {
            echo "<script>alert('Updated Successfully'); window.location.href='../../views/admin/home.php';</script>";

        }
        else
        {
            echo "<script>alert('Profile Edit Failed');
                window.location.href='../../views/admin/edit.php';</script>";
        }
    }

}