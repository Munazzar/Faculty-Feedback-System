<?php

require_once("property_read.php");
require_once("database_connect.php");
require_once("code.php");
print_r($_SESSION);
echo "
<div align='center'><h2>SELECT TABLE</h2>
<div class='manage_database_div'>
	<form id='table_select' action='print_tables.php' method='POST'>
		<table class='table'>
		<tr><th>Table Name </th><th>Choose One</th></tr>
		<tr><td>".$property_decode['t101']['name']."</td>
		<td><input type='radio' value='t101' name='table' ></td></tr>
		
		<tr><td>".$property_decode['t102']['name']."</td>
		<td><input type='radio' value='t102' name='table' ></td></tr>
		<tr>
		
		<tr><td>".$property_decode['t103']['name']."</td>
		<td><input type='radio' value='t103_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		
		<tr><td>".$property_decode['t105']['name']."</td>
		<td><input type='radio' value='t105' name='table' ></td></tr>
		<tr>
		
			<tr><td>".$property_decode['t106']['name']."</td>
		<td><input type='radio' value='t106_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
			<tr><td>".$property_decode['t107']['name']."</td>
		<td><input type='radio' value='t107_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
			<tr><td>".$property_decode['t108']['name']."</td>
		<td><input type='radio' value='t108_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		
		<tr><td>".$property_decode['t109']['name']."</td>
		<td><input type='radio' value='t109_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		<tr><td>".$property_decode['t110']['name']."</td>
		<td><input type='radio' value='t110_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		<tr><td>".$property_decode['t111']['name']."</td>
		<td><input type='radio' value='t111_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		
		<tr><td>".$property_decode['t112']['name']."</td>
		<td><input type='radio' value='t112_".$property_decode['current_database']['value']."' name='table' ></td></tr>
		
		<tr><td>".$property_decode['t113']['name']."</td>
		<td><input type='radio' value='t113' name='table' ></td></tr>
		
		<tr><td><input type='submit' value='Get Data' title='year_select' class='btn btn-success'></td>
			<td><button value='clear' onclick='clear(this.title)' title='year_select' class='btn btn-default'>clear</button></td>
			<td><a href='faculty-aut.php'><input type='button' class='btn btn-basic' value='Home'></a></td>
		</tr>
		</table>
	</form>
	</div>
</div>

<hr>";

if(isset($_POST["table"]))
{
	
	
	 $table=$_POST['table'];
	 
	  //logging
	// $desc=":viewed  complete data of $table table and may also have printed,";
	 //$query_log="(".$query.")";
//require_once('logging_sub_admin.php');
////
echo "<h2>".$property_decode[$table]['name']."</h2>";
	 $query="select * from $table";
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
						echo "<td>".$value."</td>";
					
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
							
							while ($row = mysqli_fetch_row($result)) 
							{
								echo "<tr>";
								foreach($row as $key=>$value)
								{
									echo "<td>$value</td>";
									
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




?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>


<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>



