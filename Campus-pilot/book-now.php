<?php
session_start();
$email = $phone = $first = $lname = $campus = $p_date = $p_time = $p_up_terminal = $p_end_terminal = $price = '';   
if (isset($_POST['f-submit'])) {
	require '../inc/dbh.inc.php';
	 $email = mysqli_real_escape_string($conn,$_POST['email']);
	 $phone = mysqli_real_escape_string($conn,$_POST['phone']);
	 $first = mysqli_real_escape_string($conn,$_POST['fname']);
	 $lname = mysqli_real_escape_string($conn,$_POST['lname']);
	 $campus = mysqli_real_escape_string($conn,$_POST['campus']);
	$p_time = $_POST['pick-up-time'];
	$p_date = $_POST['pick-up-date'];
	$p_up_terminal = mysqli_real_escape_string($conn,$_POST['pick-up-terminal']);
	$p_end_terminal = mysqli_real_escape_string($conn,$_POST['end-terminal']);
	$no_passengers = $_POST['passengers'];
	$trip_type = $_POST['trip'];
	$payment_mode = $_POST['payment'];
// echo $trip_type;
// echo $payment_mode;
// echo $p_date;
// echo $p_time;
// echo $no_passengers;

if (empty($email)) {
	$_SESSION['error'] = 'Email is required';
}if (empty($phone)) {
	$_SESSION['error'] = 'Phone number is required'; 
}if (empty($first)) {
	$_SESSION['error'] = 'First name is required';
}if (empty($lname)) {
	$_SESSION['error'] = 'Last name is required';
}
if (empty($p_time)) {
$_SESSION['error'] = 'Please select a pickup time';
}if (empty($p_date)) {
$_SESSION['error'] = 'Please select a date for pickup';
}
if (empty($p_up_terminal)) {
	$_SESSION['error'] = 'Pickup station is required';
}if (empty($p_end_terminal)) {
	$_SESSION['error'] = 'Final Destination is required';
}if ($no_passengers == 0) {
	$_SESSION['error'] = 'Invalid Passenger Amount';
}elseif ($no_passengers == 1) {
	$price = 2000;
}elseif ($no_passengers == 2) {
	$price = 2000;
}else{
	$price = 3000;
}
if ($payment_mode == 'Online') {
	header("checkout-pay-secure");
	exit();
}else{
	$num = 1234567890;
 $booking_refrence1 = str_shuffle($num);
 $booking_refrence2 = 'CP'.'-'.$booking_refrence1;
$_SESSION['bookid'] =  $booking_refrence2;
$bid = $_SESSION['bookid'];
 //$_SESSION['success'] = $booking_refrence2;
 	 $sql = "INSERT INTO campus_pilot_bookings (booking_id,l_firstname,u_lastname,
 	 u_phone,u_campus,u_email,booking_status,payment_mode,ride_from,ride_to,
 	 pickup_time,pickup_date,passengers,trip_type,price) VALUES ('$booking_refrence2',
 	 '$first','$lname','$phone','$campus','$email',0,'$payment_mode','$p_up_terminal','$p_end_terminal','$p_time','$p_date','$no_passengers','$trip_type','$price')";
	 if (mysqli_query($conn,$sql)) {


$message = "
 <div class='container' style='color:black;font-size:20px;color:black;font-family:arial;'>
    <div class='row' style='color:black;font-size:20px;color:black;font-family:arial;'>
    <img src='http://www.yourhomefuto.com.ng/Campus-pilot/img/IMG-20180620-WA0007.jpg' height='400' width='100%'>
    <p>Hello $first,</p>
      <div class='col'>  
      <p>Congratulations,you recieved this mail because you reserved a trip on campus pilot.We would contact you within the next 10mins to confirm your reservations</p>
<br>
<p style='color:black;font-size:20px;color:black;font-family:arial;'>
Your Booking Details with booking id $booking_refrence2 are as follows
</p>
 <table style='width:100%;'class='table table-bordered table-responsive'>
  <tr>
    <td>Booking ID</td>
    <td>$booking_refrence2</td>
  </tr>
  <tr>
    <td>First Name</td>
    <td>$first</td>
  </tr>
  <tr>
  <td>Last Name</td>
  <td>$lname</td>
  </tr>
  <tr>
  <td>Pick Up station</td>
  <td>$p_up_terminal</td>
  </tr>
  <tr>
  <td>End Terminal</td>
  <td>$p_end_terminal</td>
  </tr>
  <tr>
  <td>Pick-up Time</td>
  <td>$p_time</td>
  </tr>
  
  <tr>
  <td>Pickup Date</td>
  <td>$p_date</td>
  </tr>
  
  <tr>
  <td>Phone Number</td>
  <td>$phone</td>
  </tr>


  <tr>
  <td>Number of passengers</td>
  <td>$no_passengers</td>
  </tr>

  <tr>
  <td>Total amount</td>
  <td>NGN$price.00</td>
  </tr>
</table> 

<h5>To cancel this Reservation click <a style='color:black;' href='yourhomefuto.com/Campus-pilot/my-order?i=mail'>Here</a></h5>
<br>
<h5>Need an emergency pickup? Call <a href='tel:07036576503'>Pilot1</a></h5>


<h6>Kingsley,<br>CEO,Campus-pilot</h6>
<br><br>
<p style='color:black;font-size:20px;color:black;font-family:arial;'>For additional help, visit our <a href='https://yourhomefuto.com.ng/contact-us.php'>Support Center</a></p>
<br>
<footer class='fixed bottom' style='font-family: 'nunito','sans-serif';color: white;background-color:#1f3057;margin-top:10px;'>
    <div class='container-fluid'>
        
    <div style='text-align: center;'>
    © 2018 - Campus-pilot All rights reserved
	
    </div>
    </div>
    </footer>
      </div>
    </div>


  </div>
";
require_once('../PHPMailer/PHPMailerAutoload.php');
//makes use of php mailer library
 
define ('gmailUserame','campuspilot@yourhomefuto.com.ng');
define ('gmailPassword','messilo18_');
 
//uses gmail as mail server hence you need to provide your credentials
 
global $error;
 
function smtpmailer($to, $from, $from_name, $subject, $body) {
   
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->isHTML(true);
    
    $mail->SMTPAutoTLS = true;
    $mail->Host = 'sweetpea.hostnownow.com';
    $mail->Port = 465;
/*
  this lines of code is unnecessary if you are running on a secure server
*/
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
 
    /*
 
     unnecessary code on secure server ends here
 
    */
);
 
    $mail->Username = gmailUserame;  
    $mail->Password = gmailPassword;          
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if($mail->Send()) {
        
	 $_SESSION['success'] = 'Your booking was successful.'.'<br>'.'Booking Refrence is '.
	$_SESSION['bookid'].'. A copy of your reservation was sent to your email.';
	header("Location:checkout-pay-off");
	exit();
    }else{
    	$_SESSION['error'] = 'Opps,An error occured please try again';
    	header("Location:checkout-pay-off");
	exit();
    } 
}
 
//Call method
 smtpmailer($email,'campuspilot@yourhomefuto.com.ng','Booking Details - Campus Pilot','Campus Pilot Booking ',$message);
 //use whatever mail you like
	
	}// header("checkout-pay-off");
	// exit();
	// }else{
	// 	$_SESSION['error'] ='There was a problem somewhere ,try again';
	// 	header("checkout-pay-off");
	// exit();
	// }
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Book a ride | Campus-pilot</title>

