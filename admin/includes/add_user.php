<?php
    if(isset($_POST['add_user']) && is_admin($_SESSION['username']))
    {
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname  = escape($_POST['user_lastname']);
        $username       = escape($_POST['username']);
        $user_email     = escape($_POST['user_email']);
        $user_password  = escape($_POST['user_password']);
        $user_role      = escape($_POST['user_role']);

        $user_password = escape(password_hash($user_password, PASSWORD_BCRYPT , array('cost' => 10)));

        $query = "INSERT INTO users(user_firstname,user_lastname,username,user_email,user_password,user_role) ";
        $query .="VALUES('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_password}','{$user_role}')";
        $add_user = mysqli_query($connection, $query);

        if(!$add_user)
            die("Query failed. " . mysqli_error($create_post));

        ?>
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>User Created. <a href="users.php?source=view_all_users" class="alert-link">View Users. </a></p>
        </div>
        <?php
    }
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
            <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
            <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
            <input type="text" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
    <label for="user_role">Role</label>
    <select class="form-control" name="user_role" id="">
        <option value="subscriber">Select Role</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    </div>

    <div class="form-group">
            <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
    </div>

</form>