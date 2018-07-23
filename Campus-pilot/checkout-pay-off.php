<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php 
include 'inc/header.php';
	 ?>
	<title>Checkout - Successfull</title>
</head>
<body style="background-image: url(img/IMG-20180620-WA0007.jpg);background-size: cover;">
<?php 
include 'inc/nav.php';
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="margin: 100px;">
				
<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgb(244,0,0);text-align: center;font-size: 1.2em;padding: 10px;color: #fff;">
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