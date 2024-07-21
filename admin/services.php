<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Dubai Fast Movers| Our Services</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/newlogo.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style media="screen">
  .quotebtn{
    display: initial;
    background-color: #23282d;
  }
  .quotebtn:hover{
    background-color: #ffb600;
  }
  .bt{
    display: inline-block;
    line-height: 1.5;
    text-transform: uppercase;
    padding: 15px 30px;
    font-size: 14px;
    font-weight: 900;
    color: #fff;
    background-color: #1d3052;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -ms-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
  }
  .bt:hover{
    color: #fff;
    background-color: #f69323;

  }
  .color{
    font-weight: 900;
    color: #f69323;
}
.subscribe-call-to-acton {
    min-height: 115px;
    padding: 14px 0 0 30px;
}

.price-value {
  color: #f69323;
    font-size: 58px;
    font-weight: 900;
    line-height: 50px;
}

.price span {
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    line-height: 1.625;
}
.pricing-features ul{
  display: inline;
}
.pricing-features li {
    padding: 0;
    margin: 0;
    font-size: 14px;
    color: secondary;
    list-style: circle;
}
.pricebtn {
    display: inline-block;
    line-height: 1.5;
    text-transform: uppercase;
    padding: 8px 18px;
    font-size: 14px;
    font-weight: 900;
    color: #fff;
    background-color: #1d3052;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -ms-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
}
</style>
</head>
<body>
  <div class="body-inner">
    <!--/ Topbar end -->
<!-- Header start -->
<?php include 'includes/header.php'; ?>
<!--/ Header end -->

<div class="banner-carousel banner-carousel-1 mb-0">
  <div class="banner-carousel-item" style="background-image:url(images/slider-main/slider4.jpg);height:300px">
    <div class="slider-content">
        <div class="container h-50">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h3 class="slide-sub-title text-primary" data-animation-in="slideInRight">OUR <span class="text-white" >SERVICES</span> </h3>
                <!-- <h2 class="slide-title text-secondary" data-animation-in="slideInLeft">When it's time to move out of your home or business, It's time to call <strong><span class="text-warning">Dubai Fast Movers</span></strong>  </h2> -->
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <!-- <a href="services.html" class="slider btn btn-primary">Our Services</a>
                    <a href="contact.html" class="slider btn btn-primary border">Contact Now</a> -->
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section id="main-container" class="main-container pb-4">
  <div class="container">
    <div class="row">
      <?php
      include './db.php';
      $sql = "select * from services";
      $result =	mysqli_query($db, $sql);
      $check = mysqli_num_rows($result);
      if ($check>0) {
      while ($row=mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $sname = $row['sname'];
      $simage = $row['simage'];

      ?>
      <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
        <div class="ts-team-wrapper">
          <div class="team-img-wrapper">
            <img loading="lazy" src="uploads/<?php echo $simage ?>" class="img-fluid" alt="team-img">
          </div>
          <div class="ts-team-content-classic">
            <h3 class="ts-name"><?php echo $sname ?></h3>
            <!--/ social-icons-->
          </div>
        </div>
        <!--/ Team wrapper 3 end -->
      </div><!-- Col end -->
      <?php
        }
        } else {
        echo "not found";
        }
        ?>


    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->



  <?php include 'includes/footer.php'; ?>
  <!-- Footer end -->
  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="plugins/shuffle/shuffle.min.js" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="plugins/google-map/map.js" defer></script>

  <!-- Template custom -->
  <script src="js/script.js"></script>

  </div><!-- Body inner end -->
  </body>

  </html>
