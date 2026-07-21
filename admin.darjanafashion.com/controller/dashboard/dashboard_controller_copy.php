<?php
session_start();
require ('../../model/common/common_functions.php');

class DashboardController
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

        // Dashboard Summary
        $array[0] = "SELECT 
            COUNT(DISTINCT od.ids) as total_orders,
            SUM(od.discount_price * od.quantity) as total_sales,
            (SELECT COUNT(DISTINCT customer_id) FROM order_details WHERE vendor_id = {$_SESSION['vendor_id']}) AS total_customers,
            (SELECT COUNT(ids) FROM product_details WHERE status = 'Active' AND vendor_id = {$_SESSION['vendor_id']}) as total_products
        FROM order_details od
        WHERE od.vendor_id = {$_SESSION['vendor_id']}";

        $array[1] = "SELECT 
                        COUNT(DISTINCT od.ids) as total_orders,
                        SUM(od.discount_price * od.quantity) as total_sales
                    FROM order_details od
                    WHERE od.vendor_id = {$_SESSION['vendor_id']} AND
                          od.placed_date >= DATE_SUB(NOW(), INTERVAL 60 DAY) 
                          AND od.placed_date < DATE_SUB(NOW(), INTERVAL 30 DAY)";
        
        $array[2] = "SELECT 
                        DATE(od.placed_date) as date, 
                        COUNT(od.ids) as daily_orders,
                       SUM(od.discount_price * od.quantity) as daily_sales

                    FROM order_details od
                    WHERE od.placed_date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                      AND od.vendor_id = {$_SESSION['vendor_id']}
                    GROUP BY DATE(od.placed_date)
                    ORDER BY DATE(od.placed_date)";
        
        $array[3] = "SELECT 
                        c.category_type as category,
                        COUNT(od.ids) as order_count,
                        SUM(od.discount_price * od.quantity) as total_sales
                    FROM order_details od
                    JOIN product_details p ON od.product_id = p.ids
                    JOIN category_details c ON p.category_id = c.ids
                    WHERE od.placed_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                      AND od.vendor_id = {$_SESSION['vendor_id']}
                    GROUP BY c.category_type
                    ORDER BY order_count DESC
                    LIMIT 5";
        
        $array[4] = "SELECT 
                        od.ids as id,
                        od.order_id,
                        od.customer_name,
                        od.customer_mobile_no as customer_mobile,
                        od.product_name,
                        DATE_FORMAT(od.placed_date, '%b %d, %Y') as order_date,
                        od.status,
                        od.discount_price as amount
                    FROM order_details od
                    WHERE od.vendor_id = {$_SESSION['vendor_id']}
                    ORDER BY od.placed_date DESC
                    LIMIT 8";
        
        $array[5] = "SELECT 
                        p.ids as product_id,
                        p.product_name as name,
                        c.category_type as category,
                        (SELECT product_image FROM product_image WHERE product_id = p.ids LIMIT 1) as image,
                        SUM(od.quantity) as quantity_sold,
                        SUM(od.discount_price * od.quantity) as total_sales
                    FROM order_details od
                    JOIN product_details p ON od.product_id = p.ids
                    JOIN category_details c ON p.category_id = c.ids
                    WHERE od.vendor_id = {$_SESSION['vendor_id']}
                    GROUP BY p.ids
                    ORDER BY total_sales DESC
                    LIMIT 5";
        
        $array[6] = "SELECT 
                        street,
                        COUNT(DISTINCT customer_id) as customer_count,
                        COUNT(ids) as order_count,
                        SUM(discount_price * quantity) as total_sales
                    FROM order_details
                    WHERE vendor_id = {$_SESSION['vendor_id']}
                    GROUP BY street
                    ORDER BY total_sales DESC";
        
        $array[7] = "SELECT 
                        COUNT(ids) as active_products
                    FROM product_details
                    WHERE status = 'Active'
                      AND vendor_id = {$_SESSION['vendor_id']}";
        
        $array[8] = "SELECT 
                        c.category_type as category,
                        COUNT(p.ids) as product_count
                    FROM product_details p
                    JOIN category_details c ON p.category_id = c.ids
                    WHERE p.status = 'Active'
                      AND p.vendor_id = {$_SESSION['vendor_id']}
                    GROUP BY c.category_type
                    ORDER BY product_count DESC";

        // Update Order Status
        $array[9] = "UPDATE order_details 
                    SET status = ?
                    WHERE ids = ?";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'get_dashboard_summary':
                // Current period data
                $currentData = $this->varModelObj->ListFromTable($var[0]);
                $currentData = json_decode($currentData, true)[0];

                // Previous period data
                $previousData = $this->varModelObj->ListFromTable($var[1]);
                $previousData = json_decode($previousData, true)[0];
    
                // Calculate growth percentages
                $ordersGrowth = $previousData['total_orders'] > 0 ? 
                    round((($currentData['total_orders'] - $previousData['total_orders']) / $previousData['total_orders'] * 100), 2) : 100;
                
                $salesGrowth = $previousData['total_sales'] > 0 ? 
                    round((($currentData['total_sales'] - $previousData['total_sales']) / $previousData['total_sales'] * 100), 2) : 100;
                
                $customersGrowth = $currentData['total_customers'] > 0 ? 
                    round(($currentData['total_customers'] / $currentData['total_customers'] * 100), 2) : 0;
                
                $productsGrowth = $currentData['total_products'] > 0 ? 
                    round(($currentData['total_products'] / $currentData['total_products'] * 100), 2) : 0;

                $response = [
                    'total_sales' => $currentData['total_sales'],
                    'sales_growth' => $salesGrowth,
                    'total_orders' => $currentData['total_orders'],
                    'orders_growth' => $ordersGrowth,
                    'total_customers' => $currentData['total_customers'],
                    'customers_growth' => $customersGrowth,
                    'total_products' => $currentData['total_products'],
                    'products_growth' => $productsGrowth
                ];

                echo json_encode($response);
                break;

           case 'get_sales_data':
                $days = $_POST['days'] ?? 30;
                
                // Get the end date (today) and start date (today - days)
                $endDate = new DateTime();
                $startDate = (new DateTime())->sub(new DateInterval("P{$days}D"));
                
                // Initialize array with all dates in range set to 0
                $dateSales = [];
                $labels = [];
                $currentDate = clone $startDate;
                
                while ($currentDate <= $endDate) {
                    $dateKey = $currentDate->format('Y-m-d');
                    $dateSales[$dateKey] = 0;
                    $labels[] = $currentDate->format('M j'); // Format like "Apr 21"
                    $currentDate->add(new DateInterval('P1D'));
                }
                
                // Get actual sales data from database
                $query = "SELECT 
                            DATE(placed_date) as sale_date, 
                            SUM(discount_price * quantity) as daily_sales
                          FROM order_details
                          WHERE placed_date BETWEEN ? AND ?
                          AND vendor_id = {$_SESSION['vendor_id']}
                          GROUP BY DATE(placed_date)";
                
                $stmt = $this->varDBConnection->prepare($query);
                $startDateStr = $startDate->format('Y-m-d 00:00:00');
                $endDateStr = $endDate->format('Y-m-d 23:59:59'); // Include full day
                $stmt->bind_param("ss", $startDateStr, $endDateStr);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // Merge actual sales data with initialized array
                while ($row = $result->fetch_assoc()) {
                    $dateKey = $row['sale_date'];
                    $dateSales[$dateKey] = (float)($row['daily_sales'] ?? 0);
                }
                
                // Prepare response data
                $data = array_values($dateSales);
                
                echo json_encode([
                    'labels' => $labels,
                    'data' => $data
                ]);
                break;

            case 'get_categories_data':
                $result = $this->varModelObj->ListFromTable($var[3]);
                $data = json_decode($result, true);

                $series = [];
                $labels = [];

                foreach ($data as $row) {
                    $labels[] = $row['category'];
                    $series[] = (float)$row['order_count'];
                }

                echo json_encode([
                    'series' => $series,
                    'labels' => $labels,
                    'total_sales' => array_sum($series)
                ]);
                break;

            case 'get_recent_orders':
                $result = $this->varModelObj->ListFromTable($var[4]);
                echo $result;
                break;

            case 'get_top_products':
                $result = $this->varModelObj->ListFromTable($var[5]);
                echo $result;
                break;

            case 'get_customer_locations':
                $result = $this->varModelObj->ListFromTable($var[6]);
                echo $result;
                break;

            case 'get_inventory_status':
                // Get active products count
                $activeProducts = $this->varModelObj->ListFromTable($var[7]);
                $activeProducts = json_decode($activeProducts, true)[0]['active_products'];

                // Get products by category
                $categoriesData = $this->varModelObj->ListFromTable($var[8]);
                $categoriesData = json_decode($categoriesData, true);

                $categories = [];
                $counts = [];

                foreach ($categoriesData as $row) {
                    $categories[] = $row['category'];
                    $counts[] = $row['product_count'];
                }

                $response = [
                    'active_products' => $activeProducts,
                    'categories' => $categories,
                    'counts' => $counts
                ];

                echo json_encode($response);
                break;

            case 'update_order_status':
                $orderId = $_POST['order_id'];
                $status = $_POST['status'];

                $stmt = $this->varDBConnection->prepare($var[9]);
                $stmt->bind_param("si", $status, $orderId);
                $result = $stmt->execute();

                if ($result) {
                    echo 'success';
                } else {
                    echo 'failed';
                }
                break;

            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    }
}

$obj = new DashboardController();
$obj->RequestAccept($obj->actionevents);
?>