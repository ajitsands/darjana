<?php
/**
 * Direct GitHub Sync Script (Works without shell_exec / exec)
 * Live URL: https://darjanafashion.com/sync.php?key=DarjanaSecretKey2026
 */

$secret = 'DarjanaSecretKey2026';
$providedKey = $_GET['key'] ?? $_POST['key'] ?? '';

if ($providedKey !== $secret) {
    http_response_code(403);
    die("Access Denied: Invalid Key.");
}

function perform_github_sync() {
    $zipUrl = "https://github.com/ajitsands/darjana/archive/refs/heads/main.zip";
    $zipFile = __DIR__ . '/repo_update.zip';
    $extractPath = __DIR__;

    $ch = curl_init($zipUrl);
    $fp = fopen($zipFile, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    fclose($fp);

    if ($httpCode !== 200 || !file_exists($zipFile) || filesize($zipFile) < 100) {
        return "Failed to download update from GitHub. HTTP Code: $httpCode";
    }

    if (class_exists('ZipArchive')) {
        $zip = new ZipArchive();
        if ($zip->open($zipFile) === TRUE) {
            $tempExtractDir = __DIR__ . '/temp_sync_' . time();
            @mkdir($tempExtractDir, 0777, true);
            $zip->extractTo($tempExtractDir);
            $zip->close();
            @unlink($zipFile);

            $extractedFolders = glob($tempExtractDir . '/darjana-*');
            $sourceDir = !empty($extractedFolders) ? $extractedFolders[0] : $tempExtractDir;

            sync_copy_dir_recursive($sourceDir, $extractPath);

            // Sync to parallel admin document root if cPanel created it outside public_html
            $parallelAdminPath = dirname(__DIR__) . '/admin.darjanafashion.com';
            $sourceAdminPath   = $sourceDir . '/admin.darjanafashion.com';
            if (is_dir($parallelAdminPath) && is_dir($sourceAdminPath)) {
                sync_copy_dir_recursive($sourceAdminPath, $parallelAdminPath);
            }

            sync_delete_dir_recursive($tempExtractDir);

            return "SUCCESS: Website files synchronized cleanly from GitHub!";
        } else {
            return "Failed to open downloaded Zip archive.";
        }
    } else {
        return "PHP ZipArchive extension is disabled on server.";
    }
}

function sync_copy_dir_recursive($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..') && $file != '.git' && $file != 'deploy.log') {
            if (is_dir($src . '/' . $file)) {
                sync_copy_dir_recursive($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function sync_delete_dir_recursive($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!sync_delete_dir_recursive($dir . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return rmdir($dir);
}

// Execute sync if called directly
$res = perform_github_sync();
echo "<h2>$res</h2>";
?>
