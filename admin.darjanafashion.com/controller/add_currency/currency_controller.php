<?php
session_start();
require('../../model/common/common_functions.php');

class CurrencyController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $formdata, $attachments, $name, $tablename, $timestamp;
    public $filenames = [];
    public $userId, $vendorId,$country_code,$country_name,$currency_code,$currency_symbol,$exchange_rate,$flag_icon,$currency_ids,$new_status;
   

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        $this->filenames = $_POST['filenames'] ?? [];
        $this->attachments = $_FILES['attachments'] ?? null;
        $this->formdata = $_POST['data'] ?? null;
        $this->tablename = $_POST['t_name'] ?? null;

        $this->userId = $_POST['user_id'] ?? null;
        $this->vendorId = $_POST['vendor_id'] ?? null;
        
        $this->country_code = $_POST['country_code'] ?? null;    
        $this->country_name = $_POST['country_name'] ?? null;
        $this->currency_code = $_POST['currency_code'] ?? null;
        $this->currency_symbol = $_POST['currency_symbol'] ?? null;
        $this->exchange_rate = $_POST['exchange_rate'] ?? null;
        $this->currency_ids = $_POST['currency_ids'] ?? null;
        
        $this->new_status=$_POST['new_status'] ?? null;
        
        $this->flag_icon = isset($_POST['flag_icon'])
    ? mysqli_real_escape_string($this->varDBConnection, trim($_POST['flag_icon']))
    : '';

       
        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array = array();

       $array[0] = "INSERT INTO `currency_exchange`(`country_code`, `country_name`, `currency_code`, `currency_symbol`, `exchange_rate`, `flag_emoji`) VALUES ('".$this->country_code."','".$this->country_name."','".$this->currency_code."','".$this->currency_symbol."','".$this->exchange_rate."','".$this->flag_icon."')";
        $array[1] = "SELECT * FROM currency_exchange  ORDER BY id DESC";
        $array[2] = "UPDATE currency_exchange SET is_active ='" . $this->new_status . "'  WHERE id ='" . $this->currency_ids . "' ";
        $array[3] = "DELETE FROM currency_exchange WHERE id ='" . $this->currency_ids . "' ";
        $array[4]=  "UPDATE currency_exchange SET country_code='". $this->country_code."',`country_name`='". $this->country_name."',`currency_code`='". $this->currency_code."',`currency_symbol`='". $this->currency_symbol."',`exchange_rate`='". $this->exchange_rate."',`flag_emoji`='". $this->flag_icon."' where id='". $this->currency_ids."'";
    
       
        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'add_currency_details':
              
               $insert=$this->varModelObj->AddToTable($var[0]);
               echo $insert;
            break;

            case 'list_currency_detailes':
               
                $data = $this->varModelObj->ListFromTable($var[1]);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
            break;    
            
            case 'update_currency_status':
                // echo $var[2];
                 $this->effected_rows = $this->varModelObj->UpdateTable($var[2]);
                echo $this->effected_rows;
            break;
            
            case 'delete_currency':
                
                $deleteProduct = $this->varModelObj->DeleteRow($var[3]);
                echo $deleteProduct;
            break; 
            
            case 'update_currency_details':
                
                $updateProduct = $this->varModelObj->UpdateTable($var[4]);
                echo $updateProduct;
                
            break; 
            
            default:
                echo "No Action Found In The Controller...!";
                break;
        }
    }
}

$obj = new CurrencyController();
$obj->RequestAccept($obj->actionevents);
?>