<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");
require_once("code_insert.php");
$dir = "./docs/student_year_update/";
$files_in_dir=scandir($dir);
$file_name="";

foreach($files_in_dir as $file)
{
	$file_details=pathinfo($file);
	//print_r($file_details);
	if($file_details["extension"]=='xlsx')
	{
		 $file_name=$file_details['basename'];
		$year=$file_details['filename'];
	}
	else
		continue;
		$tmpfname = "docs/student_year_update/$file_name";
//echo $tmpfname;
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		for ($row = 1; $row <= $lastRow; $row++) {
		$student_id=$worksheet->getCell('A'.$row)->getValue();	
		$year=$worksheet->getCell('B'.$row)->getValue();	
		$year_id=$year_code[$year];
		
		
		$query="update t101 set c25='$year_id' where c1='$student_id'";	
		//echo "<br>";
			if(mysqli_query($con,$query))
			{
			echo  $query."<br>";
			}
			else
				echo("Error description: " . mysqli_error($con));
			
		}
		
		//logging
 $desc=":$file_name file uploaded and data updated into t101 and file deleted from $tmpfname";
 require_once('logging_sub_admin.php'); 
		unlink($tmpfname);
}

?>