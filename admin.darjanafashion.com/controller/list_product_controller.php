<?php
session_start();
require_once '../../model/common/common_functions.php';

class ListProductController
{
    private $model;
    private $dbConnection;
    private $action;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->dbConnection = $this->model->varDBConnection;
        $this->action = $_POST['action'] ?? null;
    }

    public function SQLArray()
    {
        return [
            'list_products' => "SELECT pd.* FROM product_details pd 
                LEFT JOIN product_specification_color psc ON pd.ids = psc.product_id 
                LEFT JOIN product_specification_size pss ON pd.ids = pss.product_id 
                WHERE pd.status = 'Active' 
                AND (:category_id = '' OR pd.category_id = :category_id)
                AND (:sub_category_id = '' OR pd.sub_category_id = :sub_category_id)
                AND (:color = '' OR psc.product_color = :color)
                AND (:size = '' OR pss.product_size = :size)
                GROUP BY pd.ids",
            'fetch_sub_categories' => "SELECT ids, sub_category FROM sub_category_details WHERE category_id = :category_id AND status = 'active'",
            'fetch_colors' => "SELECT DISTINCT psc.product_color 
                FROM product_specification_color psc 
                JOIN product_details pd ON psc.product_id = pd.ids 
                WHERE pd.sub_category_id = :sub_category_id AND pd.status = 'Active'",
            'fetch_sizes' => "SELECT DISTINCT pss.product_size 
                FROM product_specification_size pss 
                JOIN product_details pd ON pss.product_id = pd.ids 
                JOIN product_specification_color psc ON pss.product_id = psc.product_id 
                WHERE pd.sub_category_id = :sub_category_id AND psc.product_color = :color AND pd.status = 'Active'"
        ];
    }

    public function RequestAccept($action)
    {
        $sqlArray = $this->SQLArray();

        switch ($action) {
            case 'list_products':
                $category_id = $_POST['category_id'] ?? '';
                $sub_category_id = $_POST['sub_category_id'] ?? '';
                $color = $_POST['color'] ?? '';
                $size = $_POST['size'] ?? '';

                $stmt = $this->dbConnection->prepare($sqlArray['list_products']);
                $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
                $stmt->bindValue(':sub_category_id', $sub_category_id, PDO::PARAM_STR);
                $stmt->bindValue(':color', $color, PDO::PARAM_STR);
                $stmt->bindValue(':size', $size, PDO::PARAM_STR);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(['data' => $products]);
                break;

            case 'fetch_sub_categories':
                $category_id = $_POST['category_id'] ?? '';
                $stmt = $this->dbConnection->prepare($sqlArray['fetch_sub_categories']);
                $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
                $stmt->execute();
                $subCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($subCategories);
                break;

            case 'fetch_colors':
                $sub_category_id = $_POST['sub_category_id'] ?? '';
                $stmt = $this->dbConnection->prepare($sqlArray['fetch_colors']);
                $stmt->bindValue(':sub_category_id', $sub_category_id, PDO::PARAM_INT);
                $stmt->execute();
                $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($colors);
                break;

            case 'fetch_sizes':
                $sub_category_id = $_POST['sub_category_id'] ?? '';
                $color = $_POST['color'] ?? '';
                $stmt = $this->dbConnection->prepare($sqlArray['fetch_sizes']);
                $stmt->bindValue(':sub_category_id', $sub_category_id, PDO::PARAM_INT);
                $stmt->bindValue(':color', $color, PDO::PARAM_STR);
                $stmt->execute();
                $sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($sizes);
                break;

            default:
                echo json_encode(['status' => 'error', 'message' => 'No Action Found In The Controller...!']);
                break;
        }
    }
}

$controller = new ListProductController();
$controller->RequestAccept($controller->action);
?>