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
            <h1 class="h5 mb-0 text-gray-800">View Contacts
              <kbd>
                <?php
                $s = "select * from contacts";
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
            <a href="add_contacts.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Add Contacts</a>
          </div>
          <!-- Content Row -->
          <table id="sampleTable" class="table table-striped table-responsive  table-bordered table-hover">
            <thead>
              <tr role="row">
                <th>mobile1</th>
                <th>mobile2</th>
                <th>email</th>
                <th>Address</th>
                <th> Delete</th>
                <th> Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $s = "select * from contacts";
              $r = mysqli_query($db, $s);
              while ($row = mysqli_fetch_assoc($r)) {
                $id = $row['id'];
                $mobile1 = $row['mobile1'];
                $mobile2 = $row['mobile2'];
                $email = $row['email'];
                $map = $row['map'];

              ?>
                <tr id="row_541" role="row" class="even">
                  <td> <?php echo $mobile1; ?> </td>
                  <td> <?php echo $mobile2; ?></td>
                  <td> <?php echo $email; ?></td>
                  <td><?php echo substr($map, 0, 25); ?>...</td>

                  <td>
                    <a onclick="return confirm('Are you sure To Delete Record?')" class='delete btn btn-sm btn-danger text-white' href='view_contacts.php?delete=<?php echo $id ?>'>
                      <i class='fas fa-trash-alt'></i>
                    </a>
                  </td>
                  <td>
                    <a class='btn btn-sm btn-warning text-white' href='edit_contacts.php?edit_contacts=<?php echo $id ?>'>
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
    $delete_query = "DELETE from contacts where id='$deleteid'";
    $result =  mysqli_query($db, $delete_query);
    if ($result) {
      header('location:view_contacts.php');
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">   
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</body>

</html>