<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");

echo "hello";
	
		$tmpfname = "docs/student_feedback_delete.xlsx";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
		
		for ($row = 1; $row <= $lastRow; $row++) {
		
	
			 $student_id=$worksheet->getCell('A'.$row)->getValue();
			 
				
			 $query="delete from t104_".$property_decode['current_database']['value']." where c29=(select c29 from t101 where c1='$student_id');";
			
					//echo  $insert."<br>";
		if(mysqli_query($con,$query))
			{
				echo  $query."<br>";
			}
			else
				echo "error".mysqli_error();
			
			$query2="update t101 set c3=NULL,c4='0' where c1='$student_id';";
			
					//echo  $insert."<br>";
		if(mysqli_query($con,$query2))
			{
				echo  $query2."<br>";
			}
			else
				echo "error".mysqli_error();
			
		}
	
		unlink($tmpfname);
		

		

		




 
		
		
		//echo "inserted <br>";
  

?>