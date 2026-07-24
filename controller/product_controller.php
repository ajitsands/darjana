<?php

session_start();
require ('../model/common/common_functions.php');

class ProductController
{
    var $varModelObj, $varDBConnection;
    public $actionevents,
     $cat_id;
    public $queries = [];

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
        $this->cat_id = $_POST['cat_id'] ?? null;
        
    }
 
    function buildFilterConditions($filters)
    {
        $conditions = ['p.status = "Active"'];
        $params = [];
        

        if (isset($filters['cat_id']) && $filters['cat_id'] !== '' && $filters['cat_id'] !== null && $filters['cat_id'] != 0) {
            $conditions[] = 'p.category_id = ?';
            $params[] = (int)$filters['cat_id'];
        }

        // Category filter
        if (!empty($filters['category'])) {
            $categoryIds = is_array($filters['category']) ? $filters['category'] : [$filters['category']];
            $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));
            $conditions[] = "p.category_id IN ($placeholders)";
            $params = array_merge($params, array_map('intval', $categoryIds));
        }
        
        // Price range filter
        if (!empty($filters['min_price']) && !empty($filters['max_price'])) {
            $conditions[] = "(p.amount_selling BETWEEN ? AND ?)";
            array_push($params, (float)$filters['min_price'], (float)$filters['max_price']);
        }
        
        // Color filter
        if (!empty($filters['color'])) {
            $colors = is_array($filters['color']) ? $filters['color'] : [$filters['color']];
            $placeholders = implode(',', array_fill(0, count($colors), '?'));
            $conditions[] = "p.ids IN (SELECT product_id FROM product_specification_color WHERE product_color IN ($placeholders))";
            $params = array_merge($params, $colors);
        }
        
        // Size filter
        if (!empty($filters['size'])) {
            $sizes = is_array($filters['size']) ? $filters['size'] : [$filters['size']];
            $placeholders = implode(',', array_fill(0, count($sizes), '?'));
            $conditions[] = "p.ids IN (SELECT product_id FROM product_specification_size WHERE product_size IN ($placeholders))";
            $params = array_merge($params, $sizes);
        }
        
        // Search term filter
        if (!empty($filters['search'])) {
            $conditions[] = "(p.product_name LIKE ? OR p.product_description LIKE ? OR p.product_brand_name LIKE ? OR p.product_tags LIKE ?)";
            $searchTerm = '%' . $filters['search'] . '%';
            array_push($params, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
        }
        
        // Brand filter
        if (!empty($filters['brand'])) {
            $brands = is_array($filters['brand']) ? $filters['brand'] : [$filters['brand']];
            $placeholders = implode(',', array_fill(0, count($brands), '?'));
            $conditions[] = "p.product_brand_name IN ($placeholders)";
            $params = array_merge($params, $brands);
        }
        
        // Warranty filter
        if (!empty($filters['warranty'])) {
            $conditions[] = "p.warranty_details != 'No Warranty'";
        }
        
        return [
            'conditions' => $conditions,
            'params' => $params
        ];
    }

    function buildSortCondition($sort)
    {
        switch ($sort) {
            case 'Low to High':
                return "ORDER BY p.amount_selling ASC";
            case 'High to Low':
                return "ORDER BY p.amount_selling DESC";
            case 'latest':
                return "ORDER BY p.ids DESC";
            case 'Popularity':
                return "ORDER BY p.popularity DESC";
            case 'Average rating':
                return "ORDER BY p.average_rating DESC";
            default:
                return "ORDER BY p.ids DESC";
        }
    }

    function SQLArray()
    {
        $productId = $_POST['product_id'] ?? null;
        $filters = $_POST['filters'] ?? [];
    
        if (isset($_POST['cat_id']) && $_POST['cat_id'] !== '' && $_POST['cat_id'] !== null) {
            if ($_POST['cat_id'] != 0) {
                $filters['cat_id'] = $_POST['cat_id'];
            }
        }
    
        $page = (int)($_POST['page'] ?? 1);
        $perPage = (int)($_POST['per_page'] ?? 12);
        $sort = $_POST['sort'] ?? 'sort by';
    
        $filterConditions = $this->buildFilterConditions($filters);
        $sortCondition = $this->buildSortCondition($sort);
    
        $offset = ($page - 1) * $perPage;
    
        $array = [];
    
        $whereSql = "WHERE " . implode(' AND ', $filterConditions['conditions']);

        $array[0] = "SELECT 
            p.*,
            (
                SELECT pi.product_image
                FROM product_image pi
                WHERE pi.product_id = p.ids
                    AND pi.status = 'Active'
                ORDER BY pi.is_primary DESC, pi.ids ASC
                LIMIT 1
            ) AS product_image
        FROM product_details p
        $whereSql
        $sortCondition
        LIMIT ? OFFSET ?";
    
        // Count query (used to get correct total count)
        $array[1] = "SELECT COUNT(DISTINCT p.ids) as total
                    FROM product_details p
                    $whereSql";
    
        // Other filter option queries
        $array[2] = "SELECT ids, category_type as name FROM category_details WHERE status = 'Active'";
        $array[3] = "SELECT DISTINCT product_color as color FROM product_specification_color ORDER BY product_color";
        $array[4] = "SELECT DISTINCT product_size as size FROM product_specification_size ORDER BY product_size";
        $array[5] = "SELECT DISTINCT product_brand_name as brand FROM product_details WHERE status = 'Active' ORDER BY product_brand_name";
        $array[6] = "SELECT 
                        MIN(amount_selling) as min_price, 
                        MAX(amount_selling) as max_price,
                        MIN(amount_mrp) as min_mrp, 
                        MAX(amount_mrp) as max_mrp
                     FROM product_details WHERE status = 'Active'";
    
        if ($productId) {
            $productId = intval($productId);
            $array[7] = "SELECT p.*,
                        (SELECT GROUP_CONCAT(product_image) FROM product_image WHERE product_id = p.ids) as images,
                        (SELECT GROUP_CONCAT(product_color) FROM product_specification_color WHERE product_id = p.ids) as colors,
                        (SELECT GROUP_CONCAT(product_size) FROM product_specification_size WHERE product_id = p.ids) as sizes,
                        (SELECT GROUP_CONCAT(product_length) FROM product_length_master WHERE product_id = p.ids) as length
                        FROM product_details p
                        WHERE p.ids = $productId AND p.status = 'Active'";
    
            $array[8] = "SELECT product_image FROM product_image WHERE product_id = $productId";
            $array[10] = "UPDATE product_details SET clicks = clicks + 1 WHERE ids = $productId";
        }
    
        $queryParams = $filterConditions['params'];
        $queryParams[] = $perPage;
        $queryParams[] = $offset;
    
        return [
            'queries' => $array,
            'params' => $queryParams
        ];
    }

    function RequestAccept($FunctionEvents)
    {
        $sqlData = $this->SQLArray();
        $var = $sqlData['queries'];
        $params = $sqlData['params'];

        switch ($FunctionEvents) {
            case 'get_products':
                // echo $var[0];
                
                // echo "<pre>";
                // print_r($params);
                // echo "</pre>";
                $data = $this->varModelObj->ListFromTables($var[0], $params);
                $products = json_decode($data, true) ?? [];
            
                // Get total count using the count query
                $countData = $this->varModelObj->GetSingleRow($var[1], array_slice($params, 0, -2));
                $total = $countData['total'] ?? 0;
            
                // Get filter options
                $categories = json_decode($this->varModelObj->ListFromTables($var[2]), true) ?? [];
                $colors = json_decode($this->varModelObj->ListFromTables($var[3]), true) ?? [];
                $sizes = json_decode($this->varModelObj->ListFromTables($var[4]), true) ?? [];
                $brands = json_decode($this->varModelObj->ListFromTables($var[5]), true) ?? [];
                $priceRange = $this->varModelObj->GetSingleRow($var[6]) ?? [];
            
                echo json_encode([
                    'status' => 'success',
                    'data' => $products,
                    'total' => $total,           // ← This is now correct for categories too
                    'filters' => [
                        'categories' => $categories,
                        'colors' => $colors,
                        'sizes' => $sizes,
                        'brands' => $brands,
                        'price_range' => $priceRange
                    ]
                ]);
                break;

            // case 'search_products':
            //     $searchTerm = $_POST['search_term'] ?? '';
            //     if (empty($searchTerm)) {
            //         echo json_encode(['status' => 'error', 'message' => 'Search term is required']);
            //         break;
            //     }
                
            //     $searchQuery = "SELECT p.*, pi.product_image 
            //                 FROM product_details p
            //                 LEFT JOIN product_image pi ON p.ids = pi.product_id
            //                 WHERE (p.product_name LIKE ? OR p.product_tags LIKE ? OR p.product_description LIKE ?)
            //                 AND p.status = 'Active'
            //                 GROUP BY p.ids
            //                 ORDER BY p.ids DESC";
                
            //     $searchParam = "%$searchTerm%";
            //     $params = [$searchParam, $searchParam, $searchParam];
                
            //     // Get products
            //     $data = $this->varModelObj->ListFromTables($searchQuery, $params);
            //     $products = json_decode($data, true);
                
            //     if (!empty($products)) {
            //         echo json_encode([
            //             'status' => 'success', 
            //             'data' => $products,
            //             'total' => count($products)
            //         ]);
            //     } else {
            //         echo json_encode(['status' => 'error', 'message' => 'No products found matching your search']);
            //     }
            // break;

            case 'get_product_details':
                if (!isset($var[7])) {
                    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided']);
                break;
                }
                // echo $var[10];
                $this->varModelObj->UpdateTable($var[10]);
                // Get main product details
                $product = $this->varModelObj->GetSingleRow($var[7]);
                
                if ($product) {
                    // Get product images (array of image paths)
                    $images = $this->varModelObj->ListFromTables($var[8]);
                    $product['images'] = array_column(json_decode($images, true) ?: [], 'product_image');
                    
                    // Convert comma-separated colors/sizes to arrays
                    $product['colors'] = !empty($product['colors']) ? explode(',', $product['colors']) : [];
                    $product['sizes'] = !empty($product['sizes']) ? explode(',', $product['sizes']) : [];
                    $product['length'] = !empty($product['length']) ? explode(',', $product['length']) : [];
                    
                    // Add additional product information
                    $product['category_name'] = $product['category_name'] ?? 'N/A';
                    $product['sub_category_name'] = $product['sub_category_name'] ?? 'N/A';

                    echo json_encode([
                        'status' => 'success', 
                        'data' => $product
                    ]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Product not found']);
                }
            break;
            
            case 'track_product_click':
                $productId = $_POST['product_id'] ?? null;
                if ($productId) {
                    // Increment the clicks counter
                    $updateQuery = "UPDATE product_details SET clicks = clicks + 1 WHERE ids = ?";
                    $stmt = $this->varDBConnection->prepare($updateQuery);
                    $stmt->bind_param("i", $productId);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows > 0) {
                        echo json_encode(['status' => 'success']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to update click count']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided']);
                }
            break;

            case 'get_filter_options':
                // Get all filter options
                $categories = json_decode($this->varModelObj->ListFromTables($var[2]), true);
                $colors = json_decode($this->varModelObj->ListFromTables($var[3]), true);
                $sizes = json_decode($this->varModelObj->ListFromTables($var[4]), true);
                $brands = json_decode($this->varModelObj->ListFromTables($var[5]), true);
                $priceRange = $this->varModelObj->GetSingleRow($var[6]);
                
                echo json_encode([
                    'status' => 'success',
                    'filters' => [
                        'categories' => $categories,
                        'colors' => $colors,
                        'sizes' => $sizes,
                        'brands' => $brands,
                        'price_range' => $priceRange
                    ]
                ]);
            break;

            case 'search_products':
                $searchTerm = $_POST['search_term'] ?? '';
                echo $this->searchProducts($searchTerm);
            break;
            
            case 'get_total_products_count':
                $searchTerm = $_POST['search_term'] ?? null;
                $total = $this->getTotalProductsCount($searchTerm);
                echo json_encode([
                    'status' => 'success',
                    'total' => $total
                ]);
            break;
                        
            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
            break;
        }
    }

    function searchProducts($searchTerm) {
        $sort = $_POST['sort'] ?? 'sort by';
        $page = (int)($_POST['page'] ?? 1);
        $perPage = (int)($_POST['per_page'] ?? 12);
        $offset = ($page - 1) * $perPage;
        $sortCondition = $this->buildSortCondition($sort);
    
        $searchTerm = trim($this->varDBConnection->real_escape_string($searchTerm));
    
        if (empty($searchTerm)) {
            return json_encode(['status' => 'error', 'message' => 'Search term is required']);
        }
    
        $searchWords = explode(' ', $searchTerm);
        $searchConditions = [];
        $params = [];
    
        foreach ($searchWords as $word) {
            if (strlen($word) < 2) continue;
            $likeTerm = '%' . $word . '%';
            $searchConditions[] = "(p.product_name LIKE ? OR p.product_tags LIKE ? OR p.product_description LIKE ? OR p.product_brand_name LIKE ?)";
            array_push($params, $likeTerm, $likeTerm, $likeTerm, $likeTerm);
        }
    
        if (empty($searchConditions)) {
            return json_encode(['status' => 'error', 'message' => 'Please enter a more specific search term']);
        }
    
        $whereClause = implode(' AND ', $searchConditions);
    
        // Count total
        $countQuery = "SELECT COUNT(DISTINCT p.ids) as total 
                       FROM product_details p 
                       WHERE $whereClause AND p.status = 'Active'";
        $countResult = $this->varModelObj->GetSingleRow($countQuery, $params);
        $total = $countResult['total'] ?? 0;
    
        // Get products with pagination
        $query = "SELECT p.*, pi.product_image
                  FROM product_details p
                  LEFT JOIN product_image pi ON p.ids = pi.product_id
                  WHERE $whereClause
                  AND p.status = 'Active'
                  GROUP BY p.ids
                  $sortCondition
                  LIMIT ? OFFSET ?";
    
        $data = $this->varModelObj->ListFromTables($query, array_merge($params, [$perPage, $offset]));
        $products = json_decode($data, true) ?? [];
    
        if (!empty($products)) {
            return json_encode([
                'status' => 'success',
                'data' => $products,
                'total' => $total
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'No products found matching your search',
                'total' => 0
            ]);
        }
    }
    
    function getTotalProductsCount($searchTerm = null) {
        $cat_id = $_POST['cat_id'] ?? null;
    
        $query = "SELECT COUNT(DISTINCT p.ids) as total
                  FROM product_details p
                  WHERE p.status = 'Active'";
        
        // Add category filter if provided
        if (isset($cat_id) && is_numeric($cat_id) && (int)$cat_id > 0) {
            $query .= " AND p.category_id = " . (int)$cat_id;
        }
        
        // Add search filter if provided
        if (!empty($searchTerm)) {
            // Sanitize the search term
            $searchTerm = trim($this->varDBConnection->real_escape_string($searchTerm));
            $searchWords = explode(' ', $searchTerm);
            $searchConditions = [];
            
            foreach ($searchWords as $word) {
                if (strlen($word) < 2) continue;
                $likeTerm = '%' . $word . '%';
                // Escape again for safety (though already escaped above)
                $escapedLikeTerm = $this->varDBConnection->real_escape_string($likeTerm);
                $searchConditions[] = "(p.product_name LIKE '$escapedLikeTerm' OR p.product_tags LIKE '$escapedLikeTerm' OR p.product_description LIKE '$escapedLikeTerm' OR p.product_brand_name LIKE '$escapedLikeTerm')";
            }
            
            if (!empty($searchConditions)) {
                $query .= " AND " . implode(' AND ', $searchConditions);
            }
        }
    
        $result = $this->varModelObj->GetSingleRow($query);
        return $result['total'] ?? 0;
    }
}

$obj = new ProductController();
$obj->RequestAccept($obj->actionevents);