<?php 
session_start();

include('inc/dbh.inc.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php

include('inc/header.php');
	?>
	<title>Campus Pilot Users</title>
</head>
<body>
<?php 
include 'inc/nav.php';
 ?>

<div class="alert alert-success">Hello <?php echo $_SESSION['fullname']; ?> Remember,You are the boss,below are all registered users,the power is in your hands now.
</div>

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
	<h4>All Registered users on campus pilot</h4>
<div class="container-fluid">
	<?php
 $sql = "SELECT * FROM campus_pilot_users";
  $result = mysqli_query($conn , $sql);
  echo '<h5>Total Number of Registered Users:'.mysqli_num_rows($result).'</h5>' ; 
	
 while ($row = mysqli_fetch_assoc($result)) {
 
	?>
<div>
		<table class="table table-bordered table-dark table-responsive" style="">
			<thead>
				<tr>
					<th>ID</th>
					<th>first Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>isconfirmed</th>
					<th>Token</th>
				<th>Campus</th>
				<th>Mobile Number</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">
		<?php
echo $row['id'];
		?>				
					</th>
					<th>
						<?php
echo $row['cpfirstname'];
		?>
					</th>
					<th>
		<?php
echo $row['cplastname'];
		?>				
					</th>

					<th>
		<?php
echo $row['cpemail'];
		?>				
					</th>

					<th>
		<?php
echo $row['cpconfirmed'];
		?>				
					</th>
					<th>
		<?php
echo $row['cptoken'];
		?>				
					</th>
				

					<th>
		<?php
echo $row['cpinstitution'];
		?>				
					</th>
					<th>
		<?php
echo $row['cpphone'];
		?>				
					</th>


					<th>
		<a class="btn btn-success" href="cpactivate.php?id=<?php echo $row['id'] ?>">Activate User</a>	
					</th>

					<th>
		<a class="btn btn-warning" href="cpdeactivate.php?id=<?php echo $row['id'] ?>">De-activate User</a>	
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