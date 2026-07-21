<?php
session_start();
require ('../../model/common/common_functions.php');

class PromoCodeController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $ids, $promo_code, $offer_percentage, $minimum_order_amount;
    public $start_date, $expire_date, $use_count, $max_uses, $status, $created_by;
    public $timestamp;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        
        $this->ids = $_POST['ids'] ?? null;
        $this->promo_code = $_POST['promo_code'] ?? null;
        $this->offer_percentage = $_POST['offer_percentage'] ?? null;
        $this->minimum_order_amount = $_POST['minimum_order_amount'] ?? 0;
        $this->start_date = $_POST['start_date'] ?? null;
        $this->expire_date = $_POST['expire_date'] ?? null;
        $this->use_count = $_POST['use_count'] ?? 0;
        $this->max_uses = $_POST['max_uses'] ?? null;
        $this->status = $_POST['status'] ?? 1;
        $this->created_by = $_SESSION['vendor_id'] ?? $_SESSION['admin_id'] ?? 1;

        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array = array();

        $array['insert_promo'] = "INSERT INTO promo_codes SET
            promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}',
            offer_percentage = '{$this->offer_percentage}',
            minimum_order_amount = '{$this->minimum_order_amount}',
            start_date = '{$this->start_date}',
            expire_date = '{$this->expire_date}',
            use_count = '{$this->use_count}',
            max_uses = " . ($this->max_uses ? "'{$this->max_uses}'" : "NULL") . ",
            status = '{$this->status}',
            created_by = '{$this->created_by}',
            created_date = '{$this->timestamp}'";


        $array['update_promo'] = "UPDATE promo_codes SET
            promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}',
            offer_percentage = '{$this->offer_percentage}',
            minimum_order_amount = '{$this->minimum_order_amount}',
            start_date = '{$this->start_date}',
            expire_date = '{$this->expire_date}',
            max_uses = " . ($this->max_uses ? "'{$this->max_uses}'" : "NULL") . ",
            status = '{$this->status}'
            WHERE ids = '{$this->ids}'";

        $array['update_use_count'] = "UPDATE promo_codes SET
            use_count = use_count + 1
            WHERE ids = '{$this->ids}'";

        $array['delete_promo'] = "DELETE FROM promo_codes WHERE ids = '{$this->ids}'";

        $array['get_all_promos'] = "SELECT * FROM promo_codes ORDER BY ids DESC";

        $array['get_promo_by_id'] = "SELECT * FROM promo_codes WHERE ids = '{$this->ids}'";

        $array['get_promo_by_code'] = "SELECT * FROM promo_codes 
            WHERE promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}' 
            AND status = 1 
            AND start_date <= CURDATE() 
            AND expire_date >= CURDATE()";

        $array['check_code_exists'] = "SELECT ids FROM promo_codes 
            WHERE promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}' 
            AND ids != '{$this->ids}'";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();
    
        switch ($FunctionEvents)
        {
            case 'add_promo_code':
                $response = ['success' => false, 'message' => 'Failed to add promo code.'];
                
                // Check if promo code already exists
                $checkQuery = "SELECT ids FROM promo_codes WHERE promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}'";
                $existing = $this->varModelObj->ListFromTable($checkQuery);
                $existingData = json_decode($existing, true);
                
                if (!empty($existingData)) {
                    $response['message'] = 'Promo code already exists. Please use a different code.';
                    echo json_encode($response);
                    return;
                }
                // echo $var['insert_promo'];
                $inserted = $this->varModelObj->AddToTable($var['insert_promo']);
                
                if ($inserted > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Promo code added successfully.';
                    $response['inserted_id'] = $inserted;
                } else {
                    $response['message'] = 'Failed to add promo code.';
                }
                
                echo json_encode($response);
                break;
                
            case 'update_promo_code':
                $response = ['success' => false, 'message' => 'Failed to update promo code.'];
                
                // Check if promo code already exists for other records
                $checkQuery = "SELECT ids FROM promo_codes 
                    WHERE promo_code = '{$this->varModelObj->varDBConnection->real_escape_string($this->promo_code)}' 
                    AND ids != '{$this->ids}'";
                $existing = $this->varModelObj->ListFromTable($checkQuery);
                $existingData = json_decode($existing, true);
                
                if (!empty($existingData)) {
                    $response['message'] = 'Promo code already exists. Please use a different code.';
                    echo json_encode($response);
                    return;
                }
                
                $affectedRows = $this->varModelObj->UpdateTable($var['update_promo']);
                
                if ($affectedRows > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Promo code updated successfully.';
                } else {
                    $response['message'] = 'No changes were made to promo code.';
                }
                
                echo json_encode($response);
                break;
                
            case 'delete_promo_code':
                $response = ['success' => false, 'message' => 'Failed to delete promo code.'];
                
                $affectedRows = $this->varModelObj->DeleteRow($var['delete_promo']);
                
                if ($affectedRows > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Promo code deleted successfully.';
                } else {
                    $response['message'] = 'Failed to delete promo code.';
                }
                
                echo json_encode($response);
                break;
                
            case 'get_all_promos':
                $data = $this->varModelObj->ListFromTable($var['get_all_promos']);
                echo $data;
                break;
                
            case 'get_promo_by_id':
                $data = $this->varModelObj->ListFromTable($var['get_promo_by_id']);
                $decodedData = json_decode($data, true);
                echo json_encode([
                    'success' => true,
                    'data' => $decodedData[0] ?? null
                ]);
                break;
                
            case 'validate_promo_code':
                $response = ['success' => false, 'message' => 'Invalid promo code.'];
                
                $data = $this->varModelObj->ListFromTable($var['get_promo_by_code']);
                $promoData = json_decode($data, true);
                
                if (!empty($promoData)) {
                    $promo = $promoData[0];
                    $currentDate = date('Y-m-d');
                    
                    if ($promo['expire_date'] < $currentDate) {
                        $response['message'] = 'Promo code has expired.';
                    } elseif ($promo['max_uses'] !== null && $promo['use_count'] >= $promo['max_uses']) {
                        $response['message'] = 'Promo code usage limit exceeded.';
                    } elseif ($promo['status'] != 1) {
                        $response['message'] = 'Promo code is not active.';
                        $response['success'] = true;
                        $response['message'] = 'Valid promo code.';
                        $response['data'] = $promo;
                    }
                }
                
                echo json_encode($response);
                break;
                
            case 'increment_use_count':
                $response = ['success' => false, 'message' => 'Failed to update use count.'];
                
                $affectedRows = $this->varModelObj->UpdateTable($var['update_use_count']);
                
                if ($affectedRows > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Use count updated successfully.';
                }
                
                echo json_encode($response);
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'No Action Found in the Controller']);
                break;
        }
    }
}

$obj = new PromoCodeController();
$obj->RequestAccept($obj->actionevents);
?>