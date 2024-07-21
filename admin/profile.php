<?php
include 'session.php';
include 'db.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
     $s = "select * from admin where username='$username'";
    $query = mysqli_query($db, $s);
    $check = mysqli_num_rows($query);
    if ($check > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $idd = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
        }
    } else {
        echo "not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topnavbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Admin </h1>
                    </div>

                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-80"> username : <?php echo $username; ?> </div>
                                            <hr>
                                            <div class="h5 mb-0 font-weight-bold text-gray-80"> Password : <?php echo $password; ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-80"> Change Password </div>
                                            <?php
                                            if (isset($_POST['update_data'])) {
                                                $pass = $_POST["password"];
                                                //  $pass=md5($pass);

                                               $q = "UPDATE admin set password='$pass' where id='$idd'";
                                                $result = mysqli_query($db, $q) or die("Error " . mysqli_error($db));
                                                if ($result) {
                                                    echo '
                                                     <div class="alert alert-success  alert-dismissible">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                     <strong> changes saved Successfully </strong>
                                                     </div>
                                                     ';
                                                    header('Refresh:1,url=profile.php');
                                                } else {
                                                    echo '
                                                      <div class="alert alert-danger  alert-dismissible">
                                                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong> Query Failed </strong>
                                                      </div>
                                                      ';
                                                }
                                            }
                                            ?>
                                            <form class="" method="post" name="theform">
                                                <div class="form-group">
                                                    <hr>
                                                    <label for="inputEmail4" class="formlabel">New Password <span class="text-danger"> * </span> </label>
                                                    <input type="password" name="password" onKeyup="checkform()" class="form-control" value="" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="submit" name="update_data" id="submitbutton" disabled="disabled" class="btn btn-sm btn-warning" value="Update">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; mdtourism.com</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--Enable and disable untill form fields are not filled -->
    <script type="text/javascript" language="javascript">
        function checkform() {
            var f = document.forms["theform"].elements;
            var cansubmit = true;
            for (var i = 0; i < f.length; i++) {
                if (f[i].value.length == 0) cansubmit = false;
            }
            if (cansubmit) {
                document.getElementById('submitbutton').disabled = false;
            } else {
                document.getElementById('submitbutton').disabled = 'disabled';
            }
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">   
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</body>

</html>