
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
    <h2 class="fs-title">Change Password</h2>
	
    

    <h6 class="fs-subtitle">All fields are mandatory</h6>

	<input type="text" name="id" id="id" placeholder="Enter Your College ID" required autofocus  onblur=''/>

	
	
	
    <input type="password" name="pass" id="pass" placeholder="Enter New Password" required />
	
	
	
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" min="5" required />
	
	
	
	
	
	
	
    <input type="button"  class="next action-button" value="Update" name='msform' onclick="faculty_update(this.name)" />
	
	<span id="check_span" style="display:none;color:red;">Please Enter All the Values</span>
  </fieldset>

</form>
</div>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>
</body>




