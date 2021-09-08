
<?php
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);
$none->name = "John";
$none->age = 30;
$none->city = "America";
$no = json_encode($none);
$now=array($no,$myJSON);
$p=json_encode($now);

print_r($p);
?>