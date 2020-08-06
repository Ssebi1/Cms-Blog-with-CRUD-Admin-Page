<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid" >

                <!-- Page Heading -->
                
                    <?php

                    if(isset($_GET['source']))
                    {
                        $source = $_GET['source'];

                        switch($source)
                        {
                            case 'view_all_users';
                            ?> <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                                    View Users
                                </h1>
                            <?php
                            include "includes/view_all_users.php";
                            break;

                            case 'add_user';
                            ?> <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                                    Add User
                                </h1>
                            <?php
                            include "includes/add_user.php";
                            break;

                            case 'edit_user';
                            ?> <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                                    Edit User
                                </h1>
                            <?php
                            include "includes/edit_user.php";
                            break;

                            default:
                            ?> <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">
                                    View Users
                                </h1>
                            <?php
                            include "includes/view_all_users.php";
                            break;
                        }
                    }
                    ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- Footer -->
<?php include "includes/admin_footer.php" ?>