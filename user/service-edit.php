<?php
session_start();
if (!isset($_SESSION['email'])) {
	header('Location: index');
}else{
	$email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Service</title>
	<?php 
	include('inc/header.php') ?>
</head>
<body>

<?php 
include('../inc/nav.php'); ?>


<?php 
require('../inc/dbh.inc.php');
$sql = "SELECT * FROM services WHERE email = '$email';";
{
	
}else{
	echo "noo";
}

 ?>
</body>
</html>