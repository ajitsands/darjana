<?php
require ('../../model/common/common_functions.php');
class productApiRequest
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
		$this->user_id = $_POST['user_id'];
		$this->category_id = $_POST['category_id'];
		$this->category_name = $_POST['category_name'];
		$this->sub_category_name = $_POST['sub_category_name'];
		$this->sub_category_id = $_POST['sub_category_id'];
		$this->product_name = $_POST['product_name'];
		$this->product_brand_name = $_POST['product_brand_name'];
		$this->amount_mrp = $_POST['amount_mrp'];
		$this->amount_selling = $_POST['amount_selling'];
		$this->amount_offer = $_POST['amount_offer'];
		$this->product_description = $_POST['product_description'];
		$this->warranty_details = $_POST['warranty_details'];
		$this->product_id = $_POST['product_id'];
		$this->customer_id = $_POST['customer_id'];
		$this->size_id = $_POST['size_id'];
		$this->color_id = $_POST['color_id'];
		$this->customer_address = $_POST['customer_address'];
		$this->address_id = $_POST['address_id'];
    }

    function SQLArray()
    {
        $array =  array();
         
            $array[0] = "INSERT INTO product_details (user_id, vendor_id, category_id, category_name, sub_category_id, sub_category_name, product_name, product_brand_name,
						amount_mrp, amount_selling, amount_offer, product_description, warranty_details) 
						VALUES ('".$this->user_id."', '".$this->vendor_id."', '".$this->category_id."', '".$this->category_name."', '".$this->sub_category_id."', '".$this->sub_category_name."', '".$this->product_name."', 
						'".$this->product_brand_name."', '".$this->amount_mrp."', '".$this->amount_selling."', '".$this->amount_offer."', '".$this->product_description."', '".$this->warranty_details."')"; 
						
			$array[1] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer FROM product_details 
						WHERE vendor_id = '".$this->vendor_id."'";
						
			$array[2] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer, product_description, warranty_details FROM product_details";	

			$array[3] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer, product_description, warranty_details FROM product_details 
						WHERE vendor_id = '".$this->vendor_id."' AND category_id = '".$this->category_id."' AND sub_category_id = '".$this->sub_category_id."'";
						
			$array[4] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer, product_description, warranty_details FROM product_details 
						WHERE category_id = '".$this->category_id."'";
						
			$array[5] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer, product_description, warranty_details FROM product_details 
						WHERE category_id = '".$this->category_id."' AND sub_category_id = '".$this->sub_category_id."'";
			
			$array[6] = "SELECT ids, category_type, category_image FROM category_details";
			
			$array[7] = "SELECT ids, category_type, category_image FROM category_details WHERE vendor_id = '".$this->vendor_id."'";
			
			$array[8] = "SELECT ids, sub_category FROM sub_category_details WHERE vendor_id = '".$this->vendor_id."' AND category_id = '".$this->category_id."'";
			
			$array[9] = "SELECT category_name, sub_category_name, product_name, product_brand_name, amount_mrp, amount_selling, amount_offer, product_description, warranty_details FROM product_details 
						WHERE vendor_id = '".$this->ids."'";
			
			$array[10] = "SELECT ids, amount_mrp, amount_selling, amount_offer, product_name, product_brand_name FROM product_details WHERE ids = '".$this->ids."'";
			
			$array[11] = "SELECT ids as color_id, product_color FROM product_specification_color WHERE ids = '".$this->color_id."' AND product_id = '".$this->ids."'";
			
			$array[12] = "SELECT ids as size_id, product_size FROM product_specification_size WHERE ids = '".$this->size_id."' AND product_id = '".$this->ids."'";
			
			$array[13] = "SELECT ids as image_id, product_image FROM product_image WHERE product_id = '".$this->ids."' LIMIT 1";
			
			$array[14] = "DELETE FROM cart_products WHERE product_id = '".$this->ids."'";
			
			$array[15] = "SELECT customer_name, permenant_address, postal_code, street, district, state, country, mobile_no, email_user_name FROM customer_details WHERE ids = '".$this->customer_id."'";
			
			$array[16] = "SELECT * FROM cart_products WHERE customer_id = '".$this->customer_id."' AND product_id = '".$this->product_id."'";
			
			$array[17] = "DELETE FROM cart_products WHERE customer_id = '".$this->customer_id."' AND product_id = '".$this->product_id."'";
			
			$array[18] = "SELECT ids, customer_id, shipping_address, postal_code, street, district, state, country, customer_name FROM customer_shipping_address WHERE customer_id = '".$this->customer_id."'";
			
			$array[19] = "SELECT customer_id, shipping_address, postal_code, street, district, state, country, customer_name FROM customer_shipping_address WHERE ids = '".$this->address_id."'";
			
			$array[20] = "SELECT ids, amount_mrp, amount_selling, amount_offer, product_name, product_brand_name FROM product_details WHERE ids = '".$this->product_id."'";
			
			$array[21] = "SELECT ids as color_id, product_color FROM product_specification_color WHERE ids = '".$this->color_id."' AND product_id = '".$this->product_id."'";
			
			$array[22] = "SELECT ids as size_id, product_size FROM product_specification_size WHERE ids = '".$this->size_id."' AND product_id = '".$this->product_id."'";
			
			$array[23] = "SELECT ids as image_id, product_image FROM product_image WHERE product_id = '".$this->product_id."' LIMIT 1";
			
		return $array;
    }
    
    function APIRequest($request)
    {
       
        $var =  $this->SQLArray();
        switch ($request)
        {

            case 'get_product_info_by_vendor':  
			
				$response=$this->varModelObj->ListFromJSon($var[1]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No products found"  },"refference_code" :
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
			
			case 'get_all_products_info':
				$response=$this->varModelObj->ListFromJSon($var[2]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No products found"  },"refference_code" :
                        "1001"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2001"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_products_info_by_vendor_category_sub_ids':
				$response=$this->varModelObj->ListFromJSon($var[3]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No products found"  },"refference_code" :
                        "1002"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2002"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_all_products_info_by_category_ids':
				$response=$this->varModelObj->ListFromJSon($var[4]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No products found"  },"refference_code" :
                        "1003"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2003"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_all_products_info_by_category_sub_ids':
				$response=$this->varModelObj->ListFromJSon($var[5]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No products found"  },"refference_code" :
                        "1004"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2004"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_all_category_detsils':
				$response=$this->varModelObj->ListFromJSon($var[6]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No category found"  },"refference_code" :
                        "1005"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2005"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_category_detsils_by_vendor':
				$response=$this->varModelObj->ListFromJSon($var[7]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No category found for this vendor"  },"refference_code" :
                        "1006"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2006"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_sub_categories':
				$response=$this->varModelObj->ListFromJSon($var[8]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No sub-category found for this category"  },"refference_code" :
                        "1007"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },"refference_code" :
                        "2007"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'get_individual_product_details':
				if (!empty($this->ids)){
					$response = $this->varModelObj->ListFromJSon($var[9]);
					if ($response) {
						$ret = json_encode('[{"status" : "Success", "message" : '.$response.' }, "reference_code" : "2008"]');
						echo json_decode($ret);
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "No product found for the provided ids" }, "reference_code" : "1008"]');
						echo json_decode($ret);
					}
				}
				else
				{
					$ret = json_encode('[{"status" : "Failed", "message" : "Failed to fetch product details" }, "reference_code" : "1009"]');
					echo json_decode($ret);
				}
			break;
			
			case 'add_to_cart':		
				if (!empty($this->ids) && !empty($this->customer_id)) {
					$productDetails = $this->varModelObj->ListFromTable($var[10]);
					$colorDetails = $this->varModelObj->ListFromTable($var[11]);
					$sizeDetails = $this->varModelObj->ListFromTable($var[12]);
					$imageDetails = $this->varModelObj->ListFromTable($var[13]);					

					if ($productDetails != "[]" && $colorDetails != "[]" && $sizeDetails != "[]" && $imageDetails != "[]") {
						$product = json_decode($productDetails, true)[0];
						$color = json_decode($colorDetails, true)[0];
						$size = json_decode($sizeDetails, true)[0];
						$image = json_decode($imageDetails, true)[0];

						$insertQuery = "INSERT INTO cart_products 
							(customer_id, product_id, product_amount_mrp, product_amount_selling, product_amount_offer, product_name, product_brand_name, color_id, product_color, image_id, product_image, size_id, product_size) 
							VALUES 
							('".$this->customer_id."', '".$product['ids']."', '".$product['amount_mrp']."', '".$product['amount_selling']."', '".$product['amount_offer']."', '".$product['product_name']."', '".$product['product_brand_name']."', '".$color['color_id']."', '".$color['product_color']."', '".$image['image_id']."', '".$image['product_image']."', '".$size['size_id']."', '".$size['product_size']."')";
							
						$insertResult = $this->varModelObj->AddToTable($insertQuery);

						if ($insertResult) {
							$cartQuery = "SELECT * FROM cart_products WHERE product_id = '".$this->ids."'";
							$cartDetails = $this->varModelObj->ListFromJSon($cartQuery);

							$ret = json_encode('[{"status" : "Success", "message" : '.$cartDetails.' }, "reference_code" : "2009"]');
							echo json_decode($ret);
						} else {
							$ret = json_encode('[{"status" : "Failed", "message" : "Failed to add product to cart" }, "reference_code" : "1010"]');
							echo json_decode($ret);
						}
					} else {
						$ret = json_encode('[{"status" : "Failed", "message" : "Failed to fetch product details" }, "reference_code" : "1011"]');
						echo json_decode($ret);
					}
				} else {
					$ret = json_encode('[{"status" : "Failed", "message" : "Invalid product ID or user ID" }, "reference_code" : "1012"]');
					echo json_decode($ret);
				}
			break;
			
			case 'delete_product_from_cart':
                if (!empty($this->ids)) {                   
                    $deleteResult = $this->varModelObj->DeleteRow($var[14]);
                    if ($deleteResult) {
                        $ret = json_encode('[{"status" : "Success", "message" : "Product removed from cart" }, "reference_code" : "2010"]');
                        echo json_decode($ret);
                    } else {
                        $ret = json_encode('[{"status" : "Failed", "message" : "Failed to remove product from cart" }, "reference_code" : "1013"]');
                        echo json_decode($ret);
                    }
                } else {
                    $ret = json_encode('[{"status" : "Failed", "message" : "Invalid product ID" }, "reference_code" : "1014"]');
                    echo json_decode($ret);
                }
            break;

			case 'checkout_from_cart':
				if (!empty($this->customer_id)) {
					$customerDetails = $this->varModelObj->ListFromTable($var[15]);

					if ($customerDetails != "[]") {
						$customer = json_decode($customerDetails, true)[0];

						$cartDetails = $this->varModelObj->ListFromTable($var[16]);

						if ($cartDetails != "[]") {
							$cartProducts = json_decode($cartDetails, true);

							$addressDetails = $this->varModelObj->ListFromTable($var[19]);

							if ($addressDetails != "[]") {
								$address = json_decode($addressDetails, true)[0];

								$orderSuccess = true;

								foreach ($cartProducts as $product) {
									$insertOrderQuery = "INSERT INTO order_details 
										(customer_id, product_id, product_name, color_id, product_color, size_id, product_size, image_id, product_image, vendor_id, 
										customer_name, customer_address, postal_code, street, district, state, country, customer_mobile_no, customer_email) 
										VALUES 
										('".$this->customer_id."', '".$product['product_id']."', '".$product['product_name']."', 
										'".$product['color_id']."', '".$product['product_color']."', '".$product['size_id']."', '".$product['product_size']."', 
										'".$product['image_id']."', '".$product['product_image']."', '".$this->vendor_id."', 
										'".$customer['customer_name']."', '".$address['shipping_address']."', '".$address['postal_code']."', 
										'".$address['street']."', '".$address['district']."', '".$address['state']."', '".$address['country']."', 
										'".$customer['mobile_no']."', '".$customer['email_user_name']."')";

									$insertResult = $this->varModelObj->AddToTable($insertOrderQuery);

									if ($insertResult) {
										$deleteCartQuery = "DELETE FROM cart_products WHERE customer_id = '".$this->customer_id."' AND product_id = '".$product['product_id']."'";
										$this->varModelObj->DeleteRow($deleteCartQuery);
									} else {
										$orderSuccess = false;
									}
								}

								if ($orderSuccess) {
									$ret = json_encode(['status' => 'Success', 'message' => 'Order placed successfully', 'reference_code' => '2011']);
									echo $ret;
								} else {
									$ret = json_encode(['status' => 'Failed', 'message' => 'Failed to place order', 'reference_code' => '1015']);
									echo $ret;
								}
							} else {
								$ret = json_encode(['status' => 'Failed', 'message' => 'No shipping address found', 'reference_code' => '1016']);
								echo $ret;
							}
						} else {
							$ret = json_encode(['status' => 'Failed', 'message' => 'Cart is empty', 'reference_code' => '1017']);
							echo $ret;
						}
					} else {
						$ret = json_encode(['status' => 'Failed', 'message' => 'Customer details not found', 'reference_code' => '1018']);
						echo $ret;
					}
				} else {
					$ret = json_encode(['status' => 'Failed', 'message' => 'Invalid customer ID', 'reference_code' => '1019']);
					echo $ret;
				}
			break;
			
			case 'get_customer_address':
				$response=$this->varModelObj->ListFromJSon($var[18]);   

				if ($response=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No address found"  },"refference_code" :
                        "1020"]');
                     echo json_decode($ret);
                }
                else
                {
					$ret = json_encode('[{"status" : "Success","message" : '.$response.'  },,"refference_code" :
                        "2012"]');
                    echo json_decode($ret);
                } 
			break;
			
			case 'direct_checkout':
				if (!empty($this->customer_id) && !empty($this->product_id)) {
					$customerDetails = $this->varModelObj->ListFromTable($var[15]);

					if ($customerDetails != "[]") {
						$customer = json_decode($customerDetails, true)[0];

						$productDetails = $this->varModelObj->ListFromTable($var[20]);

						if ($productDetails != "[]") {
							$product = json_decode($productDetails, true)[0];

							$colorDetails = $this->varModelObj->ListFromTable($var[21]);

							$sizeDetails = $this->varModelObj->ListFromTable($var[22]);

							$imageDetails = $this->varModelObj->ListFromTable($var[23]);

							if ($colorDetails != "[]" && $sizeDetails != "[]" && $imageDetails != "[]") {
								$color = json_decode($colorDetails, true)[0];
								$size = json_decode($sizeDetails, true)[0];
								$image = json_decode($imageDetails, true)[0];

								$addressDetails = $this->varModelObj->ListFromTable($var[19]);

								if ($addressDetails != "[]") {
									$address = json_decode($addressDetails, true)[0];

									$insertOrderQuery = "INSERT INTO order_details 
										(customer_id, product_id, product_name, color_id, product_color, size_id, product_size, image_id, product_image, vendor_id, 
										customer_name, customer_address, postal_code, street, district, state, country, customer_mobile_no, customer_email) 
										VALUES 
										('".$this->customer_id."', '".$product['ids']."', '".$product['product_name']."', 
										'".$color['color_id']."', '".$color['product_color']."', '".$size['size_id']."', '".$size['product_size']."', 
										'".$image['image_id']."', '".$image['product_image']."', '".$this->vendor_id."', 
										'".$customer['customer_name']."', '".$address['shipping_address']."', '".$address['postal_code']."', 
										'".$address['street']."', '".$address['district']."', '".$address['state']."', '".$address['country']."', 
										'".$customer['mobile_no']."', '".$customer['email_user_name']."')";

									$insertResult = $this->varModelObj->AddToTable($insertOrderQuery);

									if ($insertResult) {
										$ret = json_encode(['status' => 'Success', 'message' => 'Order placed successfully', 'reference_code' => '2013']);
										echo $ret;
									} else {
										$ret = json_encode(['status' => 'Failed', 'message' => 'Failed to place order', 'reference_code' => '1021']);
										echo $ret;
									}
								} else {
									$ret = json_encode(['status' => 'Failed', 'message' => 'No shipping address found', 'reference_code' => '1022']);
									echo $ret;
								}
							} else {
								$ret = json_encode(['status' => 'Failed', 'message' => 'Failed to fetch product color, size, or image details', 'reference_code' => '1023']);
								echo $ret;
							}
						} else {
							$ret = json_encode(['status' => 'Failed', 'message' => 'Product details not found', 'reference_code' => '1024']);
							echo $ret;
						}
					} else {
						$ret = json_encode(['status' => 'Failed', 'message' => 'Customer details not found', 'reference_code' => '1025']);
						echo $ret;
					}
				} else {
					$ret = json_encode(['status' => 'Failed', 'message' => 'Invalid customer ID or product ID', 'reference_code' => '1026']);
					echo $ret;
				}
				break;
			
			default:
				echo 'No Action Found...!';
            break;
           
        }

    }

}

$obj = new productApiRequest();
$obj->APIRequest($obj->request);
?>