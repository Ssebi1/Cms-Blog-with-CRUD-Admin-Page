<?php
    if(isset($_GET['edit_id']))
    {
        $post_id_toedit = escape($_GET['edit_id']);
    

     $query = "SELECT * FROM posts WHERE post_id= $post_id_toedit ";
     $select_post_by_id = mysqli_query($connection,$query);

     while($row = mysqli_fetch_assoc($select_post_by_id))
     {
         $post_id       = $row['post_id'];
         $post_author   = $row['post_author'];
         $post_title    = $row['post_title'];
         $post_category = $row['post_category_id'];
         $post_status   = $row['post_status'];
         $post_image    = $row['post_image'];
         $post_tags     = $row['post_tags'];
         $post_comments = $row['post_comment_count'];
         $post_date     = $row['post_date'];
         $post_content  = $row['post_content'];
     }

     if(isset($_POST['update_post']))
     {
        $post_author      = escape($_POST['post_author']);
        $post_title       = escape($_POST['post_title']);
        $post_category_id = escape($_POST['post_category']);
        $post_status      = escape($_POST['post_status']);
        $post_image       = $_FILES['post_image']['name'];
        $post_image_temp  = $_FILES['post_image']['tmp_name'];
        $post_tags        = escape($_POST['post_tags']);
        $post_content     = escape($_POST['post_content']);

        move_uploaded_file($post_image_temp,"../images/$post_image");

        if(empty($post_image))
        {
            $query = "SELECT * FROM posts WHERE post_id = $post_id_toedit ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_image))
            {
                $post_image = $row['post_image'];
            }
        }

        $query  = "UPDATE posts SET ";
        $query .= "post_title       = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date        = now(), ";
        $query .= "post_author      = '{$post_author}', ";
        $query .= "post_status      = '{$post_status}', ";
        $query .= "post_tags        = '{$post_tags}', ";
        $query .= "post_content     = '{$post_content}', ";
        $query .= "post_image       = '{$post_image}' ";
        $query .= "WHERE post_id    = {$post_id_toedit} ";

        $update_post = mysqli_query($connection , $query);

        if(!$update_post)
            die("Query Failed. " .mysqli_error($connection));
        
        ?>
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>Post Updated. <a href="../post.php?post_id=<?php echo $post_id_toedit; ?>" class="alert-link">View Post. </a></p>
        </div>
        <?php

     }
        include "includes/reset_post_views.php";

    }

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
            <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <br>
        <select class="form-control"  name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_category_id = mysqli_query($connection,$query);

                if(!$select_category_id)
                    die("Query failed. " . mysqli_error($select_category_id));

                while($row = mysqli_fetch_assoc($select_category_id))
                {
                    $cat_id    = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    ?>  
                    <option value="<?php echo $cat_id; ?>" <?php if($cat_id == $post_category) echo "selected" ?>><?php echo $cat_title; ?></option> 
                    <?php
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
            <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" class="form-control" id="" >
            <option value="<?php echo $post_status; ?>"><?php echo ucfirst($post_status); ?></option>
            <?php 
                if($post_status == 'published')
                    echo "<option value = 'draft'>Draft</option>";
                else 
                    echo "<option value = 'published'>Published</option>";

            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="post_image">Post Image</label>
            <br>
            <img style="width:200px" src="../images/<?php echo $post_image; ?>" alt="image">
            <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
            <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
            <textarea id="body" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?>
            </textarea>
    </div>

    <div class="form-group">
            <a class="btn btn-danger" href="posts.php?source=view_all_posts&delete=<?php echo $post_id_toedit; ?>">Delete</a>
            <input type="submit" class="btn btn-danger" name="reset_views" value="Reset Views">  
            <input type="submit" class="btn btn-primary" name="update_post" value="Edit">  

    </div>
</form>