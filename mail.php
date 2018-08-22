<?php 
$email = 'johnsonmessilo19@gmail.com';
$subject = 'Welcome';
$message = "
 <div class='container' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <div class='row' style='color:black;font-size:30px;color:black;font-family:arial;'>
    <p>Hello $email,</p>
      <div class='col'>  
<br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>Congratulations!!Your 
busness/service has been successfully verified on Yourhomefuto!.After all validation your service spoke for itself.
Also we have created an account for you where you would manage your business profile.
Your login details are as follows:
<br>
Login here: <a href='www.yourhomefuto.com.ng/services/admins/login?email=$email'>Login</a>

<br>
For more information ,send us an email at <a href=mailto:csyhf@yourhomefuto.com.ng>csyhf@yourhomefuto.com.ng</a>.
<br>
<h5>
ceofred,
Founder,yourhomefuto.
</h5>
</p>
<br> <br>
<p style='color:black;font-size:30px;color:black;font-family:arial;'>For additional help, visit our<a href='https://yourhomefuto.com.ng/contact.php'>Support Center</a></p>
      </div>
    </div>


  </div>";
if(mail($email,$subject,$message )){
	echo "sent";
}else{
	echo "not sent";
}

 ?>