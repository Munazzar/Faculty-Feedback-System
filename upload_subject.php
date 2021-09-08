<?php

ini_set('max_execution_time', 300);
require_once "docs/Classes/PHPExcel.php";
require_once("property_read.php");

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
	
		$oe_array=array();
		$pe_array=array();
		$reg_array=array();
		$bl_array=array();
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
		for ($excel_row = 1; $excel_row <= $lastRow; $excel_row++) {
			
			 $subject_id='';
			  require("code_insert.php");
			$faculty_name=$worksheet->getCell('A'.$excel_row)->getValue();
			$faculty_name=trim($faculty_name);
			 $faculty_id=$faculty_code[$faculty_name];
			
			$subject_name=$worksheet->getCell('B'.$excel_row)->getValue();
			$subject_name=trim($subject_name);
			$subject_id='';
			$branch_name=$worksheet->getCell('C'.$excel_row)->getValue();
			$branch_name=trim($branch_name);
			$branch_id='';
			$subject_type=$worksheet->getCell('D'.$excel_row)->getValue();
			$subject_type=trim($subject_type);
			
			echo "$faculty_name - $subject_name - $branch_name - $subject_type<br>";
			
			if($subject_name==$branch_name)
			{
				if(strcasecmp($subject_type,'OE')==0)
				{
					
					//echo "hello";
					if($oe_array[$subject_name]==$subject_name)continue;
					else
					{
						$oe_array[$subject_name]=$subject_name;
						//counting number of rows/records
						$query="select count(*) from t107_".$property_decode['current_database']['value'];
						$count=0;
						if($result=mysqli_query($con,$query))
						{	
								$row = mysqli_fetch_row($result);
								$count=$row[0];
						}
						
						
						$count++;
						$oe_sub=$subject_name;
							$sub_id='oe'.$count;
						$query="insert into t107_".$property_decode['current_database']['value']."(c37,c35)values('$sub_id','$oe_sub')";	
					//echo "<br>";
						if(mysqli_query($con,$query))
						{
						echo  $query."<br>";
						}
						else
							echo("Error description: " . mysqli_error($con));
						
						
						
					}
					
				}
				else if(strcasecmp($subject_type,'PE')==0)
				{
					
					
					
					if($pe_array[$subject_name]==$subject_name)continue;
					else
					{
						$pe_array[$subject_array]=$subject_name;
						//counting number of rows/records
						$query="select count(*) from t108_".$property_decode['current_database']['value'];
						$count=0;
						if($result=mysqli_query($con,$query))
						{	
								$row = mysqli_fetch_row($result);
								$count=$row[0];
						}
						
						
						$count++;
						$oe_sub=$subject_name;
							$sub_id='pe'.$count;;
						$query="insert into t108_".$property_decode['current_database']['value']."(c38,c36)values('$sub_id','$oe_sub')";	
					//echo "<br>";
						if(mysqli_query($con,$query))
						{
						echo  $query."<br>";
						}
						else
							echo("Error description: " . mysqli_error($con));
						
					
					
					}
					
					
					
				}
				else if(strcasecmp($subject_type,'BATCH-LAB')==0)
				{
					
				
					
					
					
					
					if($bl_array[$subject_name]==$subject_name)continue;
					else
					{
						$bl_array[$subject_name]==$subject_name;
						//counting number of rows/records
						$query="select count(*) from t111_".$property_decode['current_database']['value'];
						$count=0;
						if($result=mysqli_query($con,$query))
						{	
								$row = mysqli_fetch_row($result);
								$count=$row[0];
						}
						
						
						$count++;
						$oe_sub=$subject_name;
						$sub_id='bl'.$count;
							
						$query="insert into t111_".$property_decode['current_database']['value']."(c43,c44)values('$sub_id','$oe_sub')";	
					//echo "<br>";
						if(mysqli_query($con,$query))
						{
						echo  $query."<br>";
						}
						else
							echo("Error description: " . mysqli_error($con));
						
						
					
					}
					
					
				}
			
			}
			else
			{
				
				
				
				
				if($reg_array[$subject_name]==$subject_name)continue;
				else
					{
						$reg_array[$subject_name]=$subject_name;
						//counting number of rows/records
						$query="select count(*) from t106_".$property_decode['current_database']['value'];
						$count=0;
						if($result=mysqli_query($con,$query))
						{	
								$row = mysqli_fetch_row($result);
								$count=$row[0];
						}
						
						
						$count++;
						$oe_sub=$subject_name;
							$sub_id='s'.$count;
						echo $query="insert into t106_".$property_decode['current_database']['value']."(c16,c26)values('$sub_id','$oe_sub')";	
					//echo "<br>";
						if(mysqli_query($con,$query))
						{
						echo  $query."<br>";
						}
						else
							echo("Error description: " . mysqli_error($con));
						
						
						
					}
				
				
			}
			
			
		
			
			
			
			
			
		}
		
		
		

	

	//unlink($tmpfname);
	}
		
		require("insert_t103_updated.php");
		
  

?>