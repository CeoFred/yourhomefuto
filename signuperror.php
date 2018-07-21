<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>SignUp Error</title>

    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <?php
    include('inc/header.php');
     ?>
</head>
<body style="font-family:'Raleway', sans-serif;">
<?php

?>
<?php if(isset($_SESSION['sub_error'])){ ?>
        <div class="error" style="background-color: rgba(244,0,0,0.08);text-align: center;font-size: 1.2em;padding: 10px;margin-top: 50px;height: 400px;">
          <i class="fa fa-thumbs-down" style="font-size: 30px;"></i>
          <h4>Hello user, Your signup was not successful because of the following reasons:</h4>
          <?php echo $_SESSION['sub_error'];unset($_SESSION['sub_error']); ?>
          Return back to <a href="index">signup</a>
        </div>
      <?php
        }
      ?>
      <footer>
        <h6>Error messages powered by do-media</h6>

      </footer>
      <?php
include('inc/footer.php');
        ?>
</body>
</html>
