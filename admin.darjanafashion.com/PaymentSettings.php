<?php
/**
 * Direct Entry Point for Payment Gateway Settings
 * URL: https://admin.darjanafashion.com/PaymentSettings.php
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/view/payment_settings.php');
?>
