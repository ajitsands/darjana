<?php
require ('../../model/common/common_functions.php');
class loginApiRequest
{
        var $varModelObj,$varDBConnection;
        public $request,$formdata,$tablename,$SQLQuery,$password,$user_name;
       // echo "connected";
        
    function __construct()
	{
		//$this->data = $_POST['data'] ?? null;
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
		$this->formdata = $_POST['data'];
        $this->request = $_POST['action'];
		$this->vendor_id = $_POST['vendor_id'];
		$this->ids = $_POST['ids'];
		$this->user_password = $_POST['user_password'];
		$this->whatsapp_no = $_POST['whatsapp_no'];
		//$this->user_type = $_POST['user_type'];
		$this->customer_name = $_POST['customer_name'];
		$this->mobile_no = $_POST['mobile_no'];
		$this->email_user_name = $_POST['email_user_name'];
		$this->gender = $_POST['gender'];
		$this->date_of_birth = $_POST['date_of_birth'];
		$this->new_password = $_POST['new_password'];
        $this->customer_id = $_POST['customer_id'];
		$this->shipping_address = mysqli_real_escape_string($this->varDBConnection, $_POST['shipping_address']);
		$this->postal_code = $_POST['postal_code'];
		$this->street = $_POST['street'];
		$this->district = $_POST['district'];
		$this->country = $_POST['country'];
		$this->state = $_POST['state'];
		
    }
	
    function SQLArray()
    {
        $array =  array();
         
            $array[0] = "SELECT * FROM user_details"; 
			
			$array[1] = "INSERT INTO user_details (vendor_id, email_username, user_password, phone_no, whatsapp_no) 
						VALUES ('".$this->vendor_id."', '".$this->email_user_name."', '".$this->user_password."', '".$this->mobile_no."', '".$this->whatsapp_no."')";
				
			$array[2] = "INSERT INTO customer_details (customer_name, mobile_no, whatsapp_no, email_user_name, user_password, gender, date_of_birth)
						VALUES ('".$this->customer_name."', '".$this->mobile_no."', '".$this->whatsapp_no."', '".$this->email_user_name."', '".$this->user_password."', '".$this->gender."', '".$this->date_of_birth."')";	
				
			$array[3] = "SELECT * FROM customer_details";
			
			$array[4] = "SELECT * FROM customer_details WHERE ids = '".$this->ids."'";
			
			$array[5] = "UPDATE customer_details SET otp = '" . $this->otp . "' WHERE ids = '" . $this->ids . "'";
			 
			$array[6] = "UPDATE customer_details SET user_password = '" . $this->new_password . "' WHERE ids = '" . $this->ids . "'";
			
			$array[7] = "SELECT * FROM customer_details WHERE email_user_name = '".$this->email_user_name."' AND user_password = '".$this->user_password."'";
			
			$array[8] = "SELECT * FROM customer_details WHERE email_user_name = '".$this->email_user_name."'";
			
			$array[9] = "SELECT * FROM customer_details WHERE user_password = '".$this->user_password."'";
			
			$array[10] = "SELECT email_user_name FROM customer_details WHERE email_user_name = '".$this->email_user_name."'";
			
			$array[11] = "SELECT otp FROM customer_details WHERE email_user_name = '".$this->email_user_name."'";
			
			$array[12] = "UPDATE customer_details SET user_password = '".$this->new_password."' WHERE email_user_name = '".$this->email_user_name."'";
			
			$array[13] = "INSERT INTO customer_shipping_address (customer_id, shipping_address, postal_code, street, district, state, country, customer_name)
						VALUES ('".$this->customer_id."', '".$this->shipping_address."', '".$this->postal_code."', '".$this->street."', '".$this->district."', '".$this->state."',
								'".$this->country."', '".$this->customer_name."')";
								
			$array[14] = "UPDATE customer_details 
						SET permenant_address = '" . $this->shipping_address . "', 
							postal_code = '" . $this->postal_code . "', 
							district = '" . $this->district . "', 
							state = '" . $this->state . "', 
							street = '" . $this->street . "', 
							country = '" . $this->country . "' 
						WHERE ids = '" . $this->ids . "'";

			
        return $array;
    }
    
