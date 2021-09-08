<?php
session_start();
if(isset($_SESSION['faculty']))
{
?>
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
 <script src="js/check.js" type='text/javascript'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/faculty_update.css">
<meta charset="UTF-8">

<script type='text/javascript'>
function faculty_update(form_id)
{
	var college_id;
	var val_ue;
	var obj;
	 var i;
 var check=0;
	var form_id=document.getElementById(form_id);
 var no_of_element = form_id.elements.length-1;

 var id_value='';
 	for(i=1;i<no_of_element;i++)
    {
		
    var field_id = form_id.elements[i].id;
    var value=form_id.elements[i].value;
	var tagName= form_id.elements[i].tagName;
	var type=form_id.elements[i].type;
	//alert(value);
	if(value=="")
	{
		check=1;
		id_value=field_id;
		break;
	}
	}
	if(check==1)
	{
		document.getElementById('check_span').style.display='block';
		document.getElementById(id_value).focus();
		window.exit();
		
	}
	else{
		document.getElementById('check_span').style.display='none';
		college_id=document.getElementById('id').value;
		
	}
	
	//alert(college_id);
	//alert(id);
	
				if(window.XMLHttpRequest)
				{
					obj=new XMLHttpRequest();
				}
				else
				{
					obj=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj.open("POST","check_faculty_id.php?id="+college_id,true);
				obj.send();
				obj.onreadystatechange=function()
				{
				if(obj.readyState==4 && obj.status==200)
				{
					
					val_ue=obj.responseText;
				//alert(val);
				
			
				
				
				//alert(val_ue);
			if(val_ue=='notmatched')
			{
				alert('Please Enter Correct ID');
				document.getElementById('id').focus();
			}
			else{
				pass=document.getElementById('pass').value;
				cpass=document.getElementById('cpass').value;
				if(pass!=cpass)
				{
					alert("password Does not match");
					document.getElementById('cpass').focus();
				}
				else{
					var $text='';
					
					phone=document.getElementById('phone').value;
					$text+="c50='"+phone+"',";
					exp=document.getElementById('exp').value;
					$text+="c51='"+exp+"',";
					sublist=document.getElementById('sublist').value;
					$text+="c52='"+sublist+"',";
					favsub=document.getElementById('favsub').value;
					$text+="c53='"+favsub+"',";
					res=document.getElementById('res').value;
					$text+="c54='"+res+"'";
					
				
				
								window.location.href = "faculty_data_update.php?text="+$text+"&pass="+pass+"&college_id="+college_id;
				
					}
			
			
			
			
	
	
				}
				}
				}

}

</script>
<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
<div>
<body>
<div id='logo' align='center' >
<img src='images/vjitlogo.png' width='75px' height='70px' >
</div>
<!-- multistep form -->

<form id="msform"  >
  <!-- progressbar -->

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your Profile</h2>
	
    <h3 class="fs-subtitle" style='font-size:15px'>This is just the one time process</h3>

    <h6 class="fs-subtitle">All fields are mandatory</h6>
	<h4>Enter Your College Id</h4>
	<input type="text" name="id" id="id" placeholder="College Id" required autofocus  onblur=''/>
	<h4>Enter Password</h4>
	
	
	
    <input type="password" name="pass" id="pass" placeholder="Password" required />
	
	
	<h4>Confirm Password</h4>
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" min="5" required />
	
	
	<h4>Enter Phone Number</h4>
	
	
	
    <input type="text" name="phone" id="phone" placeholder="Phone No" 	
	onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" maxlength="10"	required />
	
	<h4>Experience in Years</h4>
    <input type="number" name="exp" id="exp" placeholder="Experience" required  min='0'/>
	
	<h4>Subjects Taught so far</h4>
    <input type="text" name="sublist" id="sublist" placeholder="Subjects List" title='Please Mention Short hand of subjects' required required/>
	
	<h4>Favourite Subject</h4>
    <input type="text" name="favsub" id="favsub" placeholder="Favourite subject" title='Please Mention Short hand of subject' required />
	
	<h4>Research Area of Interest</h4>
    <input type="text" name="res" id="res" placeholder="Research" required />
	
	
	
	
    <input type="button"  class="next action-button" value="Update" name='msform' onclick="faculty_update(this.name)" />
	
	<span id="check_span" style="display:none;color:red;">Please Enter All the Values</span>
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