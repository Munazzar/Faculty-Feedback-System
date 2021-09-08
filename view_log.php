<?php
error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){

require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");


////
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>	
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
		  <link rel="stylesheet" href="css/style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type='text/javascript' src='js/no_back.js'>

</script>
		<script type='text/javascript' src='js/check_size.js'>
		</script>
		<style>
		.size_px{
			font-size:25px;
		}
		</style>
		<style>
th{
	position: sticky;
  top: 0;
  padding:5px;
  background:#e5e5e5;
}
</style>
		
		<div align='center'><h2>LOG TABLE</h2>
		<p>choose from and to date </p>
<div class='manage_database_div'>
	<form id='date_select' action='view_log.php' method='post'>
		<table class='table'>
		<tr><th class="size_px" >Select from Date</th><th><input type="date" id="from_date" name="from_date" class="form-control" required ></th>
		<th><input type="submit" value="Submit" class="btn btn-success"></th>
		<th><a href='manage_database.php'><input type="button" value="Back" class="btn btn-primary"></a></th>
		
		</tr>
		</table>
		</form>
		</div>
		</div>
		
		
		
		
	<?php	
	
	
	if(isset($_POST['from_date'])){
		
		$from_date=$_POST['from_date'];
	
		$date_given=$from_date;
		$from_date=str_replace("-","",$from_date);
		
		 $desc=":Viewed Log table from date $date_given ";
	// $query_log="(".$query.")";
require_once('logging_sub_admin.php');
////
		//echo "From date:$from_date and to date:$to_date";
		
		$query="select c45,c46,c48,c49 from t113 where c45>='$from_date'";
		echo "<div id='result_box'>
	<table class='table table-hover' id='table'>
	<tr>
	";
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_field($result)) 
					{
						
						
						$value=$row->name;
						$value=$array_names[$value];
						echo "<th>".$value."</th>";
					
					}
				}
				else
					echo "<h3 align='center'>Table is Empty</h3>";
	}
	else
		echo "error:".mysql_error();
	echo "</tr>";
	
		if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_assoc($result)) 
							{
								echo "<tr>";
								foreach($row as $key=>$value)
								{
									
									if($key=='c45')
									{
											$date_value=substr($value,0,4);
											$date_value.="-".substr($value,4,2);
											$date_value.="-".substr($value,6,2);
											$date_value.="/".substr($value,8,2);
											$date_value.=":".substr($value,10,2);
											$date_value.=":".substr($value,12,2);
											echo "<td>$date_value</td>";
									}	
									else{
									
									echo "<td>$value</td>";
									}
									
								}
								echo "</tr>";
								
							}
						}
			}
			echo "</table></div>";
	
		
		
		
	
		
		
		
		
		
		
				echo "<div align='center' id='print'>
					<button class='btn btn-default' onclick='print()'>print</button>
					</div>";
		
		
		
	}
	
}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>

<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>
<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>