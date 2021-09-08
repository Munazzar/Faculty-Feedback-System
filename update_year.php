<?php
require_once('property_read.php');
$id=$_REQUEST['id'];
$value=$property_decode['database'][$id][0];
$property_decode['view_from_database']['value']=$value;
$newJsonString = json_encode($property_decode);
file_put_contents('attribute.json', $newJsonString);


?>