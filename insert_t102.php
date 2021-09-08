<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
		$tmpfname = "docs/faculty_list/faculty_list.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
	  $now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
	  $faculty_id='f';
		for ($row = 1; $row <= $lastRow; $row++) {
			 $id=$faculty_id.$row;
			 $faculty_name=$worksheet->getCell('A'.$row)->getValue();
			 $faculty_branch=$worksheet->getCell('B'.$row)->getValue();
			 $insert="insert into t102(c7,c6,c13,c23) values('$id','$faculty_name','$faculty_branch','$time')";
					//echo  $insert."<br>";
			if(mysqli_query($con,$insert))
			{
			echo  $insert."<br>";
			}
			else
				echo "error".mysqli_error();
		}
		




 
		
		
		//echo "inserted <br>";
  

?>