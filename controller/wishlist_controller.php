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
    }

    function SQLArray()
    {
        $productId = $_POST['product_id'] ?? null;
        $customerId = $_SESSION["ids"] ?? 0;
        $array = [];

        
        // Wishlist queries (6-11)
        $array[6] = "SELECT 
                    cp.*,
                    pd.amount_mrp as product_amount_mrp,
                    pd.amount_selling as product_amount_selling,
                    pd.amount_offer as product_amount_offer,
                    pd.product_description,
                    pd.warranty_details,
                    pd.product_name_arabic
                FROM wishlist_products cp
                LEFT JOIN product_details pd ON pd.ids = cp.product_id
                WHERE cp.customer_id = $customerId
                ORDER BY cp.added_date DESC";

        $array[7] = "SELECT * FROM wishlist_products 
                WHERE customer_id = $customerId AND product_id = %d";

        $array[8] = "SELECT * FROM wishlist_products 
                WHERE customer_id = $customerId AND product_id = %d 
                AND product_color = '%s'
                AND product_size = '%s'";

        $array[9] = "DELETE FROM wishlist_products WHERE ids = %d";

        $array[10] = "DELETE FROM wishlist_products WHERE customer_id = $customerId AND product_id = %d";

        // Product validation queries (11-14)
        $array[11] = "SELECT 1 FROM product_specification_color 
                WHERE product_id = %d AND product_color = '%s'";

        $array[12] = "SELECT 1 FROM product_specification_size 
                WHERE product_id = %d AND product_size = '%s'";

        $array[13] = "SELECT product_color FROM product_specification_color 
                WHERE product_id = %d LIMIT 1";

        $array[14] = "SELECT product_size FROM product_specification_size 
                WHERE product_id = %d LIMIT 1";

        $array[15] = "SELECT pd.*, 
                (SELECT product_image FROM product_image WHERE product_id = pd.ids AND status = 'Active' LIMIT 1) as product_image
                FROM product_details pd WHERE pd.ids = %d AND pd.status = 'Active'";

        $array[16] = "INSERT INTO wishlist_products (%s) VALUES (%s)";


        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        switch ($FunctionEvents) {
            case 'get_wishlist_items':
                $this->getWishlistItems();
                break;
            
            case 'add_to_wishlist':
                $this->handleAddToWishlist();
                break;
                
            case 'remove_wishlist_item':
                $this->removeWishlistItem();
                break;
                
            case 'remove_wishlist_item_from_shop':
                $this->removeWishlistItemshop();
                break;
                
            case 'check_wishlist_status':
                $this->checkWishlistStatus();
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }

    function handleAddToWishlist()
    {
        try {
            $productId = intval($_POST['product_id'] ?? 0);
            $color = trim($_POST['color'] ?? '');
            $size = trim($_POST['size'] ?? '');
            $customerId = $_SESSION["ids"] ?? 0;
            $queries = $this->SQLArray();
            
          
            
            
            
            if (!$productId) {
                throw new Exception('Product ID is required');
            }
    
            if ($customerId == 0) {
                echo json_encode(['status' => 'redirect', 'message' => 'Please login to add items to wishlist',
                    'redirect_url' => '/Login'
                ]);
                return;
            }
    
            // Get product details using query 15
            $product = $this->varModelObj->GetSingleRow(sprintf( $queries[15], $productId
            ));
    
            if (!$product) {
                throw new Exception('Product not found');
            }
    
            // Validate color if provided (query 11)
            if ($color !== '') {
                $validColor = $this->varModelObj->GetSingleRow(sprintf($queries[11],$productId,
                    $this->varDBConnection->real_escape_string($color)
                ));
                if (!$validColor) {
                    $color = ''; // Reset to empty if invalid
                }
            }
    
            // Validate size if provided (query 12)
            if ($size !== '') {
                $validSize = $this->varModelObj->GetSingleRow(sprintf($queries[12], $productId,
                    $this->varDBConnection->real_escape_string($size)
                ));
                if (!$validSize) {
                    $size = ''; // Reset to empty if invalid
                }
            }
    
            // Get default color if none provided or invalid (query 13)
            if ($color === '') {
                $defaultColor = $this->varModelObj->GetSingleRow(sprintf($queries[13], $productId
                ));
                $color = $defaultColor ? $defaultColor['product_color'] : 'none';
            }
    
            // Get default size if none provided or invalid (query 14)
            if ($size === '') {
                $defaultSize = $this->varModelObj->GetSingleRow(sprintf($queries[14], $productId
                ));
                $size = $defaultSize ? $defaultSize['product_size'] : 'none';
            }
    
            // Check if product already exists in wishlist (query 8)
            $existingWishlistItem = $this->varModelObj->GetSingleRow(sprintf($queries[8], $productId,
                $this->varDBConnection->real_escape_string($color),
                $this->varDBConnection->real_escape_string($size)
            ));
    
            if ($existingWishlistItem) {
                echo json_encode([ 'status' => 'exists', 'message' => 'Product is already in your wishlist'
                ]);
                return;
            }
    
            // Insert new wishlist item using query 16
            $wishlistItem = [
                'customer_id' => $customerId,
                'product_id' => $productId,
                'product_amount_mrp' => $product['amount_mrp'],
                'product_amount_selling' => $product['amount_selling'],
                'product_amount_offer' => $product['amount_offer'],
                'product_name' => $product['product_name'],
                'product_brand_name' => $product['product_brand_name'],
                'color_id' => 0,
                'product_color' => $color,
                'image_id' => 0,
                'product_image' => $product['product_image'],
                'size_id' => 0,
                'product_size' => $size,
                'added_date' => date('Y-m-d H:i:s')
            ];
    
            $columns = implode(", ", array_keys($wishlistItem));
            $values = "'" . implode("', '", array_values($wishlistItem)) . "'";
            $sql = sprintf($queries[16], $columns, $values);
            // echo "INSERT QUERY: " . $sql . "\n";
            $result = $this->varDBConnection->query($sql);
    
            // if (!$result) {
            //     throw new Exception('Database error: ' . $this->varDBConnection->error);
            // }
    
            echo json_encode(['status' => 'success', 'message' => 'Product added to wishlist successfully'
            ]);
    
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()
            ]);
        }
    }

    function getWishlistItems()
    {
        try {
            $queries = $this->SQLArray();
            $items = $this->varModelObj->ListFromTable($queries[6]);
            $items = json_decode($items, true) ?: [];
            
            foreach ($items as &$item) {
                $itemPrice = floatval($item['product_amount_selling']);
                $itemMrp = floatval($item['product_amount_mrp']);
                // $itemOfferprice = floatval($item['product_amount_offer']);
                // Ensure default values if empty
                $item['product_color'] = $item['product_color'] ?? 'none';
                $item['product_size'] = $item['product_size'] ?? 'none';
            }
            
            echo json_encode([
                'status' => 'success',
                'items' => $items,
                'cart_count' => count($items)
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    function removeWishlistItem()
    {
        try {
            $wishlistId = intval($_POST['wishlist_id'] ?? 0);
            $queries = $this->SQLArray();
            
            if (!$wishlistId) {
                throw new Exception('wishlist item ID is required');
            }
            
            $sql = sprintf($queries[9], $wishlistId);
            $result = $this->varDBConnection->query($sql);
            
            if (!$result) {
                throw new Exception('Failed to remove item: ' . $this->varDBConnection->error);
            }
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Item removed from wishlist'
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    function removeWishlistItemshop() {
        try {
            $productId = intval($_POST['product_id'] ?? 0);
            $queries = $this->SQLArray();
    
            if (!$productId) {
                throw new Exception('Product ID is required');
            }
    
            $sql = sprintf($queries[10], $productId);
            $result = $this->varDBConnection->query($sql);
    
            if (!$result) {
                throw new Exception('Failed to remove item: ' . $this->varDBConnection->error);
            }
    
            echo json_encode([
                'status' => 'success',
                'message' => 'Product removed from wishlist'
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    function checkWishlistStatus() {
        try {
            $productId = intval($_POST['product_id'] ?? 0);
            $queries = $this->SQLArray();
    
            if (!$productId) {
                throw new Exception('Product ID is required');
            }
    
            $existingWishlistItem = $this->varModelObj->GetSingleRow(sprintf(
                $queries[7],
                $productId
            ));
    
            if ($existingWishlistItem) {
                echo json_encode(['status' => 'exists']);
            } else {
                echo json_encode(['status' => 'not_exists']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

$obj = new ProductDetailsController();
$obj->RequestAccept($obj->actionevents);