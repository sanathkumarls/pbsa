<?php
/**
 * Created by PhpStorm.
 * User: subramanyakashyap
 * Date: 07-11-2019
 * Time: 11:42
 */
require_once '../../models/Management.php';
session_start();
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
    $objManagement = new Management();
    if(!$objManagement->checkEmail($email)){
        session_destroy();
        header("Location:index.php");
    }
}
else {
    header('Location:index.php');
}
	?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Management Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Skill" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="../../../assets/management/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="../../../assets/management/css/style.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="../../../assets/management/css/font-awesome.css" rel="stylesheet">
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="../../../assets/management/css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="../../../assets/management/js/jquery-1.10.2.min.js"></script>
        <script src="../../../assets/management/js/amcharts.js"></script>
        <script src="../../../assets/management/js/serial.js"></script>
        <script src="../../../assets/management/js/light.js"></script>
        <script src="../../../assets/management/js/radar.js"></script>
        <link href="../../../assets/management/css/barChart.css" rel='stylesheet' type='text/css' />
        <link href="../../../assets/management/css/fabochart.css" rel='stylesheet' type='text/css' />
        <!--clock init-->
        <script src="../../../assets/management/js/css3clock.js"></script>
        <!--Easy Pie Chart-->
        <!--skycons-icons-->
        <script src="../../../assets/management/js/skycons.js"></script>

        <script src="../../../assets/management/js/jquery.easydropdown.js"></script>
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
            #bt{
                float:left;
                margin-right:5%;
                margin-bottom:100px;
                margin-top:2.2%;
            }
            #btx{
                margin-top:-150px;
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

                                    <h1 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">

                                        Welcome to<br><br>
                                        PBSA System.....</h1>


                                    <br> <br>
                                    <form action="verify.php" method="post">


                                        <button id="bt" class="button">Verify Employee PBSA &nbsp;<i class="fa fa-angle-double-right fa-lg"></i></button>

                                        <br> <br>
                                    </form>
                                    <form action="hverify.php" method="post">


                                        <button id="btx" class="button">&nbsp;&nbsp;Verify Manager PBSA &nbsp;<i class="fa fa-angle-double-right fa-lg"></i>&nbsp;</button>

                                        <br> <br>
                                    </form>
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