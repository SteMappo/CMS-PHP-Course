<?php 
//Class

class Clash_Of_Clans{
	//properties
	var $goblins = "goblins";
	var $gaints = "gaints";
	var $wizards = "wizards";
	var $dragons = "dragons";
	var $ballons = "ballons";
//method
	function showAll(){
		echo $this->goblins ."<br>";
		echo $this->gaints ."<br>";
		echo $this->wizards ."<br>";
		echo $this->dragons ."<br>";
		echo $this->ballons ."<br>";
	}
}
//object
$clash = new Clash_Of_Clans();

$clash->showAll();
//chiled class
class Army extends Clash_Of_Clans{

	function units(){
		$this->goblins .= 5;
		$this->ballons .= 23;
	}
}

$clans = new Army();
echo $clans->goblins ."<br>";
$clans->units();
echo $clans->goblins ."<br>";
echo $clans->ballons ."<br>";

if (class_exists(Army)) {
	echo "We have the only Army";
	# code...
}else{
	echo "There is another";
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
