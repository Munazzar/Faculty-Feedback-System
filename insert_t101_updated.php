<?php
ini_set('max_execution_time', 900);


require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");
require_once("database_connect.php");
require_once("code_insert.php");
$dir='./docs/student_details/';
$files_in_dir=scandir($dir);
$year='';
$file_name='';
foreach($files_in_dir as $file)
{
	$file_details=pathinfo($file);
//print_r($file_details);
	if($file_details["extension"]=='xlsx')
	{
		$file_name=$file_details['basename'];
		$year=$year_code[$file_details['filename']];
	}
	else
		continue;


		echo "$file_name<br>";
		$tmpfname = "docs/student_details/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 

		$objPHPExcel->setActiveSheetIndex(0); 
		///////////////////////////////////
		
	
		
		
		
		//////////////////////
		for ($row = 1; $row <= $lastRow; $row++) 
		{
			$id=$worksheet->getCell('A'.$row)->getValue();
			 
			$name=$worksheet->getCell('B'.$row)->getValue();
			
			//echo "id=$id,name=$name,dob=$dob,year=$year,subject=$subject<br>";
				$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
			 $insert="insert into t101(c1,c2,c5,c23,c25) values(";
			$insert=$insert.'"'.$id.'","","'.$name.'","'.$time.'","'.$year.'")';
			echo $insert."<br>";
			
			//echo $insert;
			if(mysqli_query($con,$insert))
			{
			echo  $insert."<br>";
			}
			else
				echo "Error description: " . mysqli_error();
			
		}

	
unlink($tmpfname);
}
		
		


?>
