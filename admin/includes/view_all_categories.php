<?php
    $query = "SELECT * FROM categories ORDER BY cat_id ASC";
    $select_categories_admin = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_categories_admin))
    {
        $cat_title  = $row['cat_title'];
        $cat_id     = $row['cat_id'];
        ?>
            <tr>
                <td><?php echo $cat_id ?></td>
                <td><a href="../categories.php?category_id=<?php echo $cat_id; ?>"><?php echo $cat_title ?></td>

                <?php
                    $query = "SELECT * FROM posts WHERE post_category_id = $cat_id ";
                    $count_posts_of = mysqli_query($connection,$query);
                    $count = mysqli_num_rows($count_posts_of);
                ?>

                <td><a href="posts.php?source=view_all_posts&cat_id=<?php echo $cat_id; ?>"><?php echo $count ?></a></td>
                <td><a href="categories.php?delete=<?php echo $cat_id ?>">Delete</a></td>
                <td><a href="categories.php?edit=<?php echo $cat_id ?>">Edit</a></td>
            </tr>
        <?php    
    }
?>