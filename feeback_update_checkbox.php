<?php
require_once('property_read.php');
$value=$_REQUEST['value'];

//logging
 $desc=":taking feedback status updated to $value";
 require_once('logging_sub_admin.php');
$property_decode['checked']['value']=$value;
$newJsonString = json_encode($property_decode);
file_put_contents('attribute.json', $newJsonString);

?>