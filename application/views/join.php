 <?php
 /**
  * Created by PhpStorm.
  * User: sanathls
  * Date: 05/11/19
  * Time: 10:16 PM
  */
 require_once __DIR__.'/../utilities/Constants.php';
 require_once __DIR__.'/../models/Department.php';

 $objDepartment =new Department();

 $departments = $objDepartment->getDepartments();
 session_start();
 if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['changePassword']))
 {
     if($_SESSION['role'] == Constants::roleFaculty)
         header('Location: faculty/index.php');
     if($_SESSION['role'] == Constants::roleHod)
         header('Location: hod/index.php');
     if($_SESSION['role'] == Constants::rolePrincipal)
         header('Location: principal/index.php');
     if($_SESSION['role'] == Constants::roleManagement)
         header('Location: management/index.php');
     if($_SESSION['role'] == Constants::roleAdmin)
         header('Location: admin/index.php');
 }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<link href="../../assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Custom CSS -->
<link href="../../assets/css/style2.css" rel='stylesheet' type='text/css' />
<link href="../../assets/css/style3.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="../../assets/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='../../assets/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="../../assets/js/jquery-1.11.1.min.js"></script>
<script src="../../assets/js/modernizr.custom.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">



<!-- Metis Menu -->


<link href="../../assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
body{
	background:url(../../assets/a.jpg);
}
#container1{
margin-top:8%;
margin-left:18%;
margin-right:5%;
width:100%
overflow:scroll;

}
.form-control
{
width:100%;
margin-top:20px;	
}
.widget-shadow{
	margin-right:20%;	

	
}

.alert{

width:100%;

	
}

#x{
			margin-left:0px;
}
#a{
		margin-left:0px;
}
.btn-default{
	background:#52b2bf;
	color:white;
	float:left;
	margin-left:20px;
}

</style>
<link href="../../assets/css/owl.carousel.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				
</head> 
<body class="cbp-spmenu-push">



		<div id="container1">
		
<form method ="post" autocomplete="off" action="../controllers/RegistrationController.php">

<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
 
						<div class="form-title">
							<h4>Employee Registration  </h4>
						</div>
						<div class="form-body">
						<div  id="x">
<!---->
<!--<div class="alert alert-info" role="alert"><strong>Done!</strong> Wait till you receive the mail with username and password to login</div>-->
<!--                           -->
<!--<div class="alert alert-danger" role="alert"><strong>Error!</strong> Please try again</div>-->

				
				
				
				</div>
							<div class="form-group"> <label for="JobID">Employee Id</label> 
							<input type="text" id="id" autocomplete="off" class="form-control" name="emp_id"  placeholder="Employee Id" required="" > </div>
							<div class="form-group" > <label for="exampleInputEmail1" >First Name</label>
							<input  autocomplete="off" type="text" id="name" class="form-control" name="first_name" placeholder="First Name" required="" > </div>
                            <div class="form-group" > <label for="exampleInputEmail1" >Last Name</label>
                                <input  autocomplete="off" type="text" id="name" class="form-control" name="last_name" placeholder="Last Name" required="" > </div>
							<div class="form-group"> <label for="exampleInputPassword1">Email-Address</label> 
							<input type="email" autocomplete="off" name="email"  class="form-control" id="email" placeholder="Email" required="" pattern="<?php echo Constants::emailPattern;?>" title="<?php echo Constants::patternTitle;?>">
                            </div>
                            <div class="form-group"> <label for="exampleInputPassword1">Phone</label>
                                <input type="text" autocomplete="off" name="phone"  class="form-control" pattern="[0-9]{10}" title="ENTER ONLY NUMBERS" placeholder="Phone" required="" maxlength="10"> </div>

		
							<div class="form-group"> <label for="exampleInputPassword1">Department</label> 
							<select class="form-control" id="select" name="department" required="">

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
							<br>
							<div class="form-group"> <label for="exampleInputPassword1">Designation</label> 
							<select class="form-control" id="select" name="role" required="">

<option  value="">Choose a designation </option>


<option  value="<?php echo Constants::rolePrincipal;?>"> Principal </option>
<option  value="<?php echo Constants::roleHod;?>"> HOD </option>
<option  value="<?php echo Constants::roleFaculty;?>"> Faculty </option>



</select>			
							<br>
							
							
							
							<input type="submit" name="submit" id="a" class="btn btn-default" value="Submit" />
                                <a href="index.php" class="btn btn-default">BACK</a>
</form>
						</div>
						
						<br>
						<br>
					
				
					
						<br>	

	
			</div>		</div>	
			
			
	
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.migrate.js"></script>
	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="../../assets/js/script.js"></script>
<script>/*
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
	//window.location.href = "index.html";
	$('#comment_form')[0].reset();
   	
	 document.getElementById("x").innerHTML += '<div class="alert alert-info" role="alert"><strong>Done!</strong> Wait till you receive the mail with username and password to login</div>';
	 
    },
	error:function()
    {
	//window.location.href = "index.html";
	$('#comment_form')[0].reset();
   	
	 document.getElementById("x").innerHTML += '<div class="alert alert-info" role="alert"><strong>Error!</strong> Please try again</div>';
	 
    }
   });
  }
 
 });
 

});*/

//
// $("#id").keydown(function(event) {
//   k = event.which;
//   if ((k >= 65 && k <= 90) || k == 8||k == 32||k == 37||k == 39||(k >= 96 && k <= 105) ||(k >= 48 && k <= 57) ) {
//     if ($(this).val().length == 20) {
//       if (k == 8) {
//         return true;
//       } else {
//         event.preventDefault();
//         return false;
//
//       }
//     }
//   } else {
//     event.preventDefault();
//     return false;
//   }
//
// });
//
// $("#name").keydown(function(event) {
//   k = event.which;
//   if ((k >= 65 && k <= 90) || k == 8||k == 32||k == 37||k == 39 ) {
//     if ($(this).val().length == 40) {
//       if (k == 8) {
//         return true;
//       } else {
//         event.preventDefault();
//         return false;
//
//       }
//     }
//   } else {
//     event.preventDefault();
//     return false;
//   }
//
// });

</script>


	
		
	<!--scrolling js-->
	<script src="../../assets/js/jquery.nicescroll.js"></script>
	<script src="../../assets/js/scripts.js"></script>
	<!--//scrolling js-->

	
	<!-- Bootstrap Core JavaScript -->
   <script src="../../assets/js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
<br>
</body>
</html>