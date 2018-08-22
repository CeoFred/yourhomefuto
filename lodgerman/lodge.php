<?php
session_start();
$email =  $firstname = $lastname = $phone_number = '';

if (isset($_GET['lodger_man_id'])) {
	require '../inc/dbh.inc.php';
$lodge_id = mysqli_real_escape_string($conn,$_GET['lodger_man_id']);
$lodge_id = trim($lodge_id);
	$sql =  "SELECT * FROM lodger_man WHERE lodger_man_id ='$lodge_id';";
	if($qo = mysqli_query($conn,$sql)){
		$sqli = "UPDATE lodger_man SET visit_count1 = visit_count1 + 1 WHERE lodger_man_id = '$lodge_id';";
		mysqli_query($conn,$sqli);
		$r = mysqli_fetch_assoc($qo);
		$lodger_man_id = $r['lodger_man_id'];
		$lodge_name =  $r['lodge_name'];
			}
}else{
	header('Location: index?Not-found');
	exit();
}
if (isset($_POST['book'])) {
	require '../inc/dbh.inc.php';	
 $gender = mysqli_real_escape_string($conn,$_POST['gender']) ;
$floor_type = mysqli_real_escape_string($conn,$_POST['floor_type']);
$firstname = mysqli_real_escape_string($conn,$_POST['fname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone_number = $_POST['Phonenumber'];

	if ($gender == 'null') {
		$_SESSION['error'] = 'Please select your gender';
		header("Location: lodge.php?lodge_name=$lodgename");
		exit();
 	}
 	if (empty($email)) {
 		$_SESSION['error'] = 'Email cannot be left empty';
 			header('Location: lodge.php');
		exit();
 	}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		$_SESSION['error'] = 'Invalid email format';
 			header('Location: lodge.php');
		exit();
 	}
 	if (empty($lastname)) {
 		$_SESSION['error'] = 'You should have a last name';
 			header('Location: lodge.php');
		exit();
 	}elseif (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
 		$_SESSION['error'] = 'Only Letters and white spaces are allowed';
 			header('Location: lodge.php');
		exit();
 	}
 	//  if ($phone_number == '+234') {
 	//  	$_SESSION['error'] = 'Provide a Phonenumber';
 	//  		header('Location: lodge.php');
	 // exit();
 	//  }
 	 if (empty($phone_number )) {
 	 	$_SESSION['error'] = 'A phone number is required';
 		header('Location: lodge.php');
		 exit();
 	}
 	if (empty($firstname)) {
 		$_SESSION['error'] = 'You should have a first name';
 			header('Location: lodge.php');
		exit();
 	}elseif (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
 		$_SESSION['error'] = 'Only Letters and white spaces are allowed';
 			header('Location: lodge.php');
		exit();
  	}else{

  		// validating user account exists
// if (!isset($_SESSION['email'])) {
// 	$_SESSION['error'] = 'Please Login to continue';
// header("Location: ../login?lodge")
// }
 		$num = 123456789;
 		$str = str_shuffle($num);
 		$booking_id = 'LM-'.$str;
 		$sql = "INSERT INTO lodgerman_bookings (lodge_name,lodge_id,user_first_name,
 		user_last_name,user_email,user_gender,lodger_floor_type,booking_id,user_phone) VALUES ('$lodge_name','$lodger_man_id','$firstname',
 		'$lastname','$email','$gender','$floor_type','$booking_id','$phone_number');";
 	if (mysqli_query($conn,$sql)) {
		 $sqli = "UPDATE lodger_man SET ";
 		$_SESSION['success'] = 'You have successfully booked a room!Check your email for details of this booking.';
 	}else{
 		$_SESSION['error'] = 'Opps,Something went wrong please try again';
 			header('Location: lodge.php');
		exit();
 	}
 	}
// echo $_POST['gender'];
// echo $_POST['floor_type'];
// echo $_POST['fname'];
// echo $_POST['lname'];
// echo $_POST['phone'];
// echo $_POST['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $r['lodge_name']; ?>| Lodgerman</title>
    <?php require'inc/lodge_header.php'; ?>

</head>

<body>
<?php require'inc/nav.php'; ?>
<!-- mobile view starts here -->
<div  style="width: 100%" class="d-md-none">
	<div class="row">

		<div class="col-md-12" align="center">
			<!-- carousel starts -->
				<div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">

      <img  height="350" width="100%" src="../admin/<?php echo $r['thumb']; ?>" alt="<?php echo $r['lodge_name']; ?>">

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- carousel ends -->
		</div>
</div>

<!-- lodege details -->
<div>
	<div class="card" role="document">
		<div class="card-content">
			
			<div class="card-header" style="background-color:#B0E0E6">

				<h3 class="card-title" style="color:black;"><?php echo $r['lodge_name']; ?>,<?php echo $r['lodge_location']; ?>.</h3>
<i class="fa fa-star" style="color: gold;"></i><i style="color: gold;" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i>
			</div>
			<div class="modal-body">
<div>


			<div class="modal-footer btn-group">
				<a  class="btn btn-warning" href="mailto:<?php echo($r['lodger_man_id']); ?>@yourhomefuto.com.ng">Mail<i class="fa fa-envelope"></i></a>
				<a  class="btn btn-success">Call <i class="fa fa-phone"> </i></a>
			</div>
	<p><b style="color:#6495ED">Description<hr></b><?php echo $r['lodge_description']; ?></p>
<p>Available Rooms - <?php echo $r['available_rooms']; ?></p>
<p>Total Rooms - <?php echo $r['total_rooms']; ?></p>
	<i class="fa fa-warning" style="color: red;" >Notice: <?php if (empty($r['room_notice'])) {
		echo "Rooms Available on all floors";
	} else echo $r['room_notice']; ?></i>
<h5 style="color:#6495ED"><b>Lodge Facilities</b></h5>
<hr>

<p>Table Tennis Court</p>
<p>Lodge Shop</p>
<p><?php echo $r['Tanks']; ?> Reservours</p>
<h5 style="color:#6495ED"><b>Room Facilities</b></h5>
<hr>

<p><?php echo $r['kitchen_type']; ?> Kitchen</p>
<p><?php echo $r['Facilities']; ?></p>
<h5 style="color:#6495ED"><b>Extras</b></h5>
<hr>
<p>availabe GSM Network - <?php echo $r['available_network']; ?></p>
<p>Distance from school - <?php echo $r['distance_from_school']; ?></p>
<h5 style="color:#6495ED"><b>Management Team</b></h5>
<hr>
<p>Dr.Mba Nwosu(Land-lord)</p>
<p><?php echo $r['lodge_president_name']; ?>(President)</p>
<p><?php echo $r['caretaker_name']; ?>(Care-taker)</p>

<h5 style="color: #6495ED"><b>Rules and Regulations<i class="fa fa-caution"></i></b></h5>
<hr>
<textarea style="width: 100%;border:2px solid #6495ED;" readonly>
<?php echo $r['rules']; ?>
</textarea>
</div>
			</div>

			<a href="booking?ln=<?php echo  $r['lodge_name']; ?>&li=<?php echo $r['lodger_man_id']; ?>" style="border-radius:0px;height:50px;opacity:10px;" class="btn btn-primary btn-block fixed-bottom d-md-none">Book Now <i class="fa fa-book"></i> </a>
		</div>
	</div>



</div>
</div>
<!-- lodge details ends here -->


<!-- mobile view ends here -->


<!-- desktop view starts here -->
<div class="container d-md-block d-none">
<div class="row" style="margin-top: 10px;">
	<div class="col-md-5" >
<div>
	<div class="card">
		<div class="card-content">
			<div class="card-header" style="background-color:#B0E0E6">
				<h3 class="card-title" style="color:black;"><?php echo $r['lodge_name']; ?>,<?php echo $r['lodge_location']; ?>.FUTO</h3>
<i class="fa fa-star" style="color: gold;"></i><i style="color: gold;" class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i  class="fa fa-star"></i>
			</div>
			<div class="modal-body">
<div>

			<div class="modal-footer btn-group">
				<a  class="btn btn-warning" href="mailto:<?php echo($r['lodger_man_id']); ?>@yourhomefuto.com.ng">Mail<i class="fa fa-envelope"></i></a>
				<a  class="btn btn-success" href="tel:<?php echo($r['lodge_president_number']); ?>">Call <i class="fa fa-phone"> </i></a>
			</div>	
	<p><b style="color:#6495ED">Description<hr></b><?php echo $r['lodge_description']; ?></p>
<p>Available Rooms - <?php echo $r['available_rooms']; ?></p>
<p>Total Rooms - <?php echo $r['total_rooms']; ?></p>
	<i class="fa fa-warning" style="color: red;" >Notice: <?php if (empty($r['room_notice'])) {
		echo "Rooms Available on all floors";
	} else echo $r['room_notice']; ?></i>
<p>Building Type - <?php echo $r['building_type']; ?></p>
<h5 style="color:#6495ED"><b>lodge Facilities</b></h5>
<hr>
<p><?php echo $r['Tanks']; ?> Reservours</p>
<h5 style="color:#6495ED"><b>Room Facilities</b></h5>
<hr>

<p><?php echo $r['kitchen_type']; ?> Kitchen</p>
<p><?php echo $r['Facilities']; ?></p>
<h5 style="color:#6495ED"><b>Extras</b></h5>
<hr>
<p>Table Tennis Court</p>
<p>Lodge Shop</p>
<p>Availabe GSM Network - <?php echo $r['available_network']; ?></p>
<p>Distance from school - <?php echo $r['distance_from_school']; ?></p>
<h5 style="color:#6495ED"><b>Management Team</b></h5>
<hr>
<p>Dr.Mba Nwosu(Land-lord)</p>
<p><?php echo $r['lodge_president_name']; ?>(President)</p>
<p><?php echo $r['caretaker_name']; ?>(Care-taker)</p>

<h5 style="color:#6495ED"><b>Rules and Regulations<i class="fa fa-caution"></i></b></h5>
<hr>
<textarea style="width: 100%;border:2px solid #6495ED" readonly>
<?php echo $r['rules']; ?>
</textarea>

</div>
</div>

			<a href="booking?ln=<?php echo  $r['lodge_name']; ?>&li=<?php echo $r['lodger_man_id']; ?>" style="border-radius:0px;height:50px;opacity:10px;" class="btn btn-primary btn-block fixed-bottom d-md-none">Book Now <i class="fa fa-book"></i> </a>
		</div>
	</div>



</div>
</div>

	<div class="col-md-7">
			<!-- carousel starts -->
			<div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">

      <img class="" style="border-radius: 8px;" height="350" width="100%" src="../admin/<?php echo $r['thumb']; ?>" alt="<?php echo $r['lodge_name']; ?>">

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:#6495ED;border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#6495ED;border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- carousel ends -->
<div>
	<h5 style="padding: 20px;">Book a room in <?php echo $r['lodge_name']; ?></h5>
	<form method="POST">
			<?php
if (isset($_SESSION['error'])) {
	echo '<br/>'.'<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
	unset($_SESSION['error']);
}
			?>
			<?php
if (isset($_SESSION['success'])) {
	echo '<br/>'.'<div class="alert alert-success">'.$_SESSION['success'].'</div>';
	unset($_SESSION['success']);
}
			?>

			<input type="text" name="Phonenumber" placeholder="Phonenumber" value="<?php echo($phone_number); ?>" style="height: 30px;border:2px solid #6495ED">
			<input type="text" name="fname" placeholder="First name" 
			value="<?php echo($firstname); ?>" style="height: 30px;border:2px solid #6495ED">
			<input type="text" name="lname" placeholder="Lastname" value="<?php echo($lastname); ?>" style="height: 30px;border:2px solid #6495ED">
			<br>
			<br>
<input type="email" name="email" value=" <?php echo($email); ?> " placeholder="Email" style="height: 30px;border:2px solid #6495ED"> 
<select style="height: 30px;border:2px solid #6495ED" name="floor_type">
	<option value="null">--Choose a floor--</option>
	<?php if ($r['building_type'] == 'Bungalow') {
		echo '
<option value="Ground Floor">Ground floor</option>';	} 
	?>

	<?php if ($r['building_type'] == '3 storey') {
 	echo "
<option value='3rd floor'>3rd floor</option>
<option value='2nd floor'>2nd floor</option>
<option value='1st floor'>1st floor</option>
<option value='Ground floor'>Ground floor</option>
";}
 ?>

	<?php if ($r['building_type'] == '2 storey') {
 	echo "
<option value='2nd floor'>2nd floor</option>
<option value='1st floor'>1st floor</option>
<option value='Ground floor'>Ground floor</option>
";}
 ?>

	<?php if ($r['building_type'] == '1 storey') {
 	echo "
<option value='1st floor'>1st floor</option>
<option value='Ground floor'>Ground floor</option>
";}
 ?>

	<?php if ($r['building_type'] == '4 storey') {
 	echo "
<option value='4th floor'>4th floor</option>

<option value='3rd floor'>3rd floor</option>
<option value='2nd floor'>2nd floor</option>
<option value='1st floor'>1st floor</option>
<option value='Ground floor'>Ground floor</option>
";}
 ?>
</select>
<select name="gender"  style="height: 30px;border:2px solid #6495ED">
	<option value="null">--Select Gender--</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
</select>
<br>
<br>
<button type="submit" name="book" class="btn btn-primary btn-block">Reserve a room</button>
	</form>


	<h4 style="padding: 30px;"> Reviews</h4>
	<div style="background-color: lightgreen;padding: 27px;">
	<i class="fa fa-user-circle-o"></i>Nice Lodge, Big Spacing.
	<i class="fa fa-star" style="float: right;"></i><i class="fa fa-star" style="float: right;"></i><i class="fa fa-star" style="float: right;color: gold;"></i><i class="fa fa-star" style="float: right;color: gold;"></i><i class="fa fa-star" style="float: right;color: gold;"></i>
	</div>
</div>
	</div>

</div>
</div>
<!-- desktop view ends here -->
<div align="center" style="margin: 20px;">
	<h3>Similar Lodges</h3>
</div>
<?php
include 'inc/footer.php';
include 'inc/navscript.php';
 ?>
</body>
</html>
