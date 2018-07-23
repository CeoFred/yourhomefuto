<?php
session_start();
require'inc/dbh.inc.php';
if(isset($_GET['name']) & !empty($_GET['name'])){
	$id = $_GET['name'];
	$sql = "SELECT * FROM services WHERE name = '$id' ;";
		$res = mysqli_query($conn, $sql);
	if ($res) {


mysqli_query($conn,$addcount = "UPDATE services SET visit_count1 = visit_count1 + 1 WHERE name = '$id';");


	$prodr = mysqli_fetch_assoc($res);
	$s_id = $prodr['id'];
	$s_name = $prodr['name'];
	$s_fname = $prodr['firstname'];
	$s_lname = $prodr['lastname'];
	$s_contact	= $prodr['contact'];
	$s_email = $prodr['email'];
	$s_img = $prodr['image_path'];

	}
}else{
	header('location: index.php');
}

?>

<?php 

if (isset($_POST['rev'])) {
$email  = $_SESSION['email'];
$fname = $_SESSION['first'];
if (empty($email) || empty($fname)) {
 	$_SESSION['rev_error'] = "You must be logged in to add a review to this service";
 	
 }else{ 
$review	 = mysqli_real_escape_string($conn, $_POST['review']);
if (empty($review)) {
	$_SESSION['rev_error'] = 'Empty Review,Cannot Submit!';
}else{
	$sql = "INSERT INTO service_reviews (review, u_email, u_first_name, service_id) VALUES ('$review','$email','$fname','$s_id');";
	mysqli_query($conn,$sql);
	$_SESSION['rev_success'] = 'Review succesfully Added';}
}}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $s_name ?> | yourhomefuto
	</title>

<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
<link rel="manifest" href="../manifest.json">
<meta name="application-name" content="Yourhomefuto">
<meta name="author" content="ceofred">
<meta name="robots" content="all">
<!-- Facebook Metadata -->
<meta property="fb:app_id" content="">
<meta property="og:url" content="https://Yourhomefuto.com.ng">
<meta property="og:type" content="web-app">
<meta property="og:title" content="Yourhomefuto|Campus-Service">
<meta property="og:image" content="https://yourhomefuto.com.ng/services/<?php echo $s_img; ?>">
<meta property="og:description" content="<?php echo $prodr['name']; ?> is an active service in campus,check out our services now.">
<meta property="og:site_name" content="Yourhomefuto">
<meta property="og:locale" content="">
<!-- Twitter Metadata -->
<meta name="twitter:card" content="Yourhomefuto">
<meta name="twitter:site" content="Yourhomefuto.com.ng">
<meta 	name="twitter:creator" content="ceofred">
<meta name="twitter:url" content="https://www.Yourhomefuto.com.ng">
<meta 	name="twitter:description" content="<?php echo $prodr['name']; ?> is an active service in campus,check out our services now.">
<meta name="twitter:image" content="../img/logo.png">
<!-- Application shortcut icon -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Status bar color -->
<!-- For andriod chrome -->
<meta name="theme-color" content="#66CDAA">
<!-- for IOS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="Keywords" content="service,campus,Futo,campus-services,futo-roomates,futo services,campus-roomates,buy-and-sell,futo-sell,futo-market,iexchange">
<meta name="Description" content="<?php echo $prodr['name']; ?> is an active service in campus,check out our services now.">
<link rel="icon" href="../favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+dOP83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>
<?php
include'inc/nav.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-offset-md-3 col-lg-12">
			<div class="border">
				<?php
