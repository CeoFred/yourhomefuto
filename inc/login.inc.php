<?php
session_start();

if (isset($_POST['submit'])) {
require'dbh.inc.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (isset($_POST['remember'])) {$remember = true;}
else{$remember = false;}

//Error Hnadlers
//Check if inputs are empty
if(empty($email) || empty($password)) {
  $_SESSION['error'] = 'Empty Fields'.'<i class="fa fa-warning (alias)"></i>';
  header("Location: ../login.php?EmptyFields");
  exit();
}
else{
  $sql = "SELECT * FROM users WHERE email = '$email' ";
  $result = mysqli_query($conn , $sql);
  $resultcheck = mysqli_num_rows($result);
  if($resultcheck < 1){
    $_SESSION['error'] = 'Details Seem Incorrect'.'<i class="fa fa-warning (alias)"></i>';
    header("Location: ../login.php?ERROR");
    exit();  
  }else{
 if ($row = mysqli_fetch_assoc($result)) {
//Dehashing the password
$hashedpwdcheck = password_verify($password,$row['password']);
$_SESSION['password'] = $hashedpwdcheck;;
if ($hashedpwdcheck == false) {
  $_SESSION['error'] = 'Hmmm,Try Again'.'<i class="fa fa-warning (alias)"></i>';
  header("Location: ../login.php?Error");


} 
elseif ($hashedpwdcheck == true) {
  //Login the user here
  
  $sql = "SELECT * FROM users WHERE email = '$email' ";
  $result = mysqli_query($conn , $sql);
  $resultcheck = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);
 if($row['is_confirmed'] == 0)
 {
   $_SESSION['error'] = 'Verify Your Email';
   header("Location: ../login.php?Deactivated-Account");
 }
 elseif($row['is_confirmed'] == 1){
if($remember == true)
{$expiry = time() + 7*24*60*60;
          setcookie('email',$email,$expiry);
          setcookie('password',$hashedpwdcheck,$expiry);
}
$_SESSION['id'] = $row['id'];			
$_SESSION['email'] = $row['email'];
$_SESSION['first'] = $row['firstname'];
$_SESSION['last'] = $row['lastname'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['address'] = $row['address'];
$_SESSION['state'] = $row['state'];
$_SESSION['gender'] = $row['gender'];
$_SESSION['Landmark'] = $row['Landmark'];
$_SESSION['lodge'] = $row['lodge'];
$_SESSION['room_number'] = $row['room_number'];
$_SESSION['about'] = $row['About'];

header("Location: ../services/");
exit();

}
}
}
}
}
}
else{
  header("Location: ../index.php?Don't-Try-That-Again");
  exit();
}
?>