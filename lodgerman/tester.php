
<div class="row">

        <?php
          $sql = "SELECT * FROM services";
          $res = mysqli_query($conn, $sql);
          while ($r = mysqli_fetch_assoc($res)) {
            if($r['verified'] == true){
              $_SESSION['s_name'] = $r['email'];
              $_SESSION['verified'] = '
  <span><H6>VERIFIED SERVICE <i class="fa fa-thumbs-up" style="color:green;font-size:30px; "></i></H6></span>';

            }
            elseif ($r['verified'] == false) {
              $_SESSION['verified'] = '
  <span><H6>SERVICE NOT VERIFIED<i class="fa fa-thumbs-down" style="color:red;font-size:30px; "></i></H6></span>';
            }

        ?>

<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6" style="background-color: #fff;margin: 5px;border-radius: 7px;">
  <img src="<?php if (!empty($r['image_path']))

  {echo $r['image_path'];

} else echo 'img/service.png';  ?>" height="200" width="100%" style="border-radius: 6px;">
<br>
  <div><i class="fa fa-at" style="color:#66CDAA;"></i> <?php echo $r['name']; ?></div>
  <div><i class="fa fa-location-arrow" style="color:#66CDAA;"></i> <?php echo $r['location']; ?></div>
  <div><i class="fa fa-sticky-note" style="color:#66CDAA;"></i> <?php echo substr($r['Description'], 0, 60)."..."; ?></div>
  <div><i class="fa fa-certificate" style="color:#66CDAA;"></i> <?php echo $r['category']; ?></div>
  <a href="tel: <?php echo $r['contact']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-phone"></i>Phone</a>

  <a href=":https://wa.me/?text=Check%20Out%20my%20Service%20on%20yourhomefuto.com.ng%20Service-name%20<?php echo $r['name']; ?>%20link=yourhomefuto.com.ng/services/service?name=<?php echo $r['name']; ?>%20Create%20yours200%here20%yourhomefuto.com.ng/services/add-a-service?iv" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i>Share</a>
  <a href="service?name=<?php echo $r['name']; ?>" class="btn btn-primary btn-sm">View</a>
<?php
echo $_SESSION['verified'];
?>
<hr>
</div>
        <?php } ?>
</div>
<div class="row">

        <?php
          $sql = "SELECT * FROM services";
          $res = mysqli_query($conn, $sql);
          while ($r = mysqli_fetch_assoc($res)) {
            if($r['verified'] == true){
              $_SESSION['s_name'] = $r['email'];
              $_SESSION['verified'] = '
  <span><H6>VERIFIED SERVICE <i class="fa fa-thumbs-up" style="color:green;font-size:30px; "></i></H6></span>';

            }
            elseif ($r['verified'] == false) {
              $_SESSION['verified'] = '
  <span><H6>SERVICE NOT VERIFIED<i class="fa fa-thumbs-down" style="color:red;font-size:30px; "></i></H6></span>';
            }

        ?>

<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6" style="background-color: #fff;margin: 5px;border-radius: 7px;">
  <img src="<?php if (!empty($r['image_path']))

  {echo $r['image_path'];

} else echo 'img/service.png';  ?>" height="200" width="100%" style="border-radius: 6px;">
<br>
  <div><i class="fa fa-at" style="color:#66CDAA;"></i> <?php echo $r['name']; ?></div>
  <div><i class="fa fa-location-arrow" style="color:#66CDAA;"></i> <?php echo $r['location']; ?></div>
  <div><i class="fa fa-sticky-note" style="color:#66CDAA;"></i> <?php echo substr($r['Description'], 0, 60)."..."; ?></div>
  <div><i class="fa fa-certificate" style="color:#66CDAA;"></i> <?php echo $r['category']; ?></div>
  <a href="tel: <?php echo $r['contact']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-phone"></i>Phone</a>

  <a href=":https://wa.me/?text=Check%20Out%20my%20Service%20on%20yourhomefuto.com.ng%20Service-name%20<?php echo $r['name']; ?>%20link=yourhomefuto.com.ng/services/service?name=<?php echo $r['name']; ?>%20Create%20yours200%here20%yourhomefuto.com.ng/services/add-a-service?iv" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i>Share</a>
  <a href="service?name=<?php echo $r['name']; ?>" class="btn btn-primary btn-sm">View</a>
<?php
echo $_SESSION['verified'];
?>
<hr>
</div>
        <?php } ?>
</div>
