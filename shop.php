<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Shop </title>
        <?php include "include/head.php"; ?>
    </head>

    <body>

      <?php include "include/header.php"; ?>

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh Fruits & Veggies shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <?php 
                                                $s = "select * from services ORDER BY RAND() limit 5";
                                                $r = mysqli_query($db, $s);
                                                while ($row = mysqli_fetch_assoc($r)) {
                                                $id = $row['id'];
                                                $sname = $row['sname'];
                                                $simage = $row['simage'];
                                                $price = $row['price'];
                                                $catego = $row['scateg'];
                                                ?>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i><?php echo $sname;?></a>
                                                        <span><?php echo $catego; ?></span>
                                                    </div>
                                                </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>

                               <?php 
                                 $s = "select * from services ORDER BY RAND() limit 5";
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
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    <?php 
                                        $s = "select * from services ORDER BY RAND()";
                                        $r = mysqli_query($db, $s);
                                        while ($row = mysqli_fetch_assoc($r)) {
                                        $id = $row['id'];
                                        $sname = $row['sname'];
                                        $simage = $row['simage'];
                                        $price = $row['price'];
                                        $catego = $row['scateg'];
                                    ?>

                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="uploads/service/<?php echo $simage; ?>" class="img-fluidd w-100 rounded-top" alt="" height="200px">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4><?php echo $sname; ?></h4>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <!-- <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p> -->
                                                    <a href="shop-detail.php?id=<?php echo $id; ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <?php } ?>
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Footer Start -->
       <?php include "include/footer.php";?>
    </body>

</html>