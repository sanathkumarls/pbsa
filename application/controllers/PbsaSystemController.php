<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 17/11/19
 * Time: 10:54 AM
 */

require_once __DIR__.'/../models/Employee.php';
require_once __DIR__."/../utilities/Constants.php";
require_once __DIR__."/../models/Pbsa.php";
require_once __DIR__."/../models/C1.php";
require_once __DIR__."/../models/C2.php";
require_once __DIR__."/../models/C3.php";
require_once __DIR__."/../models/C4.php";
require_once __DIR__."/../models/C5.php";
require_once __DIR__."/../models/C6.php";
require_once __DIR__."/../models/C7.php";
require_once __DIR__."/../models/C8.php";

session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::roleFaculty))//check realtime role
    {
        if(!$objEmployee->checkEmailRole($email,Constants::roleHod))
        {
            header("Location: ../LogoutController.php");
            exit();
        }
    }
    if($changePassword == 1)
    {
        if($role == Constants::roleFaculty)
        {
            header("Location: ../../views/faculty/changePassword.php");
            exit();
        }
        if($role == Constants::roleHod)
        {
            header("Location: ../../views/faculty/changePassword.php");
            exit();
        }
    }
}
else
{
    header('Location: ../../views/faculty/index.php');
    exit();
}


if(isset($_POST['save']) || isset($_POST['submit']))
{
    $objPbsa = new PbsaSystemController();
    if(isset($_POST['submit']))
        $year = $_POST['submit'];
    else
        $year = $_POST['save'];
    $objPbsa->getUserInput($year);
}

