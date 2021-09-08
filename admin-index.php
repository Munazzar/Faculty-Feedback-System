<?php
ob_start();
?>
<?php
session_start();
error_reporting(0);
require_once("database_connect.php");
require_once("property_read.php");
if(isset($_SESSION["admin"])){
require_once('property_read.php');

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
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type='text/javascript' src='js/check_size.js'>
		</script>
		<script src="js/script_for_index.js" type="text/javascript">
		</script>
		<script src="js/script_new.js" type="text/javascript">
		</script>
		<script src="js/linkExp.js" type="text/javascript">
		</script>
		
		<style>
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
		
		
		<script >
		
		
		function changeYear(id)
		{
			
			if(window.XMLHttpRequest)
			{
				obj=new XMLHttpRequest();
			}
			else
			{
				obj=new ActiveXObject('Microsoft.XMLHTTP');
			}
			obj.open("POST","update_year.php?id="+id,true);
			obj.send();
			obj.onreadystatechange=function()
			{
				if(obj.readyState==4 && obj.status==200)
				{
					
					window.refresh();
				
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
    <body onload='get_faculty_feedback_data()'>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <h3>ADMIN</h3>
                </div>
				
                <ul class="list-unstyled components">
					<li >
						<a>viewing from Year:<br><?php
						foreach($property_decode['database'] as $index=>$arr)
						{
							if($arr[0]==$property_decode['view_from_database']['value'])
							{
								echo $arr[1];
								
							}
							
						}
						  ?></a>
						
					</li>
					<li>
						<a href="#selectYear" data-toggle="collapse" aria-expanded="false">Select (Year/semester)</a>
							<ul class="collapse list-unstyled" id="selectYear">
							<?php
							foreach($property_decode['database'] as $key=>$value)
							echo "<li><a id='$key' onclick='changeYear(this.id)' href=''>".$value[1]."</a></li>";
							?>
			  </ul>
					</li>
				   
                    <li>
                       
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">View Reports</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
						 <li><a href="admin-main.php">Faculty</a></li>
						 	 <li><a href="faculty_graph_view.php">Faculty Analysis</a></li>
                            <li><a href="student-faculty-data.php">Student</a></li>
                          	<li><a href="year-faculty-detail.php">year</a></li>
						   <li><a href="branch-faculty.php">Branch</a></li>
						   <li><a href="branch-faculty-graph.php">Branch Analysis</a></li>
						   <li><a href="branch-faculty-subject-graph.php">Faculty Subject</a></li>
						<li><a href="subject-faculty.php">Subject</a></li>
						<li><a href="subject-faculty-graph.php">Subject Analysis</a></li>
                        </ul>
                    </li>
					<li>
                        <a href='reset_admin_pass.php'>Reset Password</a>
                    </li>
					<li>
                        <a href='logout.php'>Logout</a>
                    </li>
				</ul>
			 </nav>

            <!-- Page Content Holder -->
            <div id="content">
				<nav class="navbar">
                    <div class="container-fluid">
						<div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>
					</div>
                </nav>
				
               
		<div class="fixing">
		
				<div id="search_box">
				</div>
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
				
            
				
				?>
				<p>Over View</p>
				  <div class="col-sm-6 col-lg-3" >
                              
                                            <div class="text" style='border:solid 1px;border-radius:5px;'>
                                                <h2><?php
												$query="select count(distinct(c29)) from t104_".$property_decode['view_from_database']['value'];
												if($result=mysqli_query($con,$query))
												{
													if(($rows=mysqli_num_rows($result))>0)
													{
														
														while ($row = mysqli_fetch_assoc($result)) 
														{
															
															foreach($row as $key=>$field)
															{
																echo " <i class='glyphicon glyphicon-user'></i> $field";
															}
														}
													}
												}
																					
												
												
												?></h2>
                                                <span>Total Students Given Feedback</span>
                                            </div>
                                       
                            </div>
							 <div class="col-sm-6 col-lg-3" >
                              
                                            <div class="text" style='border:solid 1px;border-radius:5px;'>
                                                <h2><?php
												$query="select count(distinct(c7)) from t114_".$property_decode['view_from_database']['value'];
												if($result=mysqli_query($con,$query))
												{
													if(($rows=mysqli_num_rows($result))>0)
													{
														
														while ($row = mysqli_fetch_assoc($result)) 
														{
															
															foreach($row as $key=>$field)
															{
																echo " <i class='glyphicon glyphicon-education'></i> $field";
															}
														}
													}
												}
																					
												
												
												?></h2>
                                                <span>No of Faculty recieved Feedback</span>
                                            </div>
                                       
                            </div>
							 <div class="col-sm-6 col-lg-5" >
                              
                                            <div class="text" style='border:solid 1px;border-radius:5px; height:600px;overflow:scroll;'>
                                                <h4>Feedback Taken for classes</h4><table class='table table-bordered'><td>Branch</td><td>Year</td><td>Section</td><td>Count</td><?php
												$sno=1;
												$query="select c13,c12,c14,c25 from t105";
												if($result=mysqli_query($con,$query))
												{
													if(($rows=mysqli_num_rows($result))>0)
													{
														
														while ($row = mysqli_fetch_assoc($result)) 
														{
															echo "<tr>";
															foreach($row as $key=>$field)
															{
																$check=0;
																if($key=='c25')
																{
																$query2="select count(distinct(c29)) from t104_".$property_decode['view_from_database']['value']." where c25='$field'";
																	

																			$query_count="select count(c29) from t101 where c25='$field'";
																			$std_count="";
																			if($result_count=mysqli_query($con,$query_count))
																			{
																				
																				if(($rows_count=mysqli_num_rows($result_count))>0)
																				{
																					while ($row_count= mysqli_fetch_assoc($result_count)) 
																						{
			  
																							foreach($row_count as $key_count=>$field_count)
																							{
																								$std_count=$field_count;
																							}
																						}
																				}
																			}
																			
																			
																			
																if($result2=mysqli_query($con,$query2))
																{
																	
																	if(($rows2=mysqli_num_rows($result2))>0)
																	{
																		while ($row2 = mysqli_fetch_assoc($result2)) 
																			{
  
																				foreach($row2 as $key2=>$field2)
																				{
																					if($field2==0)
																						echo "<td><img src='images/cancel.png'></td>";
																					else
																						echo "<td>$field2 / $std_count </td>";
																				}
																			}
																			
																	}
																	
																		
																	
																}
																
																}
																else
																{
																	echo "<td>$field</td>";
																}
															}
															$sno++;
															echo "</tr>";
														}
													}
												}
																					
												
												
												?><table>
                                                
                                            </div>
                                       
                            </div>
								
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
	<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>
    </body>
</html>
