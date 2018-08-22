<?php
session_start();
$lodgename = $description = $Location = $price = $available_rooms = $total_rooms = $landmark = $security_level = $caretaker_name = $caretaker_number = $lodge_president_name = $lodge_president_number = $Tanks = $rules = $Addons  =
$Facilities = '';

	if(isset($_POST) & !empty($_POST)){
require 'inc/dbh.inc.php';
		$lodgename = mysqli_real_escape_string($conn, $_POST['lodgename']);
		 $description = mysqli_real_escape_string($conn, $_POST['lodgedescription']);
		 $Location = mysqli_real_escape_string($conn, $_POST['lodgelocation']);
		 $price = mysqli_real_escape_string($conn, $_POST['lodgeprice']);
     $kitchen_type = mysqli_real_escape_string($conn,$_POST['kitchen_type']);
         $distance_from_school = mysqli_real_escape_string($conn,$_POST['distance_from_school']);
         $rules = mysqli_real_escape_string($conn,$_POST['rules']);
         $security_level = mysqli_real_escape_string($conn,$_POST['security_level']);
         $available_rooms = mysqli_real_escape_string($conn,$_POST['available_rooms']);
         $total_rooms = mysqli_real_escape_string($conn,$_POST['total_rooms']);
         $landmark = mysqli_real_escape_string($conn,$_POST['landmark']);
         $caretaker_name = mysqli_real_escape_string($conn,$_POST['caretaker_name']);
        $caretaker_number = mysqli_real_escape_string($conn,$_POST['caretaker_name']);
         $lodge_president_name = mysqli_real_escape_string($conn,$_POST['lodge_president_name']);
         $lodge_president_number = mysqli_real_escape_string($conn,$_POST['lodge_president_number']);
         $date_of_establishment = mysqli_real_escape_string($conn,$_POST['date_of_establishment']);
         $room_notice = mysqli_real_escape_string($conn,$_POST['room_notice']);
         $building_type = mysqli_real_escape_string($conn,$_POST['building_type']);
         $available_network = mysqli_real_escape_string($conn,$_POST['available_network']);
         $Tanks = mysqli_real_escape_string($conn,$_POST['Tanks']);
// $Extras = mysqli_real_escape_string($conn,$_POST['Extras']);
$Addons = mysqli_real_escape_string($conn,$_POST['Addons']);
$Facilities = mysqli_real_escape_string($conn,$_POST['Facilities']);

if (isset($_POST['lodgeextra1'])) {
	$extra1 = $_POST['lodgeextra1'];
}else
{
	$extra1 = 0;
}
$Extras = array();
array_push($Extras,$extra1);
$lodger_man_id = 'LODGER-MAN'.'-'.str_shuffle(1234567890);

if (empty($lodgename)) {
	$_SESSION['error'] = 'Lodge Name was left empty';}
// }if (empty($date_of_establishment)) {
// 	$_SESSION['error'] = 'Date of Establishment was left empty';
// }
else{


			$file = $_FILES['lodgeimage'];
			$fileName = $_FILES['lodgeimage']['name'];
            $fileNTmpName = $_FILES['lodgeimage']['tmp_name'];
            $fileSize = $_FILES['lodgeimage']['size'];
            $fileError = $_FILES['lodgeimage']['error'];
			$fileType = $_FILES['lodgeimage']['type'];
			//which types of files are allowed
			$fileExt = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg' , 'jpeg' , 'png',);
if (in_array($fileActualExt, $allowed)) {
	if ($fileError === 0) {
		if ($fileSize < 1900000) {
			$fileNameNew = uniqid('',true).".".$fileActualExt;
			$fileDestination = 'uploads/'.$fileNameNew;
			move_uploaded_file($fileNTmpName, $fileDestination);

//,price,thumb,kitchen_type,distance_from_school,rules,security_level,available_rooms,total_rooms,caretaker_name,caretaker_number,lodge_president_name,lodge_president_number,date_of_establishment,$lodger_man_id

//,'$price','$fileDestination','$kitchen_type','$distance_from_school','$rules','$security_level','$available_rooms','$total_rooms','$caretaker_name','$caretaker_name','$lodge_president_name','$lodge_president_number','$date_of_establishment','$lodger_man_id'
 $sql = "INSERT INTO lodger_man (lodge_name, lodge_location,lodge_description,price,kitchen_type,security_level,distance_from_school,rules,landmark,available_rooms,total_rooms,caretaker_name,caretaker_number,lodger_man_id,Tanks,lodge_president_name,lodge_president_number,date_of_establishment,addons,Facilities,thumb,building_type,room_notice,available_network)
  VALUES ('$lodgename', '$Location','$description','$price','$kitchen_type','$security_level','$distance_from_school','$rules','$landmark','$available_rooms','$total_rooms','$caretaker_name','$caretaker_number','$lodger_man_id','$Tanks','$lodge_president_name','$lodge_president_number','$date_of_establishment','$Addons','$Facilities','$fileDestination','$building_type','$room_notice','$available_network');";
if(mysqli_query($conn, $sql)){
// replace the code below with codes to upload multiple images of the lodges environnment.

$sqll = "INSERT INTO lodger_man_img (thumb,lodge_id) VALUES ('$fileDestination','$lodger_man_id');";
$qui = mysqli_query($conn,$sqll);
if ($qui) {
	$_SESSION['success'] = 'Lodge Uploaded';
}else{
	$_SESSION['error'] = 'Could not upload1';
}
}
else{
	$_SESSION['error'] = 'Could  not upload2';
}

		}else{
			$_SESSION['error'] = 'File should not be more than 9MB';
		}
	}else{
	$_SESSION['error'] = 'There was an error uploading your file,Try Again';
	}
}else{
	$_SESSION['error'] = 'You either did not upload an image or you used an invalid file format only PNG,JPG,JPEG are allowed.';
}
}
// echo $lodger_man_id;
// echo $lodgename;
// echo $description;
// echo $Location;
// echo $rules;
// echo $distance_from_school;
// echo $kitchen_type;
// echo $security_level;
// echo $date_of_establishment;
// echo $lodge_president_name;
// echo $lodge_president_number;
// echo $caretaker_name;
// echo $caretaker_number;
// echo $landmark;
// echo $total_rooms;
// echo $available_rooms;

// $file = $_FILES['file'];
// 			$fileName = $_FILES['lodgeimage']['name'];
//             $fileNTmpName = $_FILES['lodgeimage']['tmp_name'];
//             $fileSize = $_FILES['lodgeimage']['size'];
//             $fileError = $_FILES['lodgeimage']['error'];
// 			$fileType = $_FILES['lodgeimage']['type'];
// 			//which types of files are allowed
// 			$fileExt = explode('.',$fileName);
// 			$fileActualExt = strtolower(end($fileExt));
// $allowed = array('jpg' , 'jpeg' , 'png','');
// if (in_array($fileActualExt, $allowed)) {
// 	if ($fileError === 0 || $fileError === 1) {
// 		if ($fileSize < 900000) {
// 			$fileNameNew = uniqid('',true).".".$fileActualExt;
// 			$fileDestination = 'uploads/'.$fileNameNew;
// 			move_uploaded_file($fileNTmpName, $fileDestination);

// 						$sql = "INSERT INTO lodger_man (lodge_name, lodge_description) VALUES ('$lodgename', '$description')";

// if (mysqli_query($conn,$sql)) {
// 	$_SESSION['succcess'] = 'Successfully Added a New Lodge';
// }else{
// 	$_SESSION['error'] = 'Failed To Store Data,Try again';
// }
// }else{
// 			$_SESSION['error'] = 'File should not be more than 9MB';

// 		}else{
// 			$_SESSION['error'] = 'There was an error uploading your file,Try Again';
// 		}else{
// 	$_SESSION['error'] = 'You either did not upload an image or you used an invalid file format.';
// 		}
// }
// }
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add A lodge</title>  <?php include 'inc/header.php'; ?>
  </head>
  <body>
<?php include 'inc/nav.php'; ?>
<div class="container-fluid">
<div class="row">

<div class="col-md-6">

<?php if(isset($_SESSION['error'])){ ?>
  <div class="alert alert-danger"
   style="text-align: center;font-size:1.0em;padding:10px;color: white;
  position: fixed;
  width: 100%;">
  <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
</div>
  <?php
  }
  ?>

	<h2>Add A lodge</h2>
<div class="container">
		<?php if(isset($_SESSION['success'])){ ?><div class="alert alert-success" role="alert"> <?php echo $_SESSION['success'];unset($_SESSION['success
		']); ?> </div><?php } ?>
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label>Lodge Name</label>
			    <input type="text" class="form-control" name="lodgename" id="Productname" value="<?php echo $lodgename; ?>" placeholder="Lodge Name">
			  </div>
			  <div class="form-group">
			    <label>Lodge Description</label>
			    <textarea class="form-control" name="lodgedescription" rows="3"><?php echo(	$description); ?>
			    </textarea>
			  </div>

<div class="form-group">
			    <label>Kitchen Type</label>
			    <select name="kitchen_type" class="form-control">
			    	<option value="Interior">Interior</option>
			    	<option value="Exterior">Exterior</option>
			    </select>
			    </div>

<div class="form-group">
			    <label> Lodge Location</label>
			    <select name="lodgelocation" class="form-control">
			    	<option value="Eziobodo">Eziobodo</option>
			    	<option value="Umuchima">Umuchima</option>
<option value="Ihiagwa">Ihiagwa</option>
			    </select>
			    </div>


<div class="form-group">
			    <label> Landmark</label>
			    <input value=" <?php echo($landmark); ?>  " type="text" class="form-control" name="landmark">
			    </div>


<div class="form-group">
			    <label>Tanks</label>
			    <input value="<?php echo($Tanks); ?>" type="number" class="form-control" name="Tanks">
			    </div>
<div class="form-group">
			    <label>Rules</label>
			    <textarea name="rules" rows="3" class="form-control">
<?php echo $rules; ?>
			    </textarea>
			    </div>
<div>
	<label>Room Notice</label>
	<small>If there are no rooms in particular floor,add the notice here.</small>
	<textarea name="room_notice" class="form-control">
		
	</textarea>
</div>

<div class="form-group">
			    <label>Security Level</label>
			    <select name="security_level" class="form-control">
			    	<option value="5">5</option>
			    	<option value="4">4</option>
			    	<option value="3">3</option>
			    	<option value="2">2</option>
			    	<option value="1">1</option>
			    </select>
			    </div>

<div class="form-group">
			    <label>Available Network</label>
			    <select name="available_network" class="form-control">
			    	<option value="GLO">GLO</option>
			    	<option value="MTN">MTN</option>
			    	<option value="AIRTEL">AIRTEL</option>
			    	<option value="ETISALAT">ETISALAT</option>
			    	<option value="ALL">ALL</option>
			    </select>
			    </div>


<div class="form-group">
			    <label>Building Type</label>
			    <select name="building_type" class="form-control">
			    	<option value="Bungaow">Bungaow</option>
			    	<option value="1 Storey">1 Storey</option>
			    	<option value="2 Storey">2 Storey</option>
			    	<option value="3 Storey">3 Storey</option>
			    	<option value="4 Storey">4 Storey</option>
			    </select>
			    </div>


			  <div class="form-group">
			    <label>Distance From School</label>
			    <select class="form-control" name="distance_from_school">
				  <option value="Close">Close</option>
				  <option value="Closest">Closest</option>
					<option value="far">Far</option>
					<option value="very_far">Very Far</option>
				</select>
			  </div>


			  <div class="form-group">
			  	<label>Caretakers Name</label>
			  	<input type="text" name="caretaker_name" placeholder="caretakers name" class="form-control" value=" <?php echo($caretaker_number); ?> 	">
			    </div>

			  <div class="form-group">
			  	<label>Caretakers Number</label>
			  	<input type="text" name="caretaker_number" placeholder="caretakers number" class="form-control" value=" <?php echo($caretaker_number); ?> ">
			    </div>

			  <div class="form-group">
			  	<label>Presisdents Name</label>
			  	<input type="text" name="lodge_president_name" placeholder="Prediednts name" value="<?php echo($lodge_president_name); ?>" class="form-control">
			    </div>

			  <div class="form-group">
			  	<label>President's Number</label>
			  	<input type="text" name="lodge_president_number" placeholder="Presidents Number" value="<?php echo($lodge_president_number); ?> " class="form-control">
			    </div>
			  <div class="form-group">
			  	<label>Available Rooms</label>
			  	<input type="number" maxlength="3" name="available_rooms" placeholder="Available Rooms" class="form-control" value="<?php echo($available_rooms); ?> ">
			    </div>
			  <div class="form-group">
			  	<label>Total Rooms</label>
			  	<input type="number" maxlength="3" name="total_rooms" placeholder="Total Rooms" class="form-control" value=" <?php echo($total_rooms); ?> ">
			    </div>


			  <div class="form-group">
			  	<label>Date of Establishment</label>
			  	<input type="date" value=" <?php echo($date_of_establishment); ?> " name="date_of_establishment" class="form-control">
			    </div>
					<div class="form-group">
						<label>Room Facilities</label>
						<input type="text" value=" <?php echo($Facilities); ?> " name="Facilities" class="form-control">
						</div>

						<div class="form-group">
							<label>Lodge Add-ons</label>
							<input type="text" value=" <?php echo($Addons); ?> " name="Addons" class="form-control">
							</div>


			  <div class="form-group">
			    <label>Lodge Price</label>
			    			    <select class="form-control"  name="lodgeprice">
				  <option value="NGN.80,000.00">80,000</option>
				<option value="NGN.90,000.00">90,000</option>
					<option value="NGN.100,000.00">100,000</option>
				<option value="NGN.110,000.00">110,000</option>
				<option value="NGN.120,000.00">120,000</option>
				</select>
</div>
			  <div class="form-group">
			    <label>MainImage</label>
			    <input type="file" name="lodgeimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>

<div class="form-group">
			    <label>OtherImages(Multiple)</label>
			    <input multiple type="file" name="multipleUploads">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
</div>
 </div>

</div>
</body>
</html>
