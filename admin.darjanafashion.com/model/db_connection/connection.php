<?php
class DBConnection
{
    function ConnectToMYSQL()
    {
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        // Environment detection: Local vs Live Server
        if (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false) {
            // Local environment
            $con = mysqli_connect("127.0.0.1", "root", "S@nds1@b", "darjanafasion");
        } else {
            // Live server environment
            $con = mysqli_connect("localhost", "darjanafashion_user", "s@nds1@b", "darjanafashion_db");
        }

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            return false;
        }

        mysqli_query($con, "SET SESSION sql_mode = ''");
        mysqli_set_charset($con, "utf8mb4");
        return $con;
    }
}
?>
