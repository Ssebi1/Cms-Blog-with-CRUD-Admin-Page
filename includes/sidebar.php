<div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                
                <!-- Login -->
                <div class="well">
                    
                    <?php 
                    if(!isset($_SESSION['username']))
                    {
                        ?>
                        <h4>Login</h4>
                        <?php
                            if(isset($_GET['validation']))
                            {
                                $validation = $_GET['validation'];
                                
                                if($validation == 2)
                                {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p>Fields cannot pe empty.</p>
                                        </div>
                                    <?php
                                }
                                else if($validation == 1)
                                {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p>User not found.</p>
                                        </div>
                                    <?php
                                }
                                else if($validation == 3)
                                {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p>Username or password is incorrect.</p>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                        <form action="includes/login.php" method="post">

                            <div class="form-group">
                                <input autocomplete="on" type="text" name="username" class="form-control" placeholder="Enter Username">
                            </div>

                            <div class="input-group" >
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                                </span>
                            </div>

                            

                            </form>
                            <p style="font-size: 12px;margin-top:5px;margin-left:3px;">Not Having An Account? <a href="registration.php">Register here.</a></p>
                        <?php
                    }
                    else if(isset($_SESSION['username']))
                    {
                        ?>
    
                            <h4>Logged in as <b><?php echo ucfirst($_SESSION['username']); ?></b></h4>
                            <h5>Name: <?php echo ucfirst($_SESSION['firstname']) . " " . ucfirst($_SESSION['lastname']); ?></h5>
                            <h5>Email: <?php echo $_SESSION['user_email']; ?></h5>
                            <h5>Role: <?php echo ucfirst($_SESSION['user_role']); ?></h5>
                            <a href="admin/includes/logout.php" class="btn btn-xs btn-danger">Log Out</a>
                        <?php
                    }
                ?>
                
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->

                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php include "includes/display_categories.php" ?>
                            </ul>
                        </div>
                    </div>
                     <!-- /.row -->
                    </div>

                    <!-- Side Widget Well -->
                    <?php include "includes/side_widget.php" ?>



                    </div>

            </div>
        <!-- /.row -->
        