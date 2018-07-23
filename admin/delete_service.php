<?php 
session_start();
require 'inc/dbh.inc.php';
if (isset($_GET['name'])) {


	$name = mysqli_real_escape_string($conn,$_GET['name']);
// echo $name;

	$sql = "SELECT id FROM services WHERE name = '$name';";
	$delsql = mysqli_query($conn,$sql);
	if ($delsql) {
	$row = mysqli_fetch_assoc($delsql);
	$id = $row['id'];

$deltime = "DELETE FROM services WHERE id =  '$id';";
$delsql2 = mysqli_query($conn,$deltime);
if ($delsql2) {
		$_SESSION['success'] = 'Service has been deleted Successfully';
		header('Location: del_s.php');
		exit();

}else{
		$_SESSION['error'] = 'There was problem boss,try again';
		header('Location: del_s.php');
		exit();
}
	}
	else{
		$_SESSION['error'] = 'There was problem boss finding an id';
		header('Location: del_s.php');
		exit();

	}


}

// else{
// 	header("Location: index?unauthorizde-access");
//  }
?>