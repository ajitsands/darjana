<?php
session_start();
require('../../model/common/common_functions.php');

class RegisterController
{
    private $varModelObj, $varDBConnection;
    public $first_name, $last_name, $gmail_id, $username, $v_password, $role;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->first_name = $_POST['first_name'] ?? null;
        $this->last_name = $_POST['last_name'] ?? null;
        $this->gmail_id = $_POST['gmail_id'] ?? null;
        $this->username = $_POST['username'] ?? null;
        $this->v_password = $_POST['password'] ?? null;
        $this->role = $_POST['role'] ?? null;
    }

    function registerUser()
    {
        $check_query = "SELECT * FROM vendor_details WHERE username = '$this->username' OR gmail_id = '$this->gmail_id'";
        $check_result = $this->varDBConnection->query($check_query);

        if ($check_result && $check_result->num_rows > 0) {
            echo 'Username or Gmail ID already exists';
            return;
        }

        // Insert into database
        $insert_query = "INSERT INTO vendor_details (
            first_name, 
            second_name, 
            gmail_id, 
            username, 
            password, 
            role
        ) VALUES (
            '$this->first_name',
            '$this->last_name',
            '$this->gmail_id',
            '$this->username',
            '$this->v_password',
            '$this->role'
        )";

        try {
            $result = $this->varModelObj->AddToTable($insert_query);
            echo ($result > 0) ? "true" : "false";
        } catch (Exception $e) {
            error_log("Registration Error: " . $e->getMessage());
            echo "false";
        }
    }
}

$obj = new RegisterController();
$obj->registerUser();
