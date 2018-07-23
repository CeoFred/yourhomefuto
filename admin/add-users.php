<?php
session_start();
$firstname = '';
$lastname = '';
$email = '';
$phone = '';
$gender = '';
if (isset($_POST['submit'])) {
	
require'inc/dbh.inc.php';
$firstname = mysqli_real_escape_string($conn,  $_POST['first']);
$lastname = mysqli_real_escape_string($conn,  $_POST['last']);
 $email = mysqli_real_escape_string($conn,  $_POST['email']);
 $password = mysqli_real_escape_string($conn,  $_POST['pwd']);
 $cpassword = mysqli_real_escape_string($conn,  $_POST['cpwd']);
 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
 $gender = $_POST['gender']; 

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password)) {
  $_SESSION['error'] = "Fields cannot be left empty";
  
}
if ($password !== $cpassword) {
	$_SESSION['error'] = 'Passwords do not match';
}if (empty($gender)) {
	$_SESSION['error'] = 'Gender option was left empty';
}
if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname) ){
    $_SESSION['error'] = "Invalid Characters Used!";
    
   }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
      $_SESSION['error'] = "Invalid Email";
    }

$sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn , $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
  $_SESSION['error'] = "User Exisits with Email";
        }

else{
 $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
 $token = str_shuffle($token);
 $token = substr($token, 0, 30);
 $num = 01234567;
 $num = str_shuffle($num);
 $yhf = 'yhf-';
 $userid = $yhf.$num;

 $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (firstname,lastname,email,phone,password,token,user_id,is_confirmed,state,address,Landmark,lodge,room_number,gender) 
VALUES('$firstname','$lastname','$email','$phone','$hashedPassword','$token','$userid',0,'N/A','N/A','N/A','N/A',
'N/A','$gender');";
if($query = mysqli_query($conn, $sql)){
$_SESSION['success'] = 'Account Created';
}else{
	$_SESSION['error'] = 'Opps! there was an error while creating your account,please try again';

}	
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
<meta name="Keywords" content="Register Yourhomefuto,Yourhomefuto,Signup yourhomefuto ,federal univerisity of technology owerri,campus services,futo roomates,futo services,campus roomates,buy and sell,futo sell,futo market,iexchange">
<meta name="Description" content="Create a Free account to enjoy our top services on campus">
<?php
include('inc/header.php');
?>
    </head>
<body style="background-color: #f1f1f1;">
<!--Main Navigation-->
<header>
<?php include'inc/nav.php'; 

?>        
</header>
<!--Main Navigation-->
<!--Main layout-->

<main style="margin-bottom: 50px;">	<!-- 
	<div class="form justify-content-center" align="center" > -->
<h4>Sign Up</h4>
	<h6>Please fill in this form to create an account</h6>
	<form method="POST">
<div class="container">
<div class="row">
<div class="col-md-7 col-md-offset-6 col-sm-12 col-lg-4 col-lg-offset-6 col-xl-7 col-xl-offset-6 justify-content-center" align="center" >

<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgb(244,0,0);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>		
			<?php if(isset($_SESSION['success'])){ ?>
							<div class="success" style="background-color: rgba(24,200,6,0.2);text-align: center;font-size: 1.2em;padding: 10px;color:white;">
								<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
							</div>
						<?php
							} 
						?>	
<div class="form-group">
		<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				<i class="fa fa-user">1</i>
			</div>
		</div>
		<input type="text" id="email"  name="first" class="input form-control"  placeholder="First Name" aria-describedby="emailhelp">
	</div>
		
		<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				<i class="fa fa-user">2</i>
			</div>
		</div>

		<input type="text"  name="last" class="input form-control"  placeholder="last Name" aria-describedby="emailhelp">
	</div>
		
<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				@
			</div>
		</div>
		<input type="text" id="email"  name="email" class="input form-control"  placeholder="Enter email" aria-describedby="emailhelp">
	</div>
	
		
<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				<i class="fa fa-phone" style="font-size: 23px;"></i>
			</div>
		</div>
		<input type="tel" id="tel"  name="phone" class="input form-control"  placeholder="Mobile number" aria-describedby="emailhelp" value="+234">
	</div>
		
<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				<i class="fa fa-shield" style="font-size: 24px;"></i>
			</div>
		</div>
		<input type="Password"  name="pwd" class="input form-control"  placeholder="Enter a secured Password" aria-describedby="emailhelp">
		<small class="form-text">Your password must be 8-20 characters long,contain letters and numbers, and must not contain spaces,special charcters or emoji.</small>
	</div>

<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text" style="background-color: #66CDAA">
				<i class="fa fa-shield" style="font-size: 24px;"></i>
			</div>
		</div>
		<input type="Password"  name="cpwd" class="input form-control"  placeholder="Password one more time" aria-describedby="emailhelp">
	</div>
	<input type="radio" name="gender" value="Male" class="radio">Male
	<input type="radio" name="gender" value="female" class="radio">Female
		</div>
		<br>
		<button name="submit" type="submit" class="btn btn-success">Sign Up</button>
		Already a user? <a  href="../login.php"> Test Login</a>

</div>
</div>
	</form>
</div>
</main>

</div>
<div>
	<?php
include'inc/navscript.php';
	?>

</div>
</body>
</html>