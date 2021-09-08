<?php
ob_start();
?>  <meta charset="utf-8">
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

<?php
error_reporting(0);
session_start();
if(isset($_SESSION["sub-admin"])){

require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");



echo "<div align='center'>
<h2>Upload the following Files</h2>
<p>please read the documentation to confirm which files to upload</p>


";
echo '<div class="upload_div"><form method="post" enctype="multipart/form-data" action="upload_faculty_assign.php">
Student Data
<input type="file" name="studentdata[]" class="btn btn-default" id="fileToUpload" multiple="multiple">
<br>

	<input type="submit" value="Upload" class="btn btn-success"/>
	<a href="manage_database.php"><input type="button" value="Home" class="btn btn-default"/></a>

</form></div>';


echo "</div>";


if($_FILES["facultyassigned"]["name"]){
$target_dir = "./docs/faculty_assigned/faculty_assignment/";
$target_file = $target_dir . basename($_FILES["facultyassigned"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["facultyassigned"]["tmp_name"]);
   
}
// Check if file already exists
if (file_exists($target_file)) {
    unlink("./$target_file");
}
// Check file size
if ($_FILES["facultyassigned"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "xlsx" ) {
    echo "Sorry, only xlsx file is allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["facultyassigned"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["facultyassigned"]["name"]). " has been uploaded.";
		require_once('insert_t103_updated.php');
    } else {
        echo "Sorry, there was an error uploading your file faculty.";
    }
}
}



if($_FILES["regularsubject"]["name"]){
$target_dir = "./docs/subject_list/regular_subject_list/";
$target_file = $target_dir . basename($_FILES["regularsubject"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["regularsubject"]["tmp_name"]);
   
}
// Check if file already exists
if (file_exists($target_file)) {
    unlink("./$target_file");
}
// Check file size
if ($_FILES["regularsubject"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "xlsx" ) {
    echo "Sorry, only xlsx file is allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["regularsubject"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["regularsubject"]["name"]). " has been uploaded.";
		require_once('insert_t106.php');
		echo '<meta http-equiv="refresh" content="5;url=manage_database.php">';
    } else {
        echo "Sorry, there was an error uploading your file Subject.";
    }
}

}


//student data
if($_FILES["studentdata"]["name"]){
	$check=0;
$total=count($_FILES["studentdata"]["name"]);
$target_dir = "./docs/student_details/";
for($i=0; $i< $total;$i++)
{
$target_file = $target_dir . basename($_FILES["studentdata"]["name"][$i]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size

// Allow certain file formats
if($imageFileType != "xlsx" ) {
    echo "Sorry, only xlsx file is allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["studentdata"]["tmp_name"][$i], $target_file)) {
        echo "The file ". basename( $_FILES["studentdata"]["name"][$i]). " has been uploaded.";
		$check=1;
		//echo '<meta http-equiv="refresh" content="5;url=manage_database.php">';
    } else {
        echo "Sorry, there was an error uploading your file Subject.";
    }
}
}
if($check==1)
{
	require_once('insert_t101_updated.php');
}
}





echo "<div align='center' style='margin:10px;'><a href='manage_database.php'>click here</a> to go back to manage database page.</div>";

}	
else
{
echo "<div align='center'><h2 class='fs-title'>Please Proof that You an ADMIN <a href='admin.php'>click here</a></h2></div>";
exit();
}


?>