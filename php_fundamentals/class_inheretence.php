<?php 
//creating an object with a method
class Bike{
	var $wheels = 2;
    var $helmet = 1;
	var $engine = 1;
	var $blue = 'blue';
	var $red = 'red';

	function __construct(){
		$this->helmet = 2;
	}
}

$ninja = new Bike();
$BMW = new Bike();

echo $ninja->wheels . "<br>";
echo $BMW->blue . "<br>";
echo $ninja->helmet . "<br>";
echo $BMW->helmet . "<br>";
echo $ninja->helmet . "<br>";

class Morton extends Bike{

	var $wheels = 5;

}

$pub = new Morton();

echo $pub->wheels . "<br>" ;
echo $pub->helmet . "<br>";

if (class_exists("Morton")){
	echo "new class";
}

//Checking if method object exists
// if (class_exists('Car')) {
// 	echo "Nice car ";
// 	# code...
// }
// if (method_exists('Car', 'moveWheels')) {
// 	echo("did anyone one program it to stop");
//}


 ?>
