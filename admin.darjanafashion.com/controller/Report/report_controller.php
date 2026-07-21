<?php
session_start();
require ('../../model/common/common_functions.php');

class ReportController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
    }

    function SQLArray()
    {
        $array = array();

        $array[0] = "SELECT 
                        p.ids, 
                        p.product_name, 
                        SUM(o.quantity) AS total_sold 
                    FROM order_details o
                    INNER JOIN product_details p ON o.product_id = p.ids 
                    WHERE 
                        o.status = 'Delivered'
                        AND o.order_date >= NOW() - INTERVAL 30 DAY
                    GROUP BY 
                        p.ids, p.product_name
                    ORDER BY 
                        total_sold DESC";
                    
        $array[1]="SELECT  customer_id,
                            customer_name,
                            customer_email,
                            SUM(quantity) AS total_items,
                            SUM(quantity * ((selling_price)+(selling_price*tax_percentage/100))) AS selling_price,
                            SUM(quantity * ((discount_price)+(discount_price*tax_percentage/100))) AS total_spent
                    FROM order_details 
                    WHERE status='Delivered'
                    GROUP BY customer_id 
                    ORDER BY total_spent DESC";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'product_wise_report':
                $filters = $this->getDateFilters();
                $sql = $this->buildProductReportQuery($filters);
                //echo $sql;
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
            break;
            
            case 'customer_wise_report':
                $filters = $this->getDateFilters();
                $country = $_POST['country'] ?? '';
                
                $sql = $this->buildCustomerReportQuery($filters, $country);
                // echo $sql;
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
            break;
            
            // New: Get all registered customers with order counts (for Customer Wise tab)
            case 'all_customers_report':
                $filters = $this->getDateFilters();
                $country = $_POST['country'] ?? '';
                $sql = $this->buildAllCustomersQuery($filters, $country);
                // echo $sql;
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
            break;
            
            case 'get_countries':
                $sql = "SELECT DISTINCT c.ids, c.country 
                        FROM country c
                        WHERE EXISTS (
                            SELECT 1 FROM order_details od 
                            WHERE od.country = c.ids
                            UNION
                            SELECT 1 FROM customer_details cd 
                            WHERE cd.country = c.ids
                        )
                        ORDER BY c.country ASC";
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                break;
            
            case 'get_promo_codes':
                $sql = "SELECT ids, promo_code, offer_percentage, minimum_order_amount, expire_date 
                        FROM promo_codes 
                        WHERE status = 1 
                        AND expire_date >= CURDATE()
                        ORDER BY ids DESC";
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                 break;
            
            case 'customer_order_details':
                $customer_id = $_POST['customer_id'];
                $filters = $this->getDateFilters();
                
                $sql = "SELECT ids, order_id, product_id, product_name, product_cost, 
                        discount_price, selling_price, placed_date, tax_percentage, 
                        quantity, status 
                        FROM order_details 
                        WHERE customer_id = '" . mysqli_real_escape_string($this->varDBConnection, $_POST['customer_id']) . "'";
                
                $sql .= " AND status IN ('Delivered', 'Completed')";
                
                if (!empty($filters['date_from'])) {
                    $sql .= " AND DATE(placed_date) >= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_from']) . "'";
                }
                if (!empty($filters['date_to'])) {
                    $sql .= " AND DATE(placed_date) <= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_to']) . "'";
                }
                
                $sql .= " ORDER BY placed_date DESC";
                
                $data = $this->varModelObj->ListFromTable($sql);
                $decodedData = json_decode($data, true);
                
                $totalAmount = 0;
                if (!empty($decodedData)) {
                    foreach ($decodedData as $order) {
                        $selling_price = floatval($order['selling_price']);
                        $discount_price = floatval($order['discount_price']);
                        $tax = floatval($order['tax_percentage']);
                        $quantity = floatval($order['quantity']);
                        
                        if ($discount_price > 0) {
                            $actual_cost = $quantity * ($discount_price + ($discount_price * $tax / 100));
                        } else {
                            $actual_cost = $quantity * ($selling_price + ($selling_price * $tax / 100));
                        }
                        
                        $totalAmount += $actual_cost;
                    }
                }
                
                echo json_encode([
                    "data" => $decodedData,
                    "total_amount" => $totalAmount
                ]);
            break;
            
            case 'send_bulk_emails':
                $subject = $_POST['subject'] ?? 'Update from Darjana';
                $htmlBody = $_POST['body'] ?? '';
                $customersJson = $_POST['customers'] ?? '[]';
                $customers = json_decode($customersJson, true);
            
                if (empty($customers) || empty($htmlBody)) {
                    echo json_encode(['success' => false, 'message' => 'Missing subject or message']);
                    exit;
                }
            
                require_once __DIR__ . '/../../mailapi/Exception.php';
                require_once __DIR__ . '/../../mailapi/PHPMailer.php';
                require_once __DIR__ . '/../../mailapi/SMTP.php';
            
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $sentCount = 0;
            
                try {
                    $mail->isSMTP();
                    $mail->Host = 'mail.darjanafashion.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'care@darjanafashion.com';
                    $mail->Password = 's@nds1@b';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
            
                    $mail->setFrom('care@darjanafashion.com', 'Darjana Shopping');
                    $mail->addReplyTo('support@darjana.com', 'Support');
                    $mail->isHTML(true);
            
                    foreach ($customers as $cust) {
                        if (empty($cust['customer_email'])) continue;
            
                        $mail->clearAddresses();
                        $mail->addAddress($cust['customer_email'], $cust['customer_name'] ?? 'Valued Customer');
            
                        $message = "
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <style>
                                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                                .header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }
                                .content { padding: 20px; background-color: #f9f9f9; }
                                .message-body { background-color: white; padding: 20px; border-radius: 5px; margin: 15px 0; }
                                .footer { text-align: center; padding: 20px; font-size: 12px; color: #777; }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <div class='header'>
                                    <h2>Darjana Shopping</h2>
                                </div>
                               
                                <div class='content'>
                                    <h3>Dear " . htmlspecialchars($cust['customer_name'] ?? 'Valued Customer') . ",</h3>
                                   
                                    <div class='message-body'>
                                        " . $htmlBody . "
                                    </div>
                                   
                                    <p>Thank you for shopping with us!</p>
                                    <p>Best regards,<br>Darjana Shopping Team</p>
                                </div>
                               
                                <div class='footer'>
                                    <p>This is an automated email. Please do not reply.</p>
                                    <p>© " . date('Y') . " Darjana Shopping</p>
                                </div>
                            </div>
                        </body>
                        </html>";
            
                        $mail->Subject = $subject;
                        $mail->Body = $message;
                        $mail->AltBody = strip_tags($htmlBody);
            
                        if ($mail->send()) {
                            $sentCount++;
                        } else {
                            error_log("Failed to send email to " . $cust['customer_email'] . ": " . $mail->ErrorInfo);
                        }
                    }
            
                    echo json_encode([
                        'success' => true,
                        'sent' => $sentCount,
                        'total' => count($customers)
                    ]);
            
                } catch (Exception $e) {
                    error_log("Bulk Mailer Error: " . $e->getMessage());
                    echo json_encode([
                        'success' => false,
                        'message' => 'Failed to send emails: ' . $e->getMessage()
                    ]);
                }
                break;
            
            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    }
    
    private function getDateFilters() {
        return [
            'date_from' => $_POST['date_from'] ?? '',
            'date_to' => $_POST['date_to'] ?? ''
        ];
    }
    
    private function buildProductReportQuery($filters) {
       // $where = "WHERE o.status='Delivered'";
        $where="WHERE o.status IN (
            'Shipped',
            'In Transit',
            'Out For Delivery',
            'Delivered',
            'Completed'
        )";
        if (!empty($filters['date_from']) && !empty($filters['date_to'])) {
            $where .= " AND DATE(o.placed_date) BETWEEN '" . $filters['date_from'] . "' AND '" . $filters['date_to'] . "'";
        } elseif (!empty($filters['date_from'])) {
            $where .= " AND DATE(o.placed_date) >= '" . $filters['date_from'] . "'";
        } elseif (!empty($filters['date_to'])) {
            $where .= " AND DATE(o.placed_date) <= '" . $filters['date_to'] . "'";
        }
        
        $sql = "SELECT p.ids, p.product_name, SUM(o.quantity) AS total_sold 
                FROM order_details o
                INNER JOIN product_details p ON o.product_id = p.ids 
                $where
                GROUP BY p.ids, p.product_name
                ORDER BY total_sold DESC";
        
        return $sql;
    }
    
    private function buildCustomerReportQuery($filters, $country = '') {
        $where = "WHERE od.status IN ('Delivered', 'Completed')";
        
        if (!empty($filters['date_from']) && !empty($filters['date_to'])) {
            $where .= " AND DATE(od.placed_date) BETWEEN '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_from']) . "' AND '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_to']) . "'";
        } elseif (!empty($filters['date_from'])) {
            $where .= " AND DATE(od.placed_date) >= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_from']) . "'";
        } elseif (!empty($filters['date_to'])) {
            $where .= " AND DATE(od.placed_date) <= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_to']) . "'";
        }
        
        // Add country filter if provided (using country IDs)
        if (!empty($country)) {
            $where .= " AND ctry.country = '" . mysqli_real_escape_string($this->varDBConnection, $country) . "'";
        }
        
        $sql = "SELECT 
                    od.customer_id, 
                    od.customer_name, 
                    od.customer_email, 
                    ctry.country AS country,
                    SUM(od.quantity) AS total_items,
                    SUM(
                        od.quantity * (
                            CASE 
                                WHEN od.discount_price > 0 
                                THEN (od.discount_price + (od.discount_price * od.tax_percentage / 100))
                                ELSE (od.selling_price + (od.selling_price * od.tax_percentage / 100))
                            END
                        )
                    ) AS total_spent
                FROM order_details od
                INNER JOIN customer_details cd ON od.customer_id = cd.ids
                LEFT JOIN country ctry ON cd.country = ctry.ids
                $where
                GROUP BY od.customer_id, ctry.country
                ORDER BY total_spent DESC";
        
        return $sql;
    }
    
    // New: Build query to get all registered customers with order counts
    private function buildAllCustomersQuery($filters, $country = '') {
        $where = "WHERE 1=1";
        
        // Add country filter if provided (using country IDs)
        if (!empty($country)) {
            $where .= " AND ctry.country = '" . mysqli_real_escape_string($this->varDBConnection, $country) . "'";
        }
        
        // Filter by status (only active customers)
        $where .= " AND c.status = 'Active'";
        
        // Date filter for registration date
        if (!empty($filters['date_from']) && !empty($filters['date_to'])) {
            $where .= " AND DATE(c.created_date) BETWEEN '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_from']) . "' AND '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_to']) . "'";
        } elseif (!empty($filters['date_from'])) {
            $where .= " AND DATE(c.created_date) >= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_from']) . "'";
        } elseif (!empty($filters['date_to'])) {
            $where .= " AND DATE(c.created_date) <= '" . mysqli_real_escape_string($this->varDBConnection, $filters['date_to']) . "'";
        } else {
            // Default: last 30 days
            $where .= " AND DATE(c.created_date) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
        }
        
        $sql = "SELECT 
                    c.ids AS customer_id,
                    c.customer_name,
                    c.email_user_name AS customer_email,
                    c.mobile_no AS phone,
                    ctry.country AS country,
                    c.created_date AS registration_date,
                    c.status,
                    COALESCE(
                        (SELECT COUNT(*) 
                         FROM order_details od 
                         WHERE od.customer_id = c.ids 
                         AND od.status IN ('Delivered', 'Completed')
                        ), 0
                    ) AS order_count
                FROM customer_details c
                LEFT JOIN country ctry ON c.country = ctry.ids
                $where
                ORDER BY c.ids DESC";
        
        return $sql;
    }
}

$obj = new ReportController();
$obj->RequestAccept($obj->actionevents);
?>