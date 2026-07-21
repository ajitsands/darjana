<?php
session_start();
header('Content-Type: application/json');

try {
    // Clear remember me tokens from database if user was logged in
    if (isset($_SESSION["ids"])) {
        require ('../model/common/common_functions.php');
        $model = new CommonModel();
        $user_id = $_SESSION["ids"];
        $sql = "UPDATE customer_details SET remember_token = NULL, token_expiry = NULL WHERE ids = '$user_id'";
        $model->UpdateTable($sql);
    }
    
    // Clear session
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Clear remember me cookies
    setcookie('remember_token', '', time() - 3600, '/');
    setcookie('remember_user', '', time() - 3600, '/');
    
    session_destroy();
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully'
    ]);
   
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error during logout: ' . $e->getMessage()
    ]);
}
?>