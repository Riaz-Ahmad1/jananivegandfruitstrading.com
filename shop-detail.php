<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Product Detail</title>
        <?php include "include/head.php"; ?>
    </head>

    <body>

      <?php include "include/header.php"; ?>


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop Detail</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-white">Shop Detail</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
         <?php 
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            $s = "select * from services where id='$id'";
            $r = mysqli_query($db, $s);
            while ($row = mysqli_fetch_assoc($r)) {
                $id = $row['id'];
                $sname = $row['sname'];
                $simage = $row['simage'];
                $price = $row['price'];
                $catego = $row['scateg'];
         }
        }



         ?>

        <!-- Single Product Start -->
        <div class="container-fluid ">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="uploads/service/<?php echo $simage; ?>" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"><?php echo $sname;?></h4>
                                <p class="mb-3">Category: <?php echo $catego;?></p>
                                <!-- <h5 class="fw-bold mb-3">3,35 $</h5> -->
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>For Order call Us</p>
                                <h5 class="fw-bold mb-3"> 03045753524 </h5>
                                <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Order Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <h4 class="mb-4">Related products</h4>
                               <?php 
                                 $s = "select * from services limit 3";
                                 $r = mysqli_query($db, $s);
                                 while ($row = mysqli_fetch_assoc($r)) {
                                     $id = $row['id'];
                                     $sname = $row['sname'];
                                     $simage = $row['simage'];
                                     $price = $row['price'];
                                     $catego = $row['scateg'];
                              
                               ?>
                               <a href="shop-detail.php?id=<?php echo $id; ?>">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <div class="rounded my-1" style="width: 100px; height: 100px;">
                                        <img src="uploads/service/<?php echo $simage; ?>" class="img-fluidd rounded" alt="Image" height="100px" width="100px">
                                    </div>
                                    <div>
                                        <h6 class="mb-2"> <?php echo $sname;?></h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <!-- <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div> -->
                                    </div>
                                </div>
                                </a>
                                <?php } ?>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Single Product End -->
    

        <!-- Footer Start -->
        <?php include "include/footer.php"; ?>

    </body>

</html>