<?php
session_start();
$firstname = '';
$lastname = '';
$email = '';
$phone = '';
$gender = '';
if (isset($_POST['submit'])) {
	
require'inc/dbh.inc.php';
$firstname = mysqli_real_escape_string($conn,  $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,  $_POST['lastname']);
 $email = mysqli_real_escape_string($conn,  $_POST['email']);
 $password = mysqli_real_escape_string($conn,  $_POST['password']);
 $cpassword = mysqli_real_escape_string($conn,  $_POST['cpassword']);
 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
 $gender = $_POST['gender']; 

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password)) {
  $_SESSION['error'] = "Fields cannot be left empty";
  header("location: test?empty");
  exit();
}
if ($password !== $cpassword) {
	$_SESSION['error'] = 'Passwords do not match';
header("Location: test");
exit();
}if (empty($gender)) {
	$_SESSION['error'] = 'Gender option was left empty';
header("Location: test");
exit();
}
if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname) ){
    $_SESSION['error'] = "Invalid Characters Used!";
header("Location: test");
  exit();
    
   }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
      $_SESSION['error'] = "Invalid Email";
header("Location: test");
       exit();
    }

$sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn , $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
  $_SESSION['error'] = "User Exisits with Email";
header("Location: test");
          exit();
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
	$_SESSION['success'] = 'Successfully created your account!';
	header("Location: test");
	exit();
}else{
	$_SESSION['error'] = 'Opps! there was an error while creating your account,please try again';
	header("Location: test?Opps!");
	exit();

}	
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
<form method="post">
	
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

	<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname; ?>">
	<input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname; ?>">
	<input type="email" name="email" placeholder="email" value="<?php echo $email; ?>">
	<input type="radio" name="gender" value="Male">Male
	<input type="radio" name="gender" value="female">Female
	 <input type="password" name="cpassword" placeholder="password">
	 <input type="password" name="password" placeholder="Confirm password">
	<input type="telephone" name="phone" placeholder="phone" value="<?php echo $phone; ?>"> 
	<input type="submit"  name="submit" >
</form>
</body>
</html>