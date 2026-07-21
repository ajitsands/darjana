<?php
session_start();
require('../../model/common/common_functions.php');

class TestImageUpload
{
    var $varModelObj, $varDBConnection;
    
    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->varDBConnection->set_charset("utf8mb4");
    }
    
    function handleRequest()
    {
        $action = $_POST['action'] ?? null;
        
        switch ($action) {
            case 'test_image_upload':
                $this->testImageUpload();
                break;
            default:
                echo json_encode(['success' => false, 'message' => 'Invalid action']);
                break;
        }
    }
    
    private function compressAndCreateVariants($sourcePath, $testId) {
        if (!file_exists($sourcePath)) {
            error_log("Source image not found: $sourcePath");
            return false;
        }
    
        $dir = '../../assets/img/test_uploads/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        $baseName = $testId . '_' . time();
        $ext = '.jpg';
    
        // Load original
        $original = imagecreatefromjpeg($sourcePath);
        if (!$original) {
            error_log("Failed to load JPEG: $sourcePath");
            return false;
        }
    
        $origW = imagesx($original);
        $origH = imagesy($original);
    
        // Different size variants for testing
        $sizes = [
            'large'  => ['w' => 2400, 'h' => 3200, 'q' => 95],
            'medium' => ['w' => 1200, 'h' => 1600, 'q' => 92],
            'small'  => ['w' => 450,  'h' => 600,  'q' => 90],
        ];
    
        $savedFiles = [];
        $results = [];
    
        foreach ($sizes as $key => $spec) {
            // Calculate dimensions preserving aspect ratio
            $widthRatio = $spec['w'] / $origW;
            $heightRatio = $spec['h'] / $origH;
            $ratio = min($widthRatio, $heightRatio);
            
            $newW = round($origW * $ratio);
            $newH = round($origH * $ratio);
            
            // Create canvas
            $canvas = imagecreatetruecolor($newW, $newH);
            
            // White background
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
    
            // High-quality resampling
            imagecopyresampled(
                $canvas, $original,
                0, 0, 0, 0,
                $newW, $newH,
                $origW, $origH
            );
    
            // Apply slight sharpening
            $sharpenMatrix = array(
                array(-1, -1, -1),
                array(-1, 16, -1),
                array(-1, -1, -1)
            );
            $divisor = 8;
            $offset = 0;
            imageconvolution($canvas, $sharpenMatrix, $divisor, $offset);
    
            // Progressive JPEG
            imageinterlace($canvas, true);
            $path = $dir . $baseName . "_{$key}" . $ext;
            imagejpeg($canvas, $path, $spec['q']);
    
            // Get file size
            $fileSize = filesize($path) / 1024; // KB
            
            $results[$key] = [
                'path' => 'assets/img/test_uploads/' . basename($path),
                'size' => round($fileSize, 2),
                'width' => $newW,
                'height' => $newH
            ];
    
            imagedestroy($canvas);
            $savedFiles[$key] = basename($path);
        }
    
        imagedestroy($original);
        
        // Save to database
        $this->saveToDatabase($testId, $baseName, $results, $origW, $origH);
    
        return $results;
    }
    
    private function saveToDatabase($testId, $baseName, $results, $origW, $origH) {
        $query = "INSERT INTO test_image_uploads 
                  (test_id, original_name, base_name, large_path, large_size, large_width, large_height,
                   medium_path, medium_size, medium_width, medium_height,
                   small_path, small_size, small_width, small_height,
                   original_width, original_height, created_at) 
                  VALUES (
                      '$testId', 
                      '" . $this->varDBConnection->real_escape_string($_FILES['test_image']['name']) . "',
                      '$baseName',
                      '{$results['large']['path']}', {$results['large']['size']}, {$results['large']['width']}, {$results['large']['height']},
                      '{$results['medium']['path']}', {$results['medium']['size']}, {$results['medium']['width']}, {$results['medium']['height']},
                      '{$results['small']['path']}', {$results['small']['size']}, {$results['small']['width']}, {$results['small']['height']},
                      $origW, $origH,
                      NOW()
                  )";
        
        $this->varModelObj->AddToTable($query);
    }
    
    private function testImageUpload() {
        if (!isset($_FILES['test_image']) || $_FILES['test_image']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'No image uploaded or upload error']);
            return;
        }
        
        $targetWidth = $_POST['target_width'] ?? 1200;
        $targetHeight = $_POST['target_height'] ?? 1600;
        $quality = $_POST['quality'] ?? 0.9;
        
        $uploadDir = '../../assets/img/test_uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $testId = 'test_' . date('Ymd_His');
        $fileName = $testId . '_original.jpg';
        $filePath = $uploadDir . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($_FILES['test_image']['tmp_name'], $filePath)) {
            // Get original file info
            $originalSize = filesize($filePath) / 1024;
            list($origW, $origH) = getimagesize($filePath);
            
            // Create variants
            $variants = $this->compressAndCreateVariants($filePath, $testId);
            
            if ($variants) {
                $response = [
                    'success' => true,
                    'message' => 'Upload successful',
                    'original_url' => 'assets/img/test_uploads/' . $fileName,
                    'original_size' => round($originalSize, 2),
                    'original_width' => $origW,
                    'original_height' => $origH,
                    'large_url' => $variants['large']['path'],
                    'large_size' => $variants['large']['size'],
                    'large_width' => $variants['large']['width'],
                    'large_height' => $variants['large']['height'],
                    'medium_url' => $variants['medium']['path'],
                    'medium_size' => $variants['medium']['size'],
                    'medium_width' => $variants['medium']['width'],
                    'medium_height' => $variants['medium']['height'],
                    'small_url' => $variants['small']['path'],
                    'small_size' => $variants['small']['size'],
                    'small_width' => $variants['small']['width'],
                    'small_height' => $variants['small']['height']
                ];
                
                echo json_encode($response);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to create variants']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file']);
        }
    }
}



// Handle request
$handler = new TestImageUpload();
$handler->handleRequest();
?>