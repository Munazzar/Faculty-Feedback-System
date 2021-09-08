<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");

echo "hello";
	
		$tmpfname = "docs/faculty_mail.xlsx";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
		
		for ($row = 1; $row <= $lastRow; $row++) {
		
	
			 $faculty_name=$worksheet->getCell('A'.$row)->getValue();
			 $mail=$worksheet->getCell('B'.$row)->getValue();
			$pass=md5($mail);
			 $insert="update t102 set c42='$mail',c41='$pass' where c6='$faculty_name'";
			
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