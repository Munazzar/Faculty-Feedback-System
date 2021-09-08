<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");

echo "hello";
	
		$tmpfname = "docs/student_sections.xlsx";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
		
		for ($row = 1; $row <= $lastRow; $row++) {
		
	
			 $student_id=$worksheet->getCell('A'.$row)->getValue();
			 $section_code=$worksheet->getCell('B'.$row)->getValue();
				
			 $insert="update t101 set c25='$section_code' where c1='$student_id'";
			
					//echo  $insert."<br>";
			if(mysqli_query($con,$insert))
			{
				echo  $insert."<br>";
			}
			else
				echo "error".mysqli_error();
		}
	
		unlink($tmpfname);
		

		

		




 
		
		
		//echo "inserted <br>";
  

?>