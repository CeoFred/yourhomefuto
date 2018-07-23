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


// require 'src/Clockwork.php';
// require 'src/ClockworkException.php';
// try {
// 	$Clockwork = new mediaburst\ClockworkSMS\Clockwork('ef721ea886e2fa7e7d646ecd13091c21f5e05c47');
// 	$message = array('to' =>'abc' ,'message' => 'This is a test!' );
// 	$result = $Clockwork->send($message); 
// } catch (mediaburst\ClockworkSMS\ClockworkException $e) {
// 	print $e->getMessage();
// }
$num = 1234567890;
$num = str_shuffle($num);
$token = substr($num, 0, 6);
$hashedPassword = password_hash($pass1, PASSWORD_BCRYPT);

$sql = "INSERT INTO campus_pilot_users (cpfirstname,cplastname,cpemail,cpphone,cppassword,cptoken,cpconfirmed,cpinstitution) 
VALUES('$fname','$lname','$email','$phone','$hashedPassword','$token',0,'$Institution');";
if (mysqli_query($conn,$sql)) {
require 'src/Clockwork.php';
require 'src/ClockworkException.php';
	
 $email = $fname = $lname = $phone = '';
 $to = "+2348160583193@txt.att.net";
 $from  = 'Campus-pilot';
 $message = 'Welcome';
 $headers = "From: $from\n";
 if(mail($to,'',$message,$headers)){
 	$_SESSION['success'] = 'Congratulations!Now check your inbox for your token';
 }else{
 	$_SESSION['error'] = 'Opps error sending text messaage';
 }

//	$_SESSION['success'] = 'Details were submitted';
}


	}

	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

				<form  action="test3" method="POST">
					<div align="center">

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

					<input type="text" style="border-color: 4px solid blue;height: 50px;width: 40%;" name="fname" placeholder="FirstName" value="<?php
echo($fname);
					?>">

					<input type="text" style="border-color: 1px solid blue;height: 50px;width: 40%;" name="lname" placeholder="LastName" value="<?php
echo($lname);
					?>">

					</div>
					<div align="center">
				
					<input  value="<?php
echo($email);
					?>" type="email" name="email" placeholder="Email" style="border-color: 1px solid blue;height: 50px;width: 80%">
						
					<input value="<?php
echo($phone);
					?>" type="text" name="phone" placeholder="PhoneNumber" style="border-color: 1px solid blue;height: 50px;width: 40%">
					<input  type="text" name="Institution" placeholder="Institution" style="border-color: 1px solid blue;height: 50px;width: 40%">
						
					<input  type="password" name="pass1" placeholder="Password" style="border-color: 1px solid blue;height: 50px;width: 40%">
										
					<input  type="password" name="pass2" placeholder="Confirm-Password" style="border-color: 1px solid blue;height: 50px;width: 40%">
					<br>
					<div style="background-color: #fff;margin-top: 20px;width: 80%;">
						<input type="checkbox" name="agree" class="checkbox">
						<i style="">By proceeding, I agree that campus-pilot or its representatives may contact me by email, phone, or SMS (including by automatic telephone dialing system) at the email address or number I provide, including for marketing purposes. I have read and understand the relevant Riders Privacy Statement.</i>
						
					</div>
						
					
					<input type="submit" class="btn btn-primary btn-block" name="submit" value="SIGNUP TO RIDE" style="border-color: 1px solid blue;height: 50px;width: 80%">	
					
					</div>

				</form>
		
</body>
</html>