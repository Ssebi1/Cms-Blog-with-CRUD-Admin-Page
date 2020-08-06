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

                    if(isset($_GET['post_id']))
                    {
                        $post_id = $_GET['post_id'];
                    
                        $query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id ";
                        $post_views_query = mysqli_query($connection,$query);

                        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
                        $select_all_posts_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query))
                        {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_hour = $row['post_hour'];
                            
                            ?>

                            <!-- First Blog Post -->
                            <h2>
                                <?php echo "<h1>$post_title"; ?>
                                <?php
                                    if(isset($_SESSION['user_role']))
                                    {
                                        if(is_admin($_SESSION['username']))
                                        {
                                            ?>
                                                <small style="font-size: 17px;">
                                                    <a style="color: gray;" href="admin/posts.php?source=edit_post&edit_id= <?php echo $_GET['post_id']; ?>">Edit Post</a>
                                                </small>
                                                </h1>
                                            <?php
                                        }
                                    }
                                ?>
                            </h2>
                           
                            <p class="lead">
                                by <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?> at <?php echo $post_hour; ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            
                            <?php

                        }
                    } else
                    {
                        header("Location:index.php");
                    }
                ?>

                <!-- Comments Form And Functionality -->
                <?php include "includes/add_comment.php"; ?>

                <hr>

                <!-- Posted Comments -->
                <?php include "includes/view_all_comments.php"; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php" ?>


        

        <hr>

<!-- Footer -->
<?php include "includes/footer.php" ?>
