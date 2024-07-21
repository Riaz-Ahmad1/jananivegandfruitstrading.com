<?php
include 'session.php'; // session
include 'db.php'; // database connectioin
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
    <style media="screen">
        @media only screen and (min-width: 375px) and (max-width: 575px) {
            .d-none {
                display: flex !important;
            }

            .d-none i {
                display: none;
            }
        }
    </style>
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
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <h1 class="h5 mb-0 text-gray-800">Events Gallary</h1>
                                    <form class="" method="post" name="theform" enctype='multipart/form-data'>
                                        <?php
                                        // initializing variables
                                        $pic    = "";
                                        if (isset($_POST['save_data'])) {
                                            $pic = $_FILES['pic']['name'];

                                            $target_dirr = "../uploads/gallary/";
                                            $target_file = $target_dirr . basename($_FILES["pic"]["name"]);
                                            move_uploaded_file($_FILES['pic']['tmp_name'], $target_dirr . $pic);
                                            // Finally, send data into table

                                            $query = "INSERT INTO gallary(pic)VALUES('$pic')";
                                            $result =  mysqli_query($db, $query);
                                            if ($result) {
                                                echo '
                            <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> Data Saved Successfully </strong>
                            </div>
                            ';
                                                header('Refresh:1,url=gallary.php');
                                            } else {
                                                echo '
                                              <div class="alert alert-danger  alert-dismissible">
                                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <strong> Query Failed </strong>
                                              </div>
                                              ';
                                            }
                                        }

                                        // ...
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6 offset-3">
                                                <div class="form-group">
                                                    <label for="inputEmail4" class="formlabel">Gallary Picture <span class="text-danger"> * </span> </label>
                                                    <input type="file" name="pic" class="form-control form-control-sm" value="<?php echo $pic; ?>" placeholder="" required>
                                                </div>
                                                <div class="form-group text-right">
                                                    <input type="submit" name="save_data" class="btn btn-sm btn-primary shadow-sm" value="Save">
                                                </div>
                                            </div>
                                        </div> <!--1st row-->
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <table id="sampleTable" class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th> Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s = "select * from gallary";
                                $r = mysqli_query($db, $s);
                                while ($row = mysqli_fetch_assoc($r)) {
                                    $id = $row['id'];
                                    $pic = $row['pic'];

                                    $created_at = $row['created_at'];
                                ?>
                                    <tr id="row_541" role="row" class="even">
                                        <td> <a href="../uploads/gallary/<?php echo $pic; ?>" target="_blank"> <img src="../uploads/gallary/<?php echo $pic; ?>" height="50px" width="50px"> </a> </td>
                                        <td>
                                            <a onclick="return confirm('Are you sure To Delete Record?')" class='delete btn btn-sm btn-danger text-white' href='gallary.php?delete=<?php echo $id ?>'>
                                                <i class='fas fa-trash-alt'></i>
                                            </a>
                                        </td>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <?php
  if (isset($_GET['delete'])) {
    $deleteid = $_GET['delete'];
    $delete_query = "DELETE from gallary where id='$deleteid'";
    $result =  mysqli_query($db, $delete_query);
    if ($result) {
      $path = "../uploads/gallary/$pic";
      if (@unlink($path));
      header('location:gallary.php');
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</body>

</html>