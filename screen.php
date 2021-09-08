<?php
ob_start();
?>
<head>
<title>feedback System
</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="js/jquery.min.js"></script>

<script type='text/javascript' src='js/check.js'>
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/lightbox.css">
<link rel="shortcut icon" href="images/log.ico">	
<!-- //custom-theme files-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" /><!-- //animation effects-css-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //custom-theme files-->

<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->



</head>
<body>

<?
session_start();
//error_reporting(0);
require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");
echo $_SESSION["name"]."check";

if(isset($_SESSION['c29'])){
	$faculty_array=array();
	//print_r($OE);
	$c25=$_SESSION["c25"];
	echo "<div id='logo' align='center'>
	

	
	<h2 style='color:red;margin-top:80px;opacity:0.8'><b>You are annonymous to us , Please Feel Free To Give Your Feedback</b></h2>
	<p id='home'>You Guys are Engineers , Please Give Feedback Professionally</p>
	</div>";
	$fid_student=$_SESSION['c29'];
	$name=$_SESSION['name'];
	
	
		$query="select c7,c15 from t103_".$property_decode['current_database']['value']." 	where c25='$c25'";
		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_assoc($result)) 
				{
					
					$fid='';
					
					foreach($row as $key=>$output)
					{
						if($key=='c7')
							 $fid=$output;
						 
						else if($key=='c15')
						{
							 $faculty_array[$output]=$fid;
						}
					
						
					}				
						
				}
					
					
			}
			
		}
		//else
			//echo mysqli_error();
		//print_r($faculty_array);
		
	

	
	
$k=0;
$year_now=substr($c25,-1);
$check_now=0;
if($c25=='ymba2')
{
	$check_now=1;
$k=1;
	}
else if($year_now>1)
	$check_now=1;
	$subject_ids=array();
if($check_now)
{




		
		//getting spl lab subjects of student from t112
		$query="select c44 from t112_".$property_decode['current_database']['value']." where c1='$name'";

		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $output)
					{
						//echo $output;
						$id_sub= $batch_lab_subject_code[$output];
						$subject_ids[$id_sub]=$output;
					}
					
				}
			}
		}
		
		//getting pe subjects of student from t110 
		$query="select c36 from t110_".$property_decode['current_database']['value']." where c1='$name'";

		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $output)
					{
						//echo $output;
						$id_sub= $pe_subject_code[$output];
						$subject_ids[$id_sub]=$output;
					}
					
				}
			}
		}
		
		
		
		
//getting oe subjects of student from t109 
$query="select c35 from t109_".$property_decode['current_database']['value']." where c1='$name'";

		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $output)
					{
						//echo $output;
						 $id_sub= $oe_subject_code[$output];
						$subject_ids[$id_sub]=$output;
					}
					
				}
			}
		}
		
		
		
		
		//print_r($subject_ids);


 
}
	
	
	
	
	
//print_r($subject_ids);
foreach($subject_ids as	$subj_id=>$subj_name)
{

		$query="select c7 from t103_".$property_decode['current_database']['value']." where c25='$subj_id' and c15='$subj_id'";
		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $output)
					{
						 $fid=$output;
						$faculty_array[$subj_id]=$output;
					}				
						
				}
				
			}
		}			
	
}


//print_r($faculty_array);




//print_r($faculty_array);
echo '
<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">feedback</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						
						<div data-aos="zoom-in" style="height:60px;width:85px;float:left;padding-right:25px;margin-right:20px"><img src="images/vjitlogo.png" alt="logo" ></div>
							<h1 style="float:left"><a class="navbar-brand" href="index.html"></a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll scroll" href="#page-top"></a>	</li>';
							foreach($faculty_array as $key=>$faculty_id)
							{
								echo "<li><a class='page-scroll scroll' href='#$faculty_id'>".array_search($faculty_id,$faculty_code).'(';
								
								if(array_search(trim($key),$regular_subject_code)!=null)
									echo array_search(trim($key),$regular_subject_code).')</a></li>';
								else if(array_search(trim($key),$oe_subject_code)!=null)
									echo array_search($key,$oe_subject_code).')</a></li>';
								else if(array_search(trim($key),$pe_subject_code)!=null)
									echo array_search($key,$pe_subject_code).')	</a></li>';
								else if(array_search(trim($key),$batch_lab_subject_code)!=null)
									echo array_search($key,$batch_lab_subject_code).')	</a></li>';
								
							}
								
								
							
					
						echo '</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
</div>';	

echo "<div align='center'><form id='feedback_form' name='$name' action='' onsubmit='insert(this.id)' method='POST'><div align='center'><table class='table table-condensed'>";

	foreach($faculty_array as $subject=>$faculty)	
	{	
	//echo $subject;
echo "<tr ><th id='$faculty'><div style='margin-top:80px;background-color:#CD6155' data-aos='slide-up'>";
echo array_search($faculty,$faculty_code).'(';
								
								if(array_search(trim($subject),$regular_subject_code)!=null)
									echo array_search(trim($subject),$regular_subject_code);
								else if(array_search(trim($subject),$oe_subject_code)!=null)
									echo array_search($subject,$oe_subject_code);
								else if(array_search(trim($subject),$pe_subject_code)!=null)
									echo array_search($subject,$pe_subject_code);
								else if(array_search(trim($subject),$batch_lab_subject_code)!=null)
									echo array_search($subject,$pe_subject_code);



echo ")</div></th></tr>";
foreach($property_decode['t104']['50'] as $columns_insert=>$value)
	{
	echo "<tr><td><b>".$array_names[trim($value)]."</b></td></tr>";
	echo "<tr><td><select data-aos='zoom-out' title='$faculty' required><option value=''>select</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
							<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
							</select>
							
						</td></tr>";
						
	}
	echo "<tr><td>Commets:</td></tr>";
					echo "<tr><td ><textarea placeholder='Enter Your Commets...' title='$faculty'  name='$subject' max='100' required></textarea></td>";
							echo "</tr>";		
							
	}
	


	
	echo "<tr id='end'><td><input  type='submit' value='SUBMIT' class='submit-button' name='$c25' title='$fid_student'></td></tr><tr><td><a href='logout.php'><input type='button' value='EXIT' class='logout-button' ></a></td></tr>";
	echo "</table></form></div>";
}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are from VJIT <a href='login.php'>click here</a></h2></div>";
}


?>


<script src="js/lightbox-plus-jquery.min.js"> </script><!-- for gallery js -->
 
<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
<!-- //js -->

 <!-- /Responsive slides js -->
						
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

 <!-- Responsive slides js -->

 <a href='#home'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#end'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>
<!-- animation effects-js files-->
	<script src="js/aos.js"></script><!-- //animation effects-js-->
	<script src="js/aos1.js"></script><!-- //animation effects-js-->
<!-- animation effects-js files-->

<!-- //here starts scrolling icon -->
<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling script -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling script -->
<!-- //here ends scrolling icon -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->

</body>
