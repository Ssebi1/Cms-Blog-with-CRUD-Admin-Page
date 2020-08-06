<?php
include "includes/db.php";
include "includes/header.php";
        if(isset($_POST['submit']))
        {
            $firstname = escape($_POST['firstname']);
            $lastname = escape($_POST['lastname']);
            $username = escape($_POST['username']);
            $password = escape($_POST['password']);
            $email = escape($_POST['email']);

            $password = password_hash($password,PASSWORD_BCRYPT,array('cost' => 10));

            //Duplicate User
            $query = "SELECT * FROM users WHERE username = '$username' ";
            $find_duplicate_user = mysqli_query($connection, $query);
            $count_duplicate_user=mysqli_num_rows($find_duplicate_user);

            //Duplicate Email
            $query = "SELECT * FROM users WHERE user_email = '$email' ";
            $find_duplicate_email = mysqli_query($connection, $query);
            $count_duplicate_email=mysqli_num_rows($find_duplicate_email);

            if(empty($username) || empty($password) || empty($email))
            {
                ?>
                    <div class="alert alert-danger alert-dismissible fade in center-block" style="width: 50%;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>Fields cannot pe empty.</p>
                    </div>
                <?php
            }
            else if($count_duplicate_user > 0 || $count_duplicate_email> 0)
            {
                if($count_duplicate_user > 0)
                {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade in center-block" style="width: 50%;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>Username is not available.</p>
                    </div>
                    <?php
                }
                if($count_duplicate_email > 0)
                {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade in center-block" style="width: 50%;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>The email is already used for another account.</p>
                    </div>
                    <?php
                }
            }
            else
            {
                $query = "INSERT INTO users(user_firstname,user_lastname,username,user_password,user_email,user_role)" ;
                $query .="VALUES('{$firstname}','{$lastname}','{$username}','{$password}','{$email}','subscriber')" ;
                $create_user_query = mysqli_query($connection,$query);
                if(!$create_user_query) die("Query Failed." . mysqli_error($connection));

                $_SESSION['username'] = $username; 
                $_SESSION['firstname'] = $firstname; 
                $_SESSION['lastname'] = $lastname; 
                $_SESSION['user_role'] = 'subscriber';
                $_SESSION['user_email'] = $email; 

                header("Location: index.php");
            }
        }

    ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row " >
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
