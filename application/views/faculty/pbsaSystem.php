<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Pbsa.php";


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

$e_id = $objEmployee->getEid($_SESSION['email']);

$year=date("Y");
if(isset($_GET['year']) && isset($_GET['edit']))
{
    $selectedYear=$_GET['year'];
    if($selectedYear > date("Y") || $selectedYear < date("Y")-1)
    {
        echo "<script>window.location.href='pbsaSystem.php?year=".date('Y')."&edit=true'</script>";
        exit();
    }
}
elseif (isset($_GET['year']))
{
    $selectedYear=$_GET['year'];
    if($selectedYear > date("Y") || $selectedYear < date("Y")-1)
    {
        echo "<script>window.location.href='pbsaSystem.php?year=".date('Y')."'</script>";
        exit();
    }
}
else
{
    $selectedYear=date("Y");
    echo "<script>window.location.href='pbsaSystem.php?year=".date('Y')."&edit=true'</script>";
    exit();
}

$objPbsa = new Pbsa();
$result = $objPbsa->getPbsaCriteria($e_id,$selectedYear);

$c11="";$c11_path="";$c12="";$c12_path="";

$c21="";$c21_path="";$c22="";$c22_path="";$c23="";$c23_path="";$c24="";$c24_path="";

$c31_1="";$c31_2="";$c31_3="";$c31_4="";$c31_5="";$c31_path="";$c32_1="";$c32_2="";$c32_3="";$c32_4="";$c32_5="";$c32_6="";$c32_7="";$c32_8="";$c32_9="";$c32_10="";$c32_11="";$c32_12="";$c32_13="";$c32_14="";$c32_15="";$c32_16="";$c32_17="";$c32_18="";$c32_19="";$c32_path="";

$c41="";$c41_path="";$c42="";$c42_path="";$c43="";$c43_path="";$c44="";$c44_path="";$c45="";$c45_path="";

$c51_1="";$c51_2="";$c51_3="";$c51_path="";$c52="";$c52_path="";$c53="";$c53_path="";

$c61="";$c61_path="";$c62="";$c62_path="";$c63="";$c63_path="";$c64="";$c64_path="";

$c71="";$c71_path="";$c72="";$c72_path="";$c73="";$c73_path="";$c74="";$c74_path="";

$c81="";$c81_path="";$c82="";$c82_path="";$c83="";$c83_path="";$c84="";$c84_path="";$c85="";$c85_path="";$c86="";$c86_path="";

