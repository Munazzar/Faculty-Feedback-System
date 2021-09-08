<?php
$text=$_REQUEST['text'];
$sql_array=['select','drop','*','alter','truncate','1=1','insert','values','create','show',';','update','desc'];
$check=0;
foreach($sql_array as $value)
{
if(strpos($text, $value) !== false)	
	$check=1;
}
echo $check;


?>