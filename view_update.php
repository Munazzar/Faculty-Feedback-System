<?php
error_reporting(0);
//echo "ur in search_fields";
 $text=$_REQUEST['text'];
 $table=$_REQUEST['table'];
 $tab=$table;
 if(strpos($tab,'_')!=0)
	$tab=substr($table,0,strpos($table,'_'));
		
$link="";
//reading property file
include_once("property_read.php");
$cols=$property_decode[$tab]["60"];

include_once("database_connect.php");
$query="select $cols from $table where 1=1".$text;
//echo $query;

echo "<div class='overlay_form'>";
echo "<h2>You are Updating ".$property_decode[$tab]["name"]."</h2>";
echo "<form id='update_form'><table class='table table-hover'>";
if($result=mysqli_query($con,$query))
	{
		if(($rows=mysqli_num_rows($result))>0)
		{
		
			while ($row = mysqli_fetch_assoc($result)) {
				$count=0;
				foreach($row as $key=>$field) {
					if($count==0)
					{
						$key1=$key;
						$count++;
						$link=$field;
						$text=" and $key1='$link'";
					}
						if(in_array($key,$property_decode[$tab]['20']))
						{
							echo "<tr><td><label>".$array_names[$key]."</label></td>";
							echo "<td><input type='text' value='$field'  class='form-control' name='$key'></td></tr>";
						
							continue;
						}
					echo "<tr><td><label>".$array_names[$key]."</label></td>";
					echo "<td><input type='text' value='$field' class='form-control' readonly name='$key'></td></tr>";
		
				}
				//echo "text=$text";
				echo "<tr><td><input type='button' class='btn  btn-success' value='update changes' id='$link' title='$key1' name='$table' onclick='update_data(this.name,this.title,this.id)'></td>
							<td><input type='button' class='btn btn-warning' value='cancel'></td>
							</tr>";
    
			}
			echo '</table></form><marquee>note: Click on close icon to close overlay</marquee></div>';
			die();
		}
		else
			echo "<b>Match Not Found</b>";
	}
?>