<?php
session_start();
require 'inc/dbh.inc.php';

if (isset($_GET['name']) & !empty($_GET['name'])) {
	$name = $_GET['name'];
	$sql = "UPDATE services set verified = 0 WHERE name = '$name' ";
	if(mysqli_query($conn, $sql)){
		$_SESSION['successful'] = 'User de-activated Successfully';
		header("Location: approved_s.php?Success");
		exit();
	}
	else{
		$_SESSION['failed'] = 'Not Updated Successfully';
		header("Location: approved_s.php?Failed");
		exit();
		
	}

}else{
	header("Location: approved_s.php");
	exit();
}
