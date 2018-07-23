<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <header>
    <?php
include'inc/header.php';
    ?>
    </header>
</head>
<body>

    <?php
include'inc/nav.php';
    ?>

    <div class="container">

<span align="center"><a class="btn btn-default" href="service-edit">Uploaded Service</a><a href="roomate-edit" class="btn btn-default">Uploaded Room-mate Profile</a><a href="iexchange-edit" class="btn btn-default">Edit IExchange item</a><a class="btn btn-default" href="editprofile">Update Profile</a><a class="btn btn-default" href="favourites">Favourites</a></span>
<div class="row justify-content-center">
<div class="col-md-6 form-control" style="margin-top:px;" align="center"> 
<h3 class="">PROFILE<i class="fa fa-user-circle-o"></i></h3><div>
<?php
if(isset($_SESSION['email'])){
    echo'
    <h5>Account Verified <i class="fa fa-check" style="color:green;"></i> </h5>';
}
?>
</div>
<form methood="post" action="account.php" >

First Name <input disabled value="<?php if(isset($_SESSION['email'])){ $first = ucwords($_SESSION['first']);

echo $first;}  ?>" class="form-control disabled">
Last Name <input disabled value="<?php if(isset($_SESSION['email'])){ $last = ucwords($_SESSION['last']);

echo $last;}  ?>" class="form-control disabled">
Email <input disabled value="<?php if(isset($_SESSION['email'])){ $email = ucwords($_SESSION['email']);

echo $email;}  ?>" class="form-control disabled">

Mobile Number <input  disabled readonly value="<?php if(isset($_SESSION['email'])){ $phone = ucwords($_SESSION['phone']);

echo $phone;}  ?>" class="form-control disabled">

Gender <input disabled value="<?php if(isset($_SESSION['email'])){ $gender = ucwords($_SESSION['gender']);

echo $gender;}  ?>" class="form-control disabled">

Address <input disabled value="<?php if(isset($_SESSION['email'])){ $address = ucwords($_SESSION['address']);

echo $address;}  ?>" class="form-control disabled">

City <input disabled value="<?php if(isset($_SESSION['email'])){ $state = ucwords($_SESSION['state']);

echo $state;}  ?>" class="form-control disabled">

Nearest Bus-Stop <input disabled value="<?php if(isset($_SESSION['email'])){ $landmark = ucwords($_SESSION['Landmark']);

echo $landmark;}  ?>" class="form-control disabled">


Lodge <input disabled value="<?php if(isset($_SESSION['email'])){ $lodge = ucwords($_SESSION['lodge']);

echo $lodge;}  ?>" class="form-control disabled">

Room Number <input disabled value="<?php if(isset($_SESSION['email'])){ $room = ucwords($_SESSION['room_number']);

echo $room;}  ?>" class="form-control disabled">

</form>
<br>
<a href="updatepassword.php" class="btn btn-primary">Change Password</a>

<a href="editprofile.php" class="btn btn-secondary">Update Profile</a>
</div>

</div>

    </div>
    
	<?php

include'../inc/footer.php';
	include'inc/navscript.php';
	?>
</body>
</html>