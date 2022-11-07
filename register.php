<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Sohel Arman || PHP Raw Project</title>

    <!-- vendor css -->
    <link href="backend/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="backend/assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="backend/assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Sohel <span class="tx-info tx-normal">Arman</span></div>
        <div class="tx-center mg-b-60">Professional Web Developer</div>
        <?php 
      //Warning
        if (isset($_SESSION['warning'])) {
         ?>
          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>
              <?php 
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
               ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
       }
       ?>
        <?php 
      //Success
        if (isset($_SESSION['success'])) {
         ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>
              <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
               ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
       }
       ?>
        <form action="register_post.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter your Email">
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Enter your phone">
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
          </div><!-- form-group -->
          <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>

          <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="backend/assets/lib/jquery/jquery.js"></script>
    <script src="backend/assets/lib/popper.js/popper.js"></script>
    <script src="backend/assets/lib/bootstrap/bootstrap.js"></script>
    <script src="backend/assets/lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
