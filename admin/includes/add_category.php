<?php
    if(isset($_POST['submit']) && is_admin($_SESSION['username']))
    {
        $cat_title = escape($_POST['cat_title']);

        //Validation
        if($cat_title == "" || empty($cat_title))
            echo "<p style='color:red'>This field should not be empty</p>";
        else
        {
            //Adding a new category
            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection,$query);
        }
    }
?>