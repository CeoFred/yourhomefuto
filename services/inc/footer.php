<footer class="fixed" style="font-family: 'nunito','sans-serif';color: white;background-color:black;margin-top:0px;">
    <div class="container">
        <div class="row" >


          <div class="col-md-3 d-none d-md-block" style="margin-top: 40px;">
          <p>Company</p>
          <hr>
          <p>Blog</p>
          <p>About Us</p>
          <p>Job Openings</p>
          <p>Privacy and Policy</p>
          <p>Terms of service</p>
          <p>How we work</p>  
          </div>

          <div class="col-md-3 d-none d-md-block" style="margin-top: 40px;">
            <p>Community</p>
            <hr>
<p>Twitter</p>
<p>Facebook</p>
<p>Instagram</p>
<p>Google</p>
<p>Pinterest</p>
<p>Youtube</p>
<p>Apartments</p>
          </div>
                    <div class="col-md-3 d-none d-md-block" style="margin-top: 40px;">
            <p>Top Services</p>
            <hr>

            <?php 
require 'inc/dbh.inc.php';

$sql = "SELECT * FROM services ORDER BY visit_count1 DESC";
$and = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($and)) {?>

<p><?php echo $row['name']; ?>
</p>
  

  <?php
}
             ?><!-- 
            <p>Rebirth Concept Bakery</p>
            <p>Campus Pilot</p>
            <p>Mosala Phones</p>
            <p>I'cent Accesories</p> -->
          </div>
          <div class="col-md-3 d-none d-md-block" style="margin-top: 40px;">
              <h5>Contacts</h5>
              <hr>
              <p><i class="fa fa-phone"></i> 0902320233</p>
              <p ><i class="fa fa-envelope"></i> Email </p>
          </div>
        </div>



    <div style="text-align: center;">
  Copyright © 2018 - Yourhomefuto.com.ng/services. All rights reserved
  
    </div>
    </div>
    </footer>
