
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
	<title>Approved Services</title>
</head>
<body>
	<?php
include'inc/nav.php';
?>
<div class="alert alert-success justify-content-center" align="center">Hi,<?php echo $_SESSION['fullname']; ?> Remember,You are the boss.I have a list of approved services,arranged by date added,feel free to deactivate any service anytime.</div>


<?php 

$sql = "SELECT * FROM services WHERE verified = 1 ORDER BY reg_time DESC;";
$okay_query = mysqli_query($conn,$sql);
while ($rowlisting = mysqli_fetch_assoc($okay_query)) {?>


<div class="row">
	<div class="col" align="center">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>service_ID</th>
					<th>Service Name</th>
					<th>Email</th>
					<th>Verified</th>
				<th>Contact</th>
				<th></th>
				<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">
		<?php
echo $rowlisting['id'];
		?>				
					</th>
					<th>
						<?php
echo $rowlisting['name'];
		?>
					</th>
				
					<th>
		<?php
echo $rowlisting['email'];
		?>				
					</th>
					<th>
		<?php
		if ($rowlisting['verified'] == 1) {
echo 'Activated'		;	
		}else{
			echo "Not Activated";
		}

		?>				
					</th>
					<th>
		<?php
echo $rowlisting['contact'];
		?>				
					</th>
					<th>
						<a class="btn btn-danger" href="delete_service.php?name=<?php echo$rowlisting['name']; ?>">Delete Service</a>
					</th>
</tr>
			</tbody>
		</table>

	</div>

</div>	
<?php
}

 ?>

</body>
</html>