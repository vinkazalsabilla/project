<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Our Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        $product = mysqli_query($conn, "SELECT * FROM product WHERE stock > 0 ORDER BY id ASC LIMIT 8");
        if (mysqli_num_rows($product) > 0) {
            while ($p = mysqli_fetch_array($product)) {
                ?>
                <div class="col-lg-4 col-md-5 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
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

    </div>
</div>
<!-- Products End -->