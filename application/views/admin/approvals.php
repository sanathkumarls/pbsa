<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../models/Department.php";
require_once __DIR__."/../../models/Role.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once  __DIR__."/../../models/Employee.php";
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
    <title>Notifications</title>
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
    <!--clock init-->
    <script src="../../../assets/admin/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/admin/js/skycons.js"></script>

    <script src="../../../assets/admin/js/jquery.easydropdown.js"></script>
    <style>
        #hr{
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
        .h4
        {
            margin-top:-3%;
        }
        .candile{
            margin-left:25%;
            margin-right:25%;
            border: 2px solid #ddd;
        }
        .tini-time-line1
        {
            margin-left:20%;

        }
        .media{
            width:70%;
            border:none;
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
        #app{
            margin-top:-135%;

            float:left;
        }
        #reject{
            margin-top:-116%;
            width:85%;
        }
        body{
            background:#ddd;
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
                        <li>Approvals</li>

                    </ol>
                </div>


                <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Approve Employees</h3></center>
                <hr id="hr">

                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">
                        <h4 class="h4">Notifications</h4>
                        <hr>


                        <div id="center"><div id="fig">

<?php

$objDept = new Department();
$objRole = new Role();
$objEmployee = new Employee();
$result = $objEmployee->pendingEmployee();
if($result->num_rows > 0)
{
?>

    <?php
    while($row = $result->fetch_assoc())
    {
        $department = $objDept->getDepartmentName($row['department']);
    ?>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <div class="lg-item-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Id :&nbsp;<?php echo $row['emp_id'];?></div>
                                                    <div class="lg-item-heading" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name :&nbsp;<?php echo $row['first_name']." ".$row['last_name'];?></div>
                                                    <div class="lg-item-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail :&nbsp;<?php echo $row['email'];?></div>
                                                    <?php if($department != "") { ?><div class="lg-item-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Department :&nbsp;<?php echo $department ;?></div><?php }?>
                                                    <div class="lg-item-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Designation :&nbsp;<?php echo $objRole->getRoleName($row['role']);?></div>
                                                </div>
                                                <br>
                                            </div>
                                        <hr>
                                        <div class="pull-right">

                                            <form method="post" action="../../controllers/admin/AdminApproveReject.php" >	<button name="approve" id="app" class="btn btn-primary" value="<?php echo $row['e_id'];?>">Approve</button></form>

                                            <form method="post" action="../../controllers/admin/AdminApproveReject.php">	<button id="reject" name="reject" class="btn btn-primary"   value="<?php echo $row['e_id'];?>">Reject</button></form>


                                        </div>
    <?php }?>
<?php }else{?>
                                    <div class="pull-left">
                                        <div class="lg-item-heading">No Notifications found</div>
                                    </div>
<?php }?>

                               <br><br>
                            </div>
                        </div>

                    </div>

                </div>
                <!--/candile-->



                <!--//outer-wp-->
            </div>

        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php
    include 'footer.php';
    ?>
