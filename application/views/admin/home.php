

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
        exit();
    }
    if($role != Constants::roleAdmin)
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
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PBSA" />
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
    <!--clock init-->
    <script src="../../../assets/admin/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/admin/js/skycons.js"></script>

    <script src="../../../assets/admin/js/jquery.easydropdown.js"></script>
    <style>

        #logo{
            width:50px;
            height:50px;
            margin-top:-20%;
        }
        hr{
            background-color:#221375;
            height:2px;
            width:200px;
        }
        #image1{
            width:130px;
            height:130px;
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
        h1{
            margin-top:20%;
        }
        body{
            background:#ddd;
        }
    </style>
    <!--//skycons-icons-->
</head>
<body oncontextmenu="return false">
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

                        <li>Home</li>
                        <li></li>
                    </ol>
                </div>






                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">

                    <div class="candile-inner">

                        <div id="center"><div id="fig">

                                <div class="accordion">
                                    <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Basic Information</h3></center>
                                    <hr>
                                    <div class="panel-group tool-tips graph-form" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                        Department
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <ul>
                                                        <!--	<li>Add levels in Organization </li>-->
                                                        <li>Create Department </li>	<li>Remove Department </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                        Approvals
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>View Employee Notification for joining</li>
                                                        <li>Approval of the Employee Request</li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-default">
                                            <div class="panel-heading" role="tab" id="headingFour">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Employees
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <ul><li>List All Active Employees</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div></div>

                </div>

            </div>
            <!--/candile-->

            <!--/charts-->
            <div class="charts">
                <div class="chrt-inner">
                    <div class="chrt-bars">


                        <div id="chart2"></div>

                        <div class="clearfix"> </div>
                    </div>
                    <!--/float-charts-->
                    <div class="pie">

                        <h3 class="sub-tittle"></h3>
                        <div id="chartdiv2"></div>

                    </div>


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
