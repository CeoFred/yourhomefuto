<?php
session_start();
if (isset($_POST['submit'])) {
	require 'inc/dbh.inc.php';
$token = mysqli_real_escape_string($conn,$_POST['token']);
if (empty($token)) {
	$_SESSION['error'] = 'Provide a token';
}else{
$sql = "SELECT cptoken FROM campus_pilot_users WHERE cptoken = '$token' AND cpconfirmed = 0; ";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
//	$_SESSION['success'] = 'There is a match';
$unset = "UPDATE campus_pilot_users SET cpconfirmed=1, cptoken='' WHERE cptoken='$token'";
if (mysqli_query($conn,$unset)) {
	$_SESSION['success'] = 'Account Successfully Created,start with booking your ride.';
	header("Location:login?Welcome");
	exit();
}else{
	$_SESSION['error'] = 'Opps!Re-type your token';
}
}else{
			$_SESSION['error'] = 'No match';
}
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'inc/header.php'; ?>
	<title>Email Confirmation | campus pilot</title>
</head>
<body style="background-image: url(img/IMG-20180620-WA0007.jpg);background-size: cover;">
<?php include'inc/nav.php'; ?>


<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,2);text-align: center;font-size: 1.2em;padding: 10px;color: #fff;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>
			<?php if(isset($_SESSION['success'])){ ?>
							<div class="success" style="background-color: rgba(24,200,6,2);text-align: center;font-size: 1.2em;padding: 10px;color:white;">
								<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
							</div>
						<?php
							} 
						?>			

<div class="container">

	<div class="row">
		<div class="col-md-12" align="center" style="opacity: 0.8;margin-top: 70px;">
			<div style="background-color: #fff;">
			 <form action="confirm_token" method="POST">
			 	<p>Your secret 6 digit code Here for activation</p>
			 	<input maxlength="6" type="text" name="token" placeholder="000000" style="height: 40px;">
			 	<input type="submit" class="btn btn-outline-success" value="Submit" name="submit">
			 </form>
			</div>
		</div>
	</div>
</div>


<?php
include 'inc/footer.php';
include 'inc/navscript.php';
?>
</body>
</html>