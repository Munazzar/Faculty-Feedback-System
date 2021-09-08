<style>
th{
	position: sticky;
  top: 0;
  padding:5px;
  background:#e5e5e5;
}
</style>
<?php
error_reporting(0);
	require_once("property_read.php");
	require_once("database_connect.php");
	require_once("code.php");
	$text=$_REQUEST['text'];
$columns=$property_decode['t104']['year-student-faculty'];
$cols=$property_decode['t104']['year-student-faculty-array'];
$teacher_fid;
$subject;
$student_count=0;
$student_list=array();
foreach($cols as $key=>$value)
		{
			$array_cols[$value]=0;
			
		}

		
		echo "<div align='right' style='padding:5px'>
				<button class='btn btn-primary' onclick='student_year_wise(this.title)' title='year_select'>Get Average</button>
				</div><div id='result_box'> ";
		
	 $query="select c25 from t105  where 1=1".$text;
	 //logging
	 $desc=":,viewed year wise faculty feedback data";
	 $query_log="(".$query.")";
require_once('logging.php');
////
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				
				foreach($row as $key=>$field)
				{
					$query2="select c13,c12,c14 from t105 where c25='$field'";
					if($result2=mysqli_query($con,$query2))
					{
						if(($rows2=mysqli_num_rows($result2))>0)
						{
							
							while ($row2 = mysqli_fetch_assoc($result2)) 
							{
								echo "<h2>";
								foreach($row2 as $key2=>$field2)
								{
									echo "$field2  ";
								}
								echo "</h2><br>";
								
							}
							echo "<table class='table' id='table' style='text-align:center'>";
							
							foreach($cols as $columns_insert=>$value)
							{
							echo "<th>".$array_names[trim($value)]."</th>";
							
							}
							echo "<th>Average</th></tr>";
							 $query3="select c29 from t104_".$property_decode['view_from_database']['value']." where c25='$field'";
							if($result3=mysqli_query($con,$query3))
							{
								if(($rows3=mysqli_num_rows($result3))>0)
								{
									//echo "rows='$rows3'<br>";
									while ($row3 = mysqli_fetch_assoc($result3)) 
									{
										
										foreach($row3 as $key3=>$field3)
										{
											
											if(in_array($key3,array('c29')))
											{
												$teacher_fid=$field3;
											if($teacher_id[$field][$teacher_fid]!="")continue;
											$teacher_id[$field][$teacher_fid]=$teacher_fid;
											echo "<tr><td style='background-color:yellow'>$teacher_fid</td></tr>";
												 $query4="select $columns from t104_".$property_decode['view_from_database']['value']." where c25='$field' and c29='$field3'";
												
												if($result4=mysqli_query($con,$query4))
												{
													if(($rows4=mysqli_num_rows($result4))>0)
													{
														//echo "rows='$rows3'<br>";
														while ($row4 = mysqli_fetch_assoc($result4)) 
														{
															$avg=0;
															echo "<tr><td></td>";
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
																
																
																
																if(in_array($key4,array('c7')))
																{
																echo "<td>".array_search($field4,$faculty_code)."</td>";
																}
																else if(in_array($key4,array('c15')))
																{
																	if(array_search(trim($field4),$regular_subject_code)!=null)
																		echo "<td>".array_search(trim($field4),$regular_subject_code)."</td>";
																	else if(array_search(trim($field4),$oe_subject_code)!=null)
																		echo "<td>".array_search(trim($field4),$oe_subject_code)."</td>";
																	else if(array_search(trim($field4),$pe_subject_code)!=null)
																		echo "<td>".array_search(trim($field4),$pe_subject_code)."</td>";
																			else if(array_search(trim($field4),$batch_lab_subject_code)!=null)
																	echo "<td>".array_search(trim($field4),$batch_lab_subject_code)."</td>";
																}
																else if(in_array($key4,array('c34')))
																{
																	echo "<td>".$field4."</td>";
																}
																else
																{
																	echo "<td>$field4</td>";
																$avg+=$field4;
																}
															}
															$avg/=10;
															echo "<td>".$avg."</td>";
															echo "</tr>";
														}
													}
													
										
												
												}
											}
												
											
											
										}
										
									
									
									
									}
								}
							}
							echo "<tr style='background-color:cyan'><td colspan='4'>Number Of Students Given Feedback</td><td>".$student_count."</td></tr>";
								$student_count=0;
							echo "</table>";
						}
					}
				}
			}
		}
		
	}
	echo "</div>";
	echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='print()'>print</button>
				</div></div>";
				
				

?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2k19</h6>
</div>