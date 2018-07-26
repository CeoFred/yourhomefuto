<?php
session_start();
$email = $id = '';
if (isset($_POST['submit'])) {
require '../inc/dbh.inc.php';


$email = $_SESSION['email'];
$lname = mysqli_real_escape_string($conn , $_POST['lname']);
$bname = mysqli_real_escape_string($conn , $_POST['bname']); 
$fname = mysqli_real_escape_string($conn , $_POST['fname']);
$location = mysqli_real_escape_string($conn , $_POST['location']);
$description = mysqli_real_escape_string($conn , $_POST['description']);
$email = mysqli_real_escape_string($conn , $_POST['email']);
$phone = mysqli_real_escape_string($conn , $_POST['contact']);
$w_hour = mysqli_real_escape_string($conn , $_POST['w_hour']);
$w_day = mysqli_real_escape_string($conn , $_POST['w_day']);

$id = $_SESSION['id'];

$_SESSION['bnameu'] = $bname;
$_SESSION['lnameu'] = $lname;
$_SESSION['fnameu'] = $fname;
$_SESSION['descriptionu'] = $description;
$_SESSION['emailu'] = $email;
$_SESSION['contactu'] = $phone;
$_SESSION['locationu'] = $location;




if (isset($_SESSION['error']))
 {unset($_SESSION['error']);
}
if (isset($_SESSION['good']))
 {unset($_SESSION['good']);
}

if($lname === $fname){
	$_SESSION['error'] = 'First Name and Last Name Cannot Be Same';
	header("Location: add-a-service.php?Name-Match-Error");
	exit();
}
if(empty($bname) || empty($lname) || empty($fname) || empty($location)
|| empty($description) || empty($phone)  || empty($email))
{
	$_SESSION['error'] = 'Empty Fields,Try Again';
	header("Location: add-a-service.php?Empty-Fields");
	exit();
}	
else{
	
//check if email is valid
	 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 
			$_SESSION['error'] = "Invalid Email";
	 		header('Location: add-a-service.php?signup=Email');
			 exit();
	 	}else{
			 $sql = "SELECT * FROM services WHERE email = '$email'";
			 $check = mysqli_query($conn , $sql);
			 $resultcheck = mysqli_num_rows($check);
			 if($resultcheck > 0){
				 $_SESSION['error'] = 'Service Exists with Email Already';
				 header("Location: add-a-service.php?EmailExists");
			 exit();
			 }
			 else{
			
			//image upload
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
            $fileNTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];
			//which types of files are allowed
			$fileExt = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg' , 'jpeg' , 'png','');
if (in_array($fileActualExt, $allowed)) {
	if ($fileError === 0 || $fileError === 1) {
		if ($fileSize < 900000) {
			$fileNameNew = uniqid('',true).".".$fileActualExt;
			$fileDestination = 'uploads/'.$fileNameNew;
			move_uploaded_file($fileNTmpName, $fileDestination);

$sql = "INSERT INTO services(u_id,name,firstname,lastname,location,Description,image_path,verified,contact,category,email,w_hours,w_days) VALUES
('$id', '$bname','$fname','$lname','$location','$description','$fileDestination','0','$phone','Not Verified','$email','$w_day','$w_hour')";
mysqli_query($conn, $sql);
$_SESSION['send_good'] = 'Service succesfully uploaded';
header('Location: index?succe_email_send');
exit();
		}else{
			$_SESSION['error'] = 'File should not be more than 9MB';
		}
	}else{
	$_SESSION['error'] = 'There was an error uploading your file,Try Again';	
	}
}else{
	$_SESSION['error'] = 'You either did not upload an image or you used an invalid file format.';
}
} 
}
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<?php
include 'inc/header.php';
	?>

<meta property="og:image" content="https://yourhomefuto.com.ng/img/logo.png">
<meta property="og:description" content="Get yout service known on campus now,start by creating a profile for your service and let it speak for you.">

	<title>Add a service</title>
</head>
<body>
<?php
include 'inc/nav.php';
?>



<form method="POST" action="add-a-service.php" enctype="multipart/form-data">

	<h4 align="center" style="margin:10px;"><i class="fa fa-plus"></i>Add A Campus Service</h4>
