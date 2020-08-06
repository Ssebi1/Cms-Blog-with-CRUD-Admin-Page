<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>


<body>

    <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                    if(isset($_GET['author']))
                    {
                        $author = escpae($_GET['author']);
                    }
                    
                    $per_page=5;
                    if(isset($_GET['page']))
                    {
                        $page = escape($_GET['page']);
                    }
                    else
                    {
                        $page = "";
                    }

                    if($page=="" || $page==1)
                    {
                        $page_1=0;
                    }
                    else
                    {
                        $page_1=($page*$per_page)-$per_page;
                    }

                    $query = "SELECT * FROM posts WHERE post_status='published' AND post_author = '$author' ";
                    $count_posts = mysqli_query($connection, $query);
                    $posts_number = mysqli_num_rows($count_posts);
                    $posts_number=ceil($posts_number/$per_page);


                    $query = "SELECT * FROM posts WHERE post_author = '$author' and post_status='published' ORDER BY post_id DESC LIMIT $page_1, $per_page " ;
                    $select_all_posts_query = mysqli_query($connection, $query);

                    if(!$select_all_posts_query)
                        die(mysqli_error($connection));

                    ?>
                    <h1 class="page-header">
                        <small style="font-size: 24px;">Posts by <b><?php echo $author; ?></b></small>
                    </h1>
                    <?php

                    while($row = mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,200);


                        ?>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?> at 10:00 PM</p>
                        <hr>
                        <a href="post.php?post_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        <?php

                    }

                ?>

                


            </div>

            <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php" ?>


        

        <hr>

        <ul class="pagination">
            <?php
                for($i=1;$i<=$posts_number;$i++)
                    if($i == $page || ( $page =="" && $i==1))
                        echo "<li class='page-item active'><a class='page-link' href='author.php?author=$author&page=$i'>$i</a></li>";
                    else
                        echo "<li class='page-item'><a class='page-link' href='author.php?author=$author&page=$i'>$i</a></li>";          
            ?>
        </ul>

<!-- Footer -->
<?php include "includes/footer.php" ?>
