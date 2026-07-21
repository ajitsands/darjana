<?php
session_start();
require('../model/common/common_functions.php');

class CartController
{
    var $varModelObj, $varDBConnection;
    public $actionevents, $formdata, $SQLQuery;
    public $productId, $cartId, $quantity, $color, $size, $customerId,$vendor_id;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        $this->productId = intval($_POST['product_id'] ?? 0);
        $this->cartId = intval($_POST['cart_id'] ?? 0);
        $this->quantity = intval($_POST['quantity'] ?? 1);
        $this->color = trim($_POST['color'] ?? '');
        $this->size = trim($_POST['size'] ?? '');
        $this->customerId = $_SESSION["ids"] ?? 0;
        $this->vendor_id = intval($_POST['vendor_id'] ?? 0);
        //$this->productLength = intval($_POST['productLength'] ?? 0);
        $this->productLength = intval($_POST['length'] ?? 0);
    }

    function SQLArray()
    {
        $escapeColor = $this->varDBConnection->real_escape_string($this->color);
        $escapeSize = $this->varDBConnection->real_escape_string($this->size);

        $array = [];

        // $array[0] = "SELECT 
        //     cp.*,
        //     pd.amount_mrp as product_amount_mrp,
        //     pd.amount_selling as product_amount_selling,
        //     pd.amount_offer as product_amount_offer,
        //     pd.product_description,
        //     pd.product_name_arabic,
        //     pd.product_brand_name_arabic,
        //     pd.warranty_details
        //     FROM cart_products cp
        //     LEFT JOIN product_details pd ON pd.ids = cp.product_id
        //     WHERE cp.customer_id = $this->customerId
        //     ORDER BY cp.added_date DESC";
        
        $array[0]="SELECT 
            cp.*,
        
            pd.amount_mrp as product_amount_mrp,
            pd.amount_selling as product_amount_selling,
            pd.amount_offer as product_amount_offer,
            pd.product_description,
            pd.product_name_arabic,
            pd.product_brand_name_arabic,
            pd.warranty_details,
        
            (
                SELECT pi.product_image
                FROM product_image pi
                WHERE pi.product_id = pd.ids
                    AND pi.status = 'Active'
                ORDER BY pi.is_primary DESC, pi.ids ASC
                LIMIT 1
            ) AS product_image
        
        FROM cart_products cp
        
        LEFT JOIN product_details pd 
            ON pd.ids = cp.product_id
        
        WHERE cp.customer_id = $this->customerId
        
        ORDER BY cp.added_date DESC";

        $array[1] = "UPDATE cart_products SET quantity = $this->quantity WHERE ids = $this->cartId";

        $array[2] = "DELETE FROM cart_products WHERE ids = $this->cartId";

        $array[3] = "SELECT 1 FROM product_specification_color 
            WHERE product_id = $this->productId AND product_color = '$escapeColor'";

        $array[4] = "SELECT 1 FROM product_specification_size 
            WHERE product_id = $this->productId AND product_size = '$escapeSize'";

        $array[5] = "SELECT product_color FROM product_specification_color 
            WHERE product_id = $this->productId LIMIT 1";

        $array[6] = "SELECT product_size FROM product_specification_size 
            WHERE product_id = $this->productId LIMIT 1";

        $array[7] = "SELECT 
            pd.*, 
            (SELECT product_image FROM product_image 
             WHERE product_id = pd.ids AND status = 'Active' LIMIT 1) as product_image
            FROM product_details pd 
            WHERE pd.ids = $this->productId AND pd.status = 'Active'";


        $array[8] = "INSERT INTO cart_products (%s) VALUES (%s)";
     

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'get_cart_items':
                //echo $var[0];
                $this->getCartItems($var[0]);
                break;

            case 'update_cart_item':
                $this->updateCartItem($var[1]);
                break;

            case 'remove_cart_item':
                $this->removeCartItem($var[2]);
                break;

            case 'add_to_cart':
                $this->addToCart($var);
                break;

            case 'update_cart_description':

                $cart_id = $_POST['cart_id'] ?? 0;
                $customer_desc = $_POST['customer_desc'] ?? '';
            
                if (!$cart_id) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Cart ID is required'
                    ]);
                    exit;
                }
            
                $cart_id = (int)$cart_id;
                $customer_desc = mysqli_real_escape_string($this->varModelObj->varDBConnection, $customer_desc);
            
                $query = "UPDATE cart_products 
                          SET customer_desc = '$customer_desc' 
                          WHERE ids = $cart_id";
            
                $affected_rows = $this->varModelObj->UpdateTable($query);
            
                if ($affected_rows > 0) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Description updated successfully'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Failed to update description or no changes made'
                    ]);
                }
            
                exit;
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }

    function getCartItems($query)
    {
        try {
            $items = $this->varModelObj->ListFromTable($query);
            $items = json_decode($items, true) ?: [];

            $subtotal = 0;
            $savings = 0;

            foreach ($items as &$item) {
                $itemPrice = floatval($item['product_amount_selling']);
                $itemofferPrice = floatval($item['product_amount_offer']);
                $itemMrp = floatval($item['product_amount_mrp']);
                $qty = intval($item['quantity']);

                $subtotal += $itemofferPrice * $qty;
                $savings += ($itemMrp - $itemofferPrice) * $qty;

                $item['product_color'] = $item['product_color'] ?? 'none';
                $item['product_size'] = $item['product_size'] ?? 'none';
            }

            echo json_encode([
                'status' => 'success',
                'items' => $items,
                'subtotal' => $subtotal,
                'savings' => $savings,
                'cart_count' => count($items)
            ]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function updateCartItem($query)
    {
        try {
            // if (!$this->cartId) {
            //     throw new Exception('Cart item ID is required');
            // }

            if ($this->quantity < 1) {
                throw new Exception('Quantity must be at least 1');
            }

            $result = $this->varDBConnection->query($query);

            if (!$result) {
                throw new Exception('Failed to update cart: ' . $this->varDBConnection->error);
            }

            echo json_encode(['status' => 'success', 'message' => 'Cart updated successfully']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function removeCartItem($query)
    {
        try {
            if (!$this->cartId) {
                throw new Exception('Cart item ID is required');
            }

            $result = $this->varDBConnection->query($query);

            if (!$result) {
                throw new Exception('Failed to remove item: ' . $this->varDBConnection->error);
            }

            echo json_encode(['status' => 'success', 'message' => 'Item removed from cart']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function addToCart($var)
    {
        try {
            if (!$this->productId) {
                throw new Exception('Product ID is required.');
            }
    
            if ($this->customerId == 0) {
                echo json_encode([
                    'status' => 'redirect',
                    'message' => 'Please login to add items to the cart.',
                    'redirect_url' => '/Login'
                ]);
                return;
            }
    
            // Get customer description from POST data
            $customer_desc = trim($_POST['customer_desc'] ?? '');
            $customer_desc = $this->varDBConnection->real_escape_string($customer_desc);
    
            $product = $this->varModelObj->GetSingleRow($var[7]);
            if (!$product) {
                throw new Exception('Product not found.');
            }
    
            if ($this->color !== '') {
                $validColor = $this->varModelObj->GetSingleRow($var[3]);
                if (!$validColor) $this->color = '';
            }
    
            if ($this->size !== '') {
                $validSize = $this->varModelObj->GetSingleRow($var[4]);
                if (!$validSize) $this->size = '';
            }
    
            if ($this->color === '') {
                $defaultColor = $this->varModelObj->GetSingleRow($var[5]);
                $this->color = $defaultColor['product_color'] ?? 'none';
            }
    
            if ($this->size === '') {
                $defaultSize = $this->varModelObj->GetSingleRow($var[6]);
                $this->size = $defaultSize['product_size'] ?? 'none';
            }
    
            $cartItem = [
                'customer_id' => $this->customerId,
                'product_id' => $this->productId,
                'vendor_id' => $this->vendor_id,
                'product_amount_mrp' => $product['amount_mrp'],
                'product_amount_selling' => $product['amount_selling'],
                'product_amount_offer' => $product['amount_offer'],
                'product_name' => $product['product_name'],
                'product_brand_name' => $product['product_brand_name'],
                'color_id' => 0,
                'product_color' => $this->color,
                'image_id' => 0,
                'product_image' => $product['product_image'],
                'size_id' => 0,
                'product_size' => $this->size,
                'quantity' => $this->quantity,
                'length' => $this->productLength,
                'customer_desc' => $customer_desc,  // ADD THIS LINE
                'added_date' => date('Y-m-d H:i:s')
            ];
    
            $columns = implode(", ", array_keys($cartItem));
            $values = "'" . implode("', '", array_map([$this->varDBConnection, 'real_escape_string'], array_values($cartItem))) . "'";
            $sql = sprintf($var[8], $columns, $values);
            
            $result = $this->varDBConnection->query($sql);
    
            if (!$result) {
                throw new Exception('Database error: ' . $this->varDBConnection->error);
            }
    
            echo json_encode(['status' => 'success', 'message' => 'Product added to cart successfully.']);
            return;
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

$obj = new CartController();
$obj->RequestAccept($obj->actionevents);
