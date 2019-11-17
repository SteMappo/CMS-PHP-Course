<?php session_start() ;?>
<?php
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;
    $_SESSION['fistname'] = null;
	$_SESSION['lastname'] = null;
	$_SESSION['user_role'] = null;

	header('Location: /demo/CMS/CMS_TEMPLATE/index.php'); 

 ?>