<?php
ini_set('max_execution_time', 300);
require_once('dob_oe_pe.php');

require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");
require_once("database_connect.php");
require_once("code_insert.php");
$dir='./docs/student_details/ECE/';
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
						if(strpos($subject,$output)!=false)continue;
						echo $subject=$subject.$output.";";
					}
					
				}
			}
		}
			$subject=substr($subject,0,-1).',';
			echo "$file_name<br>";
		$tmpfname = "docs/student_details/ECE/$file_name";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
			
			

			  
			  $objPHPExcel = new PHPExcel();

		 // Set the active Excel worksheet to sheet 0 

		$objPHPExcel->setActiveSheetIndex(0); 
		///////////////////////////////////
		
		$tmpfname4 = "docs/PE/PE_SUBJECT_STUDENT.xls";
			$excelReader4 = PHPExcel_IOFactory::createReaderForFile($tmpfname4);
			$excelObj4 = $excelReader4->load($tmpfname4);
			$worksheet4 = $excelObj4->getSheet(0);
			$lastRow4 = $worksheet4->getHighestRow();
			$objPHPExcel4 = new PHPExcel();
			$objPHPExcel4->setActiveSheetIndex(0); 
		
		
		
		//////////////////////
		for ($row = 1; $row <= $lastRow; $row++) 
		{
			$id=$worksheet->getCell('A'.$row)->getValue();
			 
			$name=$worksheet->getCell('B'.$row)->getValue();
			
			$dob;
			
			$dob=$dob_array[$id];
			
			
			if(substr($year,strlen($year)-1)>2)
			{
			//getting Oe Subjects from OE_STUDENT_4.XLSX
				$subject=$subject.$oe_array[trim($id)].';';
				
				
				for($row4=1;$row4<=$lastRow4;$row4++)
					{
						 $roll_id=$worksheet4->getCell('A'.$row4)->getValue();
						 if(strcasecmp($roll_id,$id)==0)
						 {
							 $sub=$worksheet4->getCell('B'.$row4)->getValue();
							 $sub=preg_replace('/\s+/', '',$sub);
							
							$subject=$subject.$pe_subject_code[trim($sub)].';';
							 
						
							
						 }
					}
				
				
				
			}
			
			
			
			
			
			
	
			//echo "id=$id,name=$name,dob=$dob,year=$year,subject=$subject<br>";
				$now = DateTime::createFromFormat('U.u',microtime(true));
	  $time=(string)$now->format("Y-m-d/H:i:s");
			 $insert="insert into t101(c1,c5,c2,c23,c25,c15) values(";
			$insert=$insert.'"'.$id.'","'.$name.'","'.$dob.'","'.$time.'","'.$year.'","'.$subject.'")';
			
			$subject=substr($subject,0,strpos($subject,',')+1);
			
			if(mysqli_query($con,$insert))
			{
			echo  $insert."<br>";
			}
			else
				echo("Error description: " . mysqli_error($con));
			
			
		}
$subject='';
	

}


?>
