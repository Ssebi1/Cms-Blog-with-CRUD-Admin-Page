
<?php

        if(isset($_POST['submit']))
        {

            $comment_status='unapproved';

            if(isset($_SESSION['username']))
            {
                $comment_author = escape($_SESSION['firstname'] . " " . $_SESSION['lastname']);
                $comment_email  = escape($_SESSION['user_email']); 
                if($_SESSION['user_role']=='admin')
                    $comment_status='approved';
            }
            else
            {
                $comment_author =escape($_POST['comment_author']);
                $comment_email  =escape($_POST['comment_email']);
            }

            $comment_content    =escape($_POST['comment_content']);
            $comment_post_id    =escape($_GET['post_id']);
            $comments_date      =date('d-m-y');

            if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
            {
                $query  ="INSERT INTO comments(comment_author, comment_email, comment_content, comment_post_id, comment_date,comment_status) ";
                $query .="VALUES('{$comment_author}','{$comment_email}','{$comment_content}','{$comment_post_id}',now(),'{$comment_status}') ";
                $create_comment = mysqli_query($connection, $query);

                ?>
                    <div class="alert alert-success alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>Your comment have been submited <?php if($_SESSION['user_role']!=='admin') echo "and is waiting for approval";?>.</p>
                    </div>
                <?php
            }
            else
            {
                ?>
                <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p>Field cannot be empty.</p>
                </div>
                <?php
            }

            
        }

?>



    <!-- Comments Form -->
    <div class="well" id="well">
        <h4>Leave a Comment:</h4>
        <form action="" method="post" role="form">

        <?php 
            if(!isset($_SESSION['username']))
            {
                ?>
                    <label for="comment_author">Author</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="comment_author"></input>
                    </div>
                    <label for="comment_email">Email</label>
                    <div class="form-group">
                        <input class="form-control" type="email" name="comment_email"></input>
                    </div>
                    <label for="comment_content">Comment</label>
                <?php
            }
        ?>
            
            <div class="form-group">
                <textarea class="form-control" rows="3" name="comment_content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>