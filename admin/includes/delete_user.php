<?php
    if(isset($_POST['delete']))
        {
            $user_id_todelete = escape($_POST['user_id']);

            $query = "DELETE FROM users WHERE user_id = $user_id_todelete ";
            $delete_user = mysqli_query($connection,$query);

            header("Location: users.php?source=view_all_users");
        }
?>