
	<div align='center' style='margin-top:25px;'>
	<h1>Convert anything to encoded format</h1>
	<form method='POST' action='pass.php'>
	<input type='text' name='password'>
	<INPUT type='submit'>
	</form>
	</div>
	<br><br>
	
		<?php
	require_once('property_read.php');
	
	if(isset($_POST["password"]))
	{
		echo md5($_POST['password']);
		
		
	}

	?>