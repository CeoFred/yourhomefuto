<?php
session_start();
if (isset($_POST['submit'])) {
	
require_once'dbh.inc.php';
$error = false;
$first = mysqli_real_escape_string($conn,  $_POST['first']);
$last = mysqli_real_escape_string($conn,  $_POST['last']);
$email = mysqli_real_escape_string($conn,  $_POST['email']);
$password = mysqli_real_escape_string($conn,  $_POST['pwd']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
//Error Handlers
//Chec for empty fields
if (isset($_SESSION['error'])) {unset($_SESSION['error']);}
if($first == $last){
	$_SESSION['error'] = 'First Name and Last Name Cannot Be Same';
	header("Location: ../signup.php?Name-Match-Error");
	exit();
}
if (empty($first) || empty($last) || empty($email)  || empty($password)) {
	// $errors .= '<p style="color:red;">Empty Fileds.<br></p>';
	// $error_flag = true;
    $_SESSION['error'] = "Fields Are Empty!";
	header("Location: ../signup.php?EmptyFields");
	exit();
}
else{
	//check if input charactrs are valid
	 if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) ){
		// $errors .= '<p style="color:red;">Name must contain only alphabets.<br></p>';
		// $error_flag = true;
	
		$_SESSION['error'] = "Invalid Characters Used!";
header("Location: ../signup.php?signup=invalidCharactersInFields");
	exit();
	 	
	 }
	 else{
	 	//check if email id valid
	 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 
			$_SESSION['error'] = "Invalid Email";
	 		header('Location: ../signup.php?signup=Email');
			//  $errors .= '<p style="color:red;">Invalid Email.<br></p>';
			//  $error_flag = true
			 exit();
	 	}
	 	else
	 		{
	 			$sql = "SELECT * FROM users WHERE email = '$email'";
	 			$result = mysqli_query($conn , $sql);
	 			$resultCheck = mysqli_num_rows($result);

	 			if ($resultCheck > 0) {
					$_SESSION['error'] = "User Already Exists with Emial";
						header("Location: ../signup.php?Existing User");
		 
					exit();
	 			}
	 			else{
//hashing the password
$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
$token = str_shuffle($token);
$token = substr($token, 0, 10);

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);


$sql = "INSERT INTO users (Firstname, lastname, email, username, password,token,phone) 
VALUES('$first', '$last','$email', '$username','$hashedPassword','$token',$phone);";
mysqli_query($conn , $sql);
$_SESSION['success'] = 'Your Account Has Been Created ,Please Check Your Email for Veification';
header("Location: ../accountverify.php");


	 			}
	 		}
	}
}
}
else{
	header('Location: ../signup.php');
	exit();
}

?>