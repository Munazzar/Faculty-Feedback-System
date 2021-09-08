<?php
//error_reporting(0);
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
//$query="drop table t101";

/*
if(mysqli_query($con,$query))
{
	echo "deleted";
 $query='create table t101(c29 integer unique key auto_increment,c1 varchar(10) primary key,c2 varchar(10) not null,c3 varchar(20),c4 integer(1) not null default 0,c5 varchar(30),c23 varchar(30),c24 integer(1) default 1,c25 varchar(5),c15 varchar(50))';
 mysqli_query($con,$query);
}*/

$dir='./docs/student_t101/';
$files_in_dir=scandir($dir);
$year='';
$file_name='';
$count=0;
foreach($files_in_dir as $file)
{
	$file_details=pathinfo($file);
//print_r($file_details);
	if($file_details["extension"]=='xls')
	{
		$file_name=$file_details['basename'];
		$year=$file_details['filename'];
	}
	else
		continue;
	echo $file_name."<br>";
	$tmpfname = "docs/student_t101/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		/////////////////////////////////////////     PE OBJECT
		$tmpfname4 = "docs/PE/SUBJECT_STUDENT.xls";
			$excelReader4 = PHPExcel_IOFactory::createReaderForFile($tmpfname4);
			$excelObj4 = $excelReader4->load($tmpfname4);
			$worksheet4 = $excelObj4->getSheet(0);
			$lastRow4 = $worksheet4->getHighestRow();
			$objPHPExcel4 = new PHPExcel();
			$objPHPExcel4->setActiveSheetIndex(0); 
/////////////////////////////////////////////		
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");

		for ($row = 1; $row <= $lastRow; $row++) {
			 $cell=$worksheet->getCell('C'.$row);
			 $InvDate= $cell->getValue();
			if(PHPExcel_Shared_Date::isDateTime($cell)) {
				$InvDate = date($format='m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
				}	
			 
			$roll=$worksheet->getCell('A'.$row)->getValue();
			$name=$worksheet->getCell('B'.$row)->getValue();
			$year=$worksheet->getCell('D'.$row)->getValue();
			$subjects=$worksheet->getCell('E'.$row)->getValue();
			
			
			
			//Getting PE Subjects For Each Student Before Inserting
			
			
			
					for($row4=1;$row4<=$lastRow4;$row4++)
					{
						 $roll_id=$worksheet4->getCell('A'.$row4)->getValue();
						 if(strcasecmp($roll_id,$roll)==0)
						 {
							 $sub=$worksheet4->getCell('B'.$row3)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
							 
							 foreach($array_names as $key=>$v)
							{
								if($v==$sub)
								{
								$subjects=$subjects.$key.";";
									break;
								}
							}
							 
						
							
						 }
					}
			
			
			
			 $insert="insert into t101(c1,c5,c2,c23,c25,c15) values(";
			$insert=$insert.'"'.$roll.'","'.$name.'","'.$InvDate.'","'.$time.'","'.$year.'","'.$subjects.'")';
			$count++;
			echo $count." ".$insert."<br>";
			//if(mysqli_query($con,$insert))
			//{
			//echo  $insert."<br>";
			//}
			//else
				//echo("Error description: " . mysqli_error($con));
		}
		
}



 
		
		
		//echo "inserted <br>";
  

?>