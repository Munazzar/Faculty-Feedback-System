<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");
$dir='./docs/subject_list/oe_subject_list/';
$files_in_dir=scandir($dir);
$file_name="";
$id="oe";
//counting number of rows/records
$query="select count(*) from t107_".$property_decode['current_database']['value'];
$count=0;
if($result=mysqli_query($con,$query))
{	
		$row = mysqli_fetch_row($result);
		$count=$row[0];
}	


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
		$tmpfname = "docs/subject_list/oe_subject_list/$file_name";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		for ($row = 1; $row <= $lastRow; $row++) {
		$oe_sub=$worksheet->getCell('A'.$row)->getValue();	
		$count++;
		$sub_id=$id.$count;
		echo $query="insert into t107_".$property_decode['current_database']['value']."(c37,c35)values('$sub_id','$oe_sub')";	
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