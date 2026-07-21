<?php session_start();?>
<?php 

include $_SERVER['DOCUMENT_ROOT']."/model/db_connection/connection.php" ;
abstract class FunctionDefinitions
{
	abstract public function ListFromTable($SQL);
	abstract public function ListFromTableReturn($SQL);
	abstract public function ListFromTableWithOutData($SQL);
	abstract public function ListFromTableWithOutDataReturn($SQL);
	abstract public function ListFromTableOfgrouplist($SQL);
    abstract public function AddToTable($SQL);
    abstract public function ReturnCountValue($SQL);
	abstract public function CreateDropDown($SQL,$value,$text,$controlName,$title);
	abstract public function returnValuefromDB($SQL,$item);
	abstract public function UpdateTable($SQL);
	abstract public function DeleteRow($SQL);
    abstract public function userAuthentication($SQL,$SQL1,$password);
	abstract public function SignOut();
	abstract public function ExecuteProcedure($SQL);
	abstract public function userAuthenticationforcheck($SQL,$password);
	
	abstract public function CreateDropDownForSite($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function ExecuteProcedureForReturnTableFormat($SQL);
	abstract public function ListFromAcntsTable($SQL);
	abstract public function CreateDropDownforProject($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function CreateDropDownforSubject($SQL,$value,$value1,$text,$controlName,$title);
	abstract public function CreateSQLQueryForInsert($form_data,$table_name,$colNames=array(),$column_value=array());
	abstract public function ExecuteSQLQueryForInsert($SQL);
	
	abstract public function check_user_count($SQL);
	abstract public function ExecuteProcedureReturnMultiplevalues($SQL);
	abstract public function ScheduleData($SQL);
	
	abstract public function WhatsAppKey();
	
}

class CommonModel extends FunctionDefinitions
{
	public $varDBConnection,$varAcntConnection;
	var $result;
	var $flag=0;
	

	function __construct()
	{
		$DBConn = new DBConnection();
		$this->varDBConnection = $DBConn->ConnectToMYSQL();
   //	$ACNTConn= new AcntConnection();
	//	$this->varAcntConnection=$ACNTConn->ConnectToMYSQLAcnts();
	}
    public function WhatsAppKey()
    {
        return 'EAATLuWFVcZBkBO6sQ6pqfs5hM5xsJizqXkl9nXJH9ZAxbcuVZCSpHE36ftVxMCH348gbLLU3GtBZC72PVKLaKBqbjaq0RnBNJkZB3Kp0SYgCNAbQ7NgVz4bKTROJpXcUnH3wVDSgXWGoVArZCNUryDr0vTMRylcicmopJOZAj3p6ivGXpmvNtnz2ZCGxhX6whYm8C0abU36ft6PlWQZC8';
    }
	public function ListFromTable($SQL)
	{
	
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    	
			$temp['data'][] = $row;
		
		}
	
	//	return json_encode($temp);
		echo json_encode($temp);
			$this->flag=1;
	}
	public function ListOfTemplates($SQL)
	{
	    $temp='';
	    $this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    $html='<option value="'.$row['template_code'].'" data-name="'.$row['template_name'].'" data-image="img/avatars/20.png" selected>'.$row['template_name'].'</option>';
		    $temp .= $html;
		}
		$this->flag=1; 
		return $temp;
			
	}
	
	
// public function ListFromTableOfgrouplist($SQL)
//   {
//     $temp = '';

//     $this->result = mysqli_query($this->varDBConnection, $SQL);
//     while ($row = mysqli_fetch_assoc($this->result)) {
        
//         $group_id = $row['ids']; 
//         $members_query = "SELECT * FROM contact_list WHERE group_id = $group_id";
//         $members_result = mysqli_query($this->varDBConnection, $members_query);

       
//         $html = '<li class="chat-contact-list-item">
//                     <a class="d-flex align-items-center" href="#">
//                         <div class="avatar d-block flex-shrink-0">
//                             <span class="avatar-initial rounded-circle" style="background-color: ' . $row['color_code'] . '; color: white;">' . $row['icon_code'] . '</span>
//                         </div>
//                         <div class="chat-contact-info flex-grow-1 ms-4">
//                             <h6 class="chat-contact-name text-truncate m-0 fw-normal">' . $row['group_name'] . '</h6>
//                         </div>
//                     </a>
//                 </li>';
//              //    // // // // // 

//         $temp .= $html;
//     }

//     $this->flag = 1;
//     echo $temp;
// }

	
	
	
	

	
//   public function ListFromTableOfgrouplist($SQL)
// 	{
// 	    $temp='';

	
// 		$this->result = mysqli_query($this->varDBConnection, $SQL);
// 		while($row=mysqli_fetch_assoc($this->result)) {
		     
// 		    $html='<li class="chat-contact-list-item">
//                     <a class="d-flex align-items-center" href="#">
//                         <div class="avatar d-block flex-shrink-0">
//                             <span class="avatar-initial rounded-circle" style="background-color: ' . $row['color_code'] . '; color: white;">' . $row['icon_code'] . '</span>
//                         </div>
//                         <div class="chat-contact-info flex-grow-1 ms-4">
//                             <h6 class="chat-contact-name text-truncate m-0 fw-normal">' . $row['group_name'] . '</h6>
//                         </div>
//                     </a>
//                 </li>';
               
                
              	
// 			$temp .= $html;
		
// 		}
// 		$this->flag=1; 
// 		echo $temp;
			
// 	}	
	
	
	
	
// 	public function ListFromTableOfContactList($SQL)
// 	{
// 	    $temp='';
// 	$values = ['primary', 'success', 'danger', 'info', 'secondery', 'warning', 'dark'];
	
// 		$this->result = mysqli_query($this->varDBConnection, $SQL);
// 		while($row=mysqli_fetch_assoc($this->result)) {
// 		        $group_id=$row['group_id'];
// 		    	$randomIndex = array_rand($values);
//                 $randomValue = $values[$randomIndex];
                
// 		    $f_name = substr($row['first_name'], 0, 1);
// 		    $l_name = substr($row['last_name'], 0, 1);
// 		    $html='<li class="chat-contact-list-item">
//                   <a class="d-flex align-items-center">
//                     <div class="avatar d-block flex-shrink-0">
//                       <span class="avatar-initial rounded-circle bg-label-'.$randomValue.'">'.$f_name.$l_name.'</span>
//                     </div>
//                     <div class="chat-contact-info flex-grow-1 ms-4">
//                       <h6 class="chat-contact-name text-truncate m-0 fw-normal">'.$row['first_name'].' '.$row['last_name'].'</h6>
//                       <small class="chat-contact-status text-truncate">'.$row['phone_number'].'</small>
//                     </div>
//                   </a>
//                 </li>';
		    	
// 			$temp .= $html;
		
// 		}
// 		$this->flag=1; 
// 		return $temp;
			
// 	}

