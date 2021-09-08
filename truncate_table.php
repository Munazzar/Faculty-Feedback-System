<?php
require_once('database_connect.php');
require_once('property_read.php');

$table_name=$_REQUEST['table'];
echo $query="truncate ".$table_name."_".$property_decode['current_database']['value'];



if($result=mysqli_query($con,$query))
{	
echo "table $table_name".$property_decode['current_database']['value']." Truncated";
}	
else
	echo("Error description: " . mysqli_error($con));

//logging
 $desc=":$table_name table truncated";
 require_once('logging_sub_admin.php');
?>