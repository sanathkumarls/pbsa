<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 05/02/20
 * Time: 10:08 PM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Pbsa.php";
require_once __DIR__."/../../models/Department.php";
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
    if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
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
{
    header('Location: deptPerformance.php');
    exit();
}

?>


<!DOCTYPE HTML>
<html>
<head>
    <title>PBSA Performance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PBSA" />
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
    <link rel="stylesheet" type="text/css" href="../../../assets/hod/DataTables/media/css/jquery.dataTables.css">

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
            margin-left:0%;

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

        body{
            background:#ddd;
        }
        .container{
            width:100%;
        }
        input[type="search"]{
            background-color:#ddd;
            color:black;
        }
        th,td{
            text-align:center;
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
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="home.php">Home</a></li><?php $e_name = $objEmployee->getName($e_id);?>
                        <li><a href="performance.php">View Performance</a></li><?php $objDep = new Department();?>
                        <li><?php echo $objDep->getDepartmentNameFromEmployeeId($e_id);?></li>
                        <li><?php echo $e_name;?></li>
                    </ol>
                </div>
                <!--custom-widgets-->

                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">

                    <div class="candile-inner">

                        <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">PBSA Performance - <?php echo $e_name;?></h3></center>
                        <hr id="hr">

                        <div id="center"><div id="fig">


                                <section class="contact-section">
                                    <div class="container">

                                        <div class="col-md-12"><table id="example" class="display" cellspacing="0" >
                                                <thead>
                                                <tr>

                                                    <th>&nbsp;Sl No</th>
                                                    <th>&nbsp;Year</th>
                                                    <th>&nbsp;CGPA(10)</th>
                                                    <th>&nbsp;Grade</th>
                                                    <th>&nbsp;Submitted On</th>
                                                    <th>&nbsp;Action</th>


                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                $objPbsa = new Pbsa();
                                                $result = $objPbsa->getIndividualPerformance($e_id);
                                                if($result->num_rows > 0)
                                                {
                                                    $i=0;
                                                    $cgpa_total=0;
                                                    while($row = $result->fetch_assoc())
                                                    {

                                                        $cgpa_x = (($row['c1_total'] * 30) + ($row['c2_total'] * 10) + ($row['c3_total'] * 10) + ($row['c4_total'] * 20) + ($row['c5_total'] * 10) + ($row['c6_total'] * 10) + ($row['c7_total'] * 5) + ($row['c8_total'] * 5)) /100;
                                                        $cgpa = round($cgpa_x,1);
                                                        $cgpa_total+=$cgpa;
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

                                                        echo '<tr>
                                                                    <td>'.++$i.'</td>
                                                                    <td>'.$row["year"].'</td>
                                                                    <td>'.$cgpa.'</td>
                                                                    <td>'.$grade.'</td>
                                                                    <td>'.$row["timestamp"].'</td>

                                                                    <td> <form method="post" action="pbsaPerformance.php"><input name="e_id" value="'.$e_id.'" hidden readonly><input name="year" value="'.$row["year"].'" hidden readonly> <button name="view" id="app" class="btn btn-primary">View</button></form> </td>
                                                                  </tr>';
                                                    }

                                                    $avg_x = $cgpa_total/$i;
                                                    $avg = round($avg_x,1);

                                                    $grade_avg = "";
                                                    if($avg >= 9.6 && $avg <= 10)
                                                        $grade_avg = "A++";
                                                    elseif ($avg >= 8.6 && $avg <= 9.5)
                                                        $grade_avg = "A+";
                                                    elseif ($avg >= 7.6 && $avg <= 8.5)
                                                        $grade_avg = "A";
                                                    elseif ($avg >= 7.1 && $avg <= 7.5)
                                                        $grade_avg = "B++";
                                                    elseif ($avg >= 6.6 && $avg <= 7)
                                                        $grade_avg = "B+";
                                                    elseif ($avg >= 6.1 && $avg <= 6.5)
                                                        $grade_avg = "B";
                                                    elseif ($avg >= 5.6 && $avg <= 6)
                                                        $grade_avg = "C++";
                                                    elseif ($avg >= 5.1 && $avg <= 5.5)
                                                        $grade_avg = "C+";
                                                    elseif ($avg <= 5)
                                                        $grade_avg = "C";

                                                    echo '<div class="col-md-12"><table class="display" cellspacing="0" align="center"><center><h3 style="font-family:Copperplate Gothic Light;color:black;font-size:40px;">Overall Performance</h3></center>
                                                    <hr id="hr"><thead>
                                                    <tr><th>CGPA(10)</th>
                                                    <th style="padding-left: 50px">Grade</th></tr></thead>
                                                    <tbody><tr><td  style="padding-top: 25px">'.$avg.'</td><td style="padding-left: 50px;padding-top: 25px">'.$grade_avg.'</td></tr></tbody></table></div>';
                                                }

                                                ?>


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </section>



                                <!-- End contact section -->


                                <script type="text/javascript" src="../../../assets/hod/js/jquery.min.js"></script>
                                <script type="text/javascript" src="../../../assets/hod/js/jquery.migrate.js"></script>
                                <script type="text/javascript" src="../../../assets/hod/js/bootstrap.min.js"></script>
                                <script type="text/javascript" src="../../../assets/hod/js/jquery.imagesloaded.min.js"></script>
                                <script type="text/javascript" src="../../../assets/hod/js/retina-1.1.0.min.js"></script>
                                <script type="text/javascript" src="../../../assets/hod/js/script.js"></script>

                                <!-- ############## Data table coding starts here -->
                                <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/hod/DataTables/media/js/jquery.dataTables.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/hod/DataTables/examples/resources/syntax/shCore.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/hod/DataTables/examples/resources/demo.js"></script>
                                <script type="text/javascript" language="javascript" class="init">
                                    $(document).ready(function() {
                                        $('#example').DataTable( {
                                            "language": {
                                                "lengthMenu": "Display _MENU_ records per page",
                                                "zeroRecords": "Nothing found - sorry",
                                                "info": "Showing page _PAGE_ of _PAGES_",
                                                "infoEmpty": "No records available",
                                                "infoFiltered": "(filtered from _MAX_ total records)"
                                            }
                                        } );
                                    } );

                                </script>

                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                </div>

            </div>
            <!--/candile-->

            <!--/charts-->







            <!--//custom-widgets-->

            <!--/charts-->



            <!--//content-inner-->
            <!--/sidebar-menu-->
            <?php
            include 'footer.php';
            ?>


