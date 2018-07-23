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
	<title>All campus service</title>
</head>
<body>
<?php
include'inc/nav.php';
?>
<div class="alert alert-success justify-content-center" align="center">Hi,Admin <?php echo $_SESSION['fullname']; ?> Remember,You are the boss. Below are all available services registered on your database,the power is in your hands now.</div>

</div>
	<h4>All Registered Services</h4>
<div class="container-fluid" align="center">
	<?php
 $sql = "SELECT * FROM services";
  $result = mysqli_query($conn , $sql);
  echo 'There are '. mysqli_num_rows($result).' Registered Services';
 while ($row = mysqli_fetch_assoc($result)) {
 
	?>

	<div>
		<table class="table table-bordered table-responsive" style="border-radius: 6px;">
			<thead>
				<tr>
					<th>service_ID</th>
					<th>Service Name</th>
					<th>Owners First Name</th>
					<th>Owners Last Name</th>
					<th>Email</th>
					<th>Description</th>
					<th>Verified</th>
				<th>Contact</th>
				<th>Category</th>
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
echo $row['name'];
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
echo $row['Description'];
		?>				
					</th>
				

					<th>
		<?php
		if ($row['verified'] == 1) {
echo 'Yes'		;	
		}else{
			echo "No";
		}

		?>				
					</th>
					<th>
		<?php
echo $row['contact'];
		?>				
					</th>


					<th>
		<?php
echo $row['category'];
		?>	
					</th></tr>
			</tbody>
		</table>
		
<?php }



 ?>
</div>
</body>
</html>