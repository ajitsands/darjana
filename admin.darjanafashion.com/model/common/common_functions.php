<?php 
session_start();
?>
<?php 

include $_SERVER['DOCUMENT_ROOT']."/model/db_connection/connection.php" ;

abstract class FunctionDefinitions
{
	abstract public function ListFromTable($SQL);
    abstract public function AddToTable($SQL);
    abstract public function AddToTabless($SQL,$parms,$types);
    abstract public function AddToTableWithoutReturn($SQL);
    abstract public function ReturnCountValue($SQL);
	abstract public function CreateDropDown($SQL,$value,$text,$controlName,$title);
	abstract public function returnValuefromDB($SQL,$item);
	abstract public function UpdateTable($SQL);
	abstract public function UpdateTable1($SQL);
	abstract public function DeleteRow($SQL);
    abstract public function userAuthenticationforcheck($SQL,$password);
    //abstract public function userAuthenticationforAdmincheck($SQL,$password);
	abstract public function SignOut();
	abstract public function ExecuteProcedure($SQL);
	abstract public function ListFromJSonReturn($SQL);
	abstract public function ExecuteProcedureReturnValue($SQL);
	abstract public function ExecuteProcedureReturnMultiplevalues($SQL);
	abstract public function CreateDropDownForSite($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function ExecuteProcedureForReturnTableFormat($SQL);
	abstract public function ExecuteProcedureWithReturn($SQL);
	abstract public function ExecuteSQLQueryForInsert($SQL);
	abstract public function ExecuteProcedureForTenant($SQL);
	

	abstract public function CreateDropDownforProject($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function CreateDropDownforSubject($SQL,$value,$value1,$text,$controlName,$title);
	abstract public function ChangePassword($SQL,$password);
	abstract public function CheckSignatureCount($SQL);
	abstract public function ListFromJSon($SQL);
	abstract public function ListFromJSonWithOutData($SQL);
	abstract public function CreateSQLQueryForInsert($form_data,$table_name,$colNames=array(),$column_value=array());
	abstract public function UpdateSQLQuery($form_data,$table_name, $where_col=array(), $where_values=array(), $condition="");
	abstract public function UploadImageTotheFolder($target_folder_name,$file_name);
	abstract public function AddToTablePayment($SQL);
	abstract public function sendGCM($message_title,$message, $deviceToken ,$apikey);
	abstract public function ListDeviceIds($Sql);
	abstract public function WhatsAppKey();
	abstract public function ScheduleData($SQL);
	//abstract public function MasterIdfromTable(Sql);
    //Example Calls 
    //UpdateSQLQuery($formdata,$table_name,array('userid','date'),array('100','12-12-2021'),'OR'); // One Condition and other Column Parameter
    //UpdateSQLQuery($formdata,$table_name,array(),array()," where (name='Ajit' and dob ='12/12/2022') and ID =10"); // Custom Query
    //UpdateSQLQuery($formdata,$table_name);  //All Update Column Parameter
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
	
	}
	public function ScheduleData($SQL)
	{
	    $this->result = mysqli_query($this->varDBConnection,$SQL);
	    $data = array();
            while ($row = $this->result->fetch_assoc()) {
                $formattedDate = date('Y-m-d', strtotime($row['cheque_date']));
                $data[] = array($formattedDate, (int)$row['due_counts']);
            }
        echo json_encode($data);    
	}

	public function ListFromTable($SQL)
	{
		//echo $SQL;
		$this->varDBConnection->query("SET character_set_client=utf8");
        $this->varDBConnection->query("SET character_set_connection=utf8");
        $this->varDBConnection->query("SET character_set_results=utf8");
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp[] = $row;
		}
		$this->flag=1;
		return json_encode($temp);
		
	}
	
	public function ListDeviceIds($SQL)
	{
		//echo $SQL;
		$this->varDBConnection->query("SET character_set_client=utf8");
        $this->varDBConnection->query("SET character_set_connection=utf8");
        $this->varDBConnection->query("SET character_set_results=utf8");
		//$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp = $temp."'".$row['device_id']."',";
	
		}
		//echo $temp;
		$temp = rtrim( $temp,",");
		
