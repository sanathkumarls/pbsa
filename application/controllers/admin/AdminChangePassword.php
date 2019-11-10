<?php
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../utilities/Constants.php";
if(isset($_POST['submit']))
{
    $objpassword=new AdminChangePassword();
    $objpassword->getInput();
}

class AdminChangePassword
{

    function getInput()
    {
        session_start();
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];
        $hashedpassword = hash("SHA512", $oldpassword);
        $objoldpassword = new Admin();

        if ($email != null && $oldpassword != null && $newpassword != null && $cpassword != null)
        {
            if ($objoldpassword->CheckPassword($email, $hashedpassword))
            {
                if ($newpassword == $cpassword)
                {
                    $this->ChangePassword($email, $newpassword);
                }
                else
                {
                    echo "<script>alert('Password not matching.');
                    window.location.href='../../views/admin/changePassword.php';</script>";
                }

            }
            else
            {
                    echo "<script>alert('Old Password not matching.');
                 window.location.href='../../views/admin/changePassword.php';</script>";
            }

        }
        else
        {
            echo "<script>alert('Form is empty.');
             window.location.href='../../views/admin/changePassword.php';</script>";

        }
    }



    function ChangePassword($email, $newpassword)
    {
        $hashednewpassword = hash("SHA512", "$newpassword");
        $objpassword = new Admin();
        if($objpassword->updatePassword($email, $hashednewpassword))
        {
            echo "<script>alert('Password Reset Success. '); </script>";
            session_destroy();
            echo "<script>window.location.href='../../views/admin/index.php'</script>";
        }
        else
        {
            echo '<script>alert("Password Reset Failed . "); 
            window.location.href="../../views/admin/changePassword.php"</script>';
        }
    }

}






   

