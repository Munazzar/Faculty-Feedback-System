<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");

echo "hello";
	
		$tmpfname = "docs/faculty_code.xlsx";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
		
		for ($row = 1; $row <= $lastRow; $row++) {
		
	
			 $faculty_name=$worksheet->getCell('A'.$row)->getValue();
			 $code=$worksheet->getCell('B'.$row)->getValue();
				
			 $insert="update t102 set c55='$code' where c6='$faculty_name'";
			
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