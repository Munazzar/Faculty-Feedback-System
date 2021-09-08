	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<script type='text/javascript' src='js/check_size.js'>
</script>
<script src="js/aos.js"></script><!-- //animation effects-js-->
	<script src="js/aos1.js"></script>
<script src="js/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />
<script>
function newdesign()
{
window.location.assign('./feedback1.php');
	
}
</script>
<?php
error_reporting(0);
session_start();
require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");
if(isset($_SESSION["name"])){
	$subject_two_type=explode(",",$_SESSION['c15']);
	$subjects=explode(";",$subject_two_type[0]);
	$OE=explode(";",$subject_two_type[1]);
	//print_r($OE);
	$c25=$_SESSION["c25"];
	echo "<div id='logo' align='center'>
	<img src='images/vjitlogo.png' width='75px' height='70px' >

	<h2 class='fs-title'>FACULTY FEEDBACK</h2>
	<h2 style='color:'><b>You are anonymous to us , Please Feel Free To Give Your Feedback</b></h2>
	<p>You Guys are Engineers , Please Give Feedback Professionally</p>
	<p><h3>10-<b>Excellent</b> 9-<b>ExtremelyGood</b>  8-<b>VeryGood</b> 7-<b>Good</b> 6-<b>ModeratelyGood</b><br> 5-<b>Moderate</b> 4-<b>Tolerable</b> 3-<b>Poor</b> 2-<b>VeryPoor</b> 1-<b>ExtremelyPoor</b></h3></p>
	</div>";
	$fid_student=$_SESSION['c29'];
	$name=$_SESSION['name'];
	
	echo "<form id='feedback_form' name='$name' action='' onsubmit='insert(this.id)' method='POST'><div align='center'><table class='table table-condensed'><h5 onclick='newdesign()'><a onclick='newdesign()'>would you like to use our new design? click me</a></h5><tr><th>Faculty Name<br>(Course)</th>";
	foreach($property_decode['t104']['50'] as $columns_insert=>$value)
	{
	echo "<th>".$array_names[trim($value)]."</th>";
	}
	
	echo "<th>Comment: max 100 characters</th></tr>";
	foreach($subjects as $key=>$value)
	{
		
		 $sub=$value;
		$query="select c7 from t103_".$property_decode['current_database']['value']."where c25='$c25' and c15='$sub'";
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
						echo "<tr><th style='color:rgb(175,1,5)' >".array_search(trim($output),$faculty_code)."<br>(".array_search($sub,$regular_subject_code).")</th>";
							
							foreach($property_decode['t104']['50'] as $columns_insert=>$value)
							{
							echo "<td ><select class='form_select ' title='$fid'  required><option value=''>select</option>";
							for($i=10;$i>0;$i--)
							{
								echo "<option>$i</option>";
							}
							echo "</select>
							
						</td>";
							}
							echo "<td ><textarea placeholder='Enter Your Commets...' title='$fid'  name='$sub' max='100'></textarea></td>";
							echo "</tr>";
						
						
					}				
						
				}
				
			}
			
		}
		//else
			//echo mysqli_error();
		
		
	
}
$i=0;
foreach($OE as $key=>$value)
{
 $sub=$value;
		$query="select c7 from t103_".$property_decode['current_database']['value']."where c25='$sub' and c15='$sub'";
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
						 if($i==0)
							echo "<tr><th style='color:rgb(175,1,5)'>".array_search(trim($output),$faculty_code)."<br>(OE-".array_search($sub,$oe_subject_code).")</th>";
						else
							echo "<tr><th style='color:rgb(175,1,5)'>".array_search(trim($output),$faculty_code)."<br>(PE-".array_search($sub,$pe_subject_code).")</th>";
							foreach($property_decode['t104']['50'] as $columns_insert=>$value)
							{
							echo "<td><select class='form_select ' title='$fid' required><option value=''>select</option>";
							
							for($i=10;$i>0;$i--)
							{
								echo "<option>$i</option>";
							}
							echo "</select>
							
						</td>";
							}
							echo "<td ><textarea placeholder='Enter Your Commets...' title='$fid'  name='$sub' max='100'></textarea></td>";
							echo "</tr>";
						
						$i++;
					}				
						
				}
				
			}
		}			
	
}
echo "<tr><td><input type='submit' value='SUBMIT' class='action-button' name='$c25' title='$fid_student'></td><td><a href='logout.php'><input type='button' value='EXIT' class='logout-button' ></a></td></tr>";
echo "</table></div></form>";	
}else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are from VJIT <a href='login.php'>click here</a></h2></div>";
}


?>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>