  public function ListFromTableOfgrouplist($SQL)
   {
    $temp = '';

    $this->result = mysqli_query($this->varDBConnection, $SQL);
    while ($row = mysqli_fetch_assoc($this->result)) {
        $group_id = $row['ids']; 
        $members_query = "SELECT COUNT(*) as counts_contacts FROM contact_list WHERE group_id = $group_id";
        $members_result = mysqli_query($this->varDBConnection, $members_query);
        $members_row = mysqli_fetch_assoc($members_result);
        $counts_contacts = $members_row['counts_contacts'];
        
        $html = '<li class="chat-contact-list-item">
                    <a class="d-flex align-items-center" href="#">
                        <div class="avatar d-block flex-shrink-0">
                            <span class="avatar-initial rounded-circle" style="background-color: '.$row['color_code'].'; color: white;">' .$row['icon_code'] . '</span>
                        </div>
                        <div class="chat-contact-info flex-grow-1 ms-4">
                            <h6 class="chat-contact-name text-truncate m-0 fw-normal"  value="' . $row['icon_code'] . '-' . $row['ids'] . '" >' .$row['group_name']. '</h6>
                            <span id="group_ids_formessage" style="display:none">'.$row['icon_code']. '-' . $row['ids'].'</span>
                        </div>
                        <span class="badge badge-center rounded-pill bg-label-info">' . $counts_contacts . '</span>
                    </a>
                </li>';


        $temp .= $html;
    }

    $this->flag = 1; 
    echo $temp;
}



