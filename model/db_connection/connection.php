<?php
class DBConnection
{
    function ConnectToMYSQL()
    {
        $con = mysqli_connect("localhost","darjanafashion_user","s@nds1@b","darjanafashion_db");
        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            return false;
        }
        
        // Set UTF-8 charset for Arabic support
        mysqli_set_charset($con, "utf8mb4");
        
        // Alternative method:
        // $con->set_charset("utf8mb4");
        
        // Optional: Set timezone if needed
        // mysqli_query($con, "SET time_zone = '+03:00'");
        
        return $con;
    }
}
?>