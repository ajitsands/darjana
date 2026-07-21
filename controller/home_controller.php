<?php
session_start(); // Make sure session is started
require ('../model/common/common_functions.php');

class homeController {
    var $varModelObj, $varDBConnection;
    public $actionevents, $formdata, $tablename, $SQLQuery, $myAPIString;  
    
    function __construct() {
        // Set UTF-8 headers
        header('Content-Type: text/html; charset=utf-8');
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $requestType = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection; 
        
        // Set database connection to UTF-8
        if ($this->varDBConnection) {
            $this->varDBConnection->set_charset("utf8mb4");
        }
        
        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;        
    }
    
    function SQLArray() { 
        $array = array();
        
        // Query 0: Products
        $array[0] = "SELECT 
                        pd.*, 
                        ROUND(
                            ((CAST(pd.amount_mrp AS DECIMAL(10,2)) - CAST(pd.amount_offer AS DECIMAL(10,2))) 
                            / CAST(pd.amount_mrp AS DECIMAL(10,2)) * 100)
                        ) AS discount_percentage,
                        (SELECT GROUP_CONCAT(pi.product_image) 
                         FROM product_image pi 
                         WHERE pi.product_id = pd.ids AND pi.status = 'Active') AS images
                    FROM product_details pd
                    WHERE pd.status = 'Active'
                    AND pd.current_display = 1
                    AND CAST(pd.amount_mrp AS DECIMAL(10,2)) > 0
                    AND CAST(pd.amount_offer AS DECIMAL(10,2)) > 0
                    ORDER BY discount_percentage DESC
                    LIMIT 5";

        // Query 1: Categories - Return based on current language
        $current_lang = isset($_SESSION['language']) ? $_SESSION['language'] : 'english';
        
        $array[1] = "SELECT 
                        ids, 
                        vendor_id, 
                        category_type as category_english, 
                        category_name_ar as category_arabic, 
                        category_image, 
                        status 
                    FROM `category_details` 
                    WHERE `status`='Active'";

        // Other queries remain the same...
        // $array[2] = "SELECT 
        //                 p.ids as product_id,
        //                 p.amount_mrp as mrp_amt,
        
        //                 -- Final price logic
        //                 CASE 
        //                     WHEN p.amount_offer IS NOT NULL AND p.amount_offer > 0 THEN p.amount_offer
        //                     WHEN p.amount_selling IS NOT NULL AND p.amount_selling > 0 THEN p.amount_selling
        //                     ELSE p.amount_mrp
        //                 END as off_amt,
        
        //                 p.amount_selling as selling_amt,
        
        //                 p.product_name as name,
        //                 p.product_name_arabic as arabic_name,
        //                 c.category_type as category,
        
        //                 (SELECT product_image 
        //                  FROM product_image 
        //                  WHERE product_id = p.ids 
        //                  LIMIT 1) as image,
        
        //                 COUNT(od.ids) as quantity_sold,
        //                 COUNT(od.ids) * 
        //                 (CASE 
        //                     WHEN p.amount_offer IS NOT NULL AND p.amount_offer >= 0 THEN p.amount_offer
        //                     WHEN p.amount_selling IS NOT NULL AND p.amount_selling >= 0 THEN p.amount_selling
        //                     ELSE p.amount_mrp
        //                 END) as total_sales
        
        //             FROM order_details od
        //             JOIN product_details p ON od.product_id = p.ids
        //             JOIN category_details c ON p.category_id = c.ids
        
        //             GROUP BY p.ids
        //             ORDER BY quantity_sold DESC
        //             LIMIT 8";
        
        $array[2]="SELECT 
            p.ids as product_id,
            p.amount_mrp as mrp_amt,
        
            -- Final price logic
            CASE 
                WHEN p.amount_offer IS NOT NULL AND p.amount_offer > 0 THEN p.amount_offer
                WHEN p.amount_selling IS NOT NULL AND p.amount_selling > 0 THEN p.amount_selling
                ELSE p.amount_mrp
            END as off_amt,
        
            p.amount_selling as selling_amt,
        
            p.product_name as name,
            p.product_name_arabic as arabic_name,
            c.category_type as category,
        
            (
                SELECT product_image
                FROM product_image 
                WHERE product_id = p.ids 
                    AND status = 'Active'
                ORDER BY is_primary DESC, ids ASC
                LIMIT 1
            ) as image,
        
            COUNT(od.ids) as quantity_sold,
        
            COUNT(od.ids) * 
            (
                CASE 
                    WHEN p.amount_offer IS NOT NULL AND p.amount_offer >= 0 THEN p.amount_offer
                    WHEN p.amount_selling IS NOT NULL AND p.amount_selling >= 0 THEN p.amount_selling
                    ELSE p.amount_mrp
                END
            ) as total_sales
        
        FROM order_details od
        
        JOIN product_details p ON od.product_id = p.ids
        JOIN category_details c ON p.category_id = c.ids
        
        GROUP BY p.ids
        
        ORDER BY quantity_sold DESC
        
        LIMIT 8;";
                    
        // $array[3] = "SELECT 
        //                 pd.*, 
        //                 ROUND(
        //                     ((CAST(pd.amount_mrp AS DECIMAL(10,2)) - CAST(pd.amount_offer AS DECIMAL(10,2))) 
        //                     / CAST(pd.amount_mrp AS DECIMAL(10,2)) * 100)
        //                 ) AS discount_percentage,
        //                 (
        //                     SELECT GROUP_CONCAT(pi.product_image) 
        //                     FROM product_image pi 
        //                     WHERE pi.product_id = pd.ids AND pi.status = 'Active'
        //                 ) AS images
        //             FROM product_details pd
        //             WHERE pd.status = 'Active' 
        //                 AND CAST(pd.amount_mrp AS DECIMAL(10,2)) >= 0
        //                 AND CAST(pd.amount_offer AS DECIMAL(10,2)) >= 0
        //                 AND pd.clicks > 0
        //             ORDER BY pd.clicks DESC
        //             LIMIT 10";
        
        $array[3]="SELECT 
                pd.*, 
                ROUND(
                    (
                        (CAST(pd.amount_mrp AS DECIMAL(10,2)) - CAST(pd.amount_offer AS DECIMAL(10,2))) 
                        / CAST(pd.amount_mrp AS DECIMAL(10,2)) * 100
                    )
                ) AS discount_percentage,
            
                (
                    SELECT GROUP_CONCAT(pi.product_image 
                                        ORDER BY pi.is_primary DESC, pi.ids ASC)
                    FROM product_image pi 
                    WHERE pi.product_id = pd.ids 
                        AND pi.status = 'Active'
                ) AS images
            
            FROM product_details pd
            
            WHERE pd.status = 'Active' 
                AND CAST(pd.amount_mrp AS DECIMAL(10,2)) >= 0
                AND CAST(pd.amount_offer AS DECIMAL(10,2)) >= 0
                AND pd.clicks > 0
            
            ORDER BY pd.clicks DESC
            LIMIT 10;";
                        
        // $array[4] = "SELECT 
        //                 pd.*, 
        //                 ROUND(
        //                     ((CAST(pd.amount_mrp AS DECIMAL(10,2)) - CAST(pd.amount_offer AS DECIMAL(10,2))) 
        //                     / CAST(pd.amount_mrp AS DECIMAL(10,2)) * 100)
        //                 ) AS discount_percentage,
        //                 (
        //                     SELECT GROUP_CONCAT(pi.product_image) 
        //                     FROM product_image pi 
        //                     WHERE pi.product_id = pd.ids AND pi.status = 'Active'
        //                 ) AS images
        //             FROM product_details pd
        //             WHERE pd.status = 'Active' 
        //                 AND pd.featured = 'yes'
        //                 AND CAST(pd.amount_mrp AS DECIMAL(10,2)) >= 0
        //                 AND CAST(pd.amount_offer AS DECIMAL(10,2)) >= 0
        //             ORDER BY pi.is_primary DESC , pd.ids DESC
        //             LIMIT 8";
        
        $array[4]="SELECT 
    pd.*, 
    ROUND(
        (
            (CAST(pd.amount_mrp AS DECIMAL(10,2)) - CAST(pd.amount_offer AS DECIMAL(10,2))) 
            / CAST(pd.amount_mrp AS DECIMAL(10,2)) * 100
        )
    ) AS discount_percentage,

    (
        SELECT GROUP_CONCAT(pi.product_image ORDER BY pi.is_primary DESC, pi.ids ASC)
        FROM product_image pi 
        WHERE pi.product_id = pd.ids 
            AND pi.status = 'Active'
    ) AS images

FROM product_details pd

WHERE pd.status = 'Active' 
    AND pd.featured = 'yes'
    AND CAST(pd.amount_mrp AS DECIMAL(10,2)) >= 0
    AND CAST(pd.amount_offer AS DECIMAL(10,2)) >= 0

ORDER BY pd.ids DESC
LIMIT 8;";

        $array[5] = "SELECT video_name FROM home_video WHERE ids = '1'";
    
        return $array;
    }
     
