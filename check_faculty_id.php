<?php
session_start();
require_once('database_connect.php');
if(isset($_SESSION['faculty']))
{
	$fid=$_SESSION['faculty_id'];
	$id=$_REQUEST['id'];
	$query="select c55 from t102 where c7='$fid'";
	if($result=mysqli_query($con,$query))
	{
		while($row=mysqli_fetch_assoc($result))
		{
			foreach($row as $key=>$value)
			{
			if($value==$id)
				echo "matched";
			else
				echo "notmatched";
			}
		}
		
	}
	
	
}


?>