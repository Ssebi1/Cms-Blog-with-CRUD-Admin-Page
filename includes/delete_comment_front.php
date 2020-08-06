<?php
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' && isset($_GET['delete']))
        {
            $comment_id_todelete = escape($_GET['delete']);

            $query = "DELETE FROM comments WHERE comment_id = $comment_id_todelete ";
            $delete_comment = mysqli_query($connection,$query);

        }
?>