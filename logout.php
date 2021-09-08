<?php
error_reporting(0);
session_start();
if(isset($_SESSION['admin']))
{
$desc=":,loggout out.";
$query_log='no query';
require('logging.php');
}
else if(isset($_SESSION['sub-admin']))
{
	$desc=":,loggout out.";
$query_log='no query';
require('logging.php');
}
else if(isset($_SESSION['faculty']))
{
	$desc=":,loggout out.";
$query_log='no query';
require('logging.php');
	
}
else if(isset($_SESSION['name']))
{
	$desc=":,loggout out.";
$query_log='no query';
require('logging.php');
	
}

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

?>
<meta http-equiv="refresh" content="0;url=index.php">