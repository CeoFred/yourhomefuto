<?php
session_start();
require 'inc/dbh.inc.php';

if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE users set is_Confirmed = 0 WHERE id = '$id' ";
	if(mysqli_query($conn, $sql)){
		$_SESSION['successful'] = 'User de-activated Successfully';
		header("Location: deactivate-users.php?Success");
		exit();
	}
	else{
		$_SESSION['failed'] = 'Not Updated Successfully';
		header("Location: deactivate-users.php?Failed");
		exit();
		
	}

}else{
	header("Location: deactivate-users.php");
	exit();
}
