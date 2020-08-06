<?php
        if(isset($_GET['delete']) && is_admin($_SESSION['username']))
            {
                $comment_id_todelete =escape($_GET['delete']);

                $query = "DELETE FROM comments WHERE comment_id = $comment_id_todelete ";
                $delete_comment = mysqli_query($connection,$query);

                if(isset($_GET['post_id']))
                {
                    $post_id = escape($_GET['post_id']); 
                    if(!isset($_GET['source']))
                        header("Location: comments.php?post_id=$post_id");
                    else
                        header("Location: ../post.php?post_id=$post_id");
                }
                else
                    header("Location: comments.php");
            }
?>