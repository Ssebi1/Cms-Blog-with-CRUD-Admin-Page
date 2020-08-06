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
                    <?php 
                        if($user_role=="admin")
                            echo "<td><a href='users.php?source=view_all_users&change_to_sub= {$user_id}'>Change Role</a></td>";
                        else
                            echo "<td><a href='users.php?source=view_all_users&change_to_admin= {$user_id}'>Change Role</a></td>";
                    ?>
                    <td><a href="users.php?source=edit_user&edit=<?php echo $user_id ?>">Edit</a></td>
                    <td><a href="users.php?source=view_all_users&delete=<?php echo $user_id ?>">Delete</a></td>
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