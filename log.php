<?php
ob_start();
session_start();
//error_reporting(0);

$name=$_REQUEST['name'];
require_once("database_connect.php");


$query="select c25,c15,c29 from t101 where 1=1 and c1='".$name."'";
$_SESSION["name"]=$name;
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
					if(in_array($key,array("c25")))
					{
					$_SESSION["c25"]=$field;
					}
					else if(in_array($key,array("c15")))
					{
						$_SESSION["c15"]=$field;
					}
					else if(in_array($key,array("c29")))
					{
						$_SESSION["c29"]=$field;
					}
				}
			}
		}
	}



	$desc=":logged in to give feedback";
	require_once("logging.php");
	
	//print_r($_SESSION);


		header("Location: instructions.php");
		exit;
//echo $_SESSION['name'];
//echo $_SESSION['c15'];
//echo $_SESSION['c25'];


?>