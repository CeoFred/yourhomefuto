<?php
session_start();

require('dbh.inc.php');
if (isset($_POST['signup'])) {
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $first = mysqli_real_escape_string($conn,$_POST['first']);
  $last = mysqli_real_escape_string($conn,$_POST['last']);
  $cpassword = mysqli_real_escape_string($conn,$_POST['cpwd']);
  $password = mysqli_real_escape_string($conn,$_POST['pwd']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $gender = $_POST['gender'];

if (empty($first)) {
  $_SESSION['error'] = 'First name was left blank';
  header("Location: ../signup.py");
  exit();
}




}





  else{
    header("Location: ../signup.php");
    exit();
  }




?>