if($result)
{
    $row = $result->fetch_assoc();

    $c11=$row['c11'];$c11_path=$row['c11_path'];$c12=$row['c12'];$c12_path=$row['c12_path'];

    $c21=$row['c21'];$c21_path=$row['c21_path'];$c22=$row['c22'];$c22_path=$row['c22_path'];$c23=$row['c23'];$c23_path=$row['c23_path'];$c24=$row['c24'];$c24_path=$row['c24_path'];

    $c31_1=$row['c31_1'];$c31_2=$row['c31_2'];$c31_3=$row['c31_3'];$c31_4=$row['c31_4'];$c31_5=$row['c31_5'];$c31_path=$row['c31_path'];$c32_1=$row['c32_1'];$c32_2=$row['c32_2'];$c32_3=$row['c32_3'];$c32_4=$row['c32_4'];$c32_5=$row['c32_5'];$c32_6=$row['c32_6'];$c32_7=$row['c32_7'];$c32_8=$row['c32_8'];$c32_9=$row['c32_9'];$c32_10=$row['c32_10'];$c32_11=$row['c32_11'];$c32_12=$row['c32_12'];$c32_13=$row['c32_13'];$c32_14=$row['c32_14'];$c32_15=$row['c32_15'];$c32_16=$row['c32_16'];$c32_17=$row['c32_17'];$c32_18=$row['c32_18'];$c32_19=$row['c32_19'];$c32_path=$row['c32_path'];

    $c41=$row['c41'];$c41_path=$row['c41_path'];$c42=$row['c42'];$c42_path=$row['c42_path'];$c43=$row['c43'];$c43_path=$row['c43_path'];$c44=$row['c44'];$c44_path=$row['c44_path'];$c45=$row['c45'];$c45_path=$row['c45_path'];

    $c51_1=$row['c51_1'];$c51_2=$row['c51_2'];$c51_3=$row['c51_3'];$c51_path=$row['c51_path'];$c52=$row['c52'];$c52_path=$row['c52_path'];$c53=$row['c53'];$c53_path=$row['c53_path'];

    $c61=$row['c61'];$c61_path=$row['c61_path'];$c62=$row['c62'];$c62_path=$row['c62_path'];$c63=$row['c63'];$c63_path=$row['c63_path'];$c64=$row['c64'];$c64_path=$row['c64_path'];

    $c71=$row['c71'];$c71_path=$row['c71_path'];$c72=$row['c72'];$c72_path=$row['c72_path'];$c73=$row['c73'];$c73_path=$row['c73_path'];$c74=$row['c74'];$c74_path=$row['c74_path'];

    $c81=$row['c81'];$c81_path=$row['c81_path'];$c82=$row['c82'];$c82_path=$row['c82_path'];$c83=$row['c83'];$c83_path=$row['c83_path'];$c84=$row['c84'];$c84_path=$row['c84_path'];$c85=$row['c85'];$c85_path=$row['c85_path'];$c86=$row['c86'];$c86_path=$row['c86_path'];

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
                        <li><a href="home.php">Home</a></li>
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
                        * Please check All the values correctly before you submit.<br><br>

                        <div id="center"><div id="fig">
                                <form method="post" action="../../controllers/PbsaSystemController.php" id="form" enctype="multipart/form-data">
                                    <div align="center">
                                        <?php
                                            if(isset($_GET['year']) && isset($_GET['edit']))
                                            {

                                            ?>
                                        <label>You Are Filling PBSA For The Year : </label>
                                        <?php } else {?>
                                       <label>You Are Viewing PBSA Of The Year : </label>
                                       <?php }

                                        ?>
                                        <select name="year" id="year" onchange="checkIsValid(this.form.year.value)" required>
                                            <option value="<?php echo $selectedYear;?>"><?php echo $selectedYear;?></option>
                                            <?php
                                            if($selectedYear != $year)
                                                {?>
                                            <option value="<?php echo $year;?>"><?php echo $year;?></option><?php }?>
                                            <?php
                                            if($selectedYear != $year-1)
                                                {?>
                                            <option value="<?php echo $year-1;?>"><?php echo $year-1;?></option><?php }?>
                                        </select>
<!--                                        <input type="text" name="year" id="year" maxlength="4" onchange="checkIsValid(this.form.year.value)" required>-->
                                    </div>
                                    <script type="text/javascript">
                                        function checkIsValid(_data)
                                        {
                                            var valid=true;
                                            var message="Invalid Date";

                                            if (_data.length != 4)
                                            {
                                                valid=false;
                                            }
                                            if (!_data.match(/\d{4}/))
                                            {
                                                valid=false;
                                            }
                                            if (parseInt(_data) > <?php echo $year;?>)
                                            {
                                                valid=false;
                                                message = "You Cannot Select Future Date";
                                            }
                                            if(parseInt(_data) < <?php echo $year-1;?>)
                                            {
                                                valid=false;
                                                message = "You Cannot Select Year Less Than <?php echo $year-1;?>";
                                            }
                                            if(valid == false)
                                                alert(message);
                                            else
                                            {
                                                <?php
                                                if(isset($_GET['year']) && isset($_GET['edit']))
                                                {
                                                ?>
                                                window.location.href="pbsaSystem.php?year="+_data+"&edit=true";
                                                <?php } else { ?>
                                                window.location.href="pbsaSystem.php?year="+_data;
                                                <?php } ?>
                                            }
                                        }
                                    </script>

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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" min="0" value="<?php echo $c11; ?>" name="c11" id="c11" readonly/></td>
                                                                <td>15</td>
                                                                <td><input type="file"  name="c11_path" id="c11_path" accept="application/pdf" disabled>Upload Student Feedback Report Issued By The College<br>
                                                               <?php if($c11_path != "") {?>
                                                                        <a href="../../../<?php echo $c11_path;?>" target="_blank">
                                                                <input type="button" value="View Uploaded Document">
                                                                            <?php }?>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Average Result Of All The Classes Conducted - In Percentage (%)
                                                                    (Avg Result Of Previous Odd & Even Semester)</td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c12; ?>"  name="c12" id="c12" readonly/></td>
                                                                <td>15</td>
                                                                <td><input type="file" name="c12_path" id="c12_path" accept="application/pdf" disabled>Upload Average Result Report In The Prescribed Format-1
                                                                    <br>
                                                                    <?php if($c12_path != "") {?>
                                                                        <a href="../../../<?php echo $c12_path;?>">
                                                                    <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c21;?>"  min="0" name="c21" id="c21" readonly/></td>
                                                                <td>3</td>
                                                                <td><input type="file" name="c21_path" id="c21_path" accept="application/pdf" disabled>
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br>  <?php if($c21_path != "") {?>
                                                                        <a href="../../../<?php echo $c21_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Library usage in the college library(80 hrs per year then 100 marks)other wise percentage           </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c22;?>"  min="0" name="c22" id="c22" readonly/></td>
                                                                <td>4</td>
                                                                <td><input type="file" name="c22_path" id="c22_path" accept="application/pdf" disabled>
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br>  <?php if($c22_path != "") {?>
                                                                        <a href="../../../<?php echo $c22_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>CLASSES CONDUCTED as per the time table
                                                                    80 % =100 marks

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c23;?>"  min="0" name="c23" id="c23" readonly/></td>
                                                                <td>2</td>
                                                                <td><input type="file" name="c23_path"  id="c23_path" accept="application/pdf" disabled>
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br>  <?php if($c23_path != "") {?>
                                                                        <a href="../../../<?php echo $c23_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Percentage of seats filled in first semester<br>
                                                                    (only for optional subjects.
                                                                    for languages the weightage is added to classes conducted.)
                                                                    100%=100 marks

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c24;?>"  min="0" name="c24" id="c24" readonly/></td>
                                                                <td>1</td>
                                                                <td><input type="file" name="c24_path" id="c24_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c24_path != "") {?>
                                                                        <a href="../../../<?php echo $c24_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>


                                                    </div>
                                                </div>
                                            </div>


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
                                                                <th>SCORE(OUT OF 100)</th>
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
                                                                <td rowspan="6"><input type="file" name="c31_path" id="c31_path" accept="application/pdf" disabled>	Mandatory Initiatives- Upload The Report In The Prescribed Format-2
                                                                  <br>
                                                                    <?php if($c31_path != "") {?>
                                                                        <a href="../../../<?php echo $c31_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>AV contents developed</td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  value="<?php echo $c31_1?>" min="0" name="c31_1" id="c31_1" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Self recorded lectures</td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0" value="<?php echo $c31_2;?>" name="c31_2" id="c31_2" readonly/></td>
                                                            </tr>

                                                            <tr>
                                                                <td>3</td>
                                                                <td>Expand lectures

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0" value="<?php echo $c31_3;?>" name="c31_3" id="c31_3" readonly/></td>
                                                            </tr>

                                                            <tr>
                                                                <td>4</td>
                                                                <td>relevant video classes

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0"  value="<?php echo $c31_4;?>" name="c31_4" id="c31_4" readonly/></td>
                                                            </tr>

                                                            <tr>
                                                                <td>5</td>
                                                                <td>student assignments

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0" value="<?php echo $c31_5;?>" name="c31_5" id="c31_5" readonly/></td>
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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0" value="<?php echo $c32_1?>" name="c32_1" id="c32_1" readonly/></td>
                                                                <td rowspan="19"><input type="file" name="c32_path" id="c32_path" accept="application/pdf" disabled>Optional Initiatives - Upload The Report In The Prescribed Format-3
                                                               <br>
                                                                    <?php if($c32_path != "") {?>
                                                                        <a href="../../../<?php echo $c32_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Current affairs

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  value="<?php echo $c32_2;?>" min="0" name="c32_2" id="c32_2" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>SRPs/inhouse projects

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php echo $c32_3;?>"  min="0" name="c32_3" id="c32_3" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Alumni interaction programs

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c9'];?>"  min="0" name="c32_4" id="c32_4" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Contribution to learning corners

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c10'];?>"  min="0" name="c32_5" id="c32_5" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Units of notes/lesson plan uploaded

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c11'];?>"  min="0" name="c32_6" id="c32_6" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>CC courses handled

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c12'];?>"  min="0" name="c32_7" id="c32_7" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8
                                                                </td>
                                                                <td>Interdisciplinary pgm in college
                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c13'];?>"  min="0" name="c32_8" id="c32_8" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>Contribution to our alumni our pride

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c14'];?>"  min="0" name="c32_9" id="c32_9" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>Guest lectures arranged in regular classes

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  min="0" value="<?php //echo $c['c15'];?>" name="c32_10" id="c32_10" readonly/></td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td>Career guidance programmes

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  value="<?php //echo $c['c16'];?>" min="0" name="c32_11" id="c32_11" readonly/></td>
                                                            </tr>
                                                            <tr >
                                                                <td >12</td>
                                                                <td>Contribution to W4H

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_12" id="c32_12" readonly/></td>
                                                            </tr>

                                                            <tr >
                                                                <td >13</td>
                                                                <td>Parent faculty

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_13" id="c32_13" readonly/></td>
                                                            </tr>

                                                            <tr >
                                                                <td >14</td>
                                                                <td>Film shows

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_14" id="c32_14" readonly/></td>
                                                            </tr>


                                                            <tr >
                                                                <td >15</td>
                                                                <td>Alumni Faculty

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_15" id="c32_15" readonly/></td>
                                                            </tr>

                                                            <tr >
                                                                <td >16</td>
                                                                <td>Exhibitions arranged

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_16" id="c32_16" readonly/></td>
                                                            </tr>

                                                            <tr >
                                                                <td >17</td>
                                                                <td>Faculty exchange

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_17" id="c32_17" readonly/></td>
                                                            </tr>


                                                            <tr >
                                                                <td >18</td>
                                                                <td>In-house sharing of expertise

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_18" id="c32_18" readonly/></td>
                                                            </tr>

                                                            <tr >
                                                                <td >19</td>
                                                                <td>contribution to green campus

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['c17'];?>"  min="0" name="c32_19" id="c32_19" readonly/></td>
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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b1'];?>"  min="0" name="c41" id="c41" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c41_path" id="c41_path" accept="application/pdf" disabled>
                                                                    Upload The first page of Pubslished Report.
                                                                    <br>  <?php if($c41_path != "") {?>
                                                                        <a href="../../../<?php echo $c41_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Any ongoing Research projects for the grant period<br>

                                                                    fund less than 3 lakhs -10 marks<br>
                                                                    3 lakhs and more -20 marks
                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b2'];?>"  min="0" name="c42" id="c42" readonly/></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="c42_path" id="c42_path" accept="application/pdf" disabled>
                                                                    Upload The first page of Sanctioned Letter.
                                                                    <br>  <?php if($c42_path != "") {?>
                                                                        <a href="../../../<?php echo $c42_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Project proposals submitted
                                                                    fund less than 3 lakhs -5 marks<br>
                                                                    3 lakhs and more -10 marks
                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b3'];?>"  min="0" name="c43" id="c43" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c43_path" id="c43_path" accept="application/pdf" disabled>
                                                                    Upload The first page of Sanctioned Letter.
                                                                    <br>  <?php if($c43_path != "") {?>
                                                                        <a href="../../../<?php echo $c43_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Number of Patents in pipeline for submission-10 marks
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c44" id="c44" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c44_path" id="c44_path" accept="application/pdf" disabled>	Upload The Relevant Letter.
                                                                    <br>  <?php if($c44_path != "") {?>
                                                                        <a href="../../../<?php echo $c44_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Patents awarded -30 per patent
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c45" id="c45" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c45_path" id="c45_path" accept="application/pdf" disabled>	Upload The Relevant Letter.
                                                                    <br>  <?php if($c45_path != "") {?>
                                                                        <a href="../../../<?php echo $c45_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
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


                                                            <tr>
                                                                <td rowspan="5">1</td>
                                                                <td>Research activities
                                                                    For pursuing PhD members
                                                                </td>
                                                                <td></td>
                                                                <td rowspan="07">10</td>
                                                                <td rowspan="05"><input  id="c51_path" type="file" name="c51_path" accept="application/pdf" disabled>Upload The Letter Of PhD Registration
                                                                    <br>  <?php if($c51_path != "") {?>
                                                                        <a href="../../../<?php echo $c51_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>     </td>

                                                            </tr>
                                                            <tr>

                                                                <td>1.1)Date of registration for PhD Degree
                                                                    .for registration -10 marks up to five years
                                                                </td>
                                                                <td><input id="c51_1" type="date" name="c51_1" value="" readonly></td>
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
                                                                <td><input id="c51_2" name="c51_2" min="0" value="<?php //echo $c['d2'];?>"  type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  readonly></td>
<!--                                                                <td><input disabled id="d21" type="file" name="f11[]"  multiple="multiple">Upload The First Page Of The Report-->
<!--                                                                </td>-->
                                                            </tr>
                                                            <tr>
                                                                <td> 1.3)<span id="ab">For  PhD holders with guide-ship
 Number  of PhD Students  guiding in the year 10 marks per one PhD student –for  4 years
</span></td>
                                                                <td><input id="c51_3" name="c51_3" min="0" value="<?php //echo $c['d2'];?>"  type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed"  readonly></td>
<!--                                                                <td><input disabled id="d21" type="file" name="f11[]"  multiple="multiple">Upload The First Page Of The Report-->
<!--                                                                </td>-->
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Papers presented<br>
                                                                    International/National  events related to research<br>
                                                                    international-10 marks<br>
                                                                    National – 5 Marks

                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c52" id="c52" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c52_path" id="c52_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c52_path != "") {?>
                                                                        <a href="../../../<?php echo $c52_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Publications/presentations   by PhD /    Students
                                                                    International/National  events
                                                                    5 marks each

                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c53" id="c53" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c53_path" id="c53_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c53_path != "") {?>
                                                                        <a href="../../../<?php echo $c53_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>




                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>


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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b1'];?>"  min="0" name="c61" id="c61" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c61_path" id="c61_path" accept="application/pdf" disabled>
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br>  <?php if($c61_path != "") {?>
                                                                        <a href="../../../<?php echo $c61_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>.Consultancy
                                                                    (sharing subject knowledge with other academic institutions/ public, ON INVITATION/REQUEST ) –
                                                                    . Number of activities-5 mark per each activity
                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b2'];?>"  min="0" name="c62" id="c62" readonly/></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="c62_path" id="c62_path" accept="application/pdf" disabled>
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br>  <?php if($c62_path != "") {?>
                                                                        <a href="../../../<?php echo $c62_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b3'];?>"  min="0" name="c63" id="c63" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c63_path" id="c63_path" accept="application/pdf" disabled>
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br>  <?php if($c63_path != "") {?>
                                                                        <a href="../../../<?php echo $c63_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Quiz /debate/group discussion/etc 5 mark per each (minimum duration 45 minutes)  max 2 pgms

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c64" id="c64" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c64_path" id="c64_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c64_path != "") {?>
                                                                        <a href="../../../<?php echo $c64_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>


                                                            </tbody>
                                                        </table>




                                                        <br>




                                                    </div>
                                                </div>
                                            </div>


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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b1'];?>"  min="0" name="c71" id="c71" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c71_path" id="c71_path" accept="application/pdf" disabled>
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br>  <?php if($c71_path != "") {?>
                                                                        <a href="../../../<?php echo $c71_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>for proposals submitted for any of the above 50% of allotted marks       </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b2'];?>"  min="0" name="c72" id="c72" readonly/></td>
                                                                <!--                                                                <td> </td>-->
                                                                <td><input type="file" name="c72_path" id="c72_path" accept="application/pdf" disabled>
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br>  <?php if($c72_path != "") {?>
                                                                        <a href="../../../<?php echo $c72_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Coordinator for non funded pgms-5 marks /pgm
                                                                    Member of organizing committee- 2 per each



                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b3'];?>"  min="0" name="c73" id="c73" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c73_path" id="c73_path" accept="application/pdf" disabled>
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br>  <?php if($c73_path != "") {?>
                                                                        <a href="../../../<?php echo $c73_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>.Organising   industrial/field  visits/study tours/exhibitions/ any such pgms  -minimum 1 days  -5 marks
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c74" id="c74" readonly/></td>
                                                                <!--                                                                <td></td>-->
                                                                <td><input type="file" name="c74_path" id="c74_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c74_path != "") {?>
                                                                        <a href="../../../<?php echo $c74_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                        <br>


                                                    </div>
                                                </div>
                                            </div>


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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b1'];?>"  min="0" name="c81" id="c81" readonly/></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="c81_path" id="c81_path" accept="application/pdf" disabled>
                                                                    Upload The Yearly Biometric Report Issued By The College
                                                                    <br>  <?php if($c81_path != "") {?>
                                                                        <a href="../../../<?php echo $c81_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>BOE/BOS members of other Institutions – 10 Marks/institution          </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b2'];?>"  min="0" name="c82" id="c82" readonly/></td>
<!--                                                                <td> </td>-->
                                                                <td><input type="file" name="c82_path" id="c82_path" accept="application/pdf" disabled>
                                                                    Upload The Library Usage Report Issued By The College
                                                                    <br>  <?php if($c82_path != "") {?>
                                                                        <a href="../../../<?php echo $c82_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Acquiring additional Qualification in the assessment year
                                                                    NET/SLET/PhD -       20 MARKS<br>

                                                                    Diploma  courses/online certificate courses  - 15 marks<br>

                                                                    if total exceeds 20 treat it as 10


                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b3'];?>"  min="0" name="c83" id="c83" readonly/></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="c83_path" id="c83_path" accept="application/pdf" disabled>
                                                                    Upload Classes Conducted Report Issued By The College
                                                                    <br>  <?php if($c83_path != "") {?>
                                                                        <a href="../../../<?php echo $c83_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
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
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c84" id="c84" readonly/></td>
<!--                                                                <td></td>-->
                                                                <td><input type="file" name="c84_path" id="c84_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c84_path != "") {?>
                                                                        <a href="../../../<?php echo $c84_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>5</td>
                                                                <td>No. of lectures/talks   given in non academic programmes /conferences as invitee/inaugurator/resource person/Judge  etc:
                                                                    5 marks/pgm

                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c85" id="c85" readonly/></td>
<!--                                                                <td> </td>-->
                                                                <td><input type="file" name="c85_path" id="c85_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c85_path != "") {?>
                                                                        <a href="../../../<?php echo $c85_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>6</td>
                                                                <td>Awards(other than phd) / recognition received from registered body/ Government
                                                                    International/National  -30 marks ,
                                                                    upto state level 20


                                                                </td>
                                                                <td class="style1"><input type="text" pattern="[0-9][0-9][0-9]" maxlength="3" title="Numbers Only Allowed" value="<?php //echo $c['b4'];?>"  min="0" name="c86" id="c86" readonly/></td>
<!--                                                                <td>1</td>-->
                                                                <td><input type="file" name="c86_path" id="c86_path" accept="application/pdf" disabled>	Upload Percentage of Seats Filled Report Signed By HOI
                                                                    <br>  <?php if($c86_path != "") {?>
                                                                        <a href="../../../<?php echo $c86_path;?>">
                                                                            <input type="button" value="View Uploaded Document"></a>
                                                                    <?php }?>
                                                                </td>
                                                            </tr>








                                                            </tbody>
                                                        </table>


                                                        <table class="table" id="table12"; border="5px" calign="center">

                                                            <tr>
                                                                <th >Any Significant Contribution Made / Proposed To Be Done (Write Here)	</th>
                                                            </tr>


                                                            <tr>
                                                                <td style="border-right:none;">  <textarea name="h19" value="<?php //echo $c['h19'];?>"></textarea></td>
                                                            </tr>


                                                        </table>



                                                        <br>


                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                    </div>
<?php
    if(isset($_GET['year']) && isset($_GET['edit']))
    {
        ?>
                                    <div id="saveSubmit" hidden>
                                        <button name="save" class="btn btn-primary" id="save" value="<?php echo $selectedYear;?>" hidden onclick="removeRequired()">Save</button>
                                        <button name="submit" class="btn btn-primary" id="submit" value="<?php echo $selectedYear;?>" hidden onclick="addRequired()">Submit</button>
                                    </div>


                                </form>
                                <div id="edit">
                                <button name="edit" class="btn btn-primary" onclick="enableAndVisible()">Edit</button>
                                </div>
                                <?php } ?>

<script>
    function enableAndVisible()
    {
        document.getElementById("saveSubmit").removeAttribute("hidden");
        document.getElementById("edit").setAttribute("hidden","");

        document.getElementById("c11").removeAttribute("readonly");
        document.getElementById("c12").removeAttribute("readonly");
        document.getElementById("c21").removeAttribute("readonly");
        document.getElementById("c22").removeAttribute("readonly");
        document.getElementById("c23").removeAttribute("readonly");
        document.getElementById("c24").removeAttribute("readonly");
        document.getElementById("c31_1").removeAttribute("readonly");
        document.getElementById("c31_2").removeAttribute("readonly");
        document.getElementById("c31_3").removeAttribute("readonly");
        document.getElementById("c31_4").removeAttribute("readonly");
        document.getElementById("c31_5").removeAttribute("readonly");
        document.getElementById("c32_1").removeAttribute("readonly");
        document.getElementById("c32_2").removeAttribute("readonly");
        document.getElementById("c32_3").removeAttribute("readonly");
        document.getElementById("c32_4").removeAttribute("readonly");
        document.getElementById("c32_5").removeAttribute("readonly");
        document.getElementById("c32_6").removeAttribute("readonly");
        document.getElementById("c32_7").removeAttribute("readonly");
        document.getElementById("c32_8").removeAttribute("readonly");
        document.getElementById("c32_9").removeAttribute("readonly");
        document.getElementById("c32_10").removeAttribute("readonly");
        document.getElementById("c32_11").removeAttribute("readonly");
        document.getElementById("c32_12").removeAttribute("readonly");
        document.getElementById("c32_13").removeAttribute("readonly");
        document.getElementById("c32_14").removeAttribute("readonly");
        document.getElementById("c32_15").removeAttribute("readonly");
        document.getElementById("c32_16").removeAttribute("readonly");
        document.getElementById("c32_17").removeAttribute("readonly");
        document.getElementById("c32_18").removeAttribute("readonly");
        document.getElementById("c32_19").removeAttribute("readonly");
        document.getElementById("c41").removeAttribute("readonly");
        document.getElementById("c42").removeAttribute("readonly");
        document.getElementById("c43").removeAttribute("readonly");
        document.getElementById("c44").removeAttribute("readonly");
        document.getElementById("c45").removeAttribute("readonly");
        document.getElementById("c51_1").removeAttribute("readonly");
        document.getElementById("c51_2").removeAttribute("readonly");
        document.getElementById("c51_3").removeAttribute("readonly");
        document.getElementById("c52").removeAttribute("readonly");
        document.getElementById("c53").removeAttribute("readonly");
        document.getElementById("c61").removeAttribute("readonly");
        document.getElementById("c62").removeAttribute("readonly");
        document.getElementById("c63").removeAttribute("readonly");
        document.getElementById("c64").removeAttribute("readonly");
        document.getElementById("c71").removeAttribute("readonly");
        document.getElementById("c72").removeAttribute("readonly");
        document.getElementById("c73").removeAttribute("readonly");
        document.getElementById("c74").removeAttribute("readonly");
        document.getElementById("c81").removeAttribute("readonly");
        document.getElementById("c82").removeAttribute("readonly");
        document.getElementById("c83").removeAttribute("readonly");
        document.getElementById("c84").removeAttribute("readonly");
        document.getElementById("c85").removeAttribute("readonly");
        document.getElementById("c86").removeAttribute("readonly");



        document.getElementById("c11_path").removeAttribute("disabled");
        document.getElementById("c12_path").removeAttribute("disabled");
        document.getElementById("c21_path").removeAttribute("disabled");
        document.getElementById("c22_path").removeAttribute("disabled");
        document.getElementById("c23_path").removeAttribute("disabled");
        document.getElementById("c24_path").removeAttribute("disabled");
        document.getElementById("c31_path").removeAttribute("disabled");
        document.getElementById("c32_path").removeAttribute("disabled");
        document.getElementById("c41_path").removeAttribute("disabled");
        document.getElementById("c42_path").removeAttribute("disabled");
        document.getElementById("c43_path").removeAttribute("disabled");
        document.getElementById("c44_path").removeAttribute("disabled");
        document.getElementById("c45_path").removeAttribute("disabled");
        document.getElementById("c51_path").removeAttribute("disabled");
        document.getElementById("c52_path").removeAttribute("disabled");
        document.getElementById("c53_path").removeAttribute("disabled");
        document.getElementById("c61_path").removeAttribute("disabled");
        document.getElementById("c62_path").removeAttribute("disabled");
        document.getElementById("c63_path").removeAttribute("disabled");
        document.getElementById("c64_path").removeAttribute("disabled");
        document.getElementById("c71_path").removeAttribute("disabled");
        document.getElementById("c72_path").removeAttribute("disabled");
        document.getElementById("c73_path").removeAttribute("disabled");
        document.getElementById("c74_path").removeAttribute("disabled");
        document.getElementById("c81_path").removeAttribute("disabled");
        document.getElementById("c82_path").removeAttribute("disabled");
        document.getElementById("c83_path").removeAttribute("disabled");
        document.getElementById("c84_path").removeAttribute("disabled");
        document.getElementById("c85_path").removeAttribute("disabled");
        document.getElementById("c86_path").removeAttribute("disabled");
    }

    function addRequired()
    {
        document.getElementById("c11").setAttribute("required","");
        document.getElementById("c12").setAttribute("required","");
        document.getElementById("c21").setAttribute("required","");
        document.getElementById("c22").setAttribute("required","");
        document.getElementById("c23").setAttribute("required","");
        document.getElementById("c24").setAttribute("required","");
        document.getElementById("c31_1").setAttribute("required","");
        document.getElementById("c31_2").setAttribute("required","");
        document.getElementById("c31_3").setAttribute("required","");
        document.getElementById("c31_4").setAttribute("required","");
        document.getElementById("c31_5").setAttribute("required","");
        document.getElementById("c32_1").setAttribute("required","");
        document.getElementById("c32_2").setAttribute("required","");
        document.getElementById("c32_3").setAttribute("required","");
        document.getElementById("c32_4").setAttribute("required","");
        document.getElementById("c32_5").setAttribute("required","");
        document.getElementById("c32_6").setAttribute("required","");
        document.getElementById("c32_7").setAttribute("required","");
        document.getElementById("c32_8").setAttribute("required","");
        document.getElementById("c32_9").setAttribute("required","");
        document.getElementById("c32_10").setAttribute("required","");
        document.getElementById("c32_11").setAttribute("required","");
        document.getElementById("c32_12").setAttribute("required","");
        document.getElementById("c32_13").setAttribute("required","");
        document.getElementById("c32_14").setAttribute("required","");
        document.getElementById("c32_15").setAttribute("required","");
        document.getElementById("c32_16").setAttribute("required","");
        document.getElementById("c32_17").setAttribute("required","");
        document.getElementById("c32_18").setAttribute("required","");
        document.getElementById("c32_19").setAttribute("required","");
        document.getElementById("c41").setAttribute("required","");
        document.getElementById("c42").setAttribute("required","");
        document.getElementById("c43").setAttribute("required","");
        document.getElementById("c44").setAttribute("required","");
        document.getElementById("c45").setAttribute("required","");
        document.getElementById("c51_1").setAttribute("required","");
        document.getElementById("c51_2").setAttribute("required","");
        document.getElementById("c51_3").setAttribute("required","");
        document.getElementById("c52").setAttribute("required","");
        document.getElementById("c53").setAttribute("required","");
        document.getElementById("c61").setAttribute("required","");
        document.getElementById("c62").setAttribute("required","");
        document.getElementById("c63").setAttribute("required","");
        document.getElementById("c64").setAttribute("required","");
        document.getElementById("c71").setAttribute("required","");
        document.getElementById("c72").setAttribute("required","");
        document.getElementById("c73").setAttribute("required","");
        document.getElementById("c74").setAttribute("required","");
        document.getElementById("c81").setAttribute("required","");
        document.getElementById("c82").setAttribute("required","");
        document.getElementById("c83").setAttribute("required","");
        document.getElementById("c84").setAttribute("required","");
        document.getElementById("c85").setAttribute("required","");
        document.getElementById("c86").setAttribute("required","");



        document.getElementById("c11_path").setAttribute("required","");
        document.getElementById("c12_path").setAttribute("required","");
        document.getElementById("c21_path").setAttribute("required","");
        document.getElementById("c22_path").setAttribute("required","");
        document.getElementById("c23_path").setAttribute("required","");
        document.getElementById("c24_path").setAttribute("required","");
        document.getElementById("c31_path").setAttribute("required","");
        document.getElementById("c32_path").setAttribute("required","");
        document.getElementById("c41_path").setAttribute("required","");
        document.getElementById("c42_path").setAttribute("required","");
        document.getElementById("c43_path").setAttribute("required","");
        document.getElementById("c44_path").setAttribute("required","");
        document.getElementById("c45_path").setAttribute("required","");
        document.getElementById("c51_path").setAttribute("required","");
        document.getElementById("c52_path").setAttribute("required","");
        document.getElementById("c53_path").setAttribute("required","");
        document.getElementById("c61_path").setAttribute("required","");
        document.getElementById("c62_path").setAttribute("required","");
        document.getElementById("c63_path").setAttribute("required","");
        document.getElementById("c64_path").setAttribute("required","");
        document.getElementById("c71_path").setAttribute("required","");
        document.getElementById("c72_path").setAttribute("required","");
        document.getElementById("c73_path").setAttribute("required","");
        document.getElementById("c74_path").setAttribute("required","");
        document.getElementById("c81_path").setAttribute("required","");
        document.getElementById("c82_path").setAttribute("required","");
        document.getElementById("c83_path").setAttribute("required","");
        document.getElementById("c84_path").setAttribute("required","");
        document.getElementById("c85_path").setAttribute("required","");
        document.getElementById("c86_path").setAttribute("required","");

    }

    function removeRequired()
    {
        document.getElementById("c11").removeAttribute("required");
        document.getElementById("c12").removeAttribute("required");
        document.getElementById("c21").removeAttribute("required");
        document.getElementById("c22").removeAttribute("required");
        document.getElementById("c23").removeAttribute("required");
        document.getElementById("c24").removeAttribute("required");
        document.getElementById("c31_1").removeAttribute("required");
        document.getElementById("c31_2").removeAttribute("required");
        document.getElementById("c31_3").removeAttribute("required");
        document.getElementById("c31_4").removeAttribute("required");
        document.getElementById("c31_5").removeAttribute("required");
        document.getElementById("c32_1").removeAttribute("required");
        document.getElementById("c32_2").removeAttribute("required");
        document.getElementById("c32_3").removeAttribute("required");
        document.getElementById("c32_4").removeAttribute("required");
        document.getElementById("c32_5").removeAttribute("required");
        document.getElementById("c32_6").removeAttribute("required");
        document.getElementById("c32_7").removeAttribute("required");
        document.getElementById("c32_8").removeAttribute("required");
        document.getElementById("c32_9").removeAttribute("required");
        document.getElementById("c32_10").removeAttribute("required");
        document.getElementById("c32_11").removeAttribute("required");
        document.getElementById("c32_12").removeAttribute("required");
        document.getElementById("c32_13").removeAttribute("required");
        document.getElementById("c32_14").removeAttribute("required");
        document.getElementById("c32_15").removeAttribute("required");
        document.getElementById("c32_16").removeAttribute("required");
        document.getElementById("c32_17").removeAttribute("required");
        document.getElementById("c32_18").removeAttribute("required");
        document.getElementById("c32_19").removeAttribute("required");
        document.getElementById("c41").removeAttribute("required");
        document.getElementById("c42").removeAttribute("required");
        document.getElementById("c43").removeAttribute("required");
        document.getElementById("c44").removeAttribute("required");
        document.getElementById("c45").removeAttribute("required");
        document.getElementById("c51_1").removeAttribute("required");
        document.getElementById("c51_2").removeAttribute("required");
        document.getElementById("c51_3").removeAttribute("required");
        document.getElementById("c52").removeAttribute("required");
        document.getElementById("c53").removeAttribute("required");
        document.getElementById("c61").removeAttribute("required");
        document.getElementById("c62").removeAttribute("required");
        document.getElementById("c63").removeAttribute("required");
        document.getElementById("c64").removeAttribute("required");
        document.getElementById("c71").removeAttribute("required");
        document.getElementById("c72").removeAttribute("required");
        document.getElementById("c73").removeAttribute("required");
        document.getElementById("c74").removeAttribute("required");
        document.getElementById("c81").removeAttribute("required");
        document.getElementById("c82").removeAttribute("required");
        document.getElementById("c83").removeAttribute("required");
        document.getElementById("c84").removeAttribute("required");
        document.getElementById("c85").removeAttribute("required");
        document.getElementById("c86").removeAttribute("required");



        document.getElementById("c11_path").removeAttribute("required");
        document.getElementById("c12_path").removeAttribute("required");
        document.getElementById("c21_path").removeAttribute("required");
        document.getElementById("c22_path").removeAttribute("required");
        document.getElementById("c23_path").removeAttribute("required");
        document.getElementById("c24_path").removeAttribute("required");
        document.getElementById("c31_path").removeAttribute("required");
        document.getElementById("c32_path").removeAttribute("required");
        document.getElementById("c41_path").removeAttribute("required");
        document.getElementById("c42_path").removeAttribute("required");
        document.getElementById("c43_path").removeAttribute("required");
        document.getElementById("c44_path").removeAttribute("required");
        document.getElementById("c45_path").removeAttribute("required");
        document.getElementById("c51_path").removeAttribute("required");
        document.getElementById("c52_path").removeAttribute("required");
        document.getElementById("c53_path").removeAttribute("required");
        document.getElementById("c61_path").removeAttribute("required");
        document.getElementById("c62_path").removeAttribute("required");
        document.getElementById("c63_path").removeAttribute("required");
        document.getElementById("c64_path").removeAttribute("required");
        document.getElementById("c71_path").removeAttribute("required");
        document.getElementById("c72_path").removeAttribute("required");
        document.getElementById("c73_path").removeAttribute("required");
        document.getElementById("c74_path").removeAttribute("required");
        document.getElementById("c81_path").removeAttribute("required");
        document.getElementById("c82_path").removeAttribute("required");
        document.getElementById("c83_path").removeAttribute("required");
        document.getElementById("c84_path").removeAttribute("required");
        document.getElementById("c85_path").removeAttribute("required");
        document.getElementById("c86_path").removeAttribute("required");

        this.form.submit();
    }

</script>




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