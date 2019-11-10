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
    <title>Fill PBSA</title>
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
        .btn{
            margin-left:42%;
            width:150px;
        }
        .button:hover {background-color: #00C6D7}

        .button:active {
            background-color: #011D4A;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }


        hr{
            background-color:#221375;
            height:2px;
            width:200px;
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
        #select
        {
            width:130px;
            height:30px;
        }

        input[type="file"]{
            color:#000;
            background:white;
            width:200px;
        }
        input[type="number"],input[type="text"],input[type="date"]
        {
            width:130px;

            color:#000;
            background:white;
        }
        .panel-heading :hover{
            color:white;
        }
        .panel-heading:active{
            color:white;
        }
        textarea{
            width:100%;
            height:100px;
        }
        #dec,#t{
            width:70px;
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
                        <?php $val=$_GET['id']; ?>
                        <li><a href="home.php?id=<?php echo $val;?>">Home</a></li>
                        <li>PBSA System</li>

                    </ol>
                </div>



                <!--//custom-widgets-->
                <!--/candile-->
                <div class="candile">
                    <div class="candile-inner">

                        <center><h3 style="font-family:'Copperplate Gothic Light';color:black;font-size:40px;">Fill PBSA</h3></center>
                        <hr>

                        <br>
                        * Please check All the values correctly before you submit.<BR>
                        <div id="center"><div id="fig"><form method="post" enctype="multipart/form-data">



                                    <div class="accordion">

                                        <div class="panel-group tool-tips graph-form" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h3 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                            <center>	Criteria 1:ACADEMICS-A</center>
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Student Feedback (Out Of 100)</td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['a1']; ?>" step="Any" min="0" name="a1" required /></td>
                                                                <td>15</td>
                                                                <td><input type="file"  name="f1[]" required multiple="multiple">Upload Student Feedback Report Issued By The College<br>
                                                                <input type="button" value="View Documents"> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Average Result Of All The Classes Conducted - In Percentage (%)
                                                                    (Avg Result Of Previous Odd & Even Semester)</td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['a2']; ?>"  step="Any" min="0" required name="a2" /></td>
                                                                <td>15</td>
                                                                <td><input type="file" required  name="f2[]" multiple="multiple">Upload Average Result Report In The Prescribed Format-1
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            <center>Criteria 2:ACADEMICS-B</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true">
                                                    <div class="panel-body">
                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                                <?php
                                                                //$c=$db->A2->findOne(array("empid"=>"$empid"));
                                                                ?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Punctuality-
                                                                    Yearly Biometric report (2018)<br>
                                                                    if 0 hrs shortage then  100 marks<br>
                                                                    0 to 4 hr shortage,90 %<br>
                                                                    4 to 8 hr shortage,80 %<br>
                                                                    8 to 12 hr shortage,70 %<br>
                                                                    12 to 16 hr shortage ,60 %<br>
                                                                    above 16 hr shortage ,0 marks
                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b1'];?>" step="Any" min="0" name="b1" /></td>
                                                                <td>3</td>
                                                                <td><input type="file" name="f3[]" multiple="multiple">
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Library usage in the college library(80 hrs per year then 100 marks)other wise percentage           </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b2'];?>" step="Any" min="0" name="b2" /></td>
                                                                <td>4</td>
                                                                <td><input type="file" name="f4[]" multiple="multiple">
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>CLASSES CONDUCTED as per the time table
                                                                    80 % =100 marks

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b3'];?>" step="Any" min="0" name="b3" /></td>
                                                                <td>2</td>
                                                                <td><input type="file" name="f5[]" multiple="multiple">
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Percentage of seats filled in first semester<br>
                                                                    (only for optional subjects.
                                                                    for languages the weightage is added to classes conducted.)
                                                                    100%=100 marks

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <td>1</td>
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>


                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                           // $c=$db->A3->findOne(array("empid"=>"$empid"));
                                            ?>

                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <center>Criteria 3:INSTITUTIONAL INITIATIVES / ACTIVITIES</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">

                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>Marks For Mandatory Institutional Initiatives
                                                                    Max 50
                                                                </td>
                                                                <td>NUMBERS(#)</td>
                                                                <td  rowspan="26">10</td>
                                                                <td rowspan="6"><input type="file" name="f8[]" required  multiple="multiple">	Mandatory Initiatives- Upload The Report In The Prescribed Format-2

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>AV contents developed</td>
                                                                <td class="style1"><input type="number" step="Any" value="<?php echo $c['c1'];?>" min="0" name="c1" required /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Self recorded lectures</td>
                                                                <td class="style1"><input type="number" step="Any" min="0" value="<?php echo $c['c2'];?>" name="c2" required /></td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>Expand lectures

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" min="0" value="<?php echo $c['c3'];?>" name="c3" required /></td>
                                                            </tr>

                                                            <tr>
                                                                <td>4</td>
                                                                <td>relevant video classes

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" min="0"  value="<?php echo $c['c4'];?>" name="c4" required /></td>
                                                            </tr>

                                                            <tr>
                                                                <td>5</td>
                                                                <td>student assignments

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" min="0" value="<?php echo $c['c5'];?>" name="c5" required  /></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td>Marks for Optional Initiatives
                                                                    (Max 50)
                                                                </td>
                                                                <td>NUMBERS(#)</td>
                                                                <td></td>
                                                            </tr>

                                                            <tr>
                                                                <td>1</td>
                                                                <td>Value education pgms

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" min="0" value="<?php echo $c['c6'];?>" name="c6" /></td>
                                                                <td rowspan="19"><input type="file" name="f9[]" required  multiple="multiple">Optional Initiatives - Upload The Report In The Prescribed Format-3
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Current affairs

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" value="<?php echo $c['c7'];?>" min="0" name="c7" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>SRPs/inhouse projects

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c8'];?>" step="Any" min="0" name="c8" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Alumni interaction programs

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c9'];?>" step="Any" min="0" name="c9" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Contribution to learning corners

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c10'];?>" step="Any" min="0" name="c10" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Units of notes/lesson plan uploaded

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c11'];?>" step="Any" min="0" name="c11" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>CC courses handled

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c12'];?>" step="Any" min="0" name="c12" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8
                                                                </td>
                                                                <td>Interdisciplinary pgm in college
                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c13'];?>" step="Any" min="0" name="c13" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>Contribution to our alumni our pride

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c14'];?>" step="Any" min="0" name="c14" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>Guest lectures arranged in regular classes

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" min="0" value="<?php echo $c['c15'];?>" name="c15" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td>Career guidance programmes

                                                                </td>
                                                                <td class="style1"><input type="number" step="Any" value="<?php echo $c['c16'];?>" min="0" name="c16" /></td>
                                                            </tr>
                                                            <tr >
                                                                <td >12</td>
                                                                <td>Contribution to W4H

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>

                                                            <tr >
                                                                <td >13</td>
                                                                <td>Parent faculty

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>

                                                            <tr >
                                                                <td >14</td>
                                                                <td>Film shows

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>


                                                            <tr >
                                                                <td >15</td>
                                                                <td>Alumni Faculty

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>

                                                            <tr >
                                                                <td >16</td>
                                                                <td>Exhibitions arranged

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>

                                                            <tr >
                                                                <td >17</td>
                                                                <td>Faculty exchange

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>


                                                            <tr >
                                                                <td >18</td>
                                                                <td>In-house sharing of expertise

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>

                                                            <tr >
                                                                <td >19</td>
                                                                <td>contribution to green campus

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['c17'];?>" step="Any" min="0" name="c17" /></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingFour">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            <center> Criteria 4:Research A</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">

                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>






                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                                <?php
                                                                //$c=$db->A2->findOne(array("empid"=>"$empid"));
                                                                ?>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td> </td>
                                                                <td></td>
                                                                <td  rowspan="06">20</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>. Research Publications: (in the name of own institution) <br>(UGC RECOGNISED  ONLY)
                                                                    ( for main and co authors)<br>
                                                                    International SCI INDEXED-20 marks<br>
                                                                    SCOPUS/WEB OF SCIENCE/INDERSCIENCE-15 Marks<br>
                                                                    UGC Recognised  international -10 marks<br>
                                                                    2    UGC Recognised National – 5 per each publication<br>



                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b1'];?>" step="Any" min="0" name="b1" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f3[]" multiple="multiple">
                                                                    Upload The first page of Pubslished Report.
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Any ongoing Research projects for the grant period<br>

                                                                    fund less than 3 lakhs -10 marks<br>
                                                                    3 lakhs and more -20 marks
                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b2'];?>" step="Any" min="0" name="b2" /></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="f4[]" multiple="multiple">
                                                                    Upload The first page of Sanctioned Letter.
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Project proposals submitted
                                                                    fund less than 3 lakhs -5 marks<br>
                                                                    3 lakhs and more -10 marks
                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b3'];?>" step="Any" min="0" name="b3" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f5[]" multiple="multiple">
                                                                    Upload The first page of Sanctioned Letter.
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Number of Patents in pipeline for submission-10 marks
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload The Relevant Letter.
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Patents awarded -30 per patent
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload The Relevant Letter.
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>


                                          <!--------------------------------------------------------------------------------------------------------->

                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="researchB">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseresearchB" aria-expanded="false" aria-controls="researchB">
                                                            <center> Criteria 5:Research B</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseresearchB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="researchB" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>DETAILS</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <th>Research Activities</th>
                                                                <th></th><th></th><th></th>
                                                            </tr>

                                                            <?php
                                                            //  $c=$db->A4->findOne(array("empid"=>"$empid"));
                                                            ?>



                                                            <tr>
                                                                <td rowspan="5">1</td>
                                                                <td>Research activities
                                                                    For pursuing PhD members
                                                                </td>
                                                                <td></td>
                                                                <td rowspan="07">10</td>
                                                                <td rowspan="05"><input disabled  id="d11" type="file" name="f10[]" multiple="multiple">Upload The Letter Of PhD Registration
                                                                    <br> <input type="button" value="View Documents">     </td>

                                                            </tr>
                                                            <tr>

                                                                <td>1.1)Date of registration for PhD Degree
                                                                    .for registration -10 marks up to five years
                                                                </td>
                                                                <td><input readonly id="d1" type="date" name="d1"></td>
<!--                                                                <td><input disabled  id="d11" type="file" name="f10[]" multiple="multiple">Upload The Letter Of PhD Registration-->
<!--                                                                </td>-->
                                                            </tr>
                                                            <tr>

<!--                                                                <th></th>-->
<!--                                                                <th></th>-->
<!--                                                                <td></td>-->
                                                            </tr>
                                                            <tr>
                                                                <td> 1.2)<span id="ab">half yearly reports -10 marks per report</span></td>
                                                                <td><input readonly id="d2" name="d2" min="0" value="<?php echo $c['d2'];?>"  type="number" step="Any"></td>
<!--                                                                <td><input disabled id="d21" type="file" name="f11[]"  multiple="multiple">Upload The First Page Of The Report-->
<!--                                                                </td>-->
                                                            </tr>
                                                            <<tr>
                                                                <td> 1.3)<span id="ab">For  PhD holders with guide-ship
 Number  of PhD Students  guiding in the year 10 marks per one PhD student –for  4 years
</span></td>
                                                                <td><input readonly id="d2" name="d2" min="0" value="<?php echo $c['d2'];?>"  type="number" step="Any"></td>
<!--                                                                <td><input disabled id="d21" type="file" name="f11[]"  multiple="multiple">Upload The First Page Of The Report-->
<!--                                                                </td>-->
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Papers presented<br>
                                                                    International/National  events related to research<br>
                                                                    international-10 marks<br>
                                                                    National – 5 Marks

                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Publications/presentations   by PhD /    Students
                                                                    International/National  events
                                                                    5 marks each

                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>




                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>






                                            <?php
                                           // $c=$db->A5->findOne(array("empid"=>"$empid"));
                                            ?>

                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingFive">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            <center> Criteria 6:EXTENSION CONSULTANCY AND STUDENT SUPPORT</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>






                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                                <?php
                                                                //$c=$db->A2->findOne(array("empid"=>"$empid"));
                                                                ?>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td  rowspan="03">5</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Extension /out reach  activity(Academic activities arranged outside the campus/ academic talks/exhibitions/demonstrations arranged out side)
                                                                    if one staff involved then 5 marks, if more than 1 staff involved -3 marks
                                                                    (for one event max 3 staff)


                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b1'];?>" step="Any" min="0" name="b1" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f3[]" multiple="multiple">
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>.Consultancy
                                                                    (sharing subject knowledge with other academic institutions/ public, ON INVITATION/REQUEST ) –
                                                                    . Number of activities-5 mark per each activity
                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b2'];?>" step="Any" min="0" name="b2" /></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="f4[]" multiple="multiple">
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td  rowspan="03">5</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Class seminars
                                                                    30 minutes duration  maximum 5 seminars – 5 marks /seminar


                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b3'];?>" step="Any" min="0" name="b3" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f5[]" multiple="multiple">
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Quiz /debate/group discussion/etc 5 mark per each (minimum duration 45 minutes)  max 2 pgms

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>










                                                            </tbody>
                                                        </table>




                                                        <br>




                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            //$c=$db->A6->findOne(array("empid"=>"$empid"));
                                            ?>

                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingSix">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                            <center> Criteria 7:ORGANIZATION OF PROGRAMMES(CONTRIBUTION TO DEPT/CLUB)</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">

                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>






                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                                <?php
                                                                //$c=$db->A2->findOne(array("empid"=>"$empid"));
                                                                ?>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>Organization of seminars </td>
                                                                <td></td>
                                                                <td  rowspan="05">5</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>conferences/workshops/training pgms  etc in the college.<br>
                                                                    With Grants received from GO or NGO<br>

                                                                    Grants upto 2 lakh -10 marks for convener,5 marks for co convener<br>

                                                                    Grants 2 lakhs and above  -20 marks for convener,10 morks for co convener<br>

                                                                    for members of the organizing committee – 5 marks<br>


                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b1'];?>" step="Any" min="0" name="b1" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f3[]" multiple="multiple">
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>for proposals submitted for any of the above 50% of allotted marks       </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b2'];?>" step="Any" min="0" name="b2" /></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="f4[]" multiple="multiple">
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Coordinator for non funded pgms-5 marks /pgm
                                                                    Member of organizing committee- 2 per each



                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b3'];?>" step="Any" min="0" name="b3" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f5[]" multiple="multiple">
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>.Organising   industrial/field  visits/study tours/exhibitions/ any such pgms  -minimum 1 days  -5 marks
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                        <br>


                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                           // $c=$db->A7->findOne(array("empid"=>"$empid"));
                                            ?>

                                            <div class="panel-default">
                                                <div class="panel-heading" role="tab" id="headingSeven">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                            <center>Criteria 8:ACADEMIC GROWTH</center>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <table class="table" id="table1"; border="5px" cellspacing="1px" cellpadding="5%"; align="center">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="td">PARTICULARS</th>
                                                                <th>SCORE(OUT OF 10)</th>
                                                                <th>WEIGHTAGE</th>
                                                                <th>Attach the relevent documents here</th>
                                                                <?php
                                                                //$c=$db->A2->findOne(array("empid"=>"$empid"));
                                                                ?>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td  rowspan="04">3</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Seminars/workshops/conferences / refresher/orientation/training  pgms attended without paper presentation
                                                                    for one day duration<br>
                                                                    International-15  /National  -10 Marks-others -5 marks<br>

                                                                    for two days and more<br>

                                                                    International-20  /National  -15 Marks -others -10 marks<br>

                                                                    Invited as resource person/ inaugurator/Judge-10 marks

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b1'];?>" step="Any" min="0" name="b1" /></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="f3[]" multiple="multiple">
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>BOE/BOS members of other Institutions – 10 Marks/institution          </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b2'];?>" step="Any" min="0" name="b2" /></td>
<!--                                                                <td> </td>-->
                                                                <td><input type="file" name="f4[]" multiple="multiple">
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Acquiring additional Qualification in the assessment year
                                                                    NET/SLET/PhD -       20 MARKS<br>

                                                                    Diploma  courses/online certificate courses  - 15 marks<br>

                                                                    if total exceeds 20 treat it as 10


                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b3'];?>" step="Any" min="0" name="b3" /></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="f5[]" multiple="multiple">
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td  rowspan="04">2</td>
                                                                <td></td>


                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>General Publications (subject or any topic)<br>
                                                                    a.	No of Books authored-5/book,(min 25 pages)<br>
                                                                    b.	No of books co-authered-2 marks/book<br>
                                                                    c.	No of books edited and re published -2 marks<br>
                                                                    d.	No of General Articles published in magazines / newspapers/online publications  (min 2 pages in A4 size)– 5/article

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>5</td>
                                                                <td>No. of lectures/talks   given in non academic programmes /conferences as invitee/inaugurator/resource person/Judge  etc:
                                                                    5 marks/pgm

                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
<!--                                                                <td> </td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>6</td>
                                                                <td>Awards(other than phd) / recognition received from registered body/ Government
                                                                    International/National  -30 marks ,
                                                                    upto state level 20


                                                                </td>
                                                                <td class="style1"><input type="number" value="<?php echo $c['b4'];?>" step="Any" min="0" name="b4" /></td>
<!--                                                                <td>1</td>-->
                                                                <td><input type="file" name="f6[]" multiple="multiple">	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br> <input type="button" value="View Documents">
                                                                </td>
                                                            </tr>








                                                            </tbody>
                                                        </table>


                                                        <table class="table" id="table12"; border="5px" calign="center">

                                                            <tr>
                                                                <th >Any Significant Contribution Made / Proposed To Be Done (Write Here)	</th>
                                                            </tr>


                                                            <tr>
                                                                <td style="border-right:none;">  <textarea name="h19" value="<?php echo $c['h19'];?>"></textarea></td>
                                                            </tr>


                                                        </table>



                                                        <br>


                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                    </div>






                                    <button name="submit" class="btn btn-primary">Submit</button>
                                </form>






                            </div>
                            <script type="text/javascript">
                                <?php
                                $d1=date("d");
                                $m1=date("m");
                                $y1=date("Y")-1;
                                $d2=date("d");
                                $m2=date("m");
                                $y2=date("Y");
                                ?>
                                var d1=<?php echo $d1;?> ;
                                var m1=<?php echo $m1;?> ;
                                var y1=<?php echo $y1;?> ;
                                var d2=<?php echo $d2;?> ;
                                var y2=<?php echo $y2;?> ;
                                var m2=<?php echo $m2;?> ;

                                $(function() {

                                    $("#select").change(function() {
                                        if ($(this).val()=="Ongoing_PhD") {
                                            $("#d1").prop("readOnly", false);
                                            $("#d2").prop("readOnly", false);
                                            $("#ab").prop("innerHTML", " ");
                                            $("#ab").prop("innerHTML", "No. Of Reports Submitted During : "+d1+"/"+m1+"/"+y1+" to "+d2+"/"+m2+"/"+y2);
                                            $("#aa").prop("innerHTML", "Not Applicable ");
                                            $("#d11").prop("disabled", false);
                                            $("#d21").prop("disabled", false);
                                        }
                                        else  if ($(this).val()=="PhD_Holder_with_Guideship") {
                                            $("#d1").prop("readOnly", false);
                                            $("#d2").prop("readOnly", false);
                                            $("#d3").prop("readOnly", false);
                                            $("#ab").prop("innerHTML", " ");
                                            $("#ab").prop("innerHTML", "No. Of Reports Submitted During : "+d1+"/"+m1+"/"+y1+" to "+d2+"/"+m2+"/"+y2);
                                            $("#aa").prop("innerHTML", " ");
                                            $("#aa").prop("innerHTML", "Total No. of PhD Students Guided in the Year "+y2);
                                            $("#d11").prop("disabled", false);
                                            $("#d21").prop("disabled", false);
                                            $("#d31").prop("disabled", false);
                                        }
                                        else  if ($(this).val()=="Non_PhD") {
                                            $("#d1").prop("readOnly", true);
                                            $("#d2").prop("readOnly", true);
                                            $("#d3").prop("readOnly", true);
                                            $("#ab").prop("innerHTML", "Not Applicable ");
                                            //$("#ab").prop("innerHTML", "No. Of Reports Submitted During : "+d1+"/"+m1+"/"+y1+" to "+d2+"/"+m2+"/"+y2);
                                            $("#aa").prop("innerHTML", "Not Applicable ");
                                            //  $("#aa").prop("innerHTML", "Total No. of PhD Students Guided in the Year "+y2);
                                            $("#d11").prop("disabled", true);
                                            $("#d21").prop("disabled", true);
                                            $("#d31").prop("disabled", true);
                                        }
                                        else  if ($(this).val()=="PhD_Holder") {
                                            $("#d1").prop("readOnly", false);
                                            $("#d2").prop("readOnly", false);
                                            $("#d3").prop("readOnly", true);
                                            $("#ab").prop("innerHTML", " ");
                                            $("#ab").prop("innerHTML", "No. Of Reports Submitted During : "+d1+"/"+m1+"/"+y1+" to "+d2+"/"+m2+"/"+y2);
                                            $("#aa").prop("innerHTML", "Not Applicable");
                                            // $("#aa").prop("innerHTML", "Total No. of PhD Students Guided in the Year "+y2);
                                            $("#d11").prop("disabled", false);
                                            $("#d21").prop("disabled", false);
                                            $("#d31").prop("disabled", true);
                                        }




                                    });
                                });

                            </script>




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