   public function ListFromTableOfContactList($SQL) {
    $temp = '';
    $values = ['primary', 'success', 'danger', 'info', 'secondery', 'warning', 'dark'];
    
    $this->result = mysqli_query($this->varDBConnection, $SQL);
    while ($row = mysqli_fetch_assoc($this->result)) {
        $group_id = $row['group_id'];
        $randomIndex = array_rand($values);
        $randomValue = $values[$randomIndex];
        
        $f_name = substr($row['first_name'], 0, 1);
        $l_name = substr($row['last_name'], 0, 1);
        
        $iconHtml = '';
        
        if ($group_id != 0) {
            // Fetch the icon name and color from the groupcontact table
            $groupSQL = "SELECT icon_code, color_code FROM contact_group WHERE ids = $group_id";
           // echo "SELECT icon_code, color_code FROM contact_group WHERE ids = $group_id";
            $groupResult = mysqli_query($this->varDBConnection, $groupSQL);
            if ($groupRow = mysqli_fetch_assoc($groupResult)) {
                $iconName = $groupRow['icon_code'];
                $color = $groupRow['color_code'];
                $iconHtml = '<span class="badge" style="background-color: ' . $color . '; color: white; border-radius:3;"><strong>' . $iconName . '</strong></span>';
                //$iconHtml = '<span class="badge badge-center" style="color:'.$color.';">' . $iconName . '</span>';

            }
        }
        
        $html = '<li class="chat-contact-list-item">
                  <a class="d-flex align-items-center">
                    <div class="avatar d-block flex-shrink-0">
                      <span class="avatar-initial rounded-circle bg-label-' . $randomValue . '">' . $f_name . $l_name . '</span>
                    </div>
                    <div class="chat-contact-info flex-grow-1 ms-4">
                      <h6 class="chat-contact-name text-truncate m-0 fw-normal">' . $row['first_name'] . ' ' . $row['last_name'] . ' </h6>
                      <small class="chat-contact-status text-truncate">' . $row['phone_number'] . ' ' . $iconHtml . '</small>
                    </div>
                  </a>
                </li>';
        
        $temp .= $html;
    }
    
    $this->flag = 1; 
    return $temp;
}





	public function ListFromTableOfContactListJSON($SQL)
	{
	
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    $temp[] = $row;
		}
		$this->flag=1; 
		return json_encode($temp);
			
	}
	
	
	public function ChatHistoryOnClick($SQL)
	{
	    $temp ="";
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
	         if($row['trnsaction_status']=='Send')
	         {  
	            if($row['webhook_status'] == 'sent') {
                        $check = '<i class="ri-send-plane-line ri-14px text-success me-1"></i>';
                    } else if($row['webhook_status'] == 'delivered') {
                        $check = '<i class="ri-check-double-line ri-14px text-secondary me-1"></i>';
                    } else if($row['webhook_status'] == 'read') {
                        $check = '<i class="ri-check-double-line ri-14px text-success me-1"></i>';
                    } else if($row['webhook_status'] == 'failed') {
                        $check = '<i class="ri-close-line ri-14px text-danger me-1"></i>';
                    }

	             
	             $html ='<li class="chat-message chat-message-right">
                            <div class="d-flex overflow-hidden" >
                              <div class="chat-message-wrapper flex-grow-1">
                                <div class="chat-message-text">
                                  <p class="mb-0">'.$row['reply_body'].'</p>
                                </div>
                                <div class="text-end text-muted mt-1">
                                  '.$check.'
                                  <small style="font-size:11px">'.$row['timestamp'].'</small>
                                </div>
                              </div>
                              <div class="user-avatar flex-shrink-0 ms-4">
                                <div class="avatar avatar-sm">
                                  <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                </div>
                              </div>
                            </div>
                          </li>';
	         }
		     else
		     {
		          $html ='<li class="chat-message">
                            <div class="d-flex overflow-hidden">
                              <div class="user-avatar flex-shrink-0 me-4">
                                <div class="avatar avatar-sm">
                                  <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                </div>
                              </div>
                              <div class="chat-message-wrapper flex-grow-1">
                                <div class="chat-message-text">
                                  <p class="mb-0">'.$row['reply_body'].'</p>
                                 
                                </div>
                               
                                <div class="text-muted mt-1">
                                  <small style="font-size:11px">'.$row['timestamp'].'</small>
                                </div>
                              </div>
                            </div>
                          </li>';
		     }
		    	
			$temp .= $html;
		
		}
			$this->flag=1;
		return $temp;
		
	}
	
	public function ListFromTableReturn($SQL)
	{
	
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    	
			$temp['data'][] = $row;
		
		}
	
