<?php
session_start();
require('../../model/common/common_functions.php');

class SocialMediaController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $from_date, $to_date, $platform, $product_id, $country;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->varDBConnection->set_charset("utf8mb4");

        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;
        $this->from_date    = $_POST['start_date'] ?? $_GET['start_date'] ?? date('Y-m-d', strtotime('-30 days'));
        $this->to_date      = $_POST['end_date']   ?? $_GET['end_date']   ?? date('Y-m-d');
        $this->platform     = $_POST['platform']   ?? $_GET['platform']   ?? '';
        $this->product_id   = (int)($_POST['product_id'] ?? 0);
        $this->country      = $_POST['country']    ?? $_GET['country']    ?? '';
    }

    function SQLArray()
    {
        $whereClause = "WHERE DATE(pt.created_at) BETWEEN '".$this->from_date."' AND '".$this->to_date."'";
        if (!empty($this->platform)) $whereClause .= " AND pt.platform = '".$this->platform."'";
        if (!empty($this->country))  $whereClause .= " AND pt.country = '".$this->country."'";

        $array = [];

        // 0: Main Table Data
        $array[0] = "SELECT pt.product_id, pd.product_name, pt.platform, pt.country, pt.created_at 
                     FROM product_platform_tracking pt 
                     LEFT JOIN product_details pd ON pt.product_id = pd.ids 
                     $whereClause 
                     ORDER BY pt.created_at DESC";

        // 1: Summary Stats
        $array[1] = "SELECT 
                        COUNT(*) as total_clicks,
                        COUNT(DISTINCT pt.product_id) as total_products,
                        SUM(CASE WHEN pt.platform = 'facebook' THEN 1 ELSE 0 END) as facebook_count,
                        SUM(CASE WHEN pt.platform = 'instagram' THEN 1 ELSE 0 END) as instagram_count,
                        SUM(CASE WHEN pt.platform = 'youtube' THEN 1 ELSE 0 END) as youtube_count,
                        SUM(CASE WHEN pt.platform = 'tiktok' THEN 1 ELSE 0 END) as tiktok_count
                     FROM product_platform_tracking pt 
                     $whereClause";

        // 2: Platform Products Detailed
        $array[2] = "SELECT 
                        pt.product_id,
                        pd.product_name,
                        pd.product_brand_name,
                        COUNT(*) as click_count,
                        MAX(pt.created_at) as last_click
                     FROM product_platform_tracking pt 
                     LEFT JOIN product_details pd ON pt.product_id = pd.ids 
                     WHERE DATE(pt.created_at) BETWEEN '".$this->from_date."' AND '".$this->to_date."'
                     AND pt.platform = '".$this->platform."'
                     GROUP BY pt.product_id, pd.product_name, pd.product_brand_name
                     ORDER BY click_count DESC";

        // 3: Product Details with Platform Breakdown
        $array[3] = "SELECT 
                        pd.ids as product_id,
                        pd.product_name,
                        pd.product_brand_name as product_brand,
                        pd.amount_mrp,
                        pd.amount_selling,
                        pd.amount_offer,
                        pd.category_name,
                        pd.status,
                        pd.product_description,
                        COUNT(pt.id) as total_clicks,
                        SUM(CASE WHEN pt.platform = 'facebook' THEN 1 ELSE 0 END) as facebook_clicks,
                        SUM(CASE WHEN pt.platform = 'instagram' THEN 1 ELSE 0 END) as instagram_clicks,
                        SUM(CASE WHEN pt.platform = 'youtube' THEN 1 ELSE 0 END) as youtube_clicks,
                        SUM(CASE WHEN pt.platform = 'tiktok' THEN 1 ELSE 0 END) as tiktok_clicks
                     FROM product_details pd 
                     LEFT JOIN product_platform_tracking pt ON pd.ids = pt.product_id 
                     WHERE pd.ids = ".$this->product_id."
                     GROUP BY pd.ids";

        // 4: Country Summary
        $array[4] = "SELECT 
                        country,
                        COUNT(*) as total_clicks,
                        COUNT(DISTINCT product_id) as products_count
                     FROM product_platform_tracking pt 
                     $whereClause 
                     GROUP BY country 
                     ORDER BY total_clicks DESC";

        // 5: Country Details + Top Products (separate query in code)
        $array[5] = "SELECT 
                        country,
                        COUNT(*) as total_clicks,
                        COUNT(DISTINCT product_id) as products_count,
                        SUM(CASE WHEN platform = 'facebook' THEN 1 ELSE 0 END) as facebook_clicks,
                        SUM(CASE WHEN platform = 'instagram' THEN 1 ELSE 0 END) as instagram_clicks,
                        SUM(CASE WHEN platform = 'youtube' THEN 1 ELSE 0 END) as youtube_clicks,
                        SUM(CASE WHEN platform = 'tiktok' THEN 1 ELSE 0 END) as tiktok_clicks,
                        GROUP_CONCAT(DISTINCT platform) as platforms
                     FROM product_platform_tracking 
                     WHERE DATE(created_at) BETWEEN '".$this->from_date."' AND '".$this->to_date."' 
                     AND country = '".$this->country."'";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'load_social_media_data':
                $data = $this->varModelObj->ListFromTable($var[0]);
                echo json_encode(["data" => json_decode($data, true) ?: []]);
                break;

            case 'load_summary_stats':
                $result = $this->varModelObj->ListFromTable($var[1]);
                $decoded = json_decode($result, true);
                $row = $decoded[0] ?? [];
                echo json_encode([
                    'status' => 'success',
                    'total_clicks' => $row['total_clicks'] ?? 0,
                    'total_products' => $row['total_products'] ?? 0,
                    'facebook_count' => $row['facebook_count'] ?? 0,
                    'instagram_count' => $row['instagram_count'] ?? 0,
                    'youtube_count' => $row['youtube_count'] ?? 0,
                    'tiktok_count' => $row['tiktok_count'] ?? 0
                ]);
                break;

            case 'load_platform_products_detailed':
                $result = $this->varModelObj->ListFromTable($var[2]);
                echo json_encode(['status' => 'success', 'products' => json_decode($result, true) ?: []]);
                break;

            case 'get_product_details':
                if ($this->product_id > 0) {
                    $result = $this->varModelObj->ListFromTable($var[3]);
                    $decoded = json_decode($result, true);
                    if (!empty($decoded)) {
                        $product = $decoded[0];
                        $platform_clicks = [];
                        if ($product['facebook_clicks'] > 0) $platform_clicks[] = ['platform' => 'facebook', 'clicks' => $product['facebook_clicks']];
                        if ($product['instagram_clicks'] > 0) $platform_clicks[] = ['platform' => 'instagram', 'clicks' => $product['instagram_clicks']];
                        if ($product['youtube_clicks'] > 0) $platform_clicks[] = ['platform' => 'youtube', 'clicks' => $product['youtube_clicks']];
                        if ($product['tiktok_clicks'] > 0) $platform_clicks[] = ['platform' => 'tiktok', 'clicks' => $product['tiktok_clicks']];

                        echo json_encode([
                            'status' => 'success',
                            'product' => [
                                'product_id' => $product['product_id'],
                                'product_name' => $product['product_name'],
                                'product_brand' => $product['product_brand'],
                                'amount_mrp' => $product['amount_mrp'],
                                'amount_selling' => $product['amount_selling'],
                                'amount_offer' => $product['amount_offer'],
                                'category_name' => $product['category_name'],
                                'status' => $product['status'],
                                'product_description' => $product['product_description'],
                                'total_clicks' => $product['total_clicks'],
                                'platform_clicks' => $platform_clicks
                            ]
                        ]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Product not found']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Product ID not specified']);
                }
                break;

            case 'load_country_summary':
                $result = $this->varModelObj->ListFromTable($var[4]);
                echo json_encode(['status' => 'success', 'countries' => json_decode($result, true) ?: []]);
                break;

            case 'load_country_details':
                if (empty($this->country)) {
                    echo json_encode(['status' => 'error', 'message' => 'Country not specified']);
                    break;
                }
                $result = $this->varModelObj->ListFromTable($var[5]);
                $countryData = json_decode($result, true)[0] ?? [];

                // Top Products for this country
                $topProductsQuery = "SELECT 
                                        pd.product_name,
                                        COUNT(*) as click_count
                                     FROM product_platform_tracking pt 
                                     LEFT JOIN product_details pd ON pt.product_id = pd.ids 
                                     WHERE DATE(pt.created_at) BETWEEN '".$this->from_date."' AND '".$this->to_date."' 
                                     AND pt.country = '".$this->country."' 
                                     GROUP BY pt.product_id, pd.product_name 
                                     ORDER BY click_count DESC 
                                     LIMIT 10";

                $productsResult = $this->varModelObj->ListFromTable($topProductsQuery);
                $topProducts = json_decode($productsResult, true) ?: [];

                echo json_encode([
                    'status' => 'success',
                    'country' => $countryData,
                    'top_products' => $topProducts
                ]);
                break;

            case 'export_excel':
                $this->exportToExcel();
                break;

            default:
                echo json_encode(["status" => "error", "message" => "No Action Found"]);
        }
    }

    function exportToExcel() {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="social_media_report_' . date('Y-m-d') . '.xls"');

        $whereClause = "WHERE DATE(pt.created_at) BETWEEN '".$this->from_date."' AND '".$this->to_date."'";
        if (!empty($this->platform)) $whereClause .= " AND pt.platform = '".$this->platform."'";

        $query = "SELECT pd.product_name, pt.platform, pt.country, pt.created_at 
                  FROM product_platform_tracking pt 
                  LEFT JOIN product_details pd ON pt.product_id = pd.ids 
                  $whereClause 
                  ORDER BY pt.created_at DESC";

        $result = $this->varModelObj->ListFromTable($query);
        $data = json_decode($result, true);

        echo "Product Name\tPlatform\tCountry\tDate & Time\n";
        foreach ($data as $row) {
            echo str_replace(["\n", "\r", "\t"], " ", $row['product_name'] ?? '') . "\t";
            echo ($row['platform'] ?? '') . "\t";
            echo ($row['country'] ?? '') . "\t";
            echo ($row['created_at'] ?? '') . "\n";
        }
        exit;
    }
}

$obj = new SocialMediaController();
$obj->RequestAccept($obj->actionevents);
?>