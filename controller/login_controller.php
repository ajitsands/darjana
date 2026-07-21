<?php
 // require ('../model/common/common_functions.php');
require(__DIR__ . '/../model/common/common_functions.php');

class userController {
    var $varModelObj, $varDBConnection;
    public $actionevents, $formdata, $tablename, $SQLQuery, $myAPIString, $v_username, $v_password,$otp;
        
    function __construct() {
        $requestType = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection; 
        $this->actionevents = $_POST['action'] ?? null;
        $this->v_username = $_POST['v_username'] ?? null;
        $this->v_password = $_POST['v_password'] ?? null;     
        $this->otp = $_POST['otp'] ?? null;             
        $this->remember_me = $_POST['remember_me'] ?? false;   
    }

    function SQLArray() { 
        $array = array();
        $array[0] = "SELECT * FROM customer_details where email_user_name='".$this->v_username."'";
        $array[1] = "UPDATE `customer_details` SET `otp`='".$this->otp ."' WHERE `email_user_name`='".$this->v_username."'";
        $array[2] = "SELECT `otp` FROM `customer_details` WHERE `email_user_name`='".$this->v_username."'";
        $array[3] = "UPDATE `customer_details` SET `user_password`='".$this->v_password."' WHERE `email_user_name`='".$this->v_username."'";
        $array[4] = "SELECT `user_password` FROM `customer_details` WHERE `email_user_name`='".$this->v_username."' ";
        $array[5] = "UPDATE `customer_details` SET `status`='Active' WHERE `email_user_name`='".$this->v_username."'";

        return $array;
    }

