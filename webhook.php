<?php
/**
 * GitHub Automatic Deployment Webhook Script
 * Live URL: https://darjanafashion.com/webhook.php
 */

// Define a secret key to prevent unauthorized calls (Change this to a strong secret key)
define('WEBHOOK_SECRET', 'DarjanaSecretKey2026');

// Validate GitHub SHA256 Signature
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload   = file_get_contents('php://input');

if (WEBHOOK_SECRET && $signature) {
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, WEBHOOK_SECRET);
    if (!hash_equals($expected_signature, $signature)) {
        http_response_code(403);
        die('Access Denied: Invalid signature token.');
    }
}

// Decode event payload
$data = json_decode($payload, true);

// Execute git pull when code is pushed to main branch
if (isset($data['ref']) && $data['ref'] === 'refs/heads/main') {
    // Execute git pull from your website root
    $output = shell_exec('git pull origin main 2>&1');
    
    // Log deployment
    file_put_contents(__DIR__ . '/deploy.log', date('[Y-m-d H:i:s] ') . "Deployment result: " . $output . "\n", FILE_APPEND);
    
    echo "Deployment successful:\n" . $output;
} else {
    echo "Notification received (Non-main branch or non-push event).";
}
