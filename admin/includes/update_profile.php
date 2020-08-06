<?php

    //Get data about user from db for initial Form values
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username ='{$username}'";
        $select_user_profile = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile))
        {
            $user_id        = $row['user_id'];
            $user_firstname = $row['user_firstname'];
            $user_lastname  = $row['user_lastname'];
            $user_password  = $row['user_password'];
            $user_role      = $row['user_role'];
            $user_email     = $row['user_email'];
            
        }
    }

    //Update user data in db
    if(isset($_POST['update_user']))
    {
        $user_firstname  = escape($_POST['user_firstname']);
        $user_lastname   = escape($_POST['user_lastname']);
        $user_email      = escape($_POST['user_email']);
        $user_password   = escape($_POST['user_password']);
        $user_role       = escape($_POST['user_role']);

            $query = "SELECT user_password FROM users WHERE user_id = $user_id ";
            $get_user_query = mysqli_query($connection,$query);

            $row = mysqli_fetch_array($get_user_query);
            $db_user_password = $row['user_password'];

            if(empty($user_password))
                $user_password = $db_user_password;
            else if($db_user_password != $user_password)
                $user_password = password_hash($user_password, PASSWORD_BCRYPT , array('cost' => 10));

            $query = "UPDATE users SET ";
            $query .= "user_firstname   = '{$user_firstname}', ";
            $query .= "user_lastname    = '{$user_lastname}', ";
            $query .= "username         = '{$username}', ";
            $query .= "user_email       = '{$user_email}', ";
            $query .= "user_password    = '{$user_password}', ";
            $query .= "user_role        = '{$user_role}' ";
            $query .= "WHERE user_id    = {$user_id} ";

            $update_user_query = mysqli_query($connection,$query);

            if(!$update_user_query)
                die("Query failed. " . mysqli_error($connection));
        
        
        ?>
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>Profile Updated.</p>
        </div>
        <?php
        }

?>