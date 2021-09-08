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
                <h2><?php
				$faculty_name=$_SESSION['faculty_name'];
				date_default_timezone_set('Asia/Kolkata');
								$hours=(string)date('H');
									if($hours>00 && $hours <12)
										echo "<h2>Good morning!! $faculty_name</h2> ";
									else if($hours>=12 && $hours <17)
										echo "<h2>Good Afternoon!! $faculty_name</h2> ";
									else if($hours>=17 && $hours <24)
										echo "<h2>Good Evening!! $faculty_name</h2> ";
				
				if($_SESSION['position']==5)
				  		echo "<p style='font-size:25px;'>Kindly select HoD Option in the side bar to get the detailed information of all the faculty from ".$_SESSION['branch']." Department</p>";
				
				
				?></h2>
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
