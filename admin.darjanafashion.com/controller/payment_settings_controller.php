<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../model/common/common_functions.php');

class PaymentSettingsController
{
    var $varModelObj, $varDBConnection;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
    }

    public function getSettings()
    {
        // Auto-create table if missing
        if ($this->varDBConnection) {
            $this->varDBConnection->query("CREATE TABLE IF NOT EXISTS `payment_settings` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `gateway_name` varchar(50) NOT NULL DEFAULT 'AFS Payment Gateway (OPPWA)',
              `base_url` varchar(255) NOT NULL DEFAULT 'https://test.oppwa.com',
              `entity_id` varchar(100) NOT NULL DEFAULT '8ac7a4c797662439019773da2ea107eb',
              `access_token` text NOT NULL,
              `currency` varchar(10) NOT NULL DEFAULT 'BHD',
              `username` varchar(100) NULL,
              `password` varchar(255) NULL,
              `is_active` tinyint(1) NOT NULL DEFAULT 1,
              `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

            // Ensure missing columns exist
            $cols = ['entity_id' => "VARCHAR(100) NOT NULL DEFAULT '8ac7a4c797662439019773da2ea107eb'", 
                     'access_token' => "TEXT NULL", 
                     'currency' => "VARCHAR(10) NOT NULL DEFAULT 'BHD'"];
            foreach ($cols as $col => $def) {
                $cCheck = $this->varDBConnection->query("SHOW COLUMNS FROM `payment_settings` LIKE '$col'");
                if ($cCheck && $cCheck->num_rows == 0) {
                    $this->varDBConnection->query("ALTER TABLE `payment_settings` ADD COLUMN `$col` $def");
                }
            }

            $sql = "SELECT * FROM payment_settings WHERE id = 1 LIMIT 1";
            $result = $this->varDBConnection->query($sql);
            if ($result && $row = $result->fetch_assoc()) {
                return $row;
            }
        }

        return [
            'gateway_name' => 'AFS Payment Gateway (OPPWA)',
            'base_url'     => 'https://test.oppwa.com',
            'entity_id'    => '8ac7a4c797662439019773da2ea107eb',
            'access_token' => 'OGFjN2E0Yzc5NzY2MjQzOTAxOTc3M2Q5M2MwZjA3ZTd8TXBOeEdUQVU5cE1zI1Vob3VOZUU=',
            'currency'     => 'BHD',
            'is_active'    => 1
        ];
    }

    public function updateSettings()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_payment_settings') {
            $gateway_name = $this->varDBConnection->real_escape_string($_POST['gateway_name'] ?? 'AFS Payment Gateway (OPPWA)');
            $base_url     = $this->varDBConnection->real_escape_string(rtrim($_POST['base_url'] ?? 'https://test.oppwa.com', '/'));
            $entity_id    = $this->varDBConnection->real_escape_string($_POST['entity_id'] ?? '');
            $access_token = $this->varDBConnection->real_escape_string($_POST['access_token'] ?? '');
            $currency     = $this->varDBConnection->real_escape_string($_POST['currency'] ?? 'BHD');
            $is_active    = isset($_POST['is_active']) ? 1 : 0;

            // Ensure table exists
            $this->getSettings();

            $sql = "INSERT INTO payment_settings (id, gateway_name, base_url, entity_id, access_token, currency, is_active) 
                    VALUES (1, '$gateway_name', '$base_url', '$entity_id', '$access_token', '$currency', $is_active)
                    ON DUPLICATE KEY UPDATE 
                        gateway_name = '$gateway_name',
                        base_url = '$base_url',
                        entity_id = '$entity_id',
                        access_token = '$access_token',
                        currency = '$currency',
                        is_active = $is_active";

            $res = $this->varDBConnection->query($sql);
            if ($res) {
                echo json_encode(['status' => 'success', 'message' => 'Payment Gateway Settings updated successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update payment settings: ' . $this->varDBConnection->error]);
            }
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_payment_settings') {
    $controller = new PaymentSettingsController();
    $controller->updateSettings();
}
?>
