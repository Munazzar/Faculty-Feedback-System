<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");
$dir='./docs/OE/';
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
		$tmpfname = "docs/OE/$file_name";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		for ($row = 1; $row <= $lastRow; $row++) {
		$student_id=$worksheet->getCell('A'.$row)->getValue();	
		$oe_subject_name=$worksheet->getCell('B'.$row)->getValue();	
		$query="insert into t109_".$property_decode['current_database']['value']."(c1,c35)values('$student_id','$oe_subject_name')";	
		//echo "<br>";
			if(mysqli_query($con,$query))
			{
			echo  $query."<br>";
			}
			else
				echo("Error description: " . mysqli_error($con));
			
		}
		unlink($tmpfname);
}

?>