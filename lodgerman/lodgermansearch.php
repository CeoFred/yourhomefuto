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

<div class="card">
	<div class="card-header">

        			<img height="250" class="card-img-top" src="../admin/<?php echo($r['thumb']); ?>" >
	</div>
	<div class="card-body">
		<div class="text-center">
					<h6><i class="fa fa-home" style="font-size: 20px;"></i><?php echo ' '. $r['lodge_name']; ?></h6>
        		<h6><i class="fa fa-money" style="font-size: 20px;"></i><?php echo($r['price']); ?></h6>
        			<h6><i class="fa fa-map-marker" style="font-size: 20px;"></i><?php echo' '.($r['lodge_location']) ?></h6>

        			<a href="lodge?<?php echo($r['lodge_name']); ?>" class="btn btn-primary btn-group">View Lodge</a>
<a href="" class="btn-group">
        			<i class="fa fa-heart" style="font-size: 20px;color: red">Like</i>
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
$sql = "SELECT * FROM lodger_man WHERE price = '$Price';";


if ($ok =  $obj->query($sql)) {
	 while ($get = mysqli_fetch_assoc($ok)) {?>

		<div class="col-md-3">
	         <div class="card">
	         	<div class="card-header">
	         	<div class="card-img-top">
	         	<img alt="<?php echo($r['lodge_name']); ?>"  height="250" width="100%" src="../admin/<?php  echo($get["thumb"]); ?>" >
	         	</div>
	         	</div>
	         	<div class="card-body">
	         		<?php echo($get["lodge_name"]); ?>
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
