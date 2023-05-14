<?php
include_once "admin/templates/database.php";
include_once "templates/header.php";

$product = mysqli_query($conn, "SELECT * FROM product WHERE id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($product);
?>

<body>
    <?php include_once "templates/navbar.php"; ?>

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img src="admin/assets/img/<?php echo $p->picture ?>" width="100%" alt="">
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">
                    <?php echo $p->name ?>
                </h3>
                <h3 class="font-weight-semi-bold mb-4">Rp.
                    <?php echo number_format($p->sell_price) ?>
                </h3>
                <p class="mb-4">
                    <?php echo $p->description ?>
                </p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Checkout</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <?php include_once "templates/footer.php"; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php include_once "templates/script.php"; ?>
</body>

</html>