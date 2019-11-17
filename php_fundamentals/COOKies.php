<?php 
$name = "TestCookie";
$value = 100;
$expiration = time() + (60*60*24*7);
setcookie($name, $value, $expiration,'/','');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php 
	if (isset($_COOKIE["TestCookie"])) {
		$someOne = $_COOKIE["TestCookie"];
		echo $someOne;
	}else{

		$someOne = "";

	 
	}
?>
</head>
<body>

</body>
</html>
