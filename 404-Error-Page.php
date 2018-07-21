<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include'inc/header.php';
?>
    <title> 404 Error - Page Not Found </title>
</head>
<style type="text/css">
	a{
		color: black;
	}
	a:hover{
		color: black;
	}
</style>
<body>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-6 col-lg-12 col-xl-12 justify-content-center" align="center"><a href="index.php">
    			<img src="img/logo.png" width="100" height="100"></a>
    			<span><h4>404 Error<i style="color: red" class="fa fa-warning"></i><p>Page Requested For Does not exist</p></h4></span>
    			<h6>Do A proper Navigation</h6>

    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="shopon/">
    					<img src="img/images.png" height="50" width="50"><span style="display: inline-block;"><h6>ShopON
    					</h6></span>
    				</a>
    				</div>	

    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="lodge/">
    					<img src="img/home.png" height="50" width="50"><span style="display: inline-block;"><h6>Lodge
    					</h6></span>
    				</a>
    				</div>	


    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="Rent/">
    					<img src="img/banknotes.png" height="50" width="50"><span style="display: inline-block;"><h6>Rents
    					</h6></span>
    				</a>
    				</div>	


    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="roomates/">
    					<img src="img/friend.png" height="50" width="50"><span style="display: inline-block;"><h6>Roomates
    					</h6></span>
    				</a>
    				</div>	

    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="services/">
    					<img src="img/service.png" height="50" width="50"><span style="display: inline-block;"><h6>Services
    					</h6></span>
    				</a>
    				</div>	

    		<br>

    				<div class="col-md-4 col-lg-12 col-xl-12 justify-content-center">
    					<a href="iexchange/">
    					<img src="img/sell.svg" height="50" width="50"><span style="display: inline-block;"><h6>IExchange
    					</h6></span>
    				</a>
    				</div>	


    		</div>

    	</div>


    </div>
    	<?php
include'inc/footer.php';
    	?>

    </body>
</html>