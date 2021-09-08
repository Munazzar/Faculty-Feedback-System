<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");
$dir='./docs/subject_list/regular_subject_list/';
$files_in_dir=scandir($dir);
$file_name="";

//logging
	

$query="select count(*) from t106_".$property_decode['current_database']['value'];
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
		$tmpfname = "docs/subject_list/regular_subject_list/$file_name";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
		$subject_id='s';
		for ($row = 1; $row <= $lastRow; $row++) {
			$count++;
			$id=$subject_id.$count;
			 $subject_name=$worksheet->getCell('A'.$row)->getValue();
				
			echo  $insert="insert into t106_".$property_decode['current_database']['value']."(c16,c26,c23) values('$id','$subject_name','$time')";
			
					//echo  $insert."<br>";
			if(mysqli_query($con,$insert))
			{
				echo  $insert."<br>";
			}
			else
				echo "error".mysqli_error();
		}
	
		unlink($tmpfname);
		

		
}
		




 
		
		
		//echo "inserted <br>";
  

?>