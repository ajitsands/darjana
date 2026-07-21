<?php
session_start();
require ('../../model/common/common_functions.php');

class colorController {
    var $varModelObj, $varDBConnection;
    public $actionevents;
    public $theme_color, $text_color, $button_color;
    public $timestamp;

    function __construct() {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;
        $this->theme_color = $_POST['theme_color'] ?? null;
        $this->text_color = $_POST['text_color'] ?? null;
        $this->button_color = $_POST['button_color'] ?? null;

        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }

    function SQLArray() {
        $array = array();

		$array[0] = "UPDATE theme_color 
             SET color_code_theme = '".$this->theme_color."', 
                 color_code_text = '".$this->text_color."', 
                 color_code_button = '".$this->button_color."' 
             WHERE ids = 1";
			 
		$array[1] = "SELECT color_code_theme, color_code_text, color_code_button FROM theme_color LIMIT 1";


        return $array;
    }

    function RequestAccept($FunctionEvents) {
        $var = $this->SQLArray();

        switch ($FunctionEvents) {
            case 'change_color_theme':
                $this->effected_rows = $this->varModelObj->UpdateTable($var[0]);
                echo json_encode(['status' => $this->effected_rows > 0 ? 'success' : 'error']);
                break;

          case 'get_saved_colors': 
			$result = $this->varModelObj->ListFromJSon($var[1]);
			$dataArray = json_decode($result, true);

			if (isset($dataArray['data']) && !empty($dataArray['data'])) {
				foreach ($dataArray['data'] as $item) {
					 "Theme Color: " . $item['color_code_theme'] . "<br>";
					 "Text Color: " . $item['color_code_text'] . "<br>";
					 "Button Color: " . $item['color_code_button'] . "<br>";
				}
				$colors = $dataArray['data'][0]; 
			} else {

				$colors = [
					"color_code_theme" => "#fdb528eb", 
					"color_code_text" => "#000000", 
					"color_code_button" => "#fdb528eb"
				];
			}

			// Output JSON response
			echo json_encode(["data" => [$colors]]);
		break;



            default:
                echo json_encode(['error' => 'No Action Found']);
                break;
        }
    }
}

$obj = new colorController();
$obj->RequestAccept($obj->actionevents);
?>
