<div class="table"  style="overflow: auto;">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM users";
            $view_all_users = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($view_all_users))
            {
                $user_id        = $row['user_id'];
                $username       = $row['username'];
                $user_password  = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname  = $row['user_lastname'];
                $user_image     = $row['user_image'];
                $user_email     = $row['user_email'];
                $user_role      = $row['user_role'];
                
                ?>
                <tr>
                    <td><?php echo $user_id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $user_firstname ?></td>
                    <td><?php echo $user_lastname ?></td>
                    <td><?php echo $user_email ?></td>
                    <td><?php echo $user_role ?></td>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="user_role" value="<?php echo $user_role; ?>">
                        <td><input class="btn btn-link" type="submit" name="change_role" value="Change Role"></td>
                    </form>
                    <td><a class="btn btn-link" href="users.php?source=edit_user&edit=<?php echo $user_id ?>">Edit</a></td>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <td><input class="btn btn-link" type="submit" name="delete" value="Delete"></td>
                    </form>
                </tr> <?php
            } ?>

    </tbody>
</table>
</div>

    <?php
        // Change user role functinality
        include "includes/change_user_role.php";  
        
        // Delete user functinality
        include "includes/delete_user.php";
    ?>