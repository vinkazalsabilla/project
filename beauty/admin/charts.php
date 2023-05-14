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
                    <h1 class="mt-4">Charts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Charts</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Chart.js is a third party plugin that is used to generate the charts in this template. The
                            charts below have been customized - for further customization options, please visit the
                            official
                            <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                            .
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </main>
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