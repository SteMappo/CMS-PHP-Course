<?php 
//Creats new file

$file = "example.php";

if ($handle = fopen($file, 'r')) {
	
	echo $content = fread($handle, filesize($file));

	fclose($handle);

} else{
	echo "problem";
}



?>