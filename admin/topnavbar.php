<?php include 'db.php'; ?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" target="_blank" href="../index.php">Go To Website</a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter" id="noti_numberr">
                    <?php
                    $s = "select * from messages where status='1' and seen='1' limit 3";
                    $r = mysqli_query($db, $s);
                    $check = mysqli_num_rows($r);
                    if ($check > 0) {
                        echo $check;
                    } else {
                        echo "0";
                    }
                    ?>
                </span>
            </a>
            <!-- Dropdown - Messagers -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    New Messages
                </h6>
                <?php
                $s = "select * from messages where status='1' and seen='1' limit 3";
                $r = mysqli_query($db, $s);
                $check = mysqli_num_rows($r);
                if ($check > 0) {
                    while ($row = mysqli_fetch_assoc($r)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $subject = $row['subject'];
                        $msg = $row['msg'];
                        $status = $row['status'];
                        $created_at = $row['created_at'];
                ?>
                        <a class="dropdown-item d-flex align-items-center" href="view_msg.php?seen=<?php echo $id; ?>">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500"><?php echo $created_at ?></div>
                                <span class="font-weight-bold"><?php echo $name; ?></span>
                                <div class="small text-gray-500"><?php echo $subject ?></div>
                            </div>
                        </a>
                    <?php } ?>
                    <a class="dropdown-item text-center small text-gray-500" href="view_msg.php?allseen">Show All Messages</a>
                <?php
                } else {
                ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <span class="font-weight-bold">Not Found</span>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="view_msg.php">Show All Messages</a>
                <?php
                }
                ?>

            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <!-- logged in user information -->

            <?php if (isset($_SESSION['username'])) : ?>
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?php echo $_SESSION['username']; ?></span>
                    <img class="img-profile rounded-circle" src="../img/user.png">
                </a>
            <?php endif ?>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>