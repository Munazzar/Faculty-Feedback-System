<?Php
require_once('database_connect.php');

if(isset($_GET['text']))
{
	
	 $text=$_GET['text'];
	 $pass=$_GET['pass'];
	$pass=md5($pass);
	if(empty($text))
	{
		$text.="c41='$pass'";
	}
	else
		
		$text.=",c41='$pass'";
	$fid=$_GET['college_id'];
	$sql_array=['select','drop','*','alter','truncate','1=1','insert','values','create','show',';','update','desc'];
	$check=0;
	foreach($sql_array as $value)
	{
	if(strpos($text, $value) !== false)	
		$check=1;
	}
	if($check==0)
	{
		
		$text.=",c4='1'";
	$query="update t102 set $text where c55='$fid'";
	

	
	if($result=mysqli_query($con,$query))
	{
		
		$desc=";upated their data";
		///logging
		require_once('logging.php');
		
		echo "<b>Updating, Please Wait!!</b>";
		header("Location: ./admin.php");
	
	}
	else
	{
			echo "<b>Error Updating record, Please go back and fill details again, Thank You.</b>";
	}
	}
	else{
		echo "<div align='center'><h3>you tried messing up but, SORRY ; ) </h3></div>";
		echo '<meta http-equiv="refresh" content="5;url=logout.php">';
	}

}
