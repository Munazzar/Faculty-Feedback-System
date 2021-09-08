<?php
ob_start();
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>


<?php
//error_reporting(0);
session_start();

unset($session_variable);
	// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

require_once("property_read.php");
require_once("database_connect.php");

if(isset($_POST['id'])&&isset($_POST['pass']))
{
	$verify=0;
	 $id=$_POST['id'];
	 $pass=md5($_POST['pass']);
		$query="select * from t102 where c42='$id' and c41='$pass'";
	if($result=mysqli_query($con,$query))
	{
		
		if(($rows=mysqli_num_rows($result))>0)
		{
			session_start();
			$_SESSION["faculty"]=$id;
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
				
					if(in_array($key,array("c13")))
					{
						$_SESSION["branch"]=$field;
					}
					else if(in_array($key,array("c7")))
					{
						$_SESSION["faculty_id"]=$field;
						
					}
					else if(in_array($key,array("c6")))
					{
						$_SESSION["faculty_name"]=$field;
						
					}
					else if(in_array($key,array("c40")))
					{
						$_SESSION["position"]=$field;
						
					}
					else if(in_array($key,array("c4")))
					{
						
						$verify=$field;
					}
				}	
					
			}
			if($verify==1)
			{
			/////logging
				$desc=", Logged in as faculty";
				$query_log="(".$query.")";
				require_once('logging.php');
				
				///////
				header("Location: ./faculty-index.php");
			}
			else
			{
				////logging
				$desc=", updating data";
				$query_log='no query';
				require_once('logging.php');
				
				
				//////////
				header("Location: ./faculty-update.php");
			}
		}
		else if($id==$property_decode['admin']['id1'][0] && $pass==$property_decode['admin']['pass1'][0])
	{
		
		session_start();
		$_SESSION["admin"]=$id;
		//header("Location: ./read.php?table=t104&name=60");
		echo "hello from admin";
		////logging
	$desc=":, Logged in as main-admin";
	$query_log='no query';
		require_once('logging.php');		
		//////////
		header("Location: ./admin-index.php");
	}
	else if($id==$property_decode['admin']['id2'][0] && $pass==$property_decode['admin']['pass2'][0])
	{
		
		
		session_start();
		
		$_SESSION["sub-admin"]=$id;
		//header("Location: ./read.php?table=t104&name=60");
		
		//////logging
											$desc=":, logged in as sub admin";
											$query_log='no query';
										require_once('logging.php');
										
		
		
		
		
		header("Location: sub-admin-index.php",true);
		
		//echo "<script>window.top.location='http://vjitfeedback.com/sub-admin-index.php'</script>";
		echo "hello from subadmin";
		
	}
		
		
	
	else
	{
		echo "<span style='color:red;text-align:center'>Enter Correct Details</span>";
		
	}
	}
	else if($id==$property_decode['admin']['id1'][0] && $pass==$property_decode['admin']['pass1'][0])
	{
		
		session_start();
		$_SESSION["admin"]=$id;
		//header("Location: ./read.php?table=t104&name=60");
		
		////logging
	$desc=":, Logged in as main-admin";
	$query_log='no query';
		require_once('logging.php');		
		//////////
		header("Location: ./admin-index.php");
	}
	else if($id==$property_decode['admin']['id2'][0] && $pass==$property_decode['admin']['pass2'][0])
	{
		session_start();
		$_SESSION["sub-admin"]=$id;
		//header("Location: ./read.php?table=t104&name=60");
		
		//////logging
											$desc=":, logged in as sub admin";
											$query_log='no query';
										require_once('logging.php');
										
										//////////
		
		
		
		
		header("Location: ./sub-admin-index.php");
		
	}
		
}

?>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
 
 <meta charset="UTF-8">

<link rel="stylesheet" href="css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div>
<div id='logo' align='center'>
<img src='images/vjitlogo.png' width='75px' height='70px' >
</div>
<!-- multistep form -->

<form id="msform" action='admin.php' method='POST'>
  <!-- progressbar -->

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">STAFF LOGIN</h2>
    <h3 class="fs-subtitle"></h3>
	
    <input type="text" id="c1" name='id' placeholder="ID" autofocus required />

	
    <input type="password" id="c3" name='pass' placeholder="PASSWORD" required />
    <input type="submit" name="t101" class="next action-button" value="LogIn" />
	<a href="faculty_password_reset.php"><span id="check_span" style="display:block;color:red;text-size:1px" title='Only for Faculty use'>Forget Password?</span></a>
  </fieldset>

</form>

</div>

<div align='center' style='position:fixed;bottom: 0;right: 0;' class='footer'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>