<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid" >

                <!-- Page Heading -->
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                                if(isset($_GET['source']))
                                {
                                    $source = $_GET['source'];
                                    switch($source)
                                    {
                                        case 'view_all_posts';
                                        if(isset($_GET['cat_id']))
                                            {
                                                $cat_id = $_GET['cat_id'];
                                                $query = "SELECT cat_title FROM categories WHERE cat_id = $cat_id ";
                                                $send_query = mysqli_query($connection,$query);
                                                $row = mysqli_fetch_array($send_query);
                                                $cat_title = $row['cat_title'];
                                                echo "View Posts From $cat_title Category";
                                            }
                                        else
                                            {
                                                echo "View Posts";
                                            }
                                        break;
        
                                        case 'add_post';
                                            echo "Add Post";
                                        break;
        
                                        case 'edit_post';
                                        echo "Edit Post";
                                        break;
        
                                        default:
                                        echo "View Posts";
                                        break;
                                    }
                                }

                            ?>
                        </h1>
                    <?php 
                        if(isset($_GET['source']))
                        {
                            $source = $_GET['source'];

                            switch($source)
                            {
                                case 'view_all_posts';
                                include "includes/view_all_posts.php";
                                break;

                                case 'add_post';
                                include "includes/add_post.php";
                                break;

                                case 'edit_post';
                                include "includes/edit_post.php";
                                break;

                                default:
                                include "includes/view_all_posts.php";
                                break;
                            }
                        }


                    ?>
                        


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>