<meta property="og:description" content="Reservations for a ride made easy,use our user friendly system to book your ride with friends now.Campus pilot is the best way to transport yourself to school at low cost,start now.">
	<?php 
	include 'inc/header.php'; ?>
</head>
<body style="background-image: url(img/IMG-20180620-WA0007.jpg);background-size: cover;">
<?php 
include 'inc/nav.php'; ?>																			

<?php if(isset($_SESSION['error'])){ ?>
				<div class="error" style="background-color: rgb(244,0,0);text-align: center;font-size: 1.2em;padding: 10px;color: #fff;">
					<?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
				</div>
			<?php
				} 
			?>

			<?php if(isset($_SESSION['success'])){ ?>
							<div class="success" style="background-color: rgba(24,200,6,2);text-align: center;font-size: 1.2em;padding: 10px;color:white;">
								<?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
							</div>
						<?php
							} 
						?>			

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12 col-sm-12" align="center" style="margin-top: 20px;">
			<div style="background-color: rgba(244,244,244,0.5);">
				<h4><i class="fa fa-book"></i>Reserve a ride now,quick and easy.</h4>
				<strong><b style="color: red;font-size:20px;">*</b>Require Fields</strong>
				<form method="post">
					<div style="border-bottom: 2px solid #1f3057">
	<p><h6>PERSONAL INFORMATION</h6></p>
					<b style="color: red;font-size:20px;">*</b><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" value="<?php echo $first; ?>" type="text"  name="fname" placeholder="FIRSTNAME">

					<b style="color: red;font-size:20px;">*</b><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" type="text" value="<?php echo $lname ?>"  name="lname" placeholder="LASTNAME">
					<b style="color: red;font-size:20px;">*</b>
					<input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" type="email" value="<?php echo($email); ?>" name="email" placeholder="EMAIL HERE">
					<p></p>
