<?php
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
        if(isset($_POST['reset_views']))
            {
                $query = "UPDATE posts SET post_views = 0 WHERE post_id = $post_id_toedit ";
                $reset_views_query = mysqli_query($connection, $query);

                ?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Views Reseted. <a href="posts.php?source=view_all_posts ?>" class="alert-link">View All Posts. </a></p>
                </div>
                <?php
            }
?>