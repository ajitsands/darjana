<?php
session_start();
require ('../../model/common/common_functions.php');

class UnpaidOrdersController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;
    }
    
    function SQLArray()
    {
        $array = array();
        $array[0] = "SELECT ids, customer_name, status FROM customer_details WHERE status='Active' order by customer_name asc";
        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            
            case 'get_unpaid_orders':
                $this->handleGetUnpaidOrders();
                break;
                
            case 'mark_as_paid':
                $this->handleMarkAsPaid();
                break;
                
            case 'get_order_details':
                $this->handleGetOrderDetails();
                break;
           
            case 'fetch_customer_name':
                $customers = $this->varModelObj->ListFromTable($var[0]);
                echo json_encode(json_decode($customers, true));
                break;
            
            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    }
    
    private function handleGetUnpaidOrders()
    {
        try {
            // Get request parameters
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            $search = $_POST['search'] ?? '';
            $start = (int)($_POST['start'] ?? 0);
            $length = (int)($_POST['length'] ?? 10);
            $orderColumn = (int)($_POST['order_column'] ?? 7);
            $orderDir = $_POST['order_dir'] ?? 'desc';
            $customer_id = $_POST['customer_id'] ?? null;
            $draw = (int)($_POST['draw'] ?? 1);
            
            $vendor_id = $_SESSION["vendor_id"] ?? null;
            
            if (!$vendor_id) {
                throw new Exception('Vendor ID not found');
            }
            
            // SIMPLIFIED QUERY - Only select columns that definitely exist
            $query = "SELECT 
                    od.ids,
                    od.order_id,
                    od.customer_id,
                    od.customer_name,
                    od.customer_mobile_no AS customer_phone,
                    od.customer_email,
                    od.product_name,
                    od.quantity,
                
                    CASE 
                        WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                        THEN od.discount_price 
                        ELSE od.selling_price 
                    END AS base_price,
                
                    (
                        CASE 
                            WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                            THEN od.discount_price 
                            ELSE od.selling_price 
                        END
                        +
                        (
                            CASE 
                                WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                                THEN od.discount_price 
                                ELSE od.selling_price 
                            END * (od.tax_percentage / 100)
                        )
                    ) AS final_price,
                
                    od.tax_percentage,
                    od.placed_date AS order_date,
                    od.status,
                    od.payment_status
                
                FROM order_details od
                WHERE od.vendor_id = ? 
                AND od.payment_status = 'UNPAID'";
                          
            $countQuery = "SELECT COUNT(od.ids) as total 
                           FROM order_details od
                           WHERE od.vendor_id = ? 
                           AND od.payment_status = 'UNPAID'";
                           
            $params = [$vendor_id];
            $types = is_numeric($vendor_id) ? 'i' : 's';
        
            // Add date filter
            if ($start_date && $end_date) {
                $query .= " AND DATE(od.placed_date) BETWEEN ? AND ?";
                $countQuery .= " AND DATE(od.placed_date) BETWEEN ? AND ?";
                $params[] = $start_date;
                $params[] = $end_date;
                $types .= 'ss';
            }
            
            // Add customer filter
            if (!empty($customer_id)) {
                $query .= " AND od.customer_id = ?";
                $countQuery .= " AND od.customer_id = ?";
                $params[] = $customer_id;
                $types .= 'i';
            }
            
            // Add search filter
            if (!empty($search)) {
                $query .= " AND (od.customer_name LIKE ? OR od.product_name LIKE ? OR od.order_id LIKE ?)";
                $countQuery .= " AND (od.customer_name LIKE ? OR od.product_name LIKE ? OR od.order_id LIKE ?)";
                $searchValue = "%$search%";
                $params[] = $searchValue;
                $params[] = $searchValue;
                $params[] = $searchValue;
                $types .= 'sss';
            }
            
            // Get total records count
            $stmt = $this->varDBConnection->prepare($countQuery);
            if (!$stmt) {
                throw new Exception('Failed to prepare count query: ' . $this->varDBConnection->error);
            }
            
            if (!empty($params)) {
                // Use only the parameters needed for count query
                $countParams = array_slice($params, 0, substr_count($countQuery, '?'));
                $countTypes = substr($types, 0, strlen(implode('', array_fill(0, count($countParams), '?'))));
                $stmt->bind_param($countTypes, ...$countParams);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            $totalRecords = $result->fetch_assoc()['total'];
            $stmt->close();
            
            // Add sorting and pagination to main query
            $orderBy = "od.placed_date " . ($orderDir === 'asc' ? 'ASC' : 'DESC');
            $query .= " ORDER BY $orderBy LIMIT ? OFFSET ?";
            
            // Add pagination parameters
            $params[] = $length;
            $params[] = $start;
            $types .= 'ii';
            
            // Execute main query
            $stmt = $this->varDBConnection->prepare($query);
            if (!$stmt) {
                throw new Exception('Failed to prepare main query: ' . $this->varDBConnection->error);
            }
            
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $data = [];
            while ($row = $result->fetch_assoc()) {
                // Calculate amount due (selling_price * quantity) - simplified for now
                $amountDue = $row['final_price'] * $row['quantity'];
                
                $data[] = [
                    'ids' => $row['ids'],
                    'order_id' => $row['order_id'],
                    'customer' => [
                        'name' => $row['customer_name'],
                        'phone' => $row['customer_phone'],
                        'email' => $row['customer_email'] ?? ''
                    ],
                    'product_name' => $row['product_name'],
                    'quantity' => $row['quantity'],
                
                    'selling_price' => $row['final_price'],
                
                    'amount_due' => $amountDue,
                    'order_date' => $row['order_date'],
                    'order_status' => $row['status'],
                    'payment_status' => $row['payment_status'],
                    'actions' => ''
                ];
            }
            
            $stmt->close();
            
            echo json_encode([
                'draw' => $draw,
                'recordsTotal' => (int)$totalRecords,
                'recordsFiltered' => (int)$totalRecords,
                'data' => $data
            ]);
            
        } catch (Exception $e) {
            // Log error and return friendly message
            error_log('UnpaidOrdersController Error: ' . $e->getMessage());
            
            echo json_encode([
                'draw' => $draw ?? 1,
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $e->getMessage()
            ]);
        }
    }
    
    private function handleMarkAsPaid()
    {
        try {
            $orderIds = $_POST['order_ids'] ?? [];
            
            if (!is_array($orderIds) || empty($orderIds)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'No orders selected'
                ]);
                return;
            }
            
            // Sanitize input - ensure all are integers
            $orderIds = array_map('intval', $orderIds);
            $placeholders = implode(',', array_fill(0, count($orderIds), '?'));
            $types = str_repeat('i', count($orderIds));
            
            // Check if amount_due column exists, if not, calculate on the fly
            $checkColumn = $this->varDBConnection->query("SHOW COLUMNS FROM order_details LIKE 'amount_due'");
            $hasAmountDue = $checkColumn->num_rows > 0;
            
            if ($hasAmountDue) {
                // Get order details for email notifications
                $stmt = $this->varDBConnection->prepare("
                    SELECT od.customer_email, od.customer_name, od.order_id, od.product_name, od.amount_due
                    FROM order_details od 
                    WHERE od.ids IN ($placeholders)
                ");
            } else {
                // Calculate amount_due from selling_price and quantity
                $stmt = $this->varDBConnection->prepare("
                    SELECT od.customer_email, od.customer_name, od.order_id, od.product_name, 
                           (od.selling_price * od.quantity) AS amount_due
                    FROM order_details od 
                    WHERE od.ids IN ($placeholders)
                ");
            }
            
            if (!$stmt) {
                throw new Exception('Failed to prepare select query: ' . $this->varDBConnection->error);
            }
            
            $stmt->bind_param($types, ...$orderIds);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $ordersInfo = [];
            while ($row = $result->fetch_assoc()) {
                $ordersInfo[] = $row;
            }
            $stmt->close();
            
            // Update payment status to PAID
            if ($hasAmountDue) {
                $updateStmt = $this->varDBConnection->prepare("
                    UPDATE order_details 
                    SET payment_status = 'PAID', 
                        amount_paid = amount_due,
                        payment_date = NOW() 
                    WHERE ids IN ($placeholders)
                ");
            } else {
                $updateStmt = $this->varDBConnection->prepare("
                    UPDATE order_details 
                    SET payment_status = 'PAID', 
                        payment_date = NOW() 
                    WHERE ids IN ($placeholders)
                ");
            }
            
            if (!$updateStmt) {
                throw new Exception('Failed to prepare update query: ' . $this->varDBConnection->error);
            }
            
            $updateStmt->bind_param($types, ...$orderIds);
            $result = $updateStmt->execute();
            
            if ($result) {
                // Send email notifications for all updated orders
                foreach ($ordersInfo as $orderInfo) {
                    if (!empty($orderInfo['customer_email'])) {
                        $this->sendPaymentConfirmationEmail(
                            $orderInfo['customer_email'],
                            $orderInfo['customer_name'],
                            $orderInfo['order_id'],
                            $orderInfo['product_name'],
                            $orderInfo['amount_due']
                        );
                    }
                }
                
                echo json_encode([
                    'success' => true,
                    'message' => count($orderIds) . ' order(s) marked as PAID successfully'
                ]);
            } else {
                throw new Exception('Failed to update payment status: ' . $updateStmt->error);
            }
            
            $updateStmt->close();
            
        } catch (Exception $e) {
            error_log('MarkAsPaid Error: ' . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
    
    private function sendPaymentConfirmationEmail($customerEmail, $customerName, $orderId, $productName, $amount)
    {
        // Simplified email function - you can enhance this later
        $to = $customerEmail;
        $subject = "Payment Confirmation - Order #" . $orderId;
        
        $message = "Dear $customerName,\n\n";
        $message .= "Thank you for your payment. Your payment has been successfully processed.\n\n";
        $message .= "Order ID: #$orderId\n";
        $message .= "Product: $productName\n";
        $message .= "Amount Paid: " . number_format($amount, 2) . " BHD\n";
        $message .= "Payment Date: " . date('F j, Y, g:i a') . "\n\n";
        $message .= "Your order is now confirmed and will be processed soon.\n\n";
        $message .= "Thank you for shopping with us!\n";
        $message .= "Darjana Shopping Team";
        
        $headers = "From: Darjana Shopping <noreply@darjana.com>\r\n";
        $headers .= "Reply-To: support@darjana.com\r\n";
        
        return mail($to, $subject, $message, $headers);
    }
    
    private function handleGetOrderDetails()
    {
        try {
            $orderId = $_POST['order_id'];
            
            // Join with country table to get actual country name
            $stmt = $this->varDBConnection->prepare("SELECT 
                od.ids,
                od.order_id,
                od.customer_name,
                od.customer_mobile_no AS customer_phone,
                od.customer_email,
                od.placed_date AS order_date,
                od.status AS order_status,
                od.payment_status,
                od.product_name,
                od.product_color AS color,
                od.product_size AS size,
                od.product_length AS product_length,
                od.product_notes AS product_notes,
                od.quantity,
                od.customer_address,
                od.street,
                od.district AS city,
                od.state,
                od.country AS country_id,           -- Keep the ID if needed
                c.country AS country_name,           -- Get actual country name
                od.postal_code,
                od.cod_fee AS shipping_fee,
                od.tax_percentage,
                od.comments,
                
                -- Calculate base price (same logic as unpaid orders)
                CASE 
                    WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                    THEN od.discount_price 
                    ELSE od.selling_price 
                END AS base_price,
                
                -- Calculate final price (unit price with tax)
                (
                    CASE 
                        WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                        THEN od.discount_price 
                        ELSE od.selling_price 
                    END
                    +
                    (
                        CASE 
                            WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                            THEN od.discount_price 
                            ELSE od.selling_price 
                        END * (od.tax_percentage / 100)
                    )
                ) AS final_price
            
            FROM order_details od
            LEFT JOIN country c ON od.country = c.ids   -- Join with country table
            WHERE od.ids = ?");
    
            if (!$stmt) {
                throw new Exception('Failed to prepare order details query');
            }
    
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $order = $result->fetch_assoc();
                
                // Calculate using the same logic as unpaid orders
                $unit_price = $order['final_price']; // This already includes tax
                $subtotal = $unit_price * $order['quantity'];
                $shipping_fee = $order['shipping_fee'] ?? 0;
                $tax = $subtotal - ($order['base_price'] * $order['quantity']); // Calculate tax from difference
                $grand_total = $subtotal + $shipping_fee;
                
                $response = [
                    'success' => true,
                    'data' => [
                        'ids' => $order['ids'],
                        'order_id' => $order['order_id'],
                        'order_date' => $order['order_date'],
                        'order_status' => $order['order_status'],
                        'payment_status' => $order['payment_status'],
                        'customer' => [
                            'name' => $order['customer_name'],
                            'phone' => $order['customer_phone'],
                            'email' => $order['customer_email']
                        ],
                        'shipping' => [
                            'address' => $order['customer_address'],
                            'street' => $order['street'],
                            'city' => $order['city'],
                            'state' => $order['state'],
                            'country_id' => $order['country_id'],     // Keep if needed
                            'country' => $order['country_name'],     // Use country name
                            'postal_code' => $order['postal_code']
                        ],
                        'items' => [[
                            'product_name' => $order['product_name'],
                            'color' => $order['color'],
                            'size' => $order['size'],
                            'quantity' => $order['quantity'],
                            'product_length' => $order['product_length'],
                            'unit_price' => $unit_price,
                            'total' => $subtotal,
                            'base_price' => $order['base_price'],
                            'tax_percentage' => $order['tax_percentage']
                        ]],
                        'subtotal' => $subtotal,
                        'shipping_fee' => $shipping_fee,
                        'tax' => $tax,
                        'grand_total' => $grand_total,
                        'payment_method' => 'Cash On Delivery',
                        'tax_percentage' => $order['tax_percentage'],
                        'product_notes' => $order['product_notes'],
                        'comments' => $order['comments']
                    ]
                ];
                
                echo json_encode($response);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Order not found'
                ]);
            }
            
            $stmt->close();
            
        } catch (Exception $e) {
            error_log('GetOrderDetails Error: ' . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Error loading order details'
            ]);
        }
    }
}

$obj = new UnpaidOrdersController();
$obj->RequestAccept($obj->actionevents);
?>