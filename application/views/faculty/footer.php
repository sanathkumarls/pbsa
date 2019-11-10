<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:12 AM
 */

require_once __DIR__."/../../models/Employee.php";
require_once __DIR__."/../../utilities/Constants.php";
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

<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"> <h1 id="h1" style="font-size:30px;margin-bottom:-20px; margin-left:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>PBSA</B></h1></span>
            <img id="logo" style="margin-top:-20px;"src="../../../assets/faculty/images/logo.png" alt="Logo"/>
        </a>
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
<!--      display employee image-->
            <a href="#"><img id="image1" src="../../../assets/faculty/images/a.png" ></a>






        <a href="#"><span class=" name-caret">
<!--                --><?php
//                $in=$dat1["initial"];
//                $nm=$dat1["Name"];
//                echo $in.$nm;?>
<!--                diplsay name and initial-->
	</span></a>
        <p>Employee </p>
        <ul>
            <li><a class="tooltips" href="edit.php?id=<?php //echo $val;?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="r.php?id=<?php //echo $val;?>" ><span>Remove Photo</span><i class="lnr lnr-picture"></i></a></li>

            <li><a class="tooltips" href="../../controllers/LogoutController.php" onclick="logout()"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <script>
        function logout()
        {
            if (confirm("Are you sure you want to Logout"))
            {
                window.location.href = '../../controllers/LogoutController.php';
            }
        }
    </script>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >

            <li><a href="emenu.php?id=<?php //echo $val;?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            <!--	<li><a href="pbsa.php?id=<php echo $val;?>"><i class="fa fa-edit"></i> <span>PBSA</span></a></li>-->

            <!-- uncomment the below line to add skills module also remove the "//" for echo -->

            <!--  <li><a href="skills.php?id=<?php //echo $val;?>"><i class="lnr lnr-layers"></i> <span>Manage Skills </span></a></li> -->
            <!-- <li id="menu-academico" ><a href="ratem.php?id=<?php //echo $val;?>"><i class="lnr lnr-star-half"></i><span>&nbsp;Rate HOD/Manager</span></a>

										</li> -->
            <li id="menu-academico" ><a href="view.php?id=<?php //echo $val;?>"><i class="fa fa-bar-chart-o"></i> <span>View Performance</span></a>  </li>
            <!-- <li><a href="project.php?id=<?php //echo $val;?>"><i class="lnr lnr-select"></i> <span>Projects </span></a></li> -->


        </ul>

    </div>

    <div class="clearfix"></div>
</div>
</div>
<script>
    $(document).ready(function(){

        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {

                    if(data.unseen_notification >0)
                    {
                        $('.count').html(data.unseen_notification);

                    }
                }
            });
        }

        load_unseen_notification();
        $(document).on('click', '.xyz', function(){
            $('.count').html('');
            load_unseen_notification('yes');
        });


        setInterval(function(){
            load_unseen_notification();;
        }, 5000);

    });
</script>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<link rel="stylesheet" href="../../../assets/faculty/css/vroom.css">
<script type="text/javascript" src="../../../assets/faculty/js/vroom.js"></script>
<script type="text/javascript" src="../../../assets/faculty/js/TweenLite.min.js"></script>
<script type="text/javascript" src="../../../assets/faculty/js/CSSPlugin.min.js"></script>
<script src="../../../assets/faculty/js/jquery.nicescroll.js"></script>
<script src="../../../assets/faculty/js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../assets/faculty/js/bootstrap.min.js"></script>

</div>
</div>
</body>
</html>
