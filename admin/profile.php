<?php include "includes/admin_header.php" ?>
<?php ob_start(); ?>

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
                            Profile
                        </h1>
                        <?php include "includes/update_profile.php" ?>
                    </div>
                </div>
                <!-- /.row -->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="user_firstname">Firstname</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email</label>
                            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="user_password">Password</label>
                            <input autocomplete="off" type="password" class="form-control" name="user_password" placeholder="Password Hidden">
                    </div>

                    <div class="form-group">
                    <label for="user_role">Role</label>
                    <select class="form-control" name="user_role" id="">
                        <option value='admin' selected>Admin</option>
                        <option value='subscriber'>Subscriber</option>
                    </select>
                    </div>

                    <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
                    </div>

                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>