<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require('../../model/common/common_functions.php');

class ProductController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $formdata, $attachments, $name, $tablename, $timestamp;
    public $filenames = [];
    public $userId, $vendorId, $categoryId, $categoryName, $subCategoryId, $subCategoryName,
           $productName, $productBrandName, $amountMRP, $amountSelling, $amountOffer,
           $productDescription, $warrantyDetails, $productColor, $productSize, $productImages,
           $product_ids, $new_status, $productId, $categoryImage, $effected_rows,
           $colorInsertResult, $colorUpdateResult, $sizeInsertResult, $sizeUpdateResult,
           $imageInsertResult, $imageUpdateResult, $producttags, $featuredProduct, $collectionType,$categoryName_arabic;
    public $productSpecification;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->varDBConnection->set_charset("utf8mb4");

        $this->actionevents = $_POST['action'] ?? null;
        $this->filenames = $_POST['filenames'] ?? [];
        $this->attachments = $_FILES['attachments'] ?? null;
        $this->formdata = $_POST['data'] ?? null;
        $this->tablename = $_POST['t_name'] ?? null;

        $this->userId = $_POST['user_id'] ?? null;
        $this->vendorId = $_POST['vendor_id'] ?? null;
        $this->categoryId = $_POST['category_id'] ?? null;
        $this->categoryName = $_POST['category_name'] ?? null;
        $this->categoryName_arabic = $_POST['category_name_arabic'] ?? null;
        $this->subCategoryId = $_POST['sub_category_id'] ?? null;
        $this->subCategoryName = $_POST['sub_category_name'] ?? null;
        $this->productName = $_POST['product_name'] ?? null;
        $this->productBrandName = $_POST['product_brand_name'] ?? null;
        $this->amountMRP = $_POST['amount_mrp'] ?? null;
        $this->amountSelling = $_POST['amount_selling'] ?? null;
        // $this->amountOffer = $_POST['amount_offer'] ?? null;
        $this->amountOffer = isset($_POST['amount_offer']) && is_numeric($_POST['amount_offer']) 
        ? (float)$_POST['amount_offer'] 
        : 0.00;
        $this->productDescription = isset($_POST['product_description'])
            ? $this->varDBConnection->real_escape_string($_POST['product_description'])
            : null;
        $this->warrantyDetails = $_POST['warranty_details'] ?? null;
        $this->productColor = $_POST['product_color'] ?? null;
        $this->productSize = $_POST['product_size'] ?? null;
        $this->product_length = $_POST['product_length'] ?? null;
        $this->productSpecification = $_POST['product_specification'] ?? null;
        $this->productImages = $_FILES['product_images'] ?? null;
        $this->producttags = $_POST['product_tags'] ?? null;
        $this->product_ids = $_POST['product_id'] ?? null;
        $this->new_status = $_POST['new_status'] ?? null;
        $this->productId = $_POST['deleteId'] ?? null;
        $this->categoryImage = $_FILES['category_image'] ?? null;
        $this->featuredProduct = $_POST['featured_product'] ?? 'no';
        $this->collectionType = $_POST['collection_type'] ?? '';
        $this->tax = $_POST['tax_percentage'] ?? '';
        $this->delivery_fee = $_POST['cod_fee'] ?? '';
        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array = array();

       $array[0] = "INSERT INTO product_details (
                        user_id, vendor_id, category_id, category_name, sub_category_id,
                        sub_category_name, product_name, product_name_arabic, product_brand_name, product_brand_name_arabic,
                        amount_mrp, amount_selling, amount_offer, product_description, product_description_arabic,
                        warranty_details, warranty_details_arabic, product_tags, featured, collection_type,
                        tax_percentage, cod_fee, product_video
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        
        
        $vendor_id = $_SESSION["vendor_id"] ?? 0;
        $array[1] = "SELECT * FROM product_details WHERE vendor_id = '" . $vendor_id . "' ORDER BY ids DESC";
        $array[2] = "SELECT ids FROM product_details ORDER BY ids DESC LIMIT 1;";
        $array[3] = "UPDATE product_details SET status ='" . $this->new_status . "'  WHERE ids ='" . $this->product_ids . "' ";
        $array[4] = "DELETE FROM product_details WHERE ids ='" . $this->productId . "' ";
        $array[5] = "DELETE FROM product_specification_size WHERE product_id ='" . $this->productId . "' ";
        $array[6] = "DELETE FROM product_specification_color WHERE product_id ='" . $this->productId . "' ";
        $array[7] = "DELETE FROM product_image WHERE product_id ='" . $this->productId . "' ";
        $array[8] = "SELECT * FROM product_details WHERE ids = '" . $this->product_ids . "'";
        $array[9] = "SELECT ids, product_color FROM product_specification_color WHERE product_id = '" . $this->product_ids . "'";
        $array[10] = "SELECT ids, product_size FROM product_specification_size WHERE product_id = '" . $this->product_ids . "'";
       
        $array[11] = "SELECT ids, product_image FROM product_image WHERE product_id = '" . $this->product_ids . "'";
        $array[12] = "SELECT ids, category_type FROM category_details WHERE status = 'Active'";
        $array[13] = "SELECT ids, sub_category, status FROM sub_category_details WHERE category_id = '" . $this->categoryId . "'";
        $array[14] = "INSERT INTO sub_category_details (vendor_id, category_id, sub_category) 
                     VALUES ('1', '" . $this->categoryId . "', '" . $this->subCategoryName . "')";
        $array[15] = "SELECT * FROM category_details where  ids !='0'";
        $array[16] = "UPDATE category_details SET category_type='" . $this->categoryName . "' WHERE ids ='" . $this->categoryId . "' ";
        $vendor_id = $_SESSION["vendor_id"] ?? '';
        $array[17] = "SELECT * FROM product_details WHERE vendor_id = '" . $vendor_id . "' AND featured = 'yes' ORDER BY ids DESC";
        $array[18] = "SELECT * FROM product_details WHERE vendor_id = '" . $vendor_id . "' AND collection_type = 'summer' ORDER BY ids DESC";
        $array[19] = "SELECT * FROM product_details WHERE vendor_id = '" . $vendor_id . "' AND collection_type = 'winter' ORDER BY ids DESC";
        $array[20] = "SELECT * FROM product_details WHERE vendor_id = '" . $vendor_id . "' AND collection_type = 'monsoon' ORDER BY ids DESC";
        $array[21] = "UPDATE product_details SET featured = 'no' WHERE ids = '" . $this->product_ids . "'";
        $array[22] = "UPDATE product_details SET collection_type = '' WHERE ids = '" . $this->product_ids . "'";
        $array[23] = "UPDATE product_details SET current_display = 0";
        $array[24] = "SELECT ids, product_specification, product_specification_arabic FROM product_specification_master WHERE product_id = '" . $this->product_ids . "'";
        $array[25] = "SELECT id, product_length FROM product_length_master WHERE product_id = '" . $this->product_ids . "'";
        $array[26] = "SELECT * FROM category_details where status='Active' and ids !='0'";

        return $array;
    }
    
    private function createImage($src, $dest, $w, $h) {
        try {
            $image = imagecreatefromjpeg($src);
            $tmp = imagecreatetruecolor($w, $h);
            
            $width = imagesx($image);
            $height = imagesy($image);
            
            imagecopyresampled($tmp, $image, 0, 0, 0, 0, $w, $h, $width, $height);
            imagejpeg($tmp, $dest, 90); // 90% quality
            
            imagedestroy($image);
            imagedestroy($tmp);
            
            return true;
        } catch (Exception $e) {
            error_log('Image creation error: ' . $e->getMessage());
            return false;
        }
    }
    
    private function compressAndCreateVariants($sourcePath, $productId) {
        if (!file_exists($sourcePath)) {
            error_log("Source image not found: $sourcePath");
            return false;
        }
    
        $dir = '../../assets/img/products/';
        $baseName = $productId . '_' . time();
        $ext = '.jpg';
    
        // Load original
        $original = imagecreatefromjpeg($sourcePath);
        if (!$original) {
            error_log("Failed to load JPEG: $sourcePath");
            return false;
        }
    
        $origW = imagesx($original);
        $origH = imagesy($original);
    
        // We'll create 3 sizes
        $sizes = [
            'large'  => ['w' => 1600, 'h' => 2133, 'q' => 88],
            'medium' => ['w' =>  900, 'h' => 1200, 'q' => 85],
            'small'  => ['w' =>  450, 'h' =>  600, 'q' => 82],
        ];
    
        $savedFiles = [];
    
        foreach ($sizes as $key => $spec) {
            $canvas = imagecreatetruecolor($spec['w'], $spec['h']);
            // White background
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
    
            // Better resampling
            imagecopyresampled(
                $canvas, $original,
                0, 0, 0, 0,
                $spec['w'], $spec['h'],
                $origW, $origH
            );
    
            // Progressive JPEG + compression
            imageinterlace($canvas, true);
            $path = $dir . $baseName . "_{$key}" . $ext;
            imagejpeg($canvas, $path, $spec['q']);
    
            imagedestroy($canvas);
            $savedFiles[$key] = basename($path);
        }
    
        imagedestroy($original);
    
        return $savedFiles; // ['large' => '...', 'medium' => '...', 'small' => '...']
    }
    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'add_product_details':
                
                $videoDir = '../../assets/videos/products/';
                if (!is_dir($videoDir)) {
                    mkdir($videoDir, 0777, true);
                }
                
                $videoFileName = null;
                
                if (isset($_FILES['product_video']) && $_FILES['product_video']['error'] === UPLOAD_ERR_OK) {
                    $videoFile = $_FILES['product_video'];
                    
                    // Get file extension
                    $fileExtension = strtolower(pathinfo($videoFile['name'], PATHINFO_EXTENSION));
                    
                    // Allowed formats
                    $allowedTypes = ['mp4', 'mov', 'avi', 'mkv'];
                    
                    // Max size (50MB)
                    $maxSize = 50 * 1024 * 1024;
                    
                    // Validate
                    if (!in_array($fileExtension, $allowedTypes)) {
                        echo "Error: Only MP4, MOV, AVI, MKV video formats are allowed.";
                        break;
                    }
                    
                    if ($videoFile['size'] > $maxSize) {
                        echo "Error: Video file too large. Max 50MB allowed.";
                        break;
                    }
                    
                    // Generate unique filename
                    $videoFileName = time() . '_video_' . uniqid() . '.' . $fileExtension;
                    $targetFile = $videoDir . $videoFileName;
                    
                    // Move uploaded file
                    if (move_uploaded_file($videoFile['tmp_name'], $targetFile)) {
                        // Video uploaded successfully
                        error_log("Video uploaded: " . $videoFileName);
                    } else {
                        echo "Error: Failed to upload video file.";
                        break;
                    }
                }
                
                $response = $this->varModelObj->AddToTabless($var[0], [
                    $_SESSION["ids"] ?? 0,
                    $_SESSION["vendor_id"] ?? 0,
                    $this->categoryId,
                    $this->categoryName,
                    $this->subCategoryId,
                    $this->subCategoryName,
                    $this->productName,
                    $_POST['product_name_arabic'] ?? '',
                    $this->productBrandName,
                    $_POST['product_brand_name_arabic'] ?? '',
                    $this->amountMRP,
                    $this->amountSelling,
                    $this->amountOffer,
                    $this->productDescription,
                    $_POST['product_description_arabic'] ?? '',
                    $this->warrantyDetails,
                    $_POST['warranty_details_arabic'] ?? '',
                    $this->producttags,
                    $this->featuredProduct,
                    $this->collectionType,
                    $this->tax,
                    $this->delivery_fee,
                    $videoFileName   // ✅ ADD THIS
                ], "isssssssssdddsssssssdds"); // update types also
            
                if ($response) {
                    $productData = $this->varModelObj->ListFromTable($var[2]);
                    $productData = json_decode($productData, true);
            
                    if (!empty($productData) && isset($productData[0]['ids'])) {
                        $product_id = $productData[0]['ids'];
            
                        // Insert colors
                        if (!empty($this->productColor)) {
                            foreach ($this->productColor as $color) {
                                if (!empty($color)) {
                                    $insertColorQuery = "INSERT INTO product_specification_color (product_id, product_color) 
                                                        VALUES ('$product_id', '" . $this->varDBConnection->real_escape_string($color) . "')";
                                    $this->varModelObj->AddToTable($insertColorQuery);
                                }
                            }
                        }
            
                        // Insert sizes
                        if (!empty($this->productSize)) {
                            foreach ($this->productSize as $size) {
                                if (!empty($size)) {
                                    $insertSizeQuery = "INSERT INTO product_specification_size (product_id, product_size) 
                                                       VALUES ('$product_id', '" . $this->varDBConnection->real_escape_string($size) . "')";
                                    $this->varModelObj->AddToTable($insertSizeQuery);
                                }
                            }
                        }
                        // Insert images with the exact functionality from your upload.php
                        if (!empty($this->productImages['name'][0]) && !empty($this->productImages['tmp_name'][0])) {
                            $base = '../../assets/img/products/';
                            $original = $base . 'original/';
                            $product = $base . 'product/';
                            $thumb = $base . 'thumb/';
                            
                            // Create folders if missing - exactly as in your upload.php
                            foreach([$original, $product, $thumb] as $folder){
                                if(!file_exists($folder)){
                                    mkdir($folder, 0777, true);
                                }
                            }
                            
                            $primaryImageName = $_POST['primary_image'] ?? '';
                            $firstImageSet = false;

                            foreach ($this->productImages['tmp_name'] as $key => $tmp_name) {
                                if (empty($tmp_name) || $this->productImages['error'][$key] !== 0) {
                                    continue;
                                }
                                
                                $filename = "img_" . time() . "_" . $key . ".jpg";
                                $original_path = $original . $filename;
                                
                                // Move uploaded image
                                if (move_uploaded_file($tmp_name, $original_path)) {
                                    
                                    // Generate product image 800x1300
                                    $this->createImage($original_path, $product . $filename, 800, 1300);
                                    
                                    // Generate thumbnail 400x650
                                    $this->createImage($original_path, $thumb . $filename, 400, 650);
                                    
                                    // Determine if this is the primary image
                                    // We check if the original filename (from JS) matches the primary choice
                                    $isPrimary = 0;
                                    $originalFileName = $this->productImages['name'][$key];
                                    if ($primaryImageName === $originalFileName || (!$firstImageSet && empty($primaryImageName))) {
                                        $isPrimary = 1;
                                        $firstImageSet = true;
                                    } else if (!$firstImageSet && $key === array_key_first($this->productImages['tmp_name'])) {
                                        // If no primary selected, default to first one
                                        // But wait, the key might not be 0 if some were skipped. 
                                        // Let's use a flag.
                                    }

                                    // Store in database
                                    $insertImageQuery = "INSERT INTO product_image 
                                                        (product_id, product_image, image_original, image_product, image_thumb, is_primary) 
                                                        VALUES ('$product_id', '$filename', '$filename', '$filename', '$filename', '$isPrimary')";
                                    
                                    $this->varModelObj->AddToTable($insertImageQuery);
                                }
                            }
                        }

                        
            
                        // Insert lengths
                        if (!empty($this->product_length)) {
                            foreach ($this->product_length as $prod_length) {
                                if (!empty($prod_length)) {
                                    $insertprodlengthQuery = "INSERT INTO product_length_master (product_id, product_length) 
                                                            VALUES ('$product_id', '" . $this->varDBConnection->real_escape_string($prod_length) . "')";
                                    $this->varModelObj->AddToTable($insertprodlengthQuery);
                                }
                            }
                        }
            
                        // FIXED: Insert specifications as pairs (English + Arabic)
                        $englishSpecs = $_POST['product_specification'] ?? [];
                        $arabicSpecs = $_POST['product_specification_arabic'] ?? [];
                        
                        // Process the maximum number of specifications between both arrays
                        $maxCount = max(count($englishSpecs), count($arabicSpecs));
                        
                        for ($i = 0; $i < $maxCount; $i++) {
                            $englishSpec = isset($englishSpecs[$i]) ? trim($englishSpecs[$i]) : '';
                            $arabicSpec = isset($arabicSpecs[$i]) ? trim($arabicSpecs[$i]) : '';
                            
                            // Only insert if at least one has content
                            if (!empty($englishSpec) || !empty($arabicSpec)) {
                                $englishSpec = $this->varDBConnection->real_escape_string($englishSpec);
                                $arabicSpec = $this->varDBConnection->real_escape_string($arabicSpec);
                                
                                $insertSpecQuery = "INSERT INTO product_specification_master 
                                    (product_id, product_specification, product_specification_arabic) 
                                    VALUES ('$product_id', '$englishSpec', '$arabicSpec')";
                                $this->varModelObj->AddToTable($insertSpecQuery);
                            }
                        }
            
                        echo "Success";
                    } else {
                        echo "Error fetching product ID";
                    }
                } else {
                    echo "Error";
                }
                break;

            case 'list_product_detailes':
                $data = $this->varModelObj->ListFromTable($var[1]);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                break;

            case 'list_collection_products':
                $filterType = $_POST['filter_type'] ?? '';
                $filterValue = $_POST['filter_value'] ?? '';
                $queryIndex = 1; // Default to all products

                if ($filterType === 'featured' && $filterValue === 'yes') {
                    $queryIndex = 17;
                } elseif ($filterType === 'collection_type') {
                    if ($filterValue === 'summer') {
                        $queryIndex = 18;
                    } elseif ($filterValue === 'winter') {
                        $queryIndex = 19;
                    } elseif ($filterValue === 'monsoon') {
                        $queryIndex = 20;
                    }
                }

                $data = $this->varModelObj->ListFromTable($var[$queryIndex]);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                break;
                
            case 'get_vendor_tax_cod':
                $vendorId = $_SESSION["vendor_id"] ?? 0;
                $query = "SELECT tax_percentage, cod_fee FROM vendor_details WHERE ids = '$vendorId'";
                $result = $this->varModelObj->ListFromTable($query);
                $data = json_decode($result, true);
                echo json_encode([
                    'success' => true,
                    'tax_percentage' => $data[0]['tax_percentage'] ?? '',
                    'cod_fee' => $data[0]['cod_fee'] ?? ''
                ]);
                break;

            case 'remove_from_collection':
                $productId = $_POST['product_id'] ?? null;
                $collection = $_POST['collection'] ?? null;
                $queryIndex = ($collection === 'featured') ? 21 : 22;
                $result = $this->varModelObj->UpdateTable($var[$queryIndex]);
                echo $result ? 'success' : 'error';
                break;

            case 'set_current_display':
                $collection = $_POST['collection'] ?? '';
                $this->collectionType = $collection;
                $resetResult = $this->varModelObj->UpdateTable($var[23]);

                if ($collection) {
                    $query = "UPDATE product_details SET current_display = 1 WHERE collection_type = '" . $this->collectionType . "'";
                    $setResult = $this->varModelObj->UpdateTable($query);
                    echo ($resetResult && $setResult) ? 'success' : 'error';
                } else {
                    echo $resetResult ? 'success' : 'error';
                }
                break;

            case 'update_product_status':
                $this->effected_rows = $this->varModelObj->UpdateTable($var[3]);
                echo $this->effected_rows;
                break;

            case 'delete_product':
                $deleteProduct = $this->varModelObj->DeleteRow($var[4]);

                if ($deleteProduct) {
                    $this->varModelObj->DeleteRow($var[5]);
                    $this->varModelObj->DeleteRow($var[6]);
                    $this->varModelObj->DeleteRow($var[7]);

                    echo "success";
                } else {
                    echo "failed";
                }
                exit();

            case 'get_product_details':
                $productId = $_POST['product_id'] ?? '';
                
                if (empty($productId)) {
                    echo json_encode(['success' => false, 'message' => 'Product ID is required']);
                    break;
                }
                
                // Get main product details
                $vendor_id = $_SESSION["vendor_id"] ?? 0;
                $query = "SELECT * FROM product_details WHERE ids = '$productId' AND vendor_id = '$vendor_id'";
                $productDetails = $this->varModelObj->ListFromTable($query);
                $productDetails = json_decode($productDetails, true);
                
                if (!empty($productDetails)) {
                    $productId = $productDetails[0]['ids'];
                    
                    // Get product colors
                    $colorQuery = "SELECT ids, product_color FROM product_specification_color WHERE product_id = '$productId'";
                    $productColors = $this->varModelObj->ListFromTable($colorQuery);
                    $productColors = json_decode($productColors, true);
                    $colors = array_map(function ($color) {
                        return [
                            'id' => $color['ids'],
                            'color' => $color['product_color']
                        ];
                    }, $productColors);
                    
                    // Get product sizes
                    $sizeQuery = "SELECT ids, product_size FROM product_specification_size WHERE product_id = '$productId'";
                    $productSizes = $this->varModelObj->ListFromTable($sizeQuery);
                    $productSizes = json_decode($productSizes, true);
                    $sizes = array_map(function ($size) {
                        return [
                            'id' => $size['ids'],
                            'size' => $size['product_size']
                        ];
                    }, $productSizes);
                    
                    // Get product images
                    $imageQuery = "SELECT ids, product_image, is_primary FROM product_image WHERE product_id = '$productId'";
                    $productImages = $this->varModelObj->ListFromTable($imageQuery);
                    $productImages = json_decode($productImages, true);
                    $images = array_map(function ($image) {
                        return [
                            'id' => $image['ids'],
                            'image' => $image['product_image'],
                            'is_primary' => $image['is_primary']
                        ];
                    }, $productImages);
                    
                    // Get product specifications (English + Arabic)
                    $specQuery = "SELECT ids, product_specification, product_specification_arabic 
                                 FROM product_specification_master 
                                 WHERE product_id = '$productId'";
                    $productSpecs = $this->varModelObj->ListFromTable($specQuery);
                    $productSpecs = json_decode($productSpecs, true);
                    $specifications = array_map(function ($spec) {
                        return [
                            'id' => $spec['ids'],
                            'specification' => $spec['product_specification'],
                            'specification_arabic' => $spec['product_specification_arabic']
                        ];
                    }, $productSpecs);
                    
                    // Get product lengths
                    $lengthQuery = "SELECT id, product_length FROM product_length_master 
                                   WHERE product_id = '$productId'";
                    $productLengths = $this->varModelObj->ListFromTable($lengthQuery);
                    $productLengths = json_decode($productLengths, true);
                    $lengths = array_map(function ($length) {
                        return [
                            'id' => $length['id'],
                            'length' => $length['product_length']
                        ];
                    }, $productLengths);
                    
                    // Build response with video data
                    $response = [
                        'success' => true,
                        'data' => [
                            'product_details' => [
                                'ids' => $productDetails[0]['ids'],
                                'user_id' => $productDetails[0]['user_id'],
                                'vendor_id' => $productDetails[0]['vendor_id'],
                                'category_id' => $productDetails[0]['category_id'],
                                'category_name' => $productDetails[0]['category_name'],
                                'sub_category_id' => $productDetails[0]['sub_category_id'],
                                'sub_category_name' => $productDetails[0]['sub_category_name'],
                                'product_name' => $productDetails[0]['product_name'],
                                'product_name_arabic' => $productDetails[0]['product_name_arabic'],
                                'product_brand_name' => $productDetails[0]['product_brand_name'],
                                'product_brand_name_arabic' => $productDetails[0]['product_brand_name_arabic'],
                                'amount_mrp' => $productDetails[0]['amount_mrp'],
                                'amount_selling' => $productDetails[0]['amount_selling'],
                                'amount_offer' => $productDetails[0]['amount_offer'],
                                'product_description' => $productDetails[0]['product_description'],
                                'product_description_arabic' => $productDetails[0]['product_description_arabic'],
                                'warranty_details' => $productDetails[0]['warranty_details'],
                                'warranty_details_arabic' => $productDetails[0]['warranty_details_arabic'],
                                'product_tags' => $productDetails[0]['product_tags'],
                                'featured' => $productDetails[0]['featured'],
                                'collection_type' => $productDetails[0]['collection_type'],
                                'tax_percentage' => $productDetails[0]['tax_percentage'],
                                'cod_fee' => $productDetails[0]['cod_fee'],
                                'status' => $productDetails[0]['status'],
                                'product_video' => $productDetails[0]['product_video'] ?? null,
                                'product_video_url' => !empty($productDetails[0]['product_video']) 
                                    ? '../../assets/videos/products/' . $productDetails[0]['product_video'] 
                                    : null
                            ],
                            'product_colors' => $colors,
                            'product_sizes' => $sizes,
                            'product_images' => $images,
                            'product_specifications' => $specifications,
                            'product_lengths' => $lengths
                        ]
                    ];
                    
                    echo json_encode($response);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Product not found or access denied']);
                }
                break;

            case 'update_category_status':
                $categoryId = $_POST['category_id'];
                $newStatus = $_POST['new_status'];
                $query = "UPDATE category_details SET status = '$newStatus' WHERE ids = '$categoryId'";
                $this->varModelObj->UpdateTable($query);
                echo 'success';
                break;

            case 'update_subcategory_status':
                $subCategoryId = $_POST['sub_category_id'];
                $newStatus = $_POST['new_status'];
                $query = "UPDATE sub_category_details SET status = '$newStatus' WHERE ids = '$subCategoryId'";
                $this->varModelObj->UpdateTable($query);
                echo 'success';
                break;

            case 'get_category_details':
                $categoryId = $_POST['category_id'];
                $query = "SELECT * FROM category_details WHERE ids = '$categoryId'";
                $category = $this->varModelObj->ListFromTable($query);
                echo $category;
                break;

            case 'get_subcategory_details':
                $subCategoryId = $_POST['sub_category_id'];
                $query = "SELECT * FROM sub_category_details WHERE ids = '$subCategoryId'";
                $subCategory = $this->varModelObj->ListFromTable($query);
                echo $subCategory;
                break;

            case 'update_product_details':
                // Log received data for debugging
                error_log("UPDATE PRODUCT: Received POST data: " . print_r($_POST, true));
                error_log("UPDATE PRODUCT: Received FILES data: " . print_r($_FILES, true));
                
                // Get all POST data
                $productId = $_POST['product_id'] ?? '';
                
                if (empty($productId)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Product ID is required'
                    ]);
                    break;
                }
                
                $productName = $_POST['product_name'] ?? '';
                $productNameArabic = $_POST['product_name_arabic'] ?? '';
                $categoryName = $_POST['category_name'] ?? '';
                $subCategoryName = $_POST['sub_category_name'] ?? '';
                $productBrandName = $_POST['product_brand_name'] ?? '';
                $productBrandNameArabic = $_POST['product_brand_name_arabic'] ?? '';
                $amountMRP = $_POST['amount_mrp'] ?? 0;
                $amountSelling = $_POST['amount_selling'] ?? 0;
                $amountOffer = $_POST['amount_offer'] ?? 0;
                $productDescription = $_POST['product_description'] ?? '';
                $productDescriptionArabic = $_POST['product_description_arabic'] ?? '';
                $warrantyDetails = $_POST['warranty_details'] ?? '';
                $warrantyDetailsArabic = $_POST['warranty_details_arabic'] ?? '';
                $productTags = $_POST['product_tags'] ?? '';
                $featuredProduct = $_POST['featured_product'] ?? 'no';
                $collectionType = $_POST['collection_type'] ?? '';
                $taxPercentage = $_POST['tax_percentage'] ?? 0;
                $codFee = $_POST['cod_fee'] ?? 0;
                $categoryId = $_POST['category_id'] ?? 0;
                $subCategoryId = $_POST['sub_category_id'] ?? 0;
                
                // Check if product exists first
                $checkQuery = "SELECT ids FROM product_details WHERE ids = '$productId'";
                $checkResult = $this->varModelObj->ListFromTable($checkQuery);
                $checkData = json_decode($checkResult, true);
                
                if (empty($checkData)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Product not found with ID: ' . $productId
                    ]);
                    break;
                }
                
                // Escape strings
                $productDescription = $this->varDBConnection->real_escape_string($productDescription);
                $productDescriptionArabic = $this->varDBConnection->real_escape_string($productDescriptionArabic);
                $categoryName = $this->varDBConnection->real_escape_string($categoryName);
                $subCategoryName = $this->varDBConnection->real_escape_string($subCategoryName);
                $productName = $this->varDBConnection->real_escape_string($productName);
                $productNameArabic = $this->varDBConnection->real_escape_string($productNameArabic);
                $productBrandName = $this->varDBConnection->real_escape_string($productBrandName);
                $productBrandNameArabic = $this->varDBConnection->real_escape_string($productBrandNameArabic);
                $warrantyDetails = $this->varDBConnection->real_escape_string($warrantyDetails);
                $warrantyDetailsArabic = $this->varDBConnection->real_escape_string($warrantyDetailsArabic);
                $productTags = $this->varDBConnection->real_escape_string($productTags);
                $collectionType = $this->varDBConnection->real_escape_string($collectionType);
                
                // Handle video upload
                $videoFileName = null;
                $videoDir = '../../assets/videos/products/';
                
                // Check if new video is uploaded
                if (isset($_FILES['product_video']) && $_FILES['product_video']['error'] === UPLOAD_ERR_OK) {
                    $videoFile = $_FILES['product_video'];
                    
                    // Get file extension
                    $fileExtension = strtolower(pathinfo($videoFile['name'], PATHINFO_EXTENSION));
                    
                    // Allowed formats
                    $allowedTypes = ['mp4', 'mov', 'avi', 'mkv'];
                    
                    // Max size (50MB)
                    $maxSize = 50 * 1024 * 1024;
                    
                    // Validate
                    if (!in_array($fileExtension, $allowedTypes)) {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Only MP4, MOV, AVI, MKV video formats are allowed.'
                        ]);
                        break;
                    }
                    
                    if ($videoFile['size'] > $maxSize) {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Video file too large. Max 50MB allowed.'
                        ]);
                        break;
                    }
                    
                    // Get current product video to delete old one
                    $getOldVideoQuery = "SELECT product_video FROM product_details WHERE ids = '$productId'";
                    $oldVideoResult = $this->varModelObj->ListFromTable($getOldVideoQuery);
                    $oldVideoData = json_decode($oldVideoResult, true);
                    
                    // Delete old video file if exists
                    if (!empty($oldVideoData) && !empty($oldVideoData[0]['product_video'])) {
                        $oldVideoPath = $videoDir . $oldVideoData[0]['product_video'];
                        if (file_exists($oldVideoPath)) {
                            unlink($oldVideoPath);
                            error_log("Deleted old video: " . $oldVideoPath);
                        }
                    }
                    
                    // Create directory if not exists
                    if (!is_dir($videoDir)) {
                        mkdir($videoDir, 0777, true);
                    }
                    
                    // Generate unique filename
                    $videoFileName = time() . '_video_' . uniqid() . '.' . $fileExtension;
                    $targetFile = $videoDir . $videoFileName;
                    
                    // Move uploaded file
                    if (move_uploaded_file($videoFile['tmp_name'], $targetFile)) {
                        error_log("Video uploaded for update: " . $videoFileName);
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Failed to upload video file.'
                        ]);
                        break;
                    }
                }
                
                // Build update query with video field conditionally
                $updateQuery = "UPDATE product_details SET
                    category_id = '$categoryId',
                    category_name = '$categoryName',
                    product_name = '$productName',
                    product_name_arabic = '$productNameArabic',
                    product_brand_name = '$productBrandName',
                    product_brand_name_arabic = '$productBrandNameArabic',
                    amount_mrp = '$amountMRP',
                    amount_selling = '$amountSelling',
                    amount_offer = '$amountOffer',
                    product_description = '$productDescription',
                    product_description_arabic = '$productDescriptionArabic',
                    warranty_details = '$warrantyDetails',
                    warranty_details_arabic = '$warrantyDetailsArabic',
                    product_tags = '$productTags',
                    featured = '$featuredProduct',
                    collection_type = '$collectionType',
                    tax_percentage = '$taxPercentage',
                    cod_fee = '$codFee',
                    added_date = NOW()";
                
                // Add video field to query if new video uploaded
                if ($videoFileName !== null) {
                    $updateQuery .= ", product_video = '$videoFileName'";
                }
                
                $updateQuery .= " WHERE ids = '$productId'";
                
                error_log("UPDATE PRODUCT: Query: " . $updateQuery);
                
                // Execute the update query directly using mysqli to get better error information
                $updateResult = $this->varDBConnection->query($updateQuery);
                
                if ($updateResult === false) {
                    // Log the MySQL error
                    error_log("MySQL Error: " . $this->varDBConnection->error);
                    error_log("Failed Query: " . $updateQuery);
                    
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Database error: ' . $this->varDBConnection->error,
                        'query' => $updateQuery
                    ]);
                    break;
                }
                
                $affectedRows = $this->varDBConnection->affected_rows;
                error_log("UPDATE PRODUCT: Affected rows: " . $affectedRows);
                
                // Track all update results
                $allResults = [];
                $allResults['main_product'] = $affectedRows;
                
                // Update or insert colors
                if (!empty($_POST['product_color'])) {
                    foreach ($_POST['product_color'] as $index => $color) {
                        $colorId = $_POST['product_color_id'][$index] ?? null;
                        $color = $this->varDBConnection->real_escape_string($color);
                       
                        if (!empty($color)) {
                            if ($colorId) {
                                $colorQuery = "UPDATE product_specification_color
                                             SET product_color = '$color'
                                             WHERE ids = '$colorId' AND product_id = '$productId'";
                                $result = $this->varDBConnection->query($colorQuery);
                                $allResults['color_update_' . $index] = $result ? $this->varDBConnection->affected_rows : -1;
                                error_log("Color update result: " . ($result ? 'success' : 'failed'));
                            } else {
                                $colorQuery = "INSERT INTO product_specification_color
                                             (product_id, product_color)
                                             VALUES ('$productId', '$color')";
                                $result = $this->varDBConnection->query($colorQuery);
                                $allResults['color_insert_' . $index] = $result ? 1 : -1;
                                error_log("Color insert result: " . ($result ? 'success' : 'failed'));
                            }
                        }
                    }
                }
                
                // Update or insert sizes
                if (!empty($_POST['product_size'])) {
                    foreach ($_POST['product_size'] as $index => $size) {
                        $sizeId = $_POST['product_size_id'][$index] ?? null;
                        $size = $this->varDBConnection->real_escape_string($size);
                       
                        if (!empty($size)) {
                            if ($sizeId) {
                                $sizeQuery = "UPDATE product_specification_size
                                            SET product_size = '$size'
                                            WHERE ids = '$sizeId' AND product_id = '$productId'";
                                $result = $this->varDBConnection->query($sizeQuery);
                                $allResults['size_update_' . $index] = $result ? $this->varDBConnection->affected_rows : -1;
                                error_log("Size update result: " . ($result ? 'success' : 'failed'));
                            } else {
                                $sizeQuery = "INSERT INTO product_specification_size
                                            (product_id, product_size)
                                            VALUES ('$productId', '$size')";
                                $result = $this->varDBConnection->query($sizeQuery);
                                $allResults['size_insert_' . $index] = $result ? 1 : -1;
                                error_log("Size insert result: " . ($result ? 'success' : 'failed'));
                            }
                        }
                    }
                }
                
                // Handle Primary Image logic
                $primaryImageChoice = $_POST['primary_image'] ?? '';
                // Reset all images for this product to non-primary
                $this->varDBConnection->query("UPDATE product_image SET is_primary = 0 WHERE product_id = '$productId'");
                
                if (!empty($primaryImageChoice) && is_numeric($primaryImageChoice)) {
                    // It's an existing image ID
                    $this->varDBConnection->query("UPDATE product_image SET is_primary = 1 WHERE ids = '$primaryImageChoice' AND product_id = '$productId'");
                }
                
                // Update or insert images
                if (!empty($_FILES['product_images']) && isset($_FILES['product_images']['tmp_name'][0]) && !empty($_FILES['product_images']['tmp_name'][0])) {
                    $base = '../../assets/img/products/';
                    $original = $base . 'original/';
                    $product = $base . 'product/';
                    $thumb = $base . 'thumb/';
                   
                    // Create folders if missing
                    foreach([$original, $product, $thumb] as $folder){
                        if(!file_exists($folder)){
                            mkdir($folder, 0777, true);
                        }
                    }
                   
                    foreach ($_FILES['product_images']['tmp_name'] as $index => $tmpName) {
                        if (!empty($tmpName) && $_FILES['product_images']['error'][$index] === 0) {
                            $imageId = $_POST['product_image_ids_with_files'][$index] ?? null;
                           
                            $filename = "img_" . time() . "_" . $index . ".jpg";
                            $original_path = $original . $filename;
                           
                            if (move_uploaded_file($tmpName, $original_path)) {
                               
                                // Generate product image 800x1300
                                $this->createImage($original_path, $product . $filename, 800, 1300);
                               
                                // Generate thumbnail 400x650
                                $this->createImage($original_path, $thumb . $filename, 400, 650);
                               
                                if ($imageId) {
                                    // Update existing image
                                    $imageQuery = "UPDATE product_image
                                                 SET product_image = '$filename',
                                                     image_original = '$filename',
                                                     image_product = '$filename',
                                                     image_thumb = '$filename'
                                                 WHERE ids = '$imageId' AND product_id = '$productId'";
                                    $result = $this->varDBConnection->query($imageQuery);
                                    $allResults['image_update_' . $index] = $result ? $this->varDBConnection->affected_rows : -1;
                                    error_log("Image update result: " . ($result ? 'success' : 'failed'));
                                    
                                    // If this updated image was the primary choice (by index/filename)
                                    if ($primaryImageChoice === $_FILES['product_images']['name'][$index]) {
                                        $this->varDBConnection->query("UPDATE product_image SET is_primary = 1 WHERE ids = '$imageId'");
                                    }
                                } else {
                                    // Insert new image
                                    $isPrimary = ($primaryImageChoice === $_FILES['product_images']['name'][$index]) ? 1 : 0;
                                    $imageQuery = "INSERT INTO product_image
                                                 (product_id, product_image, image_original, image_product, image_thumb, is_primary)
                                                 VALUES ('$productId', '$filename', '$filename', '$filename', '$filename', '$isPrimary')";
                                    $result = $this->varDBConnection->query($imageQuery);
                                    $allResults['image_insert_' . $index] = $result ? 1 : -1;
                                    error_log("Image insert result: " . ($result ? 'success' : 'failed'));
                                }
                            }
                        }
                    }
                }
                
                // Update or insert specifications (English + Arabic)
                if (!empty($_POST['product_specification'])) {
                    foreach ($_POST['product_specification'] as $index => $specEnglish) {
                        $specId = $_POST['product_specification_id'][$index] ?? null;
                        $specArabic = $_POST['product_specification_arabic'][$index] ?? '';
                       
                        $specEnglish = $this->varDBConnection->real_escape_string($specEnglish);
                        $specArabic = $this->varDBConnection->real_escape_string($specArabic);
                       
                        if (!empty($specEnglish) || !empty($specArabic)) {
                            if ($specId) {
                                $specQuery = "UPDATE product_specification_master
                                            SET product_specification = '$specEnglish',
                                                product_specification_arabic = '$specArabic'
                                            WHERE ids = '$specId' AND product_id = '$productId'";
                                $result = $this->varDBConnection->query($specQuery);
                                $allResults['spec_update_' . $index] = $result ? $this->varDBConnection->affected_rows : -1;
                                error_log("SPEC update (ID: $specId): " . ($result ? 'success' : 'failed'));
                            } else {
                                $specQuery = "INSERT INTO product_specification_master
                                            (product_id, product_specification, product_specification_arabic)
                                            VALUES ('$productId', '$specEnglish', '$specArabic')";
                                $result = $this->varDBConnection->query($specQuery);
                                $allResults['spec_insert_' . $index] = $result ? 1 : -1;
                                error_log("SPEC insert: " . ($result ? 'success' : 'failed'));
                            }
                        }
                    }
                }
                
                // Update or insert lengths
                if (!empty($_POST['product_length'])) {
                    foreach ($_POST['product_length'] as $index => $length) {
                        $lengthId = $_POST['product_length_id'][$index] ?? null;
                        $length = $this->varDBConnection->real_escape_string($length);
                       
                        if (!empty($length)) {
                            if ($lengthId) {
                                $lengthQuery = "UPDATE product_length_master
                                              SET product_length = '$length'
                                              WHERE id = '$lengthId' AND product_id = '$productId'";
                                $result = $this->varDBConnection->query($lengthQuery);
                                $allResults['length_update_' . $index] = $result ? $this->varDBConnection->affected_rows : -1;
                                error_log("Length update result: " . ($result ? 'success' : 'failed'));
                            } else {
                                $lengthQuery = "INSERT INTO product_length_master
                                              (product_id, product_length)
                                              VALUES ('$productId', '$length')";
                                $result = $this->varDBConnection->query($lengthQuery);
                                $allResults['length_insert_' . $index] = $result ? 1 : -1;
                                error_log("Length insert result: " . ($result ? 'success' : 'failed'));
                            }
                        }
                    }
                }
                
                error_log("UPDATE PRODUCT: All results: " . print_r($allResults, true));
                
                // Check if any changes were made
                $anyChange = false;
                
                // Main product update
                if ($allResults['main_product'] > 0) {
                    $anyChange = true;
                }
                
                // Check other updates
                foreach ($allResults as $key => $val) {
                    if (strpos($key, '_update_') !== false || strpos($key, '_insert_') !== false) {
                        if ($val > 0) {
                            $anyChange = true;
                            break;
                        }
                    }
                }
                
                if ($anyChange) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Product updated successfully',
                        'results' => $allResults
                    ]);
                } else {
                    // If no changes were made but main_product is -1, it might be an error
                    if ($allResults['main_product'] == -1) {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Database error occurred while updating product',
                            'results' => $allResults
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'No changes were made to the product',
                            'results' => $allResults
                        ]);
                    }
                }
                break;

            case 'delete_item':
                $itemId = $_POST['item_id'];
                $itemType = $_POST['item_type'];

                switch ($itemType) {
                    case 'product_color[]':
                        $deleteQuery = "DELETE FROM product_specification_color WHERE ids = '$itemId'";
                        break;
                    case 'product_size[]':
                        $deleteQuery = "DELETE FROM product_specification_size WHERE ids = '$itemId'";
                        break;
                    case 'product_images[]':
                        $deleteQuery = "DELETE FROM product_image WHERE ids = '$itemId'";
                        break;
                    case 'product_specification[]':
                        $deleteQuery = "DELETE FROM product_specification_master WHERE ids = '$itemId'";
                        break;
                        
                    case 'product_length[]':
                        $deleteQuery = "DELETE FROM product_length_master WHERE id = '$itemId'";
                        break;
                    default:
                        echo 'failed';
                        exit();
                }

                $deleteResult = $this->varModelObj->DeleteRow($deleteQuery);
                if ($deleteResult) {
                    echo 'success';
                } else {
                    echo 'failed';
                }
                break;

            case 'fetch_categories':
                $categories = $this->varModelObj->ListFromTable($var[15]);
                echo json_encode(json_decode($categories, true));
                break;
                
               case 'fetch_categories_active':
                $categories = $this->varModelObj->ListFromTable($var[26]);
                echo json_encode(json_decode($categories, true));
                break;    
                

            case 'fetch_sub_categories':
                $subCategories = $this->varModelObj->ListFromTable($var[13]);
                echo json_encode(json_decode($subCategories, true));
                break;

            case 'add_new_category':
                $categoryName = $_POST['category_name'] ?? '';
                $this->categoryImage = $_FILES['category_image'] ?? null;

                if ($this->categoryImage && $this->categoryImage['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../../assets/img/categories/';
                    $fileName = time() . '_' . basename($this->categoryImage['name']);
                    $filePath = $uploadDir . $fileName;

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    if (move_uploaded_file($this->categoryImage['tmp_name'], $filePath)) {
                        $query = "INSERT INTO category_details (vendor_id, category_type,category_name_ar, category_image) 
                                 VALUES ('1', '" . $categoryName . "','".$categoryName_arabic."' ,'$fileName')";
                        $this->varModelObj->AddToTable($query);
                        echo 'success';
                    } else {
                        echo 'failed to move file';
                    }
                } else {
                    echo 'error: no image uploaded';
                }
                break;

            case 'add_new_sub_category':
                $this->varModelObj->AddToTable($var[14]);
                echo 'success';
                break;

            case 'update_category':
                $categoryId = $_POST['category_id'];
                $categoryName = $_POST['category_name'];
                $categoryNameArabic = $_POST['category_name_arabic'];
                $categoryImage = $_FILES['category_image'] ?? null;

                $fileName = '';
                if ($categoryImage && $categoryImage['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../../assets/img/categories/';
                    $fileName = time() . '_' . basename($categoryImage['name']);
                    $filePath = $uploadDir . $fileName;

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    move_uploaded_file($categoryImage['tmp_name'], $filePath);
                }

                $query = "UPDATE category_details SET 
                         category_type = '" . $categoryName . "',category_name_ar='".$categoryNameArabic."'";

                if (!empty($fileName)) {
                    $query .= ", category_image = '" . $fileName . "'";
                }

                $query .= " WHERE ids = '" . $categoryId . "'";
                
                $result = $this->varModelObj->UpdateTable($query);
                echo $result ? 'success' : 'error';
                break;

            case 'update_sub_category':
                $subCategoryId = $_POST['sub_category_id'];
                $subCategoryName = $_POST['sub_category_name'];

                $query = "UPDATE sub_category_details SET 
                         sub_category = '" . $subCategoryName . "' 
                         WHERE ids = '" . $subCategoryId . "'";

                $result = $this->varModelObj->UpdateTable($query);
                echo $result ? 'success' : 'error';
                break;
            
            // Add this case in your switch statement in product_controller.php
            case 'generate_encrypted_product_url':
                $response = ['success' => false, 'message' => '', 'encrypted_url' => '', 'encrypted_id' => ''];
                
                try {
                    $productId = $_POST['product_id'] ?? '';
                    $platform = $_POST['platform'] ?? ''; // New: platform parameter
                    
                    if (empty($productId)) {
                        throw new Exception('Product ID is required');
                    }
                    
                    // Verify product exists
                    $vendor_id = $_SESSION["vendor_id"] ?? 0;
                    $checkSql = "SELECT ids FROM product_details WHERE ids = '$productId' AND vendor_id = '$vendor_id'";
                    $productExists = $this->varModelObj->ReturnCountValue($checkSql);
                    
                    if ($productExists == 0) {
                        throw new Exception('Product not found or you don\'t have permission');
                    }
                    
                    // Include encryption class
                    require_once('../../model/common/en_de_class.php');
                    
                    $key = 'S@nds1@b@Trichur1nf0p@rk123!456'; // Use same key consistently
                    $encryption = new UrlEncryption($key);
                    
                    // Build data string to encrypt: include product ID and optional platform
                    $data = "id=" . $productId;
                    if (!empty($platform)) {
                        $data .= "&platform=" . $platform;
                    }
                    
                    $encryptedId = $encryption->encrypt($data);
                    
                    // Create the full URL (only one param 'id')
                    $productUrl = "https://darjanafashion.com/ProductDetails?id=" . urlencode($encryptedId);
                    
                    $response['success'] = true;
                    $response['encrypted_url'] = $productUrl;
                    $response['encrypted_id'] = $encryptedId;
                    $response['message'] = 'Secure link generated successfully';
                    
                    // Optionally store in database (if you want to track generated links)
                    $updateQuery = "UPDATE product_details SET 
                                   encrypted_url = '" . $this->varDBConnection->real_escape_string($productUrl) . "',
                                   encrypted_id = '" . $this->varDBConnection->real_escape_string($encryptedId) . "'
                                   WHERE ids = '$productId'";
                    $this->varModelObj->UpdateTable($updateQuery);
                    
                } catch (Exception $e) {
                    $response['message'] = $e->getMessage();
                    error_log('URL Generation Error: ' . $e->getMessage());
                }
                
                echo json_encode($response);
                break;
            
            default:
                echo "No Action Found In The Controller...!";
                break;
        }
    }
}

$obj = new ProductController();
$obj->RequestAccept($obj->actionevents);
?>
