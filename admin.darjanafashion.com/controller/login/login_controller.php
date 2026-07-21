<?php
session_start();
require ('../../model/common/common_functions.php');
class loginController
{
        var $varModelObj,$varDBConnection;
        public $actionevents,$formdata,$tablename,$SQLQuery,$v_password,$v_username;
       
        
    function __construct()
	{
	  
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->formdata = $_POST['datas'];
        $this->tablename = $_POST['t_name'];
        $this->actionevents = $_POST['action'];
		$this->v_username = $_POST['v_username'];
        $this->password = $_POST['password'];
	}
    
   
    
    function SQLArray()
    { 
        $array = array();
    
        $search = $this->v_username;
    
        $array[0] = "
            SELECT * 
            FROM user_details 
            WHERE FIND_IN_SET('$search', email_username)
        ";
    
        return $array;
    }
    
    
    function RequestAccept($FunctionEvents)
    {
       
        $var =  $this->SQLArray();
        switch ($FunctionEvents)
        {
			
			case 'login_request':
				// echo $var[1];
				$return_string = $this->varModelObj->userAuthenticationforcheck($var[0],$this->password);
         
				$return_string1 = explode("#", $return_string); 
				if($return_string1[0]=='true')
				{
				   echo 'true';
				   return false;
				}
				else
				{
				  echo $return_string; 
				}
			break;

			
            default:
				echo 'No Action Found...!';
            break;
            
        }

    }

}

$obj = new loginController();
$obj->RequestAccept($obj->actionevents);
?>