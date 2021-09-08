<?php
ob_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>
<style>
th{
	position: sticky;
  top: 0;
  padding:5px;
  background:#e5e5e5;
}
</style>
<body>
<?php

	error_reporting(0);
session_start();
if(isset($_SESSION["admin"]))
{
require_once("property_read.php");
require_once("database_connect.php");
require_once("code.php");
$check_array;
$student_id_array=array();
$columns=$property_decode['t104']['student-faculty-data'];
$columns_array=$property_decode['t104']['student-faculty-data-array'];

$query="select c29 from t104_".$property_decode['view_from_database']['value'];

if($result=mysqli_query($con,$query))
{
	if(($rows=mysqli_num_rows($result))>0)
	{
		
		while ($row = mysqli_fetch_assoc($result)) 
		{
			
			foreach($row as $key=>$field)
			{
				if($student_id_array[$field]==$field)continue;
				else{
					$student_id_array[$field]=$field;
				}
				
			}
		}
	}
}


//print_r($student_id_array);

//logging
$desc=":,viewed student wise feedback data";
$query_log="(".$query.")";
require_once('logging.php');

//////
echo "<div id='result_box'><div align='center'><h2>Student wise Data Evaluation</h2></div>";
echo "<div align='center' id='print'>
					<button class='btn btn-default' onclick='print()'>print</button>
					</div>";	
echo "<table class='table table-hover' id='table' style='text-align:center'><tr>";
foreach($columns_array as $value)
{
	echo"<th>".$array_names[trim($value)]."</th>";
}
echo "</tr>";

foreach($student_id_array as $st_key=>$st_val)
{

$query="select $columns from t104_".$property_decode['view_from_database']['value']." where c29='$st_val'";

if($result=mysqli_query($con,$query))
{
	if(($rows=mysqli_num_rows($result))>0)
	{
		
		while ($row = mysqli_fetch_assoc($result)) 
		{
			echo "<tr>";
			foreach($row as $key=>$field)
			{
				
				if($check_array[$key][$field]==$field)
				{
					echo "<td></td>";
					continue;
				}
				
				if(in_array($key,array("c29")))
				{
					$check_array[$key][$field]=$field;	
						echo "<td style='background-color:yellow'>$field</td>";	
				}
				else if(in_array($key,array("c15")))
				{
					if(array_search(trim($field),$regular_subject_code)!=null)
						echo "<td>".array_search(trim($field),$regular_subject_code)."</td>";
					else if(array_search(trim($field),$oe_subject_code)!=null)
						echo "<td>".array_search(trim($field),$oe_subject_code)."</td>";
					else if(array_search(trim($field),$pe_subject_code)!=null)
						echo "<td>".array_search(trim($field),$pe_subject_code)."</td>";
					else if(array_search(trim($field),$batch_lab_subject_code)!=null)
						echo "<td>".array_search(trim($field),$batch_lab_subject_code)."</td>";
					
					
				}
				else if(in_array($key,array("c7")))
				{
					$exe="select c6 from t102 where c7='$field'";
					if($result_exe=mysqli_query($con,$exe))
					{
						if(($rows_exe=mysqli_num_rows($result_exe))>0)
						{
							
							while ($row_exe= mysqli_fetch_row($result_exe)) 
							{
								echo "<td>$row_exe[0]</td>";
							}
						}
					}
				}
				else
					echo "<td>$field</td>";
				
			}
			echo "</tr>";
		}
	}
}
}
	echo "</table></div>";
	
	
echo "<div class='paging' style='padding:5px' align='right'>
				<a href='logout.php'><button class='btn btn-danger'>LOGOUT</button></a>
				</div>";

}
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();

}

?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>
</body>