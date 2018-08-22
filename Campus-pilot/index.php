<?php 
session_start();
$email = $fname = $lname = $phone = '';
if (isset($_POST['submit'])) {
	require 'inc/dbh.inc.php';
$email = mysqli_real_escape_string($conn,$_POST['email']);
	 $fname  = mysqli_real_escape_string($conn,$_POST['fname']);
	
	 $lname = mysqli_real_escape_string($conn,$_POST['lname']);
	
	 $phone = mysqli_real_escape_string($conn,$_POST['phone']);
	
	 $pass2 = mysqli_real_escape_string($conn,$_POST['pass2']);
	
	 $pass1 = mysqli_real_escape_string($conn,$_POST['pass1']);
	 $Institution = mysqli_real_escape_string($conn,$_POST['Institution']);
	
if (!isset($_POST['agree'])) {
	$_SESSION['error'] = 'Please agree to terms and conditions to continue';
}
	if (empty($fname)) {
	$_SESSION['error'] = 'FirstName left empty';
	}
	if (empty($lname)) {
	$_SESSION['error'] = 'LastName left empty';
	}if (empty($phone)) {
		$_SESSION['error'] = 'PhoneNumber is required';
	}
	if (empty($pass1) || empty($pass2)) {
		$_SESSION['error'] = 'A secured password is required';
		
	}else{
		if ($pass2 !== $pass1) {
			$_SESSION['error'] = 'Password do not match';
		}else{
			$password = $pass1;
		}
	}if (empty($email)) {
		$_SESSION['error'] = 'Email is required';
	}else{

$sql = "SELECT * FROM campus_pilot_users WHERE cpemail = '$email'";
$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {
		$_SESSION['error'] = 'user exists with email';
	}else{

$num = 1234567890;
$num = str_shuffle($num);
$token = substr($num, 0, 6);
$hashedPassword = password_hash($pass1, PASSWORD_BCRYPT);

$sql = "INSERT INTO campus_pilot_users (cpfirstname,cplastname,cpemail,cpphone,cppassword,cptoken,cpconfirmed,cpinstitution) 
VALUES('$fname','$lname','$email','$phone','$hashedPassword','$token',0,'$Institution');";
if (mysqli_query($conn,$sql)) {

}else{
	$_SESSION['error'] = 'Opps please try again';
}
	}

	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'inc/header.php'; ?>
	<title>Campus Pilot | yourhomefuto</title>
	
<meta property="og:description" content="Campus pilot is the best way to transport yourself to school at low cost,start now.Never get stranded, call up a pilot.">
</head>
<body >
<?php include'inc/nav.php'; ?>
<div class="contaiiner-fluid">

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
	<div class="row" style="margin-top:3px;">
			
			<div align="center" class="col-md-8" style="margin-top:-3px;">
				<!-- three images from campus pilot ,circle images -->
<!-- <span class="d-none d-md-block"><h2 style="color: black;">Feeling bad about your movement?don't let it spoil your day,call a pilot or book an excutive seat today.</h2>
</span> -->

<div class="row">


<div class="col-md-12">	

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
  </ol>
  <div class="carousel-inner">
<div class="carousel-item active">
    <a  href="book-now">
      <img class="d-block w-100  d-sm-block" height="530" width="100%" src="img/IMG-20180620-WA0009.jpg" alt="campus-pilot" style="">
     </a>
    </div>

    <div class="carousel-item">
    <a   href="book-now">
      <img class="d-block w-100  d-sm-block" height="530" src="img/IMG-20180620-WA0006.jpg" alt="campus-pilot">
     </a>
       <div class="carousel-caption">
    <h6 style="margin-bottom:-40px;"></h6>

  </div>
    </div>
    <div class="carousel-item">
    	<a href="book-now">
    		
      <img class="d-block w-100" height="530" src="img/IMG-20180620-WA0004.jpg" height="auto" alt="Campus-pilot">
       
    	</a><div class="carousel-caption">
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>		
</div>



					
</div>
					
					
				


			</div>
			<div class="col-md-4 d-none d-md-block" >
				<div id="form" style="border-left: 6px solid #1f3057;">
				<div  class="select-ride" align="center">
					<h3 >Ride with Campus-pilot</h3>
					<p>START<i class="fa fa-car"></i></p>
				</div>

				<form  action="index" method="POST">
					<div align="center" style="margin: 10px;">

						
					<input type="text" style="border-color: 4px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black" name="fname" placeholder="FirstName" onmouseenter="" value="<?php
echo($fname);
					?>">

					<input type="text" style="border-color: 1px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black" name="lname" placeholder="LastName" value="<?php
echo($lname);
					?>">

					</div>
					<div align="center">
				
					<input value="<?php
echo($phone);
					?>" type="text" name="phone" placeholder="PhoneNumber" style="border-color: 1px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black">
					<input  type="text" name="Institution" placeholder="Institution" style="border-color: 1px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black">
						
					<input  type="password" name="pass1" placeholder="Password" style="border-color: 1px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black">
										
					<input  type="password" name="pass2" placeholder="Confirm-Password" style="border-color: 1px solid blue;height: 50px;width: 40%;border:none;border-bottom: 2px solid black">
				
					<input  value="<?php
echo($email);
					?>" type="email" name="email" placeholder="Email" style="border-color: 1px solid blue;height: 50px;width: 80%;border:none;border-bottom: 2px solid black">
						
					<br>
					<div style="background-color: #fff;margin-top: 20px;width: 80%;">
						<input type="checkbox" name="agree" class="checkbox">
						<i style="">By proceeding, I agree that campus-pilot or its representatives may contact me by email, phone, or SMS (including by automatic telephone dialing system) at the email address or number I provide, including for marketing purposes. I have read and understand the relevant Riders Privacy Statement.</i>
						
					</div>
						
					
					<input type="submit" class="btn btn-primary btn-block" name="submit" value="SIGNUP TO RIDE" style="border-color: 1px solid blue;height: 50px;width: 80%">	
					
					</div>

				</form>
					
				</div>
			</div>
	</div>


<div style="background-color: #fff;margin-top: 20px;margin: 30px;">
	<div class="row">
		<div class="col-md-4" align="center">

<div align="center"><i style="font-size: 30px;color: #1f3057;" class="fa fa-road"></i>
</div>
			<h4>Easiest Way Around</h4>
			<p>One tap and a car comes directly to you. Hop in—your driver knows exactly where to go. And when you get there, just step out. Payment is completely seamless.</p>
		</div>

		<div class="col-md-4" align="center">
<div align="center"><i style="font-size: 30px;color: #1f3057;" class="fa fa-map-marker"></i>
	</div>
			<h4>Anywhere, anytime</h4>
			<p>Daily commute. Errand across town. Early morning pickup. Late night party. Wherever you’re headed, count on a pilot for a ride—no reservations required.
</p>
		</div>
		<div class="col-md-4" align="center">
			<div align="center"><i style="font-size: 30px;	color: #1f3057;" class="fa fa-car"></i>
	</div>
			<h4>Pay Less,Ride More
		</h4>
		<p>
			Economy cars at very affordable prices are always available. For special occasions, no occasion at all, or when you just a need a bit more room, call a pilot.
		</p>
			</div>
	</div>
</div>
<div class="row" style="background-color: #1f3057;padding: 30px;">
	<div class="col-md-12">
	<h3 style="color: #fff;">Emergency Pick-Up?</h3>
	</div>
	<div class="col-md-4" style="margin-bottom: 10px;"> 
<a href="tel:08155153293" class="btn btn-success btn-lg"><i class="fa fa-phone"></i></a>
<span style="color: #fff;">Buzz Pilot 1</span>	
 
<a href="sms:08155153293" class="btn btn-primary btn-lg"><i class="fa fa-envelope
	"></i></a>
<span style="color: #fff;">SMS Pilot 1</span>	

</div>

	<div class="col-md-4" style="margin-bottom: 10px;"> 
<a href="tel:08141182295" class="btn btn-success btn-lg"><i class="fa fa-phone"></i></a>
<span style="color: #fff;">Buzz Pilot 2</span>	
		
<a href="sms:08141182295" class="btn btn-primary btn-lg"><i class="fa fa-envelope"></i></a>
<span style="color: #fff;">SMS Pilot 2</span>	
	</div>

	<div class="col-md-4" style="margin-bottom: 10px;"> 
<a href="" class="btn btn-success btn-lg"><i class="fa fa-phone"></i></a>
<span style="color: #fff;"style="color: #fff;">Buzz Pilot 3</span>	
		<a href="" class="btn btn-primary btn-lg"><i class="fa fa-envelope"></i></a>
<span style="color: #fff;"style="color: #fff;">SMS Pilot 3</span>	
		
	</div>
</div>
</div>



   <?php
 include'inc/footer.php';
  include'inc/navscript.php';
  ?>
</body>
</html>