<?php
session_start();

	if(isset($_SESSION['email']) & !empty($_SESSION['email'])){
		$_SESSION['Alert'] = 'You are Logged in alredy,Logout to sign into another account';
		header("Location:services/");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="Keywords" content="yourhomefuto,login yourhomefuto,signin yourhomefuto,campus services,futo roomates,futo services,campus roomates,buy and sell,futo sell,futo market,iexchange">

<meta property="og:description" content="Got a account? Quickly,Login to get started.">
<meta name="Description" content="Got a account? Quickly,Login to get started.">
<script type="text/javascript">
	let viewLoginPwd = false;
	function changPwdView() {
		let getPwdView = $('#viewPwdLogin');
		if (viewLoginPwd === false) {
			getPwdView.setAttrbute("type","text");
			viewLoginPwd = true;
		}else if(viewLoginPwd === true){
getPwdView.setAttrbute("type","password");
viewLoginPwd = false;
		}
	}
</script>
<?php
include('inc/header.php');
?>
	<title>Login</title>
    </head>
<body style="background-color: #fff;">
<!--Main Navigation-->
<header>
<?php include'inc/nav.php'; ?>        
</header>
<main style="margin-top:50px;margin-bottom: 170px;" class="justify-content-md-center">
	<div id="form" class="form">
	<form method="POST" action="inc/login.inc.php" style="height: 300px;" class="md-form">
<div class="container">
		
<?php if(isset($_SESSION['Alert'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['Alert'];unset($_SESSION['Alert']); ?>
				</div>
			<?php
				} 
			?>		
			
<?php if(isset($_SESSION['success'])){ ?>
				<div class="error" style="background-color: rgba(2,244,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
				</div>
			<?php
				} 
			?>																																																								
	<div class="row"> 
		<div class="col-md-8 col-md-offset-3 col-lg-6 col-offset-lg-3 col-sm-6 col-xs-12 justify-content-md-center" align="center">
			
<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>		

<h5>Login<i class="fa fa-shield"></i></h5>

<div style="background-color:#0000CD;color: #fff;padding: 4px;margin-bottom: 5px;border-radius: 8px;">
<i class="fa fa-facebook"></i> | <h6 style="display: inline-block;">Continue with Facebook</h6>
</div> 


<div style="background-color:  	#228B22;color: #fff;padding: 4px;margin-bottom: 5px;border-radius: 8px;">
<i class="fa fa-google"></i> | <h6 style="display: inline-block;">Continue with Google</h6>
</div> 

<h4>OR</h4>
	<div class="form-group align-items-center">
		<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				@
			</div>
		</div>
		<input type="text" id="email"  name="email" class="input form-control"  placeholder="Enter email" aria-describedby="emailhelp">
	</div>
		<small id="emailhelp" class="form-text">We'll Never share your email with anyone else.</small>
		<br>
		<div class="form-group align-items-center">
		<span>
			<div class="input-group mb-2">

		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA;">
				<i class="fa fa-lock" style="font-size: 27px;"></i>
			</div>
		</div>
		
		<input type="Password" id="password"  name="password" id="viewPwdLogin" class="form-control" placeholder="Password"><div class="input-group-prepend">
			<div class="input-group-text">
				<button class="btn btn-primary" onclick="changPwdView()" id="viewpass" type="button"><i class="fa fa-eye" style="font-size: 15px;"></i></button>
			</div>
		</div>
	</span>
	</div>
	</div>
		</div>
		<div class="form-group form-check">
		<input type="checkbox" name="remember" id="checkbox" style="display: inline;margin: 0"> <label for="checkbox" style="display: inline;margin: 0;padding: 0">Remember me</label>
					</div>
		<br>
		<button name="submit" type="submit" class="btn waves-effect waves-light btn-success">Log In</button>
	<span><a href="recover.php" style="color: black;">Forgot Password</a></span>
	<br>
		Not a user? <a href="signup.php">SignUp</a>

	</div>
</div>
	</form>
</div>
</main>
<div>
	<?php
include'inc/navscript.php';
	include 'inc/footer.php';
	?>
	
</div>
</body>
</html>