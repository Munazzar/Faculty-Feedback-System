<?php
error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){

require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");

//logging
	 $desc=":visited database-management page";
	 //$query_log="(".$query.")";
require_once('logging_sub_admin.php');
////
}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
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
		  <link rel="stylesheet" href="css/style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		
		<script type='text/javascript' src='js/check_size.js'>
		</script>
	
	
	<script type='text/javascript'>
	function truncate(table_name)
	{
		document.getElementById('loading').style.display='block';
		var obj;
		if(window.XMLHttpRequest)
					{
						obj=new XMLHttpRequest();
					}
					else
					{
						obj=new ActiveXObject('Microsoft.XMLHTTP');
					}
					obj.open("POST","truncate_table.php?table="+table_name,true);
					obj.send();
					obj.onreadystatechange=function()
					{
					if(obj.readyState==4 && obj.status==200)
					{
						alert(obj.responseText);
					
						document.getElementById('loading').style.display='none';
					}
					}
		
	}
	
	
	function increment_year()
	{
		document.getElementById('loading').style.display='block';
		var obj;
		if(window.XMLHttpRequest)
					{
						obj=new XMLHttpRequest();
					}
					else
					{
						obj=new ActiveXObject('Microsoft.XMLHTTP');
					}
					obj.open("POST","increment_student_year.php",true);
					obj.send();
					obj.onreadystatechange=function()
					{
					if(obj.readyState==4 && obj.status==200)
					{
						alert(obj.responseText);
					
						document.getElementById('loading').style.display='none';
					}
					}
		
	}
	
	
	function decrement_year()
	{
		document.getElementById('loading').style.display='block';
		var obj;
		if(window.XMLHttpRequest)
					{
						obj=new XMLHttpRequest();
					}
					else
					{
						obj=new ActiveXObject('Microsoft.XMLHTTP');
					}
					obj.open("POST","decrement_student_year.php",true);
					obj.send();
					obj.onreadystatechange=function()
					{
					if(obj.readyState==4 && obj.status==200)
					{
						alert(obj.responseText);
					
						document.getElementById('loading').style.display='none';
					}
					}
		
	}
	
	
	function calculate_final()
	{
		document.getElementById('loading').style.display='block';
		var obj;
		if(window.XMLHttpRequest)
					{
						obj=new XMLHttpRequest();
					}
					else
					{
						obj=new ActiveXObject('Microsoft.XMLHTTP');
					}
					obj.open("POST","calculate_final_feedback.php",true);
					obj.send();
					obj.onreadystatechange=function()
					{
					if(obj.readyState==4 && obj.status==200)
					{
						alert(obj.responseText);
					
						document.getElementById('loading').style.display='none';
					}
					}
		
	}
	</script>
	
	<script type='text/javascript' src='js/linkExp.js'>
		</script>
	
	
