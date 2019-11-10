<?php
if(isset($_POST['submit']))
{
    require_once __DIR__.'/../../models/Management.php';
    $objAddManagement=new AdminAddManagement();
    $objAddManagement->getInput();
}


class AdminAddManagement
{
    function getInput()
    {
        $initial=$_POST['initial'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        if($initial!=null && $firstName!=null && $lastName!=null && $email!=null && $phone!=null &&  $password!=null)
        {
            //check already exists
            $objManagement = new Management();
            if(!$objManagement->checkEmail($email))
            {
                $hashedpassword=hash("SHA512",$password);
                $this->addManagement($initial,$firstName,$lastName,$email,$phone,$hashedpassword);
            }
            else
            {
                echo "<script>alert('Email Already Exists');
                window.location.href='../../views/admin/addManagement.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Fill All Fields');
                window.location.href='../../views/admin/addManagement.php';</script>";
        }
    }

    function addManagement($initial,$firstName,$lastName,$email,$phone,$hashedpassword)
    {
        $objManagement = new Management();
        $user=$objManagement->addManagement($initial,$firstName,$lastName,$email,$phone,$hashedpassword);
        if($user)
        {
            echo "<script>alert('New Management User Added');
 window.location.href='../../views/admin/addManagement.php';</script>";

        }
        else
        {
            echo "<script>alert('Management Add Failed');
 window.location.href='../../views/admin/addManagement.php';</script>";
        }
    }

}