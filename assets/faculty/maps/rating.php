
<!DOCTYPE HTML>
<html>
<head>
<title>skills</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href="//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet"> 

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
.tini-time-line1
{
margin-left:20%;

}
#select{
	padding-bottom:5px;
	padding-top:5px;
}
.aa{
	margin-left:1%;

}
.area1{
	
	margin-left:1.4%;
	width:80.5%;
}
/* The radio */
.radio {
 
     display: block;
    position: relative;
    padding-left: 20px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

/* Hide the browser's default radio button */
.radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.fa-star,.fa-star-o {
	 color:#3399ff;
	
}
/* Create a custom radio button */
.checkround{

    position: absolute;
    top: 2px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff ;
    border-color:#3399ff;
    border-style:solid;
    border-width:2px;
     border-radius: 50%;
}
.btn{
	  background:#3399ff;
     border-radius: 25%;
   margin-left:0%;	
border:none;   
}

/* When the radio button is checked, add a blue background */
.radio input:checked ~ .checkround {
    background-color: #fff;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkround:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio input:checked ~ .checkround:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio .checkround:after {
     left: 2px;
    top: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background:#3399ff;
    
 
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
											
												
												
												
												
						<form method="post">						
												<!--//custom-widgets-->
												<!--/candile-->
													<div class="candile"> 
															
																	
																
															    <div id="center"><div id="fig">
														
	<div class="form-body">
						<div class="form-group"><br> <label for="exampleInputEmail1"></label> 
						<div class="col-sm-10"><label for="Dept"><h4>Select Department HOD:</h4></label><br>

<select class="form-control" id="select" name="deptname">

<option  value="">Choose a department HOD </option>
					<?php
$conn = new MongoClient();
$dbases = $conn->listDBs(); 

foreach ($dbases['databases'] as $dbs) {
       
        $dbname = $dbs['name'];
      
?>
<option  value="<?php echo $dbname?>"><?php  echo $dbname; 
     ?></option>
<?php 
}?>


</select>
						</div>

															
														</div>
																				
															</div><br><br><br><br>
															<label for="Dept" class="aa"><h4>Rate Department HOD:</h4></label><br>
															<div class="col-md-10 chrt-two area1">
														
														<label class="radio">
															<label for="a-option">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i> 
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
														</label>
  <input type="radio" checked="checked" name="simp" value="5" id="simp" >
  <span class="checkround"></span>
</label>
<label class="radio">
	<label for="a-option">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i> 
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
  <input type="radio"  name="simp"  value="4" id="simp">
  <span class="checkround"></span>
</label>
<label class="radio">
<label for="a-option">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i> 
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
  <input type="radio"  name="simp" value="3" id="simp">
  <span class="checkround"></span>
</label>


<label class="radio">
<label for="a-option" >
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
  <input type="radio"  name="simp" value="2" id="simp">
  <span class="checkround"></span>
</label>
<label class="radio">
<label for="a-option">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
  <input type="radio"  name="simp" value="1" id="simp">
  <span class="checkround"></span>
</label>
<button type="button" class="btn btn-primary">Rate</button>
</form>		
															</div> 
															
														</div>	</div>
															
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
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>&nbsp;&nbsp;SDMIT</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href="index.html"><img src="images/a.png"></a>
									  <a href="index.html"><span class=" name-caret">Ashok Kumar T</span></a>
									 <p>Principal </p>
									<ul>
									<li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										
										<li><a class="tooltips" href="../index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
										<li><a href="pmenu.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
										 <li id="menu-academico" ><a href="rating.php"><i class="lnr lnr-pencil"></i> <span>Rate HODs</span> </a>
										   
										</li>
										 <li id="menu-academico" ><a href="viewpro.php"><i class="fa fa-file-text-o"></i> <span>View Current Projects</span> </a>
											</li>
									<li><a href="viewskills.php"><i class="lnr lnr-layers"></i> <span>View Skills </span></a></li>
									<li id="menu-academico" ><a href="viewemp.php"><i class="fa fa-users"></i> <span>View Employees</span></span></a>
										  
									 </li>
									
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
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