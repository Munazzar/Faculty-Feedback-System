<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>
<?php

	error_reporting(0);
session_start();
if(isset($_SESSION["admin"]))
{
require_once("property_read.php");
require_once("code.php");
$i=1;
$j=0;
$values_cols;
$subject_fid;
$faculty_col=$property_decode['t104']['admin-detail-array'];


		$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];
		require_once("database_connect.php");
		
		echo "<div class='fixing' id='result_box'>";
		echo "<div class='paging'>
				<a href='logout.php'><button class='btn btn-danger'>LOGOUT</button></a>
				</div>";
		echo "<div align='center'><h3>$name Feedback Data</h3></div>";
		//echo "<table class='table table-hover'><tr><th>Attribute Name</th><th>no Of 1 </th><th>no Of 2 </th><th>no Of 3 </th><th>no Of 4 </th><th>no Of 5 </th><th>no Of 6 </th><th>no Of 7 </th><th>no Of 8 </th><th>no Of 9 </th><th>no Of 10 </th></tr>";
		$array_cols;
		$cols=$property_decode['t104']['admin-faculty-detail'];
		$i=1;
		foreach($property_decode['t104']['50'] as $columns_insert=>$value)
			{
				$array_cols[$i]=$array_names[trim($value)];
				$i++;
			
			}
		$i=0;
		$query_col="select c15 from t103_".$property_decode['view_from_database']['value']." where c7='$id'";
		if($result_col=mysqli_query($con,$query_col))
		{
			if(($rows_col=mysqli_num_rows($result_col))>0)
			{
			//echo "rows='$rows2'<br>";
				while ($row_col = mysqli_fetch_row($result_col) ) 
				{
					$j=0;
					foreach($faculty_col as $col_now)
					{
						for($i=0;$i<11;$i++)
						$values_cols[$j][$i]=0;	
						$j++;
					}		
					 $sub_id=$row_col[0];
				 	if($subject_fid[$id][$sub_id]!="")continue;
					$subject_fid[$id][$sub_id]=$sub_id;
					if(array_search(trim($sub_id),$regular_subject_code)!=null)
					echo "<div align='center'><h4>For Subject : ".array_search($sub_id,$regular_subject_code)."</h4></div>";
					else if(array_search(trim($sub_id),$oe_subject_code)!=null)
						echo "<div align='center'><h4>For Subject : ".array_search($sub_id,$oe_subject_code)."</h4></div>";
					else if(array_search(trim($sub_id),$pe_subject_code)!=null)
						echo "<div align='center'><h4>For Subject : ".array_search($sub_id,$pe_subject_code)."</h4></div>";
					
					
					
					echo "<table class='table table-hover'><tr><th>Attribute Name</th><th>no Of 1 </th><th>no Of 2 </th><th>no Of 3 </th><th>no Of 4 </th><th>no Of 5 </th><th>no Of 6 </th><th>no Of 7 </th><th>no Of 8 </th><th>no Of 9 </th><th>no Of 10 </th></tr>";
					 $query="select $cols from t104_".$property_decode['view_from_database']['value']." where c7='$id' and c15='$sub_id'";
					if($result=mysqli_query($con,$query))
					{
						if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_row($result)) 
							{
								
								foreach($row as $key=>$field) {
								
									 $values_cols[$key][$field]++;
									
								}
							}
						}
						
						$i=1;
						foreach($values_cols as $key=>$columns)
						{
							
							echo"<tr><td>$array_cols[$i]</td>";
								$i++;
								for($y=1;$y<11;$y++)
									echo "<td>$columns[$y]</td>";
								echo "</tr>";
						
						}
						echo "</table>";
					}
				}
			}
		}
		
		//print_r($values_cols);
			
			
				
			
			
			
			
				echo "<div align='center' id='print'>
					<button class='btn btn-default' onclick='print()'>print</button>
					</div></div>";
	
}
else{

	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
}
	
	



?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>


<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>