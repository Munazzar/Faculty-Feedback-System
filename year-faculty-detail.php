<?php
session_start();
//print_r($_SESSION);
?><script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
		 <link rel="icon" type="image/png" href="images/vjitlogo.png"/>
	<title>VJIT FEEDBACK - Year Records</title>
        <link rel="stylesheet" href="style2.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<script type='text/javascript' src='js/check_size.js'>
</script>

<script type='text/javascript' src='js/no_back.js'>

</script>
<body>
<?php
error_reporting(0);

if(isset($_SESSION["admin"]))
{
require_once("property_read.php");
require_once("database_connect.php");

$branches=array();
$sections=array();
$years=array();
$query="select DISTINCT(c13) from t105";
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
					array_push($branches, $field);
				}
			}
		}
	}
		
$query="select DISTINCT(c12) from t105";
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
					array_push($years, $field);
				}
			}
		}
	}

$query="select DISTINCT(c14) from t105";
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
  
				foreach($row as $key=>$field)
				{
					array_push($sections, $field);
				}
			}
		}
	}
		

echo "<div align='center'><h4>Year Wise Faculty  Feedback Data</h4>
	<form id='year_select'>
		<table class='table'>
		<tr><th>Select Branch</th>";
	
		foreach($branches as $br)
		echo "<td><input type='radio' value='$br' name='branch' id='c13'>&nbsp".strtoupper($br)."</td>";
	
		echo "</tr>
		<tr><th>Select year</th>";
		
		foreach($years as $yr)
		echo "<td><input type='radio' value='$yr' name='year' id='c12'>&nbsp $yr </td>";
		echo "
		</tr>
		<tr><th>Select sec:</th>
		";
		foreach($sections as $se)
		echo "<td><input type='radio' value='$se' name='sec' id='c14'>&nbsp".strtoupper($se)." </td>";
		
		echo "</tr>
		<tr><td><input type='button' value='Get Data' onclick='year_wise(this.title)' title='year_select' class='btn btn-success'></td>
			<td><button value='clear' onclick='clear(this.title)' title='year_select' class='btn btn-default'>clear</button></td>
			<td><a href='admin-index.php'><input type='button' class='btn btn-basic' value='Home'></a></td>
		</tr>
		</table>
	</form>
	
</div>";
echo "<hr>";

echo "<div id='result_box' align='center'>

</div>";
echo "<div style='position:fixed;top:0;right:0;padding:5px' style='padding:5px' align='right'>
				<a href='logout.php'><button class='btn btn-danger'>LOGOUT</button></a>
				</div>";

}
else
{
	echo "<div align='center'><h2 class='fs-title'>Please Proof that You are an ADMIN <a href='admin.php'>click here</a></h2></div>";
	exit();
	
}
?>