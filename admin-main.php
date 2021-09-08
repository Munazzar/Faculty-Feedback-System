<?php
ob_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
		<title>VJIT FEEDBACK</title>
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

<?php

error_reporting(0);
session_start();
if(isset($_SESSION["ADMIN"]))
{

	
		require_once("database_connect.php");
		require_once("property_read.php");
		require_once("code.php");
		$id='';
		$name='';
		$subject_fid;
		$array_cols;
		$cols=$property_decode['t104']['admin-main'];
		$columns=$property_decode['t104']['final-admin'];
		$i=0;
			
			echo "<div align='center' class='noprint'><h3> Faculty Feedback Data</h3><p>click on the Faculty Name to Get Complete Details</p></div>";
			echo "<div align='center' id='result_box'><table class='table table-hover' id='table' style='text-align:center'><thead id='myHeader'><tr><th>Faculty Name</th>";
			foreach($cols as $columns_insert=>$value)
			{
				if($value=="c34")continue;
				echo "<th>".$array_names[trim($value)]."</th>";
			
			}
			
		foreach($cols as $key=>$value)
		{
			$array_cols[$value]=0;
			
		}
		
			echo "<th>Average</th></tr></thead>";
			$query2="select $columns from t114_".$property_decode['view_from_database']['value'];
			//logging
			$desc=":,viewd faculty feedback data";
			
			require_once('logging.php');
			
			//////
			if($result2=mysqli_query($con,$query2))
			{
				if(($rows2=mysqli_num_rows($result2))>0)
				{
					//echo "rows='$rows2'<br>";
					
					while ($row2 = mysqli_fetch_assoc($result2)) 
					{
						foreach ($row2 as $key2=>$pr)
						{
							
						if($key2=='c7')
						{
							$name=array_search($pr,$faculty_code);
							echo"<tr><td><a href='admin-faculty-details.php?id=".$pr."&name=$name' id='$pr' title='$pr' value='60' name='t104'>$name</td>";
						}
						else if($key2=='c15')
						{
						if(array_search(trim($pr),$regular_subject_code)!=null)
							echo "<td>".array_search(trim($pr),$regular_subject_code)."</td>";
						else if(array_search(trim($pr),$oe_subject_code)!=null)
							echo "<td>".array_search(trim($pr),$oe_subject_code)."</td>";
						else if(array_search(trim($pr),$pe_subject_code)!=null)
							echo "<td>".array_search(trim($pr),$pe_subject_code)."</td>";
						else if(array_search(trim($pr),$batch_lab_subject_code)!=null)
							echo "<td>".array_search(trim($pr),$batch_lab_subject_code)."</td>";
						// calculating average here
						}
						else
							echo "<td>$pr</td>";
						
						
						}
						echo "</tr>";
					}
					
				}
			}
			
	
			echo "</table></div>";
			echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='window.print()'>print</button>
				</div>";
	
}
else{

	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
}
	
	

//echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an Admin <a href='admin.php'>click here</a></h2></div></div>";


?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>
