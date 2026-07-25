<?php
/**
 * Fast Direct GitHub Sync Script
 * Live URL: https://darjanafashion.com/sync.php?key=DarjanaSecretKey2026
 */

@set_time_limit(300);
@ini_set('memory_limit', '512M');

function perform_github_sync() {
    $zipUrl = "https://codeload.github.com/ajitsands/darjana/zip/refs/heads/main";
    $zipFile = __DIR__ . '/repo_update.zip';
    $extractPath = __DIR__;

    if (!is_writable($extractPath)) {
        return "ERROR: Root directory " . $extractPath . " is not writable by web server user.";
    }

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
            "follow_location" => 1,
            "timeout" => 60
        ],
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false
        ]
    ];
    $context = stream_context_create($opts);
    $data = @file_get_contents($zipUrl, false, $context);

    if ($data && strlen($data) > 1000) {
        @file_put_contents($zipFile, $data);
    } else {
        $ch = curl_init($zipUrl);
        $fp = @fopen($zipFile, 'wb');
        if (!$fp) {
            return "ERROR: Could not create file " . $zipFile . " (permission denied).";
        }
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        fclose($fp);
    }

    if (!file_exists($zipFile)) {
        return "ERROR: Zip file repo_update.zip could not be created on server.";
    }

    $fileSize = filesize($zipFile);
    if ($fileSize < 1000) {
        $contentSample = @file_get_contents($zipFile);
        @unlink($zipFile);
        return "ERROR: Downloaded Zip file is too small ($fileSize bytes). Sample: " . htmlspecialchars(substr($contentSample, 0, 200));
    }

    if (class_exists('ZipArchive')) {
        $zip = new ZipArchive();
        $openResult = $zip->open($zipFile);
        if ($openResult === TRUE) {
            $tempExtractDir = __DIR__ . '/temp_sync_' . time();
            if (!@mkdir($tempExtractDir, 0777, true)) {
                @unlink($zipFile);
                return "ERROR: Could not create temp directory $tempExtractDir (permission denied).";
            }

            $zip->extractTo($tempExtractDir);
            $zip->close();
            @unlink($zipFile);

            $extractedFolders = glob($tempExtractDir . '/darjana-*');
            $sourceDir = !empty($extractedFolders) ? $extractedFolders[0] : $tempExtractDir;

            sync_copy_dir_recursive($sourceDir, $extractPath);

            $parallelAdminPath = dirname(__DIR__) . '/admin.darjanafashion.com';
            $sourceAdminPath   = $sourceDir . '/admin.darjanafashion.com';
            if (is_dir($parallelAdminPath) && is_dir($sourceAdminPath)) {
                sync_copy_dir_recursive($sourceAdminPath, $parallelAdminPath);
            }

            sync_delete_dir_recursive($tempExtractDir);

            return "SUCCESS: Website & Admin files synchronized cleanly from GitHub!";
        } else {
            @unlink($zipFile);
            return "ERROR: ZipArchive open failed with error code: $openResult";
        }
    } else {
        @unlink($zipFile);
        return "ERROR: PHP ZipArchive extension is disabled on server.";
    }
}

function sync_copy_dir_recursive($src, $dst) {
    if (!is_dir($src)) return;
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    $skipFolders = ['tcpdf', 'uploads', 'original', 'node_modules', '.git'];
    
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..' && $file != '.git' && $file != 'deploy.log' && $file != 'repo_update.zip') {
            $srcFile = $src . '/' . $file;
            $dstFile = $dst . '/' . $file;
            
            if (is_dir($srcFile)) {
                if (!in_array($file, $skipFolders)) {
                    sync_copy_dir_recursive($srcFile, $dstFile);
                }
            } else {
                @copy($srcFile, $dstFile);
            }
        }
    }
    closedir($dir);
}

function sync_delete_dir_recursive($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return @unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!sync_delete_dir_recursive($dir . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return @rmdir($dir);
}

// Only execute standalone key check when accessed directly via browser/HTTP
if (basename($_SERVER['SCRIPT_FILENAME'] ?? '') === 'sync.php') {
    $secret = 'DarjanaSecretKey2026';
    $providedKey = $_GET['key'] ?? $_POST['key'] ?? '';

    if ($providedKey !== $secret) {
        http_response_code(403);
        die("Access Denied: Invalid Key.");
    }

    $res = perform_github_sync();
    echo "<h2>$res</h2>";
}
?>
