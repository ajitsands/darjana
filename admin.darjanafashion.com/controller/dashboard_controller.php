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

        $array[0] = "SELECT 
                        COUNT(DISTINCT od.ids) as total_orders,
                        (SELECT COUNT(ids) FROM customer_details) as total_customers,
                        (SELECT COUNT(ids) FROM product_details WHERE status = 'Active') as total_products
                    FROM order_details od";

        $array[1] = "SELECT 
                        COUNT(DISTINCT od.ids) as total_orders
                    FROM order_details od
                    WHERE od.placed_date >= DATE_SUB(NOW(), INTERVAL 60 DAY) 
                    AND od.placed_date < DATE_SUB(NOW(), INTERVAL 30 DAY)";

        $array[2] = "SELECT 
                        DATE(placed_date) as date, 
                        COUNT(ids) as daily_orders
                    FROM order_details
                    WHERE placed_date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                    GROUP BY DATE(placed_date)
                    ORDER BY DATE(placed_date)";

        $array[3] = "SELECT 
                        c.category_type as category,
                        COUNT(od.ids) as order_count
                    FROM order_details od
                    JOIN product_details p ON od.product_id = p.ids
                    JOIN category_details c ON p.category_id = c.ids
                    WHERE od.placed_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                    GROUP BY c.category_type
                    ORDER BY order_count DESC
                    LIMIT 5";

        $array[4] = "SELECT 
                        od.ids as id,
                        od.ids as order_id,
                        od.customer_name,
                        od.customer_mobile_no as customer_mobile,
                        od.product_name,
                        DATE_FORMAT(od.placed_date, '%b %d, %Y') as order_date,
                        od.status as status
                    FROM order_details od
                    ORDER BY od.placed_date DESC
                    LIMIT 5";


		$array[5] = "SELECT 
						p.ids AS product_id,
						p.product_name AS name,
						cat.category_type AS category,
						sub.sub_category AS subcategory,
						COUNT(*) AS quantity_sold,
						COUNT(*) * p.amount_selling AS total_sales
					FROM 
						order_details od
					JOIN 
						product_details p ON od.product_id = p.ids
					JOIN 
						category_details cat ON p.category_id = cat.ids
					LEFT JOIN 
						sub_category_details sub ON p.sub_category_id = sub.ids
					GROUP BY 
						p.ids
					ORDER BY 
						quantity_sold DESC
					LIMIT 5";

        $array[6] = "SELECT 
                        state,
                        COUNT(DISTINCT customer_id) as customer_count,
                        COUNT(ids) as order_count
                    FROM order_details
                    GROUP BY state
                    ORDER BY order_count DESC";

        $array[7] = "SELECT 
                        COUNT(ids) as active_products
                    FROM product_details
                    WHERE status = 'Active'";

        $array[8] = "SELECT 
                        c.category_type as category,
                        COUNT(p.ids) as product_count
                    FROM product_details p
                    JOIN category_details c ON p.category_id = c.ids
                    WHERE p.status = 'Active'
                    GROUP BY c.category_type
                    ORDER BY product_count DESC";

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
                
                // For demo purposes, we'll set some reasonable growth numbers
                $salesGrowth = 12.5; // Assuming 12.5% sales growth
                $customersGrowth = 8.2; // 8.2% customer growth
                $productsGrowth = 5.7; // 5.7% product growth

                $response = [
                    'total_sales' => $currentData['total_orders'] * 1500, // Assuming average order value of 1500
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
                $stmt = $this->varDBConnection->prepare($var[2]);
                $stmt->bind_param("i", $days);
                $stmt->execute();
                $result = $stmt->get_result();

                $labels = [];
                $data = [];

                while ($row = $result->fetch_assoc()) {
                    $labels[] = date('M j', strtotime($row['date']));
                    $data[] = $row['daily_orders'] * 1500; // Multiply by average order value
                }

                // Fill in missing dates with 0
                $completeData = [];
                $completeLabels = [];
                $currentDate = new DateTime();
                $endDate = (new DateTime())->sub(new DateInterval("P{$days}D"));

                for ($date = $endDate; $date <= $currentDate; $date->add(new DateInterval('P1D'))) {
                    $formattedDate = $date->format('M j');
                    $completeLabels[] = $formattedDate;
                    
                    $index = array_search($formattedDate, $labels);
                    $completeData[] = $index !== false ? $data[$index] : 0;
                }

                echo json_encode([
                    'labels' => $completeLabels,
                    'data' => $completeData
                ]);
                break;

            case 'get_categories_data':
                $result = $this->varModelObj->ListFromTable($var[3]);
                $data = json_decode($result, true);

                $series = [];
                $labels = [];

                foreach ($data as $row) {
                    $labels[] = $row['category'];
                    $series[] = (int)$row['order_count'];
                }

                echo json_encode([
                    'series' => $series,
                    'labels' => $labels
                ]);
                break;

            // case 'get_recent_orders':
			// echo $var[4];
                // $result = $this->varModelObj->ListFromTable($var[4]);
                // echo $result;
                // break;

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

                // For demo, we'll assume 5 products are low stock
                $lowStockProducts = 5;

                $response = [
                    'active_products' => $activeProducts,
                    'low_stock_products' => $lowStockProducts,
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