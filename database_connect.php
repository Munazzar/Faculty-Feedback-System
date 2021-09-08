<?php

$host="localhost:3306";
$user="root";
$pwd="";
$db="feedback";
$con=mysqli_connect($host,$user,$pwd,$db);
if(mysqli_connect_errno())
{
		echo "failed to connect to data base".mysqli_connect_error();
}

?>