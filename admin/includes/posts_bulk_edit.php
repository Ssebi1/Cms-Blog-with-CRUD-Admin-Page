<?php
    if(isset($_POST['checkBoxArray']))
    {
        foreach($_POST['checkBoxArray'] as $checkBoxValue)
        {
            $bulk_option = escape($_POST['bulk_option']);

            switch($bulk_option)
            {
                case "publish":
                    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $checkBoxValue ";
                    $publish_post_bulk = mysqli_query($connection , $query);
                break;

                case "draft":
                    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $checkBoxValue ";
                    $draft_post_bulk = mysqli_query($connection , $query);
                break;

                case "delete":
                    $query ="DELETE FROM posts WHERE post_id = {$checkBoxValue} ";
                    $delete_post_bulk = mysqli_query($connection, $query);

                    $query ="DELETE FROM comments WHERE comment_post_id = $checkBoxValue ";
                    $delete_comment_query = mysqli_query($connection,$query);
                break;

                case "clone":
                    $query ="SELECT * FROM posts WHERE post_id = $checkBoxValue ";
                    $select_post_query = mysqli_query($connection,$query);
                    $row = mysqli_fetch_array($select_post_query);

                    $post_title         = $row['post_title'];
                    $post_category_id   = $row['post_category_id'];
                    $post_author        = $row['post_author'];
                    $post_status        = $row['post_status'];
                    $post_image         = $row['post_image'];
                    $post_tags          = $row['post_tags'];
                    $post_content       = $row['post_content'];

                    $query ="INSERT INTO posts(post_title,post_category_id,post_date,post_hour,post_author,post_status,post_image,post_tags,post_content) ";
                    $query .="VALUES('{$post_title}','{$post_category_id}',now(),now(),'{$post_author}','{$post_status}','{$post_image}','{$post_tags}','{$post_content}') ";
                    $clone_post_query = mysqli_query($connection ,$query);

                break;

                default:   
                break;

            }
        }
    }
?>