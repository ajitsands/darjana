<?php
session_start();
require('../model/common/common_functions.php');

class CountsController
{
    var $varModelObj, $varDBConnection;
    public $actionevents, $customerId;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
        $this->customerId = $_SESSION["ids"] ?? 0;
    }

    function SQLArray()
    {
        $array = array();
        $array[0] = "SELECT COUNT(*) as count FROM cart_products WHERE customer_id = $this->customerId";
        $array[1] = "SELECT COUNT(*) as count FROM wishlist_products WHERE customer_id = $this->customerId";
        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'get_counts':
                try {
                    $cartCount = 0;
                    $wishlistCount = 0;

                    if ($this->customerId > 0) {
                        // Get cart count
                        $result1 = $this->varDBConnection->query($var[0]);
                        if ($result1 && $row1 = $result1->fetch_assoc()) {
                            $cartCount = $row1['count'] ?? 0;
                        }

                        // Get wishlist count
                        $result2 = $this->varDBConnection->query($var[1]);
                        if ($result2 && $row2 = $result2->fetch_assoc()) {
                            $wishlistCount = $row2['count'] ?? 0;
                        }
                    }

                    echo json_encode([
                        'status' => 'success',
                        'cart_count' => $cartCount,
                        'wishlist_count' => $wishlistCount
                    ]);
                } catch (Exception $e) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => $e->getMessage()
                    ]);
                }
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found']);
                break;
        }
    }
}

$obj = new CountsController();
$obj->RequestAccept($obj->actionevents);
