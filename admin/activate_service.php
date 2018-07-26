<?php
session_start();
require 'inc/dbh.inc.php';

if (isset($_GET['id']) & !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE services set verified = 1 WHERE id = '$id' ";
	if(mysqli_query($conn, $sql)){
		$_SESSION['successful'] = 'Service Activated Successfully';
		header("Location: unapproved_s.php?Success");
		exit();
	}
	else{
		$_SESSION['failed'] = 'Gone wrong';
		header("Location: unapproved_s.php?Failed");
		exit();
		
	}

}else{
	header("Location: unapproved_s.php");
	exit();
}
