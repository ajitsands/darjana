<?php
session_start();
require('../model/common/common_functions.php');

class orders_controller
{
    var $varModelObj, $varDBConnection;
    public
    $actionevents,
    $ids,
    $customer_name,
    $permanent_address,
    $postal_code,
    $district,
    $state,
    $street,
    $country,
    $mobile_no,
    $whatsapp_no,
    $email_user_name,
    $orderid,
    $productId,
    $quantity,
    $color,
    $customerId,
    $fuName,
    $paddress,
    $postalcode,
    $mobile,
    $wmobile,
    $email,
    $address_id,
    $customer_id,
    $permanentadd,
    $streets,
    $fullname,
    $pocode,
    $states,
    $countrys,
    $districts,
    $mobiles,
    $whatsappnos,
    $emails,
    $v_fuName,
    $v_paddress,
    $v_street,
    $v_postalcode,
    $v_country,
    $v_state,
    $v_district,
    $v_mobile,
    $v_email,
    $product_id,
    $order_id,
    $flag;
    public $cart_items;


    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
        $this->ids = $_POST['ids'] ?? null;
        $this->customer_name = $_POST['customer_name'] ?? null;
        $this->permanent_address = $_POST['permanent_address'] ?? null;
        $this->postal_code = $_POST['postal_code'] ?? null;
        $this->district = $_POST['district'] ?? null;
        $this->state = $_POST['state'] ?? null;
        $this->street = $_POST['street'] ?? null;
        $this->country = $_POST['country'] ?? null;
        $this->mobile_no = $_POST['mobile_no'] ?? null;
        $this->whatsapp_no = $_POST['whatsapp_no'] ?? null;
        $this->email_user_name = $_POST['email_user_name'] ?? null;
        $this->product_id = $_POST['product_id'] ?? 0;

        $this->order_id = 'ORD' . time() . rand(100, 999);
        $this->orderid = $_POST['orderid'] ?? null;
        $this->productId = $_POST['id'] ?? null;
        $this->quantity = $_POST['quantity'] ?? null;
        $this->color = $_POST['color'] ?? null;
        // $this->$size = $_POST['size'];
        $this->customerId = $_SESSION["ids"] ?? 0;
        $this->flag = $_POST['flag'] ?? 0; // Assuming flag is used to determine if it's a new order or not


