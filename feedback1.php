<?php
ob_start();
session_start();
//print_r($_SESSION);
require_once('property_read.php');
$value=$property_decode['checked']['value'];
if($value=='true')
{
?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/form1.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<script type='text/javascript' src='js/check_size.js'>
</script>

<script type='text/javascript' src='js/Smoothscroll.min.js'>
</script>

<script src="js/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<style>
body{
background-color:#e5e5e5;
}
</style>

<?php
//error_reporting(0);
	
require_once("database_connect.php");

require_once("code_insert.php");
if(isset($_SESSION["name"])){	
	
	//echo "<h3 align='center'>".$_SESSION["name"]."</h3>";
	//print_r($OE);
	$c25=$_SESSION["c25"];
	$current_database='';
	foreach($property_decode['database'] as $something=>$now)
	{
		$current_database=$now[1];
	}
	echo "<div id='logo' align='center'>
	<img src='images/vjitlogo.png' width='75px' height='70px' >

	
	
	<h2 class='fs-title'>FACULTY FEEDBACK FOR ".$current_database."</h2>
	<h2 style='color:'><b>You are anonymous to us , Please Feel Free To Give Your Feedback</b></h2>
	<p>You Guys are Engineers , Please Give Feedback Professionally</p>
	<p><h3>10-<b>Excellent</b> 9-<b>ExtremelyGood</b>  8-<b>VeryGood</b> 7-<b>Good</b> 6-<b>ModeratelyGood</b><br> 5-<b>Moderate</b> 4-<b>Tolerable</b> 3-<b>Poor</b> 2-<b>VeryPoor</b> 1-<b>ExtremelyPoor</b></h3></p>
	</div><hr>";
	$fid_student=$_SESSION['c29'];
	$name=$_SESSION['name'];
//$c25."=".$year_from_code[$c25];
	echo "<form id='feedback_form' name='$name' action='' onsubmit='insert(this.id)' method='POST'>";
	
		 $sub=$value;
		$query="select c15,c7 from t103_".$property_decode['current_database']['value']." where c25='$c25'";
		if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_assoc($result)) 
				{
					$subject_id='';
					$subject_names='';
					//print_r($row);
					foreach($row as $key=>$output)
					{
						if($key=='c15')
						{
							$subject_id=$output;
						 $subject_name=array_search($output,$regular_subject_code);
							
						}
						else if($key=='c7')
						{
						 $fid=$output;
						 echo '<div class="faculty_div" data-aos="zoom-in" >';
						 echo "<table class='table' >";
						 $img_src=$faculty_unique_code[$output].'.jpg';
						 echo "<tr><th style='color:red;text-align:center' ><img src='images/faculty_images/$img_src' width='120px' height='130px' alt='No Img'><br><br>".array_search(trim($output),$faculty_code)."<br>(".$subject_name.")</th>";
							echo "<td>";
							echo "<table>";
							for($j=0;$j<5;$j++)
							{
								
								$value=$property_decode['t104']['50'][$j];
								$title=$property_decode['t104'][$value]['title'];
								echo "<tr ><td title='$title'><b>".$array_names[trim($value)]."</b></td>";
								echo "<td><select class='form_select ' title='$fid'  required><option value=''>select</option>";
								for($i=10;$i>0;$i--)
								{
									echo "<option>$i</option>";
								}
								echo "</select></td></tr>";
								
							}
							echo "</table></td>";
							
							echo "<td><table>";
							for($j=5;$j<10;$j++)
							{
								
								$value=$property_decode['t104']['50'][$j];
									$title=$property_decode['t104'][$value]['title'];
								echo "<tr><td title='$title'><b>".$array_names[trim($value)]."</b></td>";
								echo "<td><select class='form_select ' title='$fid'  required><option value=''>select</option>";
								for($i=10;$i>0;$i--)
								{
									echo "<option>$i</option>";
								}
								echo "</select></td></tr>";
								
							}
							
							echo "</table></td>";
							echo "<tr><td colspan='3'>Comment: max 100 characters</td></tr>";
							echo "<tr><td colspan='3'><textarea placeholder='Enter Your Commets...' title='$fid'  name='$subject_id' max='100' required></textarea></td></tr>";
							
						echo "</table>";
						echo "</div>";
						}
					}				
						
				}
				
			}
			
		}
		//else
			//echo mysqli_error();


$k=0;
$year_now=substr($c25,-1);
$check_now=0;
if($c25=='ymba2')
{
	$check_now=1;
$k=1;
	}
else if($year_now>0)
	$check_now=1;
	
if($check_now)
{
$subject_ids=array();
$faculty_id_sub_id=array();


		
		//getting batch lab subjects of student from t112
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

 $sub=$value;
 //if($sub==null)continue;
 foreach($subject_ids as $subj_id=>$subj_name)
 {
	 if($subj_id==null)continue;
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
						
						  echo "<div class='faculty_div' data-aos='zoom-in'>";
						 echo "<table class='table'>";
						 
						 $img_src=$faculty_unique_code[$output].".jpg";
							echo "<tr align='center'><th style='color:red;text-align:center'><img src='images/faculty_images/$img_src' width='120px' height='130px' alt='No Img'><br><br>".array_search(trim($output),$faculty_code)."<br>(".$subj_name.")</th>";
						
								echo "<td>";
							echo "<table >";
							for($j=0;$j<5;$j++)
							{
								
								$value=$property_decode['t104']['50'][$j];
								$title=$property_decode['t104'][$value]['title'];
								echo "<tr ><td title='$title'><b>".$array_names[trim($value)]."</b></td>";
								echo "<td><select class='form_select ' title='$fid'  required><option value=''>select</option>";
								for($i=10;$i>0;$i--)
								{
									echo "<option>$i</option>";
								}
								echo "</select></td></tr>";
								
							}
							echo "</table></td>";
							
							echo "<td><table>";
							for($j=5;$j<10;$j++)
							{
								
								$value=$property_decode['t104']['50'][$j];
									$title=$property_decode['t104'][$value]['title'];
								echo "<tr><td title='$title'><b>".$array_names[trim($value)]."</b></td>";
								echo "<td><select class='form_select ' title='$fid'  required><option value=''>select</option>";
								for($i=10;$i>0;$i--)
								{
									echo "<option>$i</option>";
								}
								echo "</select></td></tr>";
								
							}
							
							echo "</table></td>";
							echo "<tr><td colspan='3'>Comment: max 100 characters</td></tr>";
							echo "<tr><td colspan='3'><textarea placeholder='Enter Your Commets...' title='$fid'  name='$subj_id' max='100' required></textarea></td></tr>";
							
						echo "</table>";
						echo "</div>";
						 
						$k++;
					}				
						
				}
				
			}
		}
}		
	

}
echo "<div id='last_div'>";
echo "<input type='submit' value='SUBMIT' class='action-button' name='$c25' title='$fid_student'><a href='logout.php'><input type='button' value='EXIT' class='logout-button' ></a>";
echo "</div>";
echo "</form>";	

}else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are from VJIT <a href='login.php'>click here</a></h2></div>";
}


?>
<a href='#feedback_form'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='30px'></div></a>
 <a href='#last_div'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='30px'></div></a>

<script>
  $(function() {
  AOS.init();
  duration: 1200;	
});
  $(window).on('load', function() {
  AOS.refresh();
});
</script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>


<?php
}
else
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
exit;
?>