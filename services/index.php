<?php
session_start();
require '../inc/dbh.inc.php';
if (isset($_SESSION['send_good'])) {
$email = $_SESSION['emailu'];
$bname = $_SESSION['bnameu'];
$_SESSION['good'] = 'Service Succesfully Uploaded'.'<i class="fa fa-thumbs-up"></i>';


$message = "
 <div class='container' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <div class='row' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <p>Hello $bname,</p>
      <div class='col'>  
<br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>Congrats on creating your busness profile on Yourhomefuto!. It doesn't just end there, we would try and do some validation,to be sure if this service trully exisits, this process would take about 3 days to  verify ,meanwhile this servcie would be runnig but with a bad signal note. For Imediate verfication please send proof of ownership of service to <a href=mailto:csyhf@yourhomefuto.com.ng>csyhf@yourhomefuto.com.ng</a>, this may include imagess or docuuments related to your business. Goodluck.  

<br>
<h5>
Johnson Awah Alfred,
Founder.
</h5>
</p>
<br> <br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>For additional help, visit our<a href='https://yourhomefuto.com.ng/contact.php'>Support Center</a></p>
      </div>
    </div>


  </div>
";
require_once('../PHPMailer/PHPMailerAutoload.php');
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
    if($mail->Send()) {
        
  $_SESSION['good'] = "Check your inbox for a welcome message,thank you.";
header("Location: index");
exit();
    } 
}
 
//Call method
 smtpmailer($email,'campus.service@yourhomefuto.com.ng','yourhomefuto','Welcome to Campus Services',$message);
 //use whatever mail you like

 

}
// $sql = "SELECT * FROM services ;";
// $result = mysqli_query($conn, $sql);
// $resultc = mysqli_num_rows($result);
// if ($resultc > 0) {
//   while ($row = mysqli_fetch_assoc($result)) {
//     $_SESSION['name'] = $row['name'];
//    }
// }  
    


?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Campus Services</title>
    <?php require'inc/header.php'; ?>

<meta property="og:image" content="https://yourhomefuto.com.ng/img/logo.png">
<meta property="og:description" content="Looking for any service quick and easy? We've got you covered view all available services and business around and begin to patronized.">
</head>
<body style="background-color: #f0f0f0;">
<header>
<?php include'inc/nav.php'; ?>        
 </header>

 <div id="carouselExampleIndicators" class="carousel slide carousel-fade d-md-none" data-ride="carousel">
  <ol class="carousel-indicators">
     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
     <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> 
     
      </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="../Campus-pilot/">
      <img class="d-block w-100 d-none d-sm-block" height="430" width="100%" src="../img/campus.jpg" alt="Futo-ville" style="">
     </a>
    </div>

    <div class="carousel-item">
    <a href="https://www.futoville.com" target="_blank">
      <img class="d-block w-100 d-none d-sm-block" height="430" width="100%" src="../img/futo-ville.jpg" alt="Futo-ville" style="">
     </a>
    </div>

    <div class="carousel-item">
      <img class="d-block w-100" height="430" src="../img/bakified.jpg" height="auto" alt="Bakified-Confectionaries">
       <!-- <div class="carousel-caption">
        <a href="tel:+2348034517214" class="btn btn-warning">Call Now <i class="fa fa-mobile"></i></a>
  </div> -->
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="430" src="../img/rebit.jpg" height="auto" alt="Rebirth-concept-Bakery">
       <!-- <div class="carousel-caption">
        <a href="tel:+2348034517214" class="btn btn-warning">Call Now <i class="fa fa-mobile"></i></a>
  </div> -->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container-fluid"> 
  <div class="row justify-content-center" align="center">
    <form>
    <input type="search" name="googlesearch" placeholder="&imof; Search here" class="form-control" style="width: 300px;margin-top: 5px;background-color: lightgrey">
  </form>

<?php if(isset($_SESSION['error'])){ ?>
        <div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
          <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
        </div>
      <?php
        } 
      ?>    
      <?php if(isset($_SESSION['good'])){ ?>
              <div class="success" style="background-color: rgba(24,200,6,0.08);text-align: center;font-size: 1.2em;padding: 10px;font-family:;">
                <?php echo $_SESSION['good'];unset($_SESSION['good']); ?>
              </div>
            <?php
              } 
            ?>  

  <a href="add-a-service" class="btn btn-warning">Add A service <i class="
    fa fa-plus"></i></a>
  </div>
  <p></p>
<hr>
<div class="row">

        <?php    
          $sql = "SELECT * FROM services";
          $res = mysqli_query($conn, $sql); 
          while ($r = mysqli_fetch_assoc($res)) {
            if($r['verified'] == true){
              $_SESSION['s_name'] = $r['email'];
              $_SESSION['verified'] = '
  <span><H6>VERIFIED SERVICE <i class="fa fa-thumbs-up" style="color:green;font-size:30px; "></i></H6></span>';

            }
            elseif ($r['verified'] == false) {
              $_SESSION['verified'] = '
  <span><H6>SERVICE NOT VERIFIED<i class="fa fa-thumbs-down" style="color:red;font-size:30px; "></i></H6></span>';
            }

        ?>
         
<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6" style="background-color: #fff;margin-bottom:10px;border-radius: 7px;
border:2px solid grey;">
  <img src="<?php if (!empty($r['image_path']))

  {echo $r['image_path'];

} else echo 'img/service.png';  ?>" height="200" width="100%">
<br> 
  <div><i class="fa fa-at" style="color:#66CDAA;"></i> <?php echo $r['name']; ?></div>
  <div><i class="fa fa-location-arrow" style="color:#66CDAA;"></i> <?php echo $r['location']; ?></div>
  <div><i class="fa fa-sticky-note" style="color:#66CDAA;"></i> <?php echo substr($r['Description'], 0, 60)."..."; ?></div>
  <div><i class="fa fa-certificate" style="color:#66CDAA;"></i> <?php echo $r['category']; ?></div>
  <a href="tel: <?php echo $r['contact']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-phone"></i>Phone</a>

  <a href=":https://wa.me/?text=Check%20Out%20my%20Service%20on%20yourhomefuto.com.ng%20Service-name%20<?php echo $r['name']; ?>%20link=yourhomefuto.com.ng/services/service?name=<?php echo $r['name']; ?>%20Create%20yours200%here20%yourhomefuto.com.ng/services/add-a-service?iv" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i>Share</a>
  <a href="service?name=<?php echo $r['name']; ?>" class="btn btn-primary btn-sm">View</a>
<?php
echo $_SESSION['verified'];
?>
<hr>
</div>
        <?php } ?>
</div>

</div>





  <?php

include'inc/footer.php';
  include'inc/navscript.php';
  ?>

</div>
</body>
</html>