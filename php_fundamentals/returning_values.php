<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php 

  //reusing the same function witch out echo in side 

   function  name($a,$b){

   	$fullName = "$a + $b"."<br>";

   	return $fullName;

   }

   $name2 = name("stephen","mappouridis");

   $name1 = name("jim", $name2);

   echo $name1;
  
//this great fo adding anything 
   function addNumbers($c,$d){

   	   $sum = $c + $d;

   	   return $sum;
   }
     
    $result = addNumbers(45,98);

    $result = addNumbers(34+$result);

    echo $result."<br>";

    $result = addNumbers(34+$result);

    echo $result."<br>";


    $result = addNumbers(34+$result);

    echo $result."<br>";



 ?>
	
</body>
</html>