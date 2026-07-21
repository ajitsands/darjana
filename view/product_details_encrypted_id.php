<?php 

require_once('model/common/en_de_class.php');
require_once('model/common/common_functions.php');

header('Content-Type: application/json');

$key = 'S@nds1@b@Trichur1nf0p@rk123!456';

$id = $_GET['id'] ?? null;

$productId = null;
$platform = null;
$param = null;

if (!empty($id)) {
    try {
        $encryption = new UrlEncryption($key);

        $decrypted = $encryption->decrypt($id);

        parse_str($decrypted, $output);

        $param = $output['key'] ?? null;
        $productId = $output['id'] ?? null;
        $platform = $output['platform'] ?? null;

    } catch (Exception $e) {
        $productId = $id;
    }
}

// Track visit
if ($productId && $platform) {
    trackProductVisit($productId, $platform);
}

echo json_encode([
    'param' => $param,
    'productId' => $productId,
    'platform' => $platform
]);

/**
 * Get country from IP
 */
function getCountryFromIP($ip) {
    try {
        $url = "http://ip-api.com/json/" . $ip;

        $response = file_get_contents($url);
        if ($response === FALSE) {
            return null;
        }

        $data = json_decode($response, true);

        return $data['country'] ?? null;

    } catch (Exception $e) {
        error_log("IP lookup error: " . $e->getMessage());
        return null;
    }
}

/**
 * Track product visit
 */
function trackProductVisit($productId, $platform) {
    try {
        $commonModel = new CommonModel();
        $db = $commonModel->varDBConnection;
        
        $ip = $_SERVER['REMOTE_ADDR'] ?? null;
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;

        // ✅ Get country
        $country = getCountryFromIP($ip);

        // ✅ Insert with country
        $sql = "INSERT INTO product_platform_tracking 
                (product_id, platform, ip, user_agent, country, created_at) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        
        $stmt = $db->prepare($sql);
        $stmt->bind_param("issss", $productId, $platform, $ip, $userAgent, $country);
        $stmt->execute();
        $stmt->close();

    } catch (Exception $e) {
        error_log("Product tracking error: " . $e->getMessage());
    }
}
?>