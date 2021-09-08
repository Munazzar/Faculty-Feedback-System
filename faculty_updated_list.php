<?php
require_once "docs/Classes/PHPExcel.php";

require_once('database_connect.php');



$count=0;
$faculty_name=Array();
$branch_name=Array();
array_push($faculty_name,'something');
array_push($branch_name,'something');

//gettting data from t102  name and branch only
$query='select c6,c13 from t102';
if($result=mysqli_query($con,$query))
{
	
	while($row=mysqli_fetch_assoc($result))
	{
		$count++;
		foreach($row as $key=>$value)
		{
			
			if($key=='c6')
			{
				array_push($faculty_name,$value);
				
			}
			else if($key=='c13')
			{
				array_push($branch_name,$value);
				
			}
			
		}
		
		
		
	}
	
	
}
 $objPHPExcel = new PHPExcel();


for($i=1;$i<=$count;$i++)
{
 	$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$faculty_name[$i]);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$branch_name[$i]);
}
$filename="docs/sample-files/faculty_updated_list.xls";
unlink($filename);
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
  	header("Location: $filename");


?>
	
	
	
	