/*	var sticky;
	$(document).ready(function(){
		
		if(screen.width<900)
		{
		//	alert("size small");
			window.location.href='screen.php';
		}
		 sticky=$("#navbar").offset();
	});*/

	
	function print()
	{
		var prtContent = document.getElementById("result_box");
		var table= document.getElementById("table").setAttribute("border","1px");
		var WinPrint = window.open('', '', 'left=0,top=0,width=1080,height=900,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		var table= document.getElementById("table").removeAttribute("border");
		WinPrint.close();
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
	
	
	function year_wise(id)
	{
		form_id=document.getElementById(id);
		result_box=document.getElementById('result_box');
		var no_of_element = form_id.elements.length-1;
		//alert(no_of_element);
		var year_id='';
		var year_value;
		var j=0;
		for(i=0;i<no_of_element;i++)
		{
			
			var tag_id=form_id.elements[i].id;
			var value=form_id.elements[i].value;
			var title= form_id.elements[i].title;
			var type=form_id.elements[i].type;
			var name=form_id.elements[i].name;
			
			if (form_id.elements[i].checked==true)
			{
				year_id+=' and '+tag_id+"='"+value+"'";
				j++;
			}
		
			
		}
		
		if(j==0)
		{
			alert("Select atleast one field");
			return false;
		}
		
		
		if(window.XMLHttpRequest)
		{
			obj=new XMLHttpRequest();
		}
		else
		{
			obj=new ActiveXObject('Microsoft.XMLHTTP');
		}
		obj.open("POST","year-student-faculty.php?text="+year_id,true);
		obj.send();
		obj.onreadystatechange=function()
		{
		if(obj.readyState==4 && obj.status==200)
		{
		result_box.innerHTML=obj.responseText;
			
		}
		}
		
	}
	function clear(id)
	{
		alert(id);
		form_id=document.getElementById(id);
		form_length=form_id.elements.length-2;
		for(i=0;i<form_length;i++)
		{
			form_id.elements[i].checked=false;
		}
	}
	
	
	
	function student_year_wise(id)
	{
		form_id=document.getElementById(id);
		result_box=document.getElementById('result_box');
		var no_of_element = form_id.elements.length-1;
		//alert(no_of_element);
		var year_id='';
		var year_value;
		var j=0;
		for(i=0;i<no_of_element;i++)
		{
			
			var tag_id=form_id.elements[i].id;
			var value=form_id.elements[i].value;
			var title= form_id.elements[i].title;
			var type=form_id.elements[i].type;
			var name=form_id.elements[i].name;
			
			if (form_id.elements[i].checked==true)
			{
				year_id+=' and '+tag_id+"='"+value+"'";
				j++;
			}
		
			
		}
		
		if(j==0)
		{
			alert("Select atleast one field");
			return false;
		}
		
		
		if(window.XMLHttpRequest)
		{
			obj=new XMLHttpRequest();
		}
		else
		{
			obj=new ActiveXObject('Microsoft.XMLHTTP');
		}
		obj.open("POST","year-faculty-data.php?text="+year_id,true);
		obj.send();
		obj.onreadystatechange=function()
		{
		if(obj.readyState==4 && obj.status==200)
		{
		result_box.innerHTML=obj.responseText;
			
		}
		}
		
	}
	
	
	// When the user scrolls the page, execute myFunction 

	
	
		

	
	
