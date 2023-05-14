<?php
include_once "templates/header.php";
?>

<body class="sb-nav-fixed">
    <?php
    include_once "templates/navbar.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            include_once "templates/sidenav.php";
            ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Product Table
                        </div>
                        <div class="card-body">
                            <?php
                            include_once "templates/table.php";
                            ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php
            include_once "templates/footer.php";
            ?>
        </div>
    </div>
    <?php
    include_once "templates/script.php";
    ?>
</body>

</html>