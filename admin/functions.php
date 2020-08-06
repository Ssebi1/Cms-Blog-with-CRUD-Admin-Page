<?php
    
    //Function for escaping strings for security
    function escape($string)
    {
        global $connection;
        return mysqli_real_escape_string($connection,trim($string));
    }

    //Function to find the number of records from a query with a WHERE condition
    function num_of_query_where($table,$table_row,$condition)
    {
        global $connection;
        $query = "SELECT * FROM $table WHERE $table_row = '$condition' ";
        $send_query = mysqli_query($connection,$query);

        return mysqli_num_rows($send_query);
    }

    //Function to find the number of records from a query
    function num_of_query($table)
    {
        global $connection;
        $query = "SELECT * FROM $table";
        $send_query = mysqli_query($connection,$query);

        return mysqli_num_rows($send_query);
    }

?>

