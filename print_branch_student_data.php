<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>

<script type='text/javascript' src='js/no_back.js'>

</script>

<?php
session_start();

if(isset($_SESSION['branch']))
{
	if($_SESSION['position']>='5')
	{
		require_once('database_connect.php');
		require_once('code.php');
		require_once('property_read.php');
		 $branch=$_SESSION['branch'];
		 
		 echo "<table class='table table-hover'>
		<tr><th>Select year</th>
		<td><input type='radio' value='1' name='year' id='c12'> 1 </td>
		<td><input type='radio' value='2' name='year' id='c12'> 2</td>
		<td><input type='radio' value='3' name='year' id='c12'> 3</td>
		<td><input type='radio' value='4' name='year' id='c12'> 4</td></tr>
		<tr><th>Select sec:</th>
		<td><input type='radio' value='a' name='sec' id='c14'> A </td>
		<td><input type='radio' value='b' name='sec' id='c14'> B</td>
		<td><input type='radio' value='c' name='sec' id='c14'> C</td>
		<td><input type='radio' value='d' name='sec' id='c14'> D</td>
		</tr>
		<tr><td></td><td><input type='button' value='Get Data' onclick='year_wise(this.title)' title='year_select' class='btn btn-success'></td>
			<td><button value='clear' onclick='clear(this.title)' title='year_select' class='btn btn-default'>clear</button></td>
			<td><a href='admin-index.php'><input type='button' class='btn btn-basic' value='Home'></a></td></tr>
		 
		 
		 
		 </table>";
		 
		 
		 $query="select c25 from t105 where c13='$branch'";
		 if($result=mysqli_query($con,$query))
		 {
			 while($row=mysqli_fetch_assoc($result))
			 {
				 foreach($row as $key=>$value)
				 {
					 
					 echo "$value<br>";
				 }
				 
				 
			 }
			 
			 
			 
		 }
		//echo $branch=array_search(trim($branch),$year_code);
		
		//$query="select $column from t101 where c25='$branch'";
		
		
	}
	
	
	
	
}

?>