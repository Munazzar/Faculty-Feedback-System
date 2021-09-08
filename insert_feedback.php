<?php
require_once("database_connect.php");
require_once("property_read.php");
$text=$_GET['text'];
echo "<br>";
$name=$_GET['name'];
$id=$_GET['id'];
 $year=$_GET['year'];
 $query="select * from t104_".$property_decode['current_database']['value']." where c29='$id'";
 
 if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
				
					if(in_array($key,array("c29")))
					{
						if($field!=null)
						{
							
									$desc=":,gave feedback and data got inserted into DB.";
								$query_log='no query';
								require('logging.php');
									
								
							
							header("Location: thankyou.html");
							die();
						}
							
					}
				}
			}
		}
	}
 
 
 
 $query="update t101 set c4='1' where c29='$id'";
if(mysqli_query($con,$query))
	echo "Loading, Please wait..";
else
	echo mysqli_error();
echo "<br>";
$query='';
$fid='';
$value='';
$columns=$property_decode['t104']['insert_feedback'];
$val=explode(";",$text);
		foreach($val as $num=>$ue)
		{
			//echo "$num=$ue<br>";
			if($ue!="")
			{
			$query="insert into t104_".$property_decode['current_database']['value']."($columns)values('$id',";	
				$col=explode(',',$ue);
				foreach($col as $num=>$cols)
				{
					//echo $num.":";
			
					$value.="'".$cols."',";
				}
				$now = DateTime::createFromFormat('U.u',microtime(true));
				$time=(string)$now->format("Y-m-d/H:i:s");
				$value.="'".$time."','$year')";
				$query.=$value;
				if(mysqli_query($con,$query))
				{
				 //echo $query."<br>";
				 echo '<meta http-equiv="refresh" content="2;url=thankyou.html">';
				}
				else
					echo "error";
				$value='';
			}
		
			
		}
?>
