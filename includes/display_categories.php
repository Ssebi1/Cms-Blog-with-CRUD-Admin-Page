<?php

    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_categories_query))
    {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        $category_class = '';
        $contact_class = '';

        $pageName = basename($_SERVER['PHP_SELF']);
        $contact = 'contact.php';

        if(isset($_GET['category_id']) && $_GET['category_id'] == $cat_id)
        {
            $category_class='active';
        }
        else if($pageName == $contact)
        {
            $contact_class = 'active';
        }

        $query = "SELECT * FROM posts WHERE post_category_id = $cat_id and post_status='published'";
        $category_number_of_posts = mysqli_query($connection , $query);

        if(mysqli_num_rows($category_number_of_posts)!==0)
        {
            ?>
                <li class="<?php echo $category_class; ?>"><a href="categories.php?category_id=<?php echo $cat_id ?>"><?php echo $cat_title ?></a></li>
            <?php
        }
        
    }

?>