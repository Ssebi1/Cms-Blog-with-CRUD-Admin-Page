<?php
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' && isset($_GET['delete']))
    {
        $cat_id_todelete = escape($_GET['delete']);
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id_todelete}";
        $cateogry_delete = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
?>