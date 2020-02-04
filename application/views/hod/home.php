<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 29/01/20
 * Time: 8:40 PM
 */


require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
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
    if(!$objEmployee->checkEmailRole($email,Constants::roleHod))//check realtime role
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
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>PBSA System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Skill" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/hod/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../../assets/hod/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="../../../assets/hod/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../../assets/hod/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <script src="../../../assets/hod/js/jquery-1.10.2.min.js"></script>
    <script src="../../../assets/hod/js/amcharts.js"></script>
    <script src="../../../assets/hod/js/serial.js"></script>
    <script src="../../../assets/hod/js/light.js"></script>
    <script src="../../../assets/hod/js/radar.js"></script>
    <link href="../../../assets/hod/css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="../../../assets/hod/css/fabochart.css" rel='stylesheet' type='text/css' />
    <!--clock init-->
    <script src="../../../assets/hod/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/hod/js/skycons.js"></script>

    <script src="../../../assets/hod/js/jquery.easydropdown.js"></script>
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

        .button:hover {background-color: #00C6D7}

        .button:active {
            background-color: #011D4A;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .col-md-5{
            text-align:center;

        }
        hr{
            background-color:#221375;
            height:2px;
            width:200px;
        }
    </style>
    <!--//skycons-icons-->
</head>
<body id="b">
<div id ="pc" class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!-- header-starts -->
            <div class="header-section">

                <div class="top_menu">


                    <div id="" class="wrapper-dropdown-2" >
                        <br>	<br>	<br>
                    </div>




                    <div class="clearfix"></div>


                    <div class="clearfix"></div>

                </div>

                <div class="clearfix"></div>
            </div>
            <!-- //header-ends -->
            <div class="outter-wp">
                <!--custom-widgets-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">

                        <li><a href="home.php">Home</a></li>
                    </ol>
                </div>



                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">


                        <div id="center"><div id="fig">

                                <h1 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">

                                    Welcome to<br><br>
                                    PBSA System.....</h1>
                               <br><br>
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><a href="pbsaSystem.php"><img src="../../../assets/hod/images/fill.png"><h3 style="font-family:'Copperplate Gothic Light';color:black;">Fill PBSA</h3></a></div>
                                <div class="col-md-5"><a href="verifyPbsa.php"><img src="../../../assets/hod/images/verify.png"><h3 style="font-family:'Copperplate Gothic Light';color:black;">Verify PBSA</h3></a></div>
                                <div class="col-md-1"></div>




                            </div>


                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


                        </div>

                    </div>
                    <br> <br> <br> <br> <br> <br>
                </div>
                <!--/candile-->

                <!--/charts-->

                <!--//content-inner-->
                <!--/sidebar-menu-->
                <?php
				include 'footer.php';
				?>
