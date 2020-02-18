<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

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
require_once __DIR__."/../models/email/Email.php";

session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if($role == Constants::roleFaculty)
    {
        if(!$objEmployee->checkEmailRole($email,Constants::roleFaculty))//check realtime role
        {
            header("Location: ../LogoutController.php");
            exit();
        }
    }
    elseif($role == Constants::roleHod)
    {
        if(!$objEmployee->checkEmailRole($email,Constants::roleHod))
        {
            header("Location: ../LogoutController.php");
            exit();
        }
    }
    else
    {
        header("Location: ../LogoutController.php");
        exit();
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
            header("Location: ../../views/hod/changePassword.php");
            exit();
        }
    }
}
else
{
    header('Location: ../../views/index.php');
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

            $role = $_SESSION['role'];
            if(Constants::roleFaculty == $role)
                $path = "faculty";
            else
                $path = "hod";


            $objEmployee = new Employee();
            $e_id = $objEmployee->getEid($_SESSION['email']);

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

                $c51_path = $row['c51_path'];
                $c52_path = $row['c52_path'];
                $c53_path = $row['c53_path'];
                $c54_path = $row['c54_path'];

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
                $c87_path = $row['c87_path'];
            }
            else
                echo '<script>window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';


            if(!empty($_FILES['c11_path']['name']))
            {
                $size = $_FILES['c11_path']['size'];
                $type = $_FILES['c11_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c11_path = $year."_c11_".$row['e_id'];

                    move_uploaded_file($_FILES['c11_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c11_path.".".$extention);
                    $c11_path="uploads/".$path."/documents/".$c11_path.".".$extention;
                }
            }

            if(!empty($_FILES['c12_path']['name']))
            {
                $size = $_FILES['c12_path']['size'];
                $type = $_FILES['c12_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c12_path = $year."_c12_".$row['e_id'];

                    move_uploaded_file($_FILES['c12_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c12_path.".".$extention);
                    $c12_path="uploads/".$path."/documents/".$c12_path.".".$extention;
                }
            }


            $c11 = floatval($_POST['c11']); //echo $c11;
            $c12 = floatval($_POST['c12']); //echo $c12;
            $c1_total = 0.0;


            if($c11 >= 0 && $c11 <= 100 && $c12 >= 0 && $c12 <= 100)
            {
                //validate fields for submit c1 and update total
                if(isset($_POST['submit']))
                {
                    $c11_x = $c11 / 10.0;
                    $c12_x = $c12 / 10.0;
                    $c1_total = ( ($c11_x * 15) + ($c12_x * 15) ) / 30;

                    //echo "c11 :".$c11." c11x :".$c11_x."c12 : ".$c12." c12x : ".$c12_x."c1t :".$c1_total;return;
                }

                $objC1 = new C1();
                $objC1->setC1($c11,$c11_path,$c12,$c12_path,$c1_total,$pbsaId);
            }
            else
                echo '<script>alert("Invalid Values In Criteria 1");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';



            if(!empty($_FILES['c21_path']['name']))
            {
                $size = $_FILES['c21_path']['size'];
                $type = $_FILES['c21_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c21_path = $year."_c21_".$row['e_id'];

                    move_uploaded_file($_FILES['c21_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c21_path.".".$extention);
                    $c21_path="uploads/".$path."/documents/".$c21_path.".".$extention;
                }
            }

            if(!empty($_FILES['c22_path']['name']))
            {
                $size = $_FILES['c22_path']['size'];
                $type = $_FILES['c22_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c22_path = $year."_c22_".$row['e_id'];

                    move_uploaded_file($_FILES['c22_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c22_path.".".$extention);
                    $c22_path="uploads/".$path."/documents/".$c22_path.".".$extention;
                }
            }


            if(!empty($_FILES['c23_path']['name']))
            {
                $size = $_FILES['c23_path']['size'];
                $type = $_FILES['c23_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c23_path = $year."_c23_".$row['e_id'];

                    move_uploaded_file($_FILES['c23_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c23_path.".".$extention);
                    $c23_path="uploads/".$path."/documents/".$c23_path.".".$extention;
                }
            }

            if(!empty($_FILES['c24_path']['name']))
            {
                $size = $_FILES['c24_path']['size'];
                $type = $_FILES['c24_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c24_path = $year."_c24_".$row['e_id'];

                    move_uploaded_file($_FILES['c24_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c24_path.".".$extention);
                    $c24_path="uploads/".$path."/documents/".$c24_path.".".$extention;
                }
            }

            $c21 = floatval($_POST['c21']); //echo $c21;
            $c22 = floatval($_POST['c22']); //echo $c22;
            $c23 = floatval($_POST['c23']); //echo $c23;
            $c24 = floatval($_POST['c24']); //echo $c24;
            $c2_total = 0;


            if($c21 >= 0 && $c21 <= 100 && $c22 >= 0 && $c22 <= 100 && $c23 >= 0 && $c23 <= 100 && $c24 >= 0 && $c24 <= 100)
            {
                //validate fields for submit c2 and update total
                if(isset($_POST['submit']))
                {
                    $c21_x = $c21 / 10.0;
                    $c22_x = $c22 / 10.0;
                    $c23_x = $c23 / 10.0;
                    $c24_x = $c24 / 10.0;
                    $c2_total = ( ($c21_x * 3) + ($c22_x * 4) + ($c23_x * 2) + ($c24_x * 1)) / 10;
                }

                $objC2 = new C2();
                $objC2->setC2($c21,$c21_path,$c22,$c22_path,$c23,$c23_path,$c24,$c24_path,$c2_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 2");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';




            if(!empty($_FILES['c31_path']['name']))
            {
                $size = $_FILES['c31_path']['size'];
                $type = $_FILES['c31_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c31_path = $year."_c31_".$row['e_id'];

                    move_uploaded_file($_FILES['c31_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c31_path.".".$extention);
                    $c31_path="uploads/".$path."/documents/".$c31_path.".".$extention;
                }
            }

            if(!empty($_FILES['c32_path']['name']))
            {
                $size = $_FILES['c32_path']['size'];
                $type = $_FILES['c32_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c32_path = $year."_c32_".$row['e_id'];

                    move_uploaded_file($_FILES['c32_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c32_path.".".$extention);
                    $c32_path="uploads/".$path."/documents/".$c32_path.".".$extention;
                }
            }


            $c31_1 = intval($_POST['c31_1']); //echo $c31_1;
            $c31_2 = intval($_POST['c31_2']); //echo $c31_2;
            $c31_3 = intval($_POST['c31_3']); //echo $c31_3;
            $c31_4 = intval($_POST['c31_4']); //echo $c31_4;
            $c31_5 = intval($_POST['c31_5']); //echo $c31_5;


            $c32_1 = intval($_POST['c32_1']); //echo $c32_1;
            $c32_2 = intval($_POST['c32_2']); //echo $c32_2;
            $c32_3 = intval($_POST['c32_3']); //echo $c32_3;
            $c32_4 = intval($_POST['c32_4']); //echo $c32_4;
            $c32_5 = intval($_POST['c32_5']); //echo $c32_5;
            $c32_6 = intval($_POST['c32_6']); //echo $c32_6;
            $c32_7 = intval($_POST['c32_7']); //echo $c32_7;
            $c32_8 = intval($_POST['c32_8']); //echo $c32_8;
            $c32_9 = intval($_POST['c32_9']); //echo $c32_9;
            $c32_10 = intval($_POST['c32_10']); //echo $c32_10;
            $c32_11 = intval($_POST['c32_11']); //echo $c32_11;
            $c32_12 = intval($_POST['c32_12']); //echo $c32_12;
            $c32_13 = intval($_POST['c32_13']); //echo $c32_13;
            $c32_14 = intval($_POST['c32_14']); //echo $c32_14;
            $c32_15 = intval($_POST['c32_15']); //echo $c32_15;
            $c32_16 = intval($_POST['c32_16']); //echo $c32_16;
            $c32_17 = intval($_POST['c32_17']); //echo $c32_17;
            $c32_18 = intval($_POST['c32_18']); //echo $c32_18;
            $c32_19 = intval($_POST['c32_19']); //echo $c32_19;
            $c3_total = 0;



            if($c31_1 >= 0 && $c31_1 <= 100 && $c31_2 >= 0 && $c31_2 <= 100 && $c31_3 >= 0 && $c31_3 <= 100 && $c31_4 >= 0 && $c31_4 <= 100 && $c31_5 >= 0 && $c31_5 <= 100 && $c32_1 >= 0 && $c32_1 <= 100 && $c32_2 >= 0 && $c32_2 <= 100 && $c32_3 >= 0 && $c32_3 <= 100 && $c32_4 >= 0 && $c32_4 <= 100 && $c32_5 >= 0 && $c32_5 <= 100 && $c32_6 >= 0 && $c32_6 <= 100 && $c32_7 >= 0 && $c32_7 <= 100 && $c32_8 >= 0 && $c32_8 <= 100 && $c32_9 >= 0 && $c32_9 <= 100 && $c32_10 >= 0 && $c32_10 <= 100 && $c32_11 >= 0 && $c32_11 <= 100 && $c32_12 >= 0 && $c32_12 <= 100 && $c32_13 >= 0 && $c32_13 <= 100 && $c32_14 >= 0 && $c32_14 <= 100 && $c32_15 >= 0 && $c32_15 <= 100 && $c32_16 >= 0 && $c32_16 <= 100 && $c32_17 >= 0 && $c32_17 <= 100 && $c32_18 >= 0 && $c32_18 <= 100 && $c32_19 >= 0 && $c32_19 <= 100)
            {
                //validate fields for submit c3
                if(isset($_POST['submit']))
                {
                    if($c31_1 >= 5)
                        $c31_1_x = 10;
                    else
                        $c31_1_x = $c31_1 * 2;//simplified logic

                    if($c31_2 >= 10)
                        $c31_2_x = 10;
                    else
                        $c31_2_x = $c31_2;

                    if($c31_3 >= 2)
                        $c31_3_x = 10;
                    else
                        $c31_3_x = $c31_3 * 5;

                    if($c31_4 >= 2)
                        $c31_4_x = 10;
                    else
                        $c31_4_x = $c31_4 * 5;

                    if($c31_5 >= 4)
                        $c31_5_x = 10;
                    else
                        $c31_5_x = $c31_5 * 2.5;

                    $c31_x = $c31_1_x + $c31_2_x + $c31_3_x + $c31_4_x + $c31_5_x;//for 50

                    if($c32_1 >= 20)
                        $c32_1_x = 10;
                    else
                        $c32_1_x = $c32_1 * 0.5;

                    if($c32_2 >= 20)
                        $c32_2_x = 10;
                    else
                        $c32_2_x = $c32_2 * 0.5;

                    if($c32_3 >= 5)
                        $c32_3_x = 10;
                    else
                        $c32_3_x = $c32_3 * 2;

                    if($c32_4 >= 1)
                        $c32_4_x = 10;
                    else
                        $c32_4_x = 0;

                    if($c32_5 >= 5)
                        $c32_5_x = 10;
                    else
                        $c32_5_x = $c32_5 * 2;

                    if($c32_6 >= 2)
                        $c32_6_x = 10;
                    else
                        $c32_6_x = $c32_6 * 5;

                    if($c32_7 >= 1)
                        $c32_7_x = 10;
                    else
                        $c32_7_x = 0;

                    if($c32_8 >= 1)
                        $c32_8_x = 10;
                    else
                        $c32_8_x = 0;

                    if($c32_9 >= 2)
                        $c32_9_x = 10;
                    else
                        $c32_9_x = $c32_9 * 5;

                    if($c32_10 >= 1)
                        $c32_10_x = 10;
                    else
                        $c32_10_x = 0;

                    if($c32_11 >= 2)
                        $c32_11_x = 10;
                    else
                        $c32_11_x = $c32_11 * 5;

                    if($c32_12 >= 2)
                        $c32_12_x = 10;
                    else
                        $c32_12_x = $c32_12 * 5;

                    if($c32_13 >= 2)
                        $c32_13_x = 10;
                    else
                        $c32_13_x = $c32_13 * 5;

                    if($c32_14 >= 1)
                        $c32_14_x = 10;
                    else
                        $c32_14_x = 0;

                    if($c32_15 >= 1)
                        $c32_15_x = 10;
                    else
                        $c32_15_x = 0;

                    if($c32_16 >= 1)
                        $c32_16_x = 10;
                    else
                        $c32_16_x = 0;

                    if($c32_17 >= 1)
                        $c32_17_x = 10;
                    else
                        $c32_17_x = 0;

                    if($c32_18 >= 2)
                        $c32_18_x = 10;
                    else
                        $c32_18_x = $c32_18 * 5;

                    if($c32_19 >= 2)
                        $c32_19_x = 10;
                    else
                        $c32_19_x = $c32_19 * 5;

                    $c32_x = $c32_1_x + $c32_2_x + $c32_3_x + $c32_4_x + $c32_5_x + $c32_6_x + $c32_7_x + $c32_8_x + $c32_9_x + $c32_10_x + $c32_11_x + $c32_12_x + $c32_13_x + $c32_14_x + $c32_15_x + $c32_16_x + $c32_17_x + $c32_18_x + $c32_19_x ;

                    if($c32_x >= 50)//190 can be achieved but max is 50
                        $c32_x = 50;

                    $c3_total = ($c31_x + $c32_x) / 10;

                }

                $objC3 = new C3();
                $objC3->setC3($c31_1,$c31_2,$c31_3,$c31_4,$c31_5,$c31_path,$c32_1,$c32_2,$c32_3,$c32_4,$c32_5,$c32_6,$c32_7,$c32_8,$c32_9,$c32_10,$c32_11,$c32_12,$c32_13,$c32_14,$c32_15,$c32_16,$c32_17,$c32_18,$c32_19,$c32_path,$c3_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 3");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';




            if(!empty($_FILES['c41_path']['name']))
            {
                $size = $_FILES['c41_path']['size'];
                $type = $_FILES['c41_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c41_path = $year."_c41_".$row['e_id'];

                    move_uploaded_file($_FILES['c41_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c41_path.".".$extention);
                    $c41_path="uploads/".$path."/documents/".$c41_path.".".$extention;
                }
            }

            if(!empty($_FILES['c42_path']['name']))
            {
                $size = $_FILES['c42_path']['size'];
                $type = $_FILES['c42_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c42_path = $year."_c42_".$row['e_id'];

                    move_uploaded_file($_FILES['c42_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c42_path.".".$extention);
                    $c42_path="uploads/".$path."/documents/".$c42_path.".".$extention;
                }
            }


            if(!empty($_FILES['c43_path']['name']))
            {
                $size = $_FILES['c43_path']['size'];
                $type = $_FILES['c43_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c43_path = $year."_c43_".$row['e_id'];

                    move_uploaded_file($_FILES['c43_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c43_path.".".$extention);
                    $c43_path="uploads/".$path."/documents/".$c43_path.".".$extention;
                }
            }


            $c41_1_1 = floatval($_POST['c41_1_1']); //echo $c41_1_1;
            $c41_1_2 = floatval($_POST['c41_1_2']); //echo $c41_1_2;
            $c41_2_1 = floatval($_POST['c41_2_1']); //echo $c41_2_1;
            $c41_2_2 = floatval($_POST['c41_2_2']); //echo $c41_2_2;
            $c41_3_1 = floatval($_POST['c41_3_1']); //echo $c41_3_1;
            $c41_3_2 = floatval($_POST['c41_3_2']); //echo $c41_3_2;
            $c41_4_1 = floatval($_POST['c41_4_1']); //echo $c41_4_1;
            $c41_4_2 = floatval($_POST['c41_4_2']); //echo $c41_4_2;
            $c42_1_1 = floatval($_POST['c42_1_1']); //echo $c42_1_1;
            $c42_1_2 = floatval($_POST['c42_1_2']); //echo $c42_1_2;
            $c42_1_3 = floatval($_POST['c42_1_3']); //echo $c42_1_3;
            $c42_2_1 = floatval($_POST['c42_2_1']); //echo $c42_2_1;
            $c42_2_2 = floatval($_POST['c42_2_2']); //echo $c42_2_2;
            $c42_2_3 = floatval($_POST['c42_2_3']); //echo $c42_2_3;
            $c43_1 = floatval($_POST['c43_1']); //echo $c43_1;
            $c43_2 = floatval($_POST['c43_2']); //echo $c43_2;
            $c4_total = 0;


            if($c41_1_1 >= 0 && $c41_1_1 <= 100 && $c41_1_2 >= 0 && $c41_1_2 <= 100 && $c41_2_1 >= 0 && $c41_2_1 <= 100 && $c41_2_2 >= 0 && $c41_2_2 <= 100 && $c41_3_1 >= 0 && $c41_3_1 <= 100 && $c41_3_2 >= 0 && $c41_3_2 <= 100 && $c41_4_1 >= 0 && $c41_4_1 <= 100 && $c41_4_2 >= 0 && $c41_4_2 <= 100 && $c42_1_1 >= 0 && $c42_1_1 <= 100 && $c42_1_2 >= 0 && $c42_1_2 <= 100 && $c42_1_3 >= 0 && $c42_1_3 <= 100 && $c42_2_1 >= 0 && $c42_2_1 <= 100 && $c42_2_2 >= 0 && $c42_2_2 <= 100 && $c42_2_3 >= 0 && $c42_2_3 <= 100 && $c43_1 >= 0 && $c43_1 <= 100 && $c43_2 >= 0 && $c43_2 <= 100)
            {
                //validate fields for submit c4 and update total
                if(isset($_POST['submit']))
                {
                    $c4_x = ($c41_1_1 * 20) + ($c41_1_2 * 10) + ($c41_2_1 * 15) + ($c41_2_2 * 8) + ($c41_3_1 * 10) + ($c41_3_2 * 5) + ($c41_4_1 * 10) + ($c41_4_2 * 5);
                    $c4_x += ($c42_1_1 * 10) + ($c42_1_2 * 8) + ($c42_1_3 * 5) + ($c42_2_1 * 20) + ($c42_2_2 * 15) + ($c42_2_3 * 10);
                    $c4_x += ($c43_1 * 5) + ($c43_2 * 10);

                    if($c4_x >= 30)// max is 30
                        $c4_x = 30;

                    $c4_total = $c4_x / 30;
                }

                $objC4 = new C4();
                $objC4->setC4($c41_1_1,$c41_1_2,$c41_2_1,$c41_2_2,$c41_3_1,$c41_3_2,$c41_4_1,$c41_4_2,$c41_path,$c42_1_1,$c42_1_2,$c42_1_3,$c42_2_1,$c42_2_2,$c42_2_3,$c42_path,$c43_1,$c43_2,$c43_path,$c4_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 4");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';




            if(isset($_POST['phd']))
                $phd = 0;
            else
                $phd = 1;



            if(!empty($_FILES['c51_path']['name']))
            {
                $size = $_FILES['c51_path']['size'];
                $type = $_FILES['c51_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c51_path = $year."_c51_".$row['e_id'];

                    move_uploaded_file($_FILES['c51_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c51_path.".".$extention);
                    $c51_path="uploads/".$path."/documents/".$c51_path.".".$extention;
                }
            }

            if(!empty($_FILES['c52_path']['name']))
            {
                $size = $_FILES['c52_path']['size'];
                $type = $_FILES['c52_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c52_path = $year."_c52_".$row['e_id'];

                    move_uploaded_file($_FILES['c52_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c52_path.".".$extention);
                    $c52_path="uploads/".$path."/documents/".$c52_path.".".$extention;
                }
            }

            if(!empty($_FILES['c53_path']['name']))
            {
                $size = $_FILES['c53_path']['size'];
                $type = $_FILES['c53_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c53_path = $year."_c53_".$row['e_id'];

                    move_uploaded_file($_FILES['c53_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c53_path.".".$extention);
                    $c53_path="uploads/".$path."/documents/".$c53_path.".".$extention;
                }
            }

            if(!empty($_FILES['c54_path']['name']))
            {
                $size = $_FILES['c54_path']['size'];
                $type = $_FILES['c54_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c54_path = $year."_c54_".$row['e_id'];

                    move_uploaded_file($_FILES['c54_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c54_path.".".$extention);
                    $c54_path="uploads/".$path."/documents/".$c54_path.".".$extention;
                }
            }

            //date
            $c51_1 = $_POST['c51_1']; //echo $c51_1;
            $c51_2 = floatval($_POST['c51_2']); //echo $c51_2;
            $c51_3 = floatval($_POST['c51_3']); //echo $c51_3;

            $c52_1 = floatval($_POST['c52_1']); //echo $c52_1;
            $c52_2 = floatval($_POST['c52_2']); //echo $c52_2;
            $c53 = floatval($_POST['c53']); //echo $c53;
            $c54_1 = floatval($_POST['c54_1']); //echo $c54_1;
            $c54_2 = floatval($_POST['c54_2']); //echo $c54_2;
            $c5_total = 0;


            if($c51_2 >= 0 && $c51_2 <= 100 && $c51_3 >= 0 && $c51_3 <= 100 && $c52_1 >= 0 && $c52_1 <= 100 && $c52_2 >= 0 && $c52_2 <= 100 && $c53 >= 0 && $c53 <= 100 && $c54_1 >= 0 && $c54_1 <= 100 && $c54_2 >= 0 && $c54_2 <= 100 )
            {
                //validate fields for submit c5 and update total
                if(isset($_POST['submit']))
                {
                    //phd pending

                    $c5_1x = ($c52_1 * 15) + ($c52_2 * 10) + ($c53 * 5) + ($c54_1 * 5) ;
                    $c5_2x = ($c54_2 * 5);

                    if($c5_1x >= 30)
                        $c5_1x = 30;

                    if($c5_2x >= 30)
                        $c5_2x = 30;

                    $c5_total = (($c5_1x / 30) + ($c5_2x / 30)) / 2;
                }

                $objC5 = new C5();
                $objC5->setC5($phd,$c51_1,$c51_2,$c51_3,$c51_path,$c52_1,$c52_2,$c52_path,$c53,$c53_path,$c54_1,$c54_2,$c54_path,$c5_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 5");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';




            if(!empty($_FILES['c61_path']['name']))
            {
                $size = $_FILES['c61_path']['size'];
                $type = $_FILES['c61_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c61_path = $year."_c61_".$row['e_id'];

                    move_uploaded_file($_FILES['c61_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c61_path.".".$extention);
                    $c61_path="uploads/".$path."/documents/".$c61_path.".".$extention;
                }
            }

            if(!empty($_FILES['c62_path']['name']))
            {
                $size = $_FILES['c62_path']['size'];
                $type = $_FILES['c62_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c62_path = $year."_c62_".$row['e_id'];

                    move_uploaded_file($_FILES['c62_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c62_path.".".$extention);
                    $c62_path="uploads/".$path."/documents/".$c62_path.".".$extention;
                }
            }

            if(!empty($_FILES['c63_path']['name']))
            {
                $size = $_FILES['c63_path']['size'];
                $type = $_FILES['c63_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c63_path = $year."_c63_".$row['e_id'];

                    move_uploaded_file($_FILES['c63_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c63_path.".".$extention);
                    $c63_path="uploads/".$path."/documents/".$c63_path.".".$extention;
                }
            }

            if(!empty($_FILES['c64_path']['name']))
            {
                $size = $_FILES['c64_path']['size'];
                $type = $_FILES['c64_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c64_path = $year."_c64_".$row['e_id'];

                    move_uploaded_file($_FILES['c64_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c64_path.".".$extention);
                    $c64_path="uploads/".$path."/documents/".$c64_path.".".$extention;
                }
            }


            $c61_1 = floatval($_POST['c61_1']); //echo $c61_1;
            $c61_2 = floatval($_POST['c61_2']); //echo $c61_2;
            $c62 = floatval($_POST['c62']); //echo $c62;
            $c63 = floatval($_POST['c63']); //echo $c63;
            $c64 = floatval($_POST['c64']); //echo $c64;
            $c6_total = 0;


            if($c61_1 >= 0 && $c61_1 <= 100 && $c61_2 >= 0 && $c61_2 <= 100 && $c62 >= 0 && $c62 <= 100 && $c63 >= 0 && $c63 <= 100 && $c64 >= 0 && $c64 <= 100 )
            {
                //validate fields for submit c6 and update total
                if(isset($_POST['submit']))
                {
                    $c6_1x = ($c61_1 * 5) + ($c61_2 * 3) + ($c62 * 5);
                    if($c6_1x >= 20)
                        $c6_1x = 10;
                    else
                        $c6_1x = $c6_1x / 20;

                    $c6_2x = ($c63 * 5) + ($c64 * 5);
                    if($c6_2x >= 20)
                        $c6_2x = 10;
                    else
                        $c6_2x = $c6_2x / 20;

                    $c6_total = (($c6_1x * 5) + ($c6_2x * 5)) /10;
                }

                $objC6 = new C6();
                $objC6->setC6($c61_1,$c61_2,$c61_path,$c62,$c62_path,$c63,$c63_path,$c64,$c64_path,$c6_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 6");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';





            if(!empty($_FILES['c71_path']['name']))
            {
                $size = $_FILES['c71_path']['size'];
                $type = $_FILES['c71_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c71_path = $year."_c71_".$row['e_id'];

                    move_uploaded_file($_FILES['c71_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c71_path.".".$extention);
                    $c71_path="uploads/".$path."/documents/".$c71_path.".".$extention;
                }
            }

            if(!empty($_FILES['c72_path']['name']))
            {
                $size = $_FILES['c72_path']['size'];
                $type = $_FILES['c72_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c72_path = $year."_c72_".$row['e_id'];

                    move_uploaded_file($_FILES['c72_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c72_path.".".$extention);
                    $c72_path="uploads/".$path."/documents/".$c72_path.".".$extention;
                }
            }

            if(!empty($_FILES['c73_path']['name']))
            {
                $size = $_FILES['c73_path']['size'];
                $type = $_FILES['c73_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c73_path = $year."_c73_".$row['e_id'];

                    move_uploaded_file($_FILES['c73_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c73_path.".".$extention);
                    $c73_path="uploads/".$path."/documents/".$c73_path.".".$extention;
                }
            }

            if(!empty($_FILES['c74_path']['name']))
            {
                $size = $_FILES['c74_path']['size'];
                $type = $_FILES['c74_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c74_path = $year."_c74_".$row['e_id'];

                    move_uploaded_file($_FILES['c74_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c74_path.".".$extention);
                    $c74_path="uploads/".$path."/documents/".$c74_path.".".$extention;
                }
            }


            $c71_1_1 = floatval($_POST['c71_1_1']); //echo $c71_1_1;
            $c71_1_2 = floatval($_POST['c71_1_2']); //echo $c71_1_2;
            $c71_1_3 = floatval($_POST['c71_1_3']); //echo $c71_1_3;
            $c71_2_1 = floatval($_POST['c71_2_1']); //echo $c71_2_1;
            $c71_2_2 = floatval($_POST['c71_2_2']); //echo $c71_2_2;
            $c71_2_3 = floatval($_POST['c71_2_3']); //echo $c71_2_3;
            $c72_1_1 = floatval($_POST['c72_1_1']); //echo $c72_1_1;
            $c72_1_2 = floatval($_POST['c72_1_2']); //echo $c72_1_2;
            $c72_1_3 = floatval($_POST['c72_1_3']); //echo $c72_1_3;
            $c72_2_1 = floatval($_POST['c72_2_1']); //echo $c72_2_1;
            $c72_2_2 = floatval($_POST['c72_2_2']); //echo $c72_2_2;
            $c72_2_3 = floatval($_POST['c72_2_3']); //echo $c72_2_3;
            $c73_1 = floatval($_POST['c73_1']); //echo $c73_1;
            $c73_2 = floatval($_POST['c73_2']); //echo $c73_2;
            $c74 = floatval($_POST['c74']); //echo $c74;
            $c7_total = 0;


            if($c71_1_1 >= 0 && $c71_1_1 <= 100 && $c71_1_2 >= 0 && $c71_1_2 <= 100 && $c71_1_3 >= 0 && $c71_1_3 <= 100 && $c71_2_1 >= 0 && $c71_2_1 <= 100 && $c71_2_2 >= 0 && $c71_2_2 <= 100 && $c71_2_3 >= 0 && $c71_2_3 <= 100 && $c72_1_1 >= 0 && $c72_1_1 <= 100 && $c72_1_2 >= 0 && $c72_1_2 <= 100 && $c72_1_3 >= 0 && $c72_1_3 <= 100 && $c72_2_1 >= 0 && $c72_2_1 <= 100 && $c72_2_2 >= 0 && $c72_2_2 <= 100 && $c72_2_3 >= 0 && $c72_2_3 <= 100 && $c73_1 >= 0 && $c73_1 <= 100 && $c73_2 >= 0 && $c73_2 <= 100 && $c74 >= 0 && $c74 <= 100 )
            {
                //validate fields for submit c7 and update total
                if(isset($_POST['submit']))
                {
                    $c7_x = ($c71_1_1 * 10) + ($c71_1_2 * 5) + ($c71_1_3 * 5) + ($c71_2_1 * 20) + ($c71_2_2 * 10) + ($c71_2_3 * 5);
                    $c7_x += ($c72_1_1 * 5) + ($c72_1_2 * 3) + ($c72_1_3 * 2) + ($c72_2_1 * 10) + ($c72_2_2 * 5) + ($c72_2_3 * 3);
                    $c7_x += ($c73_1 * 5) + ($c73_2 * 2) + ($c74 * 5);

                    if($c7_x >= 20)
                        $c7_x = 20;

                    $c7_total = $c7_x / 20;
                }

                $objC7 = new C7();
                $objC7->setC7($c71_1_1,$c71_1_2,$c71_1_3,$c71_2_1,$c71_2_2,$c71_2_3,$c71_path,$c72_1_1,$c72_1_2,$c72_1_3,$c72_2_1,$c72_2_2,$c72_2_3,$c72_path,$c73_1,$c73_2,$c73_path,$c74,$c74_path,$c7_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 7");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';




            if(!empty($_FILES['c81_path']['name']))
            {
                $size = $_FILES['c81_path']['size'];
                $type = $_FILES['c81_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c81_path = $year."_c81_".$row['e_id'];

                    move_uploaded_file($_FILES['c81_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c81_path.".".$extention);
                    $c81_path="uploads/".$path."/documents/".$c81_path.".".$extention;
                }
            }

            if(!empty($_FILES['c82_path']['name']))
            {
                $size = $_FILES['c82_path']['size'];
                $type = $_FILES['c82_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c82_path = $year."_c82_".$row['e_id'];

                    move_uploaded_file($_FILES['c82_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c82_path.".".$extention);
                    $c82_path="uploads/".$path."/documents/".$c82_path.".".$extention;
                }
            }

            if(!empty($_FILES['c83_path']['name']))
            {
                $size = $_FILES['c83_path']['size'];
                $type = $_FILES['c83_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c83_path = $year."_c83_".$row['e_id'];

                    move_uploaded_file($_FILES['c83_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c83_path.".".$extention);
                    $c83_path="uploads/".$path."/documents/".$c83_path.".".$extention;
                }
            }

            if(!empty($_FILES['c84_path']['name']))
            {
                $size = $_FILES['c84_path']['size'];
                $type = $_FILES['c84_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c84_path = $year."_c84_".$row['e_id'];

                    move_uploaded_file($_FILES['c84_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c84_path.".".$extention);
                    $c84_path="uploads/".$path."/documents/".$c84_path.".".$extention;
                }
            }

            if(!empty($_FILES['c85_path']['name']))
            {
                $size = $_FILES['c85_path']['size'];
                $type = $_FILES['c85_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c85_path = $year."_c85_".$row['e_id'];

                    move_uploaded_file($_FILES['c85_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c85_path.".".$extention);
                    $c85_path="uploads/".$path."/documents/".$c85_path.".".$extention;
                }
            }

            if(!empty($_FILES['c86_path']['name']))
            {
                $size = $_FILES['c86_path']['size'];
                $type = $_FILES['c86_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c86_path = $year."_c86_".$row['e_id'];

                    move_uploaded_file($_FILES['c86_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c86_path.".".$extention);
                    $c86_path="uploads/".$path."/documents/".$c86_path.".".$extention;
                }
            }


            if(!empty($_FILES['c87_path']['name']))
            {
                $size = $_FILES['c87_path']['size'];
                $type = $_FILES['c87_path']['type'];
                if (($size > 3145728))
                {
                    $message = 'File too large. File must be less than 3 megabytes.';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                elseif ($type != "application/pdf")
                {
                    $message = 'Invalid file type';
                    echo '<script>alert("'.$message.'");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    $extention= substr_replace($type,"",0,12);
                    $c87_path = $year."_c87_".$row['e_id'];

                    move_uploaded_file($_FILES['c87_path']['tmp_name'],__DIR__.'/../../uploads/'.$path.'/documents/'.$c87_path.".".$extention);
                    $c87_path="uploads/".$path."/documents/".$c87_path.".".$extention;
                }
            }


            $c81_1_1 = floatval($_POST['c81_1_1']); //echo $c81_1_1;
            $c81_1_2 = floatval($_POST['c81_1_2']); //echo $c81_1_2;
            $c81_2_1 = floatval($_POST['c81_2_1']); //echo $c81_2_1;
            $c81_2_2 = floatval($_POST['c81_2_2']); //echo $c81_2_2;
            $c81_3_1 = floatval($_POST['c81_3_1']); //echo $c81_3_1;
            $c81_3_2 = floatval($_POST['c81_3_2']); //echo $c81_3_2;
            $c82 = floatval($_POST['c82']); //echo $c82;
            $c83 = floatval($_POST['c83']); //echo $c83;
            $c84_1 = floatval($_POST['c84_1']); //echo $c84_1;
            $c84_2 = floatval($_POST['c84_2']); //echo $c84_2;
            $c85_1 = floatval($_POST['c85_1']); //echo $c85_1;
            $c85_2 = floatval($_POST['c85_2']); //echo $c85_2;
            $c85_3 = floatval($_POST['c85_3']); //echo $c85_3;
            $c85_4 = floatval($_POST['c85_4']); //echo $c85_4;
            $c86 = floatval($_POST['c86']); //echo $c86;
            $c87_1 = floatval($_POST['c87_1']); //echo $c87_1;
            $c87_2 = floatval($_POST['c87_2']); //echo $c87_2;
            $c87_3 = floatval($_POST['c87_3']); //echo $c87_3;
            $c8_total = 0;


            if($c81_1_1 >= 0 && $c81_1_1 <= 100 && $c81_1_2 >= 0 && $c81_1_2 <= 100 && $c81_2_1 >= 0 && $c81_2_1 <= 100 && $c81_2_2 >= 0 && $c81_2_2 <= 100 && $c81_3_1 >= 0 && $c81_3_1 <= 100 && $c81_3_2 >= 0 && $c81_3_2 <= 100 && $c82 >= 0 && $c82 <= 100 && $c83 >= 0 && $c83 <= 100 && $c84_1 >= 0 && $c84_1 <= 100 && $c84_2 >= 0 && $c84_2 <= 100 && $c85_1 >= 0 && $c85_1 <= 100 && $c85_2 >= 0 && $c85_2 <= 100 && $c85_3 >= 0 && $c85_3 <= 100 && $c85_4 >= 0 && $c85_4 <= 100 && $c86 >= 0 && $c86 <= 100 && $c87_1 >= 0 && $c87_1 <= 100 && $c87_2 >= 0 && $c87_2 <= 100 && $c87_3 >= 0 && $c87_3 <= 100)
            {
                //validate fields for submit c8 and update total
                if(isset($_POST['submit']))
                {
                    $c8_x_1 = ($c81_1_1 * 15) + ($c81_1_2 * 20) + ($c81_2_1 * 10) + ($c81_2_2 * 15) + ($c81_3_1 * 5) + ($c81_3_2 * 10) + ($c82 * 20) + ($c83 * 10) + ($c84_1 * 20) + ($c84_2 * 15);

                    if($c8_x_1 >= 20)
                        $c8_x_1 = 10;
                    else
                        $c8_x_1 = $c8_x_1 /  20;

                    $c8_x_2 = ($c85_1 * 5) + ($c85_2 * 2) + ($c85_3 * 2) + ($c85_4 * 5) + ($c86 * 5) + ($c87_1 * 30) + ($c87_2 * 30) + ($c87_3 * 20);

                    if($c8_x_2 >= 20)
                        $c8_x_2 = 10;
                    else
                        $c8_x_2 = $c8_x_2 / 20;

                    $c8_total = (($c8_x_1 * 3) + ($c8_x_2 * 2)) / 5;
                }

                $objC8 = new C8();
                $objC8->setC8($c81_1_1,$c81_1_2,$c81_2_1,$c81_2_2,$c81_3_1,$c81_3_2,$c81_path,$c82,$c82_path,$c83,$c83_path,$c84_1,$c84_2,$c84_path,$c85_1,$c85_2,$c85_3,$c85_4,$c85_path,$c86,$c86_path,$c87_1,$c87_2,$c87_3,$c87_path,$c8_total,$pbsaId);

            }
            else
                echo '<script>alert("Invalid Values In Criteria 8");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';


            $emp_comments = $_POST['emp_comments'];

            if(isset($_POST['submit']))
            {
                if($objPbsaModel->submitPbsa($e_id,$year,$emp_comments,$role))
                {
                    //send mail to both , one for submission and another for higher authority.
                    $objEmail = new Email();
                    $from = "PBSA SYSTEM";
                    $submit_name = $objEmployee->getName($e_id);
                    $subject = "PBSA Submitted By '$submit_name";
                    $message = "PBSA Has Been Submitted By '$submit_name' Of The Year '$year' , Please Login And Review Their Submission.";
                    if($role == Constants::roleFaculty)
                    {
                        //send mail to his HOD
                        $toHod = $objEmployee->getHodEmail($e_id);
                        $objEmail->sendMail($from,$toHod,$subject,$message);
                    }

                    if($role == Constants::roleHod)
                    {
                        //send mail to Principal
                        $toPrincipal = $objEmployee->getPrincipalEmail();
                        $objEmail->sendMail($from,$toPrincipal,$subject,$message);
                    }

                    //send mail to submitter.
                    $to1 = $objEmployee->getEmail($e_id);
                    $subject1 = "PBSA Submitted SuccessFully";
                    if($role == Constants::roleFaculty)
                        $message1 = "PBSA Submitted Successfully For The Year '$year' , Please Wait For Approval From HOD.";
                    if($role == Constants::roleHod)
                        $message1 = "PBSA Submitted Successfully For The Year '$year' , Please Wait For Approval From Principal.";

                    $objEmail->sendMail($from,$to1,$subject1,$message1);

                    echo '<script>alert("PBSA SUBMITTED SUCCESSFULLY");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    echo '<script>alert("PBSA SUBMIT FAILED TRY AGAIN");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
            }
            elseif (isset($_POST['save']))
            {
                if($objPbsaModel->savePbsa($e_id,$year,$emp_comments))
                {
                    echo '<script>alert("PBSA SAVED SUCCESSFULLY");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
                else
                {
                    echo '<script>alert("PBSA SAVE FAILED TRY AGAIN");window.location.href="../views/'.$path.'/pbsaSystem.php?year='.$year.'";</script>';
                }
            }


        }

}