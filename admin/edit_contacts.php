
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

    <title>dubaifastlymovers.com- Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                          <h1 class="h3 mb-0 text-gray-800">Edit Contacts </h1>
                          <a href="view_contacts.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-eye fa-sm text-white-50"></i> View Contacts</a>
                      </div>

                      <!-- Content Row -->
                      <div class="row">

                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                  <form class="" method="post"name="theform"enctype='multipart/form-data'>
                                  <?php
                                    // initializing variables
                                    $mobile1 = "";
                                    $mobile2    = "";
                                    $map    = "";

                                    // connect to the database
                                    // uncomment below database connection to proceed its working other it will create error
                                    // $db = mysqli_connect('localhost', 'root', '', 'scljobportal');

                                    // REGISTER USER
                                    if (isset($_POST['update_data'])) {
                                      // receive all input values from the form
                                      $id = mysqli_real_escape_string($db, $_POST['id']);
                                      $mobile1 = mysqli_real_escape_string($db, $_POST['mobile1']);
                                      $mobile2 = mysqli_real_escape_string($db, $_POST['mobile2']);
                                      $email = mysqli_real_escape_string($db, $_POST['email']);
                                      $map = mysqli_real_escape_string($db, $_POST['map']);
                                      // Finally, send data into table

                                       $query = "UPDATE contacts SET mobile1='$mobile1',mobile2='$mobile2',email='$email',map='$map' where id='$id'";
                                       $result =	mysqli_query($db, $query);
                                       if ($result) {

                                           echo '
                                             <div class="alert alert-success  alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                             <strong> Data Updated Successfully </strong>
                                             </div>
                                             ';
                                            header('Refresh:2,url=view_contacts.php');
                                           }else{
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
                                        if(isset($_GET['edit_contacts'])){
                                         $id = $_GET['edit_contacts'];
                                         $sql = "select * from contacts where id='$id'";
                                         $result =	mysqli_query($db, $sql);
                                         $check = mysqli_num_rows($result);
                                           while ($row=mysqli_fetch_assoc($result)) {
                                           $id = $row['id'];
                                            $mobile1 = $row['mobile1'];
                                           $mobile2 = $row['mobile2'];
                                           $email = $row['email'];
                                           $map = $row['map'];

                                         }
                                        }
                                       ?>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="inputEmail4"class="formlabel">mobile1 <span class="text-danger"> * </span> </label>
                                          <input type="hidden"name="id" class="form-control form-control-sm" value="<?php echo $id; ?>" placeholder=""required>
                                          <input type="text"name="mobile1" class="form-control form-control-sm" value="<?php echo $mobile1; ?>" placeholder=""required>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputEmail4"class="formlabel">mobile2 <span class="text-danger"> * </span> </label>
                                          <input type="text"name="mobile2" class="form-control form-control-sm" value="<?php echo $mobile2; ?>" placeholder=""required>
                                        </div>
                                       </div>
                                       <div class="col-md-4">
                                         <div class="form-group">
                                           <label for="inputEmail4"class="formlabel">Email <span class="text-danger"> * </span> </label>
                                           <input type="email"name="email" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder=""required>
                                         </div>
                                        </div>
                                       <div class="col-md-4">
                                         <div class="form-group">
                                           <label for="inputEmail4"class="formlabel">map <span class="text-danger"> * </span> </label>
                                           <textarea name="map" rows="8" cols="80"class="form-control form-control-sm"required><?php echo $map; ?></textarea>
                                         </div>
                                        </div>
                                    </div> <!--1st row-->
                                      <hr>
                                    <div class="form-group text-right">
                                    <input type="submit"name="update_data" class="btn btn-sm btn-warning shadow-sm"value="Update">
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
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

</body>
</html>
