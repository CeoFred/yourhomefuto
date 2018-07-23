<?php 
session_start();
if (isset($_POST['submit'])) {
require'../inc/dbh.inc.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (isset($_POST['remember'])) {$remember = true;}
else{$remember = false;}

//Error Hnadlers
//Check if inputs are empty
if(empty($email) || empty($password)) {
  $_SESSION['error'] = 'Empty Fields'.'<i class="fa fa-warning (alias)"></i>';
}
else{
  $sql = "SELECT * FROM campus_pilot_users WHERE cpemail = '$email' ";
  $result = mysqli_query($conn , $sql);
  $resultcheck = mysqli_num_rows($result);
  if($resultcheck < 1){
    $_SESSION['error'] = 'Details Seem Incorrect'.'<i class="fa fa-warning (alias)"></i>';
  }else{
 if ($row = mysqli_fetch_assoc($result)) {
//Dehashing the password
$hashedpwdcheck = password_verify($password,$row['cppassword']);
$_SESSION['password'] = $hashedpwdcheck;;
if ($hashedpwdcheck == false) {
  $_SESSION['error'] = 'Hmmm,Try Again'.'<i class="fa fa-warning (alias)"></i>';
} 
elseif ($hashedpwdcheck == true) {
  //Login the user here
  
  $sql = "SELECT * FROM campus_pilot_users WHERE cpemail = '$email' ";
  $result = mysqli_query($conn , $sql);
  $resultcheck = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);
 if($row['cpconfirmed'] == 0)
 {
   $_SESSION['error'] = 'Verify Your Email';
 }
 elseif($row['cpconfirmed'] == 1){
if($remember == true){

$_SESSION['cpemail'] = $row['cpemail'];
$_SESSION['cpfirst'] = $row['cpfirstname'];
$_SESSION['cplast'] = $row['cplastname'];
$expiry = time() + 30*24*60*60;
          if(!setcookie('email',$_SESSION['cpemail'],$expiry)){
          	$_SESSION['error'] = 'Email Cookies not set';
          }else{
          	$_SESSION['success'] = 'Email Cookie  set';
          }
          setcookie('password',$hashedpwdcheck,$expiry);}
// $_SESSION['id'] = $row['cpid'];			
// $_SESSION['phone'] = $row['cphone'];
// $_SESSION['address'] = $row['cpaddress'];
// $_SESSION['state'] = $row['cpstate'];
// $_SESSION['gender'] = $row['gender'];
// $_SESSION['Landmark'] = $row['cpLandmark'];
// $_SESSION['lodge'] = $row['cplodge'];
// $_SESSION['room_number'] = $row['room_number'];
// $_SESSION['about'] = $row['About'];
$_SESSION['success'] = 'Welcome back '.$_SESSION['cpfirst'].'<i class="fa fa-user"></i>';
 header("Location: book-now");
 exit();

}
}
}
}
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php 
include 'inc/header.php';
	 ?>

<meta property="og:description" content="login into your account to book a ride,quick and easy.">
	<title>Drive - Campus Pilot</title>
</head>
<?php 
include 'inc/nav.php';
 ?>
<body>
<div style="background-image: url('img/IMG-20180620-WA0004.jpg');background-size: cover;background-repeat: no-repeat;padding-top: 100px;padding-bottom:170px; " class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div style="background-color: rgba(244,244,244,0.8);padding: 50px;">
				<h4>LOGIN to ride</h4>
		
			
<?php if(isset($_SESSION['success'])){ ?>
				<div class="error" style="background-color: rgba(2,244,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
				</div>
			<?php
				} 
			?>																																																									
<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>		

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="email" name="email" placeholder="Email" class="form-control">
				<br>
				<input type="password" name="password" placeholder="password" class="form-control">
				<input type="checkbox"  name="remember">Remember Me
				<br>
				<button type="submit" name="submit" class="btn btn-success">LOGIN</button>			<a href="reset">Reset Password</a> | <a href="index">Sign-up</a>
				</form>
			</div>
		</div>
	</div>

</div>

<?php 
include 'inc/navscript.php';
include 'inc/footer.php';
 ?>
</body>
</html>