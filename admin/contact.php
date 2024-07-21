<?php
 include './db.php';
 $sql = "select * from contacts";
 $result =	mysqli_query($db, $sql);
 $check = mysqli_num_rows($result);
 if ($check>0) {
   while ($row=mysqli_fetch_assoc($result)) {
   $id = $row['id'];
   $mobile1 = $row['mobile1'];
   $mobile2 = $row['mobile2'];
   $email = $row['email'];
   $map = $row['map'];
 }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Dubai Fast Movers| Our Contacts</title>

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
                <h3 class="slide-sub-title text-primary" data-animation-in="slideInRight">OUR <span class="text-white" >CONTACTS</span> </h3>
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

<section id="main-container" class="main-container">
  <div class="container">

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <?php
            if ($check) {
            ?>
            <p class="info-box-subtitle">  <?php echo $mobile1 ?> </p>
            <?php
            } else {
            echo "Not Found";
            }
            ?>
          </div>
        </div>
      </div><!-- Col 3 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <?php
            if ($check) {
            ?>
            <p class="info-box-subtitle">  <?php echo $email ?> </p>
            <?php
            } else {
            echo "Not Found";
            }
            ?>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <?php
            if ($check) {
            ?>
            <p class="info-box-subtitle">  <?php echo $mobile2 ?> </p>
            <?php
            } else {
            echo "Not Found";
            }
            ?>
          </div>
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->

    <div class="gap-60"></div>

    <div class="google-map">
      <!-- <div id="map" class="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/marker.png" data-marker-name="Constra"></div> -->
      <?php
      if ($check) {
      ?>
      <iframe src="<?php echo $map ?>" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <?php
      } else {
      echo "Map Location Not Exist";
      }
      ?>

    </div>

    <div class="gap-40"></div>

    <div class="row">
      <div class="col-md-12">
<?php
// REGISTER USER
if (isset($_POST['submit'])) {
// receive all input values from the form
$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$msg = mysqli_real_escape_string($db, $_POST['msg']);
$subject = mysqli_real_escape_string($db, $_POST['subject']);

// Finally, send user if there are no errors in the form
$query = "INSERT INTO messages (name, email,msg,subject)
VALUES('$name', '$email','$msg','$subject')";
$result = mysqli_query($db, $query);
if ($result) {
// query successful
echo '<script language="javascript" type="text/javascript">
alert("Your Message Sent successfully");
header("location:contact.php");
</script>';
} else {
// query failed
echo '<script language="javascript" type="text/javascript">
alert("Request Failed, Try Again");
header("location:contact.php");
</script>';
}

}
 ?>
        <h3 class="column-title">We love to hear</h3>
        <!-- contact form works with formspree.io  -->
        <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
        <form id="contact-form" method="post">
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control form-control-name" name="name" id="name" placeholder=""autocomplete="off" type="text" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control form-control-email" name="email" id="email" placeholder=""autocomplete="off" type="email"
                  required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Subject</label>
                <input class="form-control form-control-subject" name="subject" id="subject" placeholder=""autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control form-control-message" name="msg" id="message" placeholder="" rows="10"
              required></textarea>
          </div>
          <div class="text-right"><br>
            <input type="submit" name="submit"class="btn btn-primary solid blank" value="Send Message">

          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  </div><!-- Body inner end -->
  </body>

  </html>
