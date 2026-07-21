<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// ==== CONFIGURATION ====
$accessKey = 'a10a2cc46f90689eeb1921f9a0fc00ae';
$secretKey = 'bf6746df1eaa7d13e2b52822891447820c50f52c764991edcd593ba67ab7fc50';
$bucketName = 'darjana-media';
$endpoint = 'https://315a5ab67556e0ff09bdef55562dd64b.r2.cloudflarestorage.com';

try {
    // Check if file is uploaded
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("File upload failed. Please try again.");
    }

    // Get uploaded file info
    $uploadedFilePath = $_FILES['file']['tmp_name'];
    $objectKey = $_POST['objectKey']; // Front-end path inside bucket

    // Create S3 client for R2
    $s3 = new S3Client([
        'version' => 'latest',
        'region' => 'auto',
        'endpoint' => $endpoint,
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key' => $accessKey,
            'secret' => $secretKey,
        ],
    ]);

    // Upload to R2
    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $objectKey,
        'Body'   => fopen($uploadedFilePath, 'r'),
        'ACL'    => 'public-read', // optional
    ]);

    echo "File uploaded successfully!<br>";
    echo "File URL: " . $result['ObjectURL'];

} catch (AwsException $e) {
    echo "AWS Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error Details : " . $e->getMessage();
}