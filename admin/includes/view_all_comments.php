<div style="overflow: auto;">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            </tr>
        </thead>

        <tbody>

        <!-- Show all comments from db -->
        <?php

            $query = "SELECT * FROM comments ORDER BY comment_id DESC";
            $view_all_comments = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($view_all_comments))
                {
                    $comment_id         = $row['comment_id'];
                    $comment_post_id    = $row['comment_post_id'];
                    $comment_author     = $row['comment_author'];
                    $comment_email      = $row['comment_email'];
                    $comment_content    = $row['comment_content'];
                    $comment_status     = $row['comment_status'];
                    $comment_date       = $row['comment_date'];

                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                    $select_post_title = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($select_post_title);
                    $post_title = $row['post_title'];
        ?>


        <tr>
            <td><?php echo $comment_id ?></td>
            <td><?php echo $comment_author ?></td>
            <td><?php echo $comment_content ?></td>
            <td><?php echo $comment_email ?></td>
            <td><?php echo $comment_status ?></td>
                    <td><a href="../post.php?post_id=<?php echo $comment_post_id ?>"><?php echo $post_title ?></td>
            
            <td><?php echo $comment_date ?></td>
            <td><a href="comments.php?change_status=<?php echo $comment_id ?>">Change Status</a></td>
            <td><a href="comments.php?delete=<?php echo $comment_id ?>">Delete</a></td>
            
        </tr>

                                    
<?php


}
?>


    </tbody>
</table>
</div>

<?php include "includes/change_comment_status.php" ?>
<?php include "includes/delete_comment.php"; ?>


    