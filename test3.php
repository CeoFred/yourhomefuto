<?php 
session_start();
$email = $fname = $lname = $phone = '';
if (isset($_POST['submit'])) {
	echo "yes";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

				<form method="POST">
					<div align="center">

						
					<input type="text" style="border-color: 4px solid blue;height: 50px;width: 40%;" name="fname" placeholder="FirstName" value="<?php
echo($fname);
					?>">

					<input type="text" style="border-color: 1px solid blue;height: 50px;width: 40%;" name="lname" placeholder="LastName" value="<?php
echo($lname);
					?>">

					</div>
					<div align="center">
				
					<input  value="<?php
echo($email);
					?>" type="email" name="email" placeholder="Email" style="border-color: 1px solid blue;height: 50px;width: 80%">
						
					<input value="<?php
echo($phone);
					?>" type="text" name="phone" placeholder="PhoneNumber" style="border-color: 1px solid blue;height: 50px;width: 40%">
					<input  type="text" name="Institution" placeholder="Institution" style="border-color: 1px solid blue;height: 50px;width: 40%">
						
					<input  type="password" name="pass1" placeholder="Password" style="border-color: 1px solid blue;height: 50px;width: 40%">
										
					<input  type="password" name="pass2" placeholder="Confirm-Password" style="border-color: 1px solid blue;height: 50px;width: 40%">
					<br>
					<div style="background-color: #fff;margin-top: 20px;width: 80%;">
						<input type="checkbox" name="agree" class="checkbox">
						<i style="">By proceeding, I agree that campus-pilot or its representatives may contact me by email, phone, or SMS (including by automatic telephone dialing system) at the email address or number I provide, including for marketing purposes. I have read and understand the relevant Riders Privacy Statement.</i>
						
					</div>
						
					
					<input type="submit" class="btn btn-primary btn-block" name="submit" value="SIGNUP TO RIDE" style="border-color: 1px solid blue;height: 50px;width: 80%">	
					
					</div>

				</form>
		
</body>
</html>