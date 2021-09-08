<?php
require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");
require_once("database_connect.php");
$dir='./docs/sectionwise_student_list/';
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
		$year=$file_details['filename'];
	}
	else
		continue;

$query="select c15 from t103_".$property_decode['current_database']['value']."where c25='$year'";
$subject="";
if($result=mysqli_query($con,$query))
		{
			
			if(($rows=mysqli_num_rows($result))>0)
			{
				//echo $query;
				while ($row = mysqli_fetch_row($result)) 
				{
					foreach($row as $output)
					{
						$subject=$subject.$output.";";
					}
					
				}
			}
		}
			$subject=substr($subject,0,-1).',';
			echo "$file_name<br>";
		$tmpfname = "docs/sectionwise_student_list/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 

		$objPHPExcel->setActiveSheetIndex(0); 
		///////////////////////////////////
		$tmpfname2 = "docs/student_dob.xlsx";
			$excelReader2 = PHPExcel_IOFactory::createReaderForFile($tmpfname2);
			$excelObj2 = $excelReader2->load($tmpfname2);
			$worksheet2 = $excelObj2->getSheet(0);
			$lastRow2 = $worksheet2->getHighestRow();
			$objPHPExcel2 = new PHPExcel();
			$objPHPExcel2->setActiveSheetIndex(0); 
		////////////////////////////////////////
		
			$tmpfname3 = "docs/OE/OE_STUDENT_SUBJECT.xlsx";
			$excelReader3 = PHPExcel_IOFactory::createReaderForFile($tmpfname3);
			$excelObj3 = $excelReader3->load($tmpfname3);
			$worksheet3 = $excelObj3->getSheet(0);
			$lastRow3 = $worksheet3->getHighestRow();
			$objPHPExcel3 = new PHPExcel();
			$objPHPExcel3->setActiveSheetIndex(0); 
		//////////////////////////////////////////////////////
		$tmpfname4 = "docs/PE/SUBJECT_STUDENT.xls";
			$excelReader4 = PHPExcel_IOFactory::createReaderForFile($tmpfname4);
			$excelObj4 = $excelReader4->load($tmpfname4);
			$worksheet4 = $excelObj4->getSheet(0);
			$lastRow4 = $worksheet4->getHighestRow();
			$objPHPExcel4 = new PHPExcel();
			$objPHPExcel4->setActiveSheetIndex(0); 
		
		
		
		//////////////////////
		for ($row = 1; $row <= $lastRow; $row++) {
			
			 
			  
			 $id=$worksheet->getCell('A'.$row)->getValue();
			 
			$name=$worksheet->getCell('B'.$row)->getValue();
			
			$dob;
			
			
			for($row2=1;$row2<=$lastRow2;$row2++)
			{
				 $sid=$worksheet2->getCell('A'.$row2)->getValue();
				 if(trim($id)==trim($sid))
				 {
					 
					 $cell=$worksheet2->getCell('B'.$row2);
					 $InvDate= $cell->getValue();
					if(PHPExcel_Shared_Date::isDateTime($cell)) {
						$InvDate = date($format='m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
						}	
					 
					 
				$dob=$InvDate;
					break;
				 }
			}
			if(substr($year,strlen($year)-1)>2)
			{
			//getting Oe Subjects from OE_STUDENT_4.XLSX
			
		
		
		
					for($row3=1;$row3<=$lastRow3;$row3++)
					{
						 $roll=$worksheet3->getCell('A'.$row3)->getValue();
						 if(strcasecmp($roll,$id)==0)
						 {
							 $sub=$worksheet3->getCell('B'.$row3)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
							 
							 foreach($array_names as $key=>$v)
							{
								if($v==$sub)
								{
								$subject=$subject.$key.";";
									break;
								}
							}
							 
						
							break;
						 }
					}
					/*getting PE Subjects from 
			
					for($row4=1;$row4<=$lastRow4;$row4++)
					{
						 $roll_id=$worksheet4->getCell('A'.$row4)->getValue();
						 if(strcasecmp($roll_id,$id)==0)
						 {
							 $sub=$worksheet4->getCell('B'.$row3)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
							 
							 foreach($array_names as $key=>$v)
							{
								if($v==$sub)
								{
								$subject=$subject.$key.";";
									break;
								}
							}
							 
						
							
						 }
					}*/
			}
			
			
			
			
			
			
	
			echo "id=$id,name=$name,dob=$dob,year=$year,subject=$subject<br>";
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$id);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$name);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$dob);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$year);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$subject);
			
			$subject='';
		}

	
//$filename="C:/xampp/htdocs/feedback/docs/student_t101/t101_y$file_name.xls";
/*header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=$filename");
header("Content-Transfer-Encoding: binary ");
//header('Cache-Control: max-age=0'); */
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
//$objWriter->save($filename);
}
 
		
		
		//echo "inserted <br>";
  

?>