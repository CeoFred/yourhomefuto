<?php
session_start();
require 'inc/dbh.inc.php';

if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE users set is_confirmed = 1 WHERE id = '$id' ";
	if(mysqli_query($conn, $sql)){
		$_SESSION['successful'] = 'User Activated Successfully';
		header("Location: activate-users.php?Success");
		exit();
	}
	else{
		$_SESSION['failed'] = 'Not Updated Successfully';
		header("Location: activate-users.php?Failed");
		exit();
		
	}

}else{
	header("Location: activate-users.php");
	exit();
}
