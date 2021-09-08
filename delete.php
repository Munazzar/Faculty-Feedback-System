<?php
$table=$_REQUEST["table"];
$link=$_REQUEST["link"];
include_once("database_connect.php");
echo $query="delete from $table where $link";
if($result=mysqli_query($con,$query))
{
	echo "<b>Record Deleted SuccessFully</b>";
	
}
else
{
		echo "<b>Error Deleting record</b>";
}
?>