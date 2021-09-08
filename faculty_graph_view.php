<?php
ob_start();
?>
<?php
//error_reporting(0);
session_start();
if(isset($_SESSION["admin"])){

require_once("database_connect.php");
require_once("property_read.php");
require_once("code.php");

////
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
		  <link rel="stylesheet" href="css/style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>	
		<script type='text/javascript'>
		function get_graph(data,id,text){
			//alert(data);
			var $label=['attr1','attr2','attr3','attr4','attr5','attr6','attr7','attr8','attr9','attr10','Avg'];
			var $data=data;
			var $text=text;
		var ctx = document.getElementById(id).getContext('2d');
		
var myChart = new Chart(ctx, {
	  
    type: 'bar',
    data: {
        labels: $label,
        datasets: [{
            label: $text,
            data: $data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
				'rgba(113, 241, 69, 0.5)',
                'rgba(255, 39, 28, 0.5)',
                  'rgba(57, 225, 87, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(0, 0, 0, 0.5)',
                'rgba(0, 0, 0, 0.6)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
				'rgba(113, 241, 69, 1)',
               'rgba(255, 39, 28, 1)',
                'rgba(57, 225, 87, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
				
            ],
            borderWidth: 1
        }]
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
			
			float:left;
		}
		</style>
		
		<body>

		<?php
		$columns=$property_decode['t104']['final-admin'];
		//logging
		$desc=":,viewd faculty feedback data in term of graphs";
		//$query_log="(".$query2.")";
		require_once('logging.php');
		
												//////
			
			echo "<div align='center' class='noprint'><h3> Faculty Feedback Data</h3></div><hr>";
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
			<td>Avg=Average Value</td>
			</tr></table>";
			echo "<div align='center' id='result_box'>";
	$query2="select $columns from t114_".$property_decode['view_from_database']['value'];
		if($result2=mysqli_query($con,$query2))
		{
			if(($rows2=mysqli_num_rows($result2))>0)
			{
				//echo "rows='$rows2'<br>";
				while ($row2 = mysqli_fetch_assoc($result2)) 
				{
					$faculty_id='';
					$faculty_name='';
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
						}
						else
							array_push($data,$value);
						
					}
					 $data=json_encode($data);
					 $can_id=$faculty_id.$subject_id;
					 $text=$faculty_name." for ".$subject_name;
					//print_r($data);
						//print_r($array_cols);
						echo "<div class='canvas-div'><canvas id='$can_id' ></canvas></div>";
						echo "<script type='text/javascript'>
								get_graph($data,'$can_id','$text');
								</script>";
				
				}

			}
		}
			echo "</div></div>";		
}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}
?>
</body>