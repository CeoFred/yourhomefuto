


<?php
if (isset($_SESSION['cpemail'])) {
  echo '
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#1f3057;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">
     <i class="fa fa-car" style="color:#fff;"><b style="font-family:Nunito">Campus-pilot</b></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item">
        <a style="color:#fff;" class="nav-link" href="drive">DRIVE</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

      <a class="btn btn-light my-2 my-sm-0" href="inc/logout.php" type="submit">LOGOUT</a>
<a class="btn btn-outline-light my-2 my-sm-0" href="control"><i class="fa fa-user-circle-o"></i></a>

        <a style="color:#fff;" class="nav-link" href="report">Report</a>
    </form>
  </div>
</nav>';
}
else{
  echo '
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#1f3057;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">
     <i class="fa fa-car" style="color:#fff;"><b style="font-family:Nunito">Campus-pilot</b></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="book-now" style="color:#fff;">RIDE</a>
      </li>

      <li class="nav-item">
        <a style="color:#fff;" class="nav-link" href="drive">DRIVE</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <a style="color:#fff;" class="nav-link" href="login">LOGIN</a>
      <a class="btn btn-light my-2 my-sm-0" href="help" type="submit">Help?</a>

        <a style="color:#fff;" class="nav-link" href="report">Report</a>
    
    </form>
  </div>
</nav>';
}
?>
