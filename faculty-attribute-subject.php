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
		function get_graph(data,id,text){
			//alert(data);
		var $label=['attr1','attr2','attr3','attr4','attr5','attr6','attr7','attr8','attr9','attr10','Avg'];
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
						backgroundColor: 'transparent',
						borderColor: rgb[i],
						borderWidth: 2,
					   
					  
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
			width:800px !important;
			height:500px !important;
			
 
		}
		@media only screen and (max-width: 450px) {
			canvas{
			width:400px !important;
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

//error_reporting(0);

if(isset($_SESSION["faculty"]))
{



require_once("property_read.php");
require_once("database_connect.php");
require_once("code_insert.php");
		
	$columns=$property_decode['t104']['final-admin'];
echo "<div align='center'><h2>Atrribute wise Analysis</h2></div>";
	echo "<div id='result_box' align='center'>";

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
			<td>Avg=Average Value</td>
			</tr></table>";
	
	

	
				$data_array=array();
				$subject_array=array();
				 $faculty_id=$_SESSION['faculty_id'];
				  $faculty_name='';
				//echo "<br>";
				$query2="select $columns from t114_".$property_decode['current_database']['value']." where c7='$faculty_id'";
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
								else 
									array_push($data,$value);
						
								
							}
								array_push($data_array,$data);
								
										
						}
									//if(empty($data))continue;
									
								//$text="$faculty_name";
							//print_r($subject_array);
						
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
				
				
				
				
				
				
				echo "<br><div align='center' id='print'>
		<button class='btn btn-default' onclick='print()'>print</button>
		</div><br>";
				
				
				
			echo "</div>";	
	
$desc=":,viewed branch wise faculty feedback data in terms of graphs";
require_once('logging.php');
////

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
