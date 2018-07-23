<?php
session_start();
if (isset($_POST['submit'])) {
	require'inc/dbh.php';
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($email) || empty($password)) {
	$_SESSION['error'] = 'Empty Fields';
	exit();
}else{
	$sql = "SELECT * FROM admin WHERE email = '$email';";
	$check = mysqli_query($conn, $sql);
	$result = mysqli_num_rows($check);
	if ($result > 0) {
		$_SESSION['error'] = 'Exisiting ADMIN';
		header("location: admin.php?Exisiting-Admin");
		exit();
	}
	else{		
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$adminid = '0123456789!$/()*';
$adminid = str_shuffle($adminid);
$adminid= substr($adminid, 0, 10);
$adminidmain = 'YHF'. '-'.$adminid;

$sql = "INSERT INTO admin (email, adminid,password) 
VALUES('$email','$adminidmain','$hashedPassword');";
$check = mysqli_query($conn , $sql);
 mysqli_num_rows($check);
}
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Yourhomefuto.com.ng </title>
    <?php include'../inc/header.php'; ?>
    </head>
<body>
<!--Main Navigation-->
<header>
<?php include'inc/nav.php'; 

?>        
</header>
<!--Main Navigation-->
<!--Main layout-->

<main style="background:rgba(0,0,0,0.1);">	
	<div class="form justify-content-center" align="center" >
<h1>Top Secret Page</h1>
	
	<form method="POST" action="admin.php">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-6 col-sm-12 col-lg-6 col-lg-offset-6 col-xl-12">

<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>		
			<?php if(isset($_SESSION['success'])){ ?>
							<div class="success" style="background-color: rgba(24,200,6,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
								<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
							</div>
						<?php
							} 
						?>	

		<input type="text"  name="email" class="input form-control"  placeholder="Email">
		<br>
		<input type="text"  name="adminid" class="input form-control"  placeholder="Admin ID">
		<br>
		<input type="Password" name="password" class="form-control"  placeholder="Password">
		<button name="submit" type="submit" class="btn btn-success">Sign Up</button>
</div>
</div>
	</form>
</div>
</main>

</div>
<div>
	<?php

include'../inc/footer.php';
	include'../inc/navscript.php';
	?>

</div>
</body>
</html>