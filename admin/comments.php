<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <?php 
                            //Heading
                            if(isset($_GET['post_id']))
                            {
                                $post_id = escape($_GET['post_id']);
                                $query = "SELECT * FROM posts WHERE  post_id = $post_id";
                                $send_query = mysqli_query($connection,$query);

                                $row = mysqli_fetch_array($send_query);
                                $post_title = $row['post_title'];

                                echo "Comments In Response To " . "<a href='../post.php?post_id={$post_id}'>$post_title</a>";
                            }
                            else 
                            {
                                echo "View Comments";
                            }
                        ?>
                        </h1>
                    <?php 
                        if(isset($_GET['post_id']))
                            include "includes/view_all_comments_by_post.php";
                        else
                            include "includes/view_all_comments.php";
                    ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>