class PbsaSystemController
{
        function getUserInput($year)
        {
            //echo $year;
            $objEmployeeModel = new Employee();
            $e_id = $objEmployeeModel->getEid($_SESSION['email']);

            $objPbsaModel = new Pbsa();
            if(!$objPbsaModel->getPbsa($e_id,$year))
                $objPbsaModel->createPbsa($e_id,$year);

            $result = $objPbsaModel->getPbsaCriteria($e_id,$year);
            if($result)
            {
                $row = $result->fetch_assoc();
                $pbsaId = $row['pbsa_id']; //echo $pbsaId;

                $c11_path = $row['c11_path']; //echo $c11_path;
                $c12_path = $row['c12_path'];

                $c21_path = $row['c21_path'];
                $c22_path = $row['c22_path'];
                $c23_path = $row['c23_path'];
                $c24_path = $row['c24_path'];

                $c31_path = $row['c31_path'];
                $c32_path = $row['c32_path'];

                $c41_path = $row['c41_path'];
                $c42_path = $row['c42_path'];
                $c43_path = $row['c43_path'];
                $c44_path = $row['c44_path'];
                $c45_path = $row['c45_path'];

                $c51_path = $row['c51_path'];
                $c52_path = $row['c52_path'];
                $c53_path = $row['c53_path'];

                $c61_path = $row['c61_path'];
                $c62_path = $row['c62_path'];
                $c63_path = $row['c63_path'];
                $c64_path = $row['c64_path'];

                $c71_path = $row['c71_path'];
                $c72_path = $row['c72_path'];
                $c73_path = $row['c73_path'];
                $c74_path = $row['c74_path'];

                $c81_path = $row['c81_path'];
                $c82_path = $row['c82_path'];
                $c83_path = $row['c83_path'];
                $c84_path = $row['c84_path'];
                $c85_path = $row['c85_path'];
                $c86_path = $row['c86_path'];
            }
            else
                return;


            if(Constants::roleFaculty == $_SESSION['role'])
                $path = "faculty";
            else
                $path = "hod";


            $c11 = $_POST['c11']; //echo $c11;
            $c12 = $_POST['c12']; //echo $c12;
            $c1_total = 0;


            if(!empty($_FILES['c11_path']['name']))
            {
                $size = $_FILES['c11_path']['size'];
                $type = $_FILES['c11_path']['type'];
                if (($size > 5242880))
                {
                    $message = 'File too large. File must be less than 5 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'&edit=true";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'&edit=true";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c11_path = $year."_c11_".$row['e_id'];

                    move_uploaded_file($_FILES['c11_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c11_path.".".$extention);
                    $c11_path="uploads/".$path."/documents/".$c11_path.".".$extention;
                }
            }

            //validate fields for submit c1 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC1 = new C1();
            $objC1->setC1($c11,$c11_path,$c12,$c12_path,$c1_total,$pbsaId);


            $c21 = $_POST['c21']; //echo $c21;
            $c22 = $_POST['c22']; //echo $c22;
            $c23 = $_POST['c23']; //echo $c23;
            $c24 = $_POST['c24']; //echo $c24;
            $c2_total = 0;

            //validate fields for submit c2 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC2 = new C2();
            $objC2->setC2($c21,$c21_path,$c22,$c22_path,$c23,$c23_path,$c24,$c24_path,$c2_total,$pbsaId);


            $c31_1 = $_POST['c31_1']; //echo $c31_1;
            $c31_2 = $_POST['c31_2']; //echo $c31_2;
            $c31_3 = $_POST['c31_3']; //echo $c31_3;
            $c31_4 = $_POST['c31_4']; //echo $c31_4;
            $c31_5 = $_POST['c31_5']; //echo $c31_5;
            $c31_total = 0;


            $c32_1 = $_POST['c32_1']; //echo $c32_1;
            $c32_2 = $_POST['c32_2']; //echo $c32_2;
            $c32_3 = $_POST['c32_3']; //echo $c32_3;
            $c32_4 = $_POST['c32_4']; //echo $c32_4;
            $c32_5 = $_POST['c32_5']; //echo $c32_5;
            $c32_6 = $_POST['c32_6']; //echo $c32_6;
            $c32_7 = $_POST['c32_7']; //echo $c32_7;
            $c32_8 = $_POST['c32_8']; //echo $c32_8;
            $c32_9 = $_POST['c32_9']; //echo $c32_9;
            $c32_10 = $_POST['c32_10']; //echo $c32_10;
            $c32_11 = $_POST['c32_11']; //echo $c32_11;
            $c32_12 = $_POST['c32_12']; //echo $c32_12;
            $c32_13 = $_POST['c32_13']; //echo $c32_13;
            $c32_14 = $_POST['c32_14']; //echo $c32_14;
            $c32_15 = $_POST['c32_15']; //echo $c32_15;
            $c32_16 = $_POST['c32_16']; //echo $c32_16;
            $c32_17 = $_POST['c32_17']; //echo $c32_17;
            $c32_18 = $_POST['c32_18']; //echo $c32_18;
            $c32_19 = $_POST['c32_19']; //echo $c32_19;
            $c32_total = 0;

            //validate fields for submit
            if(isset($_POST['submit']))
            {

            }

            $objC3 = new C3();
            $objC3->setC3($c31_1,$c31_2,$c31_3,$c31_4,$c31_5,$c31_path,$c31_total,$c32_1,$c32_2,$c32_3,$c32_4,$c32_5,$c32_6,$c32_7,$c32_8,$c32_9,$c32_10,$c32_11,$c32_12,$c32_13,$c32_14,$c32_15,$c32_16,$c32_17,$c32_18,$c32_19,$c32_path,$c32_total,$pbsaId);


            $c41 = $_POST['c41']; //echo $c41;
            $c42 = $_POST['c42']; //echo $c42;
            $c43 = $_POST['c43']; //echo $c43;
            $c44 = $_POST['c44']; //echo $c44;
            $c45 = $_POST['c45']; //echo $c45;
            $c4_total = 0;

            //validate fields for submit c4 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC4 = new C4();
            $objC4->setC4($c41,$c41_path,$c42,$c42_path,$c43,$c43_path,$c44,$c44_path,$c45,$c45_path,$c4_total,$pbsaId);

            $c51_1 = $_POST['c51_1']; //echo $c51_1;
            $c51_2 = $_POST['c51_2']; //echo $c51_2;
            $c51_3 = $_POST['c51_3']; //echo $c51_3;

            $c52 = $_POST['c52']; //echo $c52;
            $c53 = $_POST['c53']; //echo $c53;
            $c5_total = 0;

            //validate fields for submit c5 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC5 = new C5();
            $objC5->setC5($c51_1,$c51_2,$c51_3,$c51_path,$c52,$c52_path,$c53,$c53_path,$c5_total,$pbsaId);

            $c61 = $_POST['c61']; //echo $c61;
            $c62 = $_POST['c62']; //echo $c62;
            $c63 = $_POST['c63']; //echo $c63;
            $c64 = $_POST['c64']; //echo $c64;
            $c6_total = 0;

            //validate fields for submit c6 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC6 = new C6();
            $objC6->setC6($c61,$c61_path,$c62,$c62_path,$c63,$c63_path,$c64,$c64_path,$c6_total,$pbsaId);

            $c71 = $_POST['c71']; //echo $c71;
            $c72 = $_POST['c72']; //echo $c72;
            $c73 = $_POST['c73']; //echo $c73;
            $c74 = $_POST['c74']; //echo $c74;
            $c7_total = 0;

            //validate fields for submit c7 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC7 = new C7();
            $objC7->setC7($c71,$c71_path,$c72,$c72_path,$c73,$c73_path,$c74,$c74_path,$c7_total,$pbsaId);

            $c81 = $_POST['c81']; //echo $c81;
            $c82 = $_POST['c82']; //echo $c82;
            $c83 = $_POST['c83']; //echo $c83;
            $c84 = $_POST['c84']; //echo $c84;
            $c85 = $_POST['c85']; //echo $c85;
            $c86 = $_POST['c86']; //echo $c86;
            $c8_total = 0;


            //validate fields for submit c8 and update total
            if(isset($_POST['submit']))
            {

            }

            $objC8 = new C8();
            $objC8->setC8($c81,$c81_path,$c82,$c82_path,$c83,$c83_path,$c84,$c84_path,$c85,$c85_path,$c86,$c86_path,$c8_total,$pbsaId);


            if(isset($_POST['submit']))
            {
                if($objPbsaModel->submitPbsa($e_id,$year))
                {
                    echo '<script>alert("PBSA SUBMITTED SUCCESSFULLY");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    echo '<script>alert("PBSA SUBMIT FAILED TRY AGAIN");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'&edit=true";</script>';
                }
            }
            elseif (isset($_POST['save']))
            {
                if($objPbsaModel->savePbsa($e_id,$year))
                {
                    echo '<script>alert("PBSA SAVED SUCCESSFULLY");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'&edit=true";</script>';
                }
                else
                {
                    echo '<script>alert("PBSA SAVE FAILED TRY AGAIN");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'&edit=true";</script>';
                }
            }


        }

}