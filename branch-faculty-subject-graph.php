<?php
ob_start();
?>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<link rel="icon" type="image/png" href="images/vjitlogo.png"/>
		<title>VJIT FEEDBACK</title>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>	
		<script type='text/javascript' src='js/no_back.js'>

		</script>
		
		
		<script type='text/javascript'>
		function get_graph(data,id,text){
			//alert(data);
			var $label=['attr1','attr2','attr3'];
			var $data=data;
		//alert($data[0]);
			var $text=text;
			//array of colors for display
			var rgb=["rgba(220,53,69,1)","rgba(0,255,0,1)","rgb(0,0,160,1)","rgba(255,128,64,1)","rgba(128,255,255,1)",
			"rgba(225,255,0,1)","rgba(128,128,0,1)","rgba(64,0,64,1)","rgba(128,0,0,1)","rgba(255,53,69,1)",
			"rgba(128,0,255,1)","","","","","","","","","","",""];
			var rgb_back=["rgba(220,53,69,0.71)","rgba(0,255,0,0.75)","rgb(0,0,160,0.75)","rgba(255,128,64,0.75)","rgba(128,255,255,0.75)",
			"rgba(225,255,0,0.75)","rgba(128,128,0,0.75)","rgba(64,0,64,0.75)","rgba(128,0,0,0.75)","rgba(255,53,69,0.75)",
			"rgba(128,0,255,0.75)","","","","","","","","","","",""]
			var dataset_array=[];
			//setting data set in form of array
			for(i=0;i<$data.length;i++)
			{
				//alert($text[i]);
				//alert(myChart.data.datasets[i].label);
					dataset_array[i]={
						label:$text[i] ,
						backgroundColor: rgb_back[i],
						borderColor: rgb[i],
						borderWidth: 2,
					   
					  
						  data:$data[i],
					  }
			}
						
						
						
					var ctx = document.getElementById(id).getContext('2d');
					//alert($data);
			var myChart = new Chart(ctx, {
				  
				type: 'bar',
				data: {
					labels: ['Average'],
					type:'bar',
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
			margin-right:15px;
 
		}
		.canvas-div{
			
			float:left;
		}
		</style>
<body>
<?php

error_reporting(0);
session_start();
if(isset($_SESSION["admin"]))
{
require_once("property_read.php");
require_once("database_connect.php");
require_once("code.php");
echo "
<div align='center'><h4>Branch Wise Faculty  Feedback Data</h4>
	<form id='branch_select' action='branch-faculty-subject-graph.php' method='post'>
		<table class='table'>
		<tr><th>Select Branch</th>
		<td><input type='radio' value='CSE' name='branch' id='c13'> CSE</td>
		<td><input type='radio' value='MECH' name='branch' id='c13'> MECH</td>
		<td><input type='radio' value='IT' name='branch' id='c13'> IT</td>
		<td><input type='radio' value='ECE' name='branch' id='c13'> ECE</td>
		<td><input type='radio' value='EEE' name='branch' id='c13'> EEE</td>
		<td><input type='radio' value='CIVIL' name='branch' id='c13'> CIVIL</td>
<td><input type='radio' value='MBA' name='branch' id='c13'> MBA</td>
<td><input type='radio' value='HS' name='branch' id='c13'> HS</td>
		</tr>
		<tr><td><input type='submit' value='Get Data' title='year_select' class='btn btn-success'></td>
			<td><button value='clear' onclick='clear(this.title)' title='year_select' class='btn btn-default'>clear</button></td>
			<td><a href='admin-index.php'><input type='button' class='btn btn-basic' value='Home'></a></td>
		</tr>
		</table>
	</form>
	
</div>

<hr>
";
if(isset($_POST["branch"]))
{
	$branch=$_POST['branch'];
	$subject_fid;
		
	$columns=$property_decode['t104']['final-admin'];
	$query="select c7,c6 from t102 where c13='$branch'";
	echo "<div id='result_box'><div align='center' class='noprint'><h3> Faculty Feedback Data-$branch</h3><p>click on Home button to go back</p></div>";
	echo "</table></div></div>";
	echo "<div align='center' id='print'>
		<button class='btn btn-default' onclick='print()'>print</button>
		</div><br>";

	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_row($result)) 
			{
				$data_array=array();
				$subject_array=array();
				  $faculty_id=$row[0];
				  $faculty_name='';
				//echo "<br>";
				$query2="select $columns from t114_".$property_decode['view_from_database']['value']." where c7='$faculty_id'";
				if($result2=mysqli_query($con,$query2))
				{
					if(($rows2=mysqli_num_rows($result2))>0)
					{
						//echo "rows='$rows2'<br>";
						while ($row2 = mysqli_fetch_assoc($result2)) 
						{
							$subject_name='';
							$subject_id='';
							$data=array();
							
							foreach($row2 as $key2=>$value)
							{
								
								
								if($key2=='c7')
								{
									$faculty_id=$value;
									$faculty_name=array_search($value,$faculty_code);
									
								}
								else if($key2=='c15')
								{
									$subject_id=$value;
									if(array_search(trim($value),$regular_subject_code)!=null)
										$subject_name=array_search(trim($value),$regular_subject_code);
									else if(array_search(trim($value),$oe_subject_code)!=null)
										$subject_name=array_search(trim($value),$oe_subject_code);
									else if(array_search(trim($value),$pe_subject_code)!=null)
										$subject_name=array_search(trim($value),$pe_subject_code);
									else if(array_search(trim($value),$batch_lab_subject_code)!=null)
										$subject_name=array_search(trim($value),$batch_lab_subject_code);
									
									array_push($subject_array,$subject_name);
								}
								else if($key2=="c57")
									array_push($data,$value);
						
								
							}
								array_push($data_array,$data);
								
										
						}
									//if(empty($data))continue;
									
								//$text="$faculty_name";
							//print_r($subject_array);
							if(empty($data_array))continue;
							$subject_array=json_encode($subject_array);
							//print_r($data_array);
							//$data_set=json_encode($data_set);	
							$data_array=json_encode($data_array);
							echo "<div class='canvas-div' align='center'><h3>$faculty_name</h3><canvas id='$faculty_id' ></canvas></div>";
							echo "<script type='text/javascript'>
							get_graph($data_array,'$faculty_id',$subject_array);
							</script>";

					}
				}
			}
		}
	}
$desc=":,viewed branch wise faculty feedback data in terms of graphs";
require_once('logging.php');
////
}
}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
	
}
?>



