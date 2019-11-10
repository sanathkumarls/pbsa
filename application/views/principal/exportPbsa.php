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
            #lev{
                margin-left:20%
            }
            #xx{

                margin-left:29%;
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
//
//                $m = new MongoClient();
//                $db=$m->mydb;

                ?>	<li><a href="home.php">Home</a></li>
                <li>Export PBSA </li>
            </ol>
        </div>
        <!--custom-widgets-->

        <!--//custom-widgets-->
        <!--/candile-->
        <div class="candile">

            <div class="candile-inner">

                <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Export PBSA</h3></center>
                <hr id="hr">
                <?php
//                if(isset($_POST['submit']))
//                {
//                    try{
//                        $m=new MongoClient();
//
//
//                        $pb=$m->mydb;
//                        $pb->pbsa->remove();
//                        $dat=$pb->login->find();
//                        foreach($dat as $d)	{
//                            $empidx=$d['empid'];
//                            $empname=$d['Name'];
//                            $dept=$d['dept'];
//                            $db=$m->$dept;
//
//                            $x=$db->A1->findOne(["empid"=>"$empidx"]);
//                            if($x){
//                                $a1=$db->A1;
//                                $a2=$db->A2;
//                                $a3=$db->A3;
//                                $a4=$db->A4;
//                                $a5=$db->A5;
//                                $a6=$db->A6;
//                                $a7=$db->A7;
//
//                                /*  $ha1=$db->$HA1;
//                                  $ha2=$db->$HA2;
//                                  $ha3=$db->$HA3;
//                                  $ha4=$db->$HA4;
//                                  $ha5=$db->$HA5;
//                                  $ha6=$db->$HA6;
//                                  $ha7=$db->$HA7;*/
//
//                                $a=$a1->findOne(array("empid"=>"$empidx"));
//                                $b=$a2->findOne(array("empid"=>"$empidx"));
//                                $c=$a3->findOne(array("empid"=>"$empidx"));
//                                $d=$a4->findOne(array("empid"=>"$empidx"));
//                                $e=$a5->findOne(array("empid"=>"$empidx"));
//                                $f=$a6->findOne(array("empid"=>"$empidx"));
//                                $g=$a7->findOne(array("empid"=>"$empidx"));
//                                $t=($a['wx']+$b['wx']+$c['wx']+$d['wx']+$e['wx']+$f['wx']+$g['wx'])/100;
//                                $h=$a['marks'];
//                                $i=$b['marks'];
//                                $j=$c['marks'];
//                                $k=$d['marks'];
//                                $l=$e['marks'];
//                                $m1=$f['marks'];
//                                $n=$g['marks'];
//
//
//
//                                $doc=array(
//                                    "Empid"=>"$empidx",
//                                    "Emp_Name"=>"$empname",
//                                    "Designation"=>"Employee",
//                                    "Dept"=>"$dept",
//                                    "Academics_A"=>"$h",
//                                    "Academics_B"=>"$i",
//                                    "Inst_Initiatives"=>"$j",
//                                    "Research"=>"$k",
//                                    "Extension_Consultency"=>"$l",
//                                    "Org_of_Prog"=>"$m1",
//                                    "Academic_Growth"=>"$n",
//                                    "OGPA"=>"$t");
//                                $y=$pb->pbsa->findOne(["empid"=>"$empidx"]);
//                                if(!$y){
//                                    $pbsa=$pb->pbsa->insert($doc);
//                                }
//                                else{
//                                    $pbsa=$pb->pbsa->update(array("empid"=>"$empidx"),
//                                        array('$set'=>array("Academics_A"=>"$h",
//                                            "Academics_B"=>"$i",
//                                            "Inst_Initiatives"=>"$j",
//                                            "Research"=>"$k",
//                                            "Extension_Consultency"=>"$l",
//                                            "Org_of_Prog"=>"$m1",
//                                            "Academic_Growth"=>"$n",
//                                            "OGPA"=>"$t")));
//
//                                }
//                            }
//                            //echo $empid;
//                        }
//                        /*foreach ($dbases['databases'] as $dbs) {
//
//                        $dbname = $dbs['name'];
//                         if($dbname!='mydb'  and $dbname!='local' and $dbname!='config' and $dbname!='admin'){
//
//                         }
//                        }*/
//
//
//
//
//
//                    }
//                    catch(Exception $e){
//                        echo"Error".$e;
//
//                    }
//
//                    try{
//                        $m=new MongoClient();
//
//                        $pb=$m->mydb;
//                        $dat=$pb->hlogin->find();
//                        foreach($dat as $d)	{
//                            $empid=$d['empid'];
//                            $empname=$d['Name'];
//                            $dept=$d['dept'];
//                            $db=$m->$dept;
//
//                            $x=$db->HA1->findOne(["empid"=>"$empid"]);
//                            if($x){
//                                $a1=$db->HA1;
//                                $a2=$db->HA2;
//                                $a3=$db->HA3;
//                                $a4=$db->HA4;
//                                $a5=$db->HA5;
//                                $a6=$db->HA6;
//                                $a7=$db->HA7;
//
//                                $a=$a1->findOne(array("empid"=>"$empid"));
//                                $b=$a2->findOne(array("empid"=>"$empid"));
//                                $c=$a3->findOne(array("empid"=>"$empid"));
//                                $d=$a4->findOne(array("empid"=>"$empid"));
//                                $e=$a5->findOne(array("empid"=>"$empid"));
//                                $f=$a6->findOne(array("empid"=>"$empid"));
//                                $g=$a7->findOne(array("empid"=>"$empid"));
//                                $t=($a['wx']+$b['wx']+$c['wx']+$d['wx']+$e['wx']+$f['wx']+$g['wx'])/100;
//                                $h=$a['marks'];
//                                $i=$b['marks'];
//                                $j=$c['marks'];
//                                $k=$d['marks'];
//                                $l=$e['marks'];
//                                $m1=$f['marks'];
//                                $n=$g['marks'];
//
//
//
//                                $doc=array(
//                                    "Empid"=>"$empid",
//                                    "Emp_Name"=>"$empname",
//                                    "Designation"=>"HOD",
//                                    "Dept"=>"$dept",
//                                    "Academics_A"=>"$h",
//                                    "Academics_B"=>"$i",
//                                    "Inst_Initiatives"=>"$j",
//                                    "Research"=>"$k",
//                                    "Extension_Consultency"=>"$l",
//                                    "Org_of_Prog"=>"$m1",
//                                    "Academic_Growth"=>"$n",
//                                    "OGPA"=>"$t");
//                                $Z=$pb->pbsa->findOne(["empid"=>"$empid"]);
//                                if(!isset($Z))
//                                    $pbsa=$pb->pbsa->insert($doc);
//                                else{
//                                    $pbsa=$pb->pbsa->update(array("empid"=>"$empid"),
//                                        array('$set'=>array("Academics_A"=>"$h",
//                                            "Academics_B"=>"$i",
//                                            "Inst_Initiatives"=>"$j",
//                                            "Research"=>"$k",
//                                            "Extension_Consultency"=>"$l",
//                                            "Org_of_Prog"=>"$m1",
//                                            "Academic_Growth"=>"$n",
//                                            "OGPA"=>"$t")));
//
//                                }
//                            }
//                            //echo $empid;
//                        }
//                        /*foreach ($dbases['databases'] as $dbs) {
//
//                        $dbname = $dbs['name'];
//                         if($dbname!='mydb'  and $dbname!='local' and $dbname!='config' and $dbname!='admin'){
//
//                         }
//                        }*/
//
//
//
//
//
//                    }
//                    catch(Exception $e){
//                        echo"Error".$e;
//
//                    }
//
//                    $file=$_POST['xx'];
//                    $path=$_POST['xx1'];
//
//
//
//                    $command='mongoexport --db mydb --collection pbsa --type=csv --fields Empid,Emp_Name,Designation,Dept,Academics_A,Academics_B,Inst_Initiatives,Research,Extension_Consultency,Org_of_Prog,Academic_Growth,OGPA --out '.$path.'/'.$file.'.csv';
//
//                    //'mongoexport --db mydb --collection pbsa --type=csv --out --fields Empid,Emp Name,Designation'.$path.'/'.$file.'.csv';
//                    //echo $command;
//                    echo shell_exec($command);
//
//
//
//
//                }
                ?>
                <div id="center"><div id="fig">
                        <form method="post">
                            <label id="lev" for="dept"><b>File Name </b>  </label>
                            <br>
                            <div class="col-md-8">  <input type="text" autocomplete="off" name="xx"  class="form-control" id="xx" required="" ></div>

                            <br>
                            <br>
                            <label id="lev" for="dept"><b>Path to Store</b>  </label>
                            <br>
                            <div class="col-md-8">  <input type="text" autocomplete="off" name="xx1"  class="form-control" id="xx" required="" ></div>



                            <div class="col-md-2">



                                <?php  //$command=' mongoexport --db mydb --collection login --type=csv --fields Name,Email --out C:\Users\Keerthana\Desktop\contacts.csv';
                                //echo $command;
                                //  echo shell_exec($command);	 ?>

                            </div>
                            <br>
                            <br>
                            <br>

                            <CENTER>  <button name="submit" class="btn btn-primary">Export PBSA As Excel </button></center>


                        </form >









                        <!-- End contact section -->


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