    function generateOTP($length = 6) {
        $digits = '0123456789';
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $digits[rand(0, strlen($digits) - 1)];
        }
        return $otp;
    }

    // function sendOTPEmail($email, $otp) {
    //     $subject = "Password Reset - Shopping";

    //     // HTML email with professional design
    //     $message = '
    //     <html>
    //     <head>
    //         <title>Password Reset OTP</title>
    //         <style>
    //             body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
    //             .container {
    //                 background-color: #ffffff;
    //                 max-width: 600px;
    //                 margin: auto;
    //                 padding: 30px;
    //                 border-radius: 8px;
    //                 box-shadow: 0 0 10px rgba(0,0,0,0.1);
    //             }
    //             .otp {
    //                 font-size: 24px;
    //                 font-weight: bold;
    //                 color: #2c3e50;
    //                 background-color:rgb(210, 216, 218);
    //                 padding: 10px;
    //                 display: inline-block;
    //                 margin: 20px 0;
    //                 border-radius: 5px;
    //             }
    //             .footer {
    //                 font-size: 12px;
    //                 color: #999999;
    //                 margin-top: 20px;
    //             }
    //         </style>
    //     </head>
    //     <body>
    //         <div class="container">
    //             <h2>Password Reset Request</h2>
    //             <p>We received a request to reset your password for your Shopping account.</p>
    //             <p>Your One-Time Password (OTP) is:</p>
    //             <div class="otp">'.$otp.'</div>
    //             <p>This OTP is valid for <strong>10 minutes</strong>.</p>
    //             <p>If you did not request a password reset, you can safely ignore this email. Someone else might have typed your email address by mistake.</p>
    //             <p>Thank you,<br><strong>Shopping Web Team</strong></p>
    //             <div class="footer">
    //                 <p>Do not share this code with anyone. Our team will never ask for your password or OTP.</p>
    //             </div>
    //         </div>
    //     </body>
    //     </html>
    //     ';

    //     // Set headers
    //     $headers = "MIME-Version: 1.0\r\n";
    //     $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    //     $headers .= "From: Shopping Web <no-reply@yourdomain.com>\r\n";
    //     $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
    //     $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    //     $headers .= "X-Priority: 1 (Highest)\r\n";
    //     $headers .= "X-MSMail-Priority: High\r\n";
    //     $headers .= "Importance: High\r\n";

    //     return mail($email, $subject, $message, $headers);
    // }
    function sendOTPEmail($email, $otp) {

        require_once __DIR__ . '/../mailapi/Exception.php';
        require_once __DIR__ . '/../mailapi/PHPMailer.php';
        require_once __DIR__ . '/../mailapi/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // SMTP config
            $mail->isSMTP();
            $mail->Host       = 'mail.darjanafashion.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'care@darjanafashion.com';
            $mail->Password   = 's@nds1@b';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            // Sender & Receiver
            $mail->setFrom('care@darjanafashion.com', 'Darjana Shopping');
            $mail->addAddress($email);
            $mail->addReplyTo('support@darjanafashion.com', 'Support');

            // Anti-spam headers (important)
            $mail->addCustomHeader('X-Mailer', 'PHP/' . phpversion());
            $mail->addCustomHeader('List-Unsubscribe', '<mailto:support@darjanafashion.com>');

            // Subject
            $mail->Subject = "Your OTP for Password Reset";

            // HTML body (same design)
            $message = '
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                    .container {
                        background-color: #ffffff;
                        max-width: 600px;
                        margin: auto;
                        padding: 30px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    }
                    .otp {
                        font-size: 24px;
                        font-weight: bold;
                        color: #2c3e50;
                        background-color:rgb(210, 216, 218);
                        padding: 10px;
                        display: inline-block;
                        margin: 20px 0;
                        border-radius: 5px;
                    }
                    .footer {
                        font-size: 12px;
                        color: #999999;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h2>Password Reset Request</h2>
                    <p>We received a request to reset your password.</p>
                    <p>Your One-Time Password (OTP) is:</p>
                    <div class="otp">'.$otp.'</div>
                    <p>This OTP is valid for <strong>10 minutes</strong>.</p>
                    <p>If you did not request this, ignore this email.</p>
                    <p>Thank you,<br><strong>Darjana Shopping Team</strong></p>
                    <div class="footer">
                        <p>Do not share this OTP with anyone.</p>
                    </div>
                </div>
            </body>
            </html>
            ';

            // Content
            $mail->isHTML(true);
            $mail->Body    = $message;

            // Plain text fallback
            $mail->AltBody = "Your OTP is: $otp. It is valid for 10 minutes.";

            return $mail->send();

        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        }
    }
    
    function generateToken($length = 32) {
        return bin2hex(random_bytes($length));
    }

    function setRememberMeToken($user_id) {
        $token = $this->generateToken();
        $expiry = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        // Store token in database
        $sql = "UPDATE customer_details SET 
                remember_token = '$token', 
                token_expiry = '$expiry' 
                WHERE ids = '$user_id'";
        
        $this->varModelObj->UpdateTable($sql);
        
        // Set cookie with token (30 days)
        setcookie('remember_token', $token, time() + (86400 * 30), '/', '', false, true);
        setcookie('remember_user', $user_id, time() + (86400 * 30), '/', '', false, true);
        
        return $token;
    }

    function checkRememberMeToken() {
        // Check if cookies exist
        if (!isset($_COOKIE['remember_token']) || !isset($_COOKIE['remember_user'])) {
            return false;
        }
        
        $token = $_COOKIE['remember_token'];
        $user_id = $_COOKIE['remember_user'];
        
        // Sanitize inputs to prevent SQL injection
        $user_id = mysqli_real_escape_string($this->varDBConnection, $user_id);
        $token = mysqli_real_escape_string($this->varDBConnection, $token);
        $url = "https://admin.darjanafashion.com/assets/img/products/product/";
		$catUrl = "https://admin.darjanafashion.com/assets/img/categories/";
		$baseUrl = $_SERVER['HTTP_HOST'];
        
        $sql = "SELECT * FROM customer_details 
                WHERE ids = '$user_id' 
                AND remember_token = '$token' 
                AND token_expiry > NOW() 
                AND status = 'Active'";
        
        $result = $this->varModelObj->ListFromJSonReturn($sql);
        // echo $sql;
        $data = json_decode($result, true);
        
        if (!empty($data['data'])) {
            $user = $data['data'][0];
            
            // Start session if not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            // Restore session
            $_SESSION["ids"] = $user['ids'];
            $_SESSION["user_name"] = $user['email_user_name'];
            $_SESSION["loggedin"] = "true";
        	$_SESSION["url"] = $url;
			$_SESSION["catUrl"] = $catUrl;
			$_SESSION["baseUrl"] = $baseUrl;
            
            return true;
        }
        
        return false;
    }

    function RequestAccept($FunctionEvents) {
        $var = $this->SQLArray();
        
        switch ($FunctionEvents) {
            case 'login':
                $return_string = $this->varModelObj->userAuthenticationforcheck($var[0], $this->v_password);
                $return_string1 = explode("#", $return_string); 
                if($return_string1[0] == 'true') {
                    // Set remember me token if requested
                    if ($this->remember_me === 'true' || $this->remember_me === true) {
                        // Get user ID from session (set in userAuthenticationforcheck)
                        $user_id = $_SESSION["ids"];
                        $this->setRememberMeToken($user_id);
                    }
                    
                    echo json_encode(['status' => 'success', 'message' => 'Login successful']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => $return_string]);
                }
                break;
            
           case 'check_remember_me':

                $result = $this->checkRememberMeToken();
            
                // Detect if it's an AJAX/API request
                $isAjax = (
                    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
                );
            
                if ($isAjax) {
                    if ($result) {
                        echo json_encode(['status' => 'success', 'message' => 'Auto login successful']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'No valid remember me token']);
                    }
                    exit;
                }
            
                // Normal PHP call → just return
                return $result;
            
            // case 'send_otp':
            //     $result = $this->varModelObj->ReturnCountValue($var[0]);
            //     if ($result == 0) {
            //         echo json_encode(['status' => 'failed', 'message' => 'User not registered. Please sign up.']);
            //         return;
            //     }

            //     $results = $this->varModelObj->ListFromJSonReturn($var[0]);
            //     $data = json_decode($results, true);
            //     $status = $data['data'][0]['status'] ?? null;
                
            //     if ($status !== "Inactive") {
            //         // Generate OTP
            //         $this->otp = $this->generateOTP();
            //         // Send OTP via email
            //         if ($this->sendOTPEmail($this->v_username, $this->otp)) {
            //             $var = $this->SQLArray();
            //             $result = $this->varModelObj->UpdateTable($var[1]);
            //             if ($result) {
            //                 echo json_encode(['status' => 'success', 'message' => 'OTP has been sent and updated.']);
            //             } else {
            //                 echo json_encode(['status' => 'failed', 'message' => 'OTP sent but some error occur.']);
            //             }
            //         } else {
            //             echo json_encode(['status' => 'failed', 'message' => 'Failed to send OTP. Please try again.']);
            //         }
            //     }
                
            //     else{
            //         echo json_encode(['status' => 'failed', 'message' => 'Your account has been blocked by the administrator.']);
            //     }
            // break;
            case 'send_otp':

                $result = $this->varModelObj->ReturnCountValue($var[0]);

                if ($result == 0) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'User not registered. Please sign up.'
                    ]);
                    return;
                }

                $results = $this->varModelObj->ListFromJSonReturn($var[0]);
                $data = json_decode($results, true);
                $status = $data['data'][0]['status'] ?? '';

                // ðŸ”¥ Handle blocked/inactive users FIRST
                if (empty($status) || $status === "Inactive" || $status === "Deactive") {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Your account has been blocked by the administrator. Please contact support.'
                    ]);
                    return;
                }

                // âœ… Generate OTP
                $this->otp = $this->generateOTP();
                // echo "OTP: " . $this->otp;
                // exit;
                // âœ… Send OTP
                if ($this->sendOTPEmail($this->v_username, $this->otp)) {

                    $var = $this->SQLArray();
                    // echo $var[1];
                    $result = $this->varModelObj->UpdateTable($var[1]);

                    if ($result) {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'OTP has been sent successfully.'
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 'failed',
                            'message' => 'OTP sent but failed to update. Please try again.'
                        ]);
                    }

                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Failed to send OTP. Please try again.'
                    ]);
                }

            break;
            
            case 'verify_otp':
                $result = $this->varModelObj->ListFromJSonReturn($var[2]);
                $data = json_decode($result, true);
                $otp = $data['data'][0]['otp'] ?? null;

                if ($otp === $this->otp) {
                    // OTP matched - do your success logic here
                    $result = $this->varModelObj->UpdateTable($var[5]);
                    echo json_encode(['status' => 'success', 'message' => 'OTP Verified']);
                } else {
                    echo json_encode(['status' => 'failed', 'message' => 'OTP Not Matching']);
                }
            break;
            
            case 'reset_password':
                $result = $this->varModelObj->ListFromJSonReturn($var[4]);
                $data = json_decode($result, true);
                $user_password = $data['data'][0]['user_password'] ?? null;
                if($user_password == $this->v_password ){
                    echo json_encode(['status' => 'success', 'message' => 'Password Updated']);
                }else{
                    $res = $this->varModelObj->UpdateTable($var[3]);
                    if($res == 1){
                        echo json_encode(['status' => 'success', 'message' => 'Password Updated']);
                    }else{
                        echo json_encode(['status' => 'failed', 'message' => 'Password Updated']); 
                    }
                }
               
            break;

            default:
                // echo 'No Action Found...!';
                break;   
        }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'check_remember_me') {
    $obj = new userController();
    $obj->checkRememberMeToken();
    echo "check";
} else {
    $obj = new userController();
    $obj->RequestAccept($obj->actionevents);
}
?>