<?php
error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK</title>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>	
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script type='text/javascript' src='js/check_size.js'>
		</script>
	
	<script src="js/script_for_index.js" type="text/javascript">
	</script>
	<script src="js/script_new.js" type="text/javascript">
	</script>
	<script src="js/linkExp.js" type="text/javascript">
	</script>

		<script >
		function get_faculty_feedback_data()
		{
			var result_box=document.getElementById('result_box');
			if(window.XMLHttpRequest)
			{
				obj=new XMLHttpRequest();
			}
			else
			{
				obj=new ActiveXObject('Microsoft.XMLHTTP');
			}
			obj.open("POST","admin-main.php",true);
			obj.send();
			obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status==200)
			{
			result_box.innerHTML=obj.responseText;
				
			}
			}
			
				
		
		}
		</script>
	<script>
	function feedback_update()
	{
		value=document.getElementById('toggle').checked;
		//alert(value);
		var obj;
		if(window.XMLHttpRequest)
			{
				obj=new XMLHttpRequest();
			}
			else
			{
				obj=new ActiveXObject('Microsoft.XMLHTTP');
			}
			obj.open("POST","feeback_update_checkbox.php?value="+value,true);
			obj.send();
			obj.onreadystatechange=function()
			{
			if(obj.readyState==4 && obj.status==200)
			{
			//result_box.innerHTML=obj.responseText;
				
			}
			}
		
	}
	</script>

 
		
		
		
<style>
.fixing{
margin-top:100px
}
.paging{
position:fixed;
right:10px;
top:5px
}

</style>
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <a href=''><h3>SUB ADMIN</h3></a>
                </div>

                <ul class="list-unstyled components">
                   
                   
                    
					
                    
                         
                    <li>
					<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">Update</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                       <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="101" name="60">Student</a></li>
					   <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="102" name="60">Faculty Details</a></li>
					   <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="103" name="60">Classes Assigned</a></li>
					    <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="106" name="60">Regular subject List</a></li>
					    <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="107" name="60">OE Subject List</a></li>
						 <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="108" name="60">PE Subject List</a></li>
						  <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="111" name="60">BL Subject List</a></li>
						  <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="109" name="60">OE Student List</a></li>
						  <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="110" name="60">PE Student List</a></li>
						  <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="112" name="60">BL Student List</a></li>
						  <li><a href="#"  onclick='getdata(this.id,1,this.name)' id="105" name="60">Years</a></li>
					  
					  
                    </li>
					
					
                    
					
                </ul>
					<li>
                        <a href='manage_database.php'>Manage Databases</a>
                    </li>
					
					<li>
                        <a href='reset_subadmin_pass.php'>Reset Password</a>
                    </li>
               <li>
                        <a href='logout.php'>Logout</a>
                    </li>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

              
                     <nav class="navbar">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span></span>
                            </button>
                        </div>

                       <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right pagination pagination-sm">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                            </ul>
                        </div>-->
                    </div>
                </nav>
				
               
		<div class="fixing">
		<div class="paging">
				
				</div>
				<div id="search_box"></div>
				<div id='result_box' align='center'>
               
				
				
				
						
							<?php
								date_default_timezone_set('Asia/Kolkata');
								$hours=(string)date('H');
									if($hours>00 && $hours <12)
										echo "<h2>Good morning!!</h2> ";
									else if($hours>=12 && $hours <17)
										echo "<h2>Good Afternoon!!</h2> ";
									else if($hours>=17 && $hours <24)
										echo "<h2>Good Evening!!</h2> ";
									
									echo "<p>Ready for taking Feedback?</p>";
							require_once('property_read.php');
							$value=$property_decode['checked']['value'];
							if($value=='true')
								echo '<input type="checkbox" checked id="toggle" onchange="feedback_update()" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">';
							else if($value=='false')
								echo '<input type="checkbox" id="toggle" onchange="feedback_update()" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">';
			  ?>
			  
				</div>
				</div>
			</div>
        </div>





        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');	
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
			
			
			
			
			
        </script>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){  } </script>	
		<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>
    </body>
</html>
<?php

}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>