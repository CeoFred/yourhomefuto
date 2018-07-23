<?php
session_start();
	require 'inc/dbh.inc.php';
	if(!isset($_SESSION['adminid']) & empty($_SESSION['adminid'])){
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'inc/header.php'; ?>     
	<title>All users</title>
</head>
<body>
<?php
include'inc/nav.php';
?>
<div class="alert alert-success">Hello <?php echo $_SESSION['fullname']; ?>Remember,You are the boss,below are all registered users,the power is in your hands now.</div>

	<?php
if (isset($_SESSION['successful'])) {
	echo '<div class="alert alert-success">
Succesfully Activated The User,Your The boss!
</div>';
unset($_SESSION['successful']);
}
	?>
</div>
	<h4>All Registered users</h4>
<div class="container-fluid">
	<?php
 $sql = "SELECT * FROM users ORDER BY reg_time DESC";
  $result = mysqli_query($conn , $sql);
  echo '<h5>Total Number of Registered Users:'.mysqli_num_rows($result).'</h5>' ; 
	
 while ($row = mysqli_fetch_assoc($result)) {
 
	?>
<div>
		<table class="table table-bordered table-dark" style="">
			<thead>
				<tr>
					<th>ID</th>
					<th>first Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>isconfirmed</th>
					<th>gender</th>
					<th>UserID</th>
				<th>Mobile</th>
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
echo $row['firstname'];
		?>
					</th>
					<th>
		<?php
echo $row['lastname'];
		?>				
					</th>

					<th>
		<?php
echo $row['email'];
		?>				
					</th>

					<th>
		<?php
echo $row['is_confirmed'];
		?>				
					</th>
					<th>
		<?php
echo $row['gender'];
		?>				
					</th>
				

					<th>
		<?php
echo $row['user_id'];
		?>				
					</th>
					<th>
		<?php
echo $row['phone'];
		?>				
					</th>


					<th>
		<a class="btn btn-success" href="activate.php?id=<?php echo $row['id'] ?>">Activate User</a>	
					</th>

					<th>
		<a class="btn btn-warning" href="deactivate.php?id=<?php echo $row['id'] ?>">De-activate User</a>	
					</th>

				</tr>
			</tbody>
		</table>
		
<?php } ?>
</div>
</body>
</html>