<?php
include_once "templates/header.php";
?>

<body>
    <div id="layoutError">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="mb-4 img-error" src="assets/img/error-404-monochrome.svg" />
                                <p class="lead">This requested URL was not found on this server.</p>
                                <a href="index.php">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Return to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutError_footer">
            <?php
            include_once 'templates/footer.php';
            ?>
        </div>
    </div>
    <?php
    include_once 'templates/script.php';
    ?>
</body>

</html>