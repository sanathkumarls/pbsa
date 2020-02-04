<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 04/02/20
 * Time: 1:18 PM
 */


require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Pbsa.php";
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

if(isset($_POST['e_id']))
    $e_id = $_POST['e_id'];
else
    $e_id = $objEmployee->getEid($email);

if(isset($_POST['year']))
    $year = $_POST['year'];
else
{
    header("Location: performance.php");
    exit();
}


//check for same department
if(!$objEmployee->checkSameDepartment($e_id,$email))
{
    header("Location: performance.php");
    exit();
}

?>



<!DOCTYPE HTML>
<html>
<head>
    <title>PBSA Performance</title>
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

                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="home.php">Home</a></li>
                        <li> <a href="performance.php">View Performance </a></li>
                        <li><?php echo $objEmployee->getName($e_id);?></li>
                        <li><?php echo $year;?></li>
                    </ol>
                </div>


                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">

                        <?php
                            $objPbsa = new Pbsa();
                            $result = $objPbsa->getIndividualPerformanceYear($e_id,$year);
                            if($result->num_rows > 0)
                            {
                                $row = $result->fetch_assoc();

                                $cgpa = (($row['c1_total'] * 30) + ($row['c2_total'] * 10) + ($row['c3_total'] * 10) + ($row['c4_total'] * 20) + ($row['c5_total'] * 10) + ($row['c6_total'] * 10) + ($row['c7_total'] * 5) + ($row['c8_total'] * 5)) /100;

                                $grade = "";
                                if($cgpa >= 9.6 && $cgpa <= 10)
                                    $grade = "A++";
                                elseif ($cgpa >= 8.6 && $cgpa <= 9.5)
                                    $grade = "A+";
                                elseif ($cgpa >= 7.6 && $cgpa <= 8.5)
                                    $grade = "A";
                                elseif ($cgpa >= 7.1 && $cgpa <= 7.5)
                                    $grade = "B++";
                                elseif ($cgpa >= 6.6 && $cgpa <= 7)
                                    $grade = "B+";
                                elseif ($cgpa >= 6.1 && $cgpa <= 6.5)
                                    $grade = "B";
                                elseif ($cgpa >= 5.6 && $cgpa <= 6)
                                    $grade = "C++";
                                elseif ($cgpa >= 5.1 && $cgpa <= 5.5)
                                    $grade = "C+";
                                elseif ($cgpa <= 5)
                                    $grade = "C";

                        ?>
                        <div id="center" ><div id="fig">
                                <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">PBSA Performance</h3></center>
                                <hr>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Marks Out of 10(X)</th>
                                        <th>Weightage(W)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row">ACADEMICS-A</th>
                                        <td><?php echo $row['c1_total'];?></td>
                                        <td>30</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">ACADEMICS-B</th>
                                        <td><?php echo $row['c2_total'];?></td>
                                        <td>10</td>

                                    </tr>
                                    <tr>

                                        <th scope="row">IMPLEMENTATION OF INSTITUTIONAL INITIATIVES</th>
                                        <td><?php echo $row['c3_total'];?></td>
                                        <td>10</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">RESEARCH - A</th>
                                        <td><?php echo $row['c4_total'];?></td>
                                        <td>20</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">RESEARCH - B</th>
                                        <td><?php echo $row['c5_total'];?></td>
                                        <td>10</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">EXTENSION CONSULTANCY AND STUDENT SUPPORT</th>
                                        <td><?php echo $row['c6_total'];?></td>
                                        <td>10</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">ORGANIZATION OF PROGRAMMES</th>
                                        <td><?php echo $row['c7_total'];?></td>
                                        <td>5</td>
                                    </tr>
                                    <tr>

                                        <th scope="row">ACADEMIC GROWTH</th>
                                        <td><?php echo $row['c8_total'];?></td>
                                        <td>5</td>
                                    </tr>


                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>
                                <center><h4 style="font-family:'Copperplate Gothic Light';color:black;font-size:30px;">Final Result</h4></center><br>

                                <div class="tables">
                                    <table class="table table-bordered">

                                        <tr>
                                            <th><h4 style="font-family:'Copperplate Gothic Light';color:black;font-size:20px;"> OVERALL GRADE POINT AVERAGE :</h4> </th>
                                            <td><h4 style="font-family:'Copperplate Gothic Light';color:black;font-size:20px;">	<?php echo $cgpa; ?> </h4> </td>
                                        </tr>

                                        <tr>
                                            <th><h4 style="font-family:'Copperplate Gothic Light';color:black;font-size:20px;"> GRADE OBTAINED : 	</h4></th>
                                            <td><h4 style="font-family:'Copperplate Gothic Light';color:black;font-size:20px;">	<?php echo $grade; ?> </h4> </td>
                                        </tr>

                                    </table>
                                </div>
                                <br>

                            </div>

                        </div>

                        <?php   }
                                else
                                {
                                    echo "No Result Found";
                                }
                            ?>
                        <br> <br> <br> 		<br> <br> <br>
                    </div>




                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


                </div>




                <?php
				include 'footer.php';
				?>
