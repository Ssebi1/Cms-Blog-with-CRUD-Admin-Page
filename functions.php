<?php
    
    function escape($string)
    {
        global $connection;
        return mysqli_real_escape_string($connection,trim($string));
    }

    function is_admin($username)
    {
        global $connection;

        $query = "SELECT user_role FROM users WHERE username = '$username' ";
        $result = mysqli_query($connection,$query);

        if(!$result)
            die("Query failed. " . mysqli_error($connection));

        $row = mysqli_fetch_assoc($result);
        if($row['user_role']=='admin')
            return true;
        else
            return false;
    }

    function duplicate_user($user)
    {
        global $connection;

        $query = "SELECT username FROM users WHERE username = '$user' ";
        $find_duplicate_user = mysqli_query($connection, $query);
        $count_duplicate_user=mysqli_num_rows($find_duplicate_user);

        if($count_duplicate_user>0)
            return true;
        return false;
    }

    function duplicate_email($email)
    {
        global $connection;

        $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
        $find_duplicate_email = mysqli_query($connection, $query);
        $count_duplicate_email=mysqli_num_rows($find_duplicate_email);

        if($count_duplicate_email>0)
            return true;
        return false;
    }

?>

