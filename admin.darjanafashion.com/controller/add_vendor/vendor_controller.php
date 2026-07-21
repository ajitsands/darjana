<?php
session_start();
require ('../../model/common/common_functions.php');

class VendorController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $filenames, $attachments, $name, $tablename, $timestamp;
    public $tax_percentage;
    public $cod_fee;
    public $tax_type;
    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        $this->filenames = $_POST['kyc_filename'] ?? '';
        $this->attachments = $_FILES['kyc_file'] ?? null;
        $this->formdata = $_POST['data'] ?? null;
        $this->tablename = $_POST['t_name'] ?? null;

        $this->vendor_id = $_POST['vendor_id'] ?? null;
        $this->first_name = $_POST['first_name'] ?? null;
        $this->second_name = $_POST['second_name'] ?? null;
        $this->gmail_id = $_POST['gmail_id'] ?? null;
        $this->username = $_POST['username'] ?? null;
        $this->password = $_POST['password'] ?? null;
        $this->business_type = $_POST['business_type'] ?? null;
        $this->address = $_POST['address'] ?? null;
        $this->street = $_POST['street'] ?? null;
        $this->district = $_POST['district'] ?? null;
        $this->state = $_POST['state'] ?? null;
        $this->country = $_POST['country'] ?? null;
        $this->pickup_pincode = $_POST['pickup_pincode'] ?? null;
        $this->landmark = $_POST['landmark'] ?? null;
        $this->kyc = $_POST['kyc_filename'] ?? null;
        $this->tax_percentage = $_POST['tax_percentage'] ?? null;
        $this->cod_fee = $_POST['cod_fee'] ?? null;
        $this->tax_type = $_POST['tax_type'] ?? null;
        $this->vendor_contact_number = $_POST['vendor_contact_number'] ?? null;
        $this->vendor_business_number = $_POST['vendor_business_number'] ?? null;
        


        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array = array();

        $array['update_vendor'] = "UPDATE vendor_details SET
            first_name = '{$this->first_name}',
            second_name = '{$this->second_name}',
            gmail_id = '{$this->gmail_id}',
            username = '{$this->username}',
            password = '{$this->password}',
            business_type = '{$this->business_type}',
            address = '{$this->address}',
            street = '{$this->street}',
            district = '{$this->district}',
            state = '{$this->state}',
            country = '{$this->country}',
            pickup_pincode = '{$this->pickup_pincode}',
            landmark = '{$this->landmark}',
            tax_percentage = '{$this->tax_percentage}',
            tax_type = '{$this->tax_type}',
            cod_fee = '{$this->cod_fee}',
            created_date = '{$this->timestamp}',
            vendor_whatsapp = '{$this->vendor_contact_number}',
            chat_whatsapp = '{$this->vendor_business_number}'
        WHERE ids = '{$this->vendor_id}'";
        
        $array['update_vendor_with_kyc'] = "UPDATE vendor_details SET
            first_name = '{$this->first_name}',
            second_name = '{$this->second_name}',
            gmail_id = '{$this->gmail_id}',
            username = '{$this->username}',
            password = '{$this->password}',
            business_type = '{$this->business_type}',
            address = '{$this->address}',
            street = '{$this->street}',
            district = '{$this->district}',
            state = '{$this->state}',
            country = '{$this->country}',
            pickup_pincode = '{$this->pickup_pincode}',
            landmark = '{$this->landmark}',
            tax_percentage = '{$this->tax_percentage}',
            tax_type = '{$this->tax_type}',
            cod_fee = '{$this->cod_fee}',
            kyc = '{$this->kyc}',
            created_date = '{$this->timestamp}',
            vendor_whatsapp = '{$this->vendor_contact_number}',
            chat_whatsapp = '{$this->vendor_business_number}'
        WHERE ids = '{$this->vendor_id}'";
        
        $array['get_vendor'] = "SELECT first_name, second_name, gmail_id, username, password, business_type, 
                        address, street, district, state, country, pickup_pincode, landmark, 
                        tax_percentage, tax_type, cod_fee, kyc ,vendor_whatsapp,chat_whatsapp
                        FROM vendor_details WHERE ids = '{$this->vendor_id}'";

        $array['get_countries'] = "SELECT country FROM country ORDER BY country";
        
        $array['get_states'] = "SELECT state_name FROM state WHERE country_id = (SELECT ids FROM country WHERE country = '{$this->varModelObj->varDBConnection->real_escape_string($_POST['country'])}') ORDER BY state_name";
        
        $array['get_districts'] = "SELECT district_name FROM district WHERE stateid = (SELECT ids FROM state WHERE state_name = '{$this->varModelObj->varDBConnection->real_escape_string($_POST['state'])}') ORDER BY district_name";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();
    
        switch ($FunctionEvents)
        {
            case 'update_vendor_details':
                $response = ['success' => false, 'message' => 'Failed to update vendor details.'];
                
                // Retrieve existing KYC files for this vendor_id
                $existingData = $this->varModelObj->ListFromTable($var['get_vendor']);
                $existingDataDecoded = json_decode($existingData, true);
                $existingKycFiles = !empty($existingDataDecoded[0]['kyc']) ? explode(',', $existingDataDecoded[0]['kyc']) : [];
                $kycFilenames = $existingKycFiles; // Start with existing filenames
                // echo $kycFilenames;
                // Handle new KYC file uploads
                if (!empty($_FILES['kyc_file']['name'][0]) && !empty($_POST['kyc_filename'])) {
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/kyc/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    
                    $newKycFilenames = explode(',', $_POST['kyc_filename']);
                    $files = $_FILES['kyc_file'];
                    $fileCount = count($files['name']);
                    $allowedTypes = ['pdf', 'jpg', 'jpeg', 'png'];
                    
                    if (count($newKycFilenames) !== $fileCount) {
                        $response['message'] = 'Mismatch between provided filenames and uploaded files.';
                        echo json_encode($response);
                        return;
                    }
                    
                    for ($i = 0; $i < $fileCount; $i++) {
                        if ($files['error'][$i] === UPLOAD_ERR_OK) {
                            $fileExt = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                            if (!in_array(strtolower($fileExt), $allowedTypes)) {
                                $response['message'] = 'Invalid file type for ' . $files['name'][$i] . '. Only PDF, JPG, JPEG, PNG are allowed.';
                                echo json_encode($response);
                                return;
                            }
                            
                            $newFilename = $newKycFilenames[$i];
                            $uploadPath = $uploadDir . $newFilename;
                            
                            if (move_uploaded_file($files['tmp_name'][$i], $uploadPath)) {
                                $kycFilenames[] = $newFilename; // Append new filename
                            } else {
                                $response['message'] = 'Failed to upload KYC document: ' . $files['name'][$i];
                                echo json_encode($response);
                                return;
                            }
                        } else {
                            $response['message'] = 'Error uploading file: ' . $files['name'][$i];
                            echo json_encode($response);
                            return;
                        }
                    }
                    
                    // Combine existing and new filenames
                    $this->kyc = implode(',', array_filter($kycFilenames));
                    $response['kyc_filename'] = $this->kyc;
                    
                    // Update with kyc
                    $affectedRows = $this->varModelObj->UpdateTable($var['update_vendor_with_kyc']);
                } else {
                    // No new files, preserve existing kyc filenames
                    $this->kyc = implode(',', array_filter($existingKycFiles));
                    $affectedRows = $this->varModelObj->UpdateTable($var['update_vendor_with_kyc']);
                }
                
                if ($affectedRows > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Vendor details updated successfully.';
                } else {
                    $response['message'] = 'No changes were made to vendor details.';
                }
                
                echo json_encode($response);
                break;
    
            case 'get_vendor_details':
                $data = $this->varModelObj->ListFromTable($var['get_vendor']);
                $decodedData = json_decode($data, true);
                $kycFiles = !empty($decodedData[0]['kyc']) ? explode(',', $decodedData[0]['kyc']) : [];
                echo json_encode([
                    'success' => true, 
                    'data' => $decodedData[0] ?? null,
                    'kyc_filename' => $kycFiles
                ]);
                break;

            case 'get_countries':
                $data = $this->varModelObj->ListFromTable($var['get_countries']);
                echo $data;
                break;

            case 'get_states':
                $data = $this->varModelObj->ListFromTable($var['get_states']);
                echo $data;
                break;

            case 'get_districts':
                $data = $this->varModelObj->ListFromTable($var['get_districts']);
                echo $data;
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'No Action Found in the Controller']);
                break;
        }
    }
}

$obj = new VendorController();
$obj->RequestAccept($obj->actionevents);
?>