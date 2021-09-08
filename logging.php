<?php
require_once('database_connect.php');
require_once('property_read.php');
require_once('ipaddress_browser_details.php');

//////logging

$id='';
$user_id='';
if(isset($_SESSION['faculty_id']))
{
	$id=$SESSION['faculty_id'].":".$_SESSION['faculty_name'];
	$user_id=$SESSION['faculty_id'];
}
else if(isset($_SESSION['name']))
{
	$id=$_SESSION['name'];
	$user_id=$_SESSION['name'];
	
}
else if(isset($_SESSION['admin']))
{
	$id=$_SESSION['admin'];
	$user_id=$_SESSION['admin'];
	
}
else if(isset($_SESSION['sub-admin']))
{
$id=$_SESSION['sub-admin'];
	$user_id=$_SESSION['sub-admin'];
}	

	$log_desc=$id.$desc.' from '.$property_decode['view_from_database']['value'].' Database';


$log_query="insert into t113(c45,c46,c48,c49) values('$logid','$log_desc','$ip_address','$user_id')";
mysqli_query($con,$log_query);

//////////


?>