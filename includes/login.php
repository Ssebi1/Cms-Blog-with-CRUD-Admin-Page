<?php include "../functions.php"; ?>
<?php 
    include "db.php";
    session_start();

    if(isset($_POST['login']))
    {
        $username=escape($_POST['username']);
        $password=escape($_POST['password']);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection,$query);

        if(!$select_user_query)
            die("Query failed. " .mysqli_error($connection));

        while($row = mysqli_fetch_array($select_user_query))
        {
            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_password = $row['user_password'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
            $db_email = $row['user_email'];
        }

        if(empty($db_id))
            {
                header("Location: ../index.php?validation=1");
            }
        else if(empty($username) || empty($password))
            {
                header("Location: ../index.php?validation=2");
            }
        else if($username !== $db_username || !password_verify($password,$db_password))
            {
                header("Location: ../index.php?validation=3");
            }
        else if($username === $db_username && password_verify($password,$db_password))
            {
                $_SESSION['username'] = $db_username; 
                $_SESSION['firstname'] = $db_firstname; 
                $_SESSION['lastname'] = $db_lastname; 
                $_SESSION['user_role'] = $db_role;
                $_SESSION['user_email'] = $db_email; 

                header("Location: ../index.php");
            }
    }