<div class="container-fluid">
<div><h5>
<?php
if (isset($_SESSION['error'])) {
	echo  '<div style="background:#D00000;color:white;border-top-right-radius: 6px;
border-top-left-radius: 6px;margin-bottom: 8px;padding:8px;" align="center">'.$_SESSION['error'].'</div>';
unset($_SESSION['error']);
}
?>

<div style="background:#006600;color:white;border-radius:6px" align="center"><h3>
<?php
if (isset($_SESSION['good'])) {
	echo $_SESSION['good'];
unset($_SESSION['good']);
}
?>

</div>
</h5>
</div>

<h6 style="float: left;color: #D2691E">Business Name</h6>
<input type="text" name="bname" placeholder="mybusinessname" class="form-control"  value="<?php if(isset($_SESSION['bnameu']))
{echo $_SESSION['bnameu'];
	unset($_SESSION['bnameu']);}  ?>">
	
	<small class="form-text">This is what you want people to know you as.Get more customers to your brand now!Be sure it belongs to you,check name properly.</small>
<br>

<h6 style="float: left;color: #D2691E">First Name</h6>
	<input type="text" name="fname" placeholder="John" class="form-control"  value="<?php if(isset($_SESSION['fnameu']))
{echo $_SESSION['fnameu'];
	unset($_SESSION['fnameu']);}  ?>">
	
	<small class="form-text">Should contain letters alone, no special characters,'-' should be used to seperate names if needed.</small>
<br>

<h6 style="float: left;color: #D2691E">Last Name</h6>
	<input type="text" name="lname" placeholder="Doe" class="form-control"  value="<?php if(isset($_SESSION['lnameu']))
{echo $_SESSION['lnameu'];
	unset($_SESSION['lnameu']);}  ?>">

	<small class="form-text">Should contain letters alone, no special characters,'-' should be used to seperate names if needed.</small>
	
	<br>
<h6 style="float: left;color: #D2691E">Phone Number</h6>
	<input type="tell" name="contact" placeholder="+234*** *** **" class="form-control"  value="<?php if(isset($_SESSION['contactu']))
{echo $_SESSION['contactu'];
	unset($_SESSION['contactu']);} else{
		echo('+234');
	} ?>">
	<small class="form-text">Active mobile numbers are required to reach out to you and your busieness easily.</small>

<br>
<h6 style="float: left;color: #D2691E">Email Address</h6>
	<input type="email" name="email"  placeholder="johndoe@somemail.com" class="form-control"  value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} else{
		echo('');
	}  ?>">
<small class="form-text">Your email is safe and should be valid to recieve latest updates and information.</small>

<br>

<h6 style="float: left;color: #D2691E">Business Location</h6>
	<input type="text" name="location" placeholder="Eziobodo,Umuchima,Ihiagwa,Obinze,Around Campus" class="form-control"  value="<?php if(isset($_SESSION['locationu']))
{echo $_SESSION['locationu'];
	unset($_SESSION['locationu']);}  ?>">
	<small class="form-text">Location should be exact,not wide.Eg Eziobodo</small>
	<br>

<h6 style="float: left;color: #D2691E">Work Hours</h6>
	<input type="text" name="w_hour" placeholder="9Am - 6Pm" class="form-control">
	<small class="form-text">Work Time is important for customers to know when to request for your services.</small>
<br>


<h6 style="float: left;color: #D2691E">Working Days</h6>
	<input type="text" name="w_day" placeholder="Mondays to Fridays" class="form-control">
	<small class="form-text">Work day is important for customers to know when to request for your services.</small>
	<br>

<h6 style="float: left;color: #D2691E">Description</h6>
<textarea cols="10" rows="5" class="form-control" placeholder="Service Description Here(Max:300 Words).
 Ensure to give presice information about your service,this is more like your best marketing tool"
  maxlength="300" minlength="20" name="description"  value=""><?php if(isset($_SESSION['descriptionu']))
{echo $_SESSION['descriptionu'];
	unset($_SESSION['descriptionu']);}  ?></textarea>
Add Your Featured Image
<div class="form-group">
<input type="file" name="file" class="form-control-file">

<button type="submit" name="submit" class="btn btn-warning form-control">ADD</button>
</div>
</form>

<?php

include'inc/navscript.php';

include('inc/footer.php');
?>
</body>
</html>