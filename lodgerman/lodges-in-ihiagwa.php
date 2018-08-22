          <?php

          session_start();
          if (isset($_GET['Location'])) {

          require '../inc/dbh.inc.php';
          $location = mysqli_real_escape_string($conn,$_GET['Location']);
          require 'classoop.php';
          $lodgeobj = new gen;
          $sql = "SELECT * FROM lodger_man WHERE lodge_location = '$location' ;";
          if ($query = $lodgeobj->query($sql)) {
          $total = mysqli_num_rows($query);

          }else {

          }

          }
          ?>
          <!DOCTYPE html>
          <html>
          <head>
          <title>Lodges in Ihiagwa,FUTO - Lodgerman</title>
          <?php
          require 'inc/header.php';
          ?>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


          </head>
          <body>

          <style type="text/css">
          .breadcrumb-arrow {
          height: 36px;
          padding: 0;
          line-height: 36px;
          list-style: none;
          background-color: #e6e9ed
          }
          </style>
          <?php require'inc/nav.php'; ?>

          <div>
          <div>

          <?php

          require 'inc/dbh.inc.php';
          if (isset($_GET['Location'])) {
          $lodgername =    mysqli_real_escape_string($conn,$_GET['Location']);
          }
          ?>
          <!-- breadcrumbs -->
          <ol class="breadcrumb">
          <li><a href="index" style="color: black;padding-right: 10px;">Home >> </a></li>
          <li><a href="#" style="color: black">Ihiagwa(<?php echo $total; ?>)Lodges </a></li>
          </ol>
          </div>


          </div>
          <div class="container-fluid">


          <div class="row">

          <?php
          $sql = "SELECT * FROM lodger_man WHERE lodge_location = '$location';";
          $res = mysqli_query($conn, $sql);
          while ($r = mysqli_fetch_assoc($res)) {

          ?>
          <div class="col-sm-12 col-md-4">

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
          <p>
                <p style="padding:5px;"><i class="fa fa-map-marker" style="font-size: 20px;"></i> <?php echo $r['lodge_location']; ?></p>

                <p style="padding:5px;"><i class="fa fa-road" style="font-size: 20px;"></i> <?php echo $r['distance_from_school']; ?></p>

          <p style="padding:5px;"><i class="fa fa-money" style="font-size: 20px;"></i>
          <?php echo $r['price'] ?></p>

          </p>
          <div class="btn-block" role="group" align="center" style="margin:20px;">
         
<a style="color: black;" href="lodge?lodger_man_id=<?php echo($r['lodger_man_id']); ?>" class="btn btn-primary "><i class="fa fa-eye"></i>View</a>
<a class=" btn btn-secondary disabled"><i class="fa fa-book"></i>Book</a>

<a href="https://wa.me/?text=Check out lodges in Ihiagwa,Futo now on yourhomefuto.com.ng/lodgerman/lodge?lodger_man_id=<?php echo($r['lodger_man_id']); ?>" class=" btn btn-success"><i class="fa fa-whatsapp"></i>Share


</a>
          </div>

          </div>
          </div>

          <br>
          </div>

          <?php } ?>
          </div>

          <!-- <div class="row" class="">
          <div class="col-md-3 col-sm-12 d-none d-md-block">
          <div class="card" style="padding: 30px;">
          <div class="card-boy">

          </div>
          </div>
          </div>
          <div class="col-md-9 col-sm-12">
          -->
          <!--- <div class="d-none d-md-block">
          <h5>199 Lodges in Umuchima</h5>

          <nav style="background-color: #3d5c5c;padding: 10px;color: #fff;">
          Sort Lodges By: <i><input type="radio" name="our_recomendation"> Our Recomendations</i>
          <i><input type="radio" name="Most_expensive">Most Expensive</i>
          <i><input type="radio" name="Most_popular">Most Popular</i>
          <i><input type="radio" name="Less_expensive">Less Expensive</i>
          <a href="" class="btn btn-primary" style="border-radius: 0px;width: 100px;height: 30px;">Sort</a>
          </nav>

          </div>
          -->
          </div>

          </div>

          </div>

          <?php
          require 'inc/footer.php';

          ?>
          </body>
          </html>
