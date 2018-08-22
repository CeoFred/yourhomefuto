


<?php
if (isset($_SESSION['email'])) {
  echo'
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#66CDAA">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="lodgerman/">LodgerMan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="IExchange/">IExchange</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services/">Campus Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roomates/">Roomates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shopon/">shopon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Campus-pilot/">CampusPilot</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-success my-2 my-sm-0" href="inc/logout.php" type="submit">LogOut</a>
<a class="btn btn-warning my-2 my-sm-0" href="user/">My Profile</a>
    </form>
  </div>
</nav>';
}
else{
  echo '
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#66CDAA">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index">
      <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="lodgerman/">LodgerMan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="iexchange/">IExchange</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services/">Campus Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roomates/">Roomates</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="shopon/">shopon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Campus-pilot/">Campus Pilot</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-success my-2 my-sm-0" href="login" >Login</a>

      <a class="btn btn-outline-dark my-2 my-sm-0" href="signup">Signup</a>
    </form>
  </div>
</nav>';
}
?>
