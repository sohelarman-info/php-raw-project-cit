<?php 
require 'db.php';
session_start();
//Settings
$settings         = "SELECT * FROM settings ORDER BY id DESC LIMIT 1";
$settings_query   = mysqli_query($db, $settings);
$settings_assoc   = mysqli_fetch_assoc($settings_query);
//header section
$header_section   = "SELECT * FROM header_section ORDER BY id DESC LIMIT 1";
$header_section_q = mysqli_query($db, $header_section);
$header_assoc     = mysqli_fetch_assoc($header_section_q);
//Footer section
$footer_section   = "SELECT * FROM footer_section ORDER BY id DESC LIMIT 1";
$footer_section_q = mysqli_query($db, $footer_section);
$footer_assoc     = mysqli_fetch_assoc($footer_section_q);
//Slider
$slider           = "SELECT * FROM slider ORDER BY id DESC LIMIT 1";
$slider_query     = mysqli_query($db, $slider);
//About
$about           = "SELECT * FROM about ORDER BY id DESC LIMIT 1";
$about_query     = mysqli_query($db, $about);
//Services
$services         = "SELECT * FROM services ORDER BY id DESC";
$services_query   = mysqli_query($db, $services);
//Projects
$projects         = "SELECT * FROM projects ORDER BY id DESC";
$projects_query   = mysqli_query($db, $projects);
//Testimonials
$testimonials         = "SELECT * FROM testimonials ORDER BY id DESC";
$testimonials_query   = mysqli_query($db, $testimonials);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>INNOVA</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox/default.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><img height="40px" src="upload/logo/<?php echo $settings_assoc['logo']; ?>" alt="<?php echo $settings_assoc['logo']; ?>"></a>
      <div class="phone"><span>
        <?php if (empty($header_assoc['call_today'])) {
        echo "Call Today";
      }else{
        echo mb_strimwidth($header_assoc['call_today'], 0, 20, ('...'));
      } ?>
      </span>
      <?php if (empty($header_assoc['phone1'])) {
        echo "xxx xxx xxx";
      }else{
        echo mb_strimwidth($header_assoc['phone1'], 0, 18, ('...'));
      } ?>
    </div>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll"><?php if (empty($header_assoc['section_1'])) {
        echo "About";
      }else{
        echo mb_strimwidth($header_assoc['section_1'], 0, 15, ('...'));
      } ?></a></li>
        <li><a href="#services" class="page-scroll"><?php if (empty($header_assoc['section_1'])) {
        echo "Services";
      }else{
        echo mb_strimwidth($header_assoc['section_2'], 0, 15, ('...'));
      } ?></a></li>
        <li><a href="#portfolio" class="page-scroll"><?php if (empty($header_assoc['section_1'])) {
        echo "Projects";
      }else{
        echo mb_strimwidth($header_assoc['section_3'], 0, 15, ('...'));
      } ?></a></li>
        <li><a href="#testimonials" class="page-scroll"><?php if (empty($header_assoc['section_1'])) {
        echo "Testimonials";
      }else{
        echo mb_strimwidth($header_assoc['section_4'], 0, 15, ('...'));
      } ?></a></li>
        <li><a href="#contact" class="page-scroll"><?php if (empty($header_assoc['section_1'])) {
        echo "Contact";
      }else{
        echo mb_strimwidth($header_assoc['section_5'], 0, 15, ('...'));
      } ?></a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>
