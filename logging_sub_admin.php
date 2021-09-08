<?php
require_once('database_connect.php');
require_once('property_read.php');
error_reporting(0);

//////logging
//getting ip address
	$ip_address='';
	$remote_addr=$_SERVER['REMOTE_ADDR'];
	$ip_address=$remote_addr;
	date_default_timezone_set('Asia/Kolkata');
	$logid=(string)date('YmdHis');
$id='';
$user_id='';
if(isset($_SESSION['faculty_id']))//checking for faculty login
{
	$id=$SESSION['faculty_id'].":".$_SESSION['faculty_name'];
	$user_id=$SESSION['faculty_id'];
}
else if(isset($_SESSION['name']))// checking for student login
{
	$id=$_SESSION['name'];
	$user_id=$_SESSION['name'];
	
}
else if(isset($_SESSION['admin']))//checking for the admin login
{
	$id=$_SESSION['admin'];
	$user_id=$_SESSION['admin'];
	
}
else if(isset($_SESSION['sub-admin']))//checking for the sub admin login
{
	$id=$_SESSION['sub-admin'];
	$user_id=$_SESSION['sub-admin'];
}
	$log_desc=$id.$desc.' from '.$property_decode['current_database']['value'].' Database';
	
	$log_query='insert into t113(c45,c46,c48,c49) values("'.$logid.'","'.$log_desc.'","'.$ip_address.'","'.$user_id.'")';
if(mysqli_query($con,$log_query))
{
	
}
else
	echo "error".mysqli_errno();

//////////


?>