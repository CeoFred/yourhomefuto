<?php

if (isset($_SESSION['adminid'])) {
  echo '
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#66CDAA">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">
      <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link">Welcome Back Admin<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-success my-2 my-sm-0" href="inc/logout.php" type="submit">LogOut</a>
<a class="btn btn-warning my-2 my-sm-0" href="user/">Profile</a>
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
  <a class="navbar-brand" href="index.php">
      <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-success my-2 my-sm-0" href="../login.php" type="submit">Login</a></form>
  </div>
</nav>';
}
?>
