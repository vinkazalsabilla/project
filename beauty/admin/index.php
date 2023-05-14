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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <?php
                    include_once "templates/card.php";
                    ?>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
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