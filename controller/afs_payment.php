<?php
/**
 * AFS Payment Gateway Helper Class (Invoicing API)
 */

if (!defined('AFS_API_DOMAIN')) {
    define('AFS_API_DOMAIN', 'https://the_system_domain'); // Replace with your actual AFS system domain URL
}
if (!defined('AFS_USERNAME')) {
    define('AFS_USERNAME', 'api_user'); // Replace with your AFS Username
}
if (!defined('AFS_PASSWORD')) {
    define('AFS_PASSWORD', 'zWeCYbo238Mc'); // Replace with your AFS Password
}

class AFSPaymentGateway
{
    private $apiDomain;
    private $username;
    private $password;

    public function __construct($apiDomain = null, $username = null, $password = null)
    {
        $this->apiDomain = rtrim($apiDomain ?? AFS_API_DOMAIN, '/');
        $this->username  = $username ?? AFS_USERNAME;
        $this->password  = $password ?? AFS_PASSWORD;
    }

    /**
     * Login to AFS API and obtain JWT Token
     */
    public function getAuthToken()
    {
        $url = $this->apiDomain . '/api/login';
        $payload = json_encode([
            'username' => $this->username,
            'password' => $this->password
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return ['error' => $error];
        }

        $data = json_decode($response, true);
        $token = $data['data']['token'] ?? $data['access_token'] ?? null;

        return $token ? ['token' => $token] : ['error' => 'Authentication failed', 'raw' => $response];
    }

    /**
     * Create Invoice & Generate Payment Link
     */
    public function createInvoice($token, $invoiceData)
    {
        $url = $this->apiDomain . '/api/admin/invoice';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($invoiceData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return ['result' => 'error', 'message' => $error];
        }

        return json_decode($response, true) ?? ['result' => 'error', 'raw' => $response];
    }
}
?>
