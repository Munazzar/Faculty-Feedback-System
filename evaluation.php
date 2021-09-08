<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>


<?php
session_start();
require_once("database_connect.php");
require_once("property_read.php");
if(isset($_SESSION["name"])){
	 echo $_SESSION['name'];
	
	
	
	
}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an Admin<a href='admin.html'>click here</a></h2></div>";
}
?>