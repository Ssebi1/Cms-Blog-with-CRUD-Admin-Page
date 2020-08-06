<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo ucfirst($_SESSION['username']); ?></small>
                        </h1>
                    </div>
                </div>

                <!-- Panels -->
                <div class="row">
                    <?php include "includes/admin_panels.php"; ?>
                </div>

                <!-- Chart -->
                <div class="row">
                    <?php include "includes/admin_chart.php"; ?>
                </div>

            </div>


<!-- Footer -->
<?php include "includes/admin_footer.php" ?>