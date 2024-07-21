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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">View Team
              <kbd>
                <?php
                $s = "select * from team";
                $query = mysqli_query($db, $s);
                $count2 = mysqli_num_rows($query);
                if ($count2 > 0) {
                  echo $count2;
                } else {
                  echo "0";
                }
                ?>
              </kbd>
            </h1>
            <a href="add_team.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Add Team</a>
          </div>
          <!-- Content Row -->
          <table id="sampleTable" class="table table-bordered table-hover">
            <thead>
              <tr role="row">
                <th>Name</th>
                <th>Image</th>
                <th>Designation</th>
                <th> Delete</th>
                <th> Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s = "select * from team";
              $r = mysqli_query($db, $s);
              while ($row = mysqli_fetch_assoc($r)) {
                $id = $row['id'];
                $name = $row['name'];
                $picture = $row['picture'];
                $designation = $row['designation'];

                $created_at = $row['created_at'];
              ?>
                <tr id="row_541" role="row" class="even">
                  <td> <?php echo $name; ?> </td>
                  <td> <a href="../uploads/team/<?php echo $picture; ?>" target="_blank"> <img src="../uploads/team/<?php echo $picture; ?>" height="50px" width="50px"> </a> </td>
                  <td> <?php echo $designation; ?> </td>

                  <td>
                    <a onclick="return confirm('Are you sure To Delete Record?')" class='delete btn btn-sm btn-danger text-white' href='view_team.php?delete=<?php echo $id ?>'>
                      delete
                    </a>
                  </td>
                  <td>
                    <a class='btn btn-sm btn-warning text-white' href='edit_team.php?edit_team=<?php echo $id ?>'>
                      Edit
                    </a>
                  </td>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- End of Footer -->

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
    $delete_query = "DELETE from team where id='$deleteid'";
    $result =  mysqli_query($db, $delete_query);
    if ($result) {
      $path = "../uploads/team/$picture";
      if (@unlink($path));
      header('location:view_team.php');
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

</body>

</html>