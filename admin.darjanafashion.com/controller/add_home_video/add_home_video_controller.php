<?php
session_start();


require('../../model/common/common_functions.php');

class HomeVideoController
{
    var $varModelObj, $varDBConnection;
    public $actionevents, $timestamp;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;

        $this->actionevents = $_POST['action'] ?? null;

        date_default_timezone_set('Asia/Kolkata');
        $this->timestamp = date('Y-m-d H:i:s');
    }


    function SQLArray($id = 0, $fileName = "")
    {
        $array = array();

        $array[0] = "SELECT video_name FROM home_video WHERE ids = '$id'";

        $array[1] = "UPDATE home_video SET video_name = '$fileName' WHERE ids = '$id'";

        return $array;
    }

    function RequestAccept($FunctionEvents)
    {
        switch ($FunctionEvents) {

            case 'get_home_video':

                $id = (int)($_POST['id'] ?? 0);

                if ($id <= 0) {
                    echo json_encode(["status" => "error", "message" => "Invalid ID"]);
                    return;
                }

                $var = $this->SQLArray($id);

                $data = $this->varModelObj->ListFromTable($var[0]);
                $decoded = json_decode($data, true);

                if (!empty($decoded) && !empty($decoded[0]['video_name'])) {
                    echo json_encode([
                        "status" => "success",
                        "path"   => $decoded[0]['video_name']
                    ]);
                } else {
                    echo json_encode([
                        "status" => "no_data",
                        "message" => "No video found",
                        "path" => ""
                    ]);
                }

                break;

            case 'add_home_video':

                $id = (int)($_POST['id'] ?? 0);

                if ($id <= 0) {
                    echo json_encode(["status" => "error", "message" => "Invalid ID"]);
                    return;
                }

                if (!isset($_FILES['video']) || $_FILES['video']['error'] !== 0) {
                    echo json_encode(["status" => "error", "message" => "File upload error"]);
                    return;
                }

                $file = $_FILES['video'];

                // Extension validation (NO mime_content_type)
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['mp4', 'webm', 'ogg', 'mov'];

                if (!in_array($ext, $allowed)) {
                    echo json_encode(["status" => "error", "message" => "Invalid file type"]);
                    return;
                }

                // Upload path
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/videos/home/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // ================= GET OLD VIDEO =================
                $var = $this->SQLArray($id);
                $oldData = $this->varModelObj->ListFromTable($var[0]);
                $oldDecoded = json_decode($oldData, true);

                $oldFile = $oldDecoded[0]['video_name'] ?? "";

                // ================= NEW FILE =================
                $fileName = "video_" . time() . "." . $ext;
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($file['tmp_name'], $targetPath)) {

                    // Delete old file
                    if (!empty($oldFile)) {
                        $oldPath = $uploadDir . $oldFile;
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }

                    // ================= UPDATE DB =================
                    $var = $this->SQLArray($id, $fileName);

                    $update = $this->varModelObj->UpdateTable($var[1]);

                    if ($update !== false) {
                        echo json_encode([
                            "status" => "success",
                            "message" => "Video uploaded successfully",
                            "path" => $fileName
                        ]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "DB update failed"]);
                    }

                } else {
                    echo json_encode(["status" => "error", "message" => "Upload failed"]);
                }

                break;

            default:
                echo json_encode(["status" => "error", "message" => "Invalid action"]);
                break;
        }
    }
}

// RUN
$obj = new HomeVideoController();
$obj->RequestAccept($obj->actionevents);
?>
