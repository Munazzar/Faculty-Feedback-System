<?php
require_once "docs/Classes/PHPExcel.php";
$array=array();
$tmpfname3 = "docs/OE/OE_STUDENT_3.xlsx";
			$excelReader3 = PHPExcel_IOFactory::createReaderForFile($tmpfname3);
			$excelObj3 = $excelReader3->load($tmpfname3);
			$worksheet3 = $excelObj3->getSheet(0);
			$lastRow3 = $worksheet3->getHighestRow();
			$objPHPExcel3 = new PHPExcel();
			$objPHPExcel3->setActiveSheetIndex(0); 
			for($row3=1;$row3<=$lastRow3;$row3++)
			{
				 $subj=$worksheet3->getCell('B'.$row3)->getValue();
				  $subj=preg_replace('/\s+/', '', $subj);
				 
				 if(in_array($subj,$array))
					continue;
				array_push($array,$subj);
				 }
				foreach($array as $sub)
				{
					echo "$sub <br>";
				}
				 ?>