// 		echo json_encode($temp);
        return json_encode($temp);
		$this->flag=1;
		
		
	}
	public function ListFromTableWithOutData($SQL)
	{
	
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    	
		$temp[] = $row;
		
		}
	    	$this->flag=1;
		//return json_encode($temp);
 		echo json_encode($temp);
		
	}
	public function ListFromTableWithOutDataReturn($SQL)
	{
	
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection, $SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		    	
		$temp[] = $row;
		
		}
	    	$this->flag=1;
		return json_encode($temp);
		
	}
	
		public function ListFromAcntsTable($SQL)
	{
		//echo $SQL;
		$temp = array();
		$this->result = mysqli_query($this->varAcntConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
		}
		$this->flag=1;
		echo json_encode($temp);
		
	}
  

    function ReturnCountValue($SQL)
	{
			$this->result = mysqli_query($this->varDBConnection,$SQL);
			$affected_status = mysqli_num_rows($this->result);
			$this->flag=1;
			return $affected_status;
	}
	

	public function CreateDropDown($SQL,$value,$text,$controlName,$title)
	{
		
		$str = "<select class='form-control form-control-sm'  id='".$controlName."' name='".$controlName."'><option value=0>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$str."<option value='".trim($row[$value])."'>".trim($row[$text])."</option>";
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	public function CreateDropDownForPRN($SQL,$value,$text,$controlName,$title,$variable_prn)
	{
		
		
		$str = "<select class='form-control form-control-sm'  id='".$controlName."' name='".$controlName."'><option value=0>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$str."<option value='".trim($row[$value])."'>".trim($row[$text])."</option>";
		}

		$str = $str.'</select>';

		$this->flag=1;
		echo $str;
		
	}
	function ExecuteProcedureReturnMultiplevalues($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as msg,@msg1 as msg1"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
            
			echo json_encode($row);
            return json_encode($row);     
	}
	
	
	
	
	public function CreateDropDownForSite($SQL,$value,$value1,$value2,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
			//$str=$str."<option value=".$row[$value]."-".$row[$value1]."-".$row[$value2].">".$row[$text]."</option>";
			$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	public function CreateDropDownForSubject($SQL,$value,$value1,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
	
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
		$str=$str."<option value=".trim($row[$value])."-".trim($row[$value1]).">".trim($row[$text])."</option>";
			//$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}

		public function CreateDropDownforProject($SQL,$value,$value1,$value2,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control form-control-sm'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varAcntConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
			$str=$str."<option value=".trim($row[$value])."/".trim($row[$value1]).">".$row[$text]." ( ".trim($row[$value1])." )"."</option>";
			//$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	public function returnValuefromDB($SQL,$item)
	{
		
		$res=0;
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$res=$row[$item];
		}

		$this->flag=0;
		echo $res;
		return $res;
		
	}
    
   
	
  
	public function userAuthentication($SQL,$SQL1,$password)
	{
	
		$user_name; 
		$user_contact_number ;
		$user_address;
		$user_whatsapp_no;
		$user_email_id;
		$user_type_id;
        $user_type_name;
        $user_username;
		$user_password;
		$user_image;
        $user_status;
        $user_real_name;
        $$user_id;
        
        $privilege;
        
           

       
        
        $return_string="";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		$row_count = mysqli_num_rows($this->result);
		
		if($row_count>=1)
		{

            while($row=mysqli_fetch_assoc($this->result))
             {
			
				$user_id =$row['id'];
			 
                $user_username =$row['username'];
        		$user_password =$row['password'];
        	    $user_real_name = $row['name'];
                $user_status =$row['status'];
				}
			
			if($user_status=='Active')
			{
				if($password==$user_password)
				{
					session_start();
					
					                $this->result = mysqli_query($this->varDBConnection,$SQL1);
                            		$row_count = mysqli_num_rows($this->result);
                            		
                            		if($row_count>=1)
                            		{
                                    $temp = array();
                            	
                            		while($row=mysqli_fetch_assoc($this->result)) {
                            			$temp['data'][] = $row;
                            		}
                            		
                                     $_SESSION['privilege']  = json_encode($temp);
                                         
                            		}  
					              
									
									// Store data in session variables
									
									
									$_SESSION["loggedin"] = "true";
									$_SESSION["user_id"] = $user_id;
									$_SESSION["user_name"] = $user_name; 
								 
									$_SESSION["user_username"] = $user_username;
									$_SESSION["user_password"] = $user_password; 
									
									$_SESSION["user_status"] = $user_status;
									$_SESSION['LOGINSTATUS']='true';
								    $_SESSION['USERROLLID']=$user_id;
									$_SESSION["user_real_name"] = $user_real_name;
								
										$return_string="dashboard.php?sm=5";
									
									
									
									
									
									
									return 'true'.'#'.$return_string;
				}
				else
				{
					return 'Please provide correct password...!';
				}

			}
			else
			{
				return 'Your Login is not active, Please contact your administrator..!';
			}
			
		
		}
		else
		{
			return 'Username does not Exists...!';
		}
		
		
		
		$this->flag=1;
		
		
	}


	
	
	function AddToTable($SQL)
	{
		try { 
				mysqli_query($this->varDBConnection, $SQL);
				$inserted_id = mysqli_insert_id($this->varDBConnection);
				$this->flag=0;
				echo $inserted_id;
				return $inserted_id;
		}
		catch (mysqli_sql_exception $e) { 
			return $e->errorMessage(); 
		} 
		//exit();
		
	}

	function UpdateTable($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			return $affected_status;
	}




	function DeleteRow($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			echo $affected_status;
	}
	
    	public function userAuthenticationforcheck($SQL,$password)
	{
	
        $user_username;
		$user_password;
        $return_string="";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		$row_count = mysqli_num_rows($this->result);
		
		if($row_count>=1)
		{
         
            while($row=mysqli_fetch_assoc($this->result))
             {
			
				$user_ids =$row['ids'];
				$user_name =$row['user_name'];
                $company_name =$row['company_name'];
        		$user_password =$row['password'];
                $user_status =$row['status'];
                
			 }
			 
			if($user_status=='Active')
			{
			   	
				if($password==$user_password)
				{
					session_start();
			  	 
							
								
								
									$_SESSION["loggedin"] = "true";
									$_SESSION["user_id"] =	$user_ids;
				// 				    $_SESSION["username"] = $username;
				// 					$_SESSION["password"] = $user_password; 
				// 					$_SESSION["user_id"] =  $user_id; 
				// 					$_SESSION["user_status"] = $user_status;
				// 					$_SESSION['LOGINSTATUS']='true';
									$return_string="home";
									//echo 'true'.'#'.$return_string;
									return $return_string;
								 	//$return_string="index.php?param=$this->varEncode";
									//return 'true'.'#'.$return_string;
								// 	return 'Success';
				}
				else
				{
					return 'Please provide correct password...!';
				}

			}
			else
			{
				return 'Your Login is not active, Please contact your administrator..!';
			}
			
		
		}
		else
		{
			return 'Email does not Exists...!';
		}
		
		
		
		$this->flag=1;
			
		
	}
	
    
	public function SignOut()
	{
	
		session_start();
		$_SESSION = array();
		session_destroy();
	}

   public function ExecuteProcedure($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as _p_out"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			echo $row['_p_out'];
			return $row['_p_out'];
		
			
	}

	
	
	function ExecuteProcedureForReturnTableFormat($SQL) 
	{	
			$temp = array();
			$this->result = mysqli_query($this->varDBConnection,$SQL);
			while($row=mysqli_fetch_assoc($this->result)) {
			
				$temp['data'][] = $row;
			}
	
			$this->flag=1;
			
			echo json_encode($temp);

	}
	
	
	 // Column Name and  Should be Array Parameter Eg : array('Fist Value','Second Value') as So on
    //  1 Param = Serialize data from from 
    //  2 Param = Table Name Which you want to Insert 
    //  3 Param = Extra colum Whichis not in Serilized But you want to Insert Eg: array('loginuserid','loginusername'....)
    //  4 Param = Extra Columns values in param 3 Eg array('1','ajit')
    //  5 Param = Which Columns you wanrt to ignore from the Serilized Data Eg array('reEntryPassword')
    //  6 Param = Which columns you want to convert to system Date format Eg : array('25-05-1973') it will conver to 1973-05-25
    // Last 2 Parameters are Optional 
   function CreateSQLQueryForInsert($form_data,$table_name,$colNames=array(),$column_value=array(),$exceptions=array(),$dateFormating=array()) 
   {
       
       // Creating the Insert Column Names 
        $insertSQL = '"insert into '.$table_name.'(';
        foreach($form_data as $key => $value) 
        {
          
            if (in_array(trim($key), $exceptions) ==0) // ingnore some columns if any with the array parameter $exceptions
            {
               $param = $param.$key.",";
            }
           
            //$key = explode('-',$key);
            
        }
        // Adding Specified column name as parameter pass as colNames this columns adding to the insert column
        foreach($colNames as $column){
             $param = $param.$column.",";
        }
        // For Removing the last coma from the string 
        $cols =  substr_replace($param ,") values (",-1)  ;
        
        
        // Adding Values to the inser Query to the above String 
        foreach($form_data as $key => $value) 
        {
             
            if (in_array(trim($key), $exceptions)==0) // ingnore some values if any with the array parameter $exceptions
            {
              
               if(in_array(trim($key), $dateFormating)==1) // For Formating Date to System formate Eg : 25-052022 to 2022-05-25// Column name
               {
                   $value = date("Y-m-d", strtotime($value));
               }
               $values = $values."'".$value."',";
            }
         
        }
        // adding additional Values If any 
        foreach($column_value as $columnvalue){
             $values = $values."'".$columnvalue."',";
        }        
                
        // Removing last Coma from the string 
        $vals =  substr_replace($values ,')"',-1)  ;
        
        // Adding Column names and Values to gather to mahe the Redy Executable SQL String 
        $final_SQL = $insertSQL.$cols.$vals;
        
        return $final_SQL;
       
   
    }  
	
		public function ExecuteSQLQueryForInsert($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as _p_out"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			return $row['_p_out'];
		
			
	}
	
	public function check_user_count($SQL)
	{
		
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		
		while($row=mysqli_fetch_assoc($this->result)) {
			$card_count=$row['count'];
		}
		
		echo $card_count;
			
		
	}
	public function ScheduleData($SQL)
	{
	    $this->result = mysqli_query($this->varDBConnection,$SQL);
	    $data = array();
            while ($row = $this->result->fetch_assoc()) {
                $formattedDate = date('Y-m-d', strtotime($row['due_date']));
                $data[] = array($formattedDate, (int)$row['due_counts']);
            }
        echo json_encode($data);    
	}

	function __destruct() {
		if($this->flag==1)
		{
			mysqli_free_result($this->result);
		}
		
		mysqli_close($this->varDBConnection);
		//mysqli_close($this->varAcntConnection);
		//print "Destroying " . __CLASS__ . "\n";
		
    }
	
	

}

?>