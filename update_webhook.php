<?php
/**
 * One-time Webhook & Sync Fix Script for Live Server
 * Visit: https://darjanafashion.com/update_webhook.php
 */

header('Content-Type: text/html; charset=utf-8');

$syncUrl = 'https://raw.githubusercontent.com/ajitsands/darjana/main/sync.php';
$webhookUrl = 'https://raw.githubusercontent.com/ajitsands/darjana/main/webhook.php';

$syncContent = @file_get_contents($syncUrl);
$webhookContent = @file_get_contents($webhookUrl);

$success = true;

if ($syncContent && strlen($syncContent) > 100) {
    if (@file_put_contents(__DIR__ . '/sync.php', $syncContent) !== false) {
        echo "<p style='color:green;'>✅ Successfully updated <strong>sync.php</strong> from GitHub!</p>";
    } else {
        echo "<p style='color:red;'>❌ Failed to write sync.php. Check file permissions.</p>";
        $success = false;
    }
} else {
    echo "<p style='color:red;'>❌ Failed to fetch sync.php from GitHub.</p>";
    $success = false;
}

if ($webhookContent && strlen($webhookContent) > 100) {
    if (@file_put_contents(__DIR__ . '/webhook.php', $webhookContent) !== false) {
        echo "<p style='color:green;'>✅ Successfully updated <strong>webhook.php</strong> from GitHub!</p>";
    } else {
        echo "<p style='color:red;'>❌ Failed to write webhook.php. Check file permissions.</p>";
        $success = false;
    }
} else {
    echo "<p style='color:red;'>❌ Failed to fetch webhook.php from GitHub.</p>";
    $success = false;
}

if ($success) {
    require_once __DIR__ . '/sync.php';
    if (function_exists('perform_github_sync')) {
        $res = perform_github_sync();
        echo "<div style='font-family:sans-serif; padding:15px; background:#d4edda; color:#155724;'><h3>Full Sync Result:</h3><p>$res</p></div>";
    }
}
?>
