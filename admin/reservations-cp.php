<?php 

ob_start();
session_start();
require 'inc/dbh.inc.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservations on Campus-Pilot</title>

	<?php

include('inc/header.php');
	?>
</head>
<body>
<?php 
include 'inc/nav.php';
 ?>

<!-- <div class="alert alert-success">Hello <?php echo $_SESSION['fullname']; ?> Remember,You are the boss,below are all registered users,the power is in your hands now.
</div>
 --> 
	<?php
if (isset($_SESSION['successful'])) {
	echo '<div class="alert alert-success">
Succesfully Activated The User,Your The boss!
</div>';
unset($_SESSION['successful']);
}
	?>

	<?php
if (isset($_SESSION['cp_dsuccessful'])) {
	echo '<div class="alert alert-success">
Succesfully De-Activated The User,Your The boss!
</div>';
unset($_SESSION['cp_dsuccessful']);
}
	?> 
</div>
	<h4>Latest Trip Reservations </h4>
<div class="container-fluid">
	<?php
 $sql = "SELECT * FROM campus_pilot_bookings ORDER BY booking_time DESC";
  $result = mysqli_query($conn , $sql);
  echo '<h5>Total Number of Reservations:'.mysqli_num_rows($result).'</h5>' ; 
	
 while ($row = mysqli_fetch_assoc($result)) {
 
	?>
<div>
		<table class="table table-bordered table-dark table-responsive" style="">
			<thead>
				<tr>
					<th>ID</th>
					<th>Booking-ID</th>
					<th>Booked-By</th>
					<th>Phone Number</th>
					<th>Campus</th>
					<th>Email</th>
				<th>Trip Status</th>
				<th>Payment Mode</th>
				<th>Booking-Time</th>
				<th>Pickup-From</th>
				<th>Pickup-To</th>
				<th>Pickup-time</th>
				<th>Pickup-Date</th>
				<th>No.Passengers</th>
				<th>Trip Type</th>
				<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td scope="row">
		<?php
echo $row['id'];
		?>				
					</td>
					<td>
						<?php
echo $row['booking_id'];
		?>
					</td>
					<td>
		<?php
echo $row['l_firstname'].' '.$row['u_lastname'];
		?>				
					</td>

					<td>
		<?php
echo $row['u_phone'];
		?>				
					</td>

					<td>
		<?php
echo $row['u_campus'];
		?>				
					</td>
					<td>
		<?php
echo $row['u_email'];
		?>				
					</td>
				

					<td>

		<?php
if ($row['booking_status'] == 0) {
	echo "Pending";
}else{
	echo "Successful";
}
		?>				
					</td>
					<td>
		<?php
echo $row['payment_mode'];
		?>				
					</td>

<td>
	<?php 
echo $row['booking_time'];
	 ?>

</td>

<td>
	<?php 
echo $row['ride_from'];
	 ?>

</td>
<td>
	<?php 
echo $row['ride_to'];
	 ?>

</td>

<td>
	<?php 
echo $row['pickup_time'];
	 ?>

</td>

<td>
	<?php 
echo $row['pickup_date'];
	 ?>

</td>

<td>
	<?php 
echo $row['passengers'];
	 ?>

</td>

<td>
	<?php 
echo $row['trip_type'];
	 ?>

</td>

<td>
	<?php 
echo 'NGN.'.$row['price'];
	 ?>

</td>
					<th>
		<a class="btn btn-success" href="rserv_edit.php?id=<?php echo $row['id'] ?>">Edit</a>	
					</th>


				</tr>
			</tbody>
		</table>
		
<?php } ?>
</div>



 <?php 
include 'inc/footer.php';
include 'inc/navscript.php';
  ?>
</body>
</html>