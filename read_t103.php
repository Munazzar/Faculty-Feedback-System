<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
$query="drop table t103";
if(mysqli_query($con,$query))
{
	echo "deleted";
 $query='create table t103(c7 varchar(20),c15 varchar(30),c25 varchar(20),c23 varchar(30),c24 integer(1) default 1)';
 mysqli_query($con,$query);
}
for($file_name=73;$file_name<77;$file_name++)
{
		$tmpfname = "docs/faculty-103t-add/t103_y$file_name.xls";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");

		for ($row = 1; $row <= $lastRow; $row++) {
			 $insert="insert into t103(c7,c15,c25,c23) values(";
			$insert=$insert.'"'.$worksheet->getCell('A'.$row)->getValue().'","'.$worksheet->getCell('B'.$row)->getValue().'","'.$worksheet->getCell('C'.$row)->getValue().'","'.$time.'")';
					//echo  $insert."<br>";
			if(mysqli_query($con,$insert))
			{
				echo  $insert."<br>";
			}
			else
				echo "error".mysqli_error();
		}
		
}



 
		
		
		//echo "inserted <br>";
  

?>