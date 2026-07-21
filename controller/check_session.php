<?php
session_start();
header('Content-Type: application/json');

$response = [
    'logged_in' => isset($_SESSION['ids']) && $_SESSION['ids'] > 0
];

echo json_encode($response);
?>