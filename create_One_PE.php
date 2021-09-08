<?php
require_once "docs/Classes/PHPExcel.php";


$dir='./docs/PE/student_subject/';
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
	
	 $tmpfname = "docs/PE/student_subject/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 

		$objPHPExcel->setActiveSheetIndex(0);
		
		for ($row = 1; $row <= $lastRow; $row++) {
			
			 
			  
			$id_no=$worksheet->getCell('A'.$row)->getValue();
		
			$name=$worksheet->getCell('B'.$row)->getValue();
		
			array_push($id,$id_no);
			array_push($sub,$name);
			$count++;
			
		}
	
			
			
			
		
		

	

}
echo $count;
print_r($id);
print_r($sub);

for($i=0;$i<$count;$i++)
{
 	$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$id[$i]);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$sub[$i]);
}
$filename="C:/xampp/htdocs/feedback/docs/PE/PE_SUBJECT_STUDENT.xls";
/*header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=$filename");
header("Content-Transfer-Encoding: binary ");
//header('Cache-Control: max-age=0'); 
ob_clean($objWriter);
$objWriter->save("php://output");*/
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save($filename);
$objPHPExcel->disconnectWorksheets();
unset($objWriter, $objPHPExcel);		
		
		//echo "inserted <br>";
  

?>
	
	
	
	