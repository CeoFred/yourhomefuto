
<?php 	

session_start();

if (isset($_GET['name'])) {
require 'inc/dbh.inc.php';
	$name = mysqli_real_escape_string($conn,$_GET['name']);
	$sql = "SELECT name FROM services WHERE name = '$name';";
$condo = 	mysqli_query($conn,$sql);
	$assoc = mysqli_fetch_assoc($condo);
	$rname =  $assoc['name'];
}
 ?>
<!DOCTYPE html>
<html>
<head>

<?php include 'inc/header.php'; ?>     
	<title>	Confirmation</title>

</head>
<body>
	<?php
include'inc/nav.php';
?>
<div class="row">	
<div class="col" align="center">	
<h3>Do you really want to delete this service?</h3>
<?php 	echo $rname; ?>
<br>	
<a href="delete_service?name=$name" class="btn btn-danger">Yes</a><a href="del_s?almost" class="btn btn-success">No</a>
</div>
</div>


</body>
</html>