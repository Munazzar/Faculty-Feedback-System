<?php
//reading view property file


//reading title property file
$array_names=array("error"=>"nothing");
$i=0;
$tprop=new DOMDocument();
$tprop->load("xml/title_property.xml");//loading file
$title_property=$tprop->documentElement;//passing elements 
foreach($title_property->childNodes as $title){
	 $node=$title->nodeValue;
	$array_names[$title->nodeName]=$node;
	
}

//reading update property JASON File
$update_only_str=file_get_contents('attribute.json');
$property_decode=json_decode($update_only_str,true);

//print_r($property_decode);
	

	

?>