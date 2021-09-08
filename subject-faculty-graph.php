<?php
ob_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
		 <link rel="icon" type="image/png" href="images/vjitlogo.png"/>
		 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>	
	<title>VJIT FEEDBACK</title>
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>	
		
		
		
		<script type='text/javascript'>
		function get_graph(data,id,text){
			//alert(data);
			var $label=['attr1','attr2','attr3','attr4','attr5','attr6','attr7','attr8','attr9','attr10','Avg'];
			var $data=data;
		//alert($data[0]);
			var $text=text;
			//array of colors for display
			var rgb=["rgba(220,53,69,0.75)","rgb(0,0,160,0.75)","rgba(0,255,0,0.75)","rgba(255,128,64,0.75)","rgba(128,255,255,0.75)",
			"rgba(225,255,0,0.75)","rgba(128,128,0,0.75)","rgba(64,0,64,0.75)","rgba(128,0,0,0.75)","rgba(255,53,69,0.75)",
			"rgba(128,0,255,0.75)","","","","","","","","","","",""]
			var dataset_array=[];
			//setting data set in form of array
for(i=0;i<$text.length;i++)
{
	//alert($text[i]);
	//alert(myChart.data.datasets[i].label);
		dataset_array[i]={
            label:$text[i] ,
            backgroundColor: 'transparent',
            borderColor: rgb[i],
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: rgb[i],
			  data:$data[i],
          }
}
			
			
			
		var ctx = document.getElementById(id).getContext('2d');
		//alert($data);
var myChart = new Chart(ctx, {
	  
    type: 'line',
    data: {
		
        labels: $label,
		type:'line',
       datasets: dataset_array
		
		
    },
      options: {
		 responsive: true,
    maintainAspectRatio: false,
        scales: {
			
            yAxes: [{
                ticks: {
                    beginAtZero:true,
					steps: 10,
					stepValue: 1,
					max: 10
                }
            }]
			
        }
    }
});



		}
		
		
		function printpage()
		{
			
			window.print();
		}
		</script>
		
		<style>
		
		canvas{
			width:400px !important;
			height:350px !important;
 
		}
		.canvas-div{
			margin-right:35px;
			float:left;
		}
		</style>
		



<?php

	error_reporting(0);
