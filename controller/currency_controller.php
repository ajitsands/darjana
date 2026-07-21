<?php
session_start();
require('../model/common/common_functions.php');

class CurrencyController
{
    var $varModelObj, $varDBConnection;
    public $actionevents, $country_code, $price;
    
    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        
        $this->actionevents = $_POST['action'] ?? null;
        $this->country_code = $_POST['country_code'] ?? '';
        $this->price = $_POST['price'] ?? 0;
    }

    function SQLArray() { 
        $array = array();
        $escapeCountryCode = $this->varDBConnection->real_escape_string($this->country_code);
        
        // Get all active currencies
        $array[0] = "SELECT * FROM currency_exchange WHERE is_active = 1 ORDER BY country_name";
        
        // Get specific currency by country code
        $array[1] = "SELECT * FROM currency_exchange WHERE country_code = '$escapeCountryCode' AND is_active = 1";
        
        // Get current session currency or default to Bahrain
        $currentCountryCode = isset($_SESSION['currency']['country_code']) ? 
            $_SESSION['currency']['country_code'] : 'BH';
        $array[2] = "SELECT * FROM currency_exchange WHERE country_code = '$currentCountryCode' AND is_active = 1";
        
        // Default Bahrain currency
        $array[3] = "SELECT * FROM currency_exchange WHERE country_code = 'BH' AND is_active = 1";
        
        return $array;
    }

    function RequestAccept($FunctionEvents) {
        $var = $this->SQLArray();
        
        switch ($FunctionEvents) {
            case 'get_currencies':
                $result = $this->varModelObj->ListFromJSonReturn($var[0]);
                $data = json_decode($result, true);
                
                if (isset($data['data'])) {
                    echo json_encode(['status' => 'success', 'data' => $data['data']]);
                } else {
                    echo json_encode(['status' => 'success', 'data' => []]);
                }
                break;
                
            case 'get_current_currency':
                $currency = $this->varModelObj->GetSingleRow($var[2]);
                
                if (!$currency) {
                    // Fallback to Bahrain default
                    $currency = $this->varModelObj->GetSingleRow($var[3]);
                    
                    if ($currency) {
                        $_SESSION['currency'] = $currency;
                    }
                }
                
                if ($currency) {
                    echo json_encode(['status' => 'success', 'data' => $currency]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Currency not found']);
                }
                break;
                
            case 'set_currency':
                if (empty($this->country_code)) {
                    echo json_encode(['status' => 'error', 'message' => 'Country code is required']);
                    return;
                }
                
                $currency = $this->varModelObj->GetSingleRow($var[1]);
                
                if ($currency) {
                    $_SESSION['currency'] = $currency;
                    echo json_encode(['status' => 'success', 'message' => 'Currency updated', 'data' => $currency]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Currency not found']);
                }
                break;
                
            case 'convert_price':
                // Get current currency
                $currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : null;
                
                if (!$currency) {
                    // Get default Bahrain
                    $currency = $this->varModelObj->GetSingleRow($var[3]);
                    if ($currency) {
                        $_SESSION['currency'] = $currency;
                    }
                }
                
                if ($currency) {
                    $exchangeRate = floatval($currency['exchange_rate']);
                    $convertedPrice = floatval($this->price) * $exchangeRate;
                    
                    echo json_encode([
                        'status' => 'success',
                        'original_price' => $this->price,
                        'converted_price' => number_format($convertedPrice, 2, '.', ''),
                        'currency_symbol' => $currency['currency_symbol'],
                        'exchange_rate' => $exchangeRate
                    ]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Currency not available']);
                }
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }
}

$obj = new CurrencyController();
$obj->RequestAccept($obj->actionevents);