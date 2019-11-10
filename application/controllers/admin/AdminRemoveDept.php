<?php
require_once __DIR__."/../../models/Department.php";
if(isset($_POST['submit'])) {
    $obj = new AdminRemoveDept();
    $obj->getDeptInput();
}
class AdminRemoveDept
{
    public function getDeptInput()
    {
        $deptId=$_POST['deptId'];
       // print_r($deptname);
        if($deptId!=null)
            $this->deleteDept($deptId);
        else
            echo "<script>alert('Please select department');
              window.location.href='../../views/home.php';</script>";

    }

    public function deleteDept($deptId)
    {
        $admin=new Department();
        $user= $admin->deleteDept($deptId);
        if($user)
        {
            echo "<script>alert('Successfully Deleted Department');
                   window.location.href='../../views/admin/home.php';</script>";
        }
        else
        {
           echo "<script>alert('Department Delete Failed');
                   window.location.href='../../views/admin/home.php';</script>";
        }
    }
}

