<?php
session_start();
require ('../../model/common/common_functions.php');

class OrdersController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;
        $this->order_id = $_POST['customer_id'] ?? null;
    }
    
    function SQLArray()
    {
        $array = array();
        
        $array[0] = "SELECT ids, customer_name, status FROM customer_details WHERE status='Active' order by customer_name asc";
        return $array;
    }

    /**
     * Get the next batch number for today
     */
    private function getNextBatchNumber()
    {
        $today = date('Y-m-d');
        
        // Count batches created today
        $query = "SELECT COUNT(*) as batch_count FROM tailoring_batches 
                  WHERE DATE(created_at) = '$today'";
        
        $result = $this->varModelObj->ListFromTable($query);
        $data = json_decode($result, true);
        
        // If no batches today, start with 1, otherwise increment
        if (empty($data) || !isset($data[0]['batch_count'])) {
            return 1;
        }
        
        return (int)$data[0]['batch_count'] + 1;
    }

    /**
     * Generate PDF for tailoring dispatch (placeholder)
     */
    private function generateTailoringDispatchPDF($batch_id, $batch_code)
    {
        // You can implement PDF generation here later
        // For now, return null or a URL to a PDF generator
        return null;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            
            case 'get_orders':
                $this->handleGetOrders();
                break;
                
            case 'update_status':
                $this->handleUpdateStatus();
                break;
                
            case 'bulk_update_status':
                $this->handleBulkUpdateStatus();
                break;
                
            case 'get_order_details':
                $this->handleGetOrderDetails();
                break;
           
            case 'fetch_customer_name':
                $customername = $this->varModelObj->ListFromTable($var[0]);
                echo json_encode(json_decode($customername, true));
                break;
            
            case 'get_tailoring_units':
                $sql = "SELECT ids, unit_name, contact_person, phone, email 
                        FROM tailoring_units 
                        WHERE status = 'Active' 
                        ORDER BY unit_name";
                $units = $this->varModelObj->ListFromTable($sql);
                echo json_encode([
                    'success' => true,
                    'units'   => json_decode($units, true)
                ]);
                break;
            
            case 'send_to_tailoring':
                $item_ids = $_POST['item_ids'] ?? [];
                $unit_id  = (int)($_POST['unit_id'] ?? 0);
                $notes    = $_POST['notes'] ?? '';
                
                // Debug: Log received data
                error_log("send_to_tailoring called - items: " . print_r($item_ids, true) . ", unit: $unit_id");
                
                if (empty($item_ids) || $unit_id <= 0) {
                    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
                    exit;
                }
                
                // Make sure all item ids are integers
                $item_ids = array_map('intval', (array)$item_ids);
                
                // Generate batch code
                $batch_code = 'TB-' . date('Ymd') . '-' . str_pad($this->getNextBatchNumber(), 3, '0', STR_PAD_LEFT);
                
                // 1. Insert into tailoring_batches (batch header)
                $batch_query = "INSERT INTO tailoring_batches 
                                SET 
                                    batch_code        = '" . $this->varDBConnection->real_escape_string($batch_code) . "',
                                    tailoring_unit_id = $unit_id,
                                    description       = '" . $this->varDBConnection->real_escape_string($notes) . "',
                                    created_by        = " . ($_SESSION['vendor_id'] ?? 1) . ",
                                    status            = 'Pending'";
                
                $batch_id = $this->varModelObj->AddToTable($batch_query);
                
                if (!$batch_id || !is_numeric($batch_id)) {
                    echo json_encode(['success' => false, 'message' => 'Failed to create batch']);
                    exit;
                }
                
                // 2. Insert all items into tailoring_batch_items
                $insert_success = true;
                $failed_items = [];
                
                foreach ($item_ids as $detail_id) {
                    $insert_query = "INSERT INTO tailoring_batch_items 
                                     SET 
                                         batch_id = $batch_id,
                                         order_detail_id = $detail_id";
                    
                    $result = $this->varModelObj->AddToTable($insert_query);
                    if (!$result) {
                        $insert_success = false;
                        $failed_items[] = $detail_id;
                        error_log("Failed to insert item $detail_id into batch $batch_id");
                    }
                }
                
                if (!$insert_success) {
                    echo json_encode([
                        'success' => false, 
                        'message' => 'Some items could not be added to the batch',
                        'failed_items' => $failed_items
                    ]);
                    exit;
                }
                
                // 3. Update all selected order_details to status = 'Processing'
                $ids_list = implode(',', $item_ids);
                
                $update_query = "UPDATE order_details 
                                 SET status = 'Processing' 
                                 WHERE ids IN ($ids_list)";
                
                $this->varModelObj->AddToTable($update_query);
                
                // 4. Generate PDF URL
                $pdf_url = '../controller/orders/generate_tailoring_slip.php?batch_id=' . $batch_id;
                
                echo json_encode([
                    'success'    => true,
                    'message'    => 'Batch created and items sent to tailoring unit',
                    'batch_code' => $batch_code,
                    'batch_id'   => $batch_id,
                    'pdf_url'    => $pdf_url
                ]);
                break;
            
            case 'get_tailoring_batches':
                $this->handleGetTailoringBatches();
                break;
            
            case 'get_batch_details':
                $this->handleGetBatchDetails();
                break;
            
            case 'update_batch_status':
                $this->handleUpdateBatchStatus();
                break;
            
            case 'update_item_status':
                $this->handleUpdateItemStatus();
                break;
            
            case 'update_multiple_items_status':
                $this->handleUpdateMultipleItemsStatus();
                break;
            
            case 'update_batch_status_with_items':
                $this->handleUpdateBatchStatusWithItems();
                break;
            
            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    }
    private function handleGetTailoringBatches()
    {
        $start_date = $_POST['start_date'] ?? null;
        $end_date = $_POST['end_date'] ?? null;
        $unit_id = $_POST['unit_id'] ?? null;
        $status = $_POST['status'] ?? null;
        $search = $_POST['search'] ?? '';
        $start = $_POST['start'] ?? 0;
        $length = $_POST['length'] ?? 10;
        
        $vendor_id = $_SESSION["vendor_id"] ?? null;
        
        $query = "SELECT 
                    tb.batch_id,
                    tb.batch_code,
                    tu.unit_name,
                    (SELECT COUNT(*) 
                        FROM tailoring_batch_items 
                        WHERE batch_id = tb.batch_id
                    ) AS items_count,
                    tb.created_at,
                    tb.status
                FROM tailoring_batches tb
                JOIN tailoring_units tu ON tb.tailoring_unit_id = tu.ids
                LEFT JOIN user_details u ON tb.created_by = u.ids
                WHERE 1=1";
        
        $countQuery = "SELECT COUNT(*) as total FROM tailoring_batches WHERE 1=1";
        
        $params = [];
        $types = "";
        
        if ($start_date && $end_date) {
            $query .= " AND DATE(tb.created_at) BETWEEN ? AND ?";
            $countQuery .= " AND DATE(created_at) BETWEEN ? AND ?";
            $params[] = $start_date;
            $params[] = $end_date;
            $types .= "ss";
        }
        
        if ($unit_id) {
            $query .= " AND tb.tailoring_unit_id = ?";
            $countQuery .= " AND tailoring_unit_id = ?";
            $params[] = $unit_id;
            $types .= "i";
        }
        
        if ($status) {
            $query .= " AND tb.status = ?";
            $countQuery .= " AND status = ?";
            $params[] = $status;
            $types .= "s";
        }
        
        if (!empty($search)) {
            $query .= " AND (tb.batch_code LIKE ? OR tu.unit_name LIKE ?)";
            $countQuery .= " AND (batch_code LIKE ?)";
            $searchValue = "%$search%";
            $params[] = $searchValue;
            $params[] = $searchValue;
            $types .= "ss";
        }
        
        // Get total count
        $stmt = $this->varDBConnection->prepare($countQuery);
        if (!empty($params)) {
            $stmt->bind_param($types, ...array_slice($params, 0, substr_count($countQuery, '?')));
        }
        $stmt->execute();
        $totalRecords = $stmt->get_result()->fetch_assoc()['total'];
        
        // Add pagination
        $query .= " ORDER BY tb.created_at DESC LIMIT ? OFFSET ?";
        $params[] = (int)$length;
        $params[] = (int)$start;
        $types .= "ii";
        
        $stmt = $this->varDBConnection->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        echo json_encode([
            'draw' => intval($_POST['draw'] ?? 1),
            'recordsTotal' => intval($totalRecords),
            'recordsFiltered' => intval($totalRecords),
            'data' => $data
        ]);
    }
    
    private function handleGetBatchDetails()
    {
        $batch_id = $_POST['batch_id'] ?? 0;
        
        if (!$batch_id) {
            echo json_encode(['success' => false, 'message' => 'Batch ID required']);
            return;
        }
        
        // Get batch details
        $query = "SELECT 
                    tb.*,
                    tu.unit_name,
                    tu.contact_person,
                    tu.phone,
                    tu.email
                  FROM tailoring_batches tb
                  JOIN tailoring_units tu ON tb.tailoring_unit_id = tu.ids
                  LEFT JOIN user_details u ON tb.created_by = u.ids
                  WHERE tb.batch_id = ?";
        
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("i", $batch_id);
        $stmt->execute();
        $batch = $stmt->get_result()->fetch_assoc();
        
        if (!$batch) {
            echo json_encode(['success' => false, 'message' => 'Batch not found']);
            return;
        }
        
        // Get items in this batch
        $itemsQuery = $itemsQuery = "SELECT 
                tbi.id,
                tbi.item_status,
                tbi.*,
                od.order_id,
                od.customer_name,
                od.product_name,
                od.quantity,
                od.product_color as color,
                od.product_size as size,
                od.product_length as length,
                od.product_notes as notes
              FROM tailoring_batch_items tbi
              JOIN order_details od ON tbi.order_detail_id = od.ids
              WHERE tbi.batch_id = ?";
        
        $stmt = $this->varDBConnection->prepare($itemsQuery);
        $stmt->bind_param("i", $batch_id);
        $stmt->execute();
        $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        $batch['items'] = $items;
        
        echo json_encode([
            'success' => true,
            'data' => $batch
        ]);
    }
    
    private function handleUpdateBatchStatus()
    {
        $batch_id = $_POST['batch_id'] ?? 0;
        $status = $_POST['status'] ?? '';
        
        if (!$batch_id || !$status) {
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }
        
        $query = "UPDATE tailoring_batches SET status = ? WHERE batch_id = ?";
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("si", $status, $batch_id);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Batch status updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update batch status'
            ]);
        }
    }
    private function handleGetOrders()
    {
        // Get request parameters
        $status = $_POST['status'] ?? null;
        $order_id = $_POST['order_id'] ?? null;
        $start_date = $_POST['start_date'] ?? null;
        $end_date = $_POST['end_date'] ?? null;
        $search = $_POST['search'] ?? '';
        $start = $_POST['start'] ?? 0;
        $length = $_POST['length'] ?? 10;
        $orderColumn = $_POST['order_column'] ?? 5; // Default to date column
        $orderDir = $_POST['order_dir'] ?? 'desc';
        $customer_id = $_POST['customer_id'] ?? null;
        
        // Column mapping for ordering (updated to include tailoring_item_status)
        $columns = [
            0 => 'od.ids',
            1 => 'od.order_id',
            2 => 'od.customer_name',
            3 => 'od.product_name',
            4 => 'od.quantity',
            5 => 'p.amount_selling',
            6 => 'od.placed_date',
            7 => 'od.status',
            8 => 'tailoring_item_status' // Added for item-level tailoring status
        ];
        
        // Validate order column
        $orderBy = isset($columns[$orderColumn]) ? $columns[$orderColumn] : 'od.placed_date';
        $orderBy .= " " . ($orderDir === 'asc' ? 'ASC' : 'DESC');
        
        $vendor_id = $_SESSION["vendor_id"] ?? null;
        
        // Updated query to include item-level tailoring status
        $query = "SELECT 
                od.ids,
                od.order_id,
                od.customer_id,
                od.customer_name,
                od.customer_mobile_no AS customer_phone,
                od.product_name,
                od.quantity,
                od.product_cost AS amount,
                od.selling_price,
                od.discount_price,
                od.tax_percentage,
                od.placed_date AS order_date,
                od.customer_email,
                od.status,
                od.product_notes,
                
                -- Item-level tailoring status from tailoring_batch_items
                (SELECT tbi.item_status 
                 FROM tailoring_batch_items tbi 
                 JOIN tailoring_batches tb ON tbi.batch_id = tb.batch_id 
                 WHERE tbi.order_detail_id = od.ids 
                 ORDER BY tb.created_at DESC 
                 LIMIT 1) AS tailoring_item_status,
                
                -- Batch code for reference
                (SELECT tb.batch_code 
                 FROM tailoring_batch_items tbi 
                 JOIN tailoring_batches tb ON tbi.batch_id = tb.batch_id 
                 WHERE tbi.order_detail_id = od.ids 
                 ORDER BY tb.created_at DESC 
                 LIMIT 1) AS tailoring_batch_code,
                
                -- Batch ID for reference
                (SELECT tb.batch_id 
                 FROM tailoring_batch_items tbi 
                 JOIN tailoring_batches tb ON tbi.batch_id = tb.batch_id 
                 WHERE tbi.order_detail_id = od.ids 
                 ORDER BY tb.created_at DESC 
                 LIMIT 1) AS tailoring_batch_id,
                
                -- Actual cost including tax
                ( 
                    CASE 
                        WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 
                        THEN od.discount_price + (od.discount_price * od.tax_percentage / 100)
                        ELSE od.selling_price + (od.selling_price * od.tax_percentage / 100)
                    END
                ) AS actual_cost
                
            FROM order_details od
            JOIN product_details p ON od.product_id = p.ids
            WHERE od.vendor_id = ?";
        
        $countQuery = "SELECT COUNT(od.ids) as total 
                       FROM order_details od
                       JOIN product_details p ON od.product_id = p.ids
                       WHERE od.vendor_id = ?";
                       
        $params = [$vendor_id];
        $types = is_numeric($vendor_id) ? 'i' : 's';
        
        // Handle status filter - for Product Cancelled, don't filter by payment_status
        if ($order_id) {
            $query .= " AND od.order_id = ?";
            $countQuery .= " AND od.order_id = ?";
            $params[] = $order_id;
            $types .= 's';
        } elseif ($status === 'Product Cancelled') {
            // For cancelled orders, get all cancelled products regardless of payment status
            $query .= " AND od.status = 'Product Cancelled'";
            $countQuery .= " AND od.status = 'Product Cancelled'";
            // Note: No payment_status filter here
        } elseif ($status) {
            // For other statuses, only get paid orders
            $query .= " AND od.payment_status = 'PAID' AND od.status = ?";
            $countQuery .= " AND od.payment_status = 'PAID' AND od.status = ?";
            $params[] = $status;
            $types .= 's';
        } else {
            // Default: only show paid orders that are not cancelled
            $query .= " AND od.payment_status = 'PAID'";
            $countQuery .= " AND od.payment_status = 'PAID'";
        }
        
        // Add date filter
        if ($start_date && $end_date) {
            $query .= " AND DATE(od.placed_date) BETWEEN ? AND ?";
            $countQuery .= " AND DATE(od.placed_date) BETWEEN ? AND ?";
            $params[] = $start_date;
            $params[] = $end_date;
            $types .= 'ss';
        }
        
        // CUSTOMER FILTER
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
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $totalRecords = $stmt->get_result()->fetch_assoc()['total'];
        
        // Add sorting and pagination to main query
        $query .= " ORDER BY $orderBy LIMIT ? OFFSET ?";
        $params[] = (int)$length;
        $params[] = (int)$start;
        $types .= 'ii';
        
        // Execute main query
        $stmt = $this->varDBConnection->prepare($query);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'ids' => $row['ids'],
                'order_id' => $row['order_id'],
                'customer' => [
                    'name' => $row['customer_name'],
                    'phone' => $row['customer_phone'],
                    'email' => $row['customer_email'],
                    'customer_id'=> $row['customer_id'],
                ],
                'product_name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'amount' => $row['amount'],
                'selling_price' => $row['selling_price'],
                'discount_price' => $row['discount_price'],
                'tax_percentage' => $row['tax_percentage'],
                'actual_cost' => $row['actual_cost'],
                'order_date' => $row['order_date'],
                'status' => $row['status'],
                'tailoring_item_status' => $row['tailoring_item_status'],
                'tailoring_batch_code' => $row['tailoring_batch_code'],
                'tailoring_batch_id' => $row['tailoring_batch_id'],
                 'product_notes'=>$row['product_notes'],
                'actions' => ''
               
            ];
        }
        
        echo json_encode([
            'draw' => intval($_POST['draw'] ?? 1),
            'recordsTotal' => intval($totalRecords),
            'recordsFiltered' => intval($totalRecords),
            'data' => $data
        ]);
    }

    private function handleUpdateStatus()
    {
        $orderId = $_POST['order_id'];
        $status = $_POST['status'];
        
        // Ensure cancelled orders use "Product Cancelled"
        if ($status === 'Cancelled') {
            $status = 'Product Cancelled';
        }
        
        // Get current status and check if this is moving from Processing to next
        $stmt = $this->varDBConnection->prepare("
            SELECT status FROM order_details WHERE ids = ?
        ");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $currentStatus = $stmt->get_result()->fetch_assoc()['status'];
        
        // Check if trying to move from Processing to next status
        $nextStatuses = ['Quality Check', 'Ready to Ship', 'Shipped', 'In Transit', 'out for delivery', 'Delivered', 'Completed'];
        if ($currentStatus === 'Processing' && in_array($status, $nextStatuses)) {
            // Check tailoring completion
            $tailoringCheck = $this->checkTailoringCompletion($orderId);
            
            if ($tailoringCheck['in_tailoring'] && !$tailoringCheck['completed']) {
                echo json_encode([
                    'success' => false,
                    'message' => "Cannot update status beyond 'Processing' until tailoring is completed. Current batch status: {$tailoringCheck['batch_status']} (Batch: {$tailoringCheck['batch_code']})"
                ]);
                return;
            }
        }
        
        // Get customer email and order details before updating
        $stmt = $this->varDBConnection->prepare("
            SELECT od.customer_email, od.customer_name, od.order_id, od.product_name 
            FROM order_details od 
            WHERE od.ids = ?
        ");
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $orderInfo = $stmt->get_result()->fetch_assoc();
        
        // Update status
        $stmt = $this->varDBConnection->prepare("UPDATE order_details SET status = ? WHERE ids = ?");
        $stmt->bind_param("si", $status, $orderId);
        $result = $stmt->execute();
        
        if ($result) {
            // Send email notification
            if (!empty($orderInfo['customer_email'])) {
                $this->sendStatusUpdateEmail(
                    $orderInfo['customer_email'],
                    $orderInfo['customer_name'],
                    $orderInfo['order_id'],
                    $orderInfo['product_name'],
                    $status
                );
            }
            
            echo json_encode([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update status: ' . $stmt->error
            ]);
        }
    }
    
    private function handleBulkUpdateStatus()
    {
        $orderIds = $_POST['order_ids'];
        $status = $_POST['status'];
        
        if (!is_array($orderIds) || empty($orderIds)) {
            echo json_encode([
                'success' => false,
                'message' => 'No orders selected'
            ]);
            return;
        }
        
        // Ensure cancelled orders use "Product Cancelled"
        if ($status === 'Cancelled') {
            $status = 'Product Cancelled';
        }
        
        // Check if moving from Processing to next statuses
        $nextStatuses = ['Quality Check', 'Ready to Ship', 'Shipped', 'In Transit', 'out for delivery', 'Delivered', 'Completed'];
        
        if (in_array($status, $nextStatuses)) {
            // Check each order's current status and tailoring completion
            $placeholders = implode(',', array_fill(0, count($orderIds), '?'));
            $types = str_repeat('i', count($orderIds));
            
            $stmt = $this->varDBConnection->prepare("
                SELECT ids, status FROM order_details WHERE ids IN ($placeholders)
            ");
            $stmt->bind_param($types, ...$orderIds);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $ordersToCheck = [];
            while ($row = $result->fetch_assoc()) {
                if ($row['status'] === 'Processing') {
                    $ordersToCheck[] = $row['ids'];
                }
            }
            
            if (!empty($ordersToCheck)) {
                $failedOrders = [];
                foreach ($ordersToCheck as $orderId) {
                    $tailoringCheck = $this->checkTailoringCompletion($orderId);
                    if ($tailoringCheck['in_tailoring'] && !$tailoringCheck['completed']) {
                        $failedOrders[] = $orderId;
                    }
                }
                
                if (!empty($failedOrders)) {
                    echo json_encode([
                        'success' => false,
                        'message' => count($failedOrders) . ' order(s) cannot be updated because tailoring is not completed. Please complete tailoring first.'
                    ]);
                    return;
                }
            }
        }
        
        // Get customer emails for all orders
        $placeholders = implode(',', array_fill(0, count($orderIds), '?'));
        $types = str_repeat('i', count($orderIds));
        
        $stmt = $this->varDBConnection->prepare("
            SELECT od.customer_email, od.customer_name, od.order_id, od.product_name 
            FROM order_details od 
            WHERE od.ids IN ($placeholders)
        ");
        $stmt->bind_param($types, ...$orderIds);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $ordersInfo = [];
        while ($row = $result->fetch_assoc()) {
            $ordersInfo[] = $row;
        }
        
        // Update status for all orders
        $updateStmt = $this->varDBConnection->prepare("UPDATE order_details SET status = ? WHERE ids IN ($placeholders)");
        $bindTypes = "s" . $types;
        $updateStmt->bind_param($bindTypes, $status, ...$orderIds);
        $result = $updateStmt->execute();
        
        if ($result) {
            // Send email notifications for all updated orders
            foreach ($ordersInfo as $orderInfo) {
                if (!empty($orderInfo['customer_email'])) {
                    $this->sendStatusUpdateEmail(
                        $orderInfo['customer_email'],
                        $orderInfo['customer_name'],
                        $orderInfo['order_id'],
                        $orderInfo['product_name'],
                        $status
                    );
                }
            }
            
            echo json_encode([
                'success' => true,
                'message' => count($orderIds) . ' order(s) status updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update status: ' . $updateStmt->error
            ]);
        }
    }
    
    // private function sendStatusUpdateEmail($customerEmail, $customerName, $orderId, $productName, $status){
    //     // Email configuration
    //     $to = $customerEmail;
    //     $subject = "Order Status Update - Order #" . $orderId;
        
    //     // Email body with HTML formatting
    //     $message = "
    //     <!DOCTYPE html>
    //     <html>
    //     <head>
    //         <style>
    //             body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
    //             .container { max-width: 600px; margin: 0 auto; padding: 20px; }
    //             .header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }
    //             .content { padding: 20px; background-color: #f9f9f9; }
    //             .order-details { background-color: white; padding: 15px; border-radius: 5px; margin: 15px 0; }
    //             .status-update { background-color: #e8f5e8; padding: 15px; border-left: 4px solid #4CAF50; margin: 15px 0; }
    //             .footer { text-align: center; padding: 20px; font-size: 12px; color: #777; }
    //         </style>
    //     </head>
    //     <body>
    //         <div class='container'>
    //             <div class='header'>
    //                 <h2>Darjana Shopping</h2>
    //             </div>
                
    //             <div class='content'>
    //                 <h3>Dear " . htmlspecialchars($customerName) . ",</h3>
                    
    //                 <p>Your order status has been updated. Here are the details:</p>
                    
    //                 <div class='order-details'>
    //                     <h4>Order Information:</h4>
    //                     <p><strong>Order ID:</strong> #" . htmlspecialchars($orderId) . "</p>
    //                     <p><strong>Product:</strong> " . htmlspecialchars($productName) . "</p>
    //                     <p><strong>Updated Date:</strong> " . date('F j, Y, g:i a') . "</p>
    //                 </div>
                    
    //                 <div class='status-update'>
    //                     <h4>Status Update:</h4>
    //                     <p><strong>New Status:</strong> <span style='color: #4CAF50; font-weight: bold;'>" . htmlspecialchars($status) . "</span></p>
    //                 </div>
                    
    //                 <p>You can track your order anytime by logging into your account or using the order tracking feature on our website.</p>
                    
    //                 <p>If you have any questions about your order, please contact our customer support team.</p>
                    
    //                 <p>Thank you for shopping with us!</p>
                    
    //                 <p>Best regards,<br>
    //                 Darjana Shopping Team</p>
    //             </div>
                
    //             <div class='footer'>
    //                 <p>This is an automated email. Please do not reply to this message.</p>
    //                 <p>&copy; " . date('Y') . " Darjana Shopping. All rights reserved.</p>
    //             </div>
    //         </div>
    //     </body>
    //     </html>
    //     ";
        
    //     // Headers for HTML email
    //     $headers = "MIME-Version: 1.0" . "\r\n";
    //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //     $headers .= "From: Darjana Shopping <noreply@darjana.com>" . "\r\n";
    //     $headers .= "Reply-To: support@darjana.com" . "\r\n";
    //     $headers .= "X-Mailer: PHP/" . phpversion();
        
    //     // Send email
    //     return mail($to, $subject, $message, $headers);
    // }
    private function sendStatusUpdateEmail($customerEmail, $customerName, $orderId, $productName, $status){

        require_once __DIR__ . '/../../mailapi/Exception.php';
        require_once __DIR__ . '/../../mailapi/PHPMailer.php';
        require_once __DIR__ . '/../../mailapi/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // Email body (UNCHANGED)
            $message = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }
                    .content { padding: 20px; background-color: #f9f9f9; }
                    .order-details { background-color: white; padding: 15px; border-radius: 5px; margin: 15px 0; }
                    .status-update { background-color: #e8f5e8; padding: 15px; border-left: 4px solid #4CAF50; margin: 15px 0; }
                    .footer { text-align: center; padding: 20px; font-size: 12px; color: #777; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>Darjana Shopping</h2>
                    </div>
                    
                    <div class='content'>
                        <h3>Dear " . htmlspecialchars($customerName) . ",</h3>
                        
                        <p>Your order status has been updated. Here are the details:</p>
                        
                        <div class='order-details'>
                            <h4>Order Information:</h4>
                            <p><strong>Order ID:</strong> #" . htmlspecialchars($orderId) . "</p>
                            <p><strong>Product:</strong> " . htmlspecialchars($productName) . "</p>
                            <p><strong>Updated Date:</strong> " . date('F j, Y, g:i a') . "</p>
                        </div>
                        
                        <div class='status-update'>
                            <h4>Status Update:</h4>
                            <p><strong>New Status:</strong> <span style='color: #4CAF50; font-weight: bold;'>" . htmlspecialchars($status) . "</span></p>
                        </div>
                        
                        <p>You can track your order anytime by logging into your account.</p>
                        <p>Thank you for shopping with us!</p>
                        
                        <p>Best regards,<br>Darjana Shopping Team</p>
                    </div>
                    
                    <div class='footer'>
                        <p>This is an automated email. Please do not reply.</p>
                        <p>&copy; " . date('Y') . " Darjana Shopping</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            // SMTP config
            $mail->isSMTP();
            $mail->Host       = 'mail.darjanafashion.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'care@darjanafashion.com';
            $mail->Password   = 's@nds1@b';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            // Email settings
            $mail->setFrom('care@darjanafashion.com', 'Darjana Shopping');
            $mail->addAddress($customerEmail, $customerName);
            $mail->addReplyTo('support@darjana.com', 'Support');

            $mail->isHTML(true);
            $mail->Subject = "Order Status Update - Order #" . $orderId;
            $mail->Body    = $message;
            $mail->AltBody = "Order #$orderId status updated to $status";

            return $mail->send();

        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        }
    }
    
    private function handleGetOrderDetails()
    {
        $orderId = $_POST['order_id'];
        
        // Get order details with dynamic calculations and country name
        $stmt = $this->varDBConnection->prepare("SELECT 
            od.ids,
            od.order_id AS order_id,
            od.customer_name,
            od.customer_mobile_no AS customer_phone,
            od.customer_email,
            od.placed_date AS order_date,
            od.status,
            od.selling_price AS selling_price,
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
            od.country AS country_id,  -- Keep the ID
            c.country AS country_name,  -- Get the actual country name
            od.postal_code,
            od.cod_fee AS shipping_fee,
            od.tax_percentage,
            od.comments,
            
            -- Unit price: discount_price if available, otherwise selling_price
            (CASE 
                WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 THEN od.discount_price
                ELSE od.selling_price
            END) AS unit_price,
            
            -- Subtotal = unit_price * quantity
            (CASE 
                WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 THEN od.discount_price * od.quantity
                ELSE od.selling_price * od.quantity
            END) AS subtotal,
            
            -- Tax = subtotal * tax_percentage / 100
            (CASE 
                WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 THEN (od.discount_price * od.quantity) * (od.tax_percentage / 100)
                ELSE (od.selling_price * od.quantity) * (od.tax_percentage / 100)
            END) AS tax,
            
            -- Grand total = subtotal + shipping + tax
            (CASE 
                WHEN od.discount_price IS NOT NULL AND od.discount_price > 0 THEN 
                    (od.discount_price * od.quantity) + od.cod_fee + ((od.discount_price * od.quantity) * (od.tax_percentage / 100))
                ELSE
                    (od.selling_price * od.quantity) + od.cod_fee + ((od.selling_price * od.quantity) * (od.tax_percentage / 100))
            END) AS grand_total,
            
            'Cash On Delivery' AS payment_method
        
        FROM order_details od
        JOIN product_details p ON od.product_id = p.ids
        LEFT JOIN country c ON od.country = c.ids  -- Join with country table
        WHERE od.ids = ?");
    
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $order = $result->fetch_assoc();
            
            // Format the response
            $response = [
                'success' => true,
                'data' => [
                    'ids' => $order['ids'],
                    'order_id' => $order['order_id'],
                    'order_date' => $order['order_date'],
                    'status' => $order['status'],
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
                        'country_id' => $order['country_id'],
                        'country' => $order['country_name'],  // Send the actual country name
                        'postal_code' => $order['postal_code']
                    ],
                    'items' => [[
                        'product_name' => $order['product_name'],
                        'color' => $order['color'],
                        'size' => $order['size'],
                        'quantity' => $order['quantity'],
                        'product_length' => $order['product_length'],
                        'unit_price' => $order['unit_price'],
                        'total' => $order['subtotal']
                    ]],
                    'subtotal' => $order['subtotal'],
                    'shipping_fee' => $order['shipping_fee'],
                    'tax' => $order['tax'],
                    'grand_total' => $order['grand_total'],
                    'payment_method' => $order['payment_method'],
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
    }
    
    private function checkTailoringCompletion($orderDetailId)
    {
        // Query to get the item status for this order detail
        $query = "SELECT 
                    tbi.item_status,
                    tb.batch_id,
                    tb.batch_code
                  FROM tailoring_batch_items tbi
                  JOIN tailoring_batches tb ON tbi.batch_id = tb.batch_id
                  WHERE tbi.order_detail_id = ?
                  ORDER BY tb.created_at DESC
                  LIMIT 1";
        
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("i", $orderDetailId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            // No tailoring batch item found for this order - allow status change
            return [
                'completed' => true,
                'item_status' => null,
                'batch_code' => null,
                'batch_id' => null,
                'in_tailoring' => false
            ];
        }
        
        $item = $result->fetch_assoc();
        
        // Check if item status is 'Completed'
        return [
            'completed' => ($item['item_status'] === 'Completed'),
            'item_status' => $item['item_status'],
            'batch_code' => $item['batch_code'],
            'batch_id' => $item['batch_id'],
            'in_tailoring' => true
        ];
    }
    
    private function handleUpdateItemStatus()
    {
        $batch_id = $_POST['batch_id'] ?? 0;
        $item_id = $_POST['item_id'] ?? 0;
        $status = $_POST['status'] ?? '';
        
        if (!$batch_id || !$item_id || !$status) {
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }
        
        // Update the item status
        $query = "UPDATE tailoring_batch_items 
                  SET item_status = ?, 
                      updated_at = NOW(),
                      completed_at = IF(? = 'Completed', NOW(), NULL)
                  WHERE id = ? AND batch_id = ?";
        
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("ssii", $status, $status, $item_id, $batch_id);
        
        if ($stmt->execute()) {
            // Check if all items in batch are completed, update batch status if needed
            $this->updateBatchStatusBasedOnItems($batch_id);
            
            echo json_encode([
                'success' => true,
                'message' => 'Item status updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update item status'
            ]);
        }
    }
    
    // Add this method for updating multiple items
    private function handleUpdateMultipleItemsStatus()
    {
        $batch_id = $_POST['batch_id'] ?? 0;
        $item_ids = $_POST['item_ids'] ?? [];
        $status = $_POST['status'] ?? '';
        
        if (!$batch_id || empty($item_ids) || !$status) {
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }
        
        // Convert to array if it's not already
        if (!is_array($item_ids)) {
            $item_ids = [$item_ids];
        }
        
        // Sanitize IDs
        $item_ids = array_map('intval', $item_ids);
        $ids_placeholder = implode(',', array_fill(0, count($item_ids), '?'));
        
        // Update all selected items
        $query = "UPDATE tailoring_batch_items 
                  SET item_status = ?, 
                      updated_at = NOW(),
                      completed_at = IF(? = 'Completed', NOW(), completed_at)
                  WHERE id IN ($ids_placeholder) AND batch_id = ?";
        
        $types = "ss" . str_repeat("i", count($item_ids)) . "i";
        $params = array_merge([$status, $status], $item_ids, [$batch_id]);
        
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param($types, ...$params);
        
        if ($stmt->execute()) {
            // Check if all items in batch are completed
            $this->updateBatchStatusBasedOnItems($batch_id);
            
            echo json_encode([
                'success' => true,
                'message' => count($item_ids) . ' item(s) updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update items'
            ]);
        }
    }
    
    // Add this method to update batch status based on items
    private function updateBatchStatusBasedOnItems($batch_id)
    {
        // Check if all items are completed
        $query = "SELECT 
                    COUNT(*) as total_items,
                    SUM(CASE WHEN item_status = 'Completed' THEN 1 ELSE 0 END) as completed_items,
                    SUM(CASE WHEN item_status = 'Cancelled' THEN 1 ELSE 0 END) as cancelled_items
                  FROM tailoring_batch_items 
                  WHERE batch_id = ?";
        
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("i", $batch_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        
        $total = $result['total_items'];
        $completed = $result['completed_items'];
        $cancelled = $result['cancelled_items'];
        
        $new_batch_status = null;
        
        if ($completed == $total) {
            // All items completed
            $new_batch_status = 'Completed';
        } elseif ($cancelled == $total) {
            // All items cancelled
            $new_batch_status = 'Cancelled';
        } elseif ($completed > 0 || $cancelled > 0) {
            // Some items completed/cancelled, some still pending/in progress
            $new_batch_status = 'In Progress';
        } else {
            // All items pending
            $new_batch_status = 'Pending';
        }
        
        // Update batch status
        $update = "UPDATE tailoring_batches SET status = ? WHERE batch_id = ?";
        $stmt = $this->varDBConnection->prepare($update);
        $stmt->bind_param("si", $new_batch_status, $batch_id);
        $stmt->execute();
    }
    
    // Replace the old update_batch_status with this new version
    private function handleUpdateBatchStatusWithItems()
    {
        $batch_id = $_POST['batch_id'] ?? 0;
        $status = $_POST['status'] ?? '';
        
        if (!$batch_id || !$status) {
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }
        
        // Update batch status
        $query = "UPDATE tailoring_batches SET status = ? WHERE batch_id = ?";
        $stmt = $this->varDBConnection->prepare($query);
        $stmt->bind_param("si", $status, $batch_id);
        
        if ($stmt->execute()) {
            // Update all items in this batch to the same status
            $item_query = "UPDATE tailoring_batch_items 
                           SET item_status = ?,
                               updated_at = NOW(),
                               completed_at = IF(? = 'Completed', NOW(), completed_at)
                           WHERE batch_id = ?";
            
            $item_stmt = $this->varDBConnection->prepare($item_query);
            $item_stmt->bind_param("ssi", $status, $status, $batch_id);
            $item_stmt->execute();
            
            echo json_encode([
                'success' => true,
                'message' => 'Batch and all items updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update batch'
            ]);
        }
    }
    
}

$obj = new OrdersController();
$obj->RequestAccept($obj->actionevents);
?>