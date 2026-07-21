<?php
session_start();
require('../model/common/common_functions.php');

class formcontroller
{
    var $varModelObj, $varDBConnection;
    public $actionevents, $customer_name, $email_user_name, $user_password, $profile_image,
    $permenant_address, $mobile_no, $whatsapp_no, $postal_code, $district, $state,
    $street, $stateId, $country, $gender, $date_of_birth, $country_id, $image_name, $id;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? null;
        $this->customer_name = $_POST['customer_name'] ?? null;
        $this->email_user_name = $_POST['email_user_name'] ?? null;
        $this->user_password = $_POST['user_password'] ?? null;
        $this->permenant_address = $_POST['permenant_address'] ?? null;
        $this->mobile_no = $_POST['mobile_no'] ?? null;
        $this->whatsapp_no = $_POST['whatsapp_no'] ?? null;
        $this->id = $_POST['id'] ?? null;
        $this->postal_code = $_POST['postal_code'] ?? null;
        $this->district = $_POST['district'] ?? null;
        $this->state = $_POST['state'] ?? null;
        $this->street = $_POST['street'] ?? null;
        $this->country = $_POST['country'] ?? null;
        $this->gender = $_POST['gender'] ?? null;
        $this->date_of_birth = $_POST['date_of_birth'] ?? null;
        $this->profile_image = $_FILES['image'] ?? null;
        $this->image_name = $_POST['image_name'] ?? null;
        $this->stateId = $_POST['stateid'] ?? null;
        $this->country_id = $_POST['country_id'] ?? null;
        date_default_timezone_set('Asia/Bahrain');
        $this->created_date = date('Y-m-d H:i:s');
    }

    function SQLArray()
    {
        $array = array();
        $array[0] = "INSERT INTO customer_details(customer_name, email_user_name, user_password, otp, status,created_date) 
                    SELECT ?, ?, ?, ?, 'Pending',?
                    FROM dual 
                    WHERE NOT EXISTS (
                        SELECT 1 FROM customer_details WHERE email_user_name = ?
                    )";
        // $array[1] = "SELECT * FROM customer_details WHERE ids = ?";
        $array[1] = "SELECT c.ids,c.customer_name,c.permenant_address,c.postal_code,c.country ,co.country AS country_name,c.state,s.state_name,c.district,c.street,c.mobile_no,c.whatsapp_no,c.email_user_name,c.status,c.gender,c.date_of_birth,c.created_date
                        FROM customer_details c LEFT JOIN country co ON c.country = co.ids LEFT JOIN state s ON c.state = s.ids WHERE c.ids= ?";
        $array[2] = "UPDATE `customer_details` SET `customer_name` = ?, `permenant_address` = ?, `country` = ?, `mobile_no` = ?, `whatsapp_no` = ?, `postal_code` = ?, `district` = ?, `state` = ?, `street` = ?, `gender` = ?, `date_of_birth` = ?" . 
                    (!empty($this->image_name) ? ", `Image` = ?" : "") . 
                    " WHERE ids = ?";
        $array[3] = "SELECT ids, district_name FROM district WHERE stateid = ? ORDER BY district_name ASC";
        $array[4] = "SELECT ids, state_name FROM state WHERE country_id = ? ORDER BY state_name ASC";
        $array[5] = "SELECT `Image`, customer_name, email_user_name FROM customer_details WHERE ids = ?";
        $array[6] = "SELECT `ids`, country FROM country ORDER BY country ASC";
        $array[7] = "SELECT otp,user_password FROM customer_details WHERE email_user_name = ? AND status = 'Pending'";
        $array[8] = "UPDATE customer_details SET status = 'Active' WHERE email_user_name = ? AND otp = ?";
         $array[9] = "SELECT * FROM customer_details where email_user_name='".$this->email_user_name."'";
        return $array;
    }

    function sendWelcomeEmail($email, $customer_name)
    {
        $subject = "Welcome to Darjana Fashion !";
        $message = "Dear $customer_name,\n\n";
        $message .= "Welcome to Darjana Fashion ! Thank you for choosing us.\n";
        $message .= "Your account has been successfully created.\n";
        $message .= "Please log in and visit the profile section to complete your profile details.\n";
        $message .= "If you have any questions, feel free to contact our support team.\n\n";
        $message .= "Best regards,\nDarjanaFashion-Shopping Team";
        $headers = "From: Care@darjanafashion.com\r\n";
        
        return mail($email, $subject, $message, $headers);
    }

    function RequestAccept($FunctionEvents)
    {
        $var = $this->SQLArray();
        switch ($FunctionEvents) {
            // case 'send_otp':
            //     $otp = rand(100000, 999999);
            //     $subject = "Your OTP for Darjana Fashion Registration";
            //     $message = "Dear " . $this->customer_name . ",\n\n";
            //     $message .= "Your OTP for registration is: $otp\n";
            //     $message .= "Please enter this OTP to complete your registration.\n";
            //     $message .= "This OTP is valid for 10 minutes.\n\n";
            //     $message .= "Best regards,\nDarjanaFashion-Shopping Team";
            //     $headers = "From: no-reply@darjanafashion.com\r\n";
            //     $headers .= "MIME-Version: 1.0\r\n";
            //     $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            //     // Check if email already exists
            //     $check_query = "SELECT 1 FROM customer_details WHERE email_user_name = ?";
            //     $check_stmt = $this->varDBConnection->prepare($check_query);
            //     $check_stmt->bind_param("s", $this->email_user_name);
            //     $check_stmt->execute();
            //     $result = $check_stmt->get_result();
                
            //     if ($result->num_rows > 0) {
            //         echo "exists";
            //         exit;
            //     }

            //     // Insert with OTP
            //     $stmt = $this->varDBConnection->prepare($var[0]);
            //     $stmt->bind_param("sssiss", $this->customer_name, $this->email_user_name, $this->user_password, $otp,$this->created_date, $this->email_user_name);
            //     $result = $stmt->execute();
                

            //     if ($result && mail($this->email_user_name, $subject, $message, $headers)) {
            //         echo "otp_sent";
            //     } else {
            //         echo "error";
            //     }
            //     $stmt->close();
            //     break;

            case 'send_otp':
                $otp = rand(100000, 999999);
                $subject = "Your OTP for Darjana Fashion Registration";
                $message = "Dear " . $this->customer_name . ",\n\n";
                $message .= "Your OTP for registration is: $otp\n";
                $message .= "Please enter this OTP to complete your registration.\n";
                $message .= "This OTP is valid for 10 minutes.\n\n";
                $message .= "Best regards,\nDarjanaFashion-Shopping Team";

                // Check if email already exists
                $check_query = "SELECT 1 FROM customer_details WHERE email_user_name = ?";
                $check_stmt = $this->varDBConnection->prepare($check_query);
                $check_stmt->bind_param("s", $this->email_user_name);
                $check_stmt->execute();
                $result = $check_stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo "exists";
                    exit;
                }

                // Fix: Correct the bind_param - 6 placeholders means 6 parameters
                // Assuming $var[0] contains: "INSERT INTO customer_details (customer_name, email_user_name, user_password, otp, created_date, email_user_name) VALUES (?, ?, ?, ?, ?, ?)"
                $stmt = $this->varDBConnection->prepare($var[0]);
                // Fix: 6 parameters for 6 placeholders (sssiss)
                $stmt->bind_param("sssiss", $this->customer_name, $this->email_user_name, $this->user_password, $otp, $this->created_date, $this->email_user_name);
                $result = $stmt->execute();
                
                if ($result) {
                    // Correct path - adjust based on your file location
                    // If your script is in controller folder, use relative path
                    require_once __DIR__ . '/../mailapi/Exception.php';
                    require_once __DIR__ . '/../mailapi/PHPMailer.php';
                    require_once __DIR__ . '/../mailapi/SMTP.php';
                    
                    // Create mail object
                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                    
                    try {
                        // Server settings
                        $mail->isSMTP();
                        $mail->Host       = 'mail.darjanafashion.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'care@darjanafashion.com';  // Use full email address
                        $mail->Password   = 's@nds1@b';      // Replace with actual password
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port       = 465;
                        
                        // Disable SSL verification (for testing only)
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                        
                        // Recipients
                        $mail->setFrom('care@darjanafashion.com', 'Darjana Fashion');
                        $mail->addAddress($this->email_user_name, $this->customer_name);
                        
                        // Content
                        $mail->isHTML(false);
                        $mail->Subject = $subject;
                        $mail->Body    = $message;
                        
                        // Send email
                        if($mail->send()) {
                            echo "otp_sent";
                        } else {
                            echo "error";
                        }
                        
                    } catch (Exception $e) {
                        // Log the error
                        error_log("Mail Error: " . $mail->ErrorInfo);
                        echo "error";
                    }
                } else {
                    echo "error";
                }
                $stmt->close();
                break;
            case 'verify_otp':
                $otp = $_POST['otp'] ?? null;
                $stmt = $this->varDBConnection->prepare($var[7]);
                $stmt->bind_param("s", $this->email_user_name);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $password = $row['user_password'];
                    // echo $password;
                    if ($row['otp'] == $otp) {
                        $update_stmt = $this->varDBConnection->prepare($var[8]);
                        $update_stmt->bind_param("si", $this->email_user_name, $otp);
                        $update_result = $update_stmt->execute();
                        
                        if ($update_result) {
                            $this->sendWelcomeEmail($this->email_user_name, $this->customer_name);
                            echo "success";
                        } else {
                            echo "error";
                        }
                        $return_string = $this->varModelObj->userAuthenticationforcheck($var[9], $password);
                        $return_string1 = explode("#", $return_string); 

                        $update_stmt->close();
                    } else {
                        echo "invalid_otp";
                    }
                } else {
                    echo "error";
                }
                $stmt->close();
                break;

            case 'get_details':
                if (!isset($_SESSION['ids']) || empty($_SESSION['ids'])) {
                    echo json_encode(['status' => 'error', 'message' => 'Session expired or not set']);
                    exit;
                }
                $stmt = $this->varDBConnection->prepare($var[1]);
                $stmt->bind_param("i", $_SESSION['ids']);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                echo json_encode($result);
                $stmt->close();
                break;

            case 'update_details':
                $response = ['status' => 'error', 'message' => 'Failed to update details.'];
                if ($this->profile_image && $this->profile_image['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../httpdocs/images/';
                    if (!is_dir($uploadDir)) {
                        if (!mkdir($uploadDir, 0777, true)) {
                            echo json_encode(['status' => 'error', 'message' => 'Failed to create upload directory.']);
                            exit;
                        }
                    }
                    if (!is_writable($uploadDir)) {
                        echo json_encode(['status' => 'error', 'message' => 'Upload directory is not writable.']);
                        exit;
                    }
                    $fileExtension = strtolower(pathinfo($this->profile_image['name'], PATHINFO_EXTENSION));
                    $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        echo json_encode(['status' => 'error', 'message' => 'Only JPG, JPEG, and PNG files are allowed.']);
                        exit;
                    }
                    $fileName = $this->profile_image['name'];
                    $filePath = $uploadDir . $fileName;
                    if (file_exists($filePath)) {
                        $baseName = pathinfo($fileName, PATHINFO_FILENAME);
                        $fileName = $baseName . '_' . time() . '.' . $fileExtension;
                        $filePath = $uploadDir . $fileName;
                    }
                    if (move_uploaded_file($this->profile_image['tmp_name'], $filePath)) {
                        $this->image_name = $fileName;
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image. Please try again.']);
                        exit;
                    }
                } elseif ($this->profile_image && $this->profile_image['error'] !== UPLOAD_ERR_NO_FILE) {
                    $uploadErrors = [
                        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the maximum size allowed.',
                        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the maximum size allowed by the form.',
                        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
                        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder for upload.',
                        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
                        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'
                    ];
                    $errorMessage = $uploadErrors[$this->profile_image['error']] ?? 'An unknown error occurred during file upload.';
                    echo json_encode(['status' => 'error', 'message' => $errorMessage]);
                    exit;
                }
                $stmt = $this->varDBConnection->prepare($var[2]);
                $params = [
                    $this->customer_name, $this->permenant_address, $this->country, $this->mobile_no, 
                    $this->whatsapp_no, $this->postal_code, $this->district, $this->state, 
                    $this->street, $this->gender, $this->date_of_birth
                ];
                if (!empty($this->image_name)) {
                    $params[] = $this->image_name;
                }
                $params[] = $_SESSION['ids'];
                $stmt->bind_param(str_repeat("s", count($params)), ...$params);
                $result = $stmt->execute();
                echo json_encode($result ? 
                    ['status' => 'success', 'message' => 'Details updated successfully.'] :
                    ['status' => 'error', 'message' => 'Failed to update profile details. Please try again.']);
                $stmt->close();
                break;

            case 'get_districts':
                $stmt = $this->varDBConnection->prepare($var[3]);
                $stmt->bind_param("i", $this->stateId);
                $stmt->execute();
                $result = $this->varModelObj->CreateDropDownFromResult($stmt->get_result(), 'ids', 'district_name', 'district', 'Select District');
                echo $result;
                $stmt->close();
                break;

            case 'get_state':
                $stmt = $this->varDBConnection->prepare($var[4]);
                $stmt->bind_param("i", $this->country_id);
                $stmt->execute();
                $result = $this->varModelObj->CreateDropDownFromResult($stmt->get_result(), 'ids', 'state_name', 'state', 'Select State');
                echo $result;
                $stmt->close();
                break;

            case 'get_profile':
                $stmt = $this->varDBConnection->prepare($var[5]);
                $stmt->bind_param("i", $_SESSION['ids']);
                $stmt->execute();
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                echo json_encode($result);
                $stmt->close();
                break;

            case 'get_country':
                $result = $this->varModelObj->CreateDropDown($var[6], 'ids', 'country', 'country', 'Select Country');
                echo $result;
                break;

            default:
                echo "No Events";
                break;
        }
    }
}

$obj = new formcontroller();
$obj->RequestAccept($obj->actionevents);
?>