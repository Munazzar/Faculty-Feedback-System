<?php
session_start();
require_once('property_read.php');
require_once('database_connect.php');
require_once "docs/Classes/PHPExcel.php";
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
		
		
	

<style>
.fixing{
margin-top:100px
}
.paging{
position:fixed;
right:10px;
top:5px
}
/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {
	
	margin-top:40px;
	margin-bottom:10px;
	}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
    margin-top:20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 10px;
  text-align: center;
  background-color: #f1f1f1;
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
				<h2>Faculty Photos </h2>
               <?php
				$dir='./images/faculty_images/';
				$files_in_dir=scandir($dir);
				$year='';
				$file_name='';
				echo "<div class='row'>";
				foreach($files_in_dir as $file)
				{
					$file_details=pathinfo($file);
					 $file_name=$file_details['filename'];
					  $image_name=$file_details['basename'];
					  if($file_details["extension"]!='jpg')
						{
							continue;
						}
				//print_r($file_details);
			$name='';
				$query="select c6 from t102 where c55='$file_name'";
				if($result=mysqli_query($con,$query))
					{
						if(($rows=mysqli_num_rows($result))>0)
						{
							
							while ($row = mysqli_fetch_assoc($result)) 
							{
								
								foreach($row as $key=>$field)
								{
									$name=$field;
								}
								
							}
						}
					}
				
				echo '<div class="column">
					<div class="card">
					   <img src="images/faculty_images/'.$image_name.'" alt="'.$file_name.'" width="95px" height="95px" >
					  <p style="font-size:20px;"><b>'.$file_name.'</b></p>
					 <p style="font-size:15px;">'.$name.'</p>
					</div>
				  </div>';

						
						
					
				}
				echo "</div>";
				
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
