<?php
session_start();
if (isset($_POST['submit'])) {
require'dbh.inc.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if(empty($email) || empty($password)) {
$_SESSION['error'] = 'Empty Fields'.'<i class="fa fa-warning (alias)"></i>';
header("Location:../login.php?EmptyFields");
exit();
}
else{
$sql = "SELECT * FROM admin WHERE a_email = '$email' ";
$result = mysqli_query($conn , $sql);
$resultcheck = mysqli_num_rows($result);
if($resultcheck < 1){
$_SESSION['error'] = 'Details Seem Incorrect'.'<i class="fa fa-warning (alias)"></i>';
header("Location: ../login.php?ERROR");
exit();  
}else{
if ($row = mysqli_fetch_assoc($result)) {
//Dehashing the password
$hashedpwdcheck = password_verify($password,$row['a_pass']);
if ($hashedpwdcheck == false) {
$_SESSION['error'] = 'Wrong';
header("Location: ../login.php?PassERR");
exit();
}elseif ($hashedpwdcheck == true) {
$_SESSION['adminid'] = $row['a_id'];
$_SESSION['a_email'] = $row['a_email'];
$_SESSION['fullname'] = $row['a_fname'];
$_SESSION['username'] = $ow['a_username'];
$name = $_SESSION['fullname'];
header("Location: ../index.php?Logged-In-as-$name");
exit();
}

}
}
}
}
?>