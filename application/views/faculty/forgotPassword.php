<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 07/11/19
 * Time: 2:01 AM
 */

require_once __DIR__.'/../../utilities/Constants.php';
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    header('Location: home.php');
}
?>

<html><head>
    <style>
        :root {
            --modal-duration: 1s;
            --modal-color: #428bca;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            font-size: 17px;
            line-height: 1.6;

            height: 100vh;
            align-items: center;
            justify-content: center;
        }




        .modal {

            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;


            overflow: auto;

        }

        .modal-content {
            margin: 10% auto;
            width: 40%;
            height:250px;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
            animation-name: modalopen;
            animation-duration: var(--modal-duration);
        }

        .modal-header h2,
        .modal-footer h3 {
            margin: 0;
        }

        .modal-header {
            background: var(--modal-color);
            padding: 15px;
            color: #fff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-body {
            padding: 10px 20px;
            background: transparent;
        }

        .modal-footer {
            background: white;
            padding: 10px;
            color: #fff;
            text-align: center;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }


        @keyframes modalopen {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .btn {
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
            text-decoration: none;
            padding: 10px;
            font-size: 22px;
            transition: .3s;


        }
        .blue {
            color: #fff;
            border: 2px #55acee solid;
            background-color:  #428bca;
            margin-left:15px;
        }
        .body{

            background:url(../../../assets/a.jpg);
        }


    </style>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="../../../assets/faculty/js/jquery.nicescroll.js"></script>
    <script src="../../../assets/faculty/js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../../assets/faculty/js/bootstrap.min.js"></script>

    <link href="../../../assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="../../../assets/css/style2.css" rel='stylesheet' type='text/css' />
    <link href="../../../assets/css/style3.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="../../../assets/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='../../../assets/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
    <!-- //side nav css file -->

    <!-- js-->
    <script src="../../../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../../../assets/js/modernizr.custom.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">



    <!-- Metis Menu -->


    <link href="../../../assets/css/custom.css" rel="stylesheet">
    <link href="../../../assets/css/owl.carousel.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>
<body class="body" >



<div id="my-modal" class="a">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Reset Password</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="../../controllers/faculty/FacultyForgotPasswordController.php" >
                <div class="form-group"> <label for="exampleInputPassword1">Email Address</label> <br> <br>
                    <input type="text" autocomplete="off" name="email" pattern="<?php echo Constants::emailPattern;?>" title="<?php echo Constants::patternTitle;?>" class="form-control" placeholder="E-mail" required="" > </div>


        </div>
        <input type="submit" name="submit" class="btn blue" value="Submit"></form > <a href="index.php" class="btn blue">Back</a><br><br>

<!--        --><?php
//
//        if(isset($_POST["submit"]))
//        {
//
//            $m = new MongoClient();
//            $db = $m->mydb;
//            $uname=$_POST['uname'];
//
//            $c = $db->login->findOne(array("Email" =>"$uname"));
//            if($c){
//                $to = $uname;
//                $subject = 'Reset your Password.';
//                //Let's Prepare The Message For The E-mail
//                $message ='Hello ,press the below link to reset your password '.'http://localhost/project/employee/forgotpass.php?email="'.$c['Email'].'"';
//                if(mail($to, $subject, $message ))
//
//                {
//                    ?><!--<div class="alert alert-info" role="alert"><strong>Done!</strong> Wait till you receive the mail with link to change username</div><br><br>-->
<!---->
<!---->
<!--                --><?php	//}
//                else
//                {?>
<!---->
<!---->
<!--                    <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please try again</div><br>-->
<!--                    <br>-->
<!---->
<!--                    --><?php
//
//                }
//
//            }
//            else{
//                echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong> Please Enter Valid mail id</div><br>
//	<br>';
//
//            }
//        }
//
//
//
//        ?>

    </div>





</div>
</body>
</html>

