<?php
    if(isset($_POST['change_role']))
        {
            $user_id_tochange = escape($_POST['user_id']);
            $user_role_tochange = escape($_POST['user_role']);
            
            if($user_role_tochange == 'subscriber')
                $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id_tochange";
            else if($user_role_tochange == 'admin')
                $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id_tochange";

            $change_user_role_query = mysqli_query($connection,$query);

            if(!$change_user_role_query)
                    die("Query failed. " . mysqli_error($connection));

            header("Location: users.php?source=view_all_users");
        }
?>