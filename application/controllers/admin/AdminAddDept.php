<?php
require_once __DIR__.'/../../models/Department.php';
if(isset($_POST['submit']))
{
    $addDept = new AdminAddDept();
    $addDept->getDeptInput();;

}
class AdminAddDept
{
public function getDeptInput()
{
    $objAddDept=new Department();
    $deptName=$_POST['deptName'];
    $deptAbbr=$_POST['deptAbbr'];
    if($deptName!=null && $deptAbbr!=null)
    {
        if($objAddDept->checkDeptName($deptName,$deptAbbr))
        {
            echo "<script>alert('Department Name Already Exists.');
                    window.location.href='../../views/admin/newDepartment.php';</script>";
        }
        else
        {
            $this->addDepartment($deptAbbr,$deptName);
        }
    }
    else
    {
        echo "<script>alert('Fill All Fields');
            window.location.href='../../views/admin/newDepartment.php';</script>";
    }
}
public function addDepartment($deptAbbr,$deptName)
{
    $objAddDept=new Department();
    $user=$objAddDept->addDepartment($deptAbbr,$deptName);
    if($user)
    {
        echo "<script>alert('Department Name Added.');
window.location.href='../../views/admin/newDepartment.php';</script>";
    }
    else
    {
        echo "<script>alert('Failed.');
window.location.href='../../views/admin/newDepartment.php';</script>";

    }


}
}