<span>
					<b style="color: red;font-size:20px;">*</b><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" value="<?php echo($phone); ?>"	 type="text"  name="phone" placeholder="TELEPHONE">
</span>

					<input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" value="<?php echo($campus); ?>" type="text"  name="campus" placeholder="CAMPUS">
						
					</div>
					<br>
<div style="border-bottom: 2px solid #1f3057;">
	<h5>Booking Details</h5>
<div>
	<span>Pick-up Time</span>	
<b style="color: red;font-size:20px;">*</b>
				<input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" value=" <?php echo($p_time); ?>" type="time"  name="pick-up-time" >

</div>					

<div>
	
<span>Pick-up Date		<b style="color: red;font-size:20px;">*</b>
</span><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" type="date" value="<?php echo($p_date); ?>"  name="pick-up-date" >
	
</div>
<div>
	
<span>Pick-up Station		<b style="color: red;font-size:20px;">*</b>
</span><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" type="text" value="<?php echo($p_up_terminal); ?>"
  name="pick-up-terminal" placeholder="Be specific as Possible">
	
</div>

<div>
	
<span>End-Terminal		<b style="color: red;font-size:20px;">*</b>
</span><input style="height: 60px;color:#1f3057;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px;" type="text" value="<?php echo($p_end_terminal);?>"	
  name="end-terminal" placeholder="Be specific as Possible">
	
</div>
<div>
	No-of passengers <b style="color: red;font-size:20px;">*</b><select name="passengers" style="width:120px;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px; ">
		<option value="0">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select>
</div>
<div>
	Trip-type<b style="color: red;font-size:20px;">*</b>
	<select name="trip" style="width:140px;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px; ">
		<option value="One-way-trip">One-way-trip</option>
	<option value="Return-trip"> Return-trip</option>
		
	</select>
</div>
<div>
	Select a payment mode<b style="color: red;font-size:20px;">*</b>
<select name="payment" style="width:140px;border:3px solid #1f3057;margin-bottom: 5px;border-radius: 8px; ">
	<!-- <option value="Online">
		Online
	</option>
	 --><option value="On-service">
		On-service Delivery
	</option>
</select>
</div>

</div>

<button type="submit" name="f-submit" class="btn btn-success btn-block">Submit</button>										

					
								</form>
			</div>
		</div>
		<!-- <div class="col-md-6">
			<div style="background-color: rgba(244,244,244,0.5);margin-top: 20px;">
				<h4>Personal Booking</h4>
				<form></form>
			</div>
		</div> -->
	</div>
</div>















<?php 
include 'inc/footer.php';
include 'inc/navscript.php';
 ?>
</body>
</html>