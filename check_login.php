<?php
error_reporting(0);
//echo "ur in search_fields";
 $text=$_REQUEST['text'];
 $table=$_REQUEST['table'];
include_once("database_connect.php");//data bse connectivity
$link="";
//reading property file
include_once("property_read.php");

$query="select * from $table where 1=1".$text;

if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
				
					if(in_array($key,array("c3")))
					{
						if($field==null)
							echo "1";
						else
							echo "2";
					}
					if(in_array($key,array("c4")))
					{
						if($fields==1)
							echo "You Are Already Logged In";
						
					}
				}	
					
			}
			
		}
		else 
			echo "Match Not Found";
	}
?>