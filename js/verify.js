$(document).ready(function(){
	$id="";
	$pass="";
	//check non empty condition for College Id
	 $(document).on('blur','input[id="c1"]',function(){
		 $id=$("#c1").val();
		 if($id=="")
		 {
			 
			 $("#c1").prev("span").css("display","block");
			 $("#c1").focus();
		 }
		 else{
			if($id.length!=10)
			{
					$("#c1").prev("span").html("Your Id Is equal to 10 Charecters");
				 $("#c1").prev("span").css("display","block");
				 $("#c1").val("");
				  $("#c1").focus();
			}
			else{
			$("#c1").prev("span").css("display","none");
			$table=$("#c1").attr("name");
			$val=' and c1="'+$("#c1").val()+'"';
		
			$.ajax({
				method: "POST",
				url: "verify_id.php?table="+$table+"&text="+$val
 
			})
		.done(function(msg) {
			
			if(msg!="1")
			{
				
					$("#c1").prev("span").html(msg);
				 $("#c1").prev("span").css("display","block");
				 $("#c1").val("");
				  $("#c1").focus();
			}
		});
	}
		 }
	 });
	 
	 //check non empty condition for DOB
	 $(document).on('focus','input[id="c2"]',function(){
	 
		$(document).on('blur','input[id="c2"]',function(){
		 $dob=$("#c2").val();
		 if($dob=="")
		 {
			 
			 $("#c2").prev("span").css("display","block");
			 $("#c2").focus();
		 }
		 else
			 $("#c2").prev("span").css("display","none");
	
		});
		});
	 
	  $(document).on('blur','input[id="c3"]',function(){
		 $pass=$("#c3").val(); 
		  if($pass=="")
		  {
			  $("#c3").prev("span").css("display","block");
			$("#c3").focus();
		  }else
			{
				if($pass.length<5)
				{
					alert("password must be greater than 5 charecters");
					$("#c3").val("");
					$("#c3").focus();
				}
				 $("#c3").prev("span").css("display","none");
			}
	  });
	  
    $(document).on('focus','input[id="cpass"]',function(){
		
		$pass=$("#c3").val();
		$cpass=$(this).attr("value");
		
		 $(document).on('blur','input[id="cpass"]',function(){
			$cpass=$("#cpass").val();
				if($cpass=="")
				{
					$("#cpass").prev("span").css("display","block");
					$("#cpass").focus();
				}else
					$("#cpass").prev("span").css("display","none");
			if($pass!=$cpass)
			 {
				$("#cpass").prev("span").prev("span").css("display","block");
				$("#cpass").focus();
			 }
			 else
			 {
				$("#cpass").prev("span").prev("span").css("display","none"); 
			 }
				 
				 
		 });
	});
});