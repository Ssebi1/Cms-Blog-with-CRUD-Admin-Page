<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
            if(isset($_GET['edit']))
            {
                $cat_id = escape($_GET['edit']);

                $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                $select_categories_id = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_categories_id))
                {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    ?>
                    <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

                    <?php
                }
            }
        ?>

        <?php
            if(isset($_POST['update_category']))
            {
                $cat_title_toupdate = escape($_POST['cat_title']);
                $query = "UPDATE categories SET cat_title = '{$cat_title_toupdate}' WHERE cat_id = {$cat_id}";
                $cateogry_update= mysqli_query($connection, $query);
                header("Location: categories.php");

            }
        ?>

        <input class="btn btn primary" type="submit" name="update_category" value="Update">

    </div>
</form>