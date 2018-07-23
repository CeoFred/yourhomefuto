	<?php 
session_start();
if (isset($_POST['submit'])) {
	require 'inc/dbh.inc.php';
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	// $role = mysqli_real_escape_string($conn,$_POST['role']);

 $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
 $sql = "INSERT INTO admin (a_email,a_username,a_pass,a_fname,a_lname) VALUES ('$email','$username','$hashedPassword','$fname','$lname');";
 if(mysqli_query($conn,$sql)){
 	echo "added";
 }else{
 	echo "not added";
 }
}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD ADMIN</title>
</head>
<body>
<form method="post">
	<input type="text" name="fname" placeholder="FIRSTNAME">
	<input type="text" name="lname" placeholder="LASTNAME">
	<input type="email" name="email" placeholder="EMAIL">
	<input type="password" name="pass" placeholder="PASSWORD">
	<input type="text" name="username" placeholder="USERNAME">
	<!-- <select name="role">
		<option value="admin">Admin</option>
		<option value="editor">Editor</option>
	</select>
	 --><input type="submit"  name="submit" value="ADD ADMIN">
</form>
</body>
</html>