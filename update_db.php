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

// 1. Check if api_response column exists in order_details table
$check = mysqli_query($con, "SHOW COLUMNS FROM `order_details` LIKE 'api_response'");

if ($check && mysqli_num_rows($check) == 0) {
    mysqli_query($con, "ALTER TABLE `order_details` ADD COLUMN `api_response` LONGTEXT NULL AFTER `payment_date`");
    echo "<p style='color:green;'>✅ Added 'api_response' column to 'order_details' table.</p>";
}

// 2. Create payment_settings table
$table_sql = "CREATE TABLE IF NOT EXISTS `payment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gateway_name` varchar(50) NOT NULL DEFAULT 'AFS Invoicing Gateway',
  `base_url` varchar(255) NOT NULL DEFAULT 'https://the_system_domain',
  `username` varchar(100) NOT NULL DEFAULT 'api_user',
  `password` varchar(255) NOT NULL DEFAULT 'zWeCYbo238Mc',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (mysqli_query($con, $table_sql)) {
    $rowCheck = mysqli_query($con, "SELECT id FROM `payment_settings` WHERE id = 1");
    if ($rowCheck && mysqli_num_rows($rowCheck) == 0) {
        mysqli_query($con, "INSERT INTO `payment_settings` (`id`, `gateway_name`, `base_url`, `username`, `password`, `is_active`) VALUES (1, 'AFS Invoicing Gateway', 'https://the_system_domain', 'api_user', 'zWeCYbo238Mc', 1)");
    }
    echo "<div style='font-family:sans-serif; padding:20px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:5px;'>";
    echo "<h2>✅ Live Server Database Migration Complete!</h2>";
    echo "<p>1. <strong>api_response</strong> column updated in <strong>order_details</strong> table.</p>";
    echo "<p>2. <strong>payment_settings</strong> table created successfully.</p>";
    echo "</div>";
} else {
    echo "<p style='color:red;'>Error creating payment_settings table: " . mysqli_error($con) . "</p>";
}
?>
