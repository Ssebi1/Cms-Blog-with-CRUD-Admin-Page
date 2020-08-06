<?php
    if(isset($_POST['add_post']) && is_admin($_SESSION['username']))
    {
        $post_title       = escape($_POST['post_title']);
        $post_category_id = escape($_POST['post_category']);
        $post_author      = escape($_POST['post_author']);
        $post_status      = escape($_POST['post_status']);

        $post_image       = $_FILES['post_image']['name'];
        $post_image_temp  = $_FILES['post_image']['tmp_name'];

        $post_tags        = escape($_POST['post_tags']);
        $post_content     = escape($_POST['post_content']);
        $post_date        = date('d-m-y');
        $post_hour        = date('G');

        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_hour,post_image,post_content,post_tags,post_status) ";
        $query .="VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
        $create_post = mysqli_query($connection, $query);

        $post_id = mysqli_insert_id($connection);

        //Alert when new post is added
        ?>
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php if($post_status == 'published')
                echo "<p>Post Published. <a href='../post.php?post_id={$post_id}' class='alert-link'>View Post. </a></p>";
            else
                echo "<p>Post Saved As Draft. <a href='../post.php?post_id={$post_id}' class='alert-link'>Preview Post. </a></p>";
            ?>
        </div>
        <?php
    }
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
            <input type="text" class="form-control" name="post_author" value="<?php echo ucfirst($_SESSION['firstname']) . " " . ucfirst($_SESSION['lastname']); ?>">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label><br>
        <select class="form-control"  name="post_category" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_category_id = mysqli_query($connection,$query);

                if(!$select_category_id)
                    die("Query failed. " . mysqli_error($select_category_id));

                while($row = mysqli_fetch_assoc($select_category_id))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    ?>  
                    <option value="<?php echo $cat_id; ?>"> <?php echo $cat_title; ?></option> 
                    <?php
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
            <select class="form-control"  name="post_status" id="">
                    <option value="draft" selected>Draft</option> 
                    <option value="published">Published</option>       

            </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
            <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
            <textarea id="body" type="text" class="form-control" name="post_content" cols="30" rows="10"> </textarea>
    </div>


    <div class="form-group">
            <input type="submit" class="btn btn-primary" name="add_post" value="Publish">
    </div>

</form>