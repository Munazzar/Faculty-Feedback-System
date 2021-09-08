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
		
		<script type='text/javascript' src='js/check_size.js'>
		</script>
		
		
		
		
		<div align='center' class='manage_database_div' id='result_box'><h2>CHECK LIST</h2>
		
		
		<p>Please Don't lose me, Maintain me to avoid mistakes</p>
		
		<table class="table table-hover" id='table'>
  <tr>
    <th>File Tables</th>
    <th>CSE</th>
    <th>MECH</th>
	<th>EEE</th>
	<th>ECE</th>
	<th>  IT </th>
	<th>CIVIL</th>
	<th>MBA</th>
	<th>I<SUP>st</SUP> YEAR</th>
  </tr>

  
  <tr>
    <td>OE Student List Table</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>NA</td>
    
  </tr>
  
  <tr>
    <td>PE Student List Table</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>NA</td>
    
  </tr>
  
  <tr>
    <td>BATCH-LAB Student List Table</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
    
  </tr>
  
  <tr>
    <td>Faculty Assignment Table</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
    
  </tr>
  <tr>
  <td>1A</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
    <tr>
  <td>1B</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>1C</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>1D</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
   <tr>
  <td>2A</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
    <tr>
  <td>2B</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>2C</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>2D</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
   <tr>
  <td>3A</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
    <tr>
  <td>3B</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>3C</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>3D</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
  
   <tr>
  <td>4A</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
    <tr>
  <td>4B</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>4C</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
    <tr>
  <td>4D</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  
  </tr>
  
</table>
</div>
			<div align='center' id='print'>
				<button class='btn btn-default' onclick='print()'>print</button>
				</div>
		
		<?php
}
		else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>

<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>