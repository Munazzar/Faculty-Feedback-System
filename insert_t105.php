<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
		$tmpfname = "docs/year_list/year_list.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");

		for ($row = 1; $row <= $lastRow; $row++) {
			$year_id=$worksheet->getCell('A'.$row)->getValue();
			$branch=$worksheet->getCell('B'.$row)->getValue();
			$year=$worksheet->getCell('C'.$row)->getValue();
			$section=$worksheet->getCell('D'.$row)->getValue();
			 $insert="insert into t105(c25,c13,c12,c14,c23) values('$year_id','$branch','$year','$section','$time')";
		
			echo  $insert."<br>";
			mysqli_query($con,$insert);
		}
		




 
		
		
		//echo "inserted <br>";
  

?>