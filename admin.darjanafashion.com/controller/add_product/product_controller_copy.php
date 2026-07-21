<?php
session_start();
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
           $imageInsertResult, $imageUpdateResult, $producttags, $featuredProduct, $collectionType;
    public $productSpecification;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        $this->filenames = $_POST['filenames'] ?? [];
        $this->attachments = $_FILES['attachments'] ?? null;
        $this->formdata = $_POST['data'] ?? null;
        $this->tablename = $_POST['t_name'] ?? null;

        $this->userId = $_POST['user_id'] ?? null;
        $this->vendorId = $_POST['vendor_id'] ?? null;
        $this->categoryId = $_POST['category_id'] ?? null;
        $this->categoryName = $_POST['category_name'] ?? null;
        $this->subCategoryId = $_POST['sub_category_id'] ?? null;
        $this->subCategoryName = $_POST['sub_category_name'] ?? null;
        $this->productName = $_POST['product_name'] ?? null;
        $this->productBrandName = $_POST['product_brand_name'] ?? null;
        $this->amountMRP = $_POST['amount_mrp'] ?? null;
        $this->amountSelling = $_POST['amount_selling'] ?? null;
        $this->amountOffer = $_POST['amount_offer'] ?? null;
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
            sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, 
            amount_offer, product_description, warranty_details, product_tags, featured, collection_type,
            tax_percentage, cod_fee
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $array[1] = "SELECT * FROM product_details WHERE vendor_id = '" . $_SESSION["vendor_id"] . "' ORDER BY ids DESC";
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
        $array[15] = "SELECT * FROM category_details";
        $array[16] = "UPDATE category_details SET category_type='" . $this->categoryName . "' WHERE ids ='" . $this->categoryId . "' ";
        $array[17] = "SELECT * FROM product_details WHERE vendor_id = '" . $_SESSION["vendor_id"] . "' AND featured = 'yes' ORDER BY ids DESC";
        $array[18] = "SELECT * FROM product_details WHERE vendor_id = '" . $_SESSION["vendor_id"] . "' AND collection_type = 'summer' ORDER BY ids DESC";
        $array[19] = "SELECT * FROM product_details WHERE vendor_id = '" . $_SESSION["vendor_id"] . "' AND collection_type = 'winter' ORDER BY ids DESC";
        $array[20] = "SELECT * FROM product_details WHERE vendor_id = '" . $_SESSION["vendor_id"] . "' AND collection_type = 'monsoon' ORDER BY ids DESC";
        $array[21] = "UPDATE product_details SET featured = 'no' WHERE ids = '" . $this->product_ids . "'";
        $array[22] = "UPDATE product_details SET collection_type = '' WHERE ids = '" . $this->product_ids . "'";
        $array[23] = "UPDATE product_details SET current_display = 0";
        $array[24] = "SELECT ids, product_specification FROM product_specification_master WHERE product_id = '" . $this->product_ids . "'";
        $array[25] = "SELECT id, product_length FROM product_length_master WHERE product_id = '" . $this->product_ids . "'";

        return $array;
    }
    
    private function uploadProductImages($product_id, $imageFiles) {
        $uploadedFiles = [];
        
        // Create CommonModel instance if not already available
        if (!$this->varModelObj) {
            $this->varModelObj = new CommonModel();
        }
        
        // Process each uploaded file
        foreach ($imageFiles['tmp_name'] as $key => $tmp) {
            if (!is_uploaded_file($tmp)) continue;
            
            // Create file array for upload method
            $file = [
                'name' => $imageFiles['name'][$key],
                'type' => $imageFiles['type'][$key],
                'tmp_name' => $tmp,
                'error' => $imageFiles['error'][$key],
                'size' => $imageFiles['size'][$key]
            ];
            
            // Upload with conversion
            $uploadResult = $this->varModelObj->uploadFileWithConversion(
                $file, 
                '../../assets/uploads/', 
                'products'
            );
            
            if ($uploadResult) {
                // Store in database
                $fileName = $uploadResult['webp']; // Use webp version for display
                $insertImageQuery = "INSERT INTO product_image (product_id, product_image) 
                                    VALUES ('$product_id', '$fileName')";
                $insertedId = $this->varModelObj->AddToTable($insertImageQuery);
                
                if ($insertedId) {
                    $uploadedFiles[] = array_merge($uploadResult, ['db_id' => $insertedId]);
                }
            }
        }
        
        return $uploadedFiles;
    }
    
    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'add_product_details':
                // Use prepared statement for product insertion
                $response = $this->varModelObj->AddToTabless($var[0], [
                    $_SESSION["ids"],
                    $_SESSION["vendor_id"],
                    $this->categoryId,
                    $this->categoryName,
                    $this->subCategoryId,
                    $this->subCategoryName,
                    $this->productName,
                    $this->productBrandName,
                    $this->amountMRP,
                    $this->amountSelling,
                    $this->amountOffer,
                    $this->productDescription,
                    $this->warrantyDetails,
                    $this->producttags,
                    $this->featuredProduct,
                    $this->collectionType,
                    $this->tax,
                    $this->delivery_fee
                ], "isssssssddssssssdd");
                
                if ($response) {
                    // Get the inserted product ID
                    $productData = $this->varModelObj->ListFromTable($var[2]);
                    $productData = json_decode($productData, true);
            
                    if (!empty($productData) && isset($productData[0]['ids'])) {
                        $product_id = $productData[0]['ids'];
                        $uploadedImages = [];
            
                        // 1. Handle product colors
                        if (!empty($this->productColor)) {
                            foreach ($this->productColor as $color) {
                                if (!empty($color)) {
                                    $color = $this->varDBConnection->real_escape_string($color);
                                    $insertColorQuery = "INSERT INTO product_specification_color (product_id, product_color) 
                                                        VALUES ('$product_id', '$color')";
                                    $this->varModelObj->AddToTable($insertColorQuery);
                                }
                            }
                        }
            
                        // 2. Handle product sizes
                        if (!empty($this->productSize)) {
                            foreach ($this->productSize as $size) {
                                if (!empty($size)) {
                                    $size = $this->varDBConnection->real_escape_string($size);
                                    $insertSizeQuery = "INSERT INTO product_specification_size (product_id, product_size) 
                                                       VALUES ('$product_id', '$size')";
                                    $this->varModelObj->AddToTable($insertSizeQuery);
                                }
                            }
                        }
            
                        // 3. Handle product lengths
                        if (!empty($this->product_length)) {
                            foreach ($this->product_length as $length) {
                                if (!empty($length)) {
                                    $length = $this->varDBConnection->real_escape_string($length);
                                    $insertLengthQuery = "INSERT INTO product_length_master (product_id, product_length) 
                                                         VALUES ('$product_id', '$length')";
                                    $this->varModelObj->AddToTable($insertLengthQuery);
                                }
                            }
                        }
            
                        // 4. Handle product specifications
                        if (!empty($this->productSpecification)) {
                            foreach ($this->productSpecification as $spec) {
                                if (!empty($spec)) {
                                    $spec = $this->varDBConnection->real_escape_string($spec);
                                    $insertSpecQuery = "INSERT INTO product_specification_master (product_id, product_specification) 
                                                        VALUES ('$product_id', '$spec')";
                                    $this->varModelObj->AddToTable($insertSpecQuery);
                                }
                            }
                        }
            
                        // 5. Handle product images with NEW UPLOAD SYSTEM
                        if (!empty($this->productImages['name'][0])) {
                            // Create CommonModel instance if needed
                            if (!$this->varModelObj) {
                                $this->varModelObj = new CommonModel();
                            }
                            
                            // Process EACH image file - FIX FOR MULTIPLE UPLOADS
                            $imageCount = count($this->productImages['name']);
                            $uploadedCount = 0;
                            
                            for ($key = 0; $key < $imageCount; $key++) {
                                // Skip if no file or upload error
                                if (empty($this->productImages['name'][$key]) || $this->productImages['error'][$key] !== UPLOAD_ERR_OK) {
                                    continue;
                                }
                                
                                // Create file array for upload method
                                $file = [
                                    'name' => $this->productImages['name'][$key],
                                    'type' => $this->productImages['type'][$key],
                                    'tmp_name' => $this->productImages['tmp_name'][$key],
                                    'error' => $this->productImages['error'][$key],
                                    'size' => $this->productImages['size'][$key]
                                ];
                                
                                // Use optimized upload method
                                $uploadResult = $this->varModelObj->uploadFileWithConversion(
                                    $file, 
                                    '../../assets/uploads/', 
                                    'products'
                                );
                                
                                if ($uploadResult && $uploadResult['type'] === 'image') {
                                    // Store ONLY the filename (without extension) in database
                                    $dbImageName = $uploadResult['filename']; // This is "img_6979cf8e9add12.63829239" (NO EXTENSION)
                                    
                                    $insertImageQuery = "INSERT INTO product_image (product_id, product_image) 
                                                        VALUES ('$product_id', '$dbImageName')";
                                    $imageId = $this->varModelObj->AddToTable($insertImageQuery);
                                    
                                    if ($imageId) {
                                        $uploadedCount++;
                                    }
                                }
                            }
                            
                            // Optional: You can log how many images were uploaded
                            error_log("Uploaded $uploadedCount images for product $product_id");
                        }
            
                        // Return success response
                        echo "Success";
                        
                    } else {
                        echo "Failed to retrieve product ID";
                    }
                } else {
                    echo "Failed to add product";
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
                $vendorId = $_SESSION["vendor_id"];
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
                $productDetails = $this->varModelObj->ListFromTable($var[8]);
                $productDetails = json_decode($productDetails, true);

                if (!empty($productDetails)) {
                    $productId = $productDetails[0]['ids'];

                    $productColors = $this->varModelObj->ListFromTable($var[9]);
                    $productColors = json_decode($productColors, true);
                    $colors = array_map(function ($color) {
                        return [
                            'id' => $color['ids'],
                            'color' => $color['product_color']
                        ];
                    }, $productColors);

                    $productSizes = $this->varModelObj->ListFromTable($var[10]);
                    $productSizes = json_decode($productSizes, true);
                    $sizes = array_map(function ($size) {
                        return [
                            'id' => $size['ids'],
                            'size' => $size['product_size']
                        ];
                    }, $productSizes);

                    $productImages = $this->varModelObj->ListFromTable($var[11]);
                    $productImages = json_decode($productImages, true);
                    $images = array_map(function ($image) {
                        return [
                            'id' => $image['ids'],
                            'image' => $image['product_image']
                        ];
                    }, $productImages);

                    // $specQuery = "SELECT ids, product_specification FROM product_specification_master WHERE product_id = '" . $productId . "'";
                    $productSpecs = $this->varModelObj->ListFromTable($var[24]);
                    $productSpecs = json_decode($productSpecs, true);
                    $specifications = array_map(function ($spec) {
                        return [
                            'id' => $spec['ids'],
                            'specification' => $spec['product_specification']
                        ];
                    }, $productSpecs);
                    
                    $productLength = $this->varModelObj->ListFromTable($var[25]);
                    $productLength = json_decode($productLength, true);
                    $lengths = array_map(function ($length) {
                        return [
                            'id' => $length['id'],
                            'length' => $length['product_length']
                        ];
                    }, $productLength);

                    $response = [
                        'success' => true,
                        'data' => [
                            'product_details' => $productDetails[0],
                            'product_colors' => $colors,
                            'product_sizes' => $sizes,
                            'product_images' => $images,
                            'product_specifications' => $specifications,
                            'product_lengths' => $lengths
                        ]
                    ];

                    echo json_encode($response);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Product not found']);
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
                    $updateQuery = "UPDATE product_details SET
                    category_name = '" . $this->categoryName . "',
                    sub_category_name = '" . $this->subCategoryName . "',
                    product_name = '" . $this->productName . "',
                    product_brand_name = '" . $this->productBrandName . "',
                    amount_mrp = '" . $this->amountMRP . "',
                    amount_selling = '" . $this->amountSelling . "',
                    amount_offer = '" . $this->amountOffer . "',
                    product_description = '" . $this->productDescription . "',
                    warranty_details = '" . $this->warrantyDetails . "',
                    collection_type = '" . $this->collectionType . "',
                    featured = '" . $this->featuredProduct . "',
                    tax_percentage = '" . ($_POST['tax_percentage'] ?? 0) . "',
                    cod_fee = '" . ($_POST['cod_fee'] ?? 0) . "'
                    WHERE ids = '" . $this->product_ids . "'";


                $updateResult = $this->varModelObj->UpdateTable($updateQuery);

                if (!empty($this->productColor)) {
                    foreach ($this->productColor as $key => $color) {
                        $color_id = $_POST['product_color_id'][$key] ?? null;
                        if ($color_id) {
                            $updateColorQuery = "UPDATE product_specification_color 
                                                SET product_color = '" . $color . "' 
                                                WHERE ids = '" . $color_id . "'";
                            $colorUpdateResult = $this->varModelObj->UpdateTable($updateColorQuery);
                        } else {
                            $insertColorQuery = "INSERT INTO product_specification_color (product_id, product_color) 
                                                VALUES ('" . $this->product_ids . "', '" . $color . "')";
                            $colorInsertResult = $this->varModelObj->AddToTable($insertColorQuery);
                        }
                    }
                }

                if (!empty($this->productSize)) {
                    foreach ($this->productSize as $key => $size) {
                        $size_id = $_POST['product_size_id'][$key] ?? null;
                        if ($size_id) {
                            $updateSizeQuery = "UPDATE product_specification_size 
                                                SET product_size = '" . $size . "' 
                                                WHERE ids = '" . $size_id . "'";
                            $sizeUpdateResult = $this->varModelObj->UpdateTable($updateSizeQuery);
                        } else {
                            $insertSizeQuery = "INSERT INTO product_specification_size (product_id, product_size) 
                                                VALUES ('" . $this->product_ids . "', '" . $size . "')";
                            $sizeInsertResult = $this->varModelObj->AddToTable($insertSizeQuery);
                        }
                    }
                }

                if (!empty($this->productImages['name'][0])) {
                    $uploadDir = '../../assets/img/products/';

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    foreach ($this->productImages['tmp_name'] as $key => $tmp_name) {
                        $fileName = time() . '_' . basename($this->productImages['name'][$key]);
                        $filePath = $uploadDir . $fileName;

                        if (move_uploaded_file($tmp_name, $filePath)) {
                            $image_id = $_POST['product_image_id'][$key] ?? null;

                            if ($image_id) {
                                $updateImageQuery = "UPDATE product_image 
                                                    SET product_image = '" . $fileName . "' 
                                                    WHERE ids = '" . $image_id . "'";
                                $imageUpdateResult = $this->varModelObj->UpdateTable($updateImageQuery);
                            } else {
                                $insertImageQuery = "INSERT INTO product_image (product_id, product_image) 
                                                    VALUES ('" . $this->product_ids . "', '" . $fileName . "')";
                                $imageInsertResult = $this->varModelObj->AddToTable($insertImageQuery);
                            }
                        }
                    }
                }

                    if (!empty($this->productSpecification)) {
                        foreach ($this->productSpecification as $key => $spec) {
                            $spec_id = $_POST['product_specification_id'][$key] ?? null;
                            if ($spec_id) {
                                $updateSpecQuery = "UPDATE product_specification_master 
                                                    SET product_specification = '" . $spec . "' 
                                                    WHERE ids = '" . $spec_id . "'";
                                $specupdateResult = $this->varModelObj->UpdateTable($updateSpecQuery);
                            } else {
                                $insertSpecQuery = "INSERT INTO product_specification_master (product_id, product_specification) 
                                                    VALUES ('" . $this->product_ids . "', '" . $spec . "')";
                                $specinsertResult = $this->varModelObj->AddToTable($insertSpecQuery);
                            }
                        }
                    }
                    
                     if (!empty( $this->product_length)) {
                        foreach ( $this->product_length as $key => $length) {
                            $length_id = $_POST['product_length_id'][$key] ?? null;
                            if ($length_id) {
                                $updateLengthQuery = "UPDATE product_length_master 
                                                    SET product_length = '" . $length . "' 
                                                    WHERE id = '" . $length_id . "'";
                                $lengthupdateResult = $this->varModelObj->UpdateTable($updateLengthQuery);
                            } else {
                                $insertLengthQuery = "INSERT INTO product_length_master (product_id, product_length) 
                                                    VALUES ('" . $this->product_ids . "', '" . $spec . "')";
                                $lengthinsertResult = $this->varModelObj->AddToTable($insertLengthQuery);
                            }
                        }
                    }


                if ($updateResult || $colorInsertResult || $colorUpdateResult || $sizeInsertResult || $sizeUpdateResult || $imageInsertResult || $imageUpdateResult || $specinsertResult || $specupdateResult || $lengthinsertResult || $lengthupdateResult ) {
                    echo json_encode(['status' => 'success', 'message' => 'Product details updated successfully']);
                } else {
                    echo json_encode(['status' => 'failed', 'message' => ' product details update failed']);
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
                        $query = "INSERT INTO category_details (vendor_id, category_type, category_image) 
                                 VALUES ('1', '" . $categoryName . "', '$fileName')";
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
                         category_type = '" . $categoryName . "'";

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

            default:
                echo "No Action Found In The Controller...!";
                break;
        }
    }
}

$obj = new ProductController();
$obj->RequestAccept($obj->actionevents);
?>