    function RequestAccept($FunctionEvents) {
        $var = $this->SQLArray();
        switch ($FunctionEvents) {
            case 'get_products':
                $this->getProducts();
            break;

            case 'get_category':
                $this->getCategories();
            break;

            case 'get_top_selling_product':
                echo $this->varModelObj->ListFromJSon($var[2]);
            break;
            
            case 'get_most_viewed_product':
                echo $this->varModelObj->ListFromJSon($var[3]);
            break;

            case 'get_featured_products':
                // echo $var[4];
                echo $this->varModelObj->ListFromJSon($var[4]);
            break;

            case 'change_language':
                $this->changeLanguage();
            break;

            case 'get_current_language':
                $this->getCurrentLanguage();
            break;

            case 'get_home_video':
                $this->getHomeVideo();
            break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;   
        }
    }
    
    function getCategories() {
        try {
            // Set UTF-8 headers for JSON response
            header('Content-Type: application/json; charset=utf-8');
            
            $query = $this->SQLArray()[1];
            $result = $this->varDBConnection->query($query);
            
            if(!$result) {
                throw new Exception("Database query failed: " . $this->varDBConnection->error);
            }
            
            $categories = array();
            $current_lang = isset($_SESSION['language']) ? $_SESSION['language'] : 'english';
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Use Arabic name if language is arabic
                    $category_name = ($current_lang === 'arabic') 
                        ? $row['category_arabic'] 
                        : strtoupper($row['category_english']);
                    
                    // Ensure proper encoding
                    $category_name = mb_convert_encoding($category_name, 'UTF-8', 'UTF-8');
                    
                    $categories[] = [
                        'ids' => $row['ids'],
                        'category_type' => $category_name,
                        'category_image' => $row['category_image'],
                        'status' => $row['status']
                    ];
                }
            }
            
