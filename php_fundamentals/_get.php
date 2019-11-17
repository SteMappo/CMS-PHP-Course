
<?php 
print_r($_GET);
$id = "chocolate";
$button = "Click me";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="_get.php?id=<?php echo $id; ?>&veg=health"><?php echo $button; ?></a>
</body>
</html>
