<?php 

//if $_POST is set with somthing [find value array]
if (isset($_POST['submit'])){
	$min = 5;
    $max = 10;
    $validUser = array("tim","sophie","ellen","stephen");
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (strlen($username) < $min) {
		echo "User name is short ";
		# code...
	}
	if (strlen($username) > $max) {
		echo "Your user is to long";
		# code...
	}

	if (in_array($username, $validUser)) {

		echo "Welcome";
		# code...
	}else{
		echo "try again";
	}
}
?>