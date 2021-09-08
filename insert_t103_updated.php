<?php

ini_set('max_execution_time', 300);
require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");
require("code_insert.php");
require_once("database_connect.php");
$sheet=0;
$dir='./docs/faculty_assigned/faculty_assignment/';
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
		$tmpfname = "docs/faculty_assigned/faculty_assignment/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 
echo "$file_name<br>";
		$objPHPExcel->setActiveSheetIndex(0); 
		//print_r($pe_subject_code);
		for ($row = 1; $row <= $lastRow; $row++) {
			
			 $subject_id='';
			  
			$faculty_name=$worksheet->getCell('A'.$row)->getValue();
			$faculty_id=$faculty_code[trim($faculty_name)];
			
			$subject_name=$worksheet->getCell('B'.$row)->getValue();
			$subject_id='';
			$branch_name=$worksheet->getCell('C'.$row)->getValue();
			$branch_id='';
			$subject_type=$worksheet->getCell('D'.$row)->getValue();
			
			if($subject_name==$branch_name)
			{
				if(strcasecmp($subject_type,'OE')==0)
				{
					
					//echo "hello";
					$subject_id=$oe_subject_code[trim($subject_name)];
					$branch_id=$oe_subject_code[trim($subject_name)];
					
					
				}
				else if(strcasecmp($subject_type,'PE')==0)
				{
					
					 $subject_id=$pe_subject_code[trim($subject_name)];
					$branch_id=$pe_subject_code[trim($subject_name)];
					
				}
				else if(strcasecmp($subject_type,'BATCH-LAB')==0)
				{
					
				 $subject_id=$batch_lab_subject_code[trim($subject_name)];
					$branch_id=$batch_lab_subject_code[trim($subject_name)];
					
				}
			
			}
			else
			{
				
				$subject_id=$regular_subject_code[trim($subject_name)];
				$branch_id=$year_code[trim($branch_name)];
				
			}
			
			
		
			
			
			
			$now = DateTime::createFromFormat('U.u',microtime(true));
			$time=(string)$now->format("Y-m-d/H:i:s");
		
	 $date_time=(string)$now->format("YmdHisu");
	 if($faculty_id==null&&$subject_id==null)break;
			   $query="insert into t103_".$property_decode['current_database']['value']."(c39,c7,c15,c25) values('$date_time','$faculty_id','$subject_id','$branch_id')";
			
			echo "<br><br>";
			if(mysqli_query($con,$query))
			{
				echo  $query."<br>";
			}
			else
				echo "error".mysqli_error();
			
		}
		
		

	

	unlink($tmpfname);
	}
		
		
		
  

?>