<?php
ob_start();
?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type='text/javascript' src='js/check_size.js'>
		</script>
		<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
				<title>VJIT FEEDBACK</title>
		<script type='text/javascript' src='js/print_script.js'>
		</script>
<style>
th{
	position: sticky;
  top: 0;
  padding:5px;
  background:#e5e5e5;
}
.stick{
	position: sticky;
  top: 33px;
  padding:5px;
}
</style>



<?php

error_reporting(0);
session_start();
if(isset($_SESSION["admin"]))
{
require_once("code.php");
		require_once("database_connect.php");
		require_once("property_read.php");
		$id='';
		$name='';
		$teacher_id;
		$array_cols;
		$cols=$property_decode['t104']['subject-faculty-detail-array'];
		$columns=$property_decode['t104']['admin-faculty-detail'];
		$i=0;
		
			 $query='select c16 from t106_'.$property_decode['view_from_database']['value'];
			echo "<div id='result_box'><div align='center'><h3> subject wise Faculty Feedback in terms of Average</h3></div>";
			echo "<div align='center'><table class='table table-hover' id='table' style='text-align:center'><tr>";
			foreach($cols as $columns_insert=>$value)
			{
			echo "<th>".$array_names[trim($value)]."</th>";
			
			}
			
		foreach($cols as $key=>$value)
		{
			$array_cols[$value]=0;
			
		}
		//print_r($array_cols);
			echo "<th>Average</th></tr>";
				echo "<tr><td class='stick' style='background-color:red'>Regular subjects</td></tr>";
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							  $id=$field;
							  $name=$field;
							//echo "<br>";
							$query_col="select c7 from t114_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										
										if(array_search(trim($field),$regular_subject_code)!=null)
						
								echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$regular_subject_code)."</td>";
								else if(array_search(trim($field),$oe_subject_code)!=null)
									echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$oe_subject_code)."</td>";
								else if(array_search(trim($field),$pe_subject_code)!=null)
									echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$pe_subject_code)."</td>";
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
										
											 $teacher_fid=$row_col[0];
											if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											//echo "<br>subjectid=$id && fid=$teacher_fid</br>";
											   $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo "rows='$rows2'<br>";
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															$cal=0;
															echo "<tr><td></td><td>".array_search(trim($teacher_fid),$faculty_code)."</td>";
															foreach($row2 as $key2=>$field2)
															{
																
																
																	echo "<td>$field2</td>";
																$cal+=$field2;
																
															}
															
															$cal=round($cal/10,2);
															echo "<td>$cal</td>";
														}
														
														
														
													}
												}
										
									}
								}
								//print_r($array_cols);
								
									
									echo "</tr>";
												
							
							}
						}
					}
				}
			}
			
			
			
			
			echo "<tr><td class='stick' style='background-color:red'>BATCH-LAB</td></tr>";
			$query="select c43 from t111_".$property_decode['view_from_database']['value'];
			//SPL-LAB subject wise comparision
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							  $id=$field;
							  $name=$field;
							//echo "<br>";
							$query_col="select c7 from t114_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										
										if(array_search(trim($field),$regular_subject_code)!=null)
						
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$regular_subject_code)."</td>";
									else if(array_search(trim($field),$oe_subject_code)!=null)
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$oe_subject_code)."</td>";
									else if(array_search(trim($field),$pe_subject_code)!=null)
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$pe_subject_code)."</td>";
										else if(array_search(trim($field),$batch_lab_subject_code)!=null)
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$batch_lab_subject_code)."</td>";
												while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
										
											 $teacher_fid=$row_col[0];
											if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											//echo "<br>subjectid=$id && fid=$teacher_fid</br>";
											   $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo "rows='$rows2'<br>";
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															
																$cal=0;
															echo "<tr><td></td><td>".array_search(trim($teacher_fid),$faculty_code)."</td>";
															foreach($row2 as $key2=>$field2)
															{
																
																
																	echo "<td>$field2</td>";
																$cal+=$field2;
																
															}
															
															$cal=round($cal/10,2);
															echo "<td>$cal</td>";
															
														
														}
														
													}
												}
										
									}
								}
								//print_r($array_cols);
								
									
									echo "</tr>";
												
							
							}
						}
					}
				}
			}
			
			
			echo "<tr><td class='stick' style='background-color:red'>OE Subjects</td></tr>";
			$query="select c37 from t107_".$property_decode['view_from_database']['value'];
			//oe subject wise comparision
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							
							 $id=$field;
							  $name=$field;
							//echo "<br>";
							$query_col="select c7 from t114_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										
										if(array_search(trim($field),$regular_subject_code)!=null)
						
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$regular_subject_code)."</td>";
									else if(array_search(trim($field),$oe_subject_code)!=null)
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$oe_subject_code)."</td>";
									else if(array_search(trim($field),$pe_subject_code)!=null)
										echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$pe_subject_code)."</td>";
												while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
										
											 $teacher_fid=$row_col[0];
											if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											//echo "<br>subjectid=$id && fid=$teacher_fid</br>";
											   $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo "rows='$rows2'<br>";
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															
																$cal=0;
															echo "<tr><td></td><td>".array_search(trim($teacher_fid),$faculty_code)."</td>";
															foreach($row2 as $key2=>$field2)
															{
																
																
																	echo "<td>$field2</td>";
																$cal+=$field2;
																
															}
															
															$cal=round($cal/10,2);
															echo "<td>$cal</td>";
															
														
														}
														
													}
												}
										
									}
								}
								//print_r($array_cols);
								
									
									echo "</tr>";
												
							
							}
						}
					}
				}
			}
			echo "<tr><td class='stick' style='background-color:red'>PE Subjects</td></tr>";
			// pe subject Comparision
			$query="select c38 from t108_".$property_decode['view_from_database']['value'];
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							$id=$field;
							  $name=$field;
							//echo "<br>";
							$query_col="select c7 from t114_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										
										
										if(array_search(trim($field),$regular_subject_code)!=null)
											echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$regular_subject_code)."</td>";
										else if(array_search(trim($field),$oe_subject_code)!=null)
											echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$oe_subject_code)."</td>";
										else if(array_search(trim($field),$pe_subject_code)!=null)
											echo "<tr><td style='background-color:yellow'>".array_search(trim($field),$pe_subject_code)."</td>";
										while ($row_col = mysqli_fetch_row($result_col)) 
										{
										//echo "$columns<br>";
										
											 $teacher_fid=$row_col[0];
											if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											//echo "<br>subjectid=$id && fid=$teacher_fid</br>";
											   $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo "rows='$rows2'<br>";
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
																$cal=0;
															echo "<tr><td></td><td>".array_search(trim($teacher_fid),$faculty_code)."</td>";
															foreach($row2 as $key2=>$field2)
															{
																
																
																	echo "<td>$field2</td>";
																$cal+=$field2;
																
															}
															
															$cal=round($cal/10,2);
															echo "<td>$cal</td>";
															
														
														}
														
													}
												}
										
									}
								}
								//print_r($array_cols);
								
									
									echo "</tr>";
												
							
							}
						}
					}
				}
			}
			
			echo "</table></div></div>";
			echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='print()'>print</button>
				</div></div>";
				
				 //logging
	 $desc=":,viewed subject wise faculty feedback data";
	 $query_log="(".$query.")";
require_once('logging.php');
////
	
}
else{

	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
}

?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>

<div align='center' class='footer'>

</div>