        $this->fuName = $this->varDBConnection->real_escape_string($_POST['fuName'] ?? '');
        $this->paddress = $this->varDBConnection->real_escape_string($_POST['paddress'] ?? '');
        $this->street = $this->varDBConnection->real_escape_string($_POST['street'] ?? '');
        $this->postalcode = $this->varDBConnection->real_escape_string($_POST['postalcode'] ?? '');
        $this->country = $this->varDBConnection->real_escape_string($_POST['country'] ?? '');
        $this->state = $this->varDBConnection->real_escape_string($_POST['state'] ?? '');
        $this->mobile = $this->varDBConnection->real_escape_string($_POST['mobile'] ?? '');
        $this->wmobile = $this->varDBConnection->real_escape_string($_POST['wmobile'] ?? '');
        $this->email = $this->varDBConnection->real_escape_string($_POST['email'] ?? '');
        $this->address_id = $_POST['address_id'] ?? null;
        $this->customer_id = $_POST['customer_id'] ?? null;
        // $this->shipping_address = $_POST['shipping_address'] ?? null;
        $this->permanentadd = $_POST['permanentadd'] ?? null;
        $this->streets = $_POST['streets'] ?? null;
        $this->fullname = $_POST['fullname'] ?? null;
        $this->pocode = $_POST['pocode'] ?? null;
        $this->states = $_POST['states'] ?? null;
        $this->countrys = $_POST['countrys'] ?? null;
        $this->districts = $_POST['districts'] ?? null;
        $this->mobiles = $_POST['mobiles'] ?? null;
        $this->whatsappnos = $_POST['whatsappnos'] ?? null;
        $this->emails = $_POST['emails'] ?? null;
        $this->v_fuName = $_POST['v_fuName'] ?? null;
        $this->v_paddress = $_POST['v_paddress'] ?? null;
        $this->v_street = $_POST['v_street'] ?? null;
        $this->v_postalcode = $_POST['v_postalcode'] ?? null;
        $this->v_country = $_POST['v_country'] ?? null;
        $this->v_district = $_POST['v_district'] ?? null;
        $this->v_state = $_POST['v_state'] ?? null;
        $this->v_mobile = $_POST['v_mobile'] ?? null;
        $this->v_email = $_POST['v_email'] ?? null;
        $this->cart_items = $_POST['cart_items'] ?? null;
    }

    function SQLArray()
    {

        $array[0] = "Select * from order_details where customer_id = '" . $_SESSION['ids'] . "'";
        // $array[1] = "SELECT ids, customer_name, permenant_address, postal_code, district, state, street, country, mobile_no, whatsapp_no, email_user_name 
        //      FROM customer_details WHERE ids = '" . $_SESSION['ids'] . "'";
         $array[1] ="SELECT cd.ids, cd.customer_name, cd.permenant_address, cd.postal_code, cd.district, s.state_name AS state, cd.street, c.country, cd.mobile_no,cd.whatsapp_no, cd.email_user_name 
             FROM customer_details AS cd RIGHT JOIN country AS c ON cd.country=c.ids RIGHT JOIN state AS s ON cd.state=s.ids WHERE cd.ids ='" . $_SESSION['ids'] . "'"

        
        $array[2] = "SELECT 
                pd.ids, 
                pd.product_name, 
                pd.amount_mrp, 
                pd.amount_selling, 
                pd.amount_offer, 
                MIN(pi.product_image) AS product_image
            FROM 
                product_details pd
            LEFT JOIN 
                product_image pi ON pd.ids = pi.product_id
            WHERE 
                pd.ids = '$this->product_id'
            GROUP BY 
                pd.ids, pd.product_name, pd.amount_mrp, pd.amount_selling, pd.amount_offer
            ";

        $array[3] = "SELECT ids,product_name,placed_date,customer_address,product_image,status,order_id  FROM order_details WHERE ids = '" . $this->orderid . "'OR order_id = '" . $this->orderid . "'";
        
        $array[5] = "INSERT INTO customer_shipping_address(
                    customer_id, shipping_address, postal_code, street, 
                     state, country,district,customer_name, mobile_no, 
                    whatsapp_no, email_address
                ) VALUES(
                   
                    '" . $this->customer_id . "',
                    '" . $this->permanentadd . "',
                    '" . $this->pocode . "',
                    '" . $this->streets . "',
                    '" . $this->states . "',
                    '" . $this->countrys . "',
                    '" . $this->districts . "',
                    '" . $this->fullname . "',
                    '" . $this->mobiles . "',
                    '" . $this->whatsappnos . "',
                    '" . $this->emails . "'
                )";
        $array[6] = "SELECT *  FROM order_history WHERE tracking_id = '" . $this->orderid . "' OR order_id = '" . $this->orderid . "'";
        $array[7] = "SELECT ids,customer_name,shipping_address,street,state,district,postal_code,country,mobile_no,whatsapp_no,email_address FROM customer_shipping_address WHERE customer_id = '" . $this->customerId . "'";
        $array[8] = "SELECT * FROM customer_shipping_address WHERE ids = '" . $this->address_id . "'";
        // $array[9] = "INSERT into order_details";
        $array[10] = "SELECT * FROM order_details WHERE ids = '" . $this->orderid . "' OR order_id = '" . $this->orderid . "'";
        $array[11] = "INSERT INTO order_details(order_id,
                                                customer_id,
                                                customer_name,
                                                customer_address,
                                                postal_code,
                                                street,
                                                country,
                                                state,
                                                district,
                                                customer_mobile_no,
                                                customer_email,
                                                product_id,
                                                product_name,
                                                quantity,
                                                product_color,
                                                product_cost,
                                                selling_price,
                                                discount_price,
                                                product_size,
                                                product_image,
                                                placed_date,
                                                status) VALUES 
                                                ('". $this->order_id ."',
        '" . ($_SESSION['ids'] ?? 0) . "','" . $this->v_fuName . "','" . $this->v_paddress . "','" . $this->v_postalcode . "','" . $this->v_street . "','" . $this->v_country . "','" . $this->v_state . "','" . $this->v_district . "','" . $this->v_mobile . "','" . $this->v_email . "','" .($this->product_id ?? 0) . "',(SELECT product_name FROM product_details WHERE ids = '" . ($this->product_id ?? 0) . "'),
        '" . (intval($_POST['quantity'] ?? 0)) . "',
        '" . ($this->varDBConnection->real_escape_string($_POST['color'] ?? '')) . "',
        (SELECT amount_mrp FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
         (SELECT amount_selling FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
        (SELECT amount_offer FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
        '" . ($this->varDBConnection->real_escape_string($_POST['size'] ?? '')) . "',    
        (SELECT product_image FROM product_image WHERE product_id = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "' LIMIT 1),
        NOW(),
        'order placed' )";

       
        $array[12] = "SELECT 
                cd.*,
                (
                    SELECT GROUP_CONCAT(
                        CONCAT_WS('||',  
                            cp.product_name, 
                            cp.product_amount_selling, 
                            cp.quantity, 
                            cp.product_image, 
                            cp.product_id, 
                            cp.product_color, 
                            cp.product_size, 
                            cp.product_amount_mrp, 
                            cp.product_amount_offer
                        ) 
                        SEPARATOR ';;'
                    ) 
                    FROM cart_products cp 
                    WHERE cp.customer_id = cd.ids
                ) AS cart_items,
                (
                    SELECT SUM(cp.product_amount_selling * cp.quantity) 
                    FROM cart_products cp 
                    WHERE cp.customer_id = cd.ids
                ) AS cart_total
            FROM 
                customer_details cd
            WHERE 
                cd.ids = $this->customerId
            ";

        $array[13] = "SELECT 
                cp.product_id, 
                pd.product_name, 
                cp.product_amount_selling as amount_mrp, 
                cp.quantity, 
                cp.product_color as color,
                pi.product_image
            FROM cart_products cp
            JOIN product_details pd ON cp.product_id = pd.ids
            LEFT JOIN product_image pi ON cp.product_id = pi.product_id AND pi.id = (
                SELECT MIN(id) FROM product_image WHERE product_id = cp.product_id
            )
            WHERE cp.customer_id = '" . $this->customerId . "'";
        $array[14] = "DELETE FROM cart_products WHERE customer_id = '" . $_SESSION['ids']  . "'";
        $array[15] = "DELETE FROM customer_shipping_address WHERE ids = '" . $this->address_id . "'";
       
        
        return $array; 


    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'orders_list':
                // echo $var[0];
                $this->varModelObj->ListFromJSon($var[0]);

                break;
            case 'customer_list':
                echo "customer address".$var[1];
                $this->varModelObj->ListFromJSon($var[1]);
                break;

           case 'product_list':
            if ($this->flag != 1) {
                $this->varModelObj->ListFromJSon($var[2]);
            } else {
                $this->varModelObj->ListFromJSon($var[12]);
            }
            break;
            case 'get_order_details':
                //  echo $var[3];
                $this->varModelObj->ListFromJSon($var[3]);
                break;

            case 'update_address':
                // Sanitize inputs
                $address_id = $this->varDBConnection->real_escape_string($_POST['address_id'] ?? '');
                $customer_name = $this->varDBConnection->real_escape_string($_POST['customer_name'] ?? '');
                $shipping_address = $this->varDBConnection->real_escape_string($_POST['shipping_address'] ?? '');
                $street = $this->varDBConnection->real_escape_string($_POST['street'] ?? '');
                $postal_code = $this->varDBConnection->real_escape_string($_POST['postal_code'] ?? '');
                $country = $this->varDBConnection->real_escape_string($_POST['country'] ?? '');
                $state = $this->varDBConnection->real_escape_string($_POST['state'] ?? '');
                $district = $this->varDBConnection->real_escape_string($_POST['district'] ?? '');
                $mobile_no = $this->varDBConnection->real_escape_string($_POST['mobile_no'] ?? '');
                $email_address = $this->varDBConnection->real_escape_string($_POST['email_address'] ?? '');

                // Basic validation
                if (empty($address_id)) {
                    echo json_encode(['success' => false, 'message' => 'Address ID is required']);
                    exit;
                }

                // Build the update query
                $update_query = "UPDATE customer_shipping_address SET 
                    customer_name = '$customer_name',
                    shipping_address = '$shipping_address',
                    street = '$street',
                    postal_code = '$postal_code',
                    country = '$country',
                    state = '$state',
                    district = '$district',
                    mobile_no = '$mobile_no',
                    email_address = '$email_address'
                    WHERE ids = '$address_id'";

                $result = $this->varModelObj->UpdateTable($update_query);

                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Address updated successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error updating address']);
                }
                break;
        case 'save_address':
           
            ob_clean(); 
            header('Content-Type: application/json');
            
            try {
                if (empty($this->customer_id)) {
                    throw new Exception('Customer not logged in');
                }
                
                if (empty($this->fullname) || empty($this->permanentadd)) {
                    throw new Exception('All required fields must be filled');
                }

                $result = $this->varModelObj->AddToTables($var[5]);

                echo json_encode([
                    'status' => $result ? 'success' : 'error', 
                    'message' => $result ? 'Address saved successfully' : 'Database error: Failed to save address'
                ]);
                exit; 
            } catch (Exception $e) {
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
                
            }
            break;

            case 'customer_shipping_details':

                // echo $var[7];
                $this->varModelObj->ListFromJSon($var[7]);
                break;

            case 'get_order_history':
                // echo $var[2];
                $this->varModelObj->ListFromJSon($var[6]);
                break;
            case 'get_single_address':
                $this->varModelObj->ListFromJSon($var[8]);
                break;
            case 'submit_order':
                ob_start();
                
                try {
                   
                    if (
                        empty($this->v_fuName) || empty($this->v_paddress) || empty($this->v_postalcode) ||
                        empty($this->v_country) || empty($this->v_state) || empty($this->v_district) || empty($this->v_mobile) || empty($this->v_email)
                    ) {
                        throw new Exception('All required address fields must be filled');
                    }
                    // $order_id = 'ORD' . time() . rand(100, 999);
                    $success = true;

                    if ($this->flag != 1) {
                  
                        $result = $this->varModelObj->AddToTable($var[11]);
                        if (!$result) {
                            throw new Exception('Error placing single product order');
                        }
                        $response = ['status' => 'success', 'order_id' => $this->order_id];
                    } else {
                    if (empty($this->cart_items)) {
                        throw new Exception('No cart items provided');
                    }

                    $cartItems = explode(';;', $this->cart_items);
                    foreach ($cartItems as $item) {
                        if (empty($item)) continue;
                        list($product_name, $price, $quantity, $image, $product_id, $product_color, $product_size) = explode('||', $item);

                        $product_query = "SELECT ids, amount_mrp FROM product_details WHERE ids = '" . intval($product_id) . "' LIMIT 1";
                        $product_result = $this->varDBConnection->query($product_query);
                        $product = $product_result->fetch_assoc();
                        $product_id = $product ? $product['ids'] : 0;
                        $product_cost = $product ? $product['amount_mrp'] : $price;
                       
                        $insert_query = "INSERT INTO order_details(
                            order_id, customer_id, customer_name, customer_address, postal_code, street, 
                            country, state,district, customer_mobile_no, customer_email, product_id, product_name, 
                            quantity, product_color, product_size, product_cost, product_image, placed_date, status
                        ) VALUES (
                            '$this->order_id',
                            '" . ($_SESSION['ids'] ?? 0) . "',
                            '" . $this->v_fuName . "',
                            '" . $this->v_paddress . "',
                            '" . $this->v_postalcode . "',
                            '" . $this->v_street . "',
                            '" . $this->v_country . "',
                            '" . $this->v_state . "',
                            '" . $this->v_district . "',
                            '" . $this->v_mobile . "',
                            '" . $this->v_email . "',
                            '$product_id',
                            '" . $this->varDBConnection->real_escape_string($product_name) . "',
                            '" . intval($quantity) . "',
                            '" . $this->varDBConnection->real_escape_string($product_color) . "',
                            '" . $this->varDBConnection->real_escape_string($product_size) . "',
                            '" . floatval($product_cost) . "',
                            '" . $this->varDBConnection->real_escape_string($image) . "',
                            NOW(),
                            'Active'
                        )";

                        $result = $this->varModelObj->AddToTable($insert_query);
                        
                        if (!$result) {
                            $success = false;
                            break;
                        }
                    }

                    if ($success) {
                        
                       
                        $clearCartResult = $this->varModelObj->AddToTable($var[14]);
                        
                        $response = [
                            'status' => 'success',
                            'order_id' => $this->order_id,
                            'cart_cleared' => $clearCartResult
                        ];
                    } else {
                        throw new Exception('Error placing cart order');
                    }
                }
                } catch (Exception $e) {
                    $response = [
                        'status' => 'error', 
                        'message' => $e->getMessage()
                    ];
                }
                ob_clean();
                header('Content-Type: application/json');
                echo json_encode($response);
                break;

            case 'get_item_details':
                 // echo $var[10];
                $this->varModelObj->ListFromJSon($var[10]);
                break;
            case 'delete_address':
                
                $this->varModelObj->DeleteRow($var[15]);
                break;
            
            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }

    }
}

$obj = new orders_controller();
$obj->RequestAccept($obj->actionevents);