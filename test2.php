<?php
session_start();

if (isset($_POST['submit'])) {

require'inc/dbh.inc.php';
$firstname = mysqli_real_escape_string($conn,  $_POST['first']);
$lastname = mysqli_real_escape_string($conn,  $_POST['last']);
 $email = mysqli_real_escape_string($conn,  $_POST['email']);
 $password = mysqli_real_escape_string($conn,  $_POST['pwd']);
 $cpassword = mysqli_real_escape_string($conn,  $_POST['cpwd']);
 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
 $gender = $_POST['gender']; 



if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password)) {
  $_SESSION['error'] = "Fields cannot be left empty";
  header("location: signup?empty");
  exit();
}
if ($password !== $cpassword) {
  $_SESSION['error'] = 'Passwords do not match';
header("Location: signup");
exit();
}if (empty($gender)) {
  $_SESSION['error'] = 'Gender option was left empty';
header("Location: signup");
exit();
}
if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname) ){
    $_SESSION['error'] = "Invalid Characters Used!";
header("Location: signup");
  exit();
    
   }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
      $_SESSION['error'] = "Invalid Email";
header("Location: signup");
       exit();
    }

$sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn , $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
  $_SESSION['error'] = "User Exisits with Email";
header("Location: signup");
          exit();
        }

else{


// $sqli = "SELECT role_id FROM role WHERE role = '$role';";
// $query = mysqli_query($conn, $sqli);
// $num = mysqli_num_rows($query);
// if ($row = mysqli_fetch_assoc($query)) {
//   $role_id = $row['role_id'];
// }

$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
$token = str_shuffle($token);
$token = substr($token, 0, 30);
$num = 01234567;
$num = str_shuffle($num);

$dpe = 'yhf-';
$userid = $dpe.$num;
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (firstname,lastname,email,phone,password,token,user_id,is_confirmed,state,address,Landmark,lodge,room_number,gender) 
VALUES('$firstname','$lastname','$email','$phone','$hashedPassword','$token','$userid',0,'N/A','N/A','N/A','N/A',
'N/A','$gender');";
  if (mysqli_query($conn,$sql)) {
 $message = "
 <div class='container'>
    <div class='row'>
    <p>Hello $first,</p>
      <div class='col' align='center' style='color:black;'>
        
<b>Calvary Greetings</b>
<br>
<p>Congrats on signing up on Rccg Dominion parish Enugu Province 2! In order to activate your account please click the button below to verify your email address:
</p>
<a href='dpe2.com.ng/Specials/confirm_email?token=$token&email=$email' style='background:green;color:white;font-size:25px;border-radius:6px;box-shadow:19px;padding:9px;'>Activate Account</a>
<br>
<br>
 If the button above doesnt work copy and paste this link into your browser <b>https://dpe2.com.ng/subscription?token=$token&email=$email</b>
<p>For additional help, visit our<a href='https://dpe2.com.ng/contact.php'>Support Center</a></p>
<b>Gracias!</b>
      </div>
    </div>


  </div>
";
require_once('PHPMailer/PHPMailerAutoload.php');
//makes use of php mailer library
 
define ('gmailUserame','activate@yourhomefuto.com.ng');
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
    if(!$mail->Send()) {
        
  $_SESSION['error'] = "Sorry,there was an error sending a mail,details have been submitted please contact an admin to activate your account manually";
header("Location: signup");
exit();
    } else {

  $_SESSION['success'] = "Email was successfully sent to your inbox,please check and activate your account";
header("Location: signup");
exit();
    }
}
 
//Call method
 smtpmailer($email,'activate@yourhomefuto.com.ng','yourhomefuto','Account Activation',$message);
 //use whatever mail you like

  }
  else{
  $_SESSION['error'] = 'Opps! there was an error while creating your account,please try again';
  header("Location: signup?Opps!");
  exit();
  }
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
<meta name="Keywords" content="Futo,federal univerisity of technology owerri,campus services,futo roomates,futo services,campus roomates,buy and sell,futo sell,futo market,iexchange">
<meta name="Description" content="Create a Free account to enjoy our top services on campus">
<?php
include('inc/header.php');
?>
    </head>
<body style="background-image: url(img/loginbg.jpg);">
<!--Main Navigation-->
<header>
<?php include'inc/nav.php'; 

?>        
</header>
<!--Main Navigation-->
<!--Main layout-->

<main>  <!-- 
  <div class="form justify-content-center" align="center" > -->
<h4>Sign Up</h4>
  <h6>Please fill in this form to create an account</h6>
  <form method="POST">
