<?php
    if(isset($_GET['delete'])  && is_admin($_SESSION['username']))
    {
        $cat_id_todelete = escape($_GET['delete']);
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id_todelete}";
        $cateogry_delete = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
?>