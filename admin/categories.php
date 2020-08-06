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
                            Categories
                            <!-- <small>Subheading</small> -->
                        </h1>
                        
                        <div class="col-xs-6">
                            <?php include "includes/add_category.php" ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                    <input class="btn btn primary" type="submit" name="submit" value="Add">

                                </div>
                            </form>

                        <?php //Update and Include query
                            if(isset($_GET['edit']))
                                {
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";

                                }
                        ?>

                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Posts</th>
                                        <tr>
                                    </thead>
                                    <tbody>

                            <?php include "includes/view_all_categories.php"; ?>

                            <?php include "includes/delete_category.php" ?>

                            </tbody>
                                </table>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>