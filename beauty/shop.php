<?php
include_once "admin/templates/database.php";
include_once "templates/header.php";
?>

<body>
    <?php include_once "templates/navbar.php"; ?>

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-5">
                    <div class="col-10 pb-3">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $product = mysqli_query($conn, "SELECT * FROM product WHERE stock > 0 ORDER BY id ASC LIMIT 8");
                    if (mysqli_num_rows($product) > 0) {
                        while ($p = mysqli_fetch_array($product)) {
                            ?>
                            <div class="col-lg-4 col-md-5 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="admin/assets/img/<?php echo $p['picture'] ?>" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">
                                            <?php echo substr($p['name'], 0, 30) ?>
                                        </h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>Rp.
                                                <?php echo number_format($p['sell_price']) ?>
                                            </h6>
                                            <h6 class="text-muted ml-2"><del>Rp.
                                                    <?php echo number_format($p['sell_price'] + 50000) ?>
                                                </del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="detail.php?id=<?php echo $p['id'] ?>" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    <?php include_once "templates/footer.php"; ?>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php include_once "templates/script.php"; ?>
</body>

</html>