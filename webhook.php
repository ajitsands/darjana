<?php
/**
 * GitHub Automatic Deployment Webhook Script
 * Live URL: https://darjanafashion.com/webhook.php
 */

header('Content-Type: text/plain; charset=utf-8');

require_once(__DIR__ . '/sync.php');

// Define a secret key to prevent unauthorized calls
define('WEBHOOK_SECRET', 'DarjanaSecretKey2026');

// Validate GitHub SHA256 Signature (if header is provided by GitHub)
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload   = file_get_contents('php://input');

if (!empty($signature) && WEBHOOK_SECRET) {
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, WEBHOOK_SECRET);
    if (!hash_equals($expected_signature, $signature)) {
        http_response_code(403);
        @file_put_contents(__DIR__ . '/deploy.log', date('[Y-m-d H:i:s] ') . "Access Denied: Invalid signature token.\n", FILE_APPEND);
        exit('Access Denied: Invalid signature token.');
    }
}

// Helper function to safely execute shell commands
function execute_cmd($cmd) {
    if (function_exists('shell_exec')) {
        return @shell_exec($cmd);
    } elseif (function_exists('exec')) {
        @exec($cmd, $output, $ret);
        return implode("\n", (array)$output);
    } elseif (function_exists('system')) {
        ob_start();
        @system($cmd);
        return ob_get_clean();
    } elseif (function_exists('passthru')) {
        ob_start();
        @passthru($cmd);
        return ob_get_clean();
    }
    return 'Error: Shell execution functions are disabled in php.ini.';
}

// Decode event payload
$data = json_decode($payload, true);

// Execute git pull or PHP sync when code is pushed
$event = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'push';
$ref   = $data['ref'] ?? '';

if ($event === 'push' || strpos($ref, 'refs/heads/') !== false || empty($payload)) {
    $output = '';
    
    // Try git pull first if git repo exists
    if (is_dir(__DIR__ . '/.git')) {
        $cmd = 'git pull origin main 2>&1';
        $output = execute_cmd($cmd);
    }

    // If git pull failed or shell execution is disabled, fallback to GitHub Zip sync
    if (empty($output) || strpos($output, 'disabled') !== false || strpos($output, 'Error:') !== false || strpos($output, 'fatal') !== false || strpos($output, 'error') !== false) {
        $syncRes = perform_github_sync();
        $output = "Git pull output: " . trim($output) . "\nSync Fallback result: " . $syncRes;
    }
    
    // Log deployment
    @file_put_contents(__DIR__ . '/deploy.log', date('[Y-m-d H:i:s] ') . "Deployment result: " . $output . "\n", FILE_APPEND);
    
    http_response_code(200);
    echo "Deployment successful:\n" . $output;
} else {
    http_response_code(200);
    echo "Webhook received successfully (Event: " . $event . ").";
}
?>
