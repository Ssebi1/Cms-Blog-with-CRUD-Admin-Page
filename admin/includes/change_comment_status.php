<?php
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
        if(isset($_GET['change_status']))
        {
            $comment_id_tochange = escape($_GET['change_status']);

            $query = "SELECT comment_status FROM comments WHERE comment_id = $comment_id_tochange ";
            $send_query = mysqli_query($connection,$query);
            $row = mysqli_fetch_assoc($send_query);
            $comment_status = $row['comment_status'];

            if($comment_status == 'unapproved')
                $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id_tochange";
            else if($comment_status=='approved')
                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id_tochange";
            
            $send_query = mysqli_query($connection,$query);

            if(!$send_query)
                    die("Query failed. " . mysqli_error($connection));

            if(isset($_GET['post_id']))
            {
                $post_id = escape($_GET['post_id']); 
                header("Location: comments.php?post_id=$post_id");
            }
            else
                header("Location: comments.php");
        }
?>