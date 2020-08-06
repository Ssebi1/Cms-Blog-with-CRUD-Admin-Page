<?php

    if(isset($_GET['edit']))
    {
        $user_id_toedit = escape($_GET['edit']);

        $query = "SELECT * FROM users WHERE user_id = $user_id_toedit ";
        $show_user_query = mysqli_query($connection,$query);

        if(!$show_user_query)
            die("Query Failed. " . mysqli_error($connection));
        
        while($row = mysqli_fetch_assoc($show_user_query))
        {
            $user_firstname = $row['user_firstname'];
            $user_lastname  = $row['user_lastname'];
            $username       = $row['username'];
            $user_email     = $row['user_email'];
            $user_password  = $row['user_password'];
            $user_role      = $row['user_role'];

        }
    }



    if(isset($_POST['edit_user']))
    {
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname  = escape($_POST['user_lastname']);
        $username       = escape($_POST['username']);
        $user_email     = escape($_POST['user_email']);
        $user_password  = escape($_POST['user_password']);
        $user_role      = escape($_POST['user_role']);

        $query = "SELECT user_password FROM users WHERE user_id = $user_id_toedit ";
        $get_user_query = mysqli_query($connection,$query);

        $row = mysqli_fetch_array($get_user_query);
        $db_user_password = $row['user_password'];

        if(empty($user_password))
            $user_password = $db_user_password;
        else if($db_user_password != $user_password)
            $user_password = password_hash($user_password, PASSWORD_BCRYPT , array('cost' => 10));


        $query  = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname  = '{$user_lastname}', ";
        $query .= "username       = '{$username}', ";
        $query .= "user_email     = '{$user_email}', ";
        $query .= "user_password  = '{$user_password}', ";
        $query .= "user_role      = '{$user_role}' ";
        $query .= "WHERE user_id  = {$user_id_toedit} ";

        $edit_user_query = mysqli_query($connection,$query);

        if(!$edit_user_query)
            die("Query failed. " . mysqli_error($connection));
        
        ?>
            <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>User Updated. <a href="users.php?source=view_all_users" class="alert-link">View Users. </a></p>
            </div>
        <?php
    }
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
            <input autocomplete="off" type="password" class="form-control" name="user_password" placeholder="Password Hidden">
    </div>

    <div class="form-group">
    <label for="user_role">Role</label>
    <select class="form-control" name="user_role" id="">
        <?php if($user_role == "admin")
         {
             echo "<option value='admin' selected>Admin</option>";
             echo "<option value='subscriber'>Subscriber</option>";
         }
        else
        {
            echo "<option value='admin'>Admin</option>";
            echo "<option value='subscriber' selected>Subscriber</option>";
        }
        ?>
    </select>
    </div>

    <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>

</form>