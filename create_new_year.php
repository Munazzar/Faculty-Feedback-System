<?php
ob_start();
?>
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
		
		<script type='text/javascript' src='js/check_size.js'>
		</script>
	
<script src="js/script_for_index.js" type="text/javascript">
</script>
<script src="js/script_new.js" type="text/javascript">
</script>
<script src="js/linkExp.js" type="text/javascript">
</script>
<script language="javascript" type="text/javascript">
     $(window).load(function() {
     $('#loading').hide();
  });
</script>


<?php
//error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){
ini_set('max_execution_time', 600);
require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");

$last_database='';
$key_last='';
if(empty($_POST['sno']))// this block is shown only before submitting
{
echo "<div align='center' style='margin-left:25px;margin-right:25px;'>
<h3>Enter data And Press Submit</h3>
<p>Please notice above databases and fill values accordingly</p>
<table class='table table-hover'>
<form action='create_new_year.php' method='POST'>
<tr><th>Sno</th><th>Database Id</th><th>Database Name</th></tr>";
				foreach($property_decode['database'] as $key=>$value)
				{
					$last_database=$value[0];//getting the last database
					
					echo "<tr><td>$key</td><td>$value[0]</td><td>$value[1]</td></tr>";//printing database
					$key_last=$key;//getting the last sno of databse
				}
 $last_database=substr($last_database,0,-1);//subtring from first to last-1
$last_database_name= substr($property_decode['database'][$key_last][1],0,-1);//subtring from first to last-1
$key_last++;


$last_database_name=$last_database_name.'II';//appending II to make SemII
$last_database=$last_database.'II';//appending II to make SemII

//logging
 $desc="attempting to create new database $last_database";
 
//showing the creating database value in text box for editing if needed
echo "
<tr><td><input type='text' placeholder='enter sno' name='sno' class='form-control' value='$key_last' required></td><td><input type='text' placeholder='enter database id' name='databaseid' class='form-control' required></td><td><input type='text' name='databasename' placeholder='enter database name' class='form-control' required></td></tr>
<tr><td colspan='3'><input type='submit' value='submit' class='btn btn-success'></td></tr>
</form>
</table>
</div>

";
}
if(isset($_POST['sno']))//this block is only shown after submitting
{
	echo "
<script type='text/javascript'>
document.getElementById('loading').style.display='block';
</script>

<div id='loading'>
  <img id='loading-image' src='images/loader.gif' alt='Loading...'/>
</div>";
	//getting the values after pressing submit
	 $last_database=$_POST['databaseid'];
	$last_database_name=$_POST['databasename'];
	$key_last=$_POST['sno'];
//updating the json object
$property_decode['database'][$key_last][0]=$last_database;
$property_decode['database'][$key_last][1]=$last_database_name;


//updating current database
$property_decode['current_database']['value']=$last_database;

//updating Json file (attribute.json)
$newJsonString = json_encode($property_decode);
file_put_contents('attribute.json', $newJsonString);
	

//creating the database cluster
$query="create table t104_$last_database(c29 integer ,c27 integer PRIMARY KEY auto_increment,c7 varchar(20) ,c17 varchar(5),c18 varchar(5),c19 varchar(5),c20 varchar(5),c21 varchar(5),c22 varchar(5),c30 varchar(5),c31 varchar(5),c32 varchar(5),c33 varchar(5),c34 varchar(100),c15 varchar(50),c23 varchar(30),c24 integer(1) default 1,c25 varchar(20))";

if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();



$query="create table t103_$last_database(c39 varchar(40) primary key,c7 varchar(20) not null,c15 varchar(30) not null,c25 varchar(20) not null)";

if(mysqli_query($con,$query))
{
//	echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();




$query="create table t106_$last_database(c16 varchar(20) primary key,c26 varchar(20) unique key)";
if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();




$query="create table t107_$last_database(c37 varchar(5) primary key,c35 varchar(10) not null unique key)";

if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
//	echo $query;
}
else
	echo "Error ".mysqli_error();




$query="create table t108_$last_database(c38 varchar(10) primary key,c36 varchar(20) not null unique key)";	

if(mysqli_query($con,$query))
{
//	echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();



$query="create table t109_$last_database(c1 varchar(10) ,c35 varchar(20) not null)";	

if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();

$query="create table t110_$last_database(c1 varchar(10) ,c36 varchar(20) not null)";	

if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();



$query="create table t111_$last_database(c43 varchar(20),c44 varchar(20) not null unique key)";

if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();

$query="create table t112_$last_database(c1 varchar(20),c44 varchar(20) not null)";
if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();




$query="create table t114_$last_database(c7 varchar(20),c15 varchar(50),c17 varchar(5),c18 varchar(5),c19 varchar(5),c20 varchar(5),c21 varchar(5),c22 varchar(5),c30 varchar(5),c31 varchar(5),c32 varchar(5),c33 varchar(5),c34 varchar(5000),c57 varchar(5))";
if(mysqli_query($con,$query))
{
	//echo "<br>database Created<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();






//logging
 $desc=":new database cluster $last_database created and all the studends years are updated";


//updating year
$query="select c29,c25 from t101";
if($result=mysqli_query($con,$query))
{
	if(($rows=mysqli_num_rows($result))>0)
			{
				$id='';
				$year='';
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $key=>$value)
					if($key==0)
						$id=$value;
					else if($key==1)
					{
						
						$year=++$value;
						if(substr($year,-1)<7)
						{
						$query="update t101 set c25='$year' where c29='$id'";
						if(mysqli_query($con,$query))
						{
							//echo "<br>all year data updated<br>";
							//echo $query;
						}
						else
							echo "Error ".mysqli_error();
						
						}
					}
				
				}
				
				
				
			}

	
}

$query="update t101 set c4=0,c3=null where 1=1";
if(mysqli_query($con,$query))
{
	//echo "<br>all c4 values set to 0<br>";
	//echo $query;
}
else
	echo "Error ".mysqli_error();

echo "
<script type='text/javascript'>
document.getElementById('loading').style.display='none';
</script>";

echo "<div align='center' class='manage_database_div'>
<h2>Upload the following Folder</h2>
<p>please read the documentation to confirm which folders to upload</p>
<p>Note: You can skip this now and upload files later</p>

";
echo '<div class="upload_div"><form method="post" enctype="multipart/form-data" action="upload.php">

regular suject list
	<input type="file" name="regularsubject" class="btn btn-default" id="fileToUpload">
	OE Subject list
		<input type="file" name="oesubject" class="btn btn-default" id="fileToUpload">
		PE Subject list
			<input type="file" name="pesubject" class="btn btn-default" id="fileToUpload">
			OE Student List
			<input type="file" name="oestudent" class="btn btn-default" id="fileToUpload">
			PE Student List
			<input type="file" name="pestudent" class="btn btn-default" id="fileToUpload">
			faculty Assigned
    	<input type="file" name="facultyassigned" class="btn btn-default" id="fileToUpload">
			<br>
    <input type="submit" value="Upload" class="btn btn-default"/>
	<a href="manage_database.php"><input type="button" value="Skip" class="btn btn-basic"/>
</form></div>';


echo "</div>";
}


}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}

//logging

 require_once('logging_sub_admin.php');
?>