<?php 
//Creats new file

$file = "example.php";

if ($handle = fopen($file, 'w')) {
	fwrite($handle, "Helloo example.php how are you ?");

	fclose($handle);

} else{
	echo "problem";
}



?>