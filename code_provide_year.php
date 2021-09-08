<?php
require_once('database_connect.php');
require_once('property_read.php');
//echo "$year_id";


$oe_subject_code=array();
$pe_subject_code=array();
$faculty_code=array();
$year_code=array();
$year_from_code=array();
$oe_array=array();
$batch_lab_code_subject=array();
$batch_lab_subject_code=array();
$regular_subject_code=array();
$query="select c16,c26 from t106_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c26')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$regular_subject_code[$index]=$subject_id;
			}
		}
	}
	$query="select * from t107_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c35')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$oe_subject_code[$index]=$subject_id;
			}
		}
	}
	
	
	$query="select * from t107_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c35')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$oe_array[$subject_id]=$index;
			}
		}
	}
	
	
	$query="select * from t108_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c36')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$pe_subject_code[$index]=$subject_id;
			}
		}
	}
	
	
	
	$query="select c7,c6 from t102";
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$faculty_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c6')
						$index=trim($field);
					else
						$faculty_id=trim($field);
					
				}
				$faculty_code[$index]=$faculty_id;
			}
		}
	}
	
	
	$query="select c25,c13,c12,c14 from t105";
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$year_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c25')
						$year_id=$field;
					else
						$index=$index.trim($field);
					
				}
				$year_code[$index]=$year_id;
			}
		}
	}
	
	
	//year code to year
	$query="select c25,c13,c12,c14 from t105";
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$year_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c25')
						$year_id=$field;
					else
						$index=$index.trim($field);
					
				}
				$year_from_code[$year_id]=$index;
			}
		}
	}
	
	
	//spl lab name as key and spl lab id as value assignment
	$query="select * from t111_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c44')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$batch_lab_subject_code[$index]=$subject_id;
			}
		}
	}
	
	//spl lab id as key and spl lab name as value
	$query="select * from t111_".$year_id;
	if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$subject_id='';
				$index='';
				foreach($row as $key=>$field)
				{
					if($key=='c44')
						$index=trim($field);
					else
						$subject_id=$field;
					
				}
				$batch_lab_code_sub[$subject_id]=$index;
			}
		}
	}
	//print_r($oe_subject_code);

	//print_r($year_code);
	
//print_r($regular_subject_code);
/*echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";*/
//print_r($pe_subject_code);
//echo "<br>";//
//echo "<br>";
/*print_r($faculty_code);*/
?>