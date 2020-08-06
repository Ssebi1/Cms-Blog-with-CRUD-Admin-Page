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

?>

