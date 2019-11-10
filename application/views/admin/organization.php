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
    <title>Creation And Deletion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Skill"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="../../../assets/admin/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Graph CSS -->
    <link href="../../../assets/admin/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
          type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../../assets/admin/css/icon-font.min.css" type='text/css'/>
    <!-- //lined-icons -->
    <script src="../../../assets/admin/js/jquery-1.10.2.min.js"></script>
    <script src="../../../assets/admin/js/amcharts.js"></script>
    <script src="../../../assets/admin/js/serial.js"></script>
    <script src="../../../assets/admin/js/light.js"></script>
    <script src="../../../assets/admin/js/radar.js"></script>
    <link href="../../../assets/admin/css/barChart.css" rel='stylesheet' type='text/css'/>
    <link href="../../../assets/admin/css/fabochart.css" rel='stylesheet' type='text/css'/>
    <!--clock init-->
    <script src="../../../assets/admin/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/admin/js/skycons.js"></script>

    <script src="../../../assets/admin/js/jquery.easydropdown.js"></script>
    <style>

        #btn1 {
            margin-left: 20%;

        }

        hr {
            background-color: #221375;
            height: 2px;
            width: 200px;
        }

        #logo {
            width: 50px;
            height: 50px;
            margin-top: -20%;
        }

        #image1 {
            width: 130px;
            height: 130px;
        }

        .tini-time-line1 {
            margin-left: 20%;

        }

        .img {
            margin-left: 18%;
            width: 200px;
            height: 200px;

        }

        .img1 {
            margin-left: 5%;

            width: 250px;
            height: 223px;

        }

        .chrt-two {
            margin-left: 10%;
            width: 35%;

            box-shadow: 5px 5px 5px 5px rgba(0.7, 0.7, 0.7, 0.5);

        }

        .chrt-three {
            margin-left: 10%;
            width: 35%;

            box-shadow: 5px 5px 5px 5px rgba(0.7, 0.7, 0.7, 0.5);
        }

        .cde {
            margin-left: 10%;
        }

        .efg {
            margin-left: 6%;
        }

        .fa {
            color: #fff;
        }

        .sidebar-menu {
            overflow-x: hidden;
            overflow-y: scroll;

        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px; /* remove scrollbar space */
            background: black; /* optional: just make scrollbar invisible */
        }

        body {
            background: #ddd;

        }
    </style>
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


                    <div id="" class="wrapper-dropdown-2">
                        <br> <br> <br>
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
                        <li>Organization
                        </li>
                    </ol>
                </div>


                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">

                    <div class="candile-inner">

                        <div id="center">
                            <div id="fig">
                                <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">
                                        Creation And Deletion</h3></center>
                                <hr>
                                <div class="charts">
                                    <div class="chrt-inner">
                                        <div class="chrt-bars">
                                            <div class="col-md-6 chrt-two">
                                                <form action="newDepartment.php">
                                                    <button class="btn btn-primary cde">
                                                        <h4 class="sub-tittle">
                                                            <center>Create New Departments</center>
                                                        </h4>
                                                    </button>
                                                </form>
                                                <br>
                                                <img class="img"
                                                     src="../../../assets/admin/images/a1.png"/><span></span>
                                                <br>
                                            </div>
                                            <div class="col-md-6 chrt-three">
                                                <form action="removeDepartment.php">
                                                    <center>
                                                        <button class="btn btn-primary efg"><h4 class="sub-tittle">
                                                                Remove Departments
                                                    </center>
                                                    </h4>
                                                    </button></form>


                                                <center><img class="img1" src="../../../assets/admin/images/a2.png"/>
                                                </center>


                                            </div>


                                        </div>

                                    </div>

                                </div>
                                <!--/candile-->

                                <!--/charts-->
                                <div class="charts">
                                    <div class="chrt-inner">
                                        <div class="chrt-bars">


                                            <div id="chart2"></div>


                                            <div class="clearfix"></div>
                                        </div>
                                        <!--/float-charts-->


                                        <!--//weather-charts-->


                                    </div>
                                </div>

                                <!--//charts-->

                                <!--/charts-inner-->
                            </div>
                            <!--//outer-wp-->
                        </div>

                    </div>
                </div>
                <!--//content-inner-->
                <!--/sidebar-menu-->

                <?php
                include 'footer.php';

                ?>
