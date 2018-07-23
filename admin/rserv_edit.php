<?php 
session_start();
require 'inc/dbh.inc.php';
if (!isset($_GET['id'])) {
 	header('reservatins?hmm');
 	exit();
 }else{
 	$id = mysqli_real_escape_string($conn,$_GET['id']);
 } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit A reservation</title>
<?php 
include 'inc/header.php';
 ?>
</head>
<body>
<?php 
include 'inc/nav.php';
 ?>
<?php 

$sql = "SELECT * FROM campus_pilot_bookings WHERE id  = '$id';";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
	$row = mysqli_fetch_assoc($query);
}else{
	echo "No record found";
}

 ?>
<div class="container">
	<div class="row">
		<div  class="col-md-12">
			<h4 class="alert alert-primary">Reservation ID <?php echo $row['booking_id'].'<br>'.'By '.$row['l_firstname'].' '.$row['u_lastname'].' on '.$row['booking_time'] ?></h4>
			<br>
			<a href="del_reserv" class="btn btn-danger">Delete Reservations</a>

			<a href="update_reserv" class="btn btn-primary">Update Trip Status</a>

			<a href="edit_reserv" class="btn btn-success">Edit Reservation Details</a>
		</div>

	</div>

</div>













</body>
</html>