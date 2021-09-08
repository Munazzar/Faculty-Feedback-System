<?php
		require_once("database_connect.php");
		require_once("property_read.php");
		require_once("code.php");
		$id='';
		$name='';
		$subject_fid;
		$array_cols;
		$cols=$property_decode['t104']['admin-main-final'];
	$columns=$property_decode['t104']['final-sum'];
			$comments;
		$i=0;
			$query='select c7 from t102';
			
			
			
		foreach($cols as $key=>$value)
		{
			$array_cols[$value]=0;
			
		}
		
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						foreach($row as $key=>$field)
						{
							
							 $id=$field;
							//echo "<br>";
							
								//echo"<tr><td><a href='admin-faculty-details.php?id=".$id."&name=$name' id='$id' title='$id' value='60' name='t104'>$name</td>";
							$query_col="select c15 from t103_".$property_decode['current_database']['value']." where c7='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										
											 $sub_id=$row_col[0];
											 	if($subject_fid[$id][$sub_id]!="")continue;
												$subject_fid[$id][$sub_id]=$sub_id;
											  $query2="select $columns from t104_".$property_decode['current_database']['value']." where c7='$id' and c15='$sub_id'";
											
												
												//////
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo "rows='$rows2'<br>";
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															
															foreach($row2 as $key2=>$field2)
															{
																
																if($key2=="c34")
																{
																	
																	if($field2!=null)
																		if(strpos($comments,$field2)==false)
																		$comments=$comments."/".$field2;
																}
																else
																	$array_cols[$key2]+=$field2;
																
																
															}
															
														
														}
														//print_r($array_cols);
														$cal=0;
														$check=0;
														 $check_query="select * from t114_".$property_decode['current_database']['value']." where c7='$id' and c15='$sub_id'";
														if($check_result=mysqli_query($con,$check_query))
															if($row_check=mysqli_num_rows($check_result))
																if($row_check>0)
																	$check=1;
																
														$t114_query='';
														if($check==1)
														{
															$t114_query="update t114_".$property_decode['current_database']['value']." set ";
														// calculating average here
														foreach($array_cols as $key=>$sum)
														{
															
															$val=round($sum/$rows2,2);
															$cal+=$val;
															
															$t114_query.="$key='$val',";
															$array_cols[$key]=0;
															
														}
														$cal=round($cal/10,2);
														$t114_query.="c34='$comments',c57='$cal' where c7='$id' and c15='$sub_id'";
														//echo "$t114_query<br>";
														
														}
														else 
														{
														$t114_query="insert into t114_".$property_decode['current_database']['value']."(c7,c15,c17,c18,c19,c20,c21,c22,c30,c31,c32,c33,c34,c57)values('$id','$sub_id'";
														// calculating average here
														foreach($array_cols as $key=>$sum)
														{
															
															$val=round($sum/$rows2);
															$cal+=$val;
															
															$t114_query.=",'$val'";
															$array_cols[$key]=0;
															
														}
														$cal=round($cal/10,2);
														$t114_query.=",'$comments','$cal')";
														//echo "$t114_query<br>";
															
														}
														
														if(mysqli_query($con,$t114_query)){
															//echo "Calculated!";
														//echo "$t114_query<br>";
														}
														else
															echo "Error:".mysqli_error();
														
															
													}
													$comments="";
												}
										}
									}
								}
								//print_r($array_cols);
								
									
								
												
							}
							
						}
					}
				}
			
			
			
			?>