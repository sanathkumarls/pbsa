
<!DOCTYPE HTML>
<html>
<head>
<title>skills</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Skill" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/radar.js"></script>	
<link href="css/barChart.css" rel='stylesheet' type='text/css' />
<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>

<script src="js/jquery.easydropdown.js"></script>
<style>
#logo{
width:50px;
height:50px;	
margin-top:-20%;
}

#image1{
	width:150px;
	height:150px;
}
.tini-time-line1
{
margin-left:20%;

}
.form-body{
margin-top:-20px;	
}

.form-control
{
width:100%;
margin-top:20px;
overflow:auto;	
}
.ab{
overflow:visible;	
	
float:both;
clear:both;
}
.btn-success,.btn-default{
	text-align:center;
	margin-top:3%;
	width:100px;
	
	overflow:auto;	
margin-left:0%;
}
.btn-danger{
	margin-top:1.8%;
padding-top:7px;
padding-bottom:5px;	
}
#lname,#lno{
margin-bottom:1%;		
}
.lev{
	
	margin-left:0%;	
color:black;
}
.lev1{
	margin-top:-2%;
	margin-left:1.5%;	
color:black;
}
.btn-default{
padding-top:12px;
padding-bottom:12px;	
margin-bottom:5%;	
}
.glyphicon-plus,.glyphicon-minus{
color:white;	
padding-top:2px;
padding-bottom:2px;
}
#select{
	padding-bottom:5px;
	padding-top:5px;
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
															<li><a href="admin.php">Home</a></li>
															<li><a href="levels.php">Organization</a></li>
															<li>Levels</li>
														</ol>
											</div>	
												
												
												
												
												<div class="form-title">
							<h3>Levels in Organization:</h3>
						</div>
												<!--//custom-widgets-->
												<!--/candile-->
													<div class="candile"> 
															<div class="candile-inner">
																	
																	
															    <div id="center"><div id="fig">
														<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
	
    $(document).ready(function(e) {

		var i=3;
            var max=10;
            var x=3;
	// var html='<div> <br><input type="text" name="name'+i+'" class="form-control" placeholder="Level Name'+i+'" id="childname"><input type="text" name="lno'+i+'" class="form-control" id="exampleInputPassword1" placeholder="Level Number">&nbsp;&nbsp;&nbsp;<a href="#" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></a></td></tr></div>';

        $("#add").click(function(e) {
var html='<div class="ab"><span class="col-md-8"><input type="text" name="name[]" autocomplete="off" class="form-control" placeholder="Level Name" id="childname"></span><span class="col-md-2"><input type="text" name="lno[]" autocomplete="off" class="form-control" id="exampleInputPassword1" placeholder="Level Number"></span><a href="#" id="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></a></div>';

            if(x<=max){
			i++;
            $("#abc").append(html);
         x++;			
  }
        });

        $("#abc").on('click','#remove',function(e) {
            $(this).parent('div').remove();
            x--; i--;
        });
		
  });

   
 </script>				
		

<div id="container1" class="con">
<form method ="post" action="#" autocomplete="off">
<!--Name:<input type="text" name="name[]" id="name">
<a href="#" id="add">Add</a>
<input type="submit" name="submit">-->
<?php

if(isset($_POST["submit"]))
{
try{
$m = new MongoClient();
$db = $m->mydb;
$level = $db->createCollection('level');
//echo "Connected to database".$mydb."\n";
$coll=$_POST["name"];
$lno=$_POST["lno"];

		
	$level->createIndex(array('lname' => 1,'lno' => 1), array('unique' => 1));
foreach(array_combine($coll, $lno) as $a => $b)
{
	$doc = array(
    "lname" => "$a",

		"lno" => "$b");
		
		$level->insert($doc);
		
}


?>
<div class="alert alert-info" role="alert"><strong>Done!</strong> Levels are added</div>
<?php
//$db->createCollection($a);
}
catch(Exception $e){
?>

<div class="alert alert-danger" role="alert"><strong>Error!</strong>Level cannont be defined</div>
<?php	
	
}
}

?>
<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
						<div class="form-group"><br> <label for="exampleInputEmail1"></label> 
						<div class="lev1"><b>Add levels</b></div>
										<div class="col-sm-8">						
												<input type="text" name="name[]" autocomplete="off" class="form-control" id="lname" placeholder="Level Name"> 
											</div><div class="col-sm-2">
												<input type="number" name="lno[]" autocomplete="off" class="form-control" id="lno" placeholder="Level Number" min="1" max="10">	
											</div><br><br>
												<div class="col-sm-8">
												<input type="text" name="name[]" autocomplete="off" class="form-control" id="lname" placeholder="Level Name"> 
											</div><div class="col-sm-2">
												<input type="number" name="lno[]" autocomplete="off" class="form-control" id="lno" placeholder="Level Number"  min="1" max="10">	
											</div>
											
											<div id="abc"></div>
							</div><div class="col-sm-12"> <a href="#" id="add" class="btn btn-success add-more"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
