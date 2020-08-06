<!-- Bulk options for posts functionality -->

<?php include "includes/modal_delete.php"; ?>
<?php include "includes/posts_bulk_edit.php"; ?>

<form action="" method="post" class="form-style" style="overflow: auto;"> 

    <!-- Bulk option select -->
    <div id="bulkOptionContainer" style="padding: 0;" class="col-xs-4">
        <select class="form-control" name="bulk_option" id="">
            <option value="">Select Options</option>
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>

    <!-- Add new post button -->
    <div class="col-xs-4" style="padding-left: 5px;">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div> <br><br>

<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Views</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
    <?php
        if(isset($_GET['cat_id']))
            {
                //Posts from a specific category
                $cat_id = escape($_GET['cat_id']);
                $query = "SELECT * FROM posts WHERE post_category_id = $cat_id ORDER BY post_id DESC";
            }
        else
            {
                $query = "SELECT * FROM posts ORDER BY post_id DESC";
            }
        $view_all_posts = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($view_all_posts))
        {
            $post_id        = $row['post_id'];
            $post_author    = $row['post_author'];
            $post_title     = $row['post_title'];
            $post_category  = $row['post_category_id'];
            $post_status    = $row['post_status'];
            $post_image     = $row['post_image'];
            $post_tags      = $row['post_tags'];
            $post_views     = $row['post_views'];
            $post_comments  = $row['post_comment_count'];
            $post_date      = $row['post_date'];
            $post_hour      = $row['post_hour'];
            
            // Get category title from db
            $query = "SELECT * FROM categories WHERE cat_id = $post_category ";
            $select_category = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_category);
            $cat_title = $row['cat_title'];

            ?>
        <tr>
            <th><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></th>
            <td><?php echo $post_id ?></td>
            <td><?php echo $post_author ?></td>
            <td><a href="../post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></td>
            <td><?php echo $cat_title ?></td>
            <td><?php echo $post_status ?></td>
            <td><img style="width:150px;" src="../images/<?php echo $post_image ?>"></td>
            <td><?php echo $post_tags ?></td>
            <td><?php echo $post_views ?></td>

            <!-- Comment count for each post -->
            <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                $send_comment_query = mysqli_query($connection,$query);
                $count_comments = mysqli_num_rows($send_comment_query);
            ?>
        
            <td><a href="comments.php?post_id=<?php echo $post_id; ?>"><?php echo $count_comments ?></td>
            <td><?php echo $post_date ?> <br> at  <?php echo $post_hour ?></td>
            <td><a class="btn btn-link" href="posts.php?source=edit_post&edit_id=<?php echo $post_id; ?>">Edit</a></td>

            <form method="post">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <td><input class="btn btn-link" type="submit" name="delete" value="Delete"></td>
            </form>

            
        </tr>

        <?php
        } ?>

    </tbody>

</table>

</form>

    <?php include "delete_post.php"; ?>

<script>

    // Modal
    $(document).ready(function(){
        $(".delete_link").on('click',function(){
            var id = $(this).attr("rel");
            var delete_url = "posts.php?source=view_all_posts&delete="+id+" ";

            $("#myModal").modal('show');

            $(".modal_delete_link").attr("href", delete_url);


        });
    });

</script>