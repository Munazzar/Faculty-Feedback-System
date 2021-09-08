<?php
error_reporting(0);
require_once "docs/Classes/PHPExcel.php";
require_once("code_insert.php");
$dob_array=array();
$oe_array=array();
$pe_array=array();
$tmpfname2 = "docs/student_details/DOB/student_dob.xlsx";
			$excelReader2 = PHPExcel_IOFactory::createReaderForFile($tmpfname2);
			$excelObj2 = $excelReader2->load($tmpfname2);
			$worksheet2 = $excelObj2->getSheet(0);
			$lastRow2 = $worksheet2->getHighestRow();
			$objPHPExcel2 = new PHPExcel();
			$objPHPExcel2->setActiveSheetIndex(0); 
		////////////////////////////////////////
		
			$tmpfname3 = "docs/OE/OE_SUBJECT_STUDENT.xls";
			$excelReader3 = PHPExcel_IOFactory::createReaderForFile($tmpfname3);
			$excelObj3 = $excelReader3->load($tmpfname3);
			$worksheet3 = $excelObj3->getSheet(0);
			$lastRow3 = $worksheet3->getHighestRow();
			$objPHPExcel3 = new PHPExcel();
			$objPHPExcel3->setActiveSheetIndex(0); 
		//////////////////////////////////////////////////////
		
$tmpfname4 = "docs/PE/PE_SUBJECT_STUDENT.xls";
			$excelReader4 = PHPExcel_IOFactory::createReaderForFile($tmpfname4);
			$excelObj4 = $excelReader4->load($tmpfname4);
			$worksheet4 = $excelObj4->getSheet(0);
			$lastRow4 = $worksheet4->getHighestRow();
			$objPHPExcel4 = new PHPExcel();
			$objPHPExcel4->setActiveSheetIndex(0); 
		
		//////////////////////
					
			for($row2=1;$row2<=$lastRow2;$row2++)
			{
				 $sid=$worksheet2->getCell('A'.$row2)->getValue();
				  $cell=$worksheet2->getCell('B'.$row2);
					 $InvDate= $cell->getValue();
					if(PHPExcel_Shared_Date::isDateTime($cell)) {
						$InvDate = date($format='m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
						}	
					 $dob=$InvDate;
					 $dob_array[trim($sid)]=$dob;
				
					
				 }
			
			
			
			//getting Oe Subjects from OE_STUDENT_4.XLSX
			
		
		
		
					for($row3=1;$row3<=$lastRow3;$row3++)
					{
						 $roll=$worksheet3->getCell('A'.$row3)->getValue();
						 
							 $sub=$worksheet3->getCell('B'.$row3)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
					
							
							 $oe_array[trim($roll)]=$oe_subject_code[trim($sub)];
						
							
						 
					}
				//	print_r($oe_array);
					//getting PE Subjects from 
			
					for($row4=1;$row4<=$lastRow4;$row4++)
					{
						 $roll=$worksheet4->getCell('A'.$row4)->getValue();
						 
							 $sub=$worksheet4->getCell('B'.$row4)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
					
							
							 $pe_array[trim($roll)]=$pe_subject_code[trim($sub)];
						
							
						 
					}
			
//print_r($pe_array);
?>