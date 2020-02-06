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
?>
<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo"> <h1 id="h1" style="font-size:30px;margin-bottom:-20px; margin-left:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>PBSA</B></h1></span>
            <img id="logo" style="margin-top:-20px;"src="../../../assets/principal/images/logo.png" alt="Logo"/>
        </a>
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
        <?php
        $result = $objEmployee->getUserDetails($email);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $initial = $row['initial'];
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $photo = $row['photo'];
            }
        }
        ?>
        <!--      display employee image-->
        <a href="#"><img id="image1" src="../../../<?php echo $photo;?>" ></a>






        <a href="#"><span class=" name-caret">
<?php echo $initial." ".$firstname." ".$lastname;?>
<!--                diplsay name and initial-->
	</span></a>
        <p>Principal</p>
        <ul>
            <li><a class="tooltips" href="editProfile.php"><span>Edit Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="changePassword.php" ><span>ChangePassword</span><i class="fa fa-key"></i></a></li>


            <li><a class="tooltips" href="#" onclick="logout()"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
        <script>
            function logout()
            {
                if (confirm("Are you sure you want to Logout"))
                {
                    window.location.href = '../../controllers/LogoutController.php';
                }
            }
        </script>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >

            <li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            <li id="menu-academico" class="xyz" ><a href="verifyPbsa.php"><i class="fa fa-check-square-o"></i> <span>Verify PBSA</span> <span class="badge count"></span></a>  </li>
            <li><a href="deptPerformance.php"><i class="fa fa-bar-chart-o"></i> <span>View Performance</span></a></li>


        </ul>

    </div>

    <div class="clearfix"></div>
</div>
</div>
<script>
    $(document).ready(function(){

        function load_unseen_notification(view ='')
        {
            $.ajax({
                url:"../../controllers/principal/PrincipalLivePbsaFetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                    if(data.count >= 0)
                    {
                        $('.count').html(data.count);

                    }
                }
            });
        }

        load_unseen_notification();

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
<link rel="stylesheet" href="../../../assets/principal/css/vroom.css">
<script type="text/javascript" src="../../../assets/principal/js/vroom.js"></script>
<script type="text/javascript" src="../../../assets/principal/js/TweenLite.min.js"></script>
<script type="text/javascript" src="../../../assets/principal/js/CSSPlugin.min.js"></script>
<script src="../../../assets/principal/js/jquery.nicescroll.js"></script>
<script src="../../../assets/principal/js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../assets/principal/js/bootstrap.min.js"></script>

</div>
</div>
</body>
</html>