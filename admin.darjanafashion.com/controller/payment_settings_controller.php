<?php
session_start();
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
        $sql = "SELECT * FROM payment_settings WHERE id = 1 LIMIT 1";
        $result = $this->varDBConnection->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            return $row;
        }
        return [
            'gateway_name' => 'AFS Invoicing Gateway',
            'base_url' => 'https://the_system_domain',
            'username' => 'api_user',
            'password' => 'zWeCYbo238Mc',
            'is_active' => 1
        ];
    }

    public function updateSettings()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_payment_settings') {
            $gateway_name = $this->varDBConnection->real_escape_string($_POST['gateway_name'] ?? 'AFS Invoicing Gateway');
            $base_url     = $this->varDBConnection->real_escape_string(rtrim($_POST['base_url'] ?? '', '/'));
            $username     = $this->varDBConnection->real_escape_string($_POST['username'] ?? '');
            $password     = $this->varDBConnection->real_escape_string($_POST['password'] ?? '');
            $is_active    = isset($_POST['is_active']) ? 1 : 0;

            $sql = "INSERT INTO payment_settings (id, gateway_name, base_url, username, password, is_active) 
                    VALUES (1, '$gateway_name', '$base_url', '$username', '$password', $is_active)
                    ON DUPLICATE KEY UPDATE 
                        gateway_name = '$gateway_name',
                        base_url = '$base_url',
                        username = '$username',
                        password = '$password',
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

$controller = new PaymentSettingsController();
$controller->updateSettings();
?>
