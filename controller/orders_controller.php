<?php
session_start();
date_default_timezone_set('Asia/Bahrain');
require('../model/common/common_functions.php');
require_once(__DIR__ . '/afs_payment.php');

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
    $order_id, $promo_code, $promo_discount,
    $flag,
    $size;
    public $cart_items, $vendor_id;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;
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
        $this->length = $_POST['length'] ?? null;
        $this->notes = $this->varDBConnection->real_escape_string($_POST['notes'] ?? '');
        $this->customerId = $_SESSION["ids"] ?? 0;
        $this->flag = $_POST['flag'] ?? 0;
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
        $this->permanentadd = $_POST['permanentadd'] ?? null;
        $this->streets = $_POST['streets'] ?? null;
        $this->fullname = $_POST['fullname'] ?? null;
        // $this->pocode = $_POST['pocode'] ?? null;
        // $this->pocode = ($this->pocode === null) ? "0" : "'".$this->pocode."'";
        $this->pocode = !empty($_POST['pocode']) ? $_POST['pocode'] : null;
        //  $this->pocode = ($this->pocode === null) ? " " : "'".$this->pocode."'";
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
        $this->v_postalcode = ($this->v_postalcode === null) ? " " : "'".$this->v_postalcode."'";
        $this->v_country = $_POST['v_country'] ?? null;
        $this->v_district = $_POST['v_district'] ?? null;
        $this->v_state = $_POST['v_state'] ?? null;
        $this->v_mobile = $_POST['v_mobile'] ?? null;
        $this->v_email = $_POST['v_email'] ?? null;
        $this->cart_items = $_POST['cart_items'] ?? null;
        $this->vendor_id = $_POST['vendor_id'] ?? null;
        $this->country_id = $_POST['country_id'] ?? null;
        $this->state_id = $_POST['state_id'] ?? null;
        $this->comments = $_POST['comments'] ?? null;
        $this->promo_code = $_POST['promo_code'] ?? null;
        $this->promo_discount = $_POST['promo_discount'] ?? null;
        $this->size = $_POST['size'] ?? null;
        date_default_timezone_set('Asia/Bahrain');
        $this->created_at = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array[0] = "
                        SELECT 
                            od.*,
                            pd.product_name_arabic
                        FROM order_details od
                        INNER JOIN product_details pd 
                            ON od.product_id = pd.ids
                        WHERE od.customer_id = '" . $_SESSION['ids'] . "'
                        ORDER BY od.ids DESC
                    ";

        // $array[1] = "SELECT ids, customer_name, permenant_address, postal_code, district, state, street, country, mobile_no, whatsapp_no, email_user_name 
        //      FROM customer_details WHERE ids = '" . $_SESSION['ids'] . "'";
        $array[1] = "SELECT cd.ids, cd.customer_name, cd.permenant_address, cd.postal_code, cd.district, 
                COALESCE(s.state_name, cd.state) AS state, 
                cd.street, 
                COALESCE(c.country, cd.country) AS country, 
                cd.mobile_no,
                cd.whatsapp_no, 
                cd.email_user_name 
                FROM customer_details AS cd
                LEFT JOIN country AS c ON (cd.country = c.ids OR cd.country = c.country)
                LEFT JOIN state AS s ON (cd.state = s.ids OR cd.state = s.state_name)
                WHERE cd.ids = '" . $_SESSION['ids'] . "'
                ";
        $array[2] = "SELECT 
                pd.ids, 
                pd.product_name, 
                pd.amount_mrp, 
                pd.amount_selling, 
                pd.amount_offer,
                pd.vendor_id,
                pd.product_name_arabic,
                CASE 
                    WHEN vd.tax_type = 0 THEN vd.tax_percentage 
                    ELSE pd.tax_percentage 
                END AS tax_percentage,
                CASE 
                    WHEN vd.tax_type = 0 THEN vd.cod_fee 
                    ELSE pd.cod_fee 
                END AS cod_fee,
                MIN(pi.product_image) AS product_image
            FROM 
                product_details pd
            LEFT JOIN vendor_details vd ON pd.vendor_id = vd.ids
            LEFT JOIN 
                product_image pi ON pd.ids = pi.product_id
            WHERE 
                pd.ids = '$this->product_id'
            GROUP BY 
                pd.ids, pd.product_name, pd.amount_mrp, pd.amount_selling, pd.amount_offer, 
                pd.vendor_id, vd.tax_percentage, vd.cod_fee, vd.tax_type, pd.tax_percentage, pd.cod_fee";
        $array[3] = "SELECT ids, product_name, placed_date, customer_address, product_image, status, order_id, 
                 quantity, discount_price, selling_price, tax_percentage, cod_fee, product_color, product_size 
                 FROM order_details 
                 WHERE ids = '" . $this->orderid . "' OR order_id = '" . $this->orderid . "'";
        $array[5] = "INSERT INTO customer_shipping_address(
                    customer_id, shipping_address, postal_code, street, 
                     state, country, district, customer_name, mobile_no, 
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
        $array[6] = "SELECT 
                        oh.*,
                        pd.product_name_arabic
                    FROM order_history oh
                    INNER JOIN product_details pd 
                        ON oh.product_id = pd.ids
                    WHERE oh.tracking_id = '" . $this->orderid . "'
                       OR oh.order_id = '" . $this->orderid . "'";
        $array[7] = "SELECT ids, customer_name, shipping_address, street, state, district, postal_code, country, mobile_no, whatsapp_no, email_address FROM customer_shipping_address WHERE customer_id = '" . $this->customerId . "'";
        $array[8] = "SELECT * FROM customer_shipping_address WHERE ids = '" . $this->address_id . "'";
        $array[10] = "
                        SELECT 
                            od.*,
                            pd.product_name_arabic
                        FROM order_details od
                        LEFT JOIN product_details pd 
                            ON od.product_id = pd.ids
                        WHERE od.ids = '" . $this->orderid . "'
                           OR od.order_id = '" . $this->orderid . "'
                    ";

        $array[11] = "INSERT INTO order_details(
                order_id, customer_id, customer_name, customer_address, postal_code, street, 
                country, state, district, customer_mobile_no, customer_email, product_id, 
                product_name, vendor_id, quantity, product_color, product_cost, selling_price, 
                discount_price, product_size, product_image, placed_date, status
            ) VALUES (
                '" . $this->order_id . "',
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
                '" . ($this->product_id ?? 0) . "',
                (SELECT product_name FROM product_details WHERE ids = '" . ($this->product_id ?? 0) . "'),
                '" . ($this->vendor_id ?? 0) . "',
                '" . (intval($_POST['quantity'] ?? 0)) . "',
                '" . ($this->varDBConnection->real_escape_string($_POST['color'] ?? '')) . "',
                (SELECT amount_mrp FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
                (SELECT amount_selling FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
                (SELECT amount_offer FROM product_details WHERE ids = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "'),
                '" . ($this->varDBConnection->real_escape_string($_POST['size'] ?? '')) . "',    
                (SELECT product_image FROM product_image WHERE product_id = '" . ($this->varDBConnection->real_escape_string($_POST['product_id'] ?? '')) . "' LIMIT 1),
                '" . date('Y-m-d H:i:s') . "',
                'order placed'
            )";
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
                                    cp.product_amount_offer, 
                                    pd.vendor_id,
                                    pd.product_name_arabic,
                                    cp.customer_desc,
                                    CASE 
                                        WHEN vd.tax_type = 0 THEN vd.tax_percentage 
                                        ELSE pd.tax_percentage 
                                    END,
                                    CASE 
                                        WHEN vd.tax_type = 0 THEN vd.cod_fee 
                                        ELSE pd.cod_fee 
                                    END, cp.length
                                ) 
                                SEPARATOR ';;'
                            ) 
                            FROM cart_products cp 
                            JOIN product_details pd ON cp.product_id = pd.ids
                            JOIN vendor_details vd ON pd.vendor_id = vd.ids
                            WHERE cp.customer_id = cd.ids
                        ) AS cart_items,
                        (
                            SELECT SUM(cp.product_amount_offer * cp.quantity) 
                            FROM cart_products cp 
                            WHERE cp.customer_id = cd.ids
                        ) AS cart_total
                    FROM 
                        customer_details cd
                    WHERE 
                        cd.ids = $this->customerId";
        $array[13] = "SELECT 
                cp.product_id, pd.product_name, cp.product_amount_selling as amount_mrp, 
                cp.quantity, cp.product_color as color, pi.product_image
            FROM cart_products cp
            JOIN product_details pd ON cp.product_id = pd.ids
            LEFT JOIN product_image pi ON cp.product_id = pi.product_id AND pi.id = (
                SELECT MIN(id) FROM product_image WHERE product_id = cp.product_id
            )
            WHERE cp.customer_id = '" . $this->customerId . "'";
        $array[14] = "DELETE FROM cart_products WHERE customer_id = '" . $_SESSION['ids'] . "'";
        $array[15] = "DELETE FROM customer_shipping_address WHERE ids = '" . $this->address_id . "'";
        $array[16] = "UPDATE customer_details SET 
                customer_name = '" . $this->varDBConnection->real_escape_string($this->fullname) . "',
                permenant_address = '" . $this->varDBConnection->real_escape_string($this->permanentadd) . "',
                postal_code = '" . $this->varDBConnection->real_escape_string($this->pocode) . "',
                street = '" . $this->varDBConnection->real_escape_string($this->streets) . "',
                state = '" . $this->varDBConnection->real_escape_string($this->states) . "',
                country = '" . $this->varDBConnection->real_escape_string($this->countrys) . "',
                district = '" . $this->varDBConnection->real_escape_string($this->districts) . "',
                mobile_no = '" . $this->varDBConnection->real_escape_string($this->mobiles) . "',
                whatsapp_no = '" . $this->varDBConnection->real_escape_string($this->whatsappnos) . "'
            WHERE ids = '" . $this->customer_id . "'";

        $array[17] = "SELECT ids AS id, country AS text FROM country ORDER BY country ASC";

        $array[18] = "SELECT ids AS id, state_name AS text FROM state WHERE country_id = '$this->country_id' ORDER BY state_name ASC";

        $array[19] = "SELECT ids AS id, district_name AS text FROM district WHERE stateid = '$this->state_id' ORDER BY district_name ASC";


        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'orders_list':
                $this->varModelObj->ListFromJSon($var[0]);
                break;
            case 'customer_list':
                $this->varModelObj->ListFromJSon($var[1]);
                break;
            case 'product_list':
                if ($this->flag != 1) {
                    $this->varModelObj->ListFromJSon($var[2]);
                } else {
                    $this->varModelObj->ListFromJSon($var[12]);
                }
                break;

            case 'country_list':
                $this->varModelObj->ListFromJSon($var[17]);
                break;

            case 'state_list':
                // $country_id = intval($_POST['country_id'] ?? 0);
                // echo $var[18];
                $this->varModelObj->ListFromJSon($var[18]);
                break;

            case 'district_list':
                $this->varModelObj->ListFromJSon($var[19]);
                break;

            case 'get_order_details':
                $this->varModelObj->ListFromJSon($var[3]);
                break;
            case 'update_address':
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

                if (empty($address_id)) {
                    echo json_encode(['success' => false, 'message' => 'Address ID is required']);
                    exit;
                }

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
                // echo $_POST['pocode'];
                // exit;
                ob_clean();
                header('Content-Type: application/json');
                try {
                    if (empty($this->customer_id)) {
                        throw new Exception('Customer not logged in');
                    }
                    if (empty($this->fullname) || empty($this->permanentadd) || empty($this->countrys) || empty($this->mobiles)) {
                        throw new Exception('All required fields must be filled');
                    }
                    // echo $var[5];
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
            case 'update_customer_address':
                ob_clean();
                header('Content-Type: application/json');
                try {
                    if (empty($this->customer_id)) {
                        throw new Exception('Customer not logged in');
                    }
                    if (empty($this->fullname) || empty($this->permanentadd) || 
                        empty($this->countrys) || empty($this->mobiles)) {
                        throw new Exception('All required fields must be filled');
                    }
                    
                    $result = $this->varModelObj->UpdateTable($var[16]);
                    echo json_encode([
                        'status' => $result ? 'success' : 'error',
                        'message' => $result ? 'Customer address updated successfully' : 'Database error: Failed to update address'
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
                $this->varModelObj->ListFromJSon($var[7]);
                break;
            case 'get_order_history':
                $this->varModelObj->ListFromJSon($var[6]);
                break;
            case 'get_single_address':
                $this->varModelObj->ListFromJSon($var[8]);
                break;
            case 'submit_order':
                ob_start();
                try {
                    // Validate required address fields
                    if (
                        empty($this->v_fuName) || empty($this->v_paddress) ||
                        empty($this->v_country) ||empty($this->v_mobile) || 
                        empty($this->v_email)
                    ) {
                        throw new Exception('All required address fields must be filled');
                    }
                    
                    // Get promo code if applied - NO VALIDATION, just pass through
                    $promo_code = isset($_POST['promo_code']) && !empty($_POST['promo_code']) 
                        ? $this->varDBConnection->real_escape_string(trim($_POST['promo_code'])) 
                        : null;
                    $promo_discount = isset($_POST['promo_discount']) ? floatval($_POST['promo_discount']) : 0;
                    
                    $success = true;
                    $order_id = $this->order_id;
                    
                    if ($this->flag != 1) {
                        // SINGLE PRODUCT ORDER
                        $product_query = "SELECT
                            pd.ids, pd.product_name, pd.amount_mrp, pd.amount_selling, pd.amount_offer,
                            pd.vendor_id, pd.tax_percentage AS product_tax, pd.cod_fee AS product_cod_fee,
                            vd.tax_percentage AS vendor_tax, vd.cod_fee AS vendor_cod_fee, vd.tax_type,
                            vd.gmail_id AS vendor_email,vd.vendor_whatsapp as vendor_whatsapp
                        FROM product_details pd
                        LEFT JOIN vendor_details vd ON pd.vendor_id = vd.ids
                        WHERE pd.ids = '" . $this->varDBConnection->real_escape_string($this->product_id) . "'";
                        
                        $product_result = $this->varDBConnection->query($product_query);
                        if (!$product_result || $product_result->num_rows === 0) {
                            throw new Exception('Product not found');
                        }
                        
                        $product = $product_result->fetch_assoc();
                        
                        $tax_percentage = ($product['tax_type'] == 0) ? $product['vendor_tax'] : $product['product_tax'];
                        $cod_fee = ($product['tax_type'] == 0) ? $product['vendor_cod_fee'] : $product['product_cod_fee'];
                        $vendor_email = trim($product['vendor_email'] ?? '');
                        $vendor_whatsapp = $product['vendor_whatsapp'] ?? "";
                        
                        $insert_query = "INSERT INTO order_details(
                            order_id, customer_id, customer_name, customer_address, postal_code, street,
                            country, state, district, customer_mobile_no, customer_email, product_id,
                            product_name, vendor_id, quantity, product_color, product_cost, selling_price,
                            discount_price, product_size, product_image, placed_date, status,
                            tax_percentage, cod_fee, product_length, product_notes, comments,
                            promo_code, promo_discount
                        ) VALUES (
                            '$this->order_id',
                            '" . ($_SESSION['ids'] ?? 0) . "',
                            '" . $this->v_fuName . "',
                            '" . $this->v_paddress . "',
                            " . $this->v_postalcode . ",
                            '" . $this->v_street . "',
                            '" . $this->v_country . "',
                            '" . $this->v_state . "',
                            '" . $this->v_district . "',
                            '" . $this->v_mobile . "',
                            '" . $this->v_email . "',
                            '" . ($this->product_id ?? 0) . "',
                            (SELECT product_name FROM product_details WHERE ids = '" . ($this->product_id ?? 0) . "'),
                            '" . ($product['vendor_id'] ?? 0) . "',
                            '" . (intval($this->quantity ?? 0)) . "',
                            '" . ($this->varDBConnection->real_escape_string($this->color ?? '')) . "',
                            '" . floatval($product['amount_mrp'] ?? 0) . "',
                            '" . floatval($product['amount_selling'] ?? 0) . "',
                            '" . floatval($product['amount_offer'] ?? 0) . "',
                            '" . ($this->varDBConnection->real_escape_string($this->size ?? '')) . "',
                            (SELECT product_image FROM product_image WHERE product_id = '" . ($this->varDBConnection->real_escape_string($this->product_id ?? '')) . "' LIMIT 1),
                            '" . $this->created_at . "',
                            'order placed',
                            '" . floatval($tax_percentage ?? 0) . "',
                            '" . floatval($cod_fee ?? 0) . "',
                            '" . $this->varDBConnection->real_escape_string($this->length ?? '') . "',
                            '" . $this->varDBConnection->real_escape_string($this->notes ?? '') . "',
                            '" . $this->varDBConnection->real_escape_string($this->comments ?? '') . "',
                            " . ($promo_code ? "'$promo_code'" : "NULL") . ",
                            '" . $promo_discount . "'
                        )";
                        // echo $insert_query;
                        // exit();
                        $result = $this->varModelObj->AddToTable($insert_query);
                        if (!$result) {
                            throw new Exception('Error placing single product order');
                        }
                    } else {
                        // CART ORDER (multiple items)
                        if (empty($this->cart_items)) {
                            throw new Exception('No cart items provided');
                        }
                        
                        $cartItems = explode(';;', $this->cart_items);
                        
                        foreach ($cartItems as $item) {
                            if (empty($item)) continue;
                            
                            $parts = explode('||', $item);
                            
                            // Ensure we have all parts
                            $product_name = $parts[0] ?? '';
                            $price = $parts[1] ?? '0';
                            $quantity = $parts[2] ?? '1';
                            $image = $parts[3] ?? '';
                            $product_id = $parts[4] ?? '';
                            $color = $parts[5] ?? '';
                            $size = $parts[6] ?? '';
                            $mrp = $parts[7] ?? '0';
                            $offer = $parts[8] ?? $price;
                            $vendor_id = $parts[9] ?? '';
                            $arabic_name = $parts[10] ?? '';
                            $customer_desc = $parts[11] ?? '';
                            $tax_percentage = $parts[12] ?? '0';
                            $cod_fee = $parts[13] ?? '0';
                            
                            // Get vendor email & correct tax/COD
                            $vendor_query = "SELECT
                                vd.gmail_id AS vendor_email,
                                vd.tax_percentage AS vendor_tax, vd.cod_fee AS vendor_cod_fee,
                                vd.tax_type,vd.vendor_whatsapp
                            FROM vendor_details vd
                            WHERE vd.ids = '" . intval($vendor_id) . "' LIMIT 1";
                           
                            $vendor_res = $this->varDBConnection->query($vendor_query);
                            $vendor_row = $vendor_res ? $vendor_res->fetch_assoc() : null;
                            $vendor_whatsapp = "";
                            $final_tax = ($vendor_row && $vendor_row['tax_type'] == 0) ? ($vendor_row['vendor_tax'] ?? $tax_percentage) : $tax_percentage;
                            $final_cod = ($vendor_row && $vendor_row['tax_type'] == 0) ? ($vendor_row['vendor_cod_fee'] ?? $cod_fee) : $cod_fee;
                            $vendor_whatsapp = $vendor_row['vendor_whatsapp'] ?? "";
                            
                            $insert_query = "INSERT INTO order_details(
                                order_id, customer_id, customer_name, customer_address, postal_code, street,
                                country, state, district, customer_mobile_no, customer_email, product_id,
                                product_name, vendor_id, quantity, product_color, product_size, product_cost,
                                selling_price, discount_price, product_image, placed_date, status,
                                tax_percentage, cod_fee, product_length, product_notes, comments,
                                promo_code, promo_discount
                            ) VALUES (
                                '$this->order_id',
                                '" . ($_SESSION['ids'] ?? 0) . "',
                                '" . $this->v_fuName . "',
                                '" . $this->v_paddress . "',
                                " . $this->v_postalcode . ",
                                '" . $this->v_street . "',
                                '" . $this->v_country . "',
                                '" . $this->v_state . "',
                                '" . $this->v_district . "',
                                '" . $this->v_mobile . "',
                                '" . $this->v_email . "',
                                '" . intval($product_id) . "',
                                '" . $this->varDBConnection->real_escape_string($product_name) . "',
                                '" . intval($vendor_id) . "',
                                '" . intval($quantity) . "',
                                '" . $this->varDBConnection->real_escape_string($color) . "',
                                '" . $this->varDBConnection->real_escape_string($size) . "',
                                '" . floatval($mrp) . "',
                                '" . floatval($price) . "',
                                '" . floatval($offer) . "',
                                '" . $this->varDBConnection->real_escape_string($image) . "',
                                '" . date('Y-m-d H:i:s') . "',
                                'order placed',
                                '" . floatval($final_tax) . "',
                                '" . floatval($final_cod) . "',
                                '" . $this->varDBConnection->real_escape_string($this->length ?? '') . "',
                                '" . $this->varDBConnection->real_escape_string($customer_desc) . "',
                                '" . $this->varDBConnection->real_escape_string($this->comments ?? '') . "',
                                " . ($promo_code ? "'$promo_code'" : "NULL") . ",
                                '" . $promo_discount . "'
                            )";
                        // echo $insert_query;
                        // exit();
                            $result = $this->varModelObj->AddToTable($insert_query);
                            if (!$result) {
                                $success = false;
                                break;
                            }
                        }
                        
                        if ($success) {
                            // Clear cart after successful cart order
                            $this->varModelObj->AddToTable($var[14]);
                        }
                    }
                   
                    
                    if ($success) {
                        // SEND EMAILS TO CUSTOMER & VENDOR
                        $this->sendOrderConfirmationEmails($order_id, $this->v_email);
                        
                        // Calculate total order amount for AFS OPPWA payment gateway (Effective Price + Tax/VAT + COD Fee)
                        $tot_sql = "SELECT SUM(
                            (CASE WHEN discount_price IS NOT NULL AND discount_price > 0 THEN discount_price ELSE selling_price END * quantity)
                            + ((CASE WHEN discount_price IS NOT NULL AND discount_price > 0 THEN discount_price ELSE selling_price END * quantity) * (tax_percentage / 100.0))
                            + cod_fee
                        ) AS total_amount FROM order_details WHERE order_id = '" . $this->varDBConnection->real_escape_string($order_id) . "'";
                        $tot_res = $this->varDBConnection->query($tot_sql);
                        $tot_row = $tot_res ? $tot_res->fetch_assoc() : null;
                        $orderTotal = floatval($tot_row['total_amount'] ?? 0);

                        $payment_url = null;
                        try {
                            $afs = new AFSPaymentGateway(null, null, null, $this->varDBConnection);
                            if ($afs->isActive()) {
                                $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
                                $baseUrl  = $protocol . "://" . $_SERVER['HTTP_HOST'];
                                $finalAmount = max($orderTotal - floatval($this->promo_discount ?? 0), 0.01);

                                $checkoutRes = $afs->createCheckoutSession([
                                    'order_id'       => $order_id,
                                    'amount'         => $finalAmount,
                                    'currency'       => $afs->getCurrency(),
                                    'customer_email' => $this->v_email ?: 'info@darjanafashion.com',
                                    'customer_name'  => $this->v_fuName ?: ($this->customer_name ?: 'Valued Customer')
                                ]);

                                if (!empty($checkoutRes['checkout_id'])) {
                                    $checkout_id = $checkoutRes['checkout_id'];
                                    $payment_url = "$baseUrl/view/pay_order.php?order_id=" . urlencode($order_id) . "&checkout_id=" . urlencode($checkout_id);
                                } else {
                                    error_log("AFS OPPWA Checkout Session Error: " . json_encode($checkoutRes));
                                }
                            }
                        } catch (Exception $e) {
                            error_log("AFS OPPWA Gateway Error: " . $e->getMessage());
                        }

                        $response = [
                            'status'          => 'success',
                            'order_id'        => $order_id,
                            'vendor_whatsapp' => $vendor_whatsapp,
                            'payment_url'     => $payment_url
                        ];
                    } else {
                        throw new Exception('Error placing order – some items failed to save');
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
            case 'afs_callback':
                $this->handlePaymentResponse($_POST, false);
                break;
            case 'afs_webhook':
                $this->handlePaymentResponse($_POST, true);
                break;
            case 'get_item_details':
                $this->varModelObj->ListFromJSon($var[10]);
                break;
            case 'delete_address':
                $this->varModelObj->DeleteRow($var[15]);
                break;
            case 'cancel_order':
                $order_id = $this->varDBConnection->real_escape_string($_POST['order_id'] ?? '');
                $reason = $this->varDBConnection->real_escape_string($_POST['reason'] ?? 'Customer requested cancellation');
                $cancelled_at = $this->varDBConnection->real_escape_string($_POST['cancelled_at'] ?? date('Y-m-d H:i:s'));
                if (!empty($order_id)) {
                    $chk_sql = "SELECT status FROM order_details WHERE ids = '$order_id'";
                    $chk_res = mysqli_query($this->varDBConnection, $chk_sql);
                    if ($chk_res && $chk_row = mysqli_fetch_assoc($chk_res)) {
                        $curr_status = strtolower(trim($chk_row['status']));
                        if ($curr_status === 'processing' || $curr_status === 'in progress' || $curr_status === 'order processed' || $curr_status === 'shipped' || $curr_status === 'delivered') {
                            echo json_encode([
                                'status' => 'error',
                                'message' => 'Cannot cancel order as processing has already started.'
                            ]);
                            break;
                        }
                    }

                    $update_query = "UPDATE order_details SET 
                                     status = 'product cancelled',
                                     cancellation_reason = '$reason', 
                                     cancelled_date = '$cancelled_at'
                                     WHERE ids = '$order_id'";
                    $result = $this->varModelObj->UpdateTable($update_query);
                    if ($result) {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Order cancelled successfully'
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Failed to update order status'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Order ID is required'
                    ]);
                }
                break;
                
            case 'validate_promo_code':
                ob_clean();
                header('Content-Type: application/json');
                
                error_log("validate_promo_code called with: " . print_r($_POST, true));
                
                $promo_code = $this->varDBConnection->real_escape_string(trim($_POST['promo_code'] ?? ''));
                $subtotal = floatval($_POST['subtotal'] ?? 0);
                $customer_id = intval($_POST['customer_id'] ?? 0);
                
                if (empty($promo_code)) {
                    echo json_encode(['valid' => false, 'message' => 'Promo code is required']);
                    exit;
                }
                
                // Check if promo code exists and is valid
                $query = "SELECT 
                            ids,
                            promo_code,
                            offer_percentage,
                            minimum_order_amount,
                            start_date,
                            expire_date,
                            max_uses
                          FROM promo_codes 
                          WHERE promo_code = '$promo_code' 
                            AND status = 1 
                            AND start_date <= CURDATE() 
                            AND expire_date >= CURDATE()
                          LIMIT 1";
                
                error_log("Promo query: " . $query);
                
                $result = $this->varDBConnection->query($query);
                
                if (!$result || $result->num_rows === 0) {
                    error_log("No valid promo code found for: $promo_code");
                    echo json_encode(['valid' => false, 'message' => 'Invalid or expired promo code']);
                    exit;
                }
                
                $promo = $result->fetch_assoc();
                error_log("Found promo: " . print_r($promo, true));
                
                // Check minimum order amount
                if ($subtotal < $promo['minimum_order_amount']) {
                    echo json_encode([
                        'valid' => false, 
                        'message' => 'Minimum order amount of ' . $promo['minimum_order_amount'] . ' required'
                    ]);
                    exit;
                }
                
                // Check if customer has already used this code
                if ($promo['max_uses'] !== null && $customer_id > 0) {
                    $usage_query = "SELECT COUNT(*) as usage_count 
                                    FROM order_details 
                                    WHERE promo_code = '$promo_code' 
                                      AND customer_id = '$customer_id'";
                    $usage_result = $this->varDBConnection->query($usage_query);
                    $usage_data = $usage_result->fetch_assoc();
                    
                    if ($usage_data['usage_count'] >= $promo['max_uses']) {
                        echo json_encode([
                            'valid' => false, 
                            'message' => 'You have already used this promo code maximum times'
                        ]);
                        exit;
                    }
                }
                
                // Calculate discount amount
                $discount_amount = $subtotal * ($promo['offer_percentage'] / 100);
                
                $response = [
                    'valid' => true,
                    'message' => 'Promo code applied successfully',
                    'offer_percentage' => $promo['offer_percentage'],
                    'discount_amount' => $discount_amount,
                    'promo_code' => $promo['promo_code']
                ];
                
                error_log("Returning response: " . print_r($response, true));
                echo json_encode($response);
                break;
                
            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }
    // private function sendOrderConfirmationEmails($order_id, $customer_email_from_form)
    // {
    //     // ────────────────────────────────────────────────
    //     // 1. Get ALL items of this order
    //     // ────────────────────────────────────────────────
    //     $items_query = "
    //         SELECT 
    //             product_name, quantity, product_color, product_size, 
    //             selling_price, discount_price, product_image
    //         FROM order_details 
    //         WHERE order_id = '" . $this->varDBConnection->real_escape_string($order_id) . "'
    //         ORDER BY ids
    //     ";
    
    //     $items_result = $this->varDBConnection->query($items_query);
    //     $order_items = [];
    
    //     if ($items_result) {
    //         while ($row = $items_result->fetch_assoc()) {
    //             $order_items[] = $row;
    //         }
    //     }
    
    //     // ────────────────────────────────────────────────
    //     // 2. Get main order + customer + vendor info
    //     //    (we take the first row for customer & vendor info)
    //     // ────────────────────────────────────────────────
    //     $main_query = "
    //         SELECT 
    //             od.order_id, 
    //             od.customer_name, 
    //             od.customer_email, 
    //             od.customer_mobile_no,
    //             od.customer_address, 
    //             od.postal_code, 
    //             od.state, 
    //             od.district, 
    //             od.placed_date,
    //             vd.gmail_id AS vendor_email,
    //             TRIM(CONCAT_WS(' ', vd.first_name, vd.second_name)) AS vendor_full_name
    //         FROM order_details od
    //         LEFT JOIN vendor_details vd ON od.vendor_id = vd.ids
    //         WHERE od.order_id = '" . $this->varDBConnection->real_escape_string($order_id) . "'
    //         LIMIT 1
    //     ";
    
    //     $main_result = $this->varDBConnection->query($main_query);
    
    //     if (!$main_result || $main_result->num_rows === 0) {
    //         error_log("Order email failed: could not fetch order $order_id");
    //         return;
    //     }
    
    //     $order = $main_result->fetch_assoc();
    
    //     $customerEmail = trim($customer_email_from_form ?: $order['customer_email'] ?? '');
    //     $vendorEmail   = trim($order['vendor_email'] ?? '');
    //     $vendorName    = $order['vendor_full_name'] ?: 'Vendor';
    
    //     if (empty($customerEmail) && empty($vendorEmail)) {
    //         return;
    //     }
    
    //     // ────────────────────────────────────────────────
    //     // Email Configuration — CHANGE THESE !!!
    //     // ────────────────────────────────────────────────
    //     $siteName    = "Darjana";
    //     $siteEmail   = "no-reply@darjanafashion.com";          // ← CHANGE THIS
    //     $supportEmail= "support@darjanafashion.com";           // ← CHANGE THIS
    //     $siteUrl     = "https://darjanafashion.com";           // ← CHANGE THIS
    
    //     $dateFormatted = date('d M Y H:i', strtotime($order['placed_date']));
    
    //     $headers = "MIME-Version: 1.0\r\n";
    //     $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    //     $headers .= "From: $siteName <$siteEmail>\r\n";
    //     $headers .= "Reply-To: $supportEmail\r\n";
    
    //     // ────────────────────────────────────────────────
    //     // 1. Customer Email
    //     // ────────────────────────────────────────────────
    //     if (!empty($customerEmail) && filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
    //         $customerSubject = "Order Confirmation #$order_id - $siteName";
    
    //         $customerBody = "
    //         <html>
    //         <body style='font-family:Arial,sans-serif; line-height:1.6;'>
    //             <h2 style='color:#2c3e50;'>Thank you for your order!</h2>
    //             <p>Dear <strong>" . htmlspecialchars($order['customer_name']) . "</strong>,</p>
    //             <p>Your order has been successfully placed.</p>
    
    //             <h3>Order Summary</h3>
    //             <table border='1' cellpadding='8' style='border-collapse:collapse; width:100%;'>
    //                 <tr style='background:#f8f9fa;'>
    //                     <th>Item</th>
    //                     <th>Qty</th>
    //                     <th>Color / Size</th>
    //                     <th>Price</th>
    //                 </tr>";
    
    //         foreach ($order_items as $item) {
    //             $variant = '';
    //             if ($item['product_color']) $variant .= $item['product_color'];
    //             if ($item['product_size']) $variant .= $variant ? ' / ' . $item['product_size'] : $item['product_size'];
    
    //             $customerBody .= "
    //                 <tr>
    //                     <td>" . htmlspecialchars($item['product_name']) . "</td>
    //                     <td>{$item['quantity']}</td>
    //                     <td>" . htmlspecialchars($variant ?: '-') . "</td>
    //                     <td>" . number_format($item['selling_price'], 2) . "</td>
    //                 </tr>";
    //         }
    
    //         $customerBody .= "
    //             </table>
    
    //             <h3>Shipping Address</h3>
    //             <p>
    //                 " . htmlspecialchars($order['customer_name']) . "<br>
    //                 " . htmlspecialchars($order['customer_address']) . "<br>
    //                 " . htmlspecialchars($order['district']) . ", " . htmlspecialchars($order['state']) . " - " . htmlspecialchars($order['postal_code']) . "<br>
    //                 Phone: " . htmlspecialchars($order['customer_mobile_no']) . "
    //             </p>
    
    //             <p>We will notify you when your order ships.</p>
    
    //             <p style='margin-top:30px;font-size:0.9em;color:#777;'>
    //                 Thank you for shopping with <strong>$siteName</strong><br>
    //                 <a href='$siteUrl'>$siteUrl</a> | <a href='mailto:$supportEmail'>$supportEmail</a>
    //             </p>
    //         </body>
    //         </html>";
    
    //         mail($customerEmail, $customerSubject, $customerBody, $headers);
    //     }
    
    //     // ────────────────────────────────────────────────
    //     // 2. Vendor Email  (almost same table)
    //     // ────────────────────────────────────────────────
    //     if (!empty($vendorEmail) && filter_var($vendorEmail, FILTER_VALIDATE_EMAIL)) {
    //         $vendorSubject = "New Order Received #$order_id - $siteName";
    
    //         $vendorBody = "
    //         <html>
    //         <body style='font-family:Arial,sans-serif; line-height:1.6;'>
    //             <h2 style='color:#c0392b;'>New Order Alert – #$order_id</h2>
    //             <p>Hello <strong>" . htmlspecialchars($vendorName) . "</strong>,</p>
    //             <p>A customer has placed a new order.</p>
    
    //             <h3>Order Items</h3>
    //             <table border='1' cellpadding='8' style='border-collapse:collapse; width:100%;'>
    //                 <tr style='background:#f8f9fa;'>
    //                     <th>Product</th>
    //                     <th>Qty</th>
    //                     <th>Variant</th>
    //                     <th>Sale Price</th>
    //                 </tr>";
    
    //         foreach ($order_items as $item) {
    //             $variant = '';
    //             if ($item['product_color']) $variant .= $item['product_color'];
    //             if ($item['product_size']) $variant .= $variant ? ' / ' . $item['product_size'] : $item['product_size'];
    
    //             $vendorBody .= "
    //                 <tr>
    //                     <td>" . htmlspecialchars($item['product_name']) . "</td>
    //                     <td>{$item['quantity']}</td>
    //                     <td>" . htmlspecialchars($variant ?: '-') . "</td>
    //                     <td>" . number_format($item['selling_price'], 2) . "</td>
    //                 </tr>";
    //         }
    
    //         $vendorBody .= "
    //             </table>
    
    //             <h3>Customer & Delivery Details</h3>
    //             <p>
    //                 <strong>Name:</strong> " . htmlspecialchars($order['customer_name']) . "<br>
    //                 <strong>Phone:</strong> " . htmlspecialchars($order['customer_mobile_no']) . "<br>
    //                 <strong>Address:</strong><br>
    //                 " . htmlspecialchars($order['customer_address']) . "<br>
    //                 " . htmlspecialchars($order['district']) . ", " . htmlspecialchars($order['state']) . " " . htmlspecialchars($order['postal_code']) . "
    //             </p>
    
    //             <p style='margin-top:25px;'>
    //                 <strong>Please prepare this order as soon as possible.</strong>
    //             </p>
    
    //             <p style='margin-top:40px;font-size:0.9em;color:#777;'>
    //                 — Sent from $siteName Order System
    //             </p>
    //         </body>
    //         </html>";
    
    //         mail($vendorEmail, $vendorSubject, $vendorBody, $headers);
    //     }
    // }
    private function sendOrderConfirmationEmails($order_id, $customer_email_from_form){
        // ✅ Load PHPMailer
        require_once __DIR__ . '/../mailapi/Exception.php';
        require_once __DIR__ . '/../mailapi/PHPMailer.php';
        require_once __DIR__ . '/../mailapi/SMTP.php';

        $mailClass = 'PHPMailer\\PHPMailer\\PHPMailer';

        // ────────────────────────────────────────────────
        // 1. Get Order Items
        // ────────────────────────────────────────────────
        $items_query = "
                    SELECT *,
            ROUND(final_price, 2) AS final_price,
            ROUND(final_price * (tax_percentage / 100.0), 2) AS tax_amount,
            ROUND(final_price * (1 + tax_percentage / 100.0), 2) AS final_price_with_tax
        FROM (
            SELECT 
                product_name,
                quantity,
                product_color,
                product_size,
                product_cost,
                selling_price,
                discount_price,
                tax_percentage,
                product_image,

                CASE 
                    WHEN discount_price IS NOT NULL AND discount_price != 0 THEN discount_price
                    WHEN selling_price IS NOT NULL AND selling_price != 0 THEN selling_price
                    ELSE product_cost
                END AS final_price

            FROM order_details 
            WHERE order_id ='" . $this->varDBConnection->real_escape_string($order_id) . "'
        ) t
        ORDER BY product_name
                ";

        $items_result = $this->varDBConnection->query($items_query);
        $order_items = [];

        if ($items_result) {
            while ($row = $items_result->fetch_assoc()) {
                $order_items[] = $row;
            }
        }

        // ────────────────────────────────────────────────
        // 2. Main Order Details
        // ────────────────────────────────────────────────
        $main_query = "
            SELECT 
                od.order_id, od.customer_name, od.customer_email, 
                od.customer_mobile_no, od.customer_address, 
                od.postal_code, od.state, od.district, od.placed_date,
                vd.gmail_id AS vendor_email,
                TRIM(CONCAT_WS(' ', vd.first_name, vd.second_name)) AS vendor_full_name
            FROM order_details od
            LEFT JOIN vendor_details vd ON od.vendor_id = vd.ids
            WHERE od.order_id = '" . $this->varDBConnection->real_escape_string($order_id) . "'
            LIMIT 1
        ";

        $main_result = $this->varDBConnection->query($main_query);

        if (!$main_result || $main_result->num_rows === 0) {
            error_log("Order email failed: could not fetch order $order_id");
            return;
        }

        $order = $main_result->fetch_assoc();

        $customerEmail = trim($customer_email_from_form ?: $order['customer_email'] ?? '');
        $vendorEmail   = trim($order['vendor_email'] ?? '');
        $vendorName    = $order['vendor_full_name'] ?: 'Vendor';

        // ────────────────────────────────────────────────
        // SMTP CONFIG (USE YOUR REAL VALUES)
        // ────────────────────────────────────────────────
        $smtpHost = "mail.darjanafashion.com";
        $smtpUser = "care@darjanafashion.com";   // ✅ real email
        $smtpPass = "s@nds1@b";               // ✅ real password
        $smtpPort = 465;

        $siteName  = "Darjana";
        $siteEmail = $smtpUser;
        $supportEmail = "support@darjanafashion.com";
        $siteUrl = "https://darjanafashion.com";

        // ────────────────────────────────────────────────
        // Build Order Table (reuse for both emails)
        // ────────────────────────────────────────────────
        $tableRows = "";

        foreach ($order_items as $item) {
            $variant = '';
            if ($item['product_color']) $variant .= $item['product_color'];
            if ($item['product_size']) $variant .= $variant ? ' / ' . $item['product_size'] : $item['product_size'];

            $tableRows .= "
                <tr>
                    <td>" . htmlspecialchars($item['product_name']) . "</td>
                    <td>{$item['quantity']}</td>
                    <td>" . htmlspecialchars($variant ?: '-') . "</td>
                    <td>" . number_format($item['final_price_with_tax'], 2) . "</td>
                </tr>";
        }

        // ────────────────────────────────────────────────
        // 1. CUSTOMER EMAIL
        // ────────────────────────────────────────────────
        if (!empty($customerEmail) && filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {

            $mail = new $mailClass(true);

            try {
                $mail->isSMTP();
                $mail->Host       = $smtpHost;
                $mail->SMTPAuth   = true;
                $mail->Username   = $smtpUser;
                $mail->Password   = $smtpPass;
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = $smtpPort;

                $mail->setFrom($siteEmail, $siteName);
                $mail->addAddress($customerEmail);
                $mail->addReplyTo($supportEmail);

                $mail->isHTML(true);
                $mail->Subject = "Order Confirmation #$order_id - $siteName";

                $mail->Body = "
                <h2>Thank you for your order!</h2>
                <p>Dear <strong>" . htmlspecialchars($order['customer_name']) . "</strong>,</p>

                <h3>Order Summary</h3>
                <table border='1' cellpadding='8' style='border-collapse:collapse;width:100%;'>
                    <tr><th>Item</th><th>Qty</th><th>Variant</th><th>Price</th></tr>
                    $tableRows
                </table>

                <h3>Shipping Address</h3>
                <p>
                    {$order['customer_name']}<br>
                    {$order['customer_address']}<br>
                    {$order['district']}, {$order['state']} - {$order['postal_code']}<br>
                    Phone: {$order['customer_mobile_no']}
                </p>
                ";

                $mail->send();

            } catch (Exception $e) {
                error_log("Customer Mail Error: " . $mail->ErrorInfo);
            }
        }

        // ────────────────────────────────────────────────
        // 2. VENDOR EMAIL
        // ────────────────────────────────────────────────
        if (!empty($vendorEmail) && filter_var($vendorEmail, FILTER_VALIDATE_EMAIL)) {

            $mail = new $mailClass(true);

            try {
                $mail->isSMTP();
                $mail->Host       = $smtpHost;
                $mail->SMTPAuth   = true;
                $mail->Username   = $smtpUser;
                $mail->Password   = $smtpPass;
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = $smtpPort;

                $mail->setFrom($siteEmail, $siteName);
                $mail->addAddress($vendorEmail);

                $mail->isHTML(true);
                $mail->Subject = "New Order Received #$order_id - $siteName";

                $mail->Body = "
                <h2>New Order Alert – #$order_id</h2>
                <p>Hello <strong>$vendorName</strong>,</p>

                <table border='1' cellpadding='8' style='border-collapse:collapse;width:100%;'>
                    <tr><th>Product</th><th>Qty</th><th>Variant</th><th>Price</th></tr>
                    $tableRows
                </table>
                ";

                $mail->send();

            } catch (Exception $e) {
                error_log("Vendor Mail Error: " . $mail->ErrorInfo);
            }
        }
    }

    /**
     * Handles payment success callbacks and webhooks from AFS OPPWA Payment Gateway
     */
    public function handlePaymentResponse($data = [], $isWebhook = false)
    {
        $rawPayload = file_get_contents('php://input');
        $input = !empty($rawPayload) ? json_decode($rawPayload, true) : $_POST;
        if (empty($input)) {
            $input = $_GET;
        }

        $order_id = $input['order_id'] ?? $_GET['order_id'] ?? null;
        $resourcePath = $input['resourcePath'] ?? $_GET['resourcePath'] ?? null;

        $isPaid = false;
        $responseDetails = $input;

        if ($resourcePath) {
            try {
                $afs = new AFSPaymentGateway(null, null, null, $this->varDBConnection);
                $statusRes = $afs->getPaymentStatus($resourcePath);
                $isPaid = !empty($statusRes['is_success']);
                $responseDetails = $statusRes;
            } catch (Exception $e) {
                error_log("OPPWA Status Check Error: " . $e->getMessage());
            }
        } else {
            // Fallback status extraction if direct payload provided
            $paymentStatus = $input['data']['invoice']['status'] ?? 
                             $input['data']['transactions'][0]['status'] ?? 
                             $input['status'] ?? 
                             $input['result'] ?? '';
            $isPaid = (strcasecmp($paymentStatus, 'Paid') === 0 || 
                       strcasecmp($paymentStatus, 'SUCCESS') === 0 || 
                       strcasecmp($paymentStatus, 'success') === 0);
        }

        $jsonResponse = json_encode($responseDetails);

        if ($order_id) {
            $escaped_json = $this->varDBConnection->real_escape_string($jsonResponse);
            $escaped_order_id = $this->varDBConnection->real_escape_string($order_id);
            $statusStr = $isPaid ? 'PAID' : 'FAILED';

            $update_sql = "UPDATE order_details 
                           SET payment_status = '$statusStr', 
                               payment_date = NOW(), 
                               api_response = '$escaped_json' 
                           WHERE order_id = '$escaped_order_id'";
            $this->varDBConnection->query($update_sql);
        }

        if ($isWebhook) {
            http_response_code(200);
            echo json_encode(['status' => 'success']);
            exit();
        } else {
            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
            $baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
            $statusParam = $isPaid ? 'success' : 'failed';
            header("Location: $baseUrl/OrderConfirmation?order_id=" . urlencode($order_id ?? '') . "&payment_status=" . $statusParam);
            exit();
        }
    }
}

$obj = new orders_controller();
$obj->RequestAccept($obj->actionevents);
?>