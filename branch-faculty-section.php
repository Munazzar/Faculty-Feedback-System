<?php
session_start();
require_once('property_read.php');
require_once("database_connect.php");
if(isset($_SESSION["faculty"])){
if($_SESSION['position']==5)
	{
		
	}

}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that you Authorised to access this page <a href='admin.php'>click here</a></h2></div>";
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
				<?php
				if($_SESSION['position']==6)
				  {
                     echo "<a href='faculty-aut.php'><h3>FEEDBACK Analysis</h3></a>";
					
				  }
				  else
					  echo "<h3>FEEDBACK Analysis</h3>";
					
					?>
                </div>

                <ul class="list-unstyled components">
                
                   
                  <?php
				  if($_SESSION['position']==5)
				  {
					  echo "<li><a href='hod_view.php'>HoD</a></li>";
					  echo "<li><a href='hod_graph_view.php'>Branch Analysis</a></li>";
					   echo "<li><a href='branch-faculty-section.php'>Branch section Analysis</a></li>";
				  }
				  ?>
					
                    
                     <li><a href='faculty-subject-compare.php'>Subject wise Analysis</a></li>  
                  
				  <li><a href='faculty-attribute-subject.php'>Attribute wise Analysis</a></li>  
				  <li><a href='faculty_year_graph.php'>Year wise Analysis</a></li>  
				  <li><a href='section_wise.php'>Section wise Analysis</a></li>  
				  <li><a href='faculty_password_reset.php'>Reset Password</a></li> 
				  
				    
                 
				 
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
				
               
		
		
				<div id="search_box"></div>
				<div id='result' align='center'>
				<h2>Section wise analysis</h2>
				<p>Note: section wise analysis for This semester </p>
                <?php
				$faculty_name=$_SESSION['faculty_name'];
				echo $branch=$_SESSION['branch'];
				$query_faculty="select c6,c7 from t102 where c13='$branch'";
				if($result_faculty_query=mysqli_query($con,$query_faculty))
					{
						if(($rows_faculty=mysqli_num_rows($result_faculty_query))>0)
						{
							
							while ($row_faculty = mysqli_fetch_assoc($result_faculty_query)) 
							{
								$faculty_id='';
								$faculty_name='';
								foreach($row_faculty as $key_faculty=>$field_faculty_id)
								{
									if($key_faculty=='c6')
									{
										$faculty_name=$field_faculty_id;
									}
									else if($key_faculty=='c7')
									{
									$faculty_id=$field_faculty_id;
				
				
					$year_id=$property_decode['current_database']['value'];
					
					
					
					$year_from_code=array();
					$query2="select c25,c13,c12,c14 from t105";
					if($result2=mysqli_query($con,$query2))
					{
						if(($rows2=mysqli_num_rows($result2))>0)
						{
							
							while ($row2 = mysqli_fetch_assoc($result2)) 
							{
								$year='';
								$index='';
								foreach($row2 as $key2=>$field2)
								{
									if($key2=='c25')
										$year=$field2;
									else
										$index=$index.trim($field2);
									
								}
								$year_from_code[$year]=$index;
							}
						}
					}
					
					$regular_subject_code=array();
					$query="select c16,c26 from t106_".$year_id;
						if($result=mysqli_query($con,$query))
						{
							if(($rows=mysqli_num_rows($result))>0)
							{
								
								while ($row = mysqli_fetch_assoc($result)) 
								{
									$subject_id='';
									$index='';
									foreach($row as $key=>$field)
									{
										if($key=='c26')
											$index=trim($field);
										else
											$subject_id=$field;
										
									}
									$regular_subject_code[$index]=$subject_id;
								}
							}
						}
					
					$oe_subject_code=array();
					$query="select * from t107_".$year_id;
					if($result=mysqli_query($con,$query))
					{
						if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$subject_id='';
								$index='';
								foreach($row as $key=>$field)
								{
									if($key=='c35')
										$index=trim($field);
									else
										$subject_id=$field;
									
								}
								$oe_subject_code[$index]=$subject_id;
							}
						}
					}
					
					$pe_subject_code=array();
					$query="select * from t108_".$year_id;
					if($result=mysqli_query($con,$query))
					{
						if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$subject_id='';
								$index='';
								foreach($row as $key=>$field)
								{
									if($key=='c36')
										$index=trim($field);
									else
										$subject_id=$field;
									
								}
								$pe_subject_code[$index]=$subject_id;
							}
						}
					}
					
					
					$batch_lab_subject_code=array();
					//spl lab name as key and spl lab id as value assignment
					$query="select * from t111_".$year_id;
					if($result=mysqli_query($con,$query))
					{
						if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_assoc($result)) 
							{
								$subject_id='';
								$index='';
								foreach($row as $key=>$field)
								{
									if($key=='c44')
										$index=trim($field);
									else
										$subject_id=$field;
									
								}
								$batch_lab_subject_code[$index]=$subject_id;
							}
						}
					}
					
					
					
					$cols=["c15","c25","c17","c18","c19","c20","c21","c22","c30","c31","c32","c33"];
					echo "<div style='margin-left:10px;margin-right:10px;margin-bottom:10px;background-color:white;border-radius:6px;padding:20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);;border:black 1px;overflow:auto'> <h3>$faculty_name</h3><table class='table'>";
					foreach($cols as $columns_insert=>$value)
							{
							echo "<th>".$array_names[trim($value)]."</th>";
							
							}
							echo "<th>Average</th>";
					  $query="select c15,c25 from t103_".$year_id." where c7='$faculty_id'";
					if($result=mysqli_query($con,$query))
					{
					if(($rows=mysqli_num_rows($result))>0)
					{
						
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$subject='';
							$year='';
							$student_count='';
							foreach($row as $key=>$field)
							{
								if($key=='c15')
								{
									$subject=$field;
								}
								else if($key=='c25')
								{
									$year=$field;
									$no_reg=0;
									$first=substr($year,0,1);
									if($first!='y')
										$no_reg=1;
									if($no_reg==0)
									{
									$student_list=array();
									$student_count=0;
									$array_cols['c17']=0;
									$array_cols['c18']=0;
									$array_cols['c19']=0;
									$array_cols['c20']=0;
									$array_cols['c21']=0;
									$array_cols['c22']=0;
									$array_cols['c30']=0;
									$array_cols['c31']=0;
									$array_cols['c32']=0;
									$array_cols['c33']=0;
									
							 $query4="select c29,c17,c18,c19,c20,c21,c22,c30,c31,c32,c33 from t104_".$year_id." where c7='$faculty_id' and c15='$subject' and c25='$year'";
									if($result4=mysqli_query($con,$query4))
												{
													
													if(($rows4=mysqli_num_rows($result4))>0)
													{
															//echo "rows='$rows4'<br>";
														while ($row4 = mysqli_fetch_assoc($result4)) 
														{
														
															foreach($row4 as $key4=>$field4)
															{
																
																if(in_array($key4,array('c29')))
																{
																	if(in_array($field4,$student_list))
																		continue;

																	else
																	{
																		
																		$student_list[$student_count]=$field4;
																		$student_count++;
																		continue;
																	}
																	
																	
																}
															else
																$array_cols[$key4]+=$field4;
															}
														}
													}
												}
												echo "<tr>";
															if(array_search(trim($subject),$regular_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$regular_subject_code)."</td>";
													
														
														echo "<td>".$year_from_code[$year]."</td>";
									$cal=0;
									$val=0;
									
									// calculating average here
									foreach($array_cols as $key=>$sum)
									{
										
											
										$val=round($sum/$rows4,2);
										$cal+=$val;
										echo "<td>".$val."</td>";
										$array_cols[$key]=0;
										
									}
									$cal=round($cal/10,2);
								
									echo "<td>$cal</td></tr>";
															
															
														
													
												
								}
								else 
								{
									echo "<tr>";
										if(array_search(trim($subject),$oe_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$oe_subject_code)." - OE</td>";
													else if(array_search(trim($subject),$pe_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$pe_subject_code)." - PE</td>";
											else if(array_search(trim($subject),$batch_lab_subject_code)!=null)
															echo "<td>".array_search(trim($subject),$batch_lab_subject_code)." - SPL LAB</td>";
								 $query4="select c17,c18,c19,c20,c21,c22,c30,c31,c32,c33,c57 from t114_".$year_id." where c7='$faculty_id' and c15='$subject'";
									
									if(substr($subject,0,1)=='o')
										echo "<td>OE</td>";
									else if(substr($subject,0,1)=='p')
										echo "<td>PE</td>";
									else if(substr($subject,0,1)=='b')
										echo "<td>SPL-LAB</td>";
									
									if($result4=mysqli_query($con,$query4))
												{
													
													if(($rows4=mysqli_num_rows($result4))>0)
													{
															//echo "rows='$rows4'<br>";
														while ($row4 = mysqli_fetch_assoc($result4)) 
														{
														
															foreach($row4 as $key4=>$field4)
															{
																echo "<td>$field4</td>";
															}
														}
													}
												}
												echo "</tr>";
									
								}
								
								}
									
								
							}
						}
					}
					}
					
					
					
					echo "</table></div><br>";
				
				
				}
								}
							}
						}
				}
				echo "<div align='center' id='print'>
		<button class='btn btn-default' onclick='print()'>print</button>
		</div><br>";	
				
				
				if($_SESSION['position']==5)
				  		echo "<p style='font-size:25px;'>Kindly select HoD Option in the side bar to get the detailed information of all the faculty from ".$_SESSION['branch']." Department</p>";
				
				
				?>
				
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
