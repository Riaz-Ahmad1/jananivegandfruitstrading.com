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

  <title>Admin</title>

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
          <div class="row">
            <div class="col-md-12">
              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User's Messages</h1>
              </div>
              <!-- Content Row -->
              <table id="sampleTable" class="table table-sm table-responsive table-bordered">
                <thead>
                  <tr role="row">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message details</th>
                    <th> Date</th>
                    <th> Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  //	$s = 'select * from investment where id='.$id.'';
                  $s = "select * from messages";
                  $r = mysqli_query($db, $s);
                  while ($row = mysqli_fetch_assoc($r)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $subject = $row['subject'];
                    $msg = $row['msg'];
                    $status = $row['status'];
                    $created_at = $row['created_at'];
                  ?>
                    <tr id="row_541" role="row" class="even">
                      <td> <?php echo $name; ?> </td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $subject; ?></td>
                      <td><?php echo $msg; ?></td>
                      <td class="text-danger">
                        <?php
                        if ($created_at == true) {
                          echo date("d-M-Y", strtotime($created_at));
                        } else {
                          echo "N/A";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        if ($status == 1) {
                          echo " <a class='btn btn-sm btn-primary text-white' href='view_msg.php?read=$id'>
                               Unread
                              </a>";
                              echo "<a onclick=\"return confirm('Are you sure To Delete Record?')\" class='delete btn btn-sm btn-danger text-white' href='view_msg.php?delete=$id'>
                              <i class='fas fa-trash-alt'></i>
                            </a>";
                      
                      
                        ?>
                        <?php
                        } else {
                          echo " <a class='btn btn-sm btn-success text-white'>
                                <i class='fas fa-chevron-down'></i>
                                 Read
                                </a>";
                          echo " <a onclick=\"return confirm('Are you sure To Delete Record?')\" class='btn btn-sm btn-danger text-white' href='view_msg.php?delete=$id'>
                              <i class='fas fa-trash-alt'></i>
                              </a>";
                        }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
  if (isset($_GET['delete'])) {
    $deleteid = $_GET['delete'];
    $delete_query = "DELETE from messages where id='$deleteid'";
    $result =  mysqli_query($db, $delete_query);
    if ($result) {
      header('location:view_msg.php');
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

  <?php
  if (isset($_GET['read'])) {
    $requestid = $_GET['read'];
    $sql = "UPDATE messages set status='0' where id='$requestid'";
    $result =  mysqli_query($db, $sql);
    if ($result) {
      header('location:view_msg.php');
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
  <?php
  // hide after cv is seen
  if (isset($_GET['seen'])) {
    $requestid = $_GET['seen'];
    $sql = "UPDATE messages set seen='0' where id='$requestid'";
    $result =  mysqli_query($db, $sql);
    if ($result) {
      header('location:view_msg.php');
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
  <?php
  // seen all list on single click
  if (isset($_GET['allseen'])) {
    $requestid = $_GET['allseen'];
    $sql = "UPDATE messages set seen='0'";
    $result =  mysqli_query($db, $sql);
    if ($result) {
      header('location:view_msg.php');
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