</div><br><br><div class="col-sm-6">
						 <button type="submit" name="submit" class="btn btn-default">Submit</button> </form> 
						</div>
					</div></div>



</div>		

															</div>
														</div>
																				
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
														
				
														
														
															<h3 class="sub-tittle"></h3>
														<div id="chartdiv4"></div>	
														     
													        
														
																<div class="clearfix"> </div>
														</div>
												<div class="area">
											
															<h3 class="sub-tittle"></h3>
															 <div style="area">
																
																</div>
															
															
															
															<h3 class="sub-tittle"></h3>
															    <div id="chartdiv1"></div>	
															
																
																<div class="clearfix"></div>
												</div>
													<!--//weather-charts-->
														<div class="graph-visualization">
															
																<h3 class="sub-tittle"></h3>
																	<div class="weather">
																	<div class="weather-top">
																		<div class="weather-top-left">
																			
																			
																			<div class="clearfix"></div>
																			</div>
																
																		
																		</div>
																		<div class="weather-top-right">
																			
																		</div>
																		<div class="clearfix"> </div>
																	</div>
																	<div class="weather-bottom">
															<div class="weather-bottom1">
																<div class="weather-head">
															
																<div class="bottom-head">
															
																</div>
															</div>
															</div>
															<div class="weather-bottom1 ">
																<div class="weather-head">
														
															</div>
															</div>
															<div class="weather-bottom1">
																<div class="weather-head">
																
															</div>
															</div>
															<div class="weather-bottom1 ">
																<div class="weather-head">
														
															
															
																</div>
															</div>
															<div class="clearfix"> </div>
														</div>

															

															</div>
														
															<div class="clearfix"> </div>
														</div>

												<!--//charts-->
												<div class="area-charts">
												
														
															<div class="clearfix"></div>		
													
										<!--/bottom-grids-->		 
								
										<div class="dev-table">    
											
                                        
										<div class="clearfix"></div>		
										
										</div>
									
									<!--//bottom-grids-->
									
									</div>
									<!--/charts-inner-->
									</div>
										<!--//outer-wp-->
									</div>
									
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo">
<h1 id="h1" style="font-size:30px;margin-bottom:-20px; margin-left:25px;">&nbsp;&nbsp;&nbsp;&nbsp;SDMIT</h1></span> 
				<img id="logo" style="margin-top:-20px;"src="images/logo.jpg" alt="Logo"/>
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			
							<div class="down">	
							
									  <?php	
									$m = new MongoClient();
									$db = $m->mydb;
									$c = $db->admin->findOne(array("_id" =>'100'));
									  
									  
									  if(!$c['photo']){?>
									  <a href="#"><img id="image1" src="images/a.png" ></a>
						<?php }
						else{
						?>
						<a href="#"><img id="image1" src="images/<?php echo $c['_id'].'.jpg';
						
						
						?> " ></a><?php } ?>
									  <a href="#"><span class=" name-caret"><?php
									
									
									echo $c['initial'].$c['Full Name'];
									
											
									  ?></span></a>
									 <p>Administrator </p>
									<ul>
									<li><a class="tooltips" href="edit.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="../start/index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
									
										<li><a href="admin.php"><i class="fa fa-info"></i> <span>Basic Information</span></a></li>
										 <li id="menu-academico" ><a href="levels.php"><i class="lnr lnr-apartment"></i><span>	&nbsp;Organization</span> </a>
										    
										</li>
										 <li id="menu-academico" class="xyz" ><a href="emp.php"><i class="fa fa-users"></i> <span>Employees </span> <span class="badge count"></span></a>
											</li>
									<li><a href="skills.php"><i class="lnr lnr-layers"></i> <span>Skills</span></a></li>
									<li id="menu-academico" ><a href="project.php"><i class="fa fa-code"></i> <span>Project</span></span></a>
										  
									 </li>
									
								</div>
							
							  <div class="clearfix"></div>		
							</div>
							</div>
							<script>
$(document).ready(function(){
 
 function load_unseen_notification(view ='')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
  load_unseen_notification('yes');
 if(data.unseen_notification != 0)
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
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>