<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>LodgerMan | yourhomefuto</title>
    <?php require'inc/header.php'; ?>
</head>

<body>

<style type="text/css">
	#lodge,img :hover{
font-size: 30px;
	}

</style>
<?php require'inc/nav.php'; ?>
<header style="padding:40px;background-image: url(img/bg.jpg);background-size: cover;background-position: center;"  class="d-md-block d-none">
	<div class="row" >

<div class="col-md-6">
	<div style="background-color: rgba(223,223,234,0.6);border-radius: 10px;margin-top: 50px;" align="center">
		<h3>Search and Book Lodges in FUTO.</h3>
<p><b>Search through 702 lodges on campus,quick and easy</b></p>
<p>- Use lodgerman search engine</p>
<p>- Select a lodge</p>
<p>- Check Reviews</p>
<p>-Reserve your space.</p>
<p>Now you can sleep well</p>
	</div>

	</div>
		<div style="margin-top: 50px;" class="col-md-6 col-sm-12">

	<form method="post" action="lodgermansearch.php">
<div style="background-color: rgba(223,224,223,0.8);">
	<h3 style="background-color: #B0E0E6;width: 100%;padding: 10px;color: #fff;" align="center"><i class="fa fa-bed" style="color: #fff;font-size: 40px;" ></i> LodgerMan Search</h3>
<span style="padding: 30px;">
	<div>
		<div class="row">

		<div class="col-md-6" style="padding-left: 60px;">
		<i class="fa fa-map-marker"></i>Location
		<br>
<select align="center" style="border:3px solid #B0E0E6;height: 50px;width: 200px;" name="Location">

		<option value="Eziobodo">
			Eziobodo
		</option>
		<option value="Umuchima">
			Umuchima
		</option>
		<option value="Ihiagwa">
			Ihiagwa
		</option>
</select>

			</div>
			<div class="col-md-6">
	<i class="fa fa-money"></i>Price
	<br>
<select style="border:3px solid #B0E0E6;height: 50px;width: 200px;" name="Price">
	<option value="100000">
		100,000
	</option>
	<option value="120000">120,000</option>
	<option value="110000">110,000</option>

	<option value="90000">90,000</option>
	<option value="80000">80,000</option>
	<option value="70000">70,0000</option>
</select>
			</div>
		</div>

		<div class="row">
		<div class="col-md-6" style="padding-left: 60px;">
		<i class="fa fa-cutlery"></i>Kitchen Type
		<br>
<select align="center" style="border:3px solid #B0E0E6;height: 50px;width: 200px;" name="Kitchen">
		<option value="Interior">
			Interior
		</option>
		<option value="Exterior">
Exterior
				</option>
</select>

			</div>
			<div class="col-md-6">
	<i class="fa fa-road"></i>Distance From Campus
	<br>
<select style="border:3px solid #B0E0E6;height: 50px;width: 200px;" name="Distance_from_school">
	<option value="Close">Close</option>

	<option value="Closest">Closest</option>
	<option value="VeryClose">Very Close</option>
	<option value="Far">
		Far
	</option>
	<option value="Very_far">Very Far</option>

</select>
			</div>
		</div>


</div>

</span>

		</div>
<button type="submit" name="web_submit" style="background-color:#87CEFA;" class="btn  btn-block"><i class="fa fa-search"></i>Search Availability</button>
</form>
	</div>

	</div>


</header>


      <!-- mobile header -->
<header style="padding:20px;background-image: url(img/hot.jpg);background-size:cover;border-raduis:7px;" class="d-md-none">
	<div class="row" >
		<div style="margin-top: 30px;width:100%" class=" col-sm-12">
<form method="post" action="lodgermansearch.php">
<div style="background-color: rgba(223,224,223,0.8);">
	<h3 style="background-color: #B0E0E6;width: 100%;padding: 10px;color: #fff;font-size:25px;">
	<i class="fa fa-bed" style="color: #fff;font-size: 30px;"></i> LodgerMan Search</h3>
<span>
	<div>
		<div class="row">
		<div class="col-sm-12" style="padding-left: 20px;">
		<i class="fa fa-map-marker"></i>Location
		<br>

<select align="center" style="border:3px solid #B0E0E6;height: 50px;width:100%;" name="Location">

		<option value="Eziobodo">
			Eziobodo
		</option>
		<option value="Umuchima">
			Umuchima
		</option>
		<option value="Ihiagwa">
			Ihiagwa
		</option>
</select>
			</div>
			<div class="col-sm-12" style="padding-left: 20px;">
	<i class="fa fa-money"></i>Price
	<br>	<select style="border:3px solid #B0E0E6;height: 50px;width: 100%;" name="Price">
	<option value="100000">
		100,000
	</option>
	<option value="NGN.120,000.00">120,000</option>
	<option value="NGN.110,000.00">110,000</option>
	<option value="NGN.90,000.00">90,000</option>
	<option value="NGN.80,000.00">80,000</option>
	<option value="NGN.70,000.00">70,0000</option>
</select>

			</div>
		</div>

		<div class="row">
		<div class="col-md-6" style="padding-left: 20px;">
		<i class="fa fa-cutlery"></i>Kitchen Type
		<br>
<select align="center" style="border:3px solid #B0E0E6;height: 50px;width:100%;" name="Kitchen">
		<option value="Interior">
			Interior
		</option>
		<option value="Exterior">
Exterior
				</option>
