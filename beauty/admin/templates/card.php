<div class="row">
    <?php
    // Array of card data
    $cards = array(
        array("bg-primary", "Primary Card"),
        array("bg-warning", "Warning Card"),
        array("bg-success", "Success Card"),
        array("bg-danger", "Danger Card")
    );

    // Loop through the cards and generate the HTML dynamically
    foreach ($cards as $card) {
        ?>
        <div class="col-xl-3 col-md-6">
            <div class="card <?php echo $card[0]; ?> text-white mb-4">
                <div class="card-body"><?php echo $card[1]; ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