            // Use JSON_UNESCAPED_UNICODE to preserve Arabic characters
            echo json_encode([
                'status' => 'success', 
                'data' => $categories,
                'language' => $current_lang
            ], JSON_UNESCAPED_UNICODE);
            
        } catch (Exception $e) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode([
                'status' => 'error', 
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }
    
    function changeLanguage() {
        // Set UTF-8 headers
        header('Content-Type: application/json; charset=utf-8');
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $current_lang = isset($_SESSION['language']) ? $_SESSION['language'] : 'english';
        $new_lang = ($current_lang === 'english') ? 'arabic' : 'english';
        $_SESSION['language'] = $new_lang;
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Language changed to ' . $new_lang,
            'new_language' => $new_lang
        ], JSON_UNESCAPED_UNICODE);
    }
    
    function getCurrentLanguage() {
        // Set UTF-8 headers
        header('Content-Type: application/json; charset=utf-8');
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $current_lang = isset($_SESSION['language']) ? $_SESSION['language'] : 'english';
        
        echo json_encode([
            'language' => $current_lang
        ], JSON_UNESCAPED_UNICODE);
    }
    
    function getProducts() {
        try {
            header('Content-Type: application/json; charset=utf-8');
            
            $query = $this->SQLArray()[0];
            $result = $this->varDBConnection->query($query);
            
            if(!$result) {
                throw new Exception("Database query failed: " . $this->varDBConnection->error);
            }
            
            $products = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $row['images'] = !empty($row['images']) ? explode(',', $row['images']) : [];
                    $products[] = $row;
                }
            }
            
            echo json_encode([
                'status' => 'success', 
                'data' => $products,
                'count' => count($products)
            ], JSON_UNESCAPED_UNICODE);
            
        } catch (Exception $e) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode([
                'status' => 'error', 
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }
        function getHomeVideo() {
        try {
            header('Content-Type: application/json; charset=utf-8');

            $query = $this->SQLArray()[5];
            $result = $this->varDBConnection->query($query);

            if (!$result) {
                throw new Exception("Query failed: " . $this->varDBConnection->error);
            }

            $video = $result->fetch_assoc();

            if ($video && !empty($video['video_name'])) {
                echo json_encode([
                    'status' => 'success',
                    'path' => $video['video_name']
                ]);
            } else {
                echo json_encode([
                    'status' => 'empty',
                    'path' => ''
                ]);
            }

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

}

$obj = new homeController();
$obj->RequestAccept($obj->actionevents);