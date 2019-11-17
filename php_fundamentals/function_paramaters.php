<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php 

//Greetings function
    function greeting($message){
    	echo $message;
    }

    greeting("<h1> you are on the home page </h1>" ."<br>");

//calculate numbers 
    function add($number){
   	    while ( $number <= 24) {
   	    	$sum = $number * 10;
   	    	echo "$number x 10 = $sum <br>";
   	        $number++;
        } 
    }

   add(8);

 ?>
	
</body>
</html>