<?php
session_start();
require 'inc/dbh.inc.php';

if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE campus_pilot_users set cpconfirmed = 0 WHERE id = '$id' ";
	if(mysqli_query($conn, $sql)){
		$_SESSION['cp_dsuccessful'] = 'User de-activated Successfully';
		header("Location: cp_users.php?Success");
		exit();
	}
	else{
		$_SESSION['failed'] = 'Not Updated Successfully';
		header("Location: cp_users.php?Failed");
		exit();
		
	}

}else{
	header("Location: cp_users.php");
	exit();
}
