<?php
//error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){

require_once("database_connect.php");
require_once("property_read.php");


$text=$_REQUEST['text'];
$pass=$_REQUEST['pass'];
if(md5($pass)==$property_decode['admin']['pass2'][0])
{
	
	//logging
	 $desc=":Entered correct password to delete database hence $text database deleted ,";
	 $query_log="(".$query.")";
require_once('logging_sub_admin.php');
////
	$last='';
	$flag=0;
	$count=0;
	foreach($property_decode['database'] as $key=>$value)
	{
		
		
		
			if($value[0]==$text)
			{
				$sub_last_year=substr($text,strpos($text,',')+1);
					if($sub_last_year=='SemI')
					{
						echo "please remember to decrement year of students as we have incremented while creating the database which you recently deleted";
						
					}
				$count=$key;
				$flag=1;
				unset($property_decode['database'][$key]);
				$table_array= array('t103_','t104_','t106_','t107_','t108_','t109_','t110_','t111_','t112_','t114_');
				foreach($table_array as $key1=>$value1)
				{
				$query="drop table $value1$text";
				mysqli_query($con,$query);
				
				}
				
			}
			else
			{
				$last=$value;
			}
	}
	if($flag==1)
	{
		$property_decode['view_from_database']['value']=$last[0];
		$property_decode['current_database']['value']=$last[0];
		$newJsonString = json_encode($property_decode);
				file_put_contents('attribute.json', $newJsonString);
	}

	//print_r($property_decode[$database]);
	
}
else
{
	
	//logging
	 $desc=":Tried deleting $text database but gave wrong passowrd as $pass hence database did not deleted";
	// $query_log="(".$query.")";
require_once('logging_sub_admin.php');
////
	echo '0';
	
}
}
else
	{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>