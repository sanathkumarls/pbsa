<?php
require_once __DIR__."/../../models/Admin.php";
require_once __DIR__."/../../utilities/Constants.php";
require_once __DIR__."/../../models/Employee.php";
if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
{
    $email =  $_SESSION['email'];
    $role = $_SESSION['role'];
    $changePassword = $_SESSION['changePassword'];
    $objAdmin= new Admin();

    if(!$objAdmin->checkEmail($email))//check realtime role
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
$objEmployee = new Employee();
$result = $objEmployee->pendingEmployee();
$count = 0;
while($result->fetch_assoc())
$count++;
?>
<div class="sidebar-menu">
    <header class="logo">

        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>





        <a href="#"> <span id="logo">
<h1 id="h1" style="font-size:30px;margin-bottom:-20px; margin-left:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>PBSA</B></h1></span>
            <img id="logo" style="margin-top:-25px;"src="../../../assets/admin/images/logo.png"alt="Logo"/>
        </a>
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->

    <div class="down">
        <?php
        $result = $objAdmin->getUserDetails($email);
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

            <a href="#"><img id="image1" src="../../../<?php echo $photo;?>" ></a>
        <a href="#"><span class=" name-caret">
<?php  echo $initial." ".$firstname." ".$lastname;?>
<!--                diplsay name and initial-->
	</span></a>
        <p>Administrator </p>
        <ul>
            <li><a class="tooltips" href="editProfile.php"><span>Edit Profile</span><i class="fa fa-edit fa-5x"></i></a></li>
            <li><a class="tooltips" href="addManagement.php"><span>AddManagement</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="changePassword.php" ><span>ChangePassword</span><i class="fa fa-key"></i></a></li>
            <li><a class="tooltips"  onclick="logout()" href="../../controllers/LogoutController.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <script>
        function logout()
        {
                if (confirm("Are you sure you want to Logout"))
                {
                    window.location.href = '../../controllers/LogoutController.php';
                }
        }
    </script>
    <div class="menu">
        <ul id="menu" >

            <li><a href="home.php"><i class="fa fa-info"></i> <span>Basic Information</span></a></li>
            <li id="menu-academico" ><a href="organization.php"><i class="lnr lnr-apartment"></i><span>	&nbsp;Organization</span> </a>

            </li>
            <li id="menu-academico" class="xyz" ><a href="employees.php"><i class="fa fa-users"></i> <span>Employees </span> <span class="badge count"><?php echo $count;?></span></a>
            </li>

            	<li id="menu-academico" ><a href="importEmployees.php"><i class="fa fa-upload"></i> <span>Import Employees</span></span></a>

            </li>

        </ul>

    </div>

    <div class="clearfix"></div>
</div>
</div>
<!--<script>-->
<!--    $(document).ready(function(){-->
<!---->
<!--        function load_unseen_notification(view ='')-->
<!--        {-->
<!--            $.ajax({-->
<!--                url:"fetch.php",-->
<!--                method:"POST",-->
<!--                data:{view:view},-->
<!--                dataType:"json",-->
<!--                success:function(data)-->
<!--                {-->
<!--                    load_unseen_notification('yes');-->
<!--                    if(data.unseen_notification != 0)-->
<!--                    {-->
<!--                        $('.count').html(data.unseen_notification);-->
<!---->
<!--                    }-->
<!--                }-->
<!--            });-->
<!--        }-->
<!---->
<!--        load_unseen_notification();-->
<!--        $(document).on('click', '.xyz', function(){-->
<!--            $('.count').html('');-->
<!--            load_unseen_notification('yes');-->
<!--        });-->
<!---->
<!---->
<!--        setInterval(function(){-->
<!--            load_unseen_notification();;-->
<!--        }, 5000);-->
<!---->
<!--    });-->
<!--</script>-->
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
<link rel="stylesheet" href="../../../assets/admin/css/vroom.css">
<script type="text/javascript" src="../../../assets/admin/js/vroom.js"></script>
<script type="text/javascript" src="../../../assets/admin/js/TweenLite.min.js"></script>
<script type="text/javascript" src="../../../assets/admin/js/CSSPlugin.min.js"></script>
<script src="../../../assets/admin/js/jquery.nicescroll.js"></script>
<script src="../../../assets/admin/js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>
