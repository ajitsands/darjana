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
        
        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
       $array = array();

    // Add Tailoring Unit
    $array[0] = "INSERT INTO tailoring_units 
                (unit_name, contact_person, phone, email, address, created_date)
                VALUES (?, ?, ?, ?, ?, ?)";

    // List Tailoring Units
    $array[1] = "SELECT ids, unit_name, contact_person, phone, email, address,status
                 FROM tailoring_units
                  
                 ORDER BY ids DESC";
    $array[2] = "UPDATE tailoring_units 
             SET unit_name=?, contact_person=?, phone=?, email=?, address=? 
             WHERE ids=?";  
    $array[3] = "UPDATE tailoring_units SET status=? WHERE ids=?";         

    return $array;
    }
    
    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            
            case 'add_tailoring_unit':

                    $unit_name = $_POST['unit_name'] ?? '';
                    $contact_person = $_POST['contact_person'] ?? '';
                    $phone = $_POST['phone'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $address = $_POST['address'] ?? '';
                    
                
                    $response = $this->varModelObj->AddToTabless(
                        $var[0],
                        [   $unit_name,
                            $contact_person,
                            $phone,
                            $email,
                            $address,
                            $this->timestamp
                        ],
                        "ssssss"
                    );
                  
                    if ($response) {
                        echo json_encode([
                            "status" => "success",
                            "message" => "Tailoring Unit Added Successfully"
                        ]);
                    } else {
                        echo json_encode([
                            "status" => "error",
                            "message" => "Failed to add unit"
                        ]);
                    }
                
            break;

            case 'list_tailoring_detailes':
                $data = $this->varModelObj->ListFromTable($var[1]);
                $decodedData = json_decode($data, true);
                echo json_encode(["data" => $decodedData]);
                break;

            case 'update_unit':

                $response = $this->varModelObj->AddToTabless(
                    $var[2],
                    [
                        $_POST['unit_name'],
                        $_POST['contact_person'],
                        $_POST['phone'],
                        $_POST['email'],
                        $_POST['address'],
                        $_POST['unit_id']
                    ],
                    "sssssi"
                );
            
                echo json_encode([
                    "status" => "success",
                    "message" => "Unit Updated Successfully"
                ]);
            
            break;    
            case 'change_status':

                $status = $_POST['status'];
                $unit_id = $_POST['unit_id'];
            
                $this->varModelObj->AddToTabless(
                    $var[3],
                    [$status, $unit_id],
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