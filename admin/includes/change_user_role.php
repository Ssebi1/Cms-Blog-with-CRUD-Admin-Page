<?php
    if(isset($_GET['change_to_admin']) && is_admin($_SESSION['username']))
        {
            $user_id_tochange = escape($_GET['change_to_admin']);

            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id_tochange";
            $change_user_role_query = mysqli_query($connection,$query);

            if(!$change_user_role_query)
                    die("Query failed. " . mysqli_error($connection));

            header("Location: users.php?source=view_all_users");
        }

    if(isset($_GET['change_to_sub']))
        {
            $user_id_tochange = escape($_GET['change_to_sub']);

            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id_tochange";
            $change_user_role_query = mysqli_query($connection,$query);

            if(!$change_user_role_query)
                    die("Query failed. " . mysqli_error($connection));

            header("Location: users.php?source=view_all_users");
        }
?>