if ($prodr['verified'] == 1) {
	$_SESSION['verified'] = '
			<div class="alert alert-success">
				Certified Service delivery'.' ' .'<i class="fa fa-thumbs-up" style="color:green"></i><hr><h6>The Above stated campus service has been certified to deliver services to students,thereby beign safe to patronize.</h6>
			</div>
			';
}
else{
	$_SESSION['verified'] = '
<div class="alert alert-warning">
	Service Not Verified'.' '.'<i class="fa fa-thumbs-down" style="color:red;font-size:30px;"></i><p>Students are advised to stay clear off this service,this does not mean this service is fraud or related. If you are the owner,please contact our customer care service for imediate verification.</p>
	</div>';

}
				?>
				<div class="row">
					<div class="col-md-5">
						
				<img src="<?php echo $s_img; ?>" class="" style="border-radius: 100%;" width="100" height="100" >
					</div>
					<div class="col-md-7">
				<span ><h4 style="color: #D2691E;padding-top: 20px;" align="center">-<?php echo $s_name; ?></h4></span>	
					</div>
				</div>
</div>
<div>
				<span ><h5><?php echo $_SESSION['verified']; ?>
							</h5></span>
				
			</div>

<div class="" style="padding: 10px;border-left: 3px solid #D2691E">
<h6> 	<h6  style="color: #D2691E"><i  class="fa fa-user-circle-o"></i>Director's Fullname:</h6> <?php echo  $prodr['firstname']; echo ''.' - '.
	$prodr['lastname']; ?></h6>

<h6> 	<h6  style="color: #D2691E"><i  class="fa fa-clock"></i>Working Days:</h6><?php echo  $prodr['w_hours']; ?></h6>
<h6> <h6  style="color: #D2691E">	<i  class="fa fa-day"></i>Working Hours:</h6><?php echo  $prodr['w_days']; ?></h6>
<h6> <h6  style="color: #D2691E"><i class="fa fa-home"></i>Location:</h6><?php echo $prodr['location']; ?></h6>
<h6><h6  style="color: #D2691E"><i class="fa fa-phone"></i>Contact:</h6><?php echo $prodr['contact']; ?></h6>
<h6><h6  style="color: #D2691E"><h6  style="color: #D2691E"><i class="fa fa-envelope"></i>Email:</h6><?php echo $prodr['email']; ?></h6>
<h6><h6  style="color: #D2691E"><i class="fa fa-id"></i>Category:</h6><?php echo $prodr['category']; ?></h6>
<h6><h6  style="color: #D2691E"><i class="fa fa-certificate"></i>Description:</h6><?php echo $prodr['Description']; ?></h6>
<div class="btn-block" align="center" style="margin: 20px;">
	<a href="mailto:<?php echo $prodr['email']; ?>" class="btn btn-success btn-group"> 
<i class="fa fa-envelope-open">Mail Us</i>
</a><a href="tel:<?php echo $prodr['contact']; ?>" class="btn btn-warning btn-group">
	<i class="fa fa-phone">Call </i> 
</a><a href="sms:<?php echo $prodr['contact']; ?>" class="btn btn-primary btn-group"><i class="fa fa-envelope">SMS</i> </a></div>
</div>
<br>





<div class="form-group">

		
<?php if(isset($_SESSION['rev_error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['rev_error'];unset($_SESSION['rev_error']); ?>
				</div>
			<?php
				} 
			?>		
			
<?php if(isset($_SESSION['rev_success'])){ ?>
				<div  style="background-color: rgba(0,244,66,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['rev_success'];unset($_SESSION['rev_success']); ?>
				</div>
			<?php
				} 
			?>		
	<form method="POST">
		<textarea name="review" class="form-control" placeholder="Add a review"></textarea>
			<button name="rev" class="btn btn-danger" type="submit">submit</button>
</form>
<div>
	<h3>Reviews</h3>
</div>
<?php

$sql = "SELECT * FROM service_reviews WHERE service_id = '$s_id';";
	$res = mysqli_query($conn, $sql);
	
while ($rev_r = mysqli_fetch_assoc($res)
) {
echo '<div class="alert alert-success">'.ucfirst($rev_r['review']).'  ' .'-';
echo ucfirst($rev_r['u_first_name']).'<br>';
	echo "</div>";
}
?>
</div>
</div>	
</div>
</div>


<?php
include'inc/footer.php';
include'../inc/navscript.php';
?>
</body>
</html>