session_start();
if(isset($_SESSION['admin'])){

require_once("code.php");
		require_once("database_connect.php");
		require_once("property_read.php");
		$id='';
		$name='';
	$teacher_id;
		$array_cols;
		
		
		$cols=$property_decode['t104']['graph-labels'];
		$columns=$property_decode['t104']['admin-faculty-detail'];
		$i=0;
		
			 $query='select c16 from t106_'.$property_decode['view_from_database']['value'];
			 
			 
			 
			echo "<div id='result_box' align='center'><div align='center'><h2> subject wise Faculty Feedback in terms of Average</h2></div>";
				echo "<div align='center' id='print'>
				<button class='btn btn-default' onclick='printpage()'>print</button>
				</div><br>";
	
			
		
				
				echo "<table class='table'><tr>
			<td>attr1=Subject Knowledge</td>
			<td>attr2=Communication Skills</td>
			<td>attr3=Presentation Skills</td>
			<td>attr4=Punctuality</td>
			<td>attr5=Control Over the class</td></tr><tr>
			<td>attr6=Audibility</td>
			<td>attr7=Professionalism</td>
			<td>attr8=Content of Lecture</td>
			<td>attr9=Clarification of Doubts</td>
			<td>attr10=Explanation with examples</td>
			<td>attr11=Average Value</td>
			
			
			</tr></table>";
			
			
		foreach($cols as $columns_insert=>$value)
			$array_cols[$value]=0;
			
		
		 

			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$subject_name='';
						$data_array=array();
						$faculty_array=array();
						foreach($row as $key=>$field)
						{
							
							
							
							  $id=$field;
							  $name=$field;
							//echo "<br>";
							
							
							
						
							
						 $query_col="select c7 from t103_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										//echo $query_col;
										if(array_search(trim($field),$regular_subject_code)!=null)
										$subject_name=array_search(trim($field),$regular_subject_code);
								
								
								
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
											$data=array();
											 $teacher_fid=$row_col[0];
											 if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											
											  $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo $query2;
															
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															$cal=0;
															foreach($row2 as $key2=>$field2)
															{
																$cal+=$field2;
																array_push($data,$field2);
																
															}
															
															$cal=round($cal/10,2);
														array_push($data,$cal);
														}
														$faculty_name=array_search(trim($teacher_fid),$faculty_code);
														array_push($faculty_array,$faculty_name);
													
														
														
														
														//if(empty($data))continue;
														array_push($data_array,$data);
														//print_r($data_array);
													}
												}
												
												
												
										
										}
										
									
								}
								
												
							
							}
						}
						
						
						$text="Comparision for $subject_name";
						$data_set=array();
						if(empty($data_array))continue;
					$faculty_array=json_encode($faculty_array);
					//print_r($data_array);
					//$data_set=json_encode($data_set);	
					$data_array=json_encode($data_array);
						echo "<div class='canvas-div'><h3>$subject_name</h3><canvas id='$id' ></canvas></div>";
														echo "<script type='text/javascript'>
																get_graph($data_array,'$id',$faculty_array);
																</script>";
						
						
					}
				}
			}
			
			
			
			
			$query="select c43 from t111_".$property_decode['view_from_database']['value'];
			//SPL-LAB subject wise comparision
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$subject_name='';
						$data_array=array();
						$faculty_array=array();
						foreach($row as $key=>$field)
						{
							
							
							
							  $id=$field;
							  $name=$field;
							//echo "<br>";
							
							
							
						
							
						 $query_col="select c7 from t103_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										//echo $query_col;
										if(array_search(trim($field),$batch_lab_subject_code)!=null)
										$subject_name=array_search(trim($field),$batch_lab_subject_code);
								
								
								
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
											$data=array();
											 $teacher_fid=$row_col[0];
											 if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											
											  $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo $query2;
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															$cal=0;
															foreach($row2 as $key2=>$field2)
															{
																$cal+=$field2;
																array_push($data,$field2);
																
															}
															
															$cal=round($cal/10,2);
														array_push($data,$cal);
														}
														$faculty_name=array_search(trim($teacher_fid),$faculty_code);
														array_push($faculty_array,$faculty_name);
													
														
														
														
														//if(empty($data))continue;
														array_push($data_array,$data);
													}
												}
												
												
												
										
										}
										
									
								}
								
												
							
							}
						}
						
						
						$text="Comparision for $subject_name";
						$data_set=array();
						if(empty($data_array))continue;
					$faculty_array=json_encode($faculty_array);
					//print_r($data_array);
					//$data_set=json_encode($data_set);	
					$data_array=json_encode($data_array);
						echo "<div class='canvas-div'><h3>$subject_name</h3><canvas id='$id' ></canvas></div>";
														echo "<script type='text/javascript'>
																get_graph($data_array,'$id',$faculty_array);
																</script>";
						
						
					}
				}
			}
			
			
				
			$query="select c37 from t107_".$property_decode['view_from_database']['value'];
			//oe subject wise comparision
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$subject_name='';
						$data_array=array();
						$faculty_array=array();
						foreach($row as $key=>$field)
						{
							
							  $id=$field;
							  $name=$field;
							//echo "<br>";
							
						$query_col="select c7 from t103_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										//echo $query_col;
										if(array_search(trim($field),$oe_subject_code)!=null)
										$subject_name=array_search(trim($field),$oe_subject_code);
								
								
								
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
											$data=array();
											 $teacher_fid=$row_col[0];
											 if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											
											  $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo $query2;
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															$cal=0;
															foreach($row2 as $key2=>$field2)
															{
																$cal+=$field2;
																array_push($data,$field2);
																
															}
															
															$cal=round($cal/10,2);
														array_push($data,$cal);
														}
														$faculty_name=array_search(trim($teacher_fid),$faculty_code);
														array_push($faculty_array,$faculty_name);
													
														
														
														
														//if(empty($data))continue;
														array_push($data_array,$data);
													}
												}
												
												
												
										
										}
										
									
								}
								
												
							
							}
						}
						
						
						$text="Comparision for $subject_name";
						$data_set=array();
						if(empty($data_array))continue;
					$faculty_array=json_encode($faculty_array);
					//print_r($data_array);
					//$data_set=json_encode($data_set);	
					$data_array=json_encode($data_array);
						echo "<div class='canvas-div'><h3>$subject_name</h3><canvas id='$id' ></canvas></div>";
														echo "<script type='text/javascript'>
																get_graph($data_array,'$id',$faculty_array);
																</script>";
						
						
					}
				}
			}
			// pe subject Comparision
			$query="select c38 from t108_".$property_decode['view_from_database']['value'];
			if($result=mysqli_query($con,$query))
			{
				if(($rows=mysqli_num_rows($result))>0)
				{
					
					while ($row = mysqli_fetch_assoc($result)) 
					{
						$subject_name='';
						$data_array=array();
						$faculty_array=array();
						foreach($row as $key=>$field)
						{
							$id=$field;
							  $name=$field;
							//echo "<br>";
							 $query_col="select c7 from t103_".$property_decode['view_from_database']['value']." where c15='$id'";
							if($result_col=mysqli_query($con,$query_col))
								{
									if(($rows_col=mysqli_num_rows($result_col))>0)
									{
										//echo "rows='$rows2'<br>";
										//echo $query_col;
										if(array_search(trim($field),$pe_subject_code)!=null)
										$subject_name=array_search(trim($field),$pe_subject_code);
								
								
								
										while ($row_col = mysqli_fetch_row($result_col) ) 
										{
										//echo "$columns<br>";
											$data=array();
											 $teacher_fid=$row_col[0];
											 if($teacher_id[$id][$teacher_fid]!="")continue;
											$teacher_id[$id][$teacher_fid]=$teacher_fid;
											
											  $query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c15='$id' and c7='$teacher_fid'";
												if($result2=mysqli_query($con,$query2))
												{
													if(($rows2=mysqli_num_rows($result2))>0)
													{
														//echo $query2;
														while ($row2 = mysqli_fetch_assoc($result2)) 
														{
															$cal=0;
															foreach($row2 as $key2=>$field2)
															{
																$cal+=$field2;
																array_push($data,$field2);
																
															}
															
															$cal=round($cal/10,2);
														array_push($data,$cal);
														}
														$faculty_name=array_search(trim($teacher_fid),$faculty_code);
														array_push($faculty_array,$faculty_name);
													
														
														
														
														//if(empty($data))continue;
														array_push($data_array,$data);
													}
												}
												
												
												
										
										}
										
									
								}
								
												
							
							}
						}
						
						
						$text="Comparision for $subject_name";
						$data_set=array();
						if(empty($data_array))continue;
					$faculty_array=json_encode($faculty_array);
					//print_r($data_array);
					//$data_set=json_encode($data_set);	
					$data_array=json_encode($data_array);
						echo "<div class='canvas-div'><h3>$subject_name</h3><canvas id='$id' ></canvas></div>";
														echo "<script type='text/javascript'>
																get_graph($data_array,'$id',$faculty_array);
																</script>";
						
						
					}
				}
			}
			echo "</div>";
		
				
				 //logging
	 $desc=":,viewed subject wise faculty feedback comparision data in terms of graphs";
	 $query_log="(".$query.")";
require_once('logging.php');
////
	

}
else{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
}	
	



?>

<div align='center' class='footer'>

</div>