    function APIRequest($request)
    {
       
        $var =  $this->SQLArray();
        switch ($request)
        {

            case 'get_user_info':  
			
				$response=$this->varModelObj->ListFromJSon($var[0]);   
				// echo $response;
				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No user details found"  },"refference_code" :
                        "1000"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2000"]');
                    echo json_decode($ret);
                } 
						
			break;
			
			case 'add_user_info':
				if (empty($this->vendor_id) || empty($this->email_user_name) || empty($this->user_password) || empty($this->mobile_no) || empty($this->whatsapp_no)) {
					$ret = json_encode('[{"status" : "Failed", "message" : "All fields are required" }, "reference_code" : "1001"]');
					echo json_decode($ret);
					break;
				}

				if (!filter_var($this->email_user_name, FILTER_VALIDATE_EMAIL)) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Invalid email address format" }, "reference_code" : "1002"]');
					echo json_decode($ret);
					break;
				}

				if (strlen($this->mobile_no) > 13) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Phone number can be a maximum of 13 characters" }, "reference_code" : "1003"]');
					echo json_decode($ret);
					break;
				}
				if (strlen($this->whatsapp_no) > 13) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Whatsapp number can be a maximum of 13 characters" }, "reference_code" : "1004"]');
					echo json_decode($ret);
					break;
				}

				$response = $this->varModelObj->AddToTable($var[1]);
				if ($response) {
					$ret = json_encode('[{"status" : "Success", "message" : "User added successfully" }, "reference_code" : "2001"]');
					echo json_decode($ret);
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Failed to add user" }, "reference_code" : "1005"]');
					echo json_decode($ret);
				}
			break;

			case 'add_customer_info':
				if (empty($this->customer_name) || empty($this->mobile_no) || empty($this->whatsapp_no) || empty($this->email_user_name) || empty($this->user_password) || empty($this->gender) || empty($this->date_of_birth)) {
					$ret = json_encode('[{"status" : "Failed", "message" : "All fields are required" }, "reference_code" : "1006"]');
					echo json_decode($ret);
					break;
				}

				if (!filter_var($this->email_user_name, FILTER_VALIDATE_EMAIL)) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Invalid email address" }, "reference_code" : "1007"]');
					echo json_decode($ret);
					break;
				}

				if (strlen($this->mobile_no) > 13) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Mobile number can be a maximum of 13 characters" }, "reference_code" : "1008"]');
					echo json_decode($ret);
					break;
				}
				if (strlen($this->whatsapp_no) > 13) {
					$ret = json_encode('[{"status" : "Failed", "message" : "Whatsapp number can be a maximum of 13 characters" }, "reference_code" : "1009"]');
					echo json_decode($ret);
					break;
				}

				$response = $this->varModelObj->AddToTable($var[2]);
				if ($response) {
					$ret = json_encode('[{"status" : "Success", "message" : "Customer added successfully" }, "reference_code" : "2002"]');
					echo json_decode($ret);
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Failed to add customer" }, "reference_code" : "1010"]');
					echo json_decode($ret);
				}
			break;
			
			case 'get_customer_info':  
			
				$response=$this->varModelObj->ListFromJSon($var[3]);   
				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No customer details Found"  },"refference_code" :
                        "1011"]');
                     echo json_decode($ret);
                }
                else
                {
                      $ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2003"]');
                      echo json_decode($ret);
                } 
						
			break;
			
			case 'get_customer_info_with_ids':  
			
				$response=$this->varModelObj->ListFromJSon($var[4]);   
				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No customer details Found"  },"refference_code" :
                        "1012"]');
                     echo json_decode($ret);
                }
                else
                {
                      $ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2004"]');
                      echo json_decode($ret);
                } 
						
			break;

			case 'generate_otp_for_update_password':
				if (!empty($this->ids)) {
					$otp = rand(100000, 999999);

					$updateOtpQuery = "UPDATE customer_details SET otp = '$otp' WHERE ids = '".$this->ids."'";
					$response = $this->varModelObj->UpdateTable($updateOtpQuery);

					$getMailQuery = "SELECT email_user_name FROM customer_details WHERE ids = '".$this->ids."'";
					$mailAddress = $this->varModelObj->ListFromTable($getMailQuery);

					$mailData = json_decode($mailAddress, true); 
					$to = !empty($mailData[0]['email_user_name']) ? $mailData[0]['email_user_name'] : null; 
					//echo $to;
					//echo $otp;
					if ($response && $to) {
						$subject = "Your OTP Code";
						$message = "Dear User,\n\nYour OTP for password reset is: $otp\n\nPlease use this OTP to proceed with updating your password.";
						$headers = "From: no-reply@example.com\r\n";
						$sendMail = mail($to, $subject, $message, $headers);
						if ($sendMail) {
							$ret = json_encode('[{"status" : "Success", "message" : "OTP sent to your email" }, "reference_code" : "2005"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Failed to send OTP email" }, "reference_code" : "1013"]');
							echo json_decode($ret);
						}
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "Failed to generate OTP or fetch email address" }, "reference_code" : "1014"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "User ID is required" }, "reference_code" : "1015"]');
					echo json_decode($ret);
				}
			break;

            case 'update_password_otp_varification':
				if (!empty($this->ids) && !empty($this->otp)) {
					$otpQuery = "SELECT otp FROM customer_details WHERE ids = '".$this->ids."'";
					$response = $this->varModelObj->ListFromTable($otpQuery);
					$data = json_decode($response, true);
					//echo $data[0];
					if (!empty($data)) {
						$dbOtp = $data[0]['otp'];
						if ($dbOtp == $this->otp) {
							$ret = json_encode('[{"status" : "Success", "message" : "OTP verified successfully" }, "reference_code" : "2006"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Invalid OTP. Please try again" }, "reference_code" : "1016"]');
							echo json_decode($ret);
						}
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "User not found" }, "reference_code" : "1017"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "User ID and OTP are required" }, "reference_code" : "1018"]');
					echo json_decode($ret);
				}
			break;

            case 'update_customer_password':
                if (!empty($this->ids) && !empty($this->new_password)) {
                    $response = $this->varModelObj->UpdateTable($var[6]);

                    if ($response) {
                        $ret = json_encode('[{"status" : "Success", "message" : "Password updated successfully" }, "reference_code" : "2007"]');
                        echo json_decode($ret);
                    } else {
                        $ret = json_encode('[{"status" : "Failed", "message" : "Failed to update password" }, "reference_code" : "1019"]');
                        echo json_decode($ret);
                    }
                } else {
                    $ret = json_encode('[{"status" : "Failed", "message" : "Failed to fetch IDs or password" }, "reference_code" : "1020"]');
                    echo json_decode($ret);
                }
			break;
			
			case 'customer_login':
				if (!empty($this->email_user_name) && !empty($this->user_password)) {
					$usernameResponse = $this->varModelObj->ListFromTable($var[8]);
					$usernameData = json_decode($usernameResponse, true);

					if (!empty($usernameData)) {
						$storedPassword = $usernameData[0]['user_password'];
						if ($storedPassword === $this->user_password) {
							$ret = json_encode('[{"status" : "Success", "message" : "Login successful", "user_details" : ' . $usernameResponse . ' }, "reference_code" : "2008"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Incorrect password" }, "reference_code" : "1021"]');
							echo json_decode($ret);
						}
					} else {
						$passwordResponse = $this->varModelObj->ListFromTable($var[9]);
						$passwordData = json_decode($passwordResponse, true);

						if (!empty($passwordData)) {
							$ret = json_encode('[{"status" : "Failed", "message" : "Invalid username" }, "reference_code" : "1022"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "No user registered with the provided credentials" }, "reference_code" : "1023"]');
							echo json_decode($ret);
						}
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Username and password are required" }, "reference_code" : "1024"]');
					echo json_decode($ret);
				}
			break;
				
			case 'generate_otp_for_forgot_password':
				if (!empty($this->email_user_name)) {
					$usernameResponse = $this->varModelObj->ListFromTable($var[10]);
					$usernameData = json_decode($usernameResponse, true);

					if (!empty($usernameData)) {
						$otp = rand(100000, 999999);

						$updateOtpQuery = "UPDATE customer_details SET otp = '$otp' WHERE email_user_name = '".$this->email_user_name."'";
						$response = $this->varModelObj->UpdateTable($updateOtpQuery);

						if ($response) {
							$subject = "Your OTP Code for Password Reset";
							$message = "Dear User,\n\nYour OTP for password reset is: $otp\n\nPlease use this OTP to proceed with resetting your password.";
							$headers = "From: no-reply@example.com\r\n";

							$sendMail = mail($this->email_user_name, $subject, $message, $headers);

							if ($sendMail) {
								$ret = json_encode('[{"status" : "Success", "message" : "OTP sent to your email" }, "reference_code" : "2009"]');
								echo json_decode($ret);
							} else {
								$ret = json_encode('[{"status" : "Failed", "message" : "Failed to send OTP email" }, "reference_code" : "1025"]');
								echo json_decode($ret);
							}
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Failed to generate OTP" }, "reference_code" : "1026"]');
							echo json_decode($ret);
						}
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "No user found with the provided email" }, "reference_code" : "1027"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Email is required" }, "reference_code" : "1028"]');
					echo json_decode($ret);
				}
			break;
		
			case 'forgot_password_otp_varification':
				if (!empty($this->email_user_name) && !empty($this->otp)) {
					$response = $this->varModelObj->ListFromTable($var[11]);
					$data = json_decode($response, true);

					if (!empty($data)) {
						$dbOtp = $data[0]['otp'];
						if ($dbOtp == $this->otp) {
							$ret = json_encode('[{"status" : "Success", "message" : "OTP verified successfully" }, "reference_code" : "2010"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Invalid OTP. Please try again" }, "reference_code" : "1029"]');
							echo json_decode($ret);
						}
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "No user found with the provided email" }, "reference_code" : "1030"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Email and OTP are required" }, "reference_code" : "1031"]');
					echo json_decode($ret);
				}
			break;
			
			case 'update_customer_forgot_password':
				if (!empty($this->email_user_name) && !empty($this->new_password)) {
					$response = $this->varModelObj->UpdateTable($var[12]);

					if ($response) {
						$ret = json_encode('[{"status" : "Success", "message" : "Password updated successfully" }, "reference_code" : "2011"]');
						echo json_decode($ret);
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "Failed to update password" }, "reference_code" : "1032"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "new password required" }, "reference_code" : "1033"]');
					echo json_decode($ret);
				}
			break;
			
			case 'add_customer_shipping_address':
				if (empty($this->customer_id) || empty($this->shipping_address) || empty($this->postal_code) || empty($this->district) || empty($this->state) || empty($this->customer_name)) {
					$ret = json_encode('[{"status" : "Failed", "message" : "All fields are required" }, "reference_code" : "1034"]');
					echo json_decode($ret);
					break;
				}

				$response = $this->varModelObj->AddToTable($var[13]);
				if ($response) {
					$ret = json_encode('[{"status" : "Success", "message" : "Address added successfully" }, "reference_code" : "2012"]');
					echo json_decode($ret);
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Failed to add Address" }, "reference_code" : "1035"]');
					echo json_decode($ret);
				}
			break;
			
			case 'upadte_customer_profile':
				if (!empty($this->ids)){
					$response = $this->varModelObj->UpdateTable($var[14]);
					if ($response) {
						$ret = json_encode('[{"status" : "Success", "message" : "Profile updated successfully" }, "reference_code" : "2013"]');
						echo json_decode($ret);
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "No customer found for the provided ids" }, "reference_code" : "1036"]');
						echo json_decode($ret);
					}
				}
				else
				{
					$ret = json_encode('[{"status" : "Failed", "message" : "Failed to update profile" }, "reference_code" : "1037"]');
					echo json_decode($ret);
				}
			break;

            default:
				echo 'No Action Found...!';
            break;
            
        }

    }

}

$obj = new loginApiRequest();
$obj->APIRequest($obj->request);
?>