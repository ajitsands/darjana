<?php
/**
 * GitHub Automatic Deployment Webhook Script
 * Live URL: https://darjanafashion.com/webhook.php
 */

header('Content-Type: text/plain; charset=utf-8');

// Define a secret key to prevent unauthorized calls
define('WEBHOOK_SECRET', 'DarjanaSecretKey2026');

// Validate GitHub SHA256 Signature
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload   = file_get_contents('php://input');

if (WEBHOOK_SECRET && $signature) {
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, WEBHOOK_SECRET);
    if (!hash_equals($expected_signature, $signature)) {
        http_response_code(403);
        exit('Access Denied: Invalid signature token.');
    }
}

// Helper function to safely execute shell commands
function execute_cmd($cmd) {
    if (function_exists('shell_exec')) {
        return shell_exec($cmd);
    } elseif (function_exists('exec')) {
        exec($cmd, $output, $ret);
        return implode("\n", $output);
    } elseif (function_exists('system')) {
        ob_start();
        system($cmd);
        return ob_get_clean();
    } elseif (function_exists('passthru')) {
        ob_start();
        passthru($cmd);
        return ob_get_clean();
    }
    return 'Error: Shell execution functions are disabled in php.ini.';
}

require_once(__DIR__ . '/sync.php');

// Decode event payload
$data = json_decode($payload, true);

// Execute git pull or PHP sync when code is pushed to main branch
if (isset($data['ref']) && $data['ref'] === 'refs/heads/main') {
    $cmd = 'git pull origin main 2>&1';
    $output = execute_cmd($cmd);
    
    // If shell execution is disabled, fallback to PHP Zip sync
    if (empty($output) || strpos($output, 'disabled') !== false || strpos($output, 'Error:') !== false) {
        $output = perform_github_sync();
    }
    
    // Log deployment
    @file_put_contents(__DIR__ . '/deploy.log', date('[Y-m-d H:i:s] ') . "Deployment result: " . $output . "\n", FILE_APPEND);
    
    http_response_code(200);
    echo "Deployment successful:\n" . $output;
} else {
    http_response_code(200);
    echo "Webhook received successfully (Event: " . ($_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'unknown') . ").";
}
?>
