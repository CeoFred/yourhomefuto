<?php 
session_start();
if (isset($_POST['submit'])) {

	require('inc/dbh.inc.php');

	$email = mysqli_real_escape_string($conn,$_POST['email']);
if (empty($email)) {
	$_SESSION['recover_error'] = 'Email Field Was Left Empty';
}else{
	$sql = "SELECT email FROM users WHERE email = '$email' AND is_confirmed=1;";
	$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {
	//	$_SESSION['recover_success']  = "Email exist";
		$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
 $token = str_shuffle($token);
 
		$sql = "INSERT INTO recover (email,token,recovered) VALUES ($email,$token,0);";
		mysqli_query($conn,$sql);


		$message = "
 <div class='container'>
    Hello ,
    <br>
    you requested to reset your password,click on the button below to change your password
    or if you didnt request for a password recovery please ignore this message.
 <a href='https://yourhomefuto.com.ng/user/change-password?token=$token+email=$email'></a>
    <br>
  </div>
";
require_once('PHPMailer/PHPMailerAutoload.php');
//makes use of php mailer library
 
define ('gmailUserame','yourhomefuto@gmail.com');
define ('gmailPassword','messilo18');
 
//uses gmail as mail server hence you need to provide your credentials
 
global $error;
 
function smtpmailer($to, $from, $from_name, $subject, $body) {
   
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
  $mail->isHTML(true);
    
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
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
    if(!$mail->Send()) {
        
  $_SESSION['recover_error'] = "Sorry,there was an error sending a mail please try again.";

    } else {

  $_SESSION['recover_success'] = "Email was successfully sent to your inbox,please check and activate your account";

    }
}
 
//Call method
 smtpmailer($email,'yourhomefuto@gmail.com','Yourhomefuto','Account Activation',$message);
 //use whatever mail you like

	}else{
		$_SESSION['recover_error'] = "Email does not exist";
	}
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Recover Password</title>
	<?php 
include('inc/header.php');
	 ?>
</head>
<body>
<?php 
include('inc/nav.php');

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12" >
			<form method="post">
						
<?php if(isset($_SESSION['recover_error'])){ ?>
				<div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['recover_error'];unset($_SESSION['recover_error']); ?>
				</div>
			<?php
				} 
			?>		


<?php if(isset($_SESSION['recover_success'])){ ?>
				<div class="error" style="background-color: rgba(8,244,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
					<?php echo $_SESSION['recover_success'];unset($_SESSION['recover_success']); ?>
				</div>
			<?php
				} 
			?>		
				<h6>Provide an email to recver your password</h6>
				<div class="col-md-4 col-sm-12">
				<input type="text" name="email" placeholder="Recovery Email" class="form-control">
				</div>
				<div class="col-md-4 col-sm-12" align="center">
					
				<input type="submit" value="Recover" name="submit"  class="btn btn-success">
			
				</div>
			</form>
		</div>
	</div>

</div>





<?php
include('inc/footer.php');
include('inc/navscript.php');


?>
</body>
</html>