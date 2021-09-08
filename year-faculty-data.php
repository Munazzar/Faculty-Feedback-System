<script type='text/javascript' src='js/check_size.js'>
</script>
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
$columns=$property_decode['t104']['year-faculty-detail'];
$cols=$property_decode['t104']['year-faculty-detail-array'];
$teacher_fid;
$subject;
$sub;
$comments;
$student_count=0;
$student_list=array();
$teacher_id=array();
foreach($cols as $key=>$value)
		{
			$array_cols[$value]=0;
			
		}
echo "<div align='center' style='padding:5px;opacity:0.7'><h4>click on the get data to go back</h4></div><div id='result_box'>";
	 $query="select c25 from t105  where 1=1".$text;
	 //logging
	 $query_log="(//".$query.")";
	 $desc=":,viewed year wise Faculty feedback data average";
require_once('logging.php');
/////
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
						
							echo "<th>Average</th>";
							echo "<th>Comments</th></tr>";
							 $query3="select c15,c7 from t104_".$property_decode['view_from_database']['value']." where c25='$field'";
							if($result3=mysqli_query($con,$query3))
							{
								if(($rows3=mysqli_num_rows($result3))>0)
								{
									//echo "rows='$rows3'<br>";
									while ($row3 = mysqli_fetch_assoc($result3)) 
									{
										
										foreach($row3 as $key3=>$field3)
										{
											
											if(in_array($key3,array('c15')))
											{
												
												
												$sub=$field3;
												
											}
											if(in_array($key3,array('c7')))
											{
												
												$teacher_fid=$field3;
												if($teacher_id[$field3][$sub]!="")continue;
												$teacher_id[$field3][$sub]=$teacher_fid;
												if(substr($sub,0,1)=='o')continue;
												 $query4="select $columns from t104_".$property_decode['view_from_database']['value']." where c25='$field' and c7='$field3' and c15='$sub'";
												//echo "<br>";
												
												if($result4=mysqli_query($con,$query4))
												{
													$comments='';
													if(($rows4=mysqli_num_rows($result4))>0)
													{
															//echo "rows='$rows4'<br>";
														while ($row4 = mysqli_fetch_assoc($result4)) 
														{
														
															foreach($row4 as $key4=>$field4)
															{
																	if(in_array($key4,array("c34")))
																{
																	
																		//echo "repeated $field4";
																	if($field4!=null)
																		if(strpos($comments,$field4)==false)
																		$comments=$comments.",".$field4;
																	
																}
																															
																else if(in_array($key4,array('c29')))
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
															
																else if(in_array($key4,array('c7')))
																continue;
															else if(in_array($key4,array('c15')))
															{
																$subject=$field4;
																continue;
															}
															else
																$array_cols[$key4]+=$field4;
															}
														}
													}
													
													echo "<tr><td>".array_search(trim($teacher_fid),$faculty_code)."</td>";
													if(array_search(trim($subject),$regular_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$regular_subject_code)."</td>";
													else if(array_search(trim($subject),$oe_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$oe_subject_code)."</td>";
													else if(array_search(trim($subject),$pe_subject_code)!=null)
														echo "<td>".array_search(trim($subject),$pe_subject_code)."</td>";
											else if(array_search(trim($subject),$batch_lab_subject_code)!=null)
															echo "<td>".array_search(trim($subject),$batch_lab_subject_code)."</td>";
									$cal=0;
									$val=0;
									// calculating average here
									foreach($array_cols as $key=>$sum)
									{
										
										if($key=='c7'||$key=='c15')continue;	
										$val=round($sum/$rows4,2);
										$cal+=$val;
										echo "<td>".$val."</td>";
										$array_cols[$key]=0;
										
									}
									$cal=round($cal/10,2);
									$comments=substr($comments,1);
									echo "<td>$cal</td>";
									echo "<td>$comments</td></tr>";
												
												}
											}
												
											
											
										}
										
									
									
									
									}
								}
							}
							echo "<tr style='background-color:cyan'><td colspan='4'>Number Of Students Given Feedback</td><td>$student_count</td></tr>";
								$student_count=0;
							echo "</table></div>";
							
						}
					}
				}
			}
		}

	}
//	print_r($teacher_id);
	echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='print()'>print</button>
				</div></div>";
				
		//print_r($teacher_id);		

?>
<a href='#result_box'><div  style='position:fixed;bottom:0;right:0;padding-top:25px;padding-right:25px;padding-left:25px;padding-bottom:75px'><img src='images/arrow.png' height='35px' width='20px'></div></a>
 <a href='#print'><div style='position:fixed;bottom:0;right:0;padding:25px'><img src='images/down-arrow.png' height='35px' width='20px'></div></a>

<div align='center' class='footer'>
<h6>Developed By -Munazzar CSE 2019</h6>
</div>