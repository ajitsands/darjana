<?php
/**
 * AFS Payment Gateway Helper Class (OPPWA Copy & Pay Integration)
 * Documentation: https://afs.docs.oppwa.com/
 */

if (!defined('AFS_OPPWA_BASE_URL')) {
    define('AFS_OPPWA_BASE_URL', 'https://test.oppwa.com');
}
if (!defined('AFS_OPPWA_ENTITY_ID')) {
    define('AFS_OPPWA_ENTITY_ID', '8ac7a4c797662439019773da2ea107eb');
}
if (!defined('AFS_OPPWA_ACCESS_TOKEN')) {
    define('AFS_OPPWA_ACCESS_TOKEN', 'OGFjN2E0Yzc5NzY2MjQzOTAxOTc3M2Q5M2MwZjA3ZTd8TXBOeEdUQVU5cE1zI1Vob3VOZUU=');
}
if (!defined('AFS_OPPWA_CURRENCY')) {
    define('AFS_OPPWA_CURRENCY', 'BHD');
}

class AFSPaymentGateway
{
    private $baseUrl;
    private $entityId;
    private $accessToken;
    private $currency;
    private $isActive;

    public function __construct($baseUrl = null, $entityId = null, $accessToken = null, $dbConnection = null)
    {
        $this->baseUrl     = rtrim($baseUrl ?? AFS_OPPWA_BASE_URL, '/');
        $this->entityId    = $entityId ?? AFS_OPPWA_ENTITY_ID;
        $this->accessToken = $accessToken ?? AFS_OPPWA_ACCESS_TOKEN;
        $this->currency    = AFS_OPPWA_CURRENCY;
        $this->isActive    = true;

        // Automatically fetch active credentials from payment_settings DB table if available
        if ($dbConnection) {
            $res = $dbConnection->query("SELECT * FROM payment_settings WHERE is_active = 1 LIMIT 1");
            if ($res && $row = $res->fetch_assoc()) {
                if (!empty($row['base_url']))     $this->baseUrl     = rtrim($row['base_url'], '/');
                if (!empty($row['entity_id']))    $this->entityId    = trim($row['entity_id']);
                if (!empty($row['access_token'])) $this->accessToken = trim($row['access_token']);
                if (!empty($row['currency']))     $this->currency    = trim($row['currency']);
                $this->isActive = ($row['is_active'] == 1);
            }
        }
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getEntityId()
    {
        return $this->entityId;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * Create Checkout Session for OPPWA Copy & Pay Widget
     * POST /v1/checkouts
     */
    public function createCheckoutSession($orderData)
    {
        $url = $this->baseUrl . '/v1/checkouts';

        $amount = number_format((float)($orderData['amount'] ?? 0), 2, '.', '');
        $currency = $orderData['currency'] ?? $this->currency;

        $postData = [
            'entityId'               => $this->entityId,
            'amount'                 => $amount,
            'currency'               => $currency,
            'paymentType'            => 'DB',
            'merchantTransactionId'  => (string)$orderData['order_id']
        ];

        if (!empty($orderData['customer_email'])) {
            $postData['customer.email'] = $orderData['customer_email'];
        }
        if (!empty($orderData['customer_name'])) {
            $parts = explode(' ', trim($orderData['customer_name']), 2);
            $postData['customer.givenName'] = $parts[0];
            if (!empty($parts[1])) {
                $postData['customer.surname'] = $parts[1];
            }
        }

        $postFields = http_build_query($postData);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken,
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return ['error' => $error];
        }

        $data = json_decode($response, true);
        if (isset($data['id'])) {
            return [
                'result'      => 'SUCCESS',
                'checkout_id' => $data['id'],
                'data'        => $data
            ];
        }

        return [
            'error'   => $data['result']['description'] ?? 'Checkout session creation failed',
            'raw'     => $response,
            'data'    => $data
        ];
    }

    /**
     * Query payment result / status from OPPWA
     * GET /v1/checkouts/{id}/payment?entityId=...
     */
    public function getPaymentStatus($resourcePath)
    {
        // Ensure path starts with /
        if (strpos($resourcePath, '/') !== 0) {
            $resourcePath = '/' . $resourcePath;
        }

        $url = $this->baseUrl . $resourcePath;
        if (strpos($url, 'entityId=') === false) {
            $separator = (strpos($url, '?') !== false) ? '&' : '?';
            $url .= $separator . 'entityId=' . urlencode($this->entityId);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return ['is_success' => false, 'error' => $error];
        }

        $data = json_decode($response, true);
        $resultCode = $data['result']['code'] ?? '';

        // OPPWA result codes matching successful transaction patterns:
        // /^(000\.000\.|000\.100\.1|000\.[36])/
        $isSuccess = (bool)preg_match('/^(000\.000\.|000\.100\.1|000\.[36])/', $resultCode);

        return [
            'is_success'  => $isSuccess,
            'result_code' => $resultCode,
            'description' => $data['result']['description'] ?? '',
            'data'        => $data,
            'raw'         => $response
        ];
    }
}
?>
