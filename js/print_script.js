function printwindow()
{
	window.print({
        
		if(window.XMLHttpRequest)
		{
			obj=new XMLHttpRequest();
		}
		else
		{
			obj=new ActiveXObject('Microsoft.XMLHTTP');
		}
		obj.open("POST",file,true);
		obj.send();
		obj.onreadystatechange=function()
		{
		if(obj.readyState==4 && obj.status==200)
		{
		result_box.innerHTML=obj.responseText;
			
		}
		}
			
        });
	
	
}