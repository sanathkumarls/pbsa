<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

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
    <title>Add Department</title>
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
        hr{
            background-color:#221375;
            height:2px;
            width:200px;
        }
        #logo{
            width:50px;
            height:50px;
            margin-top:-20%;
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
        .lev{

            margin-left:0%;
            color:black;
        }
        .lev1{
            margin-top:-2%;
            margin-left:1.5%;
            color:black;
        }
        .form-body{

            margin-left:10%;
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
        .alert{
            margin-left:10%;
            width:75%;
        }
        .sidebar-menu::-webkit-scrollbar {
            width: 5px;  /* remove scrollbar space */
            background: black;  /* optional: just make scrollbar invisible */
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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="organization.php">Organization</a></li>

                        <li>Create New Department</li>
                    </ol>
                </div>




                <div class="form-title">

                </div>
                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">


                        <div id="center"><div id="fig">
                                <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Add Departments</h3></center>
                                <hr>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                <script>

                                    $(document).ready(function(e) {

                                        var i=3;
                                        var max=10;
                                        var x=3;
                                        // var html='<div> <br><input type="text" name="name'+i+'" class="form-control" placeholder="Level Name'+i+'" id="childname"><input type="text" name="lno'+i+'" class="form-control" id="exampleInputPassword1" placeholder="Level Number">&nbsp;&nbsp;&nbsp;<a href="#" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></a></td></tr></div>';

                                        $("#add").click(function(e) {
                                            var html='<div class="ab"><span class="col-md-10"><input type="text" name="name[]" autocomplete="off" class="form-control" placeholder="CollegeName_Department Name" id="childname"></span><a href="#" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></a></div>';

                                            if(x<=max){
                                                i++;
                                                $("#abc").append(html);
                                                x++;
                                            }
                                        });

                                        $("#abc").on('click','#remove',function(e) {
                                            $(this).parent('div').remove();
                                            x--; i--;
                                        });

                                    });


                                </script>


                                <div id="container1" class="con">
                                    <form method ="post" action="../../controllers/admin/AdminAddDept.php" autocomplete="off">

                                        <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                                            <div class="form-body">
                                                <div class="form-group"><br> <label for="exampleInputEmail1"></label>
                                                    <div class="lev1"><b>Enter  Department :</b></div>

                                                    <div class="col-sm-10">
                                                        <input type="text" name="deptName" autocomplete="off" class="form-control" id="lname" placeholder="Department Name" required>
                                                    </div><br><br>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="deptAbbr" autocomplete="off" class="form-control" id="lname" placeholder="Department Abbrivation" required>
                                                    </div><br><br>


                                                    <div id="abc"></div>
                                                </div><div class="col-sm-10">
                                                </div><br><br><div class="col-sm-6">
                                                    <button type="submit" name="submit" class="btn btn-info">Submit</button> </form>
                                </div>
                            </div></div>



                    </div>

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



                <div class="clearfix"> </div>
            </div>
            <!--/float-charts-->
            <div class="pie">

                <h3 class="sub-tittle"></h3>
                <div id="chartdiv2"></div>




                <h3 class="sub-tittle"></h3>
                <div id="chartdiv4"></div>



                <div class="clearfix"> </div>
            </div>
            <div class="area">

                <h3 class="sub-tittle"></h3>
                <div style="area">

                </div>



                <h3 class="sub-tittle"></h3>
                <div id="chartdiv1"></div>


                <div class="clearfix"></div>
            </div>
            <!--//weather-charts-->
            <div class="graph-visualization">

                <h3 class="sub-tittle"></h3>
                <div class="weather">
                    <div class="weather-top">
                        <div class="weather-top-left">


                            <div class="clearfix"></div>
                        </div>


                    </div>
                    <div class="weather-top-right">

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="weather-bottom">
                    <div class="weather-bottom1">
                        <div class="weather-head">

                            <div class="bottom-head">

                            </div>
                        </div>
                    </div>
                    <div class="weather-bottom1 ">
                        <div class="weather-head">

                        </div>
                    </div>
                    <div class="weather-bottom1">
                        <div class="weather-head">

                        </div>
                    </div>
                    <div class="weather-bottom1 ">
                        <div class="weather-head">



                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>



            </div>

            <div class="clearfix"> </div>
        </div>

        <!--//charts-->
        <div class="area-charts">


            <div class="clearfix"></div>

            <!--/bottom-grids-->

            <div class="dev-table">


                <div class="clearfix"></div>

            </div>

            <!--//bottom-grids-->

        </div>
        <!--/charts-inner-->
    </div>
    <!--//outer-wp-->
</div>

</body>
</html>
<!--//content-inner-->
<!--/sidebar-menu-->
<?php
include 'footer.php';

?>
