<?php
include_once "admin/templates/database.php";
include_once "templates/header.php";
?>

<body>
    <?php include_once "templates/main-navbar.php"; ?>

    <?php include_once "templates/feature.php"; ?>

    <?php include_once "templates/offer.php"; ?>

    <?php include_once "templates/product.php"; ?>

    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Subscribe for the Latest News</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <?php include_once "templates/footer.php"; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php
    include_once "templates/script.php";
    ?>
</body>

</html>