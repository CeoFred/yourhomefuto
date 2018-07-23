<?php
session_start();
if (isset($_GET['lodge_name'])) {
	require 'inc/dbh.inc.php';
$lodge_name = mysqli_real_escape_string($conn,$_GET['lodge_name']);
	$sql =  "SELECT * FROM lodger_man WHERE lodge_name ='$lodge_name';";
	if($qo = mysqli_query($conn,$sql)){
		$r = mysqli_fetch_assoc($qo);
	}
}else{
	header('Location: index?Not-found');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $r['lodge_name']; ?></title>
    <?php require'inc/header.php'; ?>
</head>

<body>
<?php require'inc/nav.php'; ?>
<div  style="width: 100%">
	<div class="row">

		<div class="col-md-12" align="center">
			<div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">

      <img class="" height="350" width="100%" src="../admin/<?php echo $r['thumb']; ?>" alt="<?php echo $r['lodge_name']; ?>">

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,204,0,0.8);border-radius: 7px;padding:20px;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>
</div>

<!-- other modal -->
<div>
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle" style="color: rgba(0,204,0,0.8)"><?php echo $r['lodge_name']; ?></h5>
			</div>
			<div class="modal-body">
<div>
	<p><b style="color: rgba(0,204,0,0.8)">Description<hr></b><?php echo $r['lodge_description']; ?></p>
<p>Available Rooms - <?php echo $r['available_rooms']; ?></p>
<p>Total Rooms - <?php echo $r['total_rooms']; ?></p>
<h5 style="color: rgba(0,204,0,0.8)"><b>Facilities</b></h5>
<hr>
<p><?php echo $r['Tanks']; ?> Reservours</p>
<p><?php echo $r['kitchen_type']; ?> Kitchen</p>
<p><?php echo $r['Facilities']; ?></p>
<h5 style="color: rgba(0,204,0,0.8)"><b>Add-ons</b></h5>
<hr>
<p>Table Tennis Court</p>
<p>Lodge Shop</p>

<h5 style="color: rgba(0,204,0,0.8)"><b>Extras</b></h5>
<hr>
<p>availabe GSM Network - MTN,GLO.</p>
<p>Distance from school - <?php echo $r['distance_from_school']; ?></p>
<h5 style="color: rgba(0,204,0,0.8)"><b>Management Team</b></h5>
<hr>
<p>Dr.Mba Nwosu(Land-lord)</p>
<p><?php echo $r['lodge_president_name']; ?>(President)</p>
<p><?php echo $r['caretaker_name']; ?>(Care-taker)</p>

<h5 style="color: rgba(0,204,0,0.8)"><b>Rules and Regulations<i class="fa fa-caution"></i></b></h5>
<hr>
<textarea style="width: 100%;border-radius:8px;" readonly>
<?php echo $r['rules']; ?>
</textarea>

<br>
<br>
<br>
<h6 style="color: rgba(0,204,0,0.8)"><b>Ratings(8.4/10) -  Likes(28)</b></h6>
</div>
			</div>
			<div class="modal-footer btn-group">
				<button type="button" class="btn btn-warning">Mail<i class="fa fa-envelope"></i></button>
				<button type="button" class="btn btn-success">Call <i class="fa fa-phone"> </i></button>
			</div>

			<a href="booking?ln=<?php echo  $r['lodge_name']; ?>&li=<?php echo $r['lodger_man_id']; ?>" style="border-radius:0px;height:50px;opacity:10px;" class="btn btn-primary btn-block fixed-bottom d-md-none">Book Now <i class="fa fa-book"></i> </a>
		</div>
	</div>
</div>
<?php
include 'inc/footer.php';
include 'inc/navscript.php';
 ?>
</body>
</html>
