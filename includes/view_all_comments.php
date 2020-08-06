

<?php 

        $query = "SELECT * FROM comments WHERE ";
        $query .="comment_post_id = $post_id AND ";
        $query .="comment_status = 'approved' ";
        $query .="ORDER BY comment_id DESC ";
        $select_comment_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_comment_query))
        {
            $comment_id      = $row['comment_id'];
            $comment_author  = $row['comment_author'];
            $comment_date    = $row['comment_date'];
            $comment_content = $row['comment_content'];
            ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        
                        <h4 class="media-heading"><?php echo $comment_author ?>
  
                            <small><?php echo $comment_date ?></small>
                            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
                            {
                                ?><a href="admin/comments.php?delete=<?php echo $comment_id;?>&source=front&post_id=<?php echo $post_id;?>" style="font-size:13px; cursor:pointer;color:red;float:right;">Delete</a><?php
                            }?>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
            <?php
        }
?>
