<?php
session_start();
        if (isset($_POST['web_submit'])) {
     $Kitchen =  $_POST['Kitchen'];
	$Distance =  $_POST['Distance_from_school'];
	$Price = $_POST['Price'];
	$Location = $_POST['Location'];
require '../inc/dbh.inc.php';
$sql = "SELECT * FROM lodger_man WHERE Kitchen_type = '$Kitchen' AND distance_from_school = '$Distance' AND Price = '$Price' AND lodge_location = '$Location';";
$q = mysqli_query($conn,$sql);
$num = mysqli_num_rows($q);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
include 'inc/header.php';
	?>
	<title>Logerman Search</title>
</head>
<body>
<?php
include 'inc/nav.php';
 ?>

        <div class="container-fluid">

 <div align="center" class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa fa-search" style="font-size: 30px;"></i>Search for lodge with <?php echo'Kitchen Type- '.($Kitchen).',Price- NGN.'.($Price).' had '. $num.' results' ; ?> <button type="button" class="close " data-dismiss="alert" aria-label="Close" >
 	<span aria-hidden="true">&times</span>
 </button></div>
       	<div class="row">


	<?php

if ($num > 0) {
          while ($r = mysqli_fetch_assoc($q)) {
        ?>

        		<div class="col-md-3">

<div class="card" style="width: 100%;">
<div class="">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
<!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
</ol>
<div class="carousel-inner">
<div class="carousel-item active">
<a>
<img class="d-block w-100 d-none d-sm-block" height="330" width="100%" src="../admin/<?php echo $r['thumb']; ?>" alt="campus-pilot" style="">
</a>
</div>

<div class="carousel-item">
<a>
<img class="d-block w-100 d-none d-sm-block" height="330" src="img/hot.jpg" alt="Ihiagwa">
</a>
<div class="carousel-caption">
<h6 style="margin-bottom:-40px;"></h6>

</div>
</div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators"  role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
<span class="sr-only">Next</span>
</a>
</div>
<h5 class="card-title">
<p style="padding: 5px;"><i class="fa fa-home" style="font-size:20px;">

</i><?php echo $r['lodge_name']; ?>
</p>

</h5>
<p class="card-text">
  <p style="padding:5px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i> <?php echo $r['lodge_location']; ?></p>

  <p style="padding:5px;"><i class="fa fa-road" style="font-size: 20px;"></i> <?php echo $r['distance_from_school']; ?></p>

<p style="padding: 10px;"><i class="fa fa-money" style="font-size: 20px;"></i>
<?php echo $r['price'] ?></p>

</p>
<div class="btn-block" role="group" align="center" style="margin: 20px;">
<a style="color: black;" href="lodge?lodge_name=<?php echo($r['lodgename']); ?>" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
<a   class="btn btn-secondary disabled"><i class="fa fa-book"></i>Book</a>

<a href="https://wa.me/?text=Check out lodges in Umuchima,Futo now on yourhomefuto.com.ng/lodgerman/lodge?lodge_name=<?php echo($r['lodge_name']); ?>" class="btn btn-success"><i class="fa fa-whatsapp"></i>Share


</a>
</div>

</div>
</div>

<br>
        		</div>

<?php }

}
else{


	echo '
<div class="col-12">
	<div align="center" class="alert alert-danger">
	<h3 style="margin-top: 20px;">
		Opps!No result found. Try searching for the lodges name
	</h3>

<div>
	<h6 class="alert alert-info"><i class="fa fa-info-circle" style="font-size:20px;"></i>Meanwhile lodgerman has results based on the price tag of your search below.</h6>
</div>
</div>
</div>';

}
	 ?>




</div>
        </div>

<div>
	<div class="container-fluid">
	<u><b><h4>RELATED TO SEARCH RESULTS</h4></b></u>
		<div class="row">
	<?php
require 'classoop.php';
$obj = new gen;
$sql = "SELECT * FROM lodger_man WHERE price = '$Price' AND lodge_location = '$Location'";


if ($ok =  $obj->query($sql)) {
	 while ($r = mysqli_fetch_assoc($ok)) {?>

		<div class="col-md-3">
	         <div class="card" style="width: 100%;">
<div>
<h5 class="card-title">
<p style="padding: 5px;"><i class="fa fa-home" style="font-size:20px;">

</i><?php echo $r['lodge_name']; ?>
</p>

</h5>
<p class="card-text">
  <p style="padding:5px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i> <?php echo $r['lodge_location']; ?></p>

  <p style="padding:5px;"><i class="fa fa-road" style="font-size: 20px;"></i> <?php echo $r['distance_from_school']; ?></p>

<p style="padding: 10px;"><i class="fa fa-money" style="font-size: 20px;"></i>
<?php echo $r['price'] ?></p>

</p>
<div class="btn-block" role="group" align="center" style="margin: 20px;">
<a style="color: black;" href="lodge?lodge_name=<?php echo($r['lodge_name']); ?>" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
</div>

</div>
</div>

			</div>

	<?php }
 }
	 ?>

</div>
		</div>
</div>

<div style="background-color:rgba(244,240,230,0.7);margin-bottom: 50px;margin-top: 50px;padding: 30px;" align="center">
	<h5>Are you A Lodge Owner and you don't seem to find your property here?</h5>
	<a href="" class="btn btn-primary">Add your Property</a>
</div>
	<?php include 'inc/footer.php'; ?>


</body>
</html>
