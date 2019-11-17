<?php 
//creating an object with a method
class Bike{
	public $wheels = 2;
    public $helmet = 1;
	private $engine = 1;
	protected $blue = 'blue';
	var $red = 'red';

	function safety(){
	  echo $this->helmet = 2 . "<br>";
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
