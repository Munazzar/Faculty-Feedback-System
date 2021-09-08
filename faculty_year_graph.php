<?php
session_start();
require_once('property_read.php');
if(isset($_SESSION["faculty"])){


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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>	
		
		
		
		<script type='text/javascript'>
		function get_graph(data,id,text,year_name){
			//alert(year_name);
			var $label=['Average Values'];
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
			//setting data set in form of 
			var $variable=0
			for(j=0;j<year_name.length;j++)
			{
			for(i=0;i<$data[j].length;i++)
			{
				//alert($text[j][i]);
				
					dataset_array[$variable]={
						label:$text[j][i],
						backgroundColor: rgb_back[j],
						borderColor: rgb[j],
						borderWidth: 2,
					    data:$data[j][i],
					  }
					  $variable++;
			
			}
			}
			
			
						
						
						
					var ctx = document.getElementById(id).getContext('2d');
					//alert($data);
			var myChart = new Chart(ctx, {
				  
				type: 'bar',
				data: {
					labels: $label,
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
			width:800px !important;
			height:500px !important;
			
 
		}
		@media only screen and (max-width: 450px) {
			canvas{
			width:600px !important;
			height:300px !important;
			
 
		}
		}
		.canvas-div{
			
		
		}
		</style>
		
	

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
				
               
		<div class="fixing">
		
				<div id="search_box"></div>
				<div id='result' align='center'>
                <?php

error_reporting(0);
session_start();
if(isset($_SESSION["faculty"]))
{



require_once("property_read.php");
require_once("database_connect.php");

		
	$columns=$property_decode['t104']['final-admin'];

	
	echo "<div align='center'><h2>Year wise Analysis</h2>
	
	<p>color of graph changes when semester changes</p>
	</div>";
	
	echo "<div id='result_box' align='center'>";
		
				$data_total_array=array();
				$subject_total_array=array();
				$year_name=array();
		foreach($property_decode['database'] as $db_key=>$db_id)
		{
				 $year_now=$db_id[0];
		
				require("code_year.php");
			$subject_array=array();
				$data_array=array();
				 $faculty_id=$_SESSION['faculty_id'];
				  $faculty_name='';
				//echo "<br>";
				$query2="select $columns from t114_".$db_id[0]." where c7='$faculty_id'";
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
									
									$subject_name.="-".$db_id[1];
									array_push($subject_array,$subject_name);
									
								}
								else if($key2=="c57")
								{
									array_push($data,$value);
									array_push($data_array,$data);
								}
								
							}
								
								
										
						}
									if(empty($data_array))
									{
									}
									else
										array_push($year_name,$db_id[1]);	
									//if(empty($data))continue;
										array_push($data_total_array,$data_array);
									array_push($subject_total_array,$subject_array);
								//$text="$faculty_name";
							//print_r($subject_array);
						
							
					}
				}
				
				
				
				
				
				
				
				
				
				
			echo "</div>";	
	
$desc=":,viewed branch wise faculty feedback data in terms of graphs";
require_once('logging.php');
////
		}
		//print_r($data_total_array);
		//print_r($subject_total_array);
		
		//print_r($year_name);
		$subject_total_array=json_encode($subject_total_array);
							//print_r($data_array);
							//$data_set=json_encode($data_set);	
							$data_total_array=json_encode($data_total_array);
							$year_name=json_encode($year_name);
							echo "<div class='canvas-div' align='center'><h3>$faculty_name</h3><canvas id='$faculty_id' ></canvas></div>";
							echo "<script type='text/javascript'>
							get_graph($data_total_array,'$faculty_id',$subject_total_array,$year_name);
							</script>";
							
							echo "<div align='center' id='print'>
		<button class='btn btn-default' onclick='print()'>print</button>
		</div><br>";
}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
	
}
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
	<div align='center' style='position:fixed;bottom: 0;right: 0;'>
<h5><?php echo $property_decode['checknow'];?></h5>
</div>
    </body>
</html>
