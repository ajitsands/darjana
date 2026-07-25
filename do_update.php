<?php
/**
 * Direct Update Script
 * URL: https://darjanafashion.com/do_update.php?key=DarjanaSecretKey2026
 */

@set_time_limit(300);
@ini_set('memory_limit', '512M');
header('Content-Type: text/plain; charset=utf-8');

$secret = 'DarjanaSecretKey2026';
$key = $_GET['key'] ?? $_POST['key'] ?? '';

if ($key !== $secret) {
    http_response_code(403);
    die("Access Denied: Invalid Key.");
}

$zipUrl = "https://codeload.github.com/ajitsands/darjana/zip/refs/heads/main";
$zipFile = __DIR__ . '/repo_update.zip';
$extractPath = __DIR__;

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
    $fp = fopen($zipFile, 'wb');
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

if (!file_exists($zipFile) || filesize($zipFile) < 1000) {
    die("Failed to download zip update from GitHub. Filesize: " . @filesize($zipFile));
}

if (class_exists('ZipArchive')) {
    $zip = new ZipArchive();
    $res = $zip->open($zipFile);
    if ($res === TRUE) {
        $tempExtractDir = __DIR__ . '/temp_sync_' . time();
        @mkdir($tempExtractDir, 0777, true);
        $zip->extractTo($tempExtractDir);
        $zip->close();
        @unlink($zipFile);

        $extractedFolders = glob($tempExtractDir . '/darjana-*');
        $sourceDir = !empty($extractedFolders) ? $extractedFolders[0] : $tempExtractDir;

        function copy_all($src, $dst) {
            if (!is_dir($src)) return;
            @mkdir($dst, 0777, true);
            $skip = ['tcpdf', 'uploads', 'original', 'node_modules', '.git'];
            $dir = opendir($src);
            while (false !== ($file = readdir($dir))) {
                if ($file != '.' && $file != '..' && $file != '.git' && $file != 'deploy.log' && $file != 'repo_update.zip') {
                    $s = $src . '/' . $file;
                    $d = $dst . '/' . $file;
                    if (is_dir($s)) {
                        if (!in_array($file, $skip)) {
                            copy_all($s, $d);
                        }
                    } else {
                        @copy($s, $d);
                    }
                }
            }
            closedir($dir);
        }

        function del_all($dir) {
            if (!file_exists($dir)) return true;
            if (!is_dir($dir)) return @unlink($dir);
            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') continue;
                if (!del_all($dir . DIRECTORY_SEPARATOR . $item)) return false;
            }
            return @rmdir($dir);
        }

        copy_all($sourceDir, $extractPath);

        $parallelAdminPath = dirname(__DIR__) . '/admin.darjanafashion.com';
        $sourceAdminPath   = $sourceDir . '/admin.darjanafashion.com';
        if (is_dir($parallelAdminPath) && is_dir($sourceAdminPath)) {
            copy_all($sourceAdminPath, $parallelAdminPath);
        }

        del_all($tempExtractDir);

        echo "SUCCESS: All files successfully synchronized from GitHub!";
    } else {
        @unlink($zipFile);
        echo "ZipArchive open failed with error code: $res";
    }
} else {
    echo "ZipArchive class does not exist on server.";
}
?>