<div class="container">
<div class="row">
<div class="col-md-7 col-md-offset-6 col-sm-12 col-lg-4 col-lg-offset-6 col-xl-7 col-xl-offset-6 justify-content-center" align="center" >

<?php if(isset($_SESSION['error'])){ ?>
        <div class="error" style="background-color: rgb(244,0,0);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
          <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
        </div>
      <?php
        } 
      ?>    
      <?php if(isset($_SESSION['success'])){ ?>
              <div class="success" style="background-color: rgba(24,200,6,0.2);text-align: center;font-size: 1.2em;padding: 10px;color:white;">
                <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
              </div>
            <?php
              } 
            ?>  
<div class="form-group">
    <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        <i class="fa fa-user">1</i>
      </div>
    </div>
    <input type="text" id="email"  name="first" class="input form-control"  placeholder="First Name" aria-describedby="emailhelp">
  </div>
    
    <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        <i class="fa fa-user">2</i>
      </div>
    </div>

    <input type="text"  name="last" class="input form-control"  placeholder="last Name" aria-describedby="emailhelp">
  </div>
    
<div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        @
      </div>
    </div>
    <input type="text" id="email"  name="email" class="input form-control"  placeholder="Enter email" aria-describedby="emailhelp">
  </div>
  
    
<div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        <i class="fa fa-phone" style="font-size: 23px;"></i>
      </div>
    </div>
    <input type="tel" id="tel"  name="phone" class="input form-control"  placeholder="Mobile number" aria-describedby="emailhelp" value="+234">
  </div>
    
<div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        <i class="fa fa-shield" style="font-size: 24px;"></i>
      </div>
    </div>
    <input type="Password"  name="pwd" class="input form-control"  placeholder="Enter a secured Password" aria-describedby="emailhelp">
    <small class="form-text">Your password must be 8-20 characters long,contain letters and numbers, and must not contain spaces,special charcters or emoji.</small>
  </div>

<div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text" style="background-color: #66CDAA">
        <i class="fa fa-shield" style="font-size: 24px;"></i>
      </div>
    </div>
    <input type="Password"  name="cpwd" class="input form-control"  placeholder="Password one more time" aria-describedby="emailhelp">
  </div>
  <input type="radio" name="gender" value="Male" class="radio">Male
  <input type="radio" name="gender" value="female" class="radio">Female
    </div>
    <em style="font-size: 12px;">By creating an account you agree to our Terms & Privacy.</em>
    <br>
    <button name="submit" type="submit" class="btn btn-success">Sign Up</button>
    Already a user? <a  href="login.php">Login</a>

</div>
</div>
  </form>
</div>
</main>

</div>
<div>
  <?php
include'inc/navscript.php';
  ?>

</div>
<footer class="fixed bottom" style="font-family: 'nunito','sans-serif';color: white;background-color:#505050;margin-top:10px;">
    <div class="container">
        
        <div class="row"><!-- 
            <div align="center" class="col-xl-4 col-md-3 col-sm-12 col-xs-12">
    <form method="POST" action="inc/footer.php">
                <p>Subscribe to our newsetter</p>
      <input style="display: inline;" type="email" name="mail" placeholder="Email" class="form-control" name=""><button type="submit" name="sub" class="btn btn-success">SUBSCRIBE<i class="fa fa-envelope-o"></i></button>
    </form>
    </div> -->
    <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-xl-4" align="center">
        <li style="list-style: none;">
            <ul><i class="fa fa-phone"></i>090********</ul>

            <ul style="line-height: 0.2px;"><i class="fa fa-home"></i>Federal University of Technology,Owerri.</ul>
        </li>
    </div> --><!-- 
    <div class="col-xl-4 col-sm-12 col-md-3 col-xs-12" align="center">
        <i class="fa fa-facebook-square"></i>
 <i class="fa fa-git"></i>
 <i class="fa fa-google-plus-square"></i>
 <i class="fa fa-instagram"></i>
<i class="fa fa-viber"></i>
<i class="fa fa-whatsapp"></i>
<i class="fa fa-twitter-square"></i>
<i class="fa fa-youtube"></i>
    <hr>
    <h5>Powered By</h5>
    <i class="fa fa-paypal"></i>
    <i class="fa fa-stripe"></i>
    <i class="fa fa-creditcard"></i>
    </div> -->
</div>



    <div style="text-align: center;">
    © 2018 - Yourhomefuto.com.ng All rights reserved
    </div>
<div align="center" >
    <i class="fa fa-opencart" style="font-size: 30px;"></i>
    
</div>
    
    </div>
    </footer>
</body>
</html>