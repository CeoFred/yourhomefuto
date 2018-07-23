<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<?php
include'inc/header.php';
	?>
</head>
<body>
<?php
include'inc/nav.php';
?>

<br>
<?php if(isset($_SESSION['good'])){ ?>
<div class="error" style="background-color: rgba(0,153,51,1);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
<?php echo $_SESSION['good'];unset($_SESSION['good']); ?>
</div>
<?php
} 
?>
<div class="container">
	<div class="row justify-content-center">

<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>
			<div class="col-md-6 col-md-offset-3" align="center">
			
<form method="post" action="inc/login.inc.php">
	<input type="text" class="form-control" name="email" Placeholder="Email">
	<input type="password" name="password" class="form-control" Placeholder="Password">
	<button type="submit" class="btn btn-success" name="submit">Login</button>
</form>		
</div>
	</div>
	
</div>


</body>
</html>