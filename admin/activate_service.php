<?php
session_start();

if (isset($_GET['id']) & !empty($_GET['id'])) {
require 'inc/dbh.inc.php';
	$id = $_GET['id'];
	$sql = "SELECT * FROM services WHERE id = '$id' AND verified = 0;";
	$q = mysqli_query($conn, $sql);
	if($q) {
		$r = mysqli_fetch_assoc($q);
	$email = $r['email'];
		$fname = $r['firstname'];
	$sname = $r['name'];
		$pass = 'CSYHF'.str_shuffle($sname);
		$service_id = $r['id'];
		$uid = $r['u_id'];
	$upd = "UPDATE services SET verified = 1 WHERE id = '$id';";
	$okna = mysqli_query($conn,$upd);
	if ($okna) {
		header("Location: unapproved_s.php?updated=1&id=$service_id");
	exit();
	}
	else{
		$_SESSION['failed'] = 'Gone wrong';
		header("Location: unapproved_s.php?Failed-to-update");
		exit();
	
	}

	}
	else{
		$_SESSION['failed'] = 'Gone wrong';
		header("Location: unapproved_s.php?Failed-totally");
		exit();
	}

}else{
	header("Location: unapproved_s.php");
	exit();
}
