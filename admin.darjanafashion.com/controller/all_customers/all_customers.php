<?php
session_start();
require('../../model/common/common_functions.php');

class ProductController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $formdata, $attachments, $name, $tablename, $timestamp;
   
    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->varDBConnection->set_charset("utf8mb4");

        $this->actionevents = $_POST['action'] ?? null;
        $this->from_date = $_POST['start_date'] ?? '0000-00-00';
        $this->to_date = $_POST['end_date'] ?? '0000-00-00';
    }

    function SQLArray()
    {
       $array = array();

    // Add Tailoring Unit
    $array[0] = "SELECT 
                    cd.*, 
                    c.country AS country_name 
                FROM customer_details cd
                LEFT JOIN country c ON cd.country = c.ids 
                WHERE DATE(cd.created_date) BETWEEN '$from_date' AND '$to_date'";
    $array[1] = "UPDATE customer_details SET status=? WHERE ids=?";


        

    return $array;
    }
    
    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            
           

            case 'load_customers':
                // echo $var[0];
                $data = $this->varModelObj->ListFromTable($var[0]);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                break;
            case 'change_status':
                
                $status = $_POST['status'];
                $customer_id = $_POST['customer_id'];
                echo $status;
                $this->varModelObj->AddToTabless(
                    $var[1],
                    [$status, $customer_id],
                    "si"
                );
            
                echo json_encode([
                    "status"=>"success"
                ]);
                break;
            
            default:
                echo "No Action Found In The Controller...!";
                break;
        }
    }
}

$obj = new ProductController();
$obj->RequestAccept($obj->actionevents);
?>