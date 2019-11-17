<?php 
//creating an object with a method
class Balloons{
	static $string = 1;
	var $smileyStickets = 3;
	var $ears = 2;
	var $clown = 1;

	function feature(){
		$this->ears= 6;
	}
	function person(){
		$this->clown= 2;
	}
}

$red = new Balloons;

echo $red = Balloons::$string;




//Checking if method object exists
// if (class_exists('Car')) {
// 	echo "Nice car ";
// 	# code...
// }
// if (method_exists('Car', 'moveWheels')) {
// 	echo("did anyone one program it to stop");
//}


 ?>
