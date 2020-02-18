<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 31/01/20
 * Time: 1:41 PM
 */


require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Pbsa.php";
header('Cache-Control: no cache'); //no cache
header('Pragma: no-cache');
session_cache_limiter('private_no_expire'); // works
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
    {
        header("Location: ../../controllers/LogoutController.php");
        exit();
    }
    if($changePassword == 1)
    {
        header("Location: changePassword.php");
        exit();
    }
}
else
{
    header('Location: index.php');
    exit();
}

if(isset($_POST['faculty_id']) && isset($_POST['year']))
{
    $faculty_id = $_POST['faculty_id']; //echo $faculty_id;
    $year = $_POST['year']; //echo $year;

    $faculty_name = $objEmployee->getName($faculty_id);


    //check for submitted
    $objPbsa = new Pbsa();
    if(!$objPbsa->checkPbsaSubmitted($faculty_id,$year))
        header("Location: verifyPbsa.php");
}
else
{
    header("Location: verifyPbsa.php");
    exit();
}


$result = $objPbsa->getPbsaCriteria($faculty_id,$year);

$c11="";$c11_path="";$c12="";$c12_path="";

$c21="";$c21_path="";$c22="";$c22_path="";$c23="";$c23_path="";$c24="";$c24_path="";

$c31_1="";$c31_2="";$c31_3="";$c31_4="";$c31_5="";$c31_path="";$c32_1="";$c32_2="";$c32_3="";$c32_4="";$c32_5="";$c32_6="";$c32_7="";$c32_8="";$c32_9="";$c32_10="";$c32_11="";$c32_12="";$c32_13="";$c32_14="";$c32_15="";$c32_16="";$c32_17="";$c32_18="";$c32_19="";$c32_path="";

$c41_1_1="";$c41_1_2="";$c41_2_1="";$c41_2_2="";$c41_3_1="";$c41_3_2="";$c41_4_1="";$c41_4_2="";$c41_path="";$c42_1_1="";$c42_1_2="";$c42_1_3="";$c42_2_1="";$c42_2_2="";$c42_2_3="";$c42_path="";$c43_1="";$c43_2="";$c43_path="";

$phd="";$c51_1="";$c51_2="";$c51_3="";$c51_path="";$c52_1="";$c52_2="";$c52_path="";$c53="";$c53_path="";$c54_1="";$c54_2="";$c54_path="";

$c61_1="";$c61_2="";$c61_path="";$c62="";$c62_path="";$c63="";$c63_path="";$c64="";$c64_path="";

$c71_1_1="";$c71_1_2="";$c71_1_3="";$c71_2_1="";$c71_2_2="";$c71_2_3="";$c71_path="";$c72_1_1="";$c72_1_2="";$c72_1_3="";$c72_2_1="";$c72_2_2="";$c72_2_3="";$c72_path="";$c73_1="";$c73_2="";$c73_path="";$c74="";$c74_path="";

$c81_1_1="";$c81_1_2="";$c81_2_1="";$c81_2_2="";$c81_3_1="";$c81_3_2="";$c81_path="";$c82="";$c82_path="";$c83="";$c83_path="";$c84_1="";$c84_2="";$c84_path="";$c85_1="";$c85_2="";$c85_3="";$c85_4="";$c85_path="";$c86="";$c86_path="";$c87_1="";$c87_2="";$c87_3="";$c87_path="";

$emp_comments="";$rejected_comments="";

$is_rejected="";$is_submitted="";$is_accepted="";

if($result)
{
    $row = $result->fetch_assoc();

    $c11=$row['c11'];$c11_path=$row['c11_path'];$c12=$row['c12'];$c12_path=$row['c12_path'];

    $c21=$row['c21'];$c21_path=$row['c21_path'];$c22=$row['c22'];$c22_path=$row['c22_path'];$c23=$row['c23'];$c23_path=$row['c23_path'];$c24=$row['c24'];$c24_path=$row['c24_path'];

    $c31_1=$row['c31_1'];$c31_2=$row['c31_2'];$c31_3=$row['c31_3'];$c31_4=$row['c31_4'];$c31_5=$row['c31_5'];$c31_path=$row['c31_path'];$c32_1=$row['c32_1'];$c32_2=$row['c32_2'];$c32_3=$row['c32_3'];$c32_4=$row['c32_4'];$c32_5=$row['c32_5'];$c32_6=$row['c32_6'];$c32_7=$row['c32_7'];$c32_8=$row['c32_8'];$c32_9=$row['c32_9'];$c32_10=$row['c32_10'];$c32_11=$row['c32_11'];$c32_12=$row['c32_12'];$c32_13=$row['c32_13'];$c32_14=$row['c32_14'];$c32_15=$row['c32_15'];$c32_16=$row['c32_16'];$c32_17=$row['c32_17'];$c32_18=$row['c32_18'];$c32_19=$row['c32_19'];$c32_path=$row['c32_path'];

    $c41_1_1=$row['c41_1_1'];$c41_1_2=$row['c41_1_2'];$c41_2_1=$row['c41_2_1'];$c41_2_2=$row['c41_2_2'];$c41_3_1=$row['c41_3_1'];$c41_3_2=$row['c41_3_2'];$c41_4_1=$row['c41_4_1'];$c41_4_2=$row['c41_4_2'];$c41_path=$row['c41_path'];$c42_1_1=$row['c42_1_1'];$c42_1_2=$row['c42_1_2'];$c42_1_3=$row['c42_1_3'];$c42_2_1=$row['c42_2_1'];$c42_2_2=$row['c42_2_2'];$c42_2_3=$row['c42_2_3'];$c42_path=$row['c42_path'];$c43_1=$row['c43_1'];$c43_2=$row['c43_2'];$c43_path=$row['c43_path'];

    $phd=$row['phd'];$c51_1=$row['c51_1'];$c51_2=$row['c51_2'];$c51_3=$row['c51_3'];$c51_path=$row['c51_path'];$c52_1=$row['c52_1'];$c52_2=$row['c52_2'];$c52_path=$row['c52_path'];$c53=$row['c53'];$c53_path=$row['c53_path'];$c54_1=$row['c54_1'];$c54_2=$row['c54_2'];$c54_path=$row['c54_path'];

    $c61_1=$row['c61_1'];$c61_2=$row['c61_2'];$c61_path=$row['c61_path'];$c62=$row['c62'];$c62_path=$row['c62_path'];$c63=$row['c63'];$c63_path=$row['c63_path'];$c64=$row['c64'];$c64_path=$row['c64_path'];

    $c71_1_1=$row['c71_1_1'];$c71_1_2=$row['c71_1_2'];$c71_1_3=$row['c71_1_3'];$c71_2_1=$row['c71_2_1'];$c71_2_2=$row['c71_2_2'];$c71_2_3=$row['c71_2_3'];$c71_path=$row['c71_path'];$c72_1_1=$row['c72_1_1'];$c72_1_2=$row['c72_1_2'];$c72_1_3=$row['c72_1_3'];$c72_2_1=$row['c72_2_1'];$c72_2_2=$row['c72_2_2'];$c72_2_3=$row['c72_2_3'];$c72_path=$row['c72_path'];$c73_1=$row['c73_1'];$c73_2=$row['c73_2'];$c73_path=$row['c73_path'];$c74=$row['c74'];$c74_path=$row['c74_path'];

    $c81_1_1=$row['c81_1_1'];$c81_1_2=$row['c81_1_2'];$c81_2_1=$row['c81_2_1'];$c81_2_2=$row['c81_2_2'];$c81_3_1=$row['c81_3_1'];$c81_3_2=$row['c81_3_2'];$c81_path=$row['c81_path'];$c82=$row['c82'];$c82_path=$row['c82_path'];$c83=$row['c83'];$c83_path=$row['c83_path'];$c84_1=$row['c84_1'];$c84_2=$row['c84_2'];$c84_path=$row['c84_path'];$c85_1=$row['c85_1'];$c85_2=$row['c85_2'];$c85_3=$row['c85_3'];$c85_4=$row['c85_4'];$c85_path=$row['c85_path'];$c86=$row['c86'];$c86_path=$row['c86_path'];$c87_1=$row['c87_1'];$c87_2=$row['c87_2'];$c87_3=$row['c87_3'];$c87_path=$row['c87_path'];

    $emp_comments = $row['emp_comments'];$rejected_comments=$row['rejected_comments'];

    $is_rejected = $row['is_rejected'];$is_submitted=$row['is_submitted'];$is_accepted=$row['is_accepted'];
}