<script src="js/script_for_index.js" type="text/javascript">
</script>
<script src="js/script_new.js" type="text/javascript">
</script>


		<script type='text/javascript'>
			function verify_password()
			{
				document.getElementById('loading').style.display='block';
				var obj;
				var search_box=document.getElementById("search_box")
				database_delete_form=document.getElementById('database_delete_form');
				pass=document.getElementById('password').value;
				text=document.getElementById('password').name;
					if(window.XMLHttpRequest)
					{
						obj=new XMLHttpRequest();
					}
					else
					{
						obj=new ActiveXObject('Microsoft.XMLHTTP');
					}
					obj.open("POST","delete_database.php?pass="+pass+"&text="+text,true);
					obj.send();
					obj.onreadystatechange=function()
					{
					if(obj.readyState==4 && obj.status==200)
					{
					output=obj.responseText;
					document.getElementById('loading').style.display='none';
					if(output=='0')
						alert('wrong password, Please try again.');
					else
						alert(output);
					
						location.reload();
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
                    <h3>MANAGE DATABASE</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>DATA</p>
                   
                    
					
                    
                         
                  <li><a href='sub-admin-index.php'>Update</a></li>
				  <li><a href='view_log.php'>View Log Data</a></li>
				  <li><a href='check_list.php'>Print Checklist</a></li>
				
					
                       
					
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
                <h2>DATABASE MANAGEMENT</h2>
				</div>
				
				
				<div>
				<table class='table table-hover'>
				<th><h4>Following are the databases</h4></th>
				<tr><th>Database Id</th><th> Database Name</th></tr>
				<?php
				$last_database='';
				foreach($property_decode['database'] as $key=>$value)
				{
					$last_database=$value[1];
					echo "<tr><td>$value[0]</td><td>$value[1]</td><td><input type='button' value='Delete' class='btn btn-danger'  title='$value[0]' ></td></tr>";
					
				}
				?>
				</table>
				<hr>
				</div>
				
				<!--Upload data  division start here-->
				<div class='manage_database_div' align='center'>
				<h3 class='section-heading'>UPLOAD TO  <?php echo $last_database; ?><span class="fa fa-database"></span></h3>
				<table class='table'>

				
					<!--<tr>
						<td>Regular Subject List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="regularsubject" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/regular_subject_list.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
				
				
					<tr>
						<td>OE Subject List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="oesubject" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/oe_subject_list.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
					
					<tr>
						<td>PE Subject List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="pesubject" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/pe_subject_list.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
				
				
					<tr>
						<td>BATCH-LAB Subject List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="splsubject" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/batch-lab-subject-list.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>-->
				
				
					<tr>
						<td>OE Student List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="oestudent" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/OE_STUDENT_LIST.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
					
					
					<tr>
						<td>PE Student List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="pestudent" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/PE_STUDENT_LIST.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
					
					
					<tr>
						<td>BATCH-LAB Student List</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="splstudent" class="btn btn-default" id="fileToUpload" required>
							<td><a href='docs/sample-files/BATCH_LAB_STUDENT_LIST.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit' onclick='' class='btn btn-success'></form></td>
					</tr>
					
										<tr>
						<td>Faculty Assignment</td>
						<td><form method="post" enctype="multipart/form-data" action="upload.php">
							<input type="file" name="facultyassigned" class="btn btn-default" id="fileToUpload" required></td>
							<td><a href='docs/sample-files/FacultyAssignment.xlsx' target='_blank'><input type='button' value='Sample Download'  name='regular_subject_list' class='btn btn-primary'></a></td>
							<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
						<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
					</tr>
					
					
				</table>
				</div>
				<hr>
				
				
				
				
				<!--Upload data  division start here-->
				<div class='manage_database_div' align='center'>
				<h3 class='section-heading'>CLEAR DATA FROM <?php echo $last_database; ?><span class="fa fa-database"></span></h3>
				<p>please perform the following only when necessary.</p>
				<table class='table'>
					
					
					
					<tr>
						<td>Regular Subject List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t106'></td>
					</tr>
					
					
					<tr>
						<td>OE Subject List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t107'></td>
					</tr>
					
					<tr>
						<td>PE Subject List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t108'></td>
					</tr>
					
					
						<tr>
						<td>BATCH-LAB Subject List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t111'></td>
					</tr>
					
					<tr>
						<td>OE Student List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t109'></td>
					</tr>
					
					<tr>
						<td>PE Student List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t110'></td>
					</tr>
					
					<tr>
						<td>BATCH-LAB  Student List Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t112'></td>
					</tr>
					
					<tr>
						<td>Faculty Assignment Table</td>
						<td><input type='submit' value='Clear' onclick='truncate(this.title)' class='btn btn-warning' title='t103'></td>
					</tr>
					
					</table>
					</div>
					<hr>
				
				
				<!--Newdatabase division start here-->
				<div class='manage_database_div' align='center'>
				<h3 class='section-heading'>CREATE NEW DATABASE<span class="fa fa-database"></span></h3>
				<table class='table'>

				
				
					
				<?php

				$now = DateTime::createFromFormat('U.u',microtime(true));
				$month=(string)$now->format("m");
			 $year=(string)$now->format("Y");
				
			
					
					$sub_last_year=substr($last_database,strpos($last_database,',')+1);
					if($sub_last_year=='SemII')
					{
					echo "
					<tr>
				<td><h4>Ready for new Year?</h4></td>
				<td></td>
					<td></td>
				<td><a href='create_new_year.php'><input type='button' value='Click me'  class='btn btn-info' ></a></td>
				</tr>
					";
					}
					else
					{
					echo "
					<tr>
						<td>Ready for new Semester?</td>
						
						<td><a href='create_new_sem.php'><input type='button' value='Click me' onclick='' class='btn btn-primary'></a></td>
						</tr>
					
					";
					}
				
				
				?>
				
				
				
				
				
				</table>
				
				</div>
				
				
				<hr>
				<div class='manage_database_div' align='center'>
				<h3 class='section-heading'>YEAR MANAGEMENT<span class="fa fa-database"></span></h3>
				<table class='table'>
				
				<tr>
					<td>Download Updated Faculty List</td>
					<td></td>
					<td></td>
					
					<td><a href='faculty_updated_list.php' target='_blank'><input type='button' value='Click me' class='btn btn-default'></a></td>
					
				</tr>
				
				<tr>
					<td>Increment Students Year?</td>
					<td></td>
					<td></td>
					
					<td><input type='button' value='Click me' onclick='increment_year()' class='btn btn-info'></td>
					
				</tr>
				
				<tr>
					<td>Decrement Students Year?</td>
					<td></td>
					<td></td>
					<td><input type='button' value='Click me' onclick='decrement_year()' class='btn btn-info'></td>
				</tr>
				
				
				<tr>
					<td>Calculate Overall feedback?</td>
					<td></td>
					<td></td>
					<td><input type='button' value='Click me' onclick='calculate_final()' class='btn btn-primary'></td>
				</tr>
				
				<tr>
				<td>
					First year data upload?
				</td>
			<td></td>
					<td></td>
				<td>
				<a href='upload_faculty_assign.php'><input type='button' value='Click me' onclick='' class='btn btn-primary'></a>
				</td>
				
				</tr>
				
				
				<tr>
					<td>Update Student Year</td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="studentyear" class="btn btn-default" id="fileToUpload" required></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				<tr>
					<td>Update Student Section</td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="studentsection" class="btn btn-default" id="fileToUpload" required></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				
					<tr>
					<td>Delete Students Feedback </td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="studentsfeedback" class="btn btn-default" id="fileToUpload" required></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				
				
				<tr>
					<td>Add Faculty Photo</td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="facultyphoto[]" class="btn btn-default" id="fileToUpload" required title='file should only be in "jpg" format only' multiple='multiple'></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				
				
			
				
				<tr>
					<td>Update Faculty Code</td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="facultycode" class="btn btn-default" id="fileToUpload" required title='file name must be "faculty_code.xlsx" only'></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				
				
				<tr>
					<td>Update Faculty Email ID's</td>
					<td><form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="facultymail" class="btn btn-default" id="fileToUpload" required title='file name must be "faculty_mail.xlsx" only'></td>
						<td><input type='button' value='Reset' onclick='this.form.reset()' class='btn btn-warning'></td>
					<td><input type='submit' value='Submit'  class='btn btn-success'></form></td>
				</tr>
				
				
				
				
				</div>
				
				
				
				</div>
			</div>
        </div>

		<div id='loading' style='display:none;'>
		<div style='padding-top:250px'>
			<img src='images/loader.gif' width='150px' height='110px' >
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
