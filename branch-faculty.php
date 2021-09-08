<?php
ob_start();
?>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
		<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
		<title>VJIT FEEDBACK</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>

<script type='text/javascript' src='js/no_back.js'>

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


$branches=array();

$query="select DISTINCT(c13) from t105";
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
					array_push($branches, $field);
				}
			}
		}
	}


echo "
<div align='center'><h4>Branch Wise Faculty  Feedback Data</h4>
	<form id='branch_select' action='branch-faculty.php' method='post'>
		<table class='table'>
		<tr><th>Select Branch</th>";
		
		
		foreach($branches as $br)
		echo "<td><input type='radio' value='$br' name='branch' id='c13'>&nbsp".strtoupper($br)."</td>";
	
		
		echo "
		</tr>
		<tr><td><input type='checkbox' name='check_comment' >Show Comments</td><td><input type='submit' value='Get Data' title='year_select' class='btn btn-success'></td>
			<td><button value='clear' onclick='clear(this.title)' title='year_select' class='btn btn-default'>clear</button></td>
			<td><a href='admin-index.php'><input type='button' class='btn btn-basic' value='Home'></a></td>
		</tr>
		</table>
	</form>
	
</div>

<hr>
";
if(isset($_POST["branch"]))
{
	$branch=$_POST['branch'];
	 $check_comment=$_POST['check_comment'];
	$id='';
		$name='';
	$subject_fid;
		$array_cols;
		$cols=$property_decode['t104']['admin-main'];
		$columns=$property_decode['t104']['final-admin'];
		$comments;
		$i=0;
			$query="select c7 from t102 where c13='$branch'";
			echo "<div id='result_box'><div align='center' class='noprint'><h3> Faculty Feedback Data-$branch</h3><p>click on Home button to go back</p></div>";
			echo "<div align='center'><table class='table table-hover' id='table' style='text-align:center'><tr><th>Faculty Name</th>";
			foreach($cols as $columns_insert=>$value)
			{
				if($value=='c34')continue;
			echo "<th>".$array_names[trim($value)]."</th>";
			
			}
			
		
			echo "<th>Average</th>";
			if($check_comment=='on')
			echo "<th>Comments</th>";
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							 $query2="select ".$columns.",c34 from t114_".$property_decode['view_from_database']['value']." where c7='$field'";
								if($result2=mysqli_query($con,$query2))
								{
									if(($rows2=mysqli_num_rows($result2))>0)
									{
										//echo "rows='$rows2'<br>";
										while ($row2 = mysqli_fetch_assoc($result2)) 
										{
											
											foreach($row2 as $key2=>$field2)
											{
												
												if($key2=='c7')
												{
													$name=array_search($field2,$faculty_code);
													echo"<tr><td>$name</td>";
												}
												else if($key2=='c15')
												{
												if(array_search(trim($field2),$regular_subject_code)!=null)
													echo "<td>".array_search(trim($field2),$regular_subject_code)."</td>";
												else if(array_search(trim($field2),$oe_subject_code)!=null)
													echo "<td>".array_search(trim($field2),$oe_subject_code)."</td>";
												else if(array_search(trim($field2),$pe_subject_code)!=null)
													echo "<td>".array_search(trim($field2),$pe_subject_code)."</td>";
												else if(array_search(trim($field2),$batch_lab_subject_code)!=null)
													echo "<td>".array_search(trim($field2),$batch_lab_subject_code)."</td>";
												// calculating average here
												}
												else if($key2=='c34')
												{
													if($check_comment=='on')
														echo "<td>$field2</td>";
												}
												else
													echo "<td>$field2</td>";
												
											}
											echo "</tr>";
											
										
										}
										
									}
								}
						}
									}
								}
								//print_r($array_cols);
								
									
									
												
			}
							
						
			echo "</table></div></div>";
			echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='print()'>print</button>
				</div>";
				
				 //logging
	 $desc=":,viewed branch wise faculty feedback data";
	 $query_log="(".$query.")";
require_once('logging.php');
////
}
}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
	
}
?>


<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>