</select>

			</div>
			<div class="col-md-6" style="padding-left: 20px;"
	<i class="fa fa-road"></i>Distance From Campus
	<br>

<select style="border:3px solid #B0E0E6;height: 50px;width: 100%" name="Distance_from_school">
	<option value="Close">Close</option>

	<option value="Closest">Closest</option>
	<option value="VeryClose">Very Close</option>
	<option value="Far">
		Far
	</option>
	<option value="Very_far">Very Far</option>

</select>						</div>
		</div>

</div>

</span>
		</div>
<button type="submit" name="web_submit" style="background-color: #B0E0E6;" class="btn  btn-block"><i class="fa fa-search"></i>Search Availability</button>
	</form>
	</div>
	</div>


</header>

<div class="container">
		<div style="margin-top: 60px;margin-bottom: 30px;">

	<h5 style="color:#FF7F50  ;" align="center">Top 3 locations in FUTO</h5>
		</div>
		<div class="row" style="margin-bottom: 10px;">
<div class="col-md-4" style="margin-bottom:30px;">
	<div>


<a href="">
<div style="background-color: 	#FF7F50;color: #fff;border-top-left-radius:20px;border-top-right-radius:20px;
padding: 10px;z-index: 1000px;">
	<a href="lodges-in-umuchima?Location=Umuchima" style="color: #fff;">
<h6><i class="fa fa-map-marker"></i> UMUCHIMA</h6>
<?php
require 'inc/dbh.inc.php';
$sql = "SELECT * FROM lodger_man WHERE lodge_location = 'Umuchima';";
$q = mysqli_query($conn,$sql);
$num = mysqli_num_rows($q);
echo $num;
 ?> Verified Lodges</div>

	<img src="img/loca2.png" height="300" width="100%">
</a>
	</div>
</div>

<div class="col-md-4" style="margin-bottom:40px;">
	<div>
<div style="background-color:#FF7F50;color: #fff;border-top-left-radius:20px;border-top-right-radius:20px;
padding: 10px;z-index: 1000px;">
		<a href="lodges-in-eziobodo?Location=Eziobodo" style="color: #fff;">
<h6><i class="fa fa-map-marker"></i> EZIOBODO</h6>
<?php
require 'inc/dbh.inc.php';
$sql = "SELECT * FROM lodger_man WHERE lodge_location = 'Eziobodo';";
$q = mysqli_query($conn,$sql);
$num = mysqli_num_rows($q);
echo $num;
 ?> Verified Lodges</div>

	<img src="img/loca.png" height="300" width="100%">
</a>
	</div>
</div>
<div class="col-md-4">
<br>
  <div>
<div style="background-color: 	#FF7F50;color: #fff;border-top-left-radius:20px;border-top-right-radius:20px;padding: 10px;margin-top:-25px">
	<a href="lodges-in-ihiagwa?Location=Ihiagwa" style="color: #fff;">
<h6><i class="fa fa-map-marker"></i> IHIAGWA</h6>
<?php
require 'inc/dbh.inc.php';
$sql = "SELECT * FROM lodger_man WHERE lodge_location = 'Ihiagwa';";
$q = mysqli_query($conn,$sql);
$num = mysqli_num_rows($q);
echo $num;
 ?> Verified Lodges</div>

	<img src="img/loca3.png" height="300" width="100%">
</a>
	</div>
</div>
		</div>
</div>

<div class="container">
	<div class="row">


		<div class="col-md-12" align="center" style="margin-top: 50px;margin-bottom: 20px;border:3px solid #ff7f50">
		<h5 style="color:#FF7F50 "> Top-20 Around Campus</h5></div>
<div class="col-md-4" style="margin-bottom: 20px;">
	<div>

	<img src="img/home.png" style="" width="100%" height="100%">
		</div>



		<h6 style="background-color:#FF7F50;z-index: 1000px;padding: 5px;color:#fff;">
			<p>Presidential Villa</p>
		<p>Umuchima</p>
		<p>NGN.150,000</p>

	<a href="" class="btn btn-block btn-dark" style="color:#fff;">View More</a>
	</h6>



</div>
<div class="col-md-4" style="margin-bottom: 20px;">
	<div>

	<img src="img/loca5.png" style="" width="100%" height="100%">
		</div>



		<h6 style="background-color:#FF7F50;z-index: 1000px;padding: 5px;color:#fff;">
			<p>Presidential Villa</p>
		<p>Umuchima</p>
		<p>NGN.150,000</p>

	<a href="" class="btn btn-block btn-dark" style="color:#fff;">View More</a>
	</h6>



</div>
<div class="col-md-4" style="margin-bottom: 20px;">
	<div>

	<img src="img/loca4.png" style="" width="100%" height="350">
		</div>



		<h6 style="background-color:#FF7F50;z-index: 1000px;padding: 5px;color:#fff;">
			<p>Presidential Villa</p>
		<p>Umuchima</p>
		<p>NGN.150,000</p>

	<a href="" class="btn btn-block btn-dark" style="color:#fff;">View More</a>
	</h6>
</div>
</div>
</div>
</div>
<div style="background-color:rgba(244,240,230,0.7);margin-bottom: 50px;margin-top: 50px;padding: 30px;" align="center">
	<h6>Are you A Lodge Owner and you don't seem to find your property here?</h6>
	<a href="" class="btn" style="background-color:#B0E0E6;">Add your Property</a>
</div>
 <div>
  <?php

include'inc/footer.php';
  include'inc/navscript.php';
  ?>

</div>
</body>
</html>
