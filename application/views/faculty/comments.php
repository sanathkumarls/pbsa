<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];

    $objEmployee = new Employee();
    if(!$objEmployee->checkEmailRole($email,Constants::roleFaculty))//check realtime role
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
    <title>Comments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Skill" />
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
        .btn{
            margin-left:20%;
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
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        #select{
            padding-bottom:5px;
            padding-top:5px;
            margin-left:10%;
        }
        .alert{
            width:100%;

            margin-left:0%;
        }
        hr{
            background-color:#221375;
            height:2px;
            width:200px;
        }
        .lev{

            margin-left:10%;
        }
        #btn{
            margin-left:60%;
            width:120px;
            margin-top:-10%;
        }
        #vp{
            margin-left:40%;
        }
        #fname{
            width:100%;
            height:400px;

        }
        #xabc{
            width:100%;
            height:250px;
            margin-left:2%;
        }
        #mb{
            height:550px;
        }
        #p{
            margin-left:10%;
        }
    </style>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js">
    </script>
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

                <div>
                    <div class="candile">
                        <div class="candile-inner">

                            <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Comments</h3></center>
                            <hr>

                            <br>
                        </div>


                        <form method="get" action="">


                            <!-- <textarea type="text" rows="15" cols="156" placeholder="No Comments" name="comments">	</textarea>
                                     -->

                            <!-- <input name="fname" class="form-control" id="fname" type="text" placeholder="No Comments"  -->
<!--                            --><?php //$m = new MongoClient();
//
//                            $val=$_GET['id'];
//                            $db=$m->mydb;
//                            $coll=$db->login;
//                            $dat=$coll->findOne(["username"=>"$val"]);
//
//                            $em=$dat["dept"];
//
//                            $db = $m->$em;
//
//                            $coll = $db->Comments;
//
//                            $txt=$coll->findOne(["id"=>"$val"]);
//                            $t=$txt["text"];
//                            //echo gettype($t);
//                            $string=$t;
//                            //echo gettype($string);
//                            //echo "$s";
//                            $token = strtok($string, "\n");
//
//                            while ($token !== false)
//                            {
//                                echo "$token"."<br>";
//                                $token = strtok("\n");
//                            }
//                            if($t==null)
//                            {
//                                echo "No Comments";
//                            }


                            ?> </div>
                    </div>

<?php

include 'footer.php';

?>