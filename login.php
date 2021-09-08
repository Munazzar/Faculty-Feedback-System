



<?php
session_start();

unset($session_variable);
	// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
require_once('property_read.php');
$value=$property_decode['checked']['value'];
if($value=='true')
{

?>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
 <script src="js/check.js" type='text/javascript'></script>	
 <meta charset="UTF-8">
<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<link rel="stylesheet" href="css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div>
<div id='logo' align='center'>
<img src='images/vjitlogo.png' width='75px' height='70px' >
</div>
<!-- multistep form -->

<form id="msform">
  <!-- progressbar -->

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">LOGIN</h2>
    <h3 class="fs-subtitle">*Remember this is annonymous feed back system College ID is for Verification Purpose</h3>
	<span style="display:none;color:red;text-size:1px">*Enter Roll Number</span>
    <input type="text" id="c1" name='t101' placeholder="Roll Number" autofocus />

	<span style="display:none;color:red;text-size:1px">*Enter password </span>
    <input type="password" id="c3" name='t101' placeholder="Password" />
    <input type="button" name="t101" class="next action-button" value="Give Feedback" onclick="checkLogin('msform',this.name)"/>
	<span id="check_span" style="display:none;color:red;text-size:1px">*Enter Details</span>
  </fieldset>

</form>
</div>

<div align='center' style='position:fixed;bottom: 10px;right: 0;' class='footer'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>
<?php
}
else
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
?>