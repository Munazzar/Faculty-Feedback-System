<?php
ini_set('max_execution_time', 900);

require_once('database_connect.php');
session_start();
if(isset($_SESSION["sub-admin"])){
$flag=0;
//updating year
$query="select c29,c25 from t101";
if($result=mysqli_query($con,$query))
{
	if(($rows=mysqli_num_rows($result))>0)
			{
				$id='';
				$year='';
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $key=>$value)
					if($key==0)
						$id=$value;
					else if($key==1)
					{
						
						$year=++$value;
						//echo substr($year,-1);
						if(substr($year,-1)<7)
						{
						$query="update t101 set c25='$year' where c29='$id'";
						if(mysqli_query($con,$query))
						{
							$flag=1;
							//echo "<br>all year data updated<br>";
							//echo $query;
						}
						else
							echo "Error ".mysqli_error();
						
						}
					}
				
				}
				
				
				
			}

	
}

if($flag==1)
{
	echo "all students year incremented";
	
	//logging
 $desc=":all student years incremented";
 require_once('logging_sub_admin.php');
}
else
{
	echo "error";
	//logging
 $desc=":tried incrementing year of all students but some error occured ";
 require_once('logging_sub_admin.php');
}
}
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>