		$this->flag=1;
		return $temp;
		
	}
	public function ListFromJSon($SQL)
	{
		//echo $SQL;
		$this->varDBConnection->query("SET character_set_client=utf8");
        $this->varDBConnection->query("SET character_set_connection=utf8");
        $this->varDBConnection->query("SET character_set_results=utf8");
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
			
		}
		$this->flag=1;
		
		return json_encode($temp);
		
		
	}
	public function ListFromJSonReturn($SQL)
	{
		//echo $SQL;
		$this->varDBConnection->query("SET character_set_client=utf8");
        $this->varDBConnection->query("SET character_set_connection=utf8");
        $this->varDBConnection->query("SET character_set_results=utf8");
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
			
		}
		$this->flag=1;
		
		return json_encode($temp);
		
		
	}
	
	
	
	public function ListFromJSonWithOutData($SQL)
	{
		//echo $SQL;
		$this->varDBConnection->query("SET character_set_client=utf8");
        $this->varDBConnection->query("SET character_set_connection=utf8");
        $this->varDBConnection->query("SET character_set_results=utf8");
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp = $row;
		}
		$this->flag=1;
		return $temp;
		//echo json_encode($temp);
		
	}
	
	public function CheckSignatureCount($SQL)
	{
		$str = 'ZERO';
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$row['ids'];
		}
		$this->flag=1;
		echo $str;
	
		
	}
  

    function ReturnCountValue($SQL)
	{
			$this->result = mysqli_query($this->varDBConnection,$SQL);
			$affected_status = mysqli_num_rows($this->result);
			$this->flag=0;
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
    

	public function userAuthenticationforcheck($SQL,$password)
	{
	   
	    $user_id;
	    $user_email;
	    $user_name;
        $user_username;
		$user_password;
		$user_status;
		$user_user_type;
        $return_string="";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		$row_count = mysqli_num_rows($this->result);
	
		if($row_count>=1)
		{
         
            while($row=mysqli_fetch_assoc($this->result))
             {
			    $user_id =$row['ids'];
			   
        		$user_username =$row['email_username'];
                $user_password =$row['user_password'];
                $user_status=$row['status'];
                $user_role=$row['role'];
                $vendor_id=$row['vendor_id'];
                
                 
			 }
			 
			if($user_status=='Active')
			{
			 //  echo 'password'.$password;
			//    echo 'user password'.$user_password;
				if($password==$user_password)
				{
					// echo "user_role".$user_role;
			    //    session_start();
			  	 //echo "Session ID: " . session_id();
							    $_SESSION["ids"] =	$user_id;
								$_SESSION["user_name"] = $user_username;
								$_SESSION["vendor_id"]=$vendor_id;
								$_SESSION["password"] = $user_password;
								$_SESSION["status"] = $user_status;
								$_SESSION["user_type"] = $user_role;
								$_SESSION["loggedin"] = "true";
								$return_string="dashboard";
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
				//echo $inserted_id;
				return $inserted_id;
		}
		catch (mysqli_sql_exception $e) { 
			return $e->errorMessage(); 
		} 
		//exit();
		
	}
	
	function AddToTabless($SQL, $params = [], $types = "")
{
    try {

        if (!empty($params) && !empty($types)) {

            $stmt = $this->varDBConnection->prepare($SQL);

            if (!$stmt) {
                throw new Exception("Prepare failed: " . $this->varDBConnection->error);
            }

            // check param count
            if (strlen($types) != count($params)) {
                throw new Exception("Type count and param count mismatch");
            }

            $stmt->bind_param($types, ...$params);

            if (!$stmt->execute()) {
                throw new Exception("Execute failed: " . $stmt->error);
            }

            $inserted_id = $stmt->insert_id;
            $stmt->close();

        } else {

            $result = mysqli_query($this->varDBConnection, $SQL);

            if (!$result) {
                throw new Exception("Query failed: " . mysqli_error($this->varDBConnection));
            }

            $inserted_id = mysqli_insert_id($this->varDBConnection);
        }

        $this->flag = 0;
        return $inserted_id;

    } catch (Exception $e) {

        error_log("Database error in AddToTabless: " . $e->getMessage() . " | Query: " . $SQL);
        return false;
    }
}
	function AddToTableWithoutReturn($SQL)
	{
		try { 
				mysqli_query($this->varDBConnection, $SQL);
				$inserted_id = mysqli_insert_id($this->varDBConnection);
				$this->flag=0;
				//echo $inserted_id;
				return $inserted_id;
		}
		catch (mysqli_sql_exception $e) { 
			return $e->errorMessage(); 
		} 
		//exit();
		
	}
	
	function AddToTablePayment($SQL)
	{
		try { 
				mysqli_query($this->varDBConnection, $SQL);
				$inserted_id = mysqli_insert_id($this->varDBConnection);
				$this->flag=0;
			
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
			//echo $affected_status;
			return $affected_status;
			
	}
	function UpdateTable1($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			echo $affected_status;
			//return $affected_status;
			
	}




	function DeleteRow($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			return $affected_status;
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
				echo "errorFetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			echo $row['_p_out'];
		
			
	}
// 	public function ExecuteProcedureForTenant($SQL)
//         {
//             // Execute the stored procedure
//             if (!$this->varDBConnection->multi_query($SQL)) {
//                 echo "Error executing procedure: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
//                 return;
//             }
        
//             $result = [];
            
            
//             do {
                
//                 if ($res = $this->varDBConnection->store_result()) {
//                     while ($row = $res->fetch_assoc()) {
//                         $result[] = $row;
//                     }
//                     $res->free();
//                 }
                
                
//             } while ($this->varDBConnection->more_results() && $this->varDBConnection->next_result());
        
          
//             $msg = '';
//             if ($res = $this->varDBConnection->query("SELECT @ret AS ret")) {
//                 $row = $res->fetch_assoc();
//                 $msg = $row['ret'];
//                 $res->free();
//             }
        
            
//             echo json_encode(['message' => $msg, 'data' => $result]);
//         }


public function ExecuteProcedureForTenant($SQL)
  {
    // Execute the stored procedure
    if (!$this->varDBConnection->multi_query($SQL)) {
        echo "Error executing procedure: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
        return;
    }

    $result = [];
    
    // Loop through the result sets
    do {
        // Store the first result set
        if ($res = $this->varDBConnection->store_result()) {
            while ($row = $res->fetch_assoc()) {
                $result[] = $row;
            }
            $res->free();
        }
        
        // Check if there are more result sets
    } while ($this->varDBConnection->more_results() && $this->varDBConnection->next_result());

    // Fetch the output parameter
    $msg = '';
    if ($res = $this->varDBConnection->query("SELECT @ret AS ret")) {
        $row = $res->fetch_assoc();
        $msg = $row['ret'];
        $res->free();
    }

    // Output the result
    echo json_encode(['message' => $msg, 'data' => $result]);
}


	
	
	public function ExecuteProcedureWithReturn($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as _p_out"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			return $row['_p_out'];
		
			
	}
	public function ExecuteProcedureReturnValue($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as _p_out"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			return $row['_p_out'];
		
			
	}
	
	 public function WhatsAppKey()
    {
        return 'EAATLuWFVcZBkBO6sQ6pqfs5hM5xsJizqXkl9nXJH9ZAxbcuVZCSpHE36ftVxMCH348gbLLU3GtBZC72PVKLaKBqbjaq0RnBNJkZB3Kp0SYgCNAbQ7NgVz4bKTROJpXcUnH3wVDSgXWGoVArZCNUryDr0vTMRylcicmopJOZAj3p6ivGXpmvNtnz2ZCGxhX6whYm8C0abU36ft6PlWQZC8';
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
	function ChangePassword($SQL,$password)
	{
		$this->result = mysqli_query($this->varDBConnection,$SQL);
	
			while($row=mysqli_fetch_assoc($this->result)) {
				$old_password= $row['user_password'];
				
			}
		
			if(strcmp($old_password,$password)==0)
				{
					echo 'success';
				}
				else
				{
					echo 'Please provide correct password...!';
				}

	
		$this->flag=1;	
		
			
    }
    
    function ExecuteProcedureReturnMultiplevalues($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as member_id,@msg1 as member_code"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
            
			return json_encode($row);

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
   
    //  1 Param = Serialize data from from 
    //  2 Param = Table Name Which you want to Update 
    //  3 Param = Extra colum Whichis not in Serilized But you want to Update Eg: array('loginuserid','loginusername'....)
    //  4 Param = Extra Columns values in param 3 Eg array('1','ajit')
    //  5 Param = Which Columns you wanrt to ignore from the Serilized Data Eg array('reEntryPassword')
    //  6 Param = Which columns you want to convert to system Date format Eg : array('25-05-1973') it will conver to 1973-05-25
    //  7 Param = For Condition in Where Eg 'AND' or 'OR' or 'Between' etc only one at a time 
    // If you have multipul conditions you can use 3rd Parameter Eg : array('id= 10 and name="Ajit"')
   
   function UpdateSQLQuery($form_data,$table_name, $where_col=array(), $where_values=array(), $exceptions=array(), $dateFormating=array(), $condition="")
   {
       #update tablename set col = val, col=val where id = val
        $updateSQL = "'update ".$table_name.' set ';
        foreach($form_data as $key => $value) 
        {
            if (in_array(trim($key), $exceptions) ==0) // ingnore some columns if any with the array parameter $exceptions
            {
               
           // $k = $k.'--KEY VAL: '.$key.'---VALUE : '.$value;
                if(strpos($key,'^')>=1)
                {
                    $key = explode('^',$key);
                    $value = explode('^',$value);
                    $str = $str.$key[0].'="'.$value[0].'",'.$key[1].'="'.$value[1].'",';
                }
                else
                {
                    $str = $str.$key.'="'.$value.'",';
                }
            }
            //$key = explode('-',$key);
            
        }
         $str = substr_replace($str ,"",-1)  ;
         if(count($where_col)>0)
         {
             $str = $str." where ";
             $possition=0;
             foreach($where_col  as $colName )
             {
                if (in_array(trim($key), $exceptions) ==0) // ingnore some columns if any with the array parameter $exceptions
                { 
                    if(in_array(trim($key), $dateFormating)==1) // For Formating Date to System formate Eg : 25-052022 to 2022-05-25
                    {
                        $where_values[$possition] = date("Y-m-d", strtotime($where_values[$possition]));
                    }
                     $str = $str.$colName.'="'.$where_values[$possition].'" '.$condition."'   ";
                     $possition= $possition+1;
                }
             }
             if(trim($condition)!="")
             {
                  $str = substr_replace($str ,"",-5)  ;
                  $str = $str.'"';
             }
            
         }
         else
         {
             $str = $str.$condition;
             $str = $str."'";
         }
         
       
        
        
        return $updateSQL.$str;
       
   
   }
   
   // Upload Image to the Folder 
   public function UploadImageTotheFolder($target_folder_name,$file_name)
   {
        $target_dir = "../../".$target_folder_name."/";
        move_uploaded_file($file_name, $target_dir . "abc.jpg");
        // $target_dir = "../../".$target_folder_name."/";
        // $target_file = $target_dir . basename($file_name); 
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // // Check if image file is a actual image or fake image
        
        //   $check = getimagesize($_FILES[$file_name]["tmp_name"]);
        //   if($check !== false) {
        //     //echo "File is an image - " . $check["mime"] . ".";
        //      return "Image Uploaded ....!".$check["mime"];
        //   } else {
        //      return "File is not an image. and Not Uploaded...!";
            
        //   }
        
   }
   
   public function sendGCM($message_title,$message, $deviceToken,$apikey) // Firebase Messaging - (Message Title, Message, Device Token , API Key/ Server key)
   {

        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array (
                'registration_ids' => array (
                    $deviceToken
                ),
                'data' => array (
                    "title" =>  $message_title,
                    "body" =>  $message,
                )
        );
        $fields = json_encode ( $fields );
        $headers = array (
            'Authorization: key=' . $apikey,
            'Content-Type: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        curl_close ($ch);
        return $result;
    }
    /**
     * Create upload directories structure for optimized image storage
     * @param string $basePath Base directory path
     * @return bool True if directories created/exist, false on error
     */
    public function createUploadDirectories($basePath)
    {
        try {
            // Ensure base path ends with slash
            $basePath = rtrim($basePath, '/') . '/';
            
            $folders = [
                "original",    // Original uploaded images
                "webp",        // WebP converted images
                "thumb",       // Thumbnails (300x300)
                "files"        // Other documents (PDF, etc.)
            ];
            
            foreach ($folders as $folder) {
                $fullPath = $basePath . $folder;
                if (!is_dir($fullPath)) {
                    if (!mkdir($fullPath, 0755, true)) {
                        error_log("Failed to create directory: $fullPath");
                        return false;
                    }
                    // Add index.html to prevent directory listing
                    file_put_contents($fullPath . '/index.html', '<!DOCTYPE html><html><body><h1>403 Forbidden</h1></body></html>');
                }
            }
            return true;
        } catch (Exception $e) {
            error_log("Error creating upload directories: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Get document preview icon based on file type
     * @param string $fileUrl File path or URL
     * @return string Preview image path
     */
    public function getDocumentPreview($fileUrl)
    {
        $extension = strtolower(pathinfo($fileUrl, PATHINFO_EXTENSION));
        
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
            case 'webp':
            case 'bmp':
                return $fileUrl;
            case 'pdf':
                return '../../assets/img/icons/pdf-icon.png';
            case 'doc':
            case 'docx':
                return '../../assets/img/icons/doc-icon.png';
            case 'xls':
            case 'xlsx':
                return '../../assets/img/icons/excel-icon.png';
            case 'ppt':
            case 'pptx':
                return '../../assets/img/icons/ppt-icon.png';
            case 'zip':
            case 'rar':
            case '7z':
                return '../../assets/img/icons/zip-icon.png';
            default:
                return '../../assets/img/icons/file-icon.png';
        }
    }
    
    public function resizeAndOptimizeImage($sourcePath, $destinationPath, $maxWidth = 1200, $maxHeight = 1200, $quality = 80, $outputFormat = '')
    {
        try {
            // Get image info
            list($width, $height, $type) = getimagesize($sourcePath);
            
            // Create image resource based on type
            switch ($type) {
                case IMAGETYPE_JPEG:
                    $source = imagecreatefromjpeg($sourcePath);
                    break;
                case IMAGETYPE_PNG:
                    $source = imagecreatefrompng($sourcePath);
                    break;
                case IMAGETYPE_GIF:
                    $source = imagecreatefromgif($sourcePath);
                    break;
                case IMAGETYPE_WEBP:
                    $source = imagecreatefromwebp($sourcePath);
                    break;
                default:
                    return false;
            }
            
            if (!$source) {
                return false;
            }
            
            // Calculate new dimensions
            $ratio = min($maxWidth / $width, $maxHeight / $height);
            $newWidth = (int)($width * $ratio);
            $newHeight = (int)($height * $ratio);
            
            // Create new image
            $newImage = imagecreatetruecolor($newWidth, $newHeight);
            
            // Preserve transparency for PNG and GIF
            if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
                imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
                imagealphablending($newImage, false);
                imagesavealpha($newImage, true);
            }
            
            // Resize image
            imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
            // Determine output format
            $ext = strtolower(pathinfo($destinationPath, PATHINFO_EXTENSION));
            if (!empty($outputFormat)) {
                $ext = $outputFormat;
            }
            
            // Save based on extension
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    // For JPG output from transparent images, add white background
                    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
                        $jpgImage = imagecreatetruecolor($newWidth, $newHeight);
                        $white = imagecolorallocate($jpgImage, 255, 255, 255);
                        imagefill($jpgImage, 0, 0, $white);
                        imagecopy($jpgImage, $newImage, 0, 0, 0, 0, $newWidth, $newHeight);
                        imagedestroy($newImage);
                        $newImage = $jpgImage;
                    }
                    $result = imagejpeg($newImage, $destinationPath, $quality);
                    break;
                case 'png':
                    $result = imagepng($newImage, $destinationPath, 9 - round($quality / 12.5));
                    break;
                case 'gif':
                    $result = imagegif($newImage, $destinationPath);
                    break;
                case 'webp':
                    $result = imagewebp($newImage, $destinationPath, $quality);
                    break;
                default:
                    $result = imagejpeg($newImage, $destinationPath, $quality);
            }
            
            // Clean up
            imagedestroy($source);
            imagedestroy($newImage);
            
            return $result;
        } catch (Exception $e) {
            error_log("Error resizing image: " . $e->getMessage());
            return false;
        }
    }
    private function convertToJPG($sourcePath, $destinationPath, $quality = 85)
    {
        try {
            // Get image info
            list($width, $height, $type) = getimagesize($sourcePath);
            
            // Create image resource based on type
            switch ($type) {
                case IMAGETYPE_JPEG:
                    $source = imagecreatefromjpeg($sourcePath);
                    break;
                case IMAGETYPE_PNG:
                    $source = imagecreatefrompng($sourcePath);
                    // Preserve transparency by creating white background
                    $jpg = imagecreatetruecolor($width, $height);
                    $white = imagecolorallocate($jpg, 255, 255, 255);
                    imagefill($jpg, 0, 0, $white);
                    imagecopy($jpg, $source, 0, 0, 0, 0, $width, $height);
                    imagedestroy($source);
                    $source = $jpg;
                    break;
                case IMAGETYPE_GIF:
                    $source = imagecreatefromgif($sourcePath);
                    break;
                case IMAGETYPE_WEBP:
                    $source = imagecreatefromwebp($sourcePath);
                    break;
                case IMAGETYPE_BMP:
                    $source = imagecreatefrombmp($sourcePath);
                    break;
                default:
                    return false;
            }
            
            // Save as JPG
            imagejpeg($source, $destinationPath, $quality);
            imagedestroy($source);
            
            return true;
        } catch (Exception $e) {
            error_log("Error converting image to JPG: " . $e->getMessage());
            return false;
        }
    }
    public function uploadFileWithConversion($file, $basePath = '../../assets/uploads/', $folderName = 'products')
    {
        try {
            if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
                return false;
            }
            
            $basePath = rtrim($basePath, '/') . '/';
            $uploadDir = $basePath . $folderName . '/';
            
            // Create directories if they don't exist
            $this->createUploadDirectories($uploadDir);
            
            // Generate unique filename WITHOUT extension
            $safeName = 'img_' . uniqid('', true); // Example: img_6979cf8e9add12.63829239
            
            $originalName = basename($file['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            
            $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($extension, $allowedImageTypes)) {
                // Handle image upload with conversion
                $fileInfo = [
                    'filename' => $safeName,  // Store ONLY filename WITHOUT any extension
                    'type' => 'image'
                ];
                
                // 1. Save original as JPG
                $originalPath = $uploadDir . 'original/' . $safeName . '.jpg';
                $this->resizeAndOptimizeImage($file['tmp_name'], $originalPath, 1200, 1200, 85, 'jpg');
                
                // 2. Create WebP version
                $webpPath = $uploadDir . 'webp/' . $safeName . '.webp';
                $this->resizeAndOptimizeImage($file['tmp_name'], $webpPath, 1200, 1200, 80, 'webp');
                
                // 3. Create thumbnail
                $thumbPath = $uploadDir . 'thumb/' . $safeName . '.jpg';
                $this->resizeAndOptimizeImage($file['tmp_name'], $thumbPath, 300, 300, 80, 'jpg');
                
                return $fileInfo;
                
            } else {
                // Handle non-image files
                $filePath = $uploadDir . 'files/' . $safeName . '.' . $extension;
                
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    return [
                        'filename' => $safeName . '.' . $extension,
                        'name' => $originalName,
                        'type' => 'file'
                    ];
                }
            }
            
            return false;
        } catch (Exception $e) {
            error_log("Error uploading file: " . $e->getMessage());
            return false;
        }
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