?>




<!DOCTYPE HTML>
<html>
<head>
    <title>View PBSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PBSA" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/faculty/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../../assets/faculty/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="../../../assets/faculty/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../../assets/faculty/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <script src="../../../assets/faculty/js/jquery-1.10.2.min.js"></script>
    <script src="../../../assets/faculty/js/amcharts.js"></script>
    <script src="../../../assets/faculty/js/serial.js"></script>
    <script src="../../../assets/faculty/js/light.js"></script>
    <script src="../../../assets/faculty/js/radar.js"></script>
    <link href="../../../assets/faculty/css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="../../../assets/faculty/css/fabochart.css" rel='stylesheet' type='text/css' />
    <!--clock init-->
    <script src="../../../assets/faculty/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/faculty/js/skycons.js"></script>

    <script src="../../../assets/faculty/js/jquery.easydropdown.js"></script>



    <style>
        #logo{
            width:50px;
            height:50px;
            margin-top:-20%;
        }
        #b{
            background:#ddd;
        }
        #image1{
            width:130px;
            height:130px;
        }
        body{

            overflow-y: hidden;
        }
        .tini-time-line1
        {
            margin-left:20%;

        }
        .fa{
            color:#fff;
        }
        .sidebar-menu{
            overflow-x: hidden;
            overflow-y:scroll;

        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;  /* remove scrollbar space */
            background: black;  /* optional: just make scrollbar invisible */
        }
        .dropdown1{
            width:80%;
            margin-left:20%;
        }
        li{

        }
        img{
            width:120px;

        }
        h3{
            color:white;
        }
        .states-last
        {
            margin-left:7%;
            width:40%;
        }
        .states-mdl
        {
            margin-left:5%;
            width:40%;
        }
        .col-md-8{
            margin-left:20%;
        }
        .button {
            display: inline-block;
            padding: 15px 25px;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color:#011D4A;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        .btn{
            margin-left:42%;
            width:150px;
        }
        .button:hover {background-color: #00C6D7}

        .button:active {
            background-color: #011D4A;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }


        hr{
            background-color:#221375;
            height:2px;
            width:200px;
        }
        #bt{
            float:left;
            margin-right:5%;
            margin-bottom:100px;
            margin-top:2.2%;
        }
        #btx{
            margin-top:-150px;
        }
        #select
        {
            width:130px;
            height:30px;
        }

        input[type="file"]{
            color:#000;
            background:white;
            width:200px;
        }
        input[type="number"],input[type="text"],input[type="date"]
        {
            width:130px;

            color:#000;
            background:white;
        }
        .panel-heading :hover{
            color:white;
        }
        .panel-heading:active{
            color:white;
        }
        textarea{
            width:100%;
            height:100px;
        }
        #dec,#t{
            width:70px;
        }
        #approveDummy{
            width:150px;
            height:50px;
            float:left;
            margin-left:37%;
        }
        #rejectDummy{
            width:150px;
            height:50px;
            margin-top:1%;
            margin-left:0%;
        }

    </style>
    <!--//skycons-icons-->
