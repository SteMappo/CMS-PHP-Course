<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php //math functions
//round to highest
  echo ceil(2.3);
//roun to the closest
  echo "<br>";

  echo round(2.3);

  echo "<br>";
//3 to the power of 3
  echo pow(3,3);

  echo "<br>";
  //round to the lowest
  echo floor(2.3);

  echo "<br>";
//sqaure root of 3.4
  echo sqrt(3.4);

  echo "<br>";
  //random number
  echo rand();

  echo "<br>";

  //string functions

  $string = "Hello World";
  //find string length
  echo strlen("$string <br>");
 //turn string to upper casr
  echo strtoupper("$string <br>");
//turn string to lower case 
  echo strtolower("$string <br>");
//print string
  print("$string <br>");


//array function

  //array
$arrayName = array(34,87,4, 774, 894);
//find the biggest number
echo max($arrayName);
 echo "<br>";
//find the smallest number
echo min($arrayName);
 echo "<br>";
//print array with its name & vaule
echo print_r($arrayName);
 echo "<br>";
//sort thought array in number order from vaules
echo sort($arrayName);
 echo "<br>";

 ?>
	
</body>
</html>