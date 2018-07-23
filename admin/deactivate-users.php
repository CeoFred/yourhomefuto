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
	<title>Deactivate a user</title>
</head>
<body>
<?php
include'inc/nav.php';
?>
<div class="alert alert-success">Hello <?php echo $_SESSION['fullname']; ?> You can now de-activate users here</div>

	<?php
if (isset($_SESSION['successful'])) {
	echo '<div class="alert alert-success">
Succesfully de-activated The User,Your The boss!
</div>';
unset($_SESSION['successful']);
}
	?>
</div>
	<h4>De-activate  users</h4>
<div class="container-fluid">
	<?php
 $sql = "SELECT * FROM users WHERE is_confirmed = 1";
  $result = mysqli_query($conn , $sql);
 while ($row = mysqli_fetch_assoc($result)) {
 
	?>

	<div>
		<table class="table table-bordered table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>first Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Token</th>
					<th>Time of Registration</th>
					<th>UserID</th>
				<th>Mobile</th>
				<th>Activate</th>
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
echo $row['Firstname'];
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
echo $row['token'];
		?>				
					</th>
					<th>
		<?php
echo $row['TIME'];
		?>				
					</th>
				

					<th>
		<?php
echo $row['userid'];
		?>				
					</th>
					<th>
		<?php
echo $row['phone'];
		?>				
					</th>


					<th>
		<a class="btn btn-warning" href="deactivate.php?id=<?php echo $row['id'] ?>">Deactivate User</a>	
					</th></tr>
			</tbody>
		</table>
		
<?php
 } 

?>
</div>
</body>
</html>