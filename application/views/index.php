<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/11/19
 * Time: 10:16 PM
 */

require_once __DIR__."/../utilities/Constants.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    if($_SESSION['role'] == Constants::roleFaculty)
        header('Location: faculty/index.php');
    if($_SESSION['role'] == Constants::roleHod)
        header('Location: hod/index.php');
    if($_SESSION['role'] == Constants::rolePrincipal)
        header('Location: principal/index.php');
    if($_SESSION['role'] == Constants::roleManagement)
        header('Location: management/index.php');
    if($_SESSION['role'] == Constants::roleAdmin)
        header('Location: admin/index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PBSA System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../../assets/css/aos.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

    <style>
        .col-md-3{
            margin-top:-20%;
        }
        .btn{
            margin-top:20%;
            width:180px;
        }

    </style>
</head>
<body  oncontextmenu="return false">



<section class="home-slider owl-carousel ftco-degree-bg">
    <div class="slider-item" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-10 ftco-animate text-center">
                    <BR><BR>
                    <h1 class="mb-4">Welcome to <BR>
                        <strong class="typewrite" data-period="400" data-type='[ " PBSA System" ]'>
                        </strong>


                    </h1>
                </div>
                <div class="col-md-6">

                    <img src="../../assets/images/laptop.png" class="laptop-image" alt="">
                </div>

                <div class="col-md-3">
                    <a href="login.php" class="btn btn-primary btn-outline-white px-4 py-3"><span class="ion-ios-play mr-2"></span> LOGIN</a>
                </div>
                <div class="col-md-3">
                    <a href="join.php" class="btn btn-primary btn-outline-white px-4 py-3 "><span class="ion-ios-play mr-2"></span> JOIN</a>
                </div>



            </div>
        </div>
    </div>
</section>




<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery.easing.1.3.js"></script>
<script src="../../assets/js/jquery.waypoints.min.js"></script>
<script src="../../assets/js/jquery.stellar.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../../assets/js/aos.js"></script>
<script src="../../assets/js/jquery.animateNumber.min.js"></script>
<script src="../../assets/js/bootstrap-datepicker.js"></script>
<script src="../../assets/js/jquery.timepicker.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="../../assets/js/google-map.js"></script>
<script src="../../assets/js/main.js"></script>

</body>
</html>