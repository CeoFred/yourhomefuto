
<?php 

session_start();
	require 'inc/dbh.inc.php';
	if(!isset($_SESSION['adminid']) & empty($_SESSION['adminid'])){
		header('location: login.php');
	}
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = $_GET['id'];
		$get = "SELECT * FROM services WHERE id = $id";
		$q = mysqli_query($conn,$get);
		$r = mysqli_fetch_assoc($q);
		$name = $r['name'];
		$email = $r['email'];
		$userid = $r['u_id'];
		$pass = str_shuffle($name).'CSYHF';
		$sql =  "INSERT INTO service_admin (servicename,serviceid,verified_account,email,userid) VALUES ('$name','$id',1,'$email','$userid');";
		if (mysqli_query($conn,$sql)) {
			mail('johnsonmessilo19@gmail.com','Welcome',"
 <div class='container' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <div class='row' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <p>Hello $name,</p>
      <div class='col'>  
<br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>Congratulations!!Your 
busness/service has been successfully verified on Yourhomefuto!.After all validation your service spoke for itself.
Also we have created an account for you where you would manage your business profile.
Your login details are as follows:
<br>
Email: $email;
Password: $pass;
Login here: <a href='www.yourhomefuto.com.ng/services/admins/login?email=$email&pass=$pass'>Login</a>

<br>
For more information ,send us an email at <a href=mailto:csyhf@yourhomefuto.com.ng>csyhf@yourhomefuto.com.ng</a>.
<br>
<h5>
ceofred,
Founder,yourhomefuto.
</h5>
</p>
<br> <br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>For additional help, visit our<a href='https://yourhomefuto.com.ng/contact.php'>Support Center</a></p>
      </div>
    </div>


  </div>" );
			$message = "";
require_once('../PHPMailer/PHPMailerAutoload.php');
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
  $_SESSION['error'] = "Sorry,there was an error sending a mail,details have been submitted please contact an admin to activate your account manually";
		header("Location: unapproved_s.php?failed-to-send-mail=1&updated=1");
exit();
    } else {
  $_SESSION['success'] = "Email was successfully sent to your inbox,please check and activate your account";
		header("Location: unapproved_s.php?mail-sent");
exit();
    }
}
 
//Call method
 smtpmailer($email,'yourhomefuto@gmail.com','Yourhomefuto','Account Activation',$message);
		}else{
			echo "not inserted";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>

<?php include 'inc/header.php'; ?>     
	<title>Unapproved Services</title>
</head>
<body>
	<?php
include'inc/nav.php';
?>
<div class="alert alert-success justify-content-center" align="center">Hi,<?php echo $_SESSION['fullname']; ?> Remember,You are the boss.I have a list of unapproved services,arranged by date added,feel free to deactivate any service anytime.</div>

<?php 

if (isset($_SESSION['successfull'])) {
echo($_SESSION['successfull']);
unset($_SESSION['successfull']);
 } ?>

<?php 

$sql = "SELECT * FROM services WHERE verified = 0 ORDER BY reg_time DESC;";
$okay_query = mysqli_query($conn,$sql);
while ($rowlisting = mysqli_fetch_assoc($okay_query)) {?>


<div class="row">
	<div class="col" align="center">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>service_ID</th>
					<th>Service Name</th>
					<th>Email</th>
					<th>Verified</th>
				<th>Contact</th>
				<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">
		<?php
echo $rowlisting['id'];
		?>				
					</th>
					<th>
						<?php
echo $rowlisting['name'];
		?>
					</th>
				
					<th>
		<?php
echo $rowlisting['email'];
		?>				
					</th>
					<th>
		<?php
		if ($rowlisting['verified'] == 1) {
echo 'Activated'		;	
		}else{
			echo "Not Activated";
		}

		?>				
					</th>
					<th>
		<?php
echo $rowlisting['contact'];
		?>				
					</th>
					<th>
						<a class="btn btn-success" href="activate_service.php?id=<?php echo$rowlisting['id']; ?>">Activate Service</a>
					</th>

</tr>
			</tbody>
		</table>

	</div>

</div>	
<?php
}

 ?>

</body>
</html>