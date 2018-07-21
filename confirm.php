<?php
session_start();
	function redirect() {
		header('Location: signup.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
require('inc/dbh.inc.php');
		$email = $conn->real_escape_string($_GET['email']);
		$token = $conn->real_escape_string($_GET['token']);

		$sql = $conn->query("SELECT token FROM users WHERE email='$email' AND token='$token' AND is_confirmed=0");

		if ($sql->num_rows > 0) {
			$conn->query("UPDATE users SET is_confirmed=1, token='' WHERE email='$email'");
			$_SESSION['success']  = 'Your email has been verified! You can log in now!'.'<br>';
			header("Location: login");
			exit();
		} else
		$_SESSION['error'] = 'Activation token already exist,please login';
		header("Location: login");
		exit();
	}
?>
