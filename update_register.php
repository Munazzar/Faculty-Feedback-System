<?php
error_reporting(0);
$text=$_REQUEST['text'];
 $link=$_REQUEST['link'];
$table=$_REQUEST['table'];
include_once("database_connect.php");
//reading property file
include_once("property_read.php");


 $now_time = DateTime::createFromFormat('U.u',microtime(true));
	 $date_time=(string)$now_time->format("d/m/Y-H:i:s");
	  $text=$text."c23='".$date_time."'";
 $query="update $table set $text where 1=1".$link;
if($result=mysqli_query($con,$query))
{
	echo "<b>Checking Data</b>";
	
	$str=strpos($link,"'",0);
	 $name=substr($link,$str+1,strpos($link,"'",$str+1));
	$name=substr($name,0,-1);
	echo '<meta http-equiv="refresh" content="1;url=log.php?name='.$name.'">';
}
else
{
		echo "<b>Error Updating record</b>";
}
?>
<!--