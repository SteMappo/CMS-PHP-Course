
<?php 

if(isset($_POST['submit'])) {
	$minimu = 5;
	$maximu = 10;
	$validUser = array("roger","stephen","Ben","sophie","maria");

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (strlen($username) > 10) {
		echo "Your username is to long";;
		# code...
	}
	if (strlen($username) < 5) {
		echo "Your username is to short";
		# code...
	}

	if (in_array($username, $validUser)) {
		echo "Welcome";
		# code...
	}else{
		echo "you are not allowed";
	}



}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form</title>
</head>
<body>
	<form action="form.php" method="post">
		<input type="text" name="username" placeholder="Username">
		<br>
		<input text="password" name="password" placeholder="password">
		<br>
		<input type="submit" name="submit">

	</form>
</body>
</html>