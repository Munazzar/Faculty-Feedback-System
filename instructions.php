<?php
ob_start();
session_start();
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>	
<!-- //custom-theme files-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" /><!-- //animation effects-css-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //custom-theme files-->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->


</head>

<script type='text/javascript'>


</script>
<script type='text/javascript' >
function check()
{
		
		if(screen.width<500)
		{
			
			document.getElementById('big').style.display='block';
		}
		else
		{
			
			document.getElementById('big').style.display='block';
		}
		 
}
	</script>
<body onload='check()'>



<?php

	
require_once('property_read.php');
$value=$property_decode['checked']['value'];
if($value=='true')
{
error_reporting(0);
?>


<div id='logo' align='center'>
	
	<div align='center' class='logo'>
	<img src='images/vjitlogo.png' ></div>
	<h2 style='color:red;opacity:0.8'><b>Important Instructions! Read Carefully before Giving Your Valuable Feedback</b></h2>
	<p id='home'>You Guys are Engineers , Please Give Feedback Professionally</p>
	</div>
	
<div align='center'><div align='center'>
<div class='instructions' >
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> You are Anonymous to us, Feel Free to Give Genuine Feedback</h3>
		
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> Score Each Faculty on a scale of 1 to 10 for each Attribute that will be Listed in Header </h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> 10-Excellent 9-Extremely Good 8-Very Good 7-Good 6-Moderately Good 5-Moderate 4-Tolerable 3-Poor 2-Very Poor 1-Extremely Poor </h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> All the Fields are Mandatory</h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> Comment Section is not mandatory but any sort of misuse will be traced out </h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> After Filling all the fields, press submit </h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> Incase You don't submit or  press exit you will have to choose all the fields again</h3>
		<h3 data-aos='zoom-out'><i class='fa fa-angle-double-right'></i> Once you give your feedback you won't be able to give your feedback again </h3>
	
	
	<div align='right' id='big' style='display:none'>
		<a href='feedback1.php'><button class='btn btn-success' >START</button></a>
	</div>
	<div align='right' id='small' style='display:none'>
		<a href='screen.php'><button class='btn btn-success' >START</button></a>
	</div>
	</div>
	</div>	
	
			
				
				<div class='grid-container'>
				<div class='item1'>Developed By <b>Munazzar, CSE 2k19</b></div>
				<div class='item2'>Under the Esteemed Guidance of</div>
				<div class='item3'><b>G Srilatha <br>AC, VJIT</b></div><div class='item4'><b>K S R K Sarma <br>Assoc. Prof, CSE</b></div><div class='item5'><b>Vikas Bandaru<br> Asst. Prof, CSE</b></div>
				
			
							
			</div>
</div>



 

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>



<!-- animation effects-js files-->
	<script src="js/aos.js"></script><!-- //animation effects-js-->
	<script src="js/aos1.js"></script><!-- //animation effects-js-->

</body>
</html>

<?php
}
else
	echo '<meta http-equiv="refresh" content="1;url=index.php">';

?>