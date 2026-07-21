<?php
session_start();
require ('../model/common/common_functions.php');

class ProductDetailsController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $queries = [];

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
        
        // Set charset for UTF-8
        if ($this->varDBConnection) {
            $this->varDBConnection->set_charset("utf8mb4");
        }
    }

    function SQLArray()
    {
        $productId = $_POST['product_id'] ?? null;
        $array = [];

        if ($productId) {
            $productId = intval($productId);

            // Optimized main query with all joins
            // $array['main'] = "SELECT 
            //                 pd.*, 
            //                 cd.category_type as category_name, 
            //                 scd.sub_category as sub_category_name,
            //                 vd.first_name as vendor_first_name,
            //                 vd.second_name as vendor_second_name,
            //                 GROUP_CONCAT(DISTINCT pi.product_image ORDER BY pi.ids ASC SEPARATOR '||') as product_images,
            //                 GROUP_CONCAT(DISTINCT psc.product_color ORDER BY psc.ids ASC SEPARATOR '||') as product_colors,
            //                 GROUP_CONCAT(DISTINCT pss.product_size ORDER BY pss.ids ASC SEPARATOR '||') as product_sizes,
            //                 GROUP_CONCAT(DISTINCT psm.product_specification ORDER BY psm.ids ASC SEPARATOR '||') as product_specifications,
            //                 GROUP_CONCAT(DISTINCT psm.product_specification_arabic ORDER BY psm.ids ASC SEPARATOR '||') as product_specifications_arabic,
            //                 GROUP_CONCAT(DISTINCT plm.product_length ORDER BY plm.id ASC SEPARATOR '||') as product_lengths
            //             FROM product_details pd
            //             LEFT JOIN category_details cd ON pd.category_id = cd.ids
            //             LEFT JOIN sub_category_details scd ON pd.sub_category_id = scd.ids
            //             LEFT JOIN vendor_details vd ON pd.vendor_id = vd.ids
            //             LEFT JOIN product_image pi ON pd.ids = pi.product_id AND pi.status = 'Active'
            //             LEFT JOIN product_specification_color psc ON pd.ids = psc.product_id
            //             LEFT JOIN product_specification_size pss ON pd.ids = pss.product_id
            //             LEFT JOIN product_specification_master psm ON pd.ids = psm.product_id
            //             LEFT JOIN product_length_master plm ON pd.ids = plm.product_id
            //             WHERE pd.ids = $productId AND pd.status = 'Active'
            //             GROUP BY pd.ids";
            
            $array['main']="SELECT 
                pd.*, 
                cd.category_type as category_name, 
                scd.sub_category as sub_category_name,
                vd.first_name as vendor_first_name,
                vd.second_name as vendor_second_name,
            
                GROUP_CONCAT(
                    DISTINCT pi.product_image 
                    ORDER BY pi.is_primary DESC, pi.ids ASC 
                    SEPARATOR '||'
                ) as product_images,
            
                GROUP_CONCAT(
                    DISTINCT psc.product_color 
                    ORDER BY psc.ids ASC 
                    SEPARATOR '||'
                ) as product_colors,
            
                GROUP_CONCAT(
                    DISTINCT pss.product_size 
                    ORDER BY pss.ids ASC 
                    SEPARATOR '||'
                ) as product_sizes,
            
                GROUP_CONCAT(
                    DISTINCT psm.product_specification 
                    ORDER BY psm.ids ASC 
                    SEPARATOR '||'
                ) as product_specifications,
            
                GROUP_CONCAT(
                    DISTINCT psm.product_specification_arabic 
                    ORDER BY psm.ids ASC 
                    SEPARATOR '||'
                ) as product_specifications_arabic,
            
                GROUP_CONCAT(
                    DISTINCT plm.product_length 
                    ORDER BY plm.id ASC 
                    SEPARATOR '||'
                ) as product_lengths
            
            FROM product_details pd
            
            LEFT JOIN category_details cd 
                ON pd.category_id = cd.ids
            
            LEFT JOIN sub_category_details scd 
                ON pd.sub_category_id = scd.ids
            
            LEFT JOIN vendor_details vd 
                ON pd.vendor_id = vd.ids
            
            LEFT JOIN product_image pi 
                ON pd.ids = pi.product_id 
                AND pi.status = 'Active'
            
            LEFT JOIN product_specification_color psc 
                ON pd.ids = psc.product_id
            
            LEFT JOIN product_specification_size pss 
                ON pd.ids = pss.product_id
            
            LEFT JOIN product_specification_master psm 
                ON pd.ids = psm.product_id
            
            LEFT JOIN product_length_master plm 
                ON pd.ids = plm.product_id
            
            WHERE pd.ids = $productId 
                AND pd.status = 'Active'
            
            GROUP BY pd.ids";

            // Optimized related products query
            $array['related'] = "SELECT 
                        pd.ids, 
                        pd.product_name, 
                        pd.amount_selling, 
                        pd.amount_mrp,
                        pd.amount_offer,
                        pd.category_id, 
                        pd.sub_category_id,
                        pd.product_name_arabic,
                        pi.product_image,
                        cd.category_type AS category_name,
                        scd.sub_category AS sub_category_name
                    FROM product_details pd
                    LEFT JOIN category_details cd ON pd.category_id = cd.ids
                    LEFT JOIN sub_category_details scd ON pd.sub_category_id = scd.ids
                    LEFT JOIN product_image pi ON pd.ids = pi.product_id AND pi.status = 'Active'
                    WHERE 
                        pd.category_id = (SELECT category_id FROM product_details WHERE ids = $productId)
                        AND pd.ids != $productId 
                        AND pd.status = 'Active'
                    GROUP BY pd.ids
                    ORDER BY 
                        CASE 
                            WHEN pd.sub_category_id = (SELECT sub_category_id FROM product_details WHERE ids = $productId) THEN 0
                            ELSE 1
                        END,
                        pd.added_date DESC
                    LIMIT 20";
            
            // Size chart queries (without size_chart_tips)
            $array['size_chart'] = "SELECT * FROM size_charts WHERE ids = 1 AND status = 'Active'";
            $array['size_chart_measurements'] = "SELECT * FROM size_chart_measurements WHERE size_chart_id = 1 AND status = 'Active' ORDER BY sort_order ASC";
            $array['size_chart_height_length'] = "SELECT * FROM size_chart_height_length WHERE size_chart_id = 1 AND status = 'Active' ORDER BY height_cm ASC";
            
            // Update click count
            $array[1] = "UPDATE product_details SET clicks = clicks + 1 WHERE ids = $productId";
        }

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'get_product_details':
                if (empty($var)) {
                    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided']);
                    return;
                } 
                
                // Update click count
                
                $this->varModelObj->UpdateTable($var[1]);
                
                // Get main product data
                $product = $this->varModelObj->GetSingleRow($var['main']);
                if (!$product) {
                    echo json_encode(['status' => 'error', 'message' => 'Product not found']);
                    return;
                }

                // Process aggregated data from the main query
                $product['images'] = $product['product_images'] ? explode('||', $product['product_images']) : [];
                $product['sizes'] = $product['product_sizes'] ? explode('||', $product['product_sizes']) : [];
                $product['colors'] = $product['product_colors'] ? explode('||', $product['product_colors']) : [];
                $product['length'] = $product['product_lengths'] ? explode('||', $product['product_lengths']) : [];
                
                // Process specifications
                $specifications = [];
                if ($product['product_specifications']) {
                    $specNames = explode('||', $product['product_specifications']);
                    $specNamesArabic = $product['product_specifications_arabic'] ? explode('||', $product['product_specifications_arabic']) : [];
                    
                    for ($i = 0; $i < count($specNames); $i++) {
                        $specifications[] = [
                            'product_specification' => $specNames[$i],
                            'product_specification_arabic' => $specNamesArabic[$i] ?? ''
                        ];
                    }
                }
                $product['specifications'] = $specifications;
                
                // Remove aggregated fields
                unset($product['product_images'], $product['product_sizes'], $product['product_colors'], 
                      $product['product_lengths'], $product['product_specifications'], $product['product_specifications_arabic']);

                // Get related products
                $related = $this->varModelObj->ListFromTable($var['related']);
                $product['related_products'] = json_decode($related, true) ?: [];

                // Get size chart data
                // $sizeChart = $this->varModelObj->GetSingleRow($var['size_chart']);
                // $product['size_chart'] = $sizeChart ?: [];
                
                // $measurements = $this->varModelObj->ListFromTable($var['size_chart_measurements']);
                // $product['size_chart_measurements'] = json_decode($measurements, true) ?: [];
                
                // $heightLength = $this->varModelObj->ListFromTable($var['size_chart_height_length']);
                // $product['size_chart_height_length'] = json_decode($heightLength, true) ?: [];

                $product['vendor_name'] = ($product['vendor_id'] > 0)
                    ? trim($product['vendor_first_name'] . ' ' . $product['vendor_second_name'])
                    : 'Official Store';

                unset($product['vendor_first_name'], $product['vendor_second_name']);

                echo json_encode(['status' => 'success', 'data' => $product], JSON_UNESCAPED_UNICODE);
                break;

            case 'add_to_cart':
                $this->handleAddToCart();
                break;

            case 'size_chart_details':
                if (empty($var)) {
                    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided']);
                    return;
                }

                // Initialize product array
                $product = [];

                // Get size chart data
                $sizeChart = $this->varModelObj->GetSingleRow($var['size_chart']);
                $product['size_chart'] = $sizeChart ?: [];

                $measurements = $this->varModelObj->ListFromTable($var['size_chart_measurements']);
                $product['size_chart_measurements'] = json_decode($measurements, true) ?: [];

                $heightLength = $this->varModelObj->ListFromTable($var['size_chart_height_length']);
                $product['size_chart_height_length'] = json_decode($heightLength, true) ?: [];

                echo json_encode([
                    'status' => 'success',
                    'data' => $product
                ], JSON_UNESCAPED_UNICODE);

            break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }

    function handleAddToCart()
    {
        try {
            $productId = intval($_POST['product_id'] ?? 0);
            $quantity = intval($_POST['quantity'] ?? 1);
            $color = trim($_POST['color'] ?? '');
            $size = trim($_POST['size'] ?? '');
            $length = trim($_POST['length'] ?? '');
            $customerDesc = trim($_POST['customer_desc'] ?? '');
            $customerId = $_SESSION["ids"] ?? 0;

            if (!$productId) {
                throw new Exception('Product ID is required');
            }

            if ($customerId == 0) {
                echo json_encode(['status' => 'redirect', 'message' => 'Please login to add items to cart']);
                return;
            }

            // Get product details with image in one query
            $product = $this->varModelObj->GetSingleRow("SELECT 
                pd.*, 
                pi.product_image
                FROM product_details pd 
                LEFT JOIN product_image pi ON pd.ids = pi.product_id AND pi.status = 'Active'
                WHERE pd.ids = $productId AND pd.status = 'Active' 
                LIMIT 1");

            if (!$product) {
                throw new Exception('Product not found');
            }

            // Validate and get default values using subqueries
            if ($color !== '' && $color !== 'none') {
                $validColor = $this->varModelObj->GetSingleRow("SELECT product_color FROM product_specification_color 
                    WHERE product_id = $productId AND product_color = '" . $this->varDBConnection->real_escape_string($color) . "' LIMIT 1");
                if (!$validColor) {
                    $color = '';
                }
            }

            if ($size !== '' && $size !== 'none') {
                $validSize = $this->varModelObj->GetSingleRow("SELECT product_size FROM product_specification_size 
                    WHERE product_id = $productId AND product_size = '" . $this->varDBConnection->real_escape_string($size) . "' LIMIT 1");
                if (!$validSize) {
                    $size = '';
                }
            }

            if ($length !== '' && $length !== 'none') {
                $validLength = $this->varModelObj->GetSingleRow("SELECT product_length FROM product_length_master 
                    WHERE product_id = $productId AND product_length = '" . $this->varDBConnection->real_escape_string($length) . "' LIMIT 1");
                if (!$validLength) {
                    $length = '';
                }
            }

            // Get default values if empty
            if ($color === '') {
                $defaultColor = $this->varModelObj->GetSingleRow("SELECT product_color FROM product_specification_color 
                    WHERE product_id = $productId LIMIT 1");
                $color = $defaultColor ? $defaultColor['product_color'] : 'none';
            }

            if ($size === '') {
                $defaultSize = $this->varModelObj->GetSingleRow("SELECT product_size FROM product_specification_size 
                    WHERE product_id = $productId LIMIT 1");
                $size = $defaultSize ? $defaultSize['product_size'] : 'none';
            }

            if ($length === '') {
                $defaultLength = $this->varModelObj->GetSingleRow("SELECT product_length FROM product_length_master 
                    WHERE product_id = $productId LIMIT 1");
                $length = $defaultLength ? $defaultLength['product_length'] : 'none';
            }

            // Check if item already exists in cart
            $existingCartItem = $this->varModelObj->GetSingleRow("SELECT ids, quantity FROM cart_products 
                WHERE customer_id = $customerId AND product_id = $productId 
                AND product_color = '" . $this->varDBConnection->real_escape_string($color) . "'
                AND product_size = '" . $this->varDBConnection->real_escape_string($size) . "'
                AND product_length = '" . $this->varDBConnection->real_escape_string($length) . "'");

            if ($existingCartItem) {
                $newQuantity = $existingCartItem['quantity'] + $quantity;
                $sql = "UPDATE cart_products SET quantity = $newQuantity, customer_desc = '" . $this->varDBConnection->real_escape_string($customerDesc) . "' WHERE ids = " . $existingCartItem['ids'];
            } else {
                $sql = "INSERT INTO cart_products (customer_id, product_id, product_amount_mrp, product_amount_selling, 
                        product_amount_offer, product_name, product_brand_name, color_id, product_color, image_id, 
                        product_image, size_id, product_size, product_length, customer_desc, quantity) 
                        VALUES (
                            $customerId, $productId, '{$product['amount_mrp']}', '{$product['amount_selling']}', 
                            '{$product['amount_offer']}', '{$this->varDBConnection->real_escape_string($product['product_name'])}', 
                            '{$this->varDBConnection->real_escape_string($product['product_brand_name'])}', 0, 
                            '{$this->varDBConnection->real_escape_string($color)}', 0, 
                            '{$this->varDBConnection->real_escape_string($product['product_image'])}', 0, 
                            '{$this->varDBConnection->real_escape_string($size)}', '{$this->varDBConnection->real_escape_string($length)}', 
                            '{$this->varDBConnection->real_escape_string($customerDesc)}', $quantity)";
            }
            
            $result = $this->varDBConnection->query($sql);
            
            if (!$result) {
                throw new Exception('Database error: ' . $this->varDBConnection->error);
            }

            // Get updated cart count
            $cartCountResult = $this->varDBConnection->query("SELECT COUNT(*) as count FROM cart_products WHERE customer_id = $customerId");
            $cartCount = $cartCountResult ? $cartCountResult->fetch_assoc()['count'] : 0;
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Product added to cart successfully',
                'cart_count' => $cartCount,
                'product_color' => $color,
                'product_size' => $size,
                'product_length' => $length
            ]);

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error', 
                'message' => $e->getMessage()
            ]);
        }
    }
}

$obj = new ProductDetailsController();
$obj->RequestAccept($obj->actionevents);
?>