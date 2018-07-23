<?php
session_start();
	require 'inc/dbh.inc.php';
	if(!isset($_SESSION['adminid']) & empty($_SESSION['adminid'])){
		header('location: login.php');
	}
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Admin Dashboard</title>
    <head>
<?php include 'inc/header.php'; ?>     
    </head>
  </head>
  <body>
<?php include 'inc/nav.php'; ?>  
<div class="container-fluid">
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-6"  style="background-color:
   #006666;color:white;">
    
    <div  align="left"><span><h3 align="center">Admin<i class="fa fa-shield"></i></h3><hr>

      <img class="rounded-circle" src="../img/ceo.png" height="40" width="40">
      <b><?php 
echo $_SESSION['fullname'];
      ?>
    </b></span>
    </div>
<hr>

    <div class="justify-content-left" align="center">
    <h5 style="display: inline-block;">USERS</h5><i class="fa fa-user-circle-o" style="font-size: 30px;"></i>
  <hr>
  <div><H6><a href="all-users.php" style="color: white;">All Users</a><i class="fa fa-universal-access"></i></H6></div>
    <div><H6><a href="all-users.php" style="color: white;">Activate Users</a><i class="fa fa-check-square"></i></H6></div>
  <div><H6><a href="all-users.php" style="color: white;">Deactivate Users</a><i class="fa fa-close"></i></H6></div>
  <div><H6><a style="color: white;" href="add-users.php">Add Users</a><i class="fa fa-user-plus"></i></H6></div>
  <div><H6><a href="edit-users.php" style="color: #fff;">Edit Users</a><i class="fa fa-edit"></i></H6></div>
  
  <hr>
    <h6 style="display: inline-block;">CAMPUS SERVICES</h6><i class="fa fa-gear" style="font-size: 30px;"></i>
<hr>

  <div><H6><a style="color: white;" href="a_services">All Services</a></H6></div>
  <div><H6><a href="approved_s" style="color: white;">Approved Services</a></H6></div>
  <div><H6><a href="unapproved_s" style="color: white;">Unapproved Services</a></H6></div>
  <div><H6><a href="del_s" style="color: white;">Delete a Service</a></H6></div>
  <div><H6><a href="add_s" style="color: #fff;">Add a Service</a></H6></div>
  <hr>
    <h6 style="display: inline-block;">CAMPUS PILOT</h6><i class="fa fa-car" style="font-size: 30px;"></i>
<hr>

  <div><H6><a style="color: white;" href="cp_users">Registered Users</a></H6></div>
  <div><H6><a href="cp_dusers" style="color: white;">Drivers</a></H6></div>
  <div><H6><a href="cp_unapproeddv" style="color: white;">Submitted Driver Request</a></H6></div>
  <div><H6><a href="del_cpus_d" style="color: white;">Delete a User/Driver</a></H6></div>
  <div><H6><a href="add_cpus_d" style="color: white;">Add a User/Driver</a></H6> </div>
  <div><H6><a href="reservations-cp" style="color: white;">Reservations</a></H6> </div>
  <hr>
    <h6 style="display: inline-block;">LODGERMAN</h6><i class="fa fa-home" style="font-size: 30px;"></i>
<hr>
  <div><H6><a style="color: white;" href="lm_uploaded">Uploaded Lodges</a></H6></div>
  
<div><H6><a style="color: white;" href="lm_add">Add a Lodges</a></H6></div>
  <div><H6><a href="lm_editlodge" style="color: white;">Edit Lodges</a></H6></div>
  <div><H6><a href="lm_delete" style="color: white;">Delete</a></H6></div>
  <div><H6><a href="lm_reservations" style="color: white;">Lodge Reservations</a></H6></div>
  
  </div>
</div>

  <div class="col-md-9" style="border-radius:16px;">

    <h2 style="background-color: #008080;color: white">
    CONTROL DASHBOARD<i class="fa fa-bar-chart"></i>
  </h2>
  <div class="row">
    <div class="col-md-3" style="background-color: #0099cc;margin-left: 10px;border-radius: 6px;">
      <i class="fa fa-user" style="color: white;font-size: 55px;display: inline-block;" align="left"></i><h6 style="color: white;display: inline-block;" > Registered Users</h6>
      <div align="right">

<?php
$sql = "SELECT * FROM users;";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);



?>

      <?php
echo $count;
      ?><i class="
      fa fa-spinner fa-pulse"></i></div>
      <p style="color: white;border-top:1px solid white" >View All Users<i class="fa fa-send-o"></i></p>
    </div>



     <div class="col-md-4" style="background-color:#29a329;margin-left:10px;border-radius: 6px;">
      <i class="fa fa-registered" style="color: white;font-size: 55px;display: inline-block;" align="left"></i><h6 style="color: white;display: inline-block;" > Registered Services</h6>
      <div align="right">

<?php
$sql = "SELECT * FROM services;";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);



?>

      <?php
echo $count;
      ?><i class="
      fa fa-spinner fa-pulse"></i></div>
      <p style="color: white;border-top:1px solid white" ><a href="a_services" style="color: #fff;">  View All Services</a><i class="fa fa-send-o"></i></p>
    </div>



     <div class="col-md-4" style="background-color: #1f3057;margin-left: 10px;border-radius: 6px;">
      <i class="fa fa-car" style="color: white;font-size: 55px;display: inline-block;" align="left"></i><h6 style="color: white;display: inline-block;" > Available CP-users</h6>
      <div align="right">

<?php
$sql = "SELECT * FROM campus_pilot_users;";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>    <?php
echo $count;
      ?><i class="
      fa fa-spinner fa-pulse"></i></div>
      <p style="color: white;border-top:1px solid white" ><a href="cp_users" style="color: #fff;">View All Registered Users</a><i class="fa fa-send-o"></i></p>
    </div>

  </div>
  <!-- second row -->
  <div class="row">
    <div class="col-md-6">
      Yourhomefuto
      <p>USERS</p>
    </div>

    <div class="col-md-6" style="border-left:5px solid ">
      Campus-Pilot
      <p>USERS</p>
    </div>
  </div>
  </div>

</div>

</div>




  <?php include 'inc/footer.php'; 
  include 'inc/navscript.php';
  ?>
  </body>
  </html>
