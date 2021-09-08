<?php
require_once('property_read.php');
$value=$property_decode['checked']['value'];
if($value=='true')
{
	?>
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
 <script src="js/check.js" type='text/javascript'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/register.css">
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<div>
<div id='logo' align='center' style='margin-left:80px'>
<img src='images/vjitlogo.png' width='75px' height='70px' >
</div>
<!-- multistep form -->

<form id="msform" name="registration">
  <!-- progressbar -->

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your Password</h2>
	
    <h3 class="fs-subtitle" style='font-size:15px'>*Choose your Date of Birth from drop down menu as per SSC(mm/dd/yyyy)</h3>
	<h1 class="fs-subtitle">*All fields are mandatory </h1>
    <span id="c1_span" style="display:none;color:red;text-size:1px">Enter Your Roll Number</span>
	<h3>Enter H.T.No</h3>
	<input type="text" name="t101" id="c1" placeholder="Roll Number" required autofocus onblur="checkId()"/>
	<h3>Enter Date Of Birth</h3>
	<span id="c2_span" style="display:none;color:red;text-size:1px">Enter Date Of Birth</span>
	
	<input type="date" id="c2" name='t101' placeholder="Enter Date(MM/dd/yyyy)"  required >
	<h3>Enter Password</h3>
	
	<span id="c3_span" style="display:none;color:red;text-size:1px">Enter password </span>
	
    <input type="password" name="t101" id="c3" placeholder="Password" required />
	
	<span id="cpass_span" style="display:none;color:red;">password doesnot match</span>
	
	<span id="cpass2_span" style="display:none;color:red;">Enter Confirm Password</span>
	<h3>Confirm Password</h3>
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" min="5" required />
	
    <input type="button" name="t101" class="next action-button" value="Register" min="5"  required onclick="myFunction('msform',this.name)"/>
	
	<span id="check_span" style="display:none;color:red;">Please Fill data Correctly</span>
  </fieldset>

</form>
</div>

<div align='center' style='position:fixed;bottom: 0;right: 0;' class='footer'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>


<?php
}
else
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
?>