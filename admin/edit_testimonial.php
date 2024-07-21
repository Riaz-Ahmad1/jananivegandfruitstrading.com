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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Team Member</h1>
                        <a href="view_team.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> View Team</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <form class="" method="post" name="theform" enctype='multipart/form-data'>
                                        <?php
                                        // initializing variables
                                        $name = "";
                                        $profession    = "";
                                        $pic    = "";
                                        $comment    = "";

                                        // connect to the database
                                        // uncomment below database connection to proceed its working other it will create error
                                        // $db = mysqli_connect('localhost', 'root', '', 'scljobportal');

                                        // REGISTER USER
                                        if (isset($_POST['update_data'])) {
                                            // receive all input values from the form
                                            $id = mysqli_real_escape_string($db, $_POST['id']);
                                            $name = mysqli_real_escape_string($db, $_POST['name']);
                                            $profession = mysqli_real_escape_string($db, $_POST['profession']);
                                            $comment = mysqli_real_escape_string($db, $_POST['comment']);
                                            // Finally, send data into table

                                            $query = "UPDATE testimonial SET name='$name',profession='$profession',comment='$comment' where id='$id'";
                                            $result =    mysqli_query($db, $query);
                                            if ($result) {

                                                $pic = $_FILES['pic']['name'];
                                                $target_dirr = "../uploads/testimonial/";
                                                $target_file = $target_dirr . basename($_FILES["pic"]["name"]);
                                                move_uploaded_file($_FILES['pic']['tmp_name'], $target_dirr . $pic);

                                                if (empty($pic)) {
                                                    // getting old pic from employees table
                                                    $query = "SELECT * FROM testimonial where id=$id";
                                                    $result = $db->query($query);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $pic = $row['pic'];
                                                        }
                                                    }
                                                    $pic = $pic;
                                                    $s = "UPDATE testimonial set pic='$pic' where id='$id'";
                                                    $result =    mysqli_query($db, $s);
                                                } else {
                                                    $s = "UPDATE testimonial set pic='$pic' where id='$id'";
                                                    $result =    mysqli_query($db, $s);
                                                }

                                                echo '
                                             <div class="alert alert-success  alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                             <strong> Data Updated Successfully </strong>
                                             </div>
                                             ';
                                                header('Refresh:2,url=view_testimonial.php');
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
                                        <!-- Getting data of specific id-->
                                        <?php
                                        if (isset($_GET['edit_team'])) {
                                            $id = $_GET['edit_team'];
                                            $sql = "select * from testimonial where id='$id'";
                                            $result =    mysqli_query($db, $sql);
                                            $check = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $profession = $row['profession'];
                                                $pic = $row['pic'];
                                                $comment = $row['comment'];
                                            }
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputEmail4" class="formlabel">Name <span class="text-danger"> * </span> </label>
                                                    <input type="hidden" name="id" class="form-control form-control-sm" value="<?php echo $id; ?>" placeholder="" required>
                                                    <input type="text" name="name" class="form-control form-control-sm" value="<?php echo $name; ?>" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputEmail4" class="formlabel">profession <span class="text-danger"> * </span> </label>
                                                    <input type="text" name="profession" class="form-control form-control-sm" value="<?php echo $profession; ?>" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <a href="../uploads/testimonial/<?php echo $pic ?>">
                                                        <img class="img-rounded zoom" src="../uploads/testimonial/<?php if ($pic) {
                                                                                                                        echo $pic;
                                                                                                                    } else {
                                                                                                                        echo 'image not found';
                                                                                                                    } ?>" alt="" width="40px" height="40px">
                                                    </a>
                                                    <label for="inputEmail4" class="formlabel">pic <span class="text-danger"> * </span> </label>
                                                    <input type="file" name="pic" class="form-control form-control-sm" value="<?php echo $pic; ?>" placeholder="">
                                                </div>
                                            </div>
                                        </div> <!--1st row-->
                                        <div class="row">
                                            <textarea name="comment" id="comment" class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="4" cols="10" placeholder="Your Message">
                                                <?php echo $comment; ?>
                                            </textarea>

                                        </div>
                                        <hr>
                                        <div class="form-group text-right">
                                            <input type="submit" name="update_data" class="btn btn-sm btn-warning shadow-sm" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; dubaifastlymovers.com</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>