<!-- Header -->
<header id="header">
          <?php 
            foreach ($slider_query as $key => $slider) {
          ?>
  <div class="intro" style="background: url(upload/slider/<?= $slider['image'] ?>) center center no-repeat; background-size: cover;">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1><?= $slider['title'] ?></h1>
            <p><?php echo mb_strimwidth($slider['content'], 0, 500,('...')) ?></p>
              <a href="#about" class="btn btn-custom btn-lg page-scroll">
              <?php 
              if (empty($slider['more'])) {
                echo "More";
              }else{
                echo mb_strimwidth($slider['more'], 0, 100,('...'));} 
              ?>
              </a> </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-1">
        <h3>Cost for your home renovation project</h3>
        <p>Get started today and complete our form to request your free estimate</p>
      </div>
      <div class="col-xs-12 col-md-4 text-center"><a href="#contact" class="btn btn-custom btn-lg page-scroll">Free Estimate</a></div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
       <?php 
            foreach ($about_query as $key => $about) {
          ?>
      <div class="col-xs-12 col-md-6"> <img style="height: 390px;width: 500px; border: 1px #ddd solid; padding: 4px; box-shadow: 0px 2px 8px 1px" src="upload/about/<?= $about['image'] ?>" class="assets/img-responsive" alt="<?= $about['image'] ?>"> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2><?= $about['title'] ?></h2>
          <p><?php echo mb_strimwidth($about['content'], 0, 1085,('...')) ?></p>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="section-title">
      <h2><?php if (empty($header_assoc['section_2'])) {
        echo "Services";
      }else{
        echo mb_strimwidth($header_assoc['section_2'], 0, 55, ('...'));
      } ?></h2>
    </div>
    <div class="row">
    <?php 
      foreach ($services_query as $key => $services) {
    ?>
      <div class="col-md-4 col-lg-4">
        <div class="service-media"> <img style="height: 200px; object-fit: cover; border: 1px #ddd solid; padding: 4px; box-shadow: 0px 2px 8px 1px" src="upload/services/<?= $services['image'] ?>" alt="<?= $services['image'] ?>"> </div>
        <div class="service-desc">
          <h3><a href="services-view.php?id=<?= $services['id'] ?>"><strong><?= $services['title'] ?></strong></a></h3>
          <p><?php echo mb_strimwidth($services['summary'], 0, 100) ?></p>
        </div>
    </div>
    <?php 
      }
     ?>
    </div>
    </div>
  </div>
</div>
<!-- Gallery Section -->
<div id="portfolio">
  <div class="container">
    <div class="section-title">
      <h2><?php if (empty($header_assoc['section_3'])) {
        echo "Our Works";
      }else{
        echo mb_strimwidth($header_assoc['section_3'], 0, 55, ('...'));
      } ?></h2>
    </div>
    <div class="row">
      <div class="portfolio-items">

        <?php 
          foreach ($projects_query as $key => $projects) {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="assets/img/portfolio/01-large.jpg" title="Project Title" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4><?= $projects['title'] ?></h4>
              </div>
              <img style="height: 200px; width: 500px; object-fit: cover; border: 1px #ddd solid; padding: 4px; box-shadow: 0px 2px 8px 1px" src="upload/projects/<?= $projects['image'] ?>" class="img-responsive" alt="<?= $projects['title'] ?>"> </a> </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- Testimonials Section -->
<div id="testimonials">
  <div class="container">
    <div class="section-title">
      <h2><?php if (empty($header_assoc['section_4'])) {
        echo "Testimonials";
      }else{
        echo mb_strimwidth($header_assoc['section_4'], 0, 55, ('...'));
      } ?></h2>
    </div>
    <div class="row">
      <?php 
      foreach ($testimonials_query as $key => $testimonials) {
      ?>
      <div class="col-md-4">
        <div class="testimonial">
          <div class="testimonial-image"> <img src="upload/testimonials/<?= $testimonials['image'] ?>" alt="<?= $testimonials['title'] ?>"> </div>
          <div class="testimonial-content">
            <p>"<?= $testimonials['content'] ?>"</p>
            <div class="testimonial-meta"> - <?= $testimonials['title'] ?> </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2><?php if (empty($header_assoc['section_5'])) {
        echo "Contacts";
      }else{
        echo mb_strimwidth($header_assoc['section_5'], 0, 55, ('...'));
      } ?></h2>
          <p><?php if (empty($footer_assoc['description'])) {
        echo "Please fill out the form below to send us an email and we will get back to you as soon as possible.";
      }else{
        echo mb_strimwidth($footer_assoc['description'], 0, 100, ('...'));
      } ?></p>
        </div>
        <?php 
          if (isset($_SESSON['msg'])) {
           echo $_SESSION['msg'];
           unset($_SESSION['msg']) ;
          }
         ?>
        <!-- Contact Form -->
        <form action="contact_message.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required="1">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="1">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" class="form-control" rows="4" placeholder="Message" required="1"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>

      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h4><?php if (empty($header_assoc['section_5'])) {
        echo "Contacts";
      }else{
        echo mb_strimwidth($header_assoc['section_5'], 0, 55, ('...'));
      } ?></h4>
        <p><span>Address</span><?php echo $footer_assoc['address']; ?></p>
      </div>
      <div class="contact-item">
        <p><span>Phone</span> <?php echo $footer_assoc['phone']; ?></p>
      </div>
      <div class="contact-item">
        <p><span>Email</span> <?php echo $footer_assoc['email']; ?></p>
      </div>
      <div class="contact-item">
        <p><span>Login</span><a href="login.php">Login</a></p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="//<?php echo $footer_assoc['link1']; ?>"><i class="<?php echo $footer_assoc['icon1']; ?>"></i></a></li>
            <li><a href="//<?php echo $footer_assoc['link2']; ?>"><i class="<?php echo $footer_assoc['icon2']; ?>"></i></a></li>
            <li><a href="//<?php echo $footer_assoc['link3']; ?>"><i class="<?php echo $footer_assoc['icon3']; ?>"></i></a></li>
            <li><a href="//<?php echo $footer_assoc['link4']; ?>"><i class="<?php echo $footer_assoc['icon4']; ?>"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 INNOVA. Design by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.js"></script> 
<script type="text/javascript" src="assets/js/SmoothScroll.js"></script> 
<script type="text/javascript" src="assets/js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="assets/js/jqBootstrapValidation.js"></script> 
<!-- <script type="text/javascript" src="assets/js/contact_me.js"></script> --> 
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>