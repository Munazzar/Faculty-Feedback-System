<?php
//error_reporting(0);
session_start();

unset($session_variable);
	// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
require_once('property_read.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<meta name="keywords" content="vjit, faculty, feedback,vjit,feedback, faculty,faculty feedback">
</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/sli1.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/munazzar2.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('images/bg03.jpg');"></div>
	</div>

	<div class="size1 overlay1">
		<!--  -->
		
		<div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">
		<div align="center">
		<a href="admin.php" style="color:white"><img src='images/vjitlogo.png' width='90px' height='80px' ><h4>Vidya Jyothi Institute of Technology (Autonomous)</h4></a>
		</div><br>
			<h3 class="l1-txt1 txt-center p-b-25">
				Faculty FEEDBACK System
			</h3>

			<p class="m2-txt1 txt-center p-b-48">
				Remember you will be anonymous to us, all the data taken from you will be used only for verification purpose
			</p>

			

			
			<?php
				require_once('property_read.php');
				$value=$property_decode['checked']['value'];
				if($value=='true')
				{
					echo '<a href="register.php" style="color:white"><button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1">
					REGISTER
				</button></a>
				
				
				
					<a href="login.php" style="color:white"><button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1">
				LOGIN
				</button></a>';
				}
				
				?>
			
			<!--<a href="admin.php" style="color:white"><button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1">
					ADMIN LOGIN
				</button></a>-->
		</div>
		<div align='center' style='position:fixed;bottom: 0;left: 0;' class='footer'>
<h5><?php echo $property_decode['main'];?></h5>
</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	

<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	

</body>

</html>