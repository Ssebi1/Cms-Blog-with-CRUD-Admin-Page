<?php
    if(isset($_GET['delete']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
        {
            $user_id_todelete = escape($connection,$_GET['delete']);

            $query = "DELETE FROM users WHERE user_id = $user_id_todelete ";
            $delete_user = mysqli_query($connection,$query);

            header("Location: users.php?source=view_all_users");
        }
?>