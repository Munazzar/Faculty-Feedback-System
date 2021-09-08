<?php
require_once "docs/Classes/PHPExcel.php";
$array=array();
$tmpfname = "docs/OE/OE - Faculty-Subject List.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 

		$objPHPExcel->setActiveSheetIndex(0); 
		///////////////////////////////////
		$tmpfname2 = "docs/OE/OE_STUDENT_4.xlsx";
			$excelReader2 = PHPExcel_IOFactory::createReaderForFile($tmpfname2);
			$excelObj2 = $excelReader2->load($tmpfname2);
			$worksheet2 = $excelObj2->getSheet(0);
			$lastRow2 = $worksheet2->getHighestRow();
			$objPHPExcel2 = new PHPExcel();
			$objPHPExcel2->setActiveSheetIndex(0); 
			
			for ($row = 1; $row <= $lastRow; $row++) {
			
			 
			  
			 //$id=$worksheet->getCell('A'.$row)->getValue();
			 
			$subject1=$worksheet->getCell('B'.$row)->getValue();
			$subject1=preg_replace('/\s+/', '', $subject1);
			
			
			
			for($row2=1;$row2<=$lastRow2;$row2++)
			{
				 $subject2=$worksheet2->getCell('B'.$row2)->getValue();
				 $subject2=preg_replace('/\s+/', '', $subject2);
				 if(in_array($subject2,$array))
					continue;
				array_push($array,$subject2);
				 
				
					
			}
			
			
			}
			foreach($array as $key=>$sub)
			{
					echo "$key=$sub <br>";
			}
				
				
				
				
				
				
				
				
				 ?>