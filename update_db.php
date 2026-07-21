<?php
/**
 * Database Migration Script for Live Server
 * Visit: https://darjanafashion.com/update_db.php to run database updates on live server
 */

require_once(__DIR__ . '/model/db_connection/connection.php');

$dbConn = new DBConnection();
$con = $dbConn->ConnectToMYSQL();

if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Check if api_response column exists in order_details table
$check = mysqli_query($con, "SHOW COLUMNS FROM `order_details` LIKE 'api_response'");

if ($check && mysqli_num_rows($check) == 0) {
    $sql = "ALTER TABLE `order_details` ADD COLUMN `api_response` LONGTEXT NULL AFTER `payment_date`";
    if (mysqli_query($con, $sql)) {
        echo "<div style='font-family:sans-serif; padding:20px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:5px;'>";
        echo "<h2>✅ Database Update Successful!</h2>";
        echo "<p>The <strong>api_response</strong> column has been added to the <strong>order_details</strong> table on your live server.</p>";
        echo "</div>";
    } else {
        echo "<div style='font-family:sans-serif; padding:20px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:5px;'>";
        echo "<h2>❌ Database Update Error:</h2>";
        echo "<p>" . mysqli_error($con) . "</p>";
        echo "</div>";
    }
} else {
    echo "<div style='font-family:sans-serif; padding:20px; background:#d1ecf1; color:#0c5460; border:1px solid #bee5eb; border-radius:5px;'>";
    echo "<h2>ℹ️ Column Already Exists!</h2>";
    echo "<p>The <strong>api_response</strong> column is already present in your <strong>order_details</strong> table on the live server.</p>";
    echo "</div>";
}
?>
