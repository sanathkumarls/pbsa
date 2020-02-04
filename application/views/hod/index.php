<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 06/11/19
 * Time: 10:44 PM
 */

require_once __DIR__.'/../../utilities/Constants.php';
header('Cache-Control: no cache'); //no cache
header('Pragma: no-cache');
session_cache_limiter('private_no_expire'); // works
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    header('Location: home.php');
    exit();
}
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <link href="../../../assets/css/font-awesome.css" rel="stylesheet">
    <link href="../../../assets/css/style1.css" rel='stylesheet' type='text/css' />
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext" rel="stylesheet">
    <style>
        p{
            text-align:center;
            margin-left:18%;

        }
        #fp{
            float:left;
            margin-left:2%;
        }
    </style>
</head>

<body>
<h1>HOD LOGIN </h1>
<div class="w3ls-login box box--big">

    <form action="../../controllers/hod/HodLoginController.php" method="post" autocomplete="off">
        <div class="agile-field-txt">
            <label>
                <i class="fa fa" aria-hidden="true"></i> Username </label>
            <input autocomplete="off" type="text" name="email" placeholder="Enter your E-Mail " required="" pattern="<?php echo Constants::emailPattern;?>" title="<?php echo Constants::patternTitle;?>"/>
        </div>
        <div class="agile-field-txt">
            <label>
                <i class="fa fa" aria-hidden="true"></i> password </label>
            <input autocomplete="off" type="password" name="password" placeholder="Enter your password " required="" id="myInput" />
            <div class="agile_label">
                <br>
                <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">

                <label class="check" for="check3">Show password</label>
                <a href="../index.php"><label>Back to Home</label></a>


            </div>
            <a href="forgotPassword.php"  ><label style="padding-top: 20px">Forgot Password?</label></a>
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <div class="w3ls-bot">

            <div class="form-end">
                <input name="submit" type="submit" value="LOGIN" >
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</div>

</body>

</html>
