<?php
if (isset($_POST['sub'])) {
require'dbh.inc.php';
  $email = mysqli_real_escape_string($conn, $_POST['mail']);
  if (empty($email)) {
    $_SESSION['failed'] = 'No Email Address Found,Please use a valid Email';
  header("Location:../?Error");
  exit();
  }else{
    $sql = "INSERT INTO subscribers (email) VALUES ('$email');";
    mysqli_query($conn ,$sql);
    $_SESSION['success'] = 'Subscribed!';
    header("Location: ../?Successfully Subscribed");
    exit();
  }
}
?>
<footer class="fixed bottom" style="color: white;background-color:#505050;margin-top:10px;">
    <div class="container">
        
        <div class="row">
            <div align="center" class="col-xl-4 col-md-3 col-sm-12 col-xs-12 d-none d-md-block">
    <form method="POST" action="inc/footer.php">
                <p>Subscribe to our newsetter</p>
    	<input style="display: inline;" type="email" name="mail" placeholder="Email" class="form-control" name=""><button type="submit" name="sub" class="btn btn-success">SUBSCRIBE<i class="fa fa-envelope-o"></i></button>
    </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-xl-4 d-none d-md-block" align="center">
        <li style="list-style: none;">
            <ul><i class="fa fa-phone"></i>090********</ul>

            <ul style="line-height: 0.2px;"><i class="fa fa-home"></i>Federal University of Technology,Owerri.</ul>
        </li>
    </div>
    <div class="col-xl-4 col-sm-12 col-md-3 col-xs-12 d-none d-md-block" align="center">
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
    </div>
</div>



    <div style="text-align: center;">
    © 2018 - Yourhomefuto.com.ng All rights reserved
    </div>
<div align="center" >
    <i class="fa fa-opencart" style="font-size: 30px;"></i>
    
</div>
    
    </div>
    </footer>