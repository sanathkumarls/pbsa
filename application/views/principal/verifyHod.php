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
    if(!$objEmployee->checkEmailRole($email,Constants::rolePrincipal))//check realtime role
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
    <title>Department Performance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Skill" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/principal/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../../assets/principal/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="../../../assets/principal/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../../assets/principal/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <script src="../../../assets/principal/js/jquery-1.10.2.min.js"></script>
    <script src="../../../assets/principal/js/amcharts.js"></script>
    <script src="../../../assets/principal/js/serial.js"></script>
    <script src="../../../assets/principal/js/light.js"></script>
    <script src="../../../assets/principal/js/radar.js"></script>
    <link href="../../../assets/principal/css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="../../../assets/principal/css/fabochart.css" rel='stylesheet' type='text/css' />
    <!--clock init-->
    <script src="../../../assets/principal/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="../../../assets/principal/js/skycons.js"></script>

    <script src="../../../assets/principal/js/jquery.easydropdown.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../assets/principal/DataTables/media/css/jquery.dataTables.css">

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
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <?php

//                        $m = new MongoClient();
//                        $db=$m->mydb;

                        ?>	<li><a href="home.php">Home</a></li>
                        <li>Departments </li>
                    </ol>
                </div>
                <!--custom-widgets-->

                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">

                    <div class="candile-inner">

                        <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Department Performance</h3></center>
                        <hr id="hr">

                        <div id="center"><div id="fig">
                                <?php
//
//
//
//                                $i=1;
//                                $m = new MongoClient();
//                                $dbases = $m->listDBs();
//                                ?>
<!---->
<!---->



                                <section class="contact-section">
                                    <div class="container">

                                        <div class="col-md-12"><table id="example" class="display" cellspacing="0" >
                                                <thead>
                                                <tr>

                                                    <th>&nbsp;Sl No</th>
                                                    <th>&nbsp;Department</th>
                                                    <th>&nbsp;Action</th>



                                                </tr>
                                                </thead>

                                                <tbody>
<!--                                                --><?php //foreach ($dbases['databases'] as $dbs) {
//
//                                                    $dbname = $dbs['name'];
//                                                    if($dbname!='mydb'  and $dbname!='local' and $dbname!='config' and $dbname!='admin'){
//
//                                                        $e=$m->$dbname->HOD->findOne();
//                                                        $empid=$e['empid'];
//                                                        ?>
                                                        <tr>
                                                            <td><?php// echo $i;?></td>
                                                            <td><?php //echo $dbname; ?></td>

                                                            <td> <form method="post" action="hverify1.php?empid=<?php //echo $empid; ?>&dept=<?php// echo $dbname; ?>" ><button name="approve[<?php// echo $i?>]" id="app" class="btn btn-primary" value='<?php  // echo $dbname; ?>'>View</button></form> </td>
                                                        </tr>
<!--                                                        --><?php
//                                                        $i++;
//                                                    }
//                                                }
//                                                ?>




                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </section>



                                <!-- End contact section -->


                                <script type="text/javascript" src="../../../assets/principal/js/jquery.min.js"></script>
                                <script type="text/javascript" src="../../../assets/principal/js/jquery.migrate.js"></script>
                                <script type="text/javascript" src="../../../assets/principal/js/bootstrap.min.js"></script>
                                <script type="text/javascript" src="../../../assets/principal/js/jquery.imagesloaded.min.js"></script>
                                <script type="text/javascript" src="../../../assets/principal/js/retina-1.1.0.min.js"></script>
                                <script type="text/javascript" src="../../../assets/principal/js/script.js"></script>

                                <!-- ############## Data table coding starts here -->
                                <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/principal/DataTables/media/js/jquery.dataTables.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/principal/DataTables/examples/resources/syntax/shCore.js"></script>
                                <script type="text/javascript" language="javascript" src="../../../assets/principal/DataTables/examples/resources/demo.js"></script>
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

<?php
include 'footer.php';

?>