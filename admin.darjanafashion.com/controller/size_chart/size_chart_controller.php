<?php
session_start();
require ('../../model/common/common_functions.php');

class SizeChartController
{
    var $varModelObj, $varDBConnection;
    public $actionevents;

    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'] ?? $_GET['action'] ?? null;

        // Force UTF-8mb4 connection from the beginning
        if ($this->varDBConnection) {
            $this->varDBConnection->set_charset("utf8mb4");
        }
    }

    function RequestAccept($FunctionEvents)
    {
        switch ($FunctionEvents) {
            case 'get_size_chart_data':
                $this->handleGetSizeChartData();
                break;
               
            case 'save_descriptions':
                $this->handleSaveDescriptions();
                break;
               
            case 'get_measurements':
                $this->handleGetMeasurements();
                break;
               
            case 'save_measurements':
                $this->handleSaveMeasurements();
                break;
               
            case 'delete_measurement':
                $this->handleDeleteMeasurement();
                break;
               
            case 'get_height_length':
                $this->handleGetHeightLength();
                break;
               
            case 'save_height_length':
                $this->handleSaveHeightLength();
                break;
               
            case 'delete_height_length':
                $this->handleDeleteHeightLength();
                break;
               
            default:
                echo json_encode(['error' => 'Invalid action'], JSON_UNESCAPED_UNICODE);
                break;
        }
    }

    private function handleGetSizeChartData()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            // Get size chart (default is ID 1)
            $chartQuery = "SELECT * FROM size_charts WHERE ids = 1 AND status = 'Active'";
            $chartResult = $this->varDBConnection->query($chartQuery);
           
            if ($chartResult->num_rows == 0) {
                $this->createDefaultSizeChart();
                $chartResult = $this->varDBConnection->query($chartQuery);
            }
           
            $chart = $chartResult->fetch_assoc();
           
            // Get measurements
            $measureQuery = "SELECT * FROM size_chart_measurements WHERE size_chart_id = 1 ORDER BY sort_order ASC";
            $measureResult = $this->varDBConnection->query($measureQuery);
            $measurements = [];
            while ($row = $measureResult->fetch_assoc()) {
                $measurements[] = $row;
            }
           
            // Get height-length mappings
            $heightQuery = "SELECT * FROM size_chart_height_length WHERE size_chart_id = 1 ORDER BY height_cm ASC";
            $heightResult = $this->varDBConnection->query($heightQuery);
            $heightLength = [];
            while ($row = $heightResult->fetch_assoc()) {
                $heightLength[] = $row;
            }
           
            echo json_encode([
                'success' => true,
                'data' => [
                    'chart_name'     => $chart['chart_name'] ?? '',
                    'description_en' => $chart['description_en'] ?? '',
                    'description_ar' => $chart['description_ar'] ?? '',
                    'measurements'   => $measurements,
                    'height_length'  => $heightLength
                ]
            ], JSON_UNESCAPED_UNICODE);
           
        } catch (Exception $e) {
            error_log('SizeChart Error: ' . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Failed to load data: ' . $e->getMessage()
            ], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function createDefaultSizeChart()
    {
        $this->varDBConnection->set_charset("utf8mb4");

        $insertQuery = "INSERT INTO size_charts (ids, chart_name, description_en, description_ar, status) VALUES
                        (1, 'Abaya Size Guide',
                        'Standard Size Abayas. These sizes are based on our experience and are the best fit for most customers. However, if you prefer your abaya a little longer or shorter, you can always choose the size that feels right for you.',
                        'دليل المقاسات (توصية) هذه المقاسات موصى بها بناءً على خبرتنا، وتناسب أغلب العملاء. لكن إذا كنتِ تفضلين العباءة أطول أو أقصر قليلًا، يمكنكِ اختيار المقاس الذي يناسب راحتك.',
                        'Active')
                        ON DUPLICATE KEY UPDATE
                        chart_name = VALUES(chart_name),
                        description_en = VALUES(description_en),
                        description_ar = VALUES(description_ar)";

        $this->varDBConnection->query($insertQuery);
    }
   
    private function handleSaveDescriptions()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $chart_name     = $_POST['chart_name'] ?? 'Abaya Size Guide';
            $description_en = $_POST['description_en'] ?? '';
            $description_ar = $_POST['description_ar'] ?? '';
           
            $query = "UPDATE size_charts SET
                      chart_name = '" . $this->varDBConnection->real_escape_string($chart_name) . "',
                      description_en = '" . $this->varDBConnection->real_escape_string($description_en) . "',
                      description_ar = '" . $this->varDBConnection->real_escape_string($description_ar) . "',
                      updated_at = NOW()
                      WHERE ids = 1";
           
            $result = $this->varDBConnection->query($query);
           
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Descriptions saved successfully'], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception('Failed to update: ' . $this->varDBConnection->error);
            }
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleGetMeasurements()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $query = "SELECT * FROM size_chart_measurements WHERE size_chart_id = 1 ORDER BY sort_order ASC";
            $result = $this->varDBConnection->query($query);
           
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
           
            echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleSaveMeasurements()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $measurements = $_POST['measurements'] ?? [];
           
            if (empty($measurements)) {
                echo json_encode(['success' => false, 'message' => 'No data to save'], JSON_UNESCAPED_UNICODE);
                return;
            }
           
            foreach ($measurements as $item) {
                if (isset($item['ids']) && !empty($item['ids'])) {
                    // Update existing
                    $query = "UPDATE size_chart_measurements SET
                              size_label = '" . $this->varDBConnection->real_escape_string($item['size_label']) . "',
                              chest_inch = '" . $this->varDBConnection->real_escape_string($item['chest_inch']) . "',
                              shoulder_inch = '" . $this->varDBConnection->real_escape_string($item['shoulder_inch']) . "',
                              sort_order = '" . $this->varDBConnection->real_escape_string($item['sort_order']) . "',
                              status = '" . $this->varDBConnection->real_escape_string($item['status']) . "'
                              WHERE ids = " . intval($item['ids']);
                } else {
                    // Insert new
                    $query = "INSERT INTO size_chart_measurements
                              (size_chart_id, size_label, chest_inch, shoulder_inch, sort_order, status)
                              VALUES (1,
                              '" . $this->varDBConnection->real_escape_string($item['size_label']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['chest_inch']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['shoulder_inch']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['sort_order']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['status']) . "')";
                }
               
                $this->varDBConnection->query($query);
            }
           
            echo json_encode(['success' => true, 'message' => 'Measurements saved successfully'], JSON_UNESCAPED_UNICODE);
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleDeleteMeasurement()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $ids = intval($_POST['ids'] ?? 0);
           
            if (!$ids) {
                throw new Exception('Invalid ID');
            }
           
            $query = "DELETE FROM size_chart_measurements WHERE ids = $ids";
            $result = $this->varDBConnection->query($query);
           
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Deleted successfully'], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception('Delete failed');
            }
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleGetHeightLength()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $query = "SELECT * FROM size_chart_height_length WHERE size_chart_id = 1 ORDER BY height_cm ASC";
            $result = $this->varDBConnection->query($query);
           
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
           
            echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleSaveHeightLength()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $mappings = $_POST['mappings'] ?? [];
           
            if (empty($mappings)) {
                echo json_encode(['success' => false, 'message' => 'No data to save'], JSON_UNESCAPED_UNICODE);
                return;
            }
           
            foreach ($mappings as $item) {
                if (isset($item['ids']) && !empty($item['ids'])) {
                    // Update existing
                    $query = "UPDATE size_chart_height_length SET
                              height_cm = '" . $this->varDBConnection->real_escape_string($item['height_cm']) . "',
                              abaya_length_inch = '" . $this->varDBConnection->real_escape_string($item['abaya_length_inch']) . "',
                              status = '" . $this->varDBConnection->real_escape_string($item['status']) . "'
                              WHERE ids = " . intval($item['ids']);
                } else {
                    // Insert new
                    $query = "INSERT INTO size_chart_height_length
                              (size_chart_id, height_cm, abaya_length_inch, status)
                              VALUES (1,
                              '" . $this->varDBConnection->real_escape_string($item['height_cm']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['abaya_length_inch']) . "',
                              '" . $this->varDBConnection->real_escape_string($item['status']) . "')";
                }
               
                $this->varDBConnection->query($query);
            }
           
            echo json_encode(['success' => true, 'message' => 'Height-Length mappings saved successfully'], JSON_UNESCAPED_UNICODE);
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
   
    private function handleDeleteHeightLength()
    {
        try {
            $this->varDBConnection->set_charset("utf8mb4");

            $ids = intval($_POST['ids'] ?? 0);
           
            if (!$ids) {
                throw new Exception('Invalid ID');
            }
           
            $query = "DELETE FROM size_chart_height_length WHERE ids = $ids";
            $result = $this->varDBConnection->query($query);
           
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Deleted successfully'], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception('Delete failed');
            }
           
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
}

// Initialize and run
$obj = new SizeChartController();
$obj->RequestAccept($obj->actionevents);
?>