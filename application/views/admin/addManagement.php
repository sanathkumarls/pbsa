<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../utilities/Constants.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];
    $objAdmin= new Admin();
    if(!$objAdmin->checkEmail($email))//check realtime role
    {
        header("Location: ../../controllers/LogoutController.php");
    }
    if($changePassword == 1)
    {
        header("Location: changePassword.php");
    }
}
else
{
    header('Location: index.php');
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Add Mangement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Skill" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../../assets/admin/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="../../../assets/admin/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../../assets/admin/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <script src="../../../assets/admin/js/jquery-1.10.2.min.js"></script>
    <script src="../../../assets/admin/js/amcharts.js"></script>
    <script src="../../../assets/admin/js/serial.js"></script>
    <script src="../../../assets/admin/js/light.js"></script>
    <script src="../../../assets/admin/js/radar.js"></script>
    <link href="../../../assets/admin/css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="../../../assets/admin/css/fabochart.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--clock init-->
    <script src="../../../assets/admin/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/admin/js/skycons.js"></script>

    <script src="../../../assets/admin/js/jquery.easydropdown.js"></script>
    <style>
        #h3{
            margin-left:-10%;
        }
        hr{
            background-color:#221375;
            height:2px;
            width:200px;
            margin-left:35%;
        }
        #logo{
            width:50px;
            height:50px;
            margin-top:-18%;
        }

        #image1{
            width:130px;
            height:130px;
        }
        .tini-time-line1
        {
            margin-left:20%;

        }
        .form-body{
            margin-top:-20px;
        }

        .form-control
        {
            width:100%;
            margin-top:20px;
            overflow:auto;
        }
        .ab{
            overflow:visible;

            float:both;
            clear:both;
        }
        .btn-success,.btn-info{
            text-align:center;
            margin-top:3%;
            width:100px;

            overflow:auto;
            margin-left:0%;
        }
        .btn-danger{
            margin-top:1.8%;
            padding-top:7px;
            padding-bottom:5px;
        }
        #lname,#lno{
            margin-bottom:1%;
        }
        .alert{
            margin-left:23%;
            width:50%;
        }
        .lev{

            margin-left:0%;
            color:black;
        }
        .lev1{
            margin-top:-2%;
            margin-left:1.5%;
            color:black;
        }
        .btn-info{
            padding-top:12px;
            padding-bottom:12px;
            margin-bottom:5%;
        }
        .glyphicon-plus,.glyphicon-minus{
            color:white;
            padding-top:2px;
            padding-bottom:2px;

        }
        .sss{
            padding-left:1.5%;
            padding-right:1.5%;
        }
        #select{
            padding-bottom:5px;
            padding-top:5px;
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
        #scat,#stype,#select,#photo,#dob{
            padding-top:5px;
            padding-bottom:5px;

        }
        #dob{
            padding-top:-10px;
            padding-bottom:0px;

        }
        label{
            margin-left:1.5%;
            margin-bottom:-2%;
        }
        #update{

            height:54px;
            margin-left:1.5%;
        }
        #edit{
            height:54px;
            float:left;
            margin-left:35%;

        }
        #np,#np1{
            height:34px;
            width:40px;
        }

        .fa-pencil,.fa-edit{
            padding-top:5%;
            color:black;
        }
        .a{
            color:white;
            font-size:10px;
        }
        .form-group{
            margin-left:22%;
        }
        body{
            background:#ddd;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>


    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
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
                        <li>Add Management</li>
                    </ol>
                </div>




                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">


                        <div id="center"><div id="fig">

                                <center><h3 id="h3" style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Add Management</h3></center>
                                <hr>
                            </div>
                            <form method="post" name="f1" action="../../controllers/admin/AdminAddManagement.php"
                                  enctype="multipart/form-data">
                                <div class="form-body">


                                    <div class="form-group"><label id="fname" for="fullname">Initial</label> <br>
                                        <div class="col-md-8">

                                            <select id="select" class="form-control" required name="initial" >

                                                <option value="Mr.">Mr</option>
                                                <option value="Dr.">Dr</option>
                                                <option value="Ms.">Ms</option>
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="form-group"><label id="email" for="email"><br>First Name</label> <br>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"  name="firstName" id="mail" required>
                                        </div>
                                        <br>

                                    </div>
                                    <br>
                                    <div class="form-group"><label id="email" for="email"><br>Last Name</label> <br>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"  name="lastName" id="mail" required>
                                        </div>
                                        <br>

                                    </div>
                                    <br>

                                    <div class="form-group"><label id="email" for="email"><br>Email</label> <br>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control"  name="email" id="mail" required>
                                        </div>
                                        <br>

                                    </div>
                                    <br>
                                    <div class="form-group"><label id="no" for="no"><br>Mobile Number</label> <br>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" maxlength="10"  name="phone" id="no" required>
                                        </div>
                                        <br>

                                    </div>

                                    <br>



                                </div>
                                <br>
                                <div class="form-group"><label id="pass" for="pass"><br>Password </label> <br>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control"  name="password" id="pass"
                                               placeholder="New Password" required>
                                    </div>
                                    <br>

                                </div>
                                <br>


                        </div>
                        <br><br>


                        <br>


                        <center>
                            <button class="btn btn-primary" id="update" name="submit"><i class="fa fa-refresh a"
                                                                                         style="font-size:25px;"></i>&nbsp;&nbsp;Submit
                            </button>
                        </center>
                        </form>
                        <br> <br> <br>


                    </div>

                </div>
            </div>
            <!--/candile-->

            <!--/charts-->

            <!--//outer-wp-->
        </div>

    </div>




<!--//content-inner-->
<!--/sidebar-menu-->




<?php

include 'footer.php';

?>
