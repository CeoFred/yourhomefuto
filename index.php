<?php
session_start();

if (isset($_POST['cookie_okay'])) {
  setcookie('cookie_okay','true',time() + 3600000);
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yourhomefuto.com.ng - ShopON,IExchange,Roomates,Lodge,Rents,Campus-Services,campus-pilot.</title>
    <?php include 'inc/header.php'; ?>

<meta name="Description" content="Find a roomate,Lodge,Pay your rents,view all campus services,buy and sell used items,Find a ride to your destination when you use campus pilot.">

<meta property="og:description" content="Find a Lodge,Book a room,Buy and Sell,Find various services on campus,shop for food stuffs at regular price.">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<script>

  if ($('.cookie-banner').length) {
    $('.cookie-banner').fadeIn(800);
  }

function cookie_set() {
 document.getElementById('cookie').hide(slow);
document.cookie = "cookie_set_yhf= true;";
  console.log('cookie set');

}

</script>
<body>
<header>
<?php include 'inc/nav.php'; ?>

 </header>

<?php 

if (!isset($_COOKIE['cookie_set_yhf'])) { ?>
<!--  cookie banner -->
 <div style="background:#333;position:fixed;
left:0;right:0;margin:0 auto;width:100%;color:#fff;padding:5px;display: inline-block;" class="fixed-bottom"
align="center" class="cookie-banner" id="cookie">
   <div>
     <p>
      Welcome,We use cookies on this website, to continue using please
        accept cookies or see why we use cookies
        <a href="about-cookie">here.</a> 
        <br>
        <button type="button" class="btn btn-success" onclick="cookie_set();">Continue</button>
     </p>
   </div>
 </div>
 <!-- cookie banner/ -->
 

<?php
}else{ ?>



  <?php
}
?>
<div id="carouselExampleIndicators" class="carousel slide d-md-none" data-ride="carousel">
  <ol class="carousel-indicators">
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
  </ol>
  <div class="carousel-inner">
<div class="carousel-item active">
    <a href="Campus-pilot/">
      <img class="d-block w-100 d-none d-sm-block" height="430" width="100%" src="img/campus.jpg" alt="campus-pilot" style="">
     </a>
    </div>

    <div class="carousel-item">
    <a href="https://www.futoville.com" target="_blank">
      <img class="d-block w-100 d-none d-sm-block" height="430" src="img/futo-ville.jpg" alt="Futo-ville">
     </a>
       <div class="carousel-caption">
    <h6 style="margin-bottom:-40px;"></h6>

  </div>
    </div>
    <!-- <div class="carousel-item"> -->
      <!-- <img class="d-block w-100" height="320" src="img/futo-ville.jpg" height="auto" alt="Futo-ville"> -->
       <!-- <div class="carousel-caption"> -->
    <!-- <h6 style="color: black;margin-bottom:-60px;">Finding a roomate just got easier,signup now to get started</h6> -->
  <!-- </div> -->
    <!-- </div> -->

    <div class="carousel-item">
      <img class="d-block w-100" height="430" src="img/rebit.jpg" height="auto" alt="Rebirth-concept-Bakery">
       <div class="carousel-caption">
        <a href="tel:+2348034517214" class="btn btn-warning">Call Now <i class="fa fa-phone"></i></a>
  </div>
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
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-3">
  <div class="card" style="border:1px solid white;margin-top: 15px;">
  <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;" width="100" src="img/home-icon.png" alt="Lodge">
  <div class="card-body">
    <h5 class="card-title center">Lodgerman</h5>
    <p class="card-text">Find a Lodge in and around campus for free from various location listings,choose the best for yourself and only the best.<br></p>
  </div>
</div>
<hr class="d-md-none">
</div>
<div class="col-xs-12 col-sm-12 col-md-3">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
    <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;"  src="img/friend.png" alt="Roomates">
<div class="card-body">
    <h5 class="card-title center">Roomates</h5>
    <p class="card-text">Get yourself your taste roomate from our nano-social community, check their profiles and get connected <br></p>
  </div>
</div>
<hr class="d-md-none">
</div>

<div class="col-xs-12 col-sm-12 col-md-3">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
    <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;"  src="img/service.png" alt="Services">
<div class="card-body">
    <h5 class="card-title center">Campus Services</h5>
    <p class="card-text">Looking for any service quick and easy? We've got you covered view all available services and business around and begin to patronized.</p>
  </div>
</div>
<hr class="d-md-none">
</div>

<hr class="d-md-none">
<div class="col-xs-12 col-sm-12 col-md-3">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
    <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;"  src="img/sell.svg" alt="IExchange">
<div class="card-body">
    <h5 class="card-title center">IExchange</h5>
    <p class="card-text">Now you can search for fairly used items ranging from phones,generators,art works,laptops and many more.</p>
  </div>
</div>
</div>
</div>
<hr class="d-md-none">
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-3 ">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
    <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;"  src="img/images.png" alt="ShopON">
<div class="card-body">
    <h5 class="card-title center">ShopON</h5>
    <p class="card-text">Shoping Made easy,escape the sweat break the stress,lets handle it for you.shop for as many items you might need at exactly same market price and get your items delivered to your door step.</p>
  </div>
</div>
<hr class="d-md-none">
</div>
<div class="col-xs-12 col-sm-12 col-md-3">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
    <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="img/unnamed.png" alt="Rent">
<div class="card-body">
    <h5 class="card-title center">My Lodge Rents</h5>
    <p class="card-text">Manage and pay your lodge rent on yourhomefuto ,using our quick and easy service on the go.</p>
  </div>
</div>
<hr class="d-md-none">
</div>

<div class="col-xs-12 col-sm-12 col-md-3">

  <div class="card" style="border:1px solid white;margin-top: 15px;">
  <div align="center">
    <i class="fa fa-car" style="font-size: 110px" ></i>
</div>
<div class="card-body">
    <h5 class="card-title">Campus Pilot</h5>
    <p class="card-text">Campus pilot helps you out in times of transportation difficulties at affordable prices.</p>
  </div>
</div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 d-md-none">
    <h6 style="border:1px solid white;border-raduis:100px;background-color:lightgrey;width:50px;margin-bottom:-2px;">ADS</h6>
 <div style="background-color:lightgrey;color: white;">
   <a href="https://www.futoville.com"><img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 100%;" src="img/futo-ville.jpg" alt="Rent">
 </a></div>

  </div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">

  <div class="card" style="border:1px solid white;margin-top: 15px;background-color: #20c997" align="center">
    <!-- <img class="center" style="display: block;margin-left: auto;margin-right: auto;width: 50%;"  src="img/sell.svg" alt="GetStarted"> -->
<div class="card-body">
    <h5 class="card-title center">How to Get started</h5>
    <p class="card-text">SignUp or Login to get started Now!</p>
    <div class="wrapper" style="text-align: center;">
  <a class="btn btn-success" href="signup">Register</a>
    <a class="btn btn-warning" href="login">Login</a>

  </div>
  </div>
</div>
</div>
</div>




<?php
include'inc/footer.php';
?>
<?php

include'inc/navscript.php';
?>
</body>
</html>
