<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require 'inc/header.php'; ?>
    <meta charset="utf-8">
    <title>Booking for <?php echo $_GET['ln']; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include 'inc/nav.php'; ?>
<div class="container-fluid">
  <div class="row">
    <h4 style="border:1px solid grey;border-radius:10px;padding:10px;margin:10px;">1</h4>
    <div class="col-md-4">
      </div>
  </div>
</div>
    <?php
    require 'inc/footer.php';
     ?>

  </body>
</html>
