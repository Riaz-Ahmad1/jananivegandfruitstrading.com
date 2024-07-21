
<?php
session_start();
include 'db.php';
// initializing variables
$username = "";
$email    = "";
$errors = array();
// LOGIN USER

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  //	$password = md5($password);
  	 $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: admin/dashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mdtourism</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
<style>
    body{
  background-color:cadetblue;
}
.error {
  width: 92%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}
.success {
  color: #3c763d;
  background: #dff0d8;
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
.col-md-6{
  background-image: url('images/loginimg.jpg');
}

</style>
    <?php
    include 'include/head.php';
    ?>

</head>

<body>

<div class="container-fluid contact py-6 ">
        <div class="container">
            <div class="row g-0">
                <div class="col-1">
                    <img src="img/images/i7.jpg" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
                <div class="col-10">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                        <div class="text-center">
                            <h1 class="display-5 mb-5">Admin Login</h1>
                        </div>
                        <?php  if (count($errors) > 0) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <?php foreach ($errors as $error) : ?>
                  <p><?php echo $error ?></p>
                    <?php endforeach ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             </div>
            <?php  endif ?>
                  <form method="post">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" name="username" class="form-control border-primary p-2" autocomplete="off" required placeholder="Username">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control border-primary p-2" placeholder="Password"required autocomplete="off">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="login_user" class="btn btn-primary px-5 py-3 rounded-pill">Submit Now</button>
                            </div>
                        </div>
                  </form>
                    </div>
                </div>
                <div class="col-1">
                    <img src="img/images/i7.jpg" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
            </div>
        </div>
    </div>
</body>

</html>