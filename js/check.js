var id_check=0;
var dob=0;

var link;
function checkId()
{
		id=document.getElementById("c1");
		id_value=id.value;
		c1_span=document.getElementById("c1_span");
	if(id_value!="")
		{
			
			
				
						table=id.getAttribute("name");
				text=' and c1="'+id.value+'"';
				
				if(window.XMLHttpRequest)
				{
					obj=new XMLHttpRequest();
				}
				else
				{
					obj=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj.open("POST","verify_id.php?text="+text+"&table="+table,true);
				obj.send();
				obj.onreadystatechange=function()
				{
				if(obj.readyState==4 && obj.status==200)
				{
					value=obj.responseText;
					//alert(value);
					if(value!=1)
					{
						if(value==2 || value==23){
							
							id.focus();
							c1_span.innerHTML="You are already Registered Please Login Now<meta http-equiv='refresh' content='5;url=login.php'>";
							c1_span.style.display="block";
						}
						
						else if(value!=2)
						{
							id.focus();
							value=" Incorrect Roll number";
							c1_span.innerHTML=value;
							c1_span.style.display="block";
							
						}
						
							id_check=1;
					}
					else if(value==5)
					{
						alert("sorry Bro not gonna work here ; )");
						location.reload();
					}
					else
					{

						
						c1_span.style.display="none";
						id_check=0;
						link=" and c1='"+id_value+"'";
						 
					}
				}
				}
						
						
						
					}
					
						
						
				
			
			
			
			
			
			
				
		
}


function check_doctor(text){
	 var obj1;
if(window.XMLHttpRequest)
				{
					obj1=new XMLHttpRequest();
				}
				else
				{
					obj1=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj1.open("POST","doctor.php?text="+text,true);
				obj1.send();
				obj1.onreadystatechange=function()
				{
					if(c1_span.style.display!='block')
				if(obj1.readyState==4 && obj1.status==200)
				{
					doc_val=obj1.responseText;
					
					if(doc_val==1)
					{
						alert("sorry Bro not gonna work here ; )");
					
						location.reload();
					}
					
							
				}
				}
}


function checkDOB(table,text)
{
		id=document.getElementById("c2");
			c1=document.getElementById("c1");
			c1_value=c1.value;
		id_value=id.value;
		//alert(id_value);
		result=id_value.split("-");
		id_value=result[2]+result[1]+result[0];
		
		c2_span=document.getElementById("c2_span");
		if(id_value!="")
		{
			
			c1_span=document.getElementById("c1_span");
			//c1_span=document.getElementById("c1_span");
			
				var obj;
				table=id.getAttribute("name");
				text=' and c1="'+c1_value+'" and c2="'+id_value+'"';
				//alert(text);
				if(window.XMLHttpRequest)
				{
					obj=new XMLHttpRequest();
				}
				else
				{
					obj=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj.open("POST","verify_dob.php?text="+text+"&table="+table,true);
				obj.send();
				obj.onreadystatechange=function()
				{
					if(c1_span.style.display!='block')
				if(obj.readyState==4 && obj.status==200)
				{
					value=obj.responseText;
					if(value==2)
					{
						c2_span.style.display="none";
						
					}
					else if(value!=1)
					{
						value=" Incorrect DOB";
					c2_span.innerHTML=value;
					c2_span.style.display="block";
					dob=1;
					}
					else
					{
						c2_span.style.display="none";
						dob=0;
						
					}
				}
				}
				
		}
}



function myFunction(id,table) {
var data="";
var form_id=document.getElementById(id);
 var no_of_element = form_id.elements.length-1;
check_span=document.getElementById("check_span");
		

 var i;
 	for(i=0;i<no_of_element;i++)
    {
		
    var id = form_id.elements[i].id;
    var value=form_id.elements[i].value;
	var tagName= form_id.elements[i].tagName;
	var type=form_id.elements[i].type;
	
	if(tagName=="FIELDSET")continue;
	
	if(i+1==no_of_element)
	{
		check_val=form_id.elements[i-1].value;
		if(check_val==value)
		{
			check_span.innerHTML="";
			continue;
		}
		else
		{
			check_span.innerHTML="confirm password Doesn't match";
			check_span.style.display="block";
			form_id.elements[i].focus();
			return false;
			continue;
		}
	}
	if(form_id.elements[i].required)
	if(value=="")
	{
		check_span.innerHTML="Enter Details Correctly ";
		check_span.style.display="block";
		form_id.elements[i].focus();
		return false;
	}
	if(value=="")
		continue;
	
	if(type=="date")
	{
		//alert(value);
		result=value.split("-");
		value=result[2]+"-"+result[1]+"-"+result[0];
	}
	
    data=data+id+'="'+value+'",';
	
    check_span.style.display="none";
    }
	//alert(id_check);
	if(id_check==0)
	{
	//	alert(dob);
		if(dob==0)
		{
			//alert(data);
			
			
			var obj;
				
				if(window.XMLHttpRequest)
				{
					obj=new XMLHttpRequest();
				}
				else
				{
					obj=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj.open("POST","doctor.php?text="+data+link,true);
				obj.send();
				obj.onreadystatechange=function()
				{
					if(c1_span.style.display!='block')
				if(obj.readyState==4 && obj.status==200)
				{
					value=obj.responseText;
					if(value==1)
						alert("sorry Bro not gonna work here ; )");
					else
						window.location.href = "update_register.php?text="+data+"&table="+table+"&link="+link;
				}
				}
		
			
			
			
			
			
			
		}
		else{
				c1_span=document.getElementById("c1_span");
		c1_span.innerHTML="Match Not Found";
		c1_span.style.display='block';
			document.getElementById("c2").focus();
		}
	
	}
	else{
		c1_span=document.getElementById("c1_span");
		
		c1_span.style.display='block';
			document.getElementById("c1").focus();
	}


}


function checkLogin(id,table)
{
	text="";
	name="";
	var form_id=document.getElementById(id);
 var no_of_element = form_id.elements.length-1;
check_span=document.getElementById("check_span");
		//alert(no_of_element);
 	for(i=0;i<no_of_element;i++)
    {
		
    var id = form_id.elements[i].id;
    var value=form_id.elements[i].value;
	var tagName= form_id.elements[i].tagName;
	var type=form_id.elements[i].type;
	
	if(tagName=="FIELDSET")continue;
	//alert(id);
	if(id=="c1")
		name=value;
	
	if(value=="")
	{
		//alert("Enter Data");
		check_span.innerHTML="Enter Details Correctly ";
		check_span.style.display="block";
		form_id.elements[i].focus();
		return false;
	}
	if(value=="")
		continue;
	
	if(type=="date")
	{
		result=value.split("-");
		value=result[1]+"-"+result[2]+"-"+result[0];
	}
	
    text=text+" and "+id+'="'+value+'"';

    check_span.style.display="none";
    }
		//alert(text);
	//check login dataif(window.XMLHttpRequest)
		var obj;
				if(window.XMLHttpRequest)
				{
					obj=new XMLHttpRequest();
				}
				else
				{
					obj=new ActiveXObject('Microsoft.XMLHTTP');
				}
				obj.open("POST","verify_id.php?text="+text+"&table="+table,true);
				obj.send();
				obj.onreadystatechange=function()
				{
				if(obj.readyState==4 && obj.status==200)
				{
					var now;
					value=obj.responseText;
					if(value==23)
					{
					now="You already Gave Feedback, ThankYou for your Response. <br><a href='http://vjit.ac.in/dss/'>click here </a>to Explore about DSS";
					check_span.innerHTML=now;
					check_span.style.display="block";
					
					}
					else if(value==1)
					{
						now=value+"<br>Enter Correct Details or <a href='register.php'>click here </a>To Register/reset password";
					check_span.innerHTML=now;
					check_span.style.display="block";
					id_check=1;
					}
					else if(value==2)
					{
						check_span.style.display="none";
						id_check=0;
						//alert("correct");
						check_span.innerHTML="<meta http-equiv='refresh' content='1;url=log.php?name="+name+"'>";
						 
					}
					else
					{
						now=value+"<br>Enter Correct Details or <a href='register.php'>click here </a>To Register/reset password";
					check_span.innerHTML=now;
					check_span.style.display="block";
						
					}
					
				}
				}
	
	
}






function insert(id)
	{
		var form_id=document.getElementById(id);
		var name=form_id.name;
		var no_of_element = form_id.elements.length-1;
		var $text='';
		var id;
		var year;
		//alert(no_of_element);
		for(i=0;i<no_of_element;i++)
		{
			
			var submit_id=form_id.elements[i].id;
			var value=form_id.elements[i].value;
			var title= form_id.elements[i].title;
			var type=form_id.elements[i].type;
			var name=form_id.elements[i].name;
			if(type=='select-one')
			{
				
					
				$text+=value+",";
			}
			if(type=='textarea')
			{
			//
				$text+=value+",";
				$text+=name+",";
					$text+=title+";";
			}
			if(type=='submit')
			{
				id=title;
				year=name;
			}
			
		}
		//alert($text);	
//window.location.href='screen_not_enough.php';	
		form_id.action='insert_feedback.php?text='+$text+'&name='+name+'&id='+id+'&year='+year;
		
		
	}
