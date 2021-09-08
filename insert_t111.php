<?php
require_once "docs/Classes/PHPExcel.php";
require_once("database_connect.php");
require_once("property_read.php");
$dir='./docs/SPL-LAB/spl-lab-subject-list/';
$files_in_dir=scandir($dir);
$file_name="";
$id='bl';//unique code for batch lab subject id

$query="select count(*) from t111_".$property_decode['current_database']['value'];
$count=0;
if($result=mysqli_query($con,$query))
{	
		$row = mysqli_fetch_row($result);
		echo $count=$row[0];
}
echo "<br>count value is $count<br>";
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
		$tmpfname = "docs/SPL-LAB/spl-lab-subject-list/$file_name";

		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		for ($row = 1; $row <= $lastRow; $row++) {
		$subject_name=$worksheet->getCell('A'.$row)->getValue();	
		$count++;
		$spl_subject_id=$id.$count;
		$query="insert into t111_".$property_decode['current_database']['value']."(c43,c44)values('$spl_subject_id','$subject_name')";	
		//echo "<br>";
			if(mysqli_query($con,$query))
			{
			echo  $query."<br>";
			}
			else
				echo("Error description: " . mysqli_error($con));
			
		}
		
		unlink($tmpfname);
}

?>