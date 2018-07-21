<?php
session_start();
$email = '';
$name = '';
if (isset($_POST['submit'])) {
	require('inc/dbh.inc.php');
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$request = mysqli_real_escape_string($conn, $_POST['request']);
	if (empty($name)) {
	$_SESSION['contact_error_name'] = 'This Field cannot be left Empty';
	}if (empty($email)) {
	$_SESSION['contact_error_email'] = 'This Field cannot be left Empty';
	}if (empty($request)) {
		$_SESSION['contact_error_message'] = 'This Field cannot be left Empty';
	}else{

		//send  prayer to pastor
		 $message = "
 <div class='container'>
    <div class='row'>
      <div class='col' align='center' style='color:black;'>
<b>Hello,admin</b>
<br>
<p>You have a new contact request query,details are as follows.</p>
<br>
Name: $name
<p>Email: $email</p>
<p>Query: $Request</p>
<br>
      </div>
    </div>
  </div>
";

require_once('PHPMailer/PHPMailerAutoload.php');
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
    if(!$mail->Send()) {
        
 $_SESSION['error'] = 'Sorry,There was an error while sending your request to the admins';
    } else {
 $_SESSION['success'] = 'We have recieved your request and would get back to you through your phone number or email ';
    require('inc/dbh.inc.php');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$request = mysqli_real_escape_string($conn, $_POST['request']);

    	$sql = "INSERT INTO contact (sender_name,sender_email,sender_message) VALUES ('$name','$email','$request');";
    	mysqli_query($conn, $sql);
    }
}
 
//Call method
 smtpmailer('campuspilot@yourhomefuto.com.ng','campuspilot@yourhomefuto.com.ng','Customer Care Attention','NEW CONTACT REQUEST',$message);
 //use whatever mail you like


	}

}

// require('inc/signup.inc.php');

?>
<!DOCTYPE HTML>
<html>
	<title>Contact Us - Yourhomefuto</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
		  <link rel="icon" href="img/logo.png" type="image/x-icon">
		  <meta name="description" content="Get closer to us, use our easy contact center and send us a message we could be glad to help."/>
<meta name="robots" content="no">


<?php

include 'inc/header.php';

?>

	</head>
    <body>

<?php
include'inc/nav.php';
?>
				

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

<div class="container" style="margin-top: 90px">
		<div >
			<div class="row ">
				<div class="col-md-12 text-center">
					<h2>Contact us</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<h3>Our Address</h3>
					<ul style="list-style-type: none;">
						<li style="font-size: 20px;"><i class="fa fa-location-arrow"></i>Federal University Of technology Owerri</li>
						<li style="font-size: 20px;"><i class="fa fa-phone"></i>+ 234 *** *** ***</li>
						<li><i class="fa fa-envelope-open"></i><a href="mail-to:">inquiry@yourhomefuto.com.ng</a></li>
						<li><i class="fa fa-globe"></i><a href="">www.yourhomefuto.com.ng</a></li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3" align="center" style="margin-left:20px;padding: 10px;border-radius: 46px;box-shadow: 9px;">
					<div class="row">
<form method="post" class="md-form" style="border: 4px solid lightblue;border-radius: 46px;box-shadow: 9px;padding: 20px;">
						<div>
							<div class="form-group">
								<input type="text" value="<?php echo $name; ?>" name="name" class="form-control" placeholder="Name">
							</div>

<?php if(isset($_SESSION['contact_error_name'])){ ?>
  <small style="text-align: center;color: red;">

  <?php echo $_SESSION['contact_error_name'];unset($_SESSION['contact_error_name']); ?>
  </small>
  <?php
  }
  ?>
						</div>

						<div >
							<div class="form-group">
								<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">
							</div>
						</div>

<?php if(isset($_SESSION['contact_error_email'])){ ?>
  <small style="text-align: center;color: red;">

  <?php echo $_SESSION['contact_error_email'];unset($_SESSION['contact_error_email']); ?>
  </small>
  <?php
  }
  ?>
						<div >
							<div class="form-group">
								<textarea name="request"
							 class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
							</div>
						</div>

<?php if(isset($_SESSION['contact_error_message'])){ ?>
  <small style="text-align: center;color: red;">

  <?php echo $_SESSION['contact_error_message'];unset($_SESSION['contact_error_message']); ?>
  </small>
  <?php
  }
  ?>
						<div >
							<div class="form-group">
								<input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-modify">
							</div>
						</div>
</form>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php
 include 'inc/footer.php';
 include 'inc/navscript.php';
  ?>
	</body>
</html>
