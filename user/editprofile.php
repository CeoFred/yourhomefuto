<?php
$first = $email = $gender = $address = $state = $busstop = $phone = $lodge = $room = $last = '';
session_start();
	$semail = $_SESSION['email'];
if(isset($_SESSION['email'])){
 $first = ucwords($_SESSION['first']);}
if(isset($_SESSION['email'])){ $last = ucwords($_SESSION['last']);
}
if(isset($_SESSION['email'])){ $email = ucwords($_SESSION['email']);}
if(isset($_SESSION['email'])){ $gender = ucwords($_SESSION['gender']);
}
if(isset($_SESSION['email'])){ $address = ucwords($_SESSION['address']);}
if(isset($_SESSION['email'])){ $state = ucwords($_SESSION['state']);}
if(isset($_SESSION['email'])){ $busstop = ucwords($_SESSION['Landmark']);}
if(isset($_SESSION['email'])){ $phone = ucwords($_SESSION['phone']);}
if(isset($_SESSION['email'])){ $lodge = ucwords($_SESSION['lodge']);}
if(isset($_SESSION['email'])){ $room = ucwords($_SESSION['room_number']);}
if (isset($_GET['submit'])) {
if ($email = '') {
	$_SESSION['error'] = 'hmm';
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title><?php
include'inc/header.php';
    ?>
</head>
<body>
    <?php
include'inc/nav.php';
    ?>

    <div class="container">
<div class="row justify-content-center">
<div class="col-md-6 form-control" style="margin-top:px;" align="center"> 
<h3 class="">UPDATE PROFILE<i class="fa fa-user-circle-o"></i></h3>
<form methood="GET" action="editprofile.php">
<?php
if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-danger">';
	echo $_SESSION['error'];
	echo "</div>";
unset($_SESSION['error']);
}
?>
<?php
if (isset($_SESSION['success'])) {
	echo '<div class="alert alert-success">';
	echo $_SESSION['success'];
	echo "</div>";
unset($_SESSION['success']);
}
?>
First Name <input type="text" name="first" value="<?php echo $first;  ?>" class="form-control">
Last Name <input name="last" type="text" value="<?php echo $last;  ?>" class="form-control">
Email <input  name="email" type="email" value="<?php echo $email;  ?>" class="form-control">
Mobile Number <input type="text" name="phone" value="<?php echo $phone;  ?>" class="form-control">
Gender 
<select class="form-control">
	<option>
		<?php echo $gender;  ?>
	</option>
</select>
Address <input type="text" name="address" value="<?php echo $address;  ?>"  class="form-control">
State <input name="state" type="text" value="<?php echo $state;  ?>" class="form-control">
Nearest Bus-Stop <input name="Landmark" type="text" value="<?php echo $busstop;  ?>" class="form-control">
Lodge <input type="text" name="lodge"  value="<?php echo $lodge;  ?>" class="form-control">

Room Number <input type="text"  name="room_number" value="<?php echo $room;  ?>" class="form-control" >

<input name="submit" class="btn btn-secondary" type="submit" value="Update">


</form>
</div>

</div>

    </div>
    
	<?php

include'../inc/footer.php';
	include'inc/navscript.php';
	?>
</body>
</html>