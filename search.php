<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>


<body>

    <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                    if(isset($_POST['submit']))
                        {
                            $search = escape($_POST['search']);

                            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' or post_title LIKE '%$search%'";
                            $search_query = mysqli_query($connection,$query);

                            if(!$search_query)
                                die("Query Failed". mysqli_error($connection));
                        }

                    $ct = mysqli_num_rows($search_query);

                    if($ct == 0)
                        {
                            ?><h1>No Results For <?php echo ucfirst($search); ?></h1><?php
                        }

                    else
                        {
                            ?><h1><?php echo $ct; ?> Results For <?php echo ucfirst($search); ?></h1><?php

                            while($row = mysqli_fetch_assoc($search_query))
                            {
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];

                            ?>

                             <h1 class="page-header">
                                <a href="#">Page Header</a>
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><a href="#"><?php echo $post_title; ?></a></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><a href="#"><?php echo $post_author; ?></a></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?> at 10:00 PM</p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                             <?php
                            }
                        }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php" ?>

                <!-- /.row -->
            </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "includes/footer.php" ?>
