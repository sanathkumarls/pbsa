
<?php

require_once '../../models/Department.php';

$objDepartment =new Department();

$departments = $objDepartment->getDepartments();

require_once __DIR__ ."/../../models/Admin.php";
require_once __DIR__ ."/../../utilities/Constants.php";
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword'])) {
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];
    $objAdmin = new Admin();
    if (!$objAdmin->checkEmail($email))//check realtime role
    {
        header("Location: ../../controllers/LogoutController.php");
    }
    if ($changePassword == 1) {
        header("Location: changePassword.php");
    }
} else {
    header('Location: index.php');
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Import Data</title>
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

        #m{
            margin-left:1%;
        }
        #xx{
            margin-left:37%;
            width:70%;
            padding-bottom:5px;
            padding-top:5px;
            color:red;
        }
        .s{
            margin-left:25px;

        }
        #fig{
            margin-left:1%;
        }
        body{
            background:#ddd;
        }

        .alert
        {	width:50%;
            margin-left:25%;
        }
        #lev{
            color:black;
            margin-left:25%;
        }
        #select{
            padding-top:5px;
            padding-bottom:5px;
            margin-left:25%;
            width:50%;
        }
        .tables{
            width:500px;
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
                        <li>Import</li>
                    </ol>
                </div>






                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">

                    <div class="candile-inner">

                        <div id="center"><div id="fig">

                                <form method="post"  enctype="multipart/form-data">


                                    <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Import Employees</h3></center>
                                    <hr> <br> <br>



                                    <label id="lev" for="dept"><b>CSV file to import</b>  </label>
                                    <div class="col-md-8">  <input type="file" autocomplete="off" name="xx"  class="form-control" id="xx" accept=".csv"   required="" ></div>
                                    <div class="col-md-2">
                                        <button type="button" class="s" data-toggle="modal" data-target="#myModal">
                                            <i style="color:black;" class="fa fa-calendar-o fa-2x"></i>												 </button>
                                    </div>
                                    <br>
                                    <label id="lev" for="dept"><b>Department</b></label>
                                    <select class="form-control" id="select" name="db" required>

                                        <option  value="">Choose a department  </option>
                                        <?php
                                        if($departments->num_rows > 0)
                                        {
                                            while ($row = $departments->fetch_assoc())
                                            {
                                                echo '<option  value="'.$row['d_id'].'">'.$row['d_abbr'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>



                                    <CENTER>  <input type="submit" name="submit" class="btn btn-primary" value="Import"></center>


                                </form >
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close second" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h2 class="modal-title">Note :</h2>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Csv File should have following Fields </h4>
                                                <div class="graph">
                                                    <div class="tables">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>initial</th>
                                                                <th>empid</th>
                                                                <th>Name</th>

                                                                <th>Email</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                * Field names has to be same as given in table above. After importing the employees get username and password to their mail.

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>


                                <?php
                              /*  if(isset($_POST['submit']))
                                {
                                    try{
                                        $m=new MongoClient();
                                        $img=$_FILES['xx']['name'];
                                        move_uploaded_file($_FILES['xx']['tmp_name'],'uploads/e.csv');
                                        // $contents = file_get_contents('e.sh');
                                        $dbase=$_POST['db'];
                                        //echo $dbase;
                                        $command='mongoimport -d '.$dbase.' -c Employee --type csv --file uploads/e.csv --headerline';
                                        //echo $command;
                                        echo shell_exec($command);
                                        $dbm=$m->mydb;
                                        $db=$m->$dbase;
                                        $coll=$db->Employee->find();
                                        foreach($coll as $c){
                                            $empid=$c['empid'];
                                            //  echo $empid;
                                            $coll1=$dbm->login->findOne(array("empid"=>"$empid"));

                                            if(!$coll1)
                                            {
                                                //  echo $c['Email'];
                                                $email=$c['Email'];
                                                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
                                                $password = substr( str_shuffle( $chars ), 0, 8 );
                                                $password1= md5($password);
                                                $to = $email;
                                                $name=$c['Name'];
                                                $subject = 'Your registration is completed';
                                                //Let's Prepare The Message For The E-mail
                                                $message ='Hello '.$name.',
Your Username and password are as follows:
Username: '.$empid.'
Your password : '.$password.'
Now you can login with this adminEmailCheck and password.';
                                                /* Send The Message Using mail() Function */
                                                /*if(mail($to, $subject, $message ))
                                                {
                                                    $doc = array(
                                                        "Jid" =>"$empid",
                                                        "empid"=> "$empid",
                                                        "Name" =>"$name",
                                                        "Email" => "$email",
                                                        "dept"=>"$dbase",
                                                        "adminEmailCheck"=> "$empid",
                                                        "Password" => md5($password),
                                                        "status"=>1);
                                                    $dbm->login->insert($doc);
                                                    $dbm->login->createIndex(array('Jid' => 1), array('unique' => 1));
                                                    $db->Employee->update(array("empid"=>"$empid"),
                                                        array('$set'=>array(
                                                            "Photo"=>"","Mobile"=>"","Address"=>""	)));


                                                }


                                            }



                                        }



                                        echo '<br><div class="alert alert-info" role="alert"><strong>Done!</strong> Data imported Successfully.</div>';
                                    }


                                    catch(Exception $e){
                                        echo '<br><div class="alert alert-danger" role="alert"><strong>Error!</strong> Could not Data import all the data .</div>';

                                    }
                                }
                                */?>
                            </div>	</div>

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

