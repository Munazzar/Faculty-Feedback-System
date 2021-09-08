<?php

ini_set('max_execution_time', 300);
require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");
require_once("code_insert.php");
require_once("database_connect.php");
$sheet=0;
$dir='./docs/faculty_assigned/regular_faculty/';
$files_in_dir=scandir($dir);
$file_name="";
$year="";
$count=1;
$id=Array();
$sub=Array();
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
		$tmpfname = "docs/faculty_assigned/regular_faculty/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 
//echo "$file_name<br>";
		$objPHPExcel->setActiveSheetIndex(0); 
		for ($row = 1; $row <= $lastRow; $row++) {
			
			 $subject_id='';
			  
			$subject=$worksheet->getCell('A'.$row)->getValue();
			$teacher_name=$worksheet->getCell('B'.$row)->getValue();
			if($year=='oe_faculty')
			{
				$subject_id=$oe_subject_code[trim($subject)];
				$year_id=$subject_id;
			}
			else if($year=='pe_faculty')
			{
				$subject_id=$pe_subject_code[trim($subject)];
				$year_id=$subject_id;
			}
			else
			{
				$subject_id=$regular_subject_code[trim($subject)];
				$year_id=$year_code[trim($year)];
			}
			
		
			$teacher_id=$faculty_code[trim($teacher_name)];
			
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
			$time=(string)$now->format("Y-m-d/H:i:s");
		
	 $date_time=(string)$now->format("YmdHisu");
			   echo $query="insert into t103_".$property_decode['current_database']['value']."(c39,c7,c15,c25,c23) values('$date_time','$teacher_id','$subject_id','$year_id','$time')";
			
			echo "<br><br>";
			if(mysqli_query($con,$query))
			{
				echo  $query."<br>";
			}
			else
				echo "error".mysqli_error();
			
		}
		
		

	


	}
		
		
		
  

?>