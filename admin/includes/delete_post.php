<?php
    if(isset($_GET['delete'])  && is_admin($_SESSION['username']))
    {
        $post_id_todelete = escape($_GET['delete']);
        $query ="DELETE FROM posts WHERE post_id = $post_id_todelete";
        $delete_post_query = mysqli_query($connection,$query);
        
        $query ="DELETE FROM comments WHERE comment_post_id = $post_id_todelete ";
        $delete_comment_query = mysqli_query($connection,$query);

        header("Location: posts.php?source=view_all_posts");
    }
?>