</head>
<body id="b" oncontextmenu="return false">
<div id ="pc" class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!-- header-starts -->
            <div class="header-section">
                <!--menu-right-->
                <div class="top_menu">


                    <div id="" class="wrapper-dropdown-2" >
                        <br>	<br>	<br>
                    </div>

                    <div class="clearfix"></div>


                    <div class="clearfix"></div>
                    <!--//profile_details-->
                </div>
                <!--//menu-right-->
                <div class="clearfix"></div>
            </div>
            <!-- //header-ends -->
            <div class="outter-wp">
                <!--custom-widgets-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="verifyPbsa.php">Verify PBSA </a></li>
                        <li><?php echo $faculty_name; ?></li>
                    </ol>
                </div>

                <noscript>Please Allow Javascript in your browser.</noscript>

                <!--//custom-widgets-->
                <!--/candile-->
    <div class="candile">
        <div class="candile-inner">

            <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">View PBSA</h3></center>
            <hr>



            <div id="center">
                <div id="fig">

                    <div align="center">

                        <label>You Are Viewing PBSA Of The Year  <?php echo $year." Submitted By ".$faculty_name;?></label>

                    </div>

                    <div class="accordion">

                        <br>
                        * Please check All the values correctly before you submit.<br><br>

                        <div class="panel-group tool-tips graph-form" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Criteria 1 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h3 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            <center>	Criteria 1:ACADEMICS-A</center>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>SCORE(OUT OF 100)</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Student Feedback (<?php echo $year-1;?>)</td>
                                                <td class="style1">
                                                    <input type="text" maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c11; ?>" name="c11" id="c11" onchange="validate_c11()" readonly/>
                                                </td>
                                                <td>15</td>
                                                <td> Student Feedback Report Issued By The College<br>
                                                    <?php if($c11_path != "") {?>
                                                        <a href="../../../<?php echo $c11_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Average Result Of All The Classes Conducted.
                                                    (Avg Result Of Previous Odd & Even Semester) 100% =100 marks </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c12; ?>"  name="c12" id="c12" onchange="validate_c12()" readonly/>
                                                </td>
                                                <td>15</td>
                                                <td> Average Result Report In The Prescribed Format-1
                                                    <br>
                                                    <?php if($c12_path != "") {?>
                                                        <a href="../../../<?php echo $c12_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 2 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <center>Criteria 2:ACADEMICS-B</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>SCORE(OUT OF 100)</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Punctuality-
                                                    Yearly Biometric report (<?php echo $year-1;?>)<br>
                                                    if 0 hrs shortage then  100 marks<br>
                                                    0 to 4 hr shortage, then 90 marks<br>
                                                    4 to 8 hr shortage, then 80 marks<br>
                                                    8 to 12 hr shortage, then 70 marks<br>
                                                    12 to 16 hr shortage, then 60 marks<br>
                                                    above 16 hr shortage, then 0 marks
                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c21;?>"   name="c21" id="c21" onchange="validate_c21()" readonly/>
                                                </td>

                                                <td>3</td>
                                                <td>
                                                     The Yearly Biometric Report Issued By The College
                                                    <br>  <?php if($c21_path != "") {?>
                                                        <a href="../../../<?php echo $c21_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Library usage in the college library(>=80 hrs per year then 100 marks otherwise no. of hours/0.8 marks.)  </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c22;?>"   name="c22" id="c22" onchange="validate_c22()" readonly/>
                                                </td>

                                                <td>4</td>
                                                <td>
                                                     The Library Usage Report Issued By The College
                                                    <br>  <?php if($c22_path != "") {?>
                                                        <a href="../../../<?php echo $c22_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>CLASSES CONDUCTED as per time table
                                                    (>= 80 % then 100 marks otherwise percentage/0.8 marks.)
                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c23;?>"   name="c23" id="c23" onchange="validate_c23()" readonly/>
                                                </td>

                                                <td>2</td>
                                                <td>
                                                     Classes Conducted Report Issued By The College
                                                    <br>  <?php if($c23_path != "") {?>
                                                        <a href="../../../<?php echo $c23_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Percentage of seats filled in first semester<br>
                                                    (only for optional subjects.
                                                    for languages the weightage is added to classes conducted.)
                                                    100% then 100 marks otherwise percentage.

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"   title="Numbers Only Allowed" value="<?php echo $c24;?>"   name="c24" id="c24" onchange="validate_c24()" readonly/>
                                                </td>

                                                <td>1</td>
                                                <td>	Percentage of Seats Filled Report Signed By HOI
                                                    <br>  <?php if($c24_path != "") {?>
                                                        <a href="../../../<?php echo $c24_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>


                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 3 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <center>Criteria 3:INSTITUTIONAL INITIATIVES / ACTIVITIES</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>ACHIEVED</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td>Marks For Mandatory Institutional Initiatives
                                                    (Max 50)
                                                </td>
                                                <td>NUMBERS(#)</td>
                                                <td  rowspan="26">10</td>
                                                <td rowspan="6">Mandatory Initiatives - The Report In The Prescribed Format-2
                                                    <br>
                                                    <?php if($c31_path != "") {?>
                                                        <a href="../../../<?php echo $c31_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>AV contents developed (Target 5 )</td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"  value="<?php echo $c31_1?>"  name="c31_1" id="c31_1" onchange="validate_c31_1()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Self recorded lectures (Target 10 )</td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"   value="<?php echo $c31_2;?>" name="c31_2" id="c31_2" onchange="validate_c31_2()" readonly/>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Expand lectures (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"   value="<?php echo $c31_3;?>" name="c31_3" id="c31_3" onchange="validate_c31_3()" readonly/>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Relevant video classes (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"    value="<?php echo $c31_4;?>" name="c31_4" id="c31_4" onchange="validate_c31_4()" readonly/>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Student assignments (Target 4 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"   value="<?php echo $c31_5;?>" name="c31_5" id="c31_5" onchange="validate_c31_5()" readonly/>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>Marks for Optional Initiatives
                                                    (Max 50)
                                                </td>
                                                <td>NUMBERS(#)</td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>Value Education Programs (Target 20 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"   value="<?php echo $c32_1?>" name="c32_1" id="c32_1" onchange="validate_c32_1()" readonly/>
                                                </td>

                                                <td rowspan="19">Optional Initiatives - The Report In The Prescribed Format-3
                                                    <br>
                                                    <?php if($c32_path != "") {?>
                                                        <a href="../../../<?php echo $c32_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Current affairs (Target 20 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"  value="<?php echo $c32_2;?>"  name="c32_2" id="c32_2" onchange="validate_c32_2()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>SRPs/inhouse projects (Target 5 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_3;?>"   name="c32_3" id="c32_3" onchange="validate_c32_3()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Alumni interaction programs (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_4;?>"   name="c32_4" id="c32_4" onchange="validate_c32_4()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Contribution to learning corners (Target 5 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_5;?>"   name="c32_5" id="c32_5" onchange="validate_c32_5()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Units of notes/lesson plan uploaded (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_6;?>"   name="c32_6" id="c32_6" onchange="validate_c32_6()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>CC courses handled (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_7;?>"   name="c32_7" id="c32_7" onchange="validate_c32_7()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>8
                                                </td>
                                                <td>Interdisciplinary program in college (Target 1 )
                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_8;?>"   name="c32_8" id="c32_8" onchange="validate_c32_8()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Contribution to our alumni our pride (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_9;?>"   name="c32_9" id="c32_9" onchange="validate_c32_9()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Guest lectures arranged in regular classes (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"   value="<?php echo $c32_10;?>" name="c32_10" id="c32_10" onchange="validate_c32_10()" readonly/>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Career guidance programmes (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"  value="<?php echo $c32_11;?>"  name="c32_11" id="c32_11" onchange="validate_c32_11()" readonly/>
                                                </td>

                                            </tr>
                                            <tr >
                                                <td >12</td>
                                                <td>Contribution to W4H (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_12;?>"   name="c32_12" id="c32_12" onchange="validate_c32_12()" readonly/>
                                                </td>

                                            </tr>

                                            <tr >
                                                <td >13</td>
                                                <td>Parent faculty (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_13;?>"   name="c32_13" id="c32_13" onchange="validate_c32_13()" readonly/>
                                                </td>

                                            </tr>

                                            <tr >
                                                <td >14</td>
                                                <td>Film shows (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_14;?>"   name="c32_14" id="c32_14" onchange="validate_c32_14()" readonly/>
                                                </td>

                                            </tr>


                                            <tr >
                                                <td >15</td>
                                                <td>Alumni Faculty (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_15;?>"   name="c32_15" id="c32_15" onchange="validate_c32_15()" readonly/>
                                                </td>

                                            </tr>

                                            <tr >
                                                <td >16</td>
                                                <td>Exhibitions arranged (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_16;?>"   name="c32_16" id="c32_16" onchange="validate_c32_16()" readonly/>
                                                </td>

                                            </tr>

                                            <tr >
                                                <td >17</td>
                                                <td>Faculty exchange (Target 1 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_17;?>"   name="c32_17" id="c32_17" onchange="validate_c32_17()" readonly/>
                                                </td>

                                            </tr>


                                            <tr >
                                                <td >18</td>
                                                <td>In-house sharing of expertise (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_18;?>"   name="c32_18" id="c32_18" onchange="validate_c32_18()" readonly/>
                                                </td>

                                            </tr>

                                            <tr >
                                                <td >19</td>
                                                <td>Contribution to green campus (Target 2 )

                                                </td>
                                                <td class="style1">
                                                    <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c32_19;?>"   name="c32_19" id="c32_19" onchange="validate_c32_19()" readonly/>
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 4 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <center> Criteria 4:Research A</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>DETAILS</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <th>Research Activities</th>
                                                <th>NUMBER OF PAPERS</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td rowspan="6">1</td>
                                                <td>Research Paper Publications (In The Name Of Own Institution)

                                                </td>
                                                <td>Author Order

                                                </td>
                                                <td rowspan="13">20</td>
                                                <td rowspan="06">The Relevant Document.
                                                    <br>  <?php if($c41_path != "") {?>
                                                        <a href="../../../<?php echo $c41_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>     </td>

                                            </tr>
                                            <tr>

                                                <td>1.1) In SCI (Science Citation Index) Journals - International

                                                </td>

                                                <td>

                                                    First &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="c41_1_1" type="text" name="c41_1_1" maxlength="4" pattern="[0-9.]+" title="Numbers Only Allowed" value="<?php echo $c41_1_1; ?>" readonly onchange="validate_c41_1_1()" style="width:50%"><br><br>
                                                    Second &nbsp;&nbsp; <input id="c41_1_2" type="text" name="c41_1_2" maxlength="4" pattern="[0-9.]+" title="Numbers Only Allowed" value="<?php echo $c41_1_2; ?>" onchange="validate_c41_1_2()" style="width:50%" readonly></td>

                                            <tr>

                                            </tr>
                                            <tr>
                                                <td> 1.2)<span id="ab">In SCOPUS / WEB OF SCIENCE / INDERSCIENCE


</span></td>
                                                <td>First &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="c41_2_1" type="text" name="c41_2_1" onchange="validate_c41_2_1()" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c41_2_1; ?>" readonly style="width:50%"><br><br>
                                                    Second &nbsp;&nbsp; <input id="c41_2_2" type="text" name="c41_2_2" onchange="validate_c41_2_2()" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c41_2_2; ?>"  style="width:50%"readonly></td>

                                            </tr>
                                            <tr>
                                                <td> 1.3)<span id="ab"> International Journal (UGC Recognised)
</span></td>
                                                <td>First &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="c41_3_1" type="text" name="c41_3_1" onchange="validate_c41_3_1()" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c41_3_1; ?>" readonly style="width:50%"><br><br>
                                                    Second &nbsp;&nbsp; <input id="c41_3_2" type="text" name="c41_3_2" onchange="validate_c41_3_2()" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c41_3_2; ?>"  style="width:50%"readonly></td>

                                            </tr>
                                            <tr>
                                                <td> 1.4)<span id="ab">  National Journal (UGC Recognised)

</span></td>
                                                <td>First &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input id="c41_4_1" type="text" name="c41_4_1" onchange="validate_c41_4_1()" maxlength="4" pattern="[0-9.]+" title="Numbers Only Allowed" value="<?php echo $c41_4_1;?>" readonly style="width:50%"><br><br>
                                                    Second &nbsp;&nbsp; <input id="c41_4_2" type="text" name="c41_4_2" onchange="validate_c41_4_2()" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c41_4_2;?>"  style="width:50%"readonly></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="4">2</td>
                                                <td>Ongoing Research Projects for the Grant Period (<?php echo $year-(2)." - ".$year;?>) :                        FIRST 3 AUTHORS ONLY
                                                </td>
                                                <td># FUNDS
                                                </td>
                                                <td rowspan="4">
                                                    The Relevant Document.
                                                    <br>  <?php if($c42_path != "") {?>
                                                        <a href="../../../<?php echo $c42_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>

                                            </tr>

                                            <tr>
                                            <tr>

                                                <td>2.1) No. of Projects With Funds Less Than Rs 3 Lakhs (< 3 lakhs)

                                                </td>
                                                <td class="style1"><?php echo $year;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_1_1;?>"   name="c42_1_1" id="c42_1_1" onchange="validate_c42_1_1()" readonly style="width:50%"/><br><br>
                                                    <?php echo $year-1;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_1_2; ?>"   name="c42_1_2" id="c42_1_2" onchange="validate_c42_1_2()" readonly style="width:50%"/>
                                                    <br><br><?php echo $year-2;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_1_3;?>"   name="c42_1_3" id="c42_1_3" onchange="validate_c42_1_3()" readonly style="width:50%"/></td>


                                            </tr>
                                            <tr>

                                                <td>
                                                    2.2) No. of Projects With Funds Rs 3 Lakhs and More (>= 3 lakhs)
                                                </td>
                                                <td class="style1"><?php echo $year;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_2_1;?>"   name="c42_2_1" id="c42_2_1" onchange="validate_c42_2_1()" readonly style="width:50%"/><br><br>
                                                    <?php echo $year-1;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_2_2;?>"   name="c42_2_2" id="c42_2_2" onchange="validate_c42_2_2()" readonly style="width:50%"/><br><br>
                                                    <?php echo $year-2;?>&nbsp;&nbsp;<input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c42_2_3;?>"   name="c42_2_3" id="c42_2_3" onchange="validate_c42_2_3()" readonly style="width:50%"/></td>

                                            </tr>

                                            <tr>
                                                <td rowspan="3">3</td>
                                                <td>Project Proposals Submitted - FIRST 3 AUTHORS ONLY

                                                </td>
                                                <td># PROJECTS
                                                </td>

                                                <td rowspan="3">
                                                    The Relevant Document.
                                                    <br>  <?php if($c43_path != "") {?>
                                                        <a href="../../../<?php echo $c43_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>3.1) No. of Projects With Funds Less Than Rs 3 Lakhs (< 3 lakhs)
                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c43_1;?>"   name="c43_1" id="c43_1" onchange="validate_c43_1()" readonly/></td>

                                            </tr>
                                            <tr>

                                                <td>
                                                    3.2) No. of Projects With Funds Rs 3 Lakhs and More (>= 3 lakhs)
                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c43_2;?>"   name="c43_2" id="c43_2" onchange="validate_c43_2()" readonly/></td>

                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 5 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="researchB">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseresearchB" aria-expanded="false" aria-controls="researchB">
                                            <center> Criteria 5:Research B</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseresearchB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="researchB" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>DETAILS</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <th>Research Activities</th>
                                                <th></th><th></th><th></th>
                                            </tr>
                                            <tr>
                                                <td rowspan="5">1</td>
                                                <td>Research activities
                                                    For pursuing PhD members
                                                </td>
                                                <td><input type="checkbox" id="phd" name="phd" <?php if($phd==0) echo "checked";?> disabled> Not Applicable</td>
                                                <td rowspan="11">10</td>
                                                <td rowspan="05"> The Letter Of PhD Registration
                                                    <br>  <?php if($c51_path != "") {?>
                                                        <a href="../../../<?php echo $c51_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>     </td>

                                            </tr>
                                            <tr>

                                                <td>1.1)Date of registration for PhD Degree
                                                    for registration -10 marks up to five years
                                                </td>
                                                <td><input id="c51_1" type="date" name="c51_1" value="<?php echo $c51_1;?>" readonly></td>

                                            </tr>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td> 1.2)<span id="ab">Half yearly reports -10 marks per report</span></td>
                                                <td><input id="c51_2" name="c51_2" onchange="validate_c51_2()"  value="<?php echo $c51_2;?>"  type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"  readonly></td>

                                            </tr>
                                            <tr>
                                                <td> 1.3)<span id="ab">For PhD holders with guide-ship
 Number  of PhD Students  guiding in the year 10 marks per one PhD student –for  4 years
</span></td>
                                                <td><input id="c51_3" name="c51_3" onchange="validate_c51_3()" value="<?php echo $c51_3;?>"  type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed"  readonly></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="3">2</td>
                                                <td>Research Papers Presented International / National Conferences</td>

                                                <td># PAPERS</td>
                                                <!--                                                                <td></td>-->
                                                <td rowspan="3"> The Relevant Document.
                                                    <br>  <?php if($c52_path != "") {?>
                                                        <a href="../../../<?php echo $c52_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>2.1) International (Abroad)

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c52_1;?>"   name="c52_1" id="c52_1" onchange="validate_c52_1()" readonly/></td>

                                            </tr>
                                            <tr>

                                                <td>2.2) National / International (In India)
                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c52_2;?>"   name="c52_2" id="c52_2" onchange="validate_c52_2()" readonly/></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">3</td>
                                                <td>Research Publications / Presentations by PhD Students / SRP Students

                                                <td># PAPERS
                                                </td>

                                                <!--                                                                <td></td>-->
                                                <td rowspan="2">The Relevant Document.
                                                    <br>  <?php if($c53_path != "") {?>
                                                        <a href="../../../<?php echo $c53_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td>National / International Level</td>

                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c53;?>"   name="c53" id="c53" onchange="validate_c53()" readonly/></td>

                                                <!--                                                                <td></td>-->

                                            </tr>
                                            <tr>
                                                <td rowspan="2">4</td>
                                                <td>4.1) No. of Patents in Pipeline For Submission

                                                </td>
                                                <td><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c54_1;?>"   name="c54_1" id="c54_1" onchange="validate_c54_1()" readonly/></td>

                                                <td rowspan="2"> The Relevant Document.
                                                    <br>  <?php if($c54_path != "") {?>
                                                        <a href="../../../<?php echo $c54_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>4.2) No. of Patents Awarded in the Year

                                                </td>
                                                <td><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c54_2;?>"   name="c54_2" id="c54_2" onchange="validate_c54_2()" readonly/></td>

                                                <td >5</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 6 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <center> Criteria 6:EXTENSION CONSULTANCY AND STUDENT SUPPORT</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>DETAILS</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td>Extension Activity (One Activity Maximum 3 Staff Members)
                                                </td>
                                                <td>No. of Staffs Invloved
                                                </td>
                                                <td  rowspan="04">5</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>No. Of Academic Activities Outside The Campus -
                                                    Academic Talks / Demonstrations / Exhibitions


                                                </td>
                                                <td class="style1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;1 Staff &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; >1 Staffs <br><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c61_1;?>"   name="c61_1" id="c61_1" onchange="validate_c61_1()" style="width: 40%" readonly/>
                                                    &nbsp; <input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c61_2;?>"   name="c61_2" id="c61_2" onchange="validate_c61_2()" readonly style="width: 40%"/></td>

                                                <!--                                                                <td></td>-->
                                                <td>
                                                     The Relevant Document.
                                                    <br>  <?php if($c61_path != "") {?>
                                                        <a href="../../../<?php echo $c61_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">2</td>
                                                <td>Consultency
                                                </td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <td rowspan="1"></td>
                                            </tr>
                                            <tr>

                                                <td>No. Of Activities - Sharing Subject Knowledge With Other Academic Institutions / Public - ON INVITATION / REQUEST


                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c62;?>" name="c62" id="c62" onchange="validate_c62()" readonly/></td>

                                                <!--                                                                <td> </td>-->
                                                <td>
                                                     The Relevant Document.
                                                    <br>  <?php if($c62_path != "") {?>
                                                        <a href="../../../<?php echo $c62_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">3</td>
                                                <td rowspan="2">No. Of Student Seminars (Min. Duration 20 Minutes)</td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c63;?>"   name="c63" id="c63" onchange="validate_c63()" readonly/></td>

                                                <td  rowspan="03">5</td>
                                                <td>
                                                     The Relevant Document.
                                                    <br>  <?php if($c63_path != "") {?>
                                                        <a href="../../../<?php echo $c63_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>


                                            </tr>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>No. Of Group Discussion / Debate / Quiz / Aptitude Test (Min. 45 Minutes)

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c64;?>"   name="c64" id="c64" onchange="validate_c64()" readonly/></td>

                                                <!--                                                                <td></td>-->
                                                <td> The Relevant Document.
                                                    <br>  <?php if($c64_path != "") {?>
                                                        <a href="../../../<?php echo $c64_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 7 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            <center> Criteria 7:ORGANIZATION OF PROGRAMMES(CONTRIBUTION TO DEPT/CLUB)</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>DETAILS</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td rowspan="3">1</td>
                                                <td>Organization of No. of Seminars/Conferences/Workshops/Training Programs etc... in the college. With Grants Received from GO / NGO
                                                </td>
                                                <td># PROGRAMS AS A
                                                </td>
                                                <td  rowspan="10">5</td>
                                                <td rowspan="3"> The Relevant Document.
                                                    <br>  <?php if($c71_path != "") {?>
                                                        <a href="../../../<?php echo $c71_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>
                                            </tr>
                                            <tr>
                                                <td>Grants upto Rs 2 lakh
                                                </td>
                                                <td>
                                                    CONVENER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c71_1_1" id="c71_1_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_1_1;?>" onchange="validate_c71_1_1()" style="width: 30%" readonly><br><br>
                                                    <span style="font-size: 12px">CO-CONVENER</span>&nbsp;
                                                    <input type="text" name="c71_1_2" id="c71_1_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_1_2;?>" onchange="validate_c71_1_2()" style="width: 30%" readonly><br><br>
                                                    MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c71_1_3" id="c71_1_3" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_1_3;?>" onchange="validate_c71_1_3()" style="width: 30%" readonly>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>Grants Rs 2 lakhs and above</td>
                                                <td>
                                                    CONVENER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c71_2_1" id="c71_2_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_2_1;?>" onchange="validate_c71_2_1()" style="width: 30%" readonly><br><br>
                                                    <span style="font-size: 12px">CO-CONVENER</span>&nbsp;
                                                    <input type="text" name="c71_2_2" id="c71_2_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_2_2;?>" onchange="validate_c71_2_2()" style="width: 30%" readonly><br><br>
                                                    MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c71_2_3" id="c71_2_3" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c71_2_3;?>" onchange="validate_c71_2_3()" style="width: 30%" readonly>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td rowspan="3">2</td>
                                                <td>"No. of Proposals Submitted for Organising Seminars/Conferences
                                                    /Workshops/Training Programs etc... in the college. (With Grants from GO/NGO)
                                                    "
                                                </td>
                                                <td># PROGRAMS AS A
                                                </td>

                                                <td rowspan="3"> The Relevant Document.
                                                    <br>  <?php if($c72_path != "") {?>
                                                        <a href="../../../<?php echo $c72_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>
                                            </tr>
                                            <tr>
                                                <td>Grants upto Rs 2 lakh
                                                </td>
                                                <td>
                                                    CONVENER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c72_1_1" id="c72_1_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_1_1;?>" onchange="validate_c72_1_1()" style="width: 30%" readonly><br><br>
                                                    <span style="font-size: 12px">CO-CONVENER</span>&nbsp;
                                                    <input type="text" name="c72_1_2" id="c72_1_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_1_2;?>" onchange="validate_c72_1_2()" style="width: 30%" readonly><br><br>
                                                    MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c72_1_3" id="c72_1_3" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_1_3;?>" onchange="validate_c72_1_3()" style="width: 30%" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Grants Rs 2 lakhs and above</td>
                                                <td>
                                                    CONVENER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c72_2_1" id="c72_2_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_2_1;?>" onchange="validate_c72_2_1()" style="width: 30%" readonly><br><br>
                                                    <span style="font-size: 12px">CO-CONVENER</span>&nbsp;
                                                    <input type="text" name="c72_2_2" id="c72_2_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_2_2;?>" onchange="validate_c72_2_2()" style="width: 30%" readonly><br><br>
                                                    MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c72_2_3" id="c72_2_3" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c72_2_3;?>" onchange="validate_c72_2_3()" style="width: 30%" readonly>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td rowspan="2">3</td>
                                                <td>
                                                </td>
                                                <td># PROGRAMS AS A
                                                </td>

                                                <td rowspan="2"> The Relevant Document.
                                                    <br>  <?php if($c73_path != "") {?>
                                                        <a href="../../../<?php echo $c73_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>
                                            </tr>
                                            <tr>
                                                <td>Organising Non-Funded Programmes in the College
                                                </td>
                                                <td>

                                                    <span style="font-size: 12px">COORDINATOR</span>
                                                    <input type="text" name="c73_1" id="c73_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c73_1;?>" onchange="validate_c73_1()" readonly style="width: 30%"><br><br>
                                                    MEMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="c73_2" id="c73_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c73_2;?>" onchange="validate_c73_2()" readonly style="width: 30%">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">4</td>
                                                <td>
                                                </td>
                                                <td>NUMBERS (#)
                                                </td>

                                                <td rowspan="2"> The Relevant Document.
                                                    <br>  <?php if($c74_path != "") {?>
                                                        <a href="../../../<?php echo $c74_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>
                                            </tr>
                                            <tr>
                                                <td>Organising Industrial / Field  Visits / Study Tours / Exhibitions /Any Such Programmes (Duration: Min 1 Day)


                                                </td>
                                                <td>
                                                    <input type="text" name="c74" id="c74" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c74;?>" onchange="validate_c74()" readonly >
                                                </td>

                                            </tr>


                                            </tbody>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <!-- Criteria 8 -->
                            <!--------------------------------------------------------------------------------------------------------->
                            <div class="panel-default">
                                <div class="panel-heading" role="tab" id="headingSeven">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            <center>Criteria 8:ACADEMIC GROWTH</center>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="td">PARTICULARS</th>
                                                <th>DETAILS</th>
                                                <th>WEIGHTAGE</th>
                                                <th>ATTACH THE RELEVANT DOCUMENTS HERE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td rowspan="4">1</td>
                                                <td>No. Of Seminars / Workshops / Conferences / Refresher / Orientation / Training Programmes Attended</td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <td  rowspan="10">3</td>
                                                <td rowspan="4">
                                                     The Relevant Document.
                                                    <br>  <?php if($c81_path != "") {?>
                                                        <a href="../../../<?php echo $c81_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>
                                            </tr>

                                            <tr>
                                                <td>International
                                                </td>
                                                <td> 1 Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="c81_1_1" id="c81_1_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_1_1;?>" onchange="validate_c81_1_1()" readonly style="width: 50%"><br><br>
                                                    >1 Day&nbsp;&nbsp;&nbsp;<input type="text" name="c81_1_2" id="c81_1_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_1_2;?>" onchange="validate_c81_1_2()" readonly style="width: 50%"></td>

                                            </tr>
                                            <tr>
                                                <td>National
                                                </td>
                                                <td> 1 Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="c81_2_1" id="c81_2_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_2_1;?>" onchange="validate_c81_2_1()" readonly style="width: 50%"><br><br>
                                                    >1 Day&nbsp;&nbsp;&nbsp;<input type="text" name="c81_2_2" id="c81_2_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_2_2;?>" onchange="validate_c81_2_2()" readonly  style="width: 50%"></td>

                                            </tr>
                                            <tr>
                                                <td>State / Other
                                                </td>
                                                <td> 1 Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="c81_3_1" id="c81_3_1" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_3_1;?>" onchange="validate_c81_3_1()" readonly style="width: 50%"><br><br>
                                                    >1 Day&nbsp;&nbsp;&nbsp;<input type="text" name="c81_3_2" id="c81_3_2" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c81_3_2;?>" onchange="validate_c81_3_2()" readonly  style="width: 50%"></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">2</td>
                                                <td></td>
                                                <td>NUMBERS (#)
                                                </td>

                                                <td rowspan="2"> The Relevant Document.
                                                    <br>  <?php if($c82_path != "") {?>
                                                        <a href="../../../<?php echo $c82_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>

                                            </tr>
                                            <tr>

                                                <td>No. Of Seminars / Workshops / Conferences / Refresher / Orientation / Training Programmes Attended as a Resource Person / Inaugurator

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c82;?>"   name="c82" id="c82" onchange="validate_c82()" readonly/></td>

                                                <!--                                                                <td> </td>-->


                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>BOE / BOS Members of Other Institutions (No. of Institutions)

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c83;?>"   name="c83" id="c83" onchange="validate_c83()" readonly/></td>

                                                <!--                                                                <td></td>-->
                                                <td>The Relevant Document.
                                                    <br>  <?php if($c83_path != "") {?>
                                                        <a href="../../../<?php echo $c83_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">4</td>
                                                <td>No. of Additional Qualifications Acquired in the Assessment Year
                                                </td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <td rowspan="3"> The Relevant Document.
                                                    <br>  <?php if($c84_path != "") {?>
                                                        <a href="../../../<?php echo $c84_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?></td>

                                            </tr>
                                            <tr>
                                                <td> 4.1) NET / SLET / PhD
                                                </td>
                                                <td><input type="text" name="c84_1" id="c84_1" maxlength="4" pattern="[0-9.]+" title="Numbers Only Allowed" value="<?php echo $c84_1;?>" onchange="validate_c84_1()" readonly></td>
                                            </tr>

                                            <tr>
                                                <td>4.2) Diploma  Courses / Online Certificate Courses</td>
                                                <td><input type="text" name="c84_2" id="c84_2" maxlength="4" pattern="[0-9.]+" title="Numbers Only Allowed" value="<?php echo $c84_2;?>" onchange="validate_c84_2()" readonly></td>
                                            </tr>

                                            <tr>
                                                <td rowspan="5">5</td>
                                                <td>General Publications (Subject Related / Any Other Topics)
                                                </td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <td rowspan="11">2</td>
                                                <td></td>
                                            </tr>
                                            <tr>

                                                <td>5.1) No. Of Books Authored (Min 25 Pages)

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c85_1;?>"   name="c85_1" id="c85_1" onchange="validate_c85_1()" readonly/></td>

                                                <!--                                                                <td></td>-->
                                                <td rowspan="4"> The Relevant Document.
                                                    <br>  <?php if($c85_path != "") {?>
                                                        <a href="../../../<?php echo $c85_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>5.2) No. Of Books Co-Authored (Min 25 Pages)

                                                </td>
                                                <td> <input type="text" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c85_2;?>"   name="c85_2" id="c85_2" onchange="validate_c85_2()" readonly></td>

                                            </tr>
                                            <tr>
                                                <td>5.3) No. of Books Edited and Re-Published (Min 25 Pages)

                                                </td>
                                                <td><input type="text" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c85_3;?>"   name="c85_3" id="c85_3" onchange="validate_c85_3()" readonly></td>

                                            </tr>
                                            <tr>
                                                <td>5.4) No Of General Article Published In Magazines / Papers / Online Publications (Min 1 Page In A4 Size)

                                                </td>
                                                <td><input type="text" maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c85_4;?>"   name="c85_4" id="c85_4" onchange="validate_c85_4()" readonly></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">6</td>
                                                <td>
                                                </td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <!--                                                                <td> </td>-->
                                                <td rowspan="2"> The Relevant Document.
                                                    <br>  <?php if($c86_path != "") {?>
                                                        <a href="../../../<?php echo $c86_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. of Subject Related Talks / Popular Lectures Given in Academic / Non-Academic Programmes - Outside the Campus
                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c86;?>"   name="c86" id="c86" onchange="validate_c86()" readonly/></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="4">7</td>
                                                <td>No. Of Awards (Other Than Phd) / Recognition Received from Registered Body / Government

                                                </td>
                                                <td>NUMBERS (#)
                                                </td>
                                                <td></td>
                                                <!--                                                                <td>1</td>-->

                                            </tr>
                                            <tr>

                                                <td>International

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c87_1;?>" name="c87_1" id="c87_1" onchange="validate_c87_1()" readonly/></td>

                                                <td rowspan="3"> The Relevant Document.
                                                    <br>  <?php if($c87_path != "") {?>
                                                        <a href="../../../<?php echo $c87_path;?>" target="_blank">
                                                            <input type="button" value="View Uploaded Document"></a>
                                                    <?php }else
                                                    {
                                                        echo '<input type="button" value="No Document Uploaded">';
                                                    }?>
                                                </td>
                                            </tr>  <tr>

                                                <td>National

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c87_2;?>" name="c87_2" id="c87_2" onchange="validate_c87_2()" readonly/></td>


                                            </tr>
                                            <tr>

                                                <td>State

                                                </td>
                                                <td class="style1"><input type="text"  maxlength="4" pattern="[0-9.]+"  title="Numbers Only Allowed" value="<?php echo $c87_3;?>" name="c87_3" id="c87_3" onchange="validate_c87_3()" readonly/></td>


                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table" id="table12"; border="5px" calign="center">

                                            <tr>
                                                <th >Any Significant Contribution Made / Proposed To Be Done (Write Here)	</th>
                                            </tr>
                                            <tr>
                                                <td style="border-right:none;">  <textarea name="emp_comments" id="emp_comments" readonly></textarea></td>
                                                <script>document.getElementById("emp_comments").value = "<?php echo $emp_comments;?>";</script>
                                            </tr>




                                        </table>



                                        <br>


                                    </div>
                                </div>
                            </div>
                            <!-- End -->
                            <!--------------------------------------------------------------------------------------------------------->

                        </div>
                    </div>

                    <form method="post" action="../../controllers/PbsaApproveRejectController.php" >
                        <div hidden>
                            <input type="text" name="e_id" value="<?php echo $faculty_id;?>" readonly >
                            <input type="text" name="year" value="<?php echo $year;?>" readonly >
                            <button name="approve" class="btn btn-primary" id="approve" value="approve" >Approve</button>
                            <button name="reject" class="btn btn-primary" id="reject" value="reject" >Reject</button>
                        </div>
                        <table class="table" id="comments"; border="5px" calign="center" hidden>

                            <tr>
                                <th > Please Write Reason For Rejection</th>
                            </tr>
                            <tr>
                                <td style="border-right:none;">  <textarea name="rejection_comments" id="rejection_comments"></textarea></td>
                            </tr>


                        </table>
                    </form>
                    <!--   dummy-->
                    <div id="first_button">
                        <button class="btn btn-primary" id="approveDummy" onclick="approve()" >Approve</button>
                        <button class="btn btn-primary" id="rejectDummy" onclick="comments()" >Reject</button>
                    </div>

                    <div id="second_button" hidden>
                        <button class="btn btn-primary" id="approveDummy" onclick="show_first_button()" >Cancel</button>
                        <button class="btn btn-primary" id="rejectDummy" onclick="reject()" >Confirm Reject</button>
                    </div>
                    <!--   dummy-->
                    <script>
                        function approve()
                        {
                            if (confirm("Are you sure you want to Approve ?"))
                            {
                                document.getElementById("approve").click();
                            }
                        }

                        function comments()
                        {
                            document.getElementById("comments").removeAttribute("hidden");
                            document.getElementById("second_button").removeAttribute("hidden");
                            document.getElementById("first_button").setAttribute("hidden","");
                        }

                        function show_first_button()
                        {
                            document.getElementById("comments").setAttribute("hidden","");
                            document.getElementById("first_button").removeAttribute("hidden");
                            document.getElementById("second_button").setAttribute("hidden","");
                        }

                        function reject()
                        {
                            document.getElementById("reject").click();
                        }
                    </script>


                </div>



            </div>



        </div>														<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

    </div>


    <!--/candile-->

    <!--/charts-->

    <!--//content-inner-->
    <!--/sidebar-menu-->
<?php
include 'footer.php';

?>