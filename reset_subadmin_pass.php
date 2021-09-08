<?php
session_start();
//print_r($_SESSION);
if(isset($_SESSION['sub-admin']))
{
?>
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
 <script src="js/check.js" type='text/javascript'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/faculty_update.css">
<meta charset="UTF-8">




<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<div>
<body>
<div id='logo' align='center' >
<img src='images/vjitlogo.png' width='75px' height='70px' >
</div>
<!-- multistep form -->

<form id="msform"  method='POST' action='reset_subadmin_pass.php'>
  <!-- progressbar -->

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Reset Sub Admin Password</h2>
	
  

    <h6 class="fs-subtitle">All fields are mandatory</h6>
	
	<input type="text" name="id" id="id" placeholder="Sub Admin ID" required autofocus  onblur=''/>

	
	
	<input type="password" name="opass" id="opass" placeholder="Old Password" required />
    <input type="password" name="pass" id="pass" placeholder="New Password" required />
	
	
	
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" min="5" required />
	
	
	
	
	
	
	
    <input type="submit"  class="next action-button" value="Update" name='msform'  >

	    <a href='sub-admin-index.php'><input type="button"  class="next cancel-button" value="Cancel" name='msform'  >	</a>
	<?php 
	require_once("property_read.php");
	if(isset($_POST['pass']))
	{
		$counter=0;
		if(isset($_SESSION['change_counter']))
		{
			
		}
		else
		{
			$_SESSION['change_counter']=5;
		}
		
			$counter=$_SESSION['change_counter'];
		$mail=$_POST['id'];
		if($counter==1)
			include_once('logout.php');
		if($mail!=$property_decode['admin']['id2'][0])
		{
			$counter--;
			$_SESSION['change_counter']=$counter;
			echo "<br><span style='color:red;'>Enter Correct Sub-Admin ID, $counter chances left</span>";
			 $desc=": tried changing sub-admin password with incorrect user id as '$mail'";
	 //$query_log="(".$query.")";
require_once('logging_sub_admin.php');
			
		}
		else{
			$opass1=$_POST['opass'];
			$opass=md5($_POST['opass']);
			
			if($opass!=$property_decode['admin']['pass2'][0])
			{
				$counter--;
				$_SESSION['change_counter']=$counter;
				echo "<br><span style='color:red;'>Old password is incorrect, $counter chances left</span>";
				 $desc=": tried changing sub-admin password with incorrect old password as '$opass1'";
	 //$query_log="(".$query.")";
require_once('logging_sub_admin.php');
			}
			else
			{
			$pass=$_POST['pass'];
			$cpass=$_POST['cpass'];
			if($pass!=$cpass)
			{
				
				echo "<br><span style='color:red;'>comfirm password does not match</span>";
			}
			else{
				$pass=md5($pass);
				echo "<br><span style='color:red;'>Updating....</span>";
			
				
				$property_decode['admin']['pass2'][0]=$pass;
				$newJsonString = json_encode($property_decode);
				file_put_contents('attribute.json', $newJsonString);
				 $desc=": changed sub-admin password with correct user id and correct old password";
	 //$query_log="(".$query.")";
require_once('logging_sub_admin.php');
				
				echo '<meta http-equiv="refresh" content="1;url=logout.php">';
				
				
			}
			}
		}
		
		
	}
	
	?> 
	
  </fieldset>

</form>
</div>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>
</body>





<?php




}
else
	echo "<h3>You are not authorised to access this page</h3>";
?>