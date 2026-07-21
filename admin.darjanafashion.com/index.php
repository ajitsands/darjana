<?php
include('model/common/en_de_class.php');
class RoutingClass
{
    public $encryption;
    private $key = 'S@nds1@b@Trichur1nf0p@rk123!456'; // Ensure this key is 32 bytes for AES-256
  
    public function __construct()
    {
        // Check if the request is from the correct domain
        $allowedDomain = 'admin.darjanafashion.com';
        $currentDomain = $_SERVER['HTTP_HOST'];

        if ($currentDomain !== $allowedDomain) {
            header("HTTP/1.0 404 Not Found");
            echo "<p style='background-color: #7FB131; color: white;text-align: left;;font-size:20px;padding:20px; font-family: Arial, Helvetica, sans-serif;'>Darjana Request - 404 Not Found - By ".$_SERVER['SERVER_NAME']."</p>";
            exit();
        } 

        // Initialize encryption class
        $this->encryption = new UrlEncryption($this->key);
        // Retrieve the requested URL
        $this->url = isset($_GET['url']) ? $_GET['url'] : '/';

        // Define the routes
        $this->routes = array(
            '' => 'login',
            '/' => 'login',
            'Register'=>'Register',
            'Register/' => 'Register',
			'AddVendor'=>'add_vendor',
            'AddVendor/' => 'add_vendor',
			'AddProduct'=>'add_product',
            'AddProduct/' => 'add_product',
			'Theme'=>'theme',
            'Theme/' => 'theme',
            'Dashboard'=>'dashboard',
            'Dashboard/'=>'dashboard',
            'ListProduct'=>'ListProduct',
            'ListProduct/'=>'ListProduct',
			'Orders'=>'Orders',
            'Orders/'=>'Orders',
            'HomeOffer'=>'home_offer',
            'HomeOffer/'=>'home_offer',
            'Currency'=>'currency_details',
            'Currency/'=>'currency_details',
            'test'=>'test',
            'test/'=>'test',
            'ProductwiseReport'=>'ProductwiseReport',
            'ProductwiseReport/'=>'ProductwiseReport',
            'CustomerReport'=>'CustomerReport',
            'CustomerReport/'=>'CustomerReport',
            'Promo'=>'Promo',
            'Promo/'=>'Promo',
            'TailoringUnit'=>'TailoringUnit',
            'TailoringUnit/'=>'TailoringUnit',
            'TailoringBatch'=>'TailoringBatch',
            'TailoringBatch/'=>'TailoringBatch',
            'AllCustomers'=>'AllCustomers',
            'AllCustomers/'=>'AllCustomers',
            'UnpaidOrders'=>'UnpaidOrders',
            'UnpaidOrders/'=>'UnpaidOrders',
            'SizeChart'=>'SizeChart',
            'SizeChart/'=>'SizeChart',
            'HomeVideo'=>'HomeVideo',
            'HomeVideo/'=>'HomeVideo',
            'PlatformTracking'=>'PlatformTracking',
            'PlatformTracking/'=>'PlatformTracking',
            'PaymentSettings'=>'payment_settings',
            'PaymentSettings/'=>'payment_settings'
        );
    
        // Parse the URL
        $urlSegments = parse_url($this->url, PHP_URL_PATH);
        $urlSegments = explode('/', trim($urlSegments, '/'));

        // Reconstruct the first segment to match the defined routes
        $firstSegment = implode('/', array_slice($urlSegments, 0, 2));

        // Route based on the first segment
        if (isset($this->routes[$firstSegment])) {
            $method = $this->routes[$firstSegment];
            $this->$method($urlSegments);
        } else if (isset($this->routes[$urlSegments[0]])) {
            $method = $this->routes[$urlSegments[0]];
            array_shift($urlSegments); // Remove the route part from the params
            $this->$method($urlSegments);
        } else {
            // If the route doesn't exist, display a 404 error
            header("HTTP/1.0 404 Not Found");
            echo "<p style='background-color: #7FB131; color: white;text-align: left;;font-size:20px;padding:20px; font-family: Arial, Helvetica, sans-serif;'>Darjana Request - 404 Not Found - By ".$_SERVER['SERVER_NAME']."</p>";
        }
    }

    // Define functions for each route
    private function home(...$params)
    {
        $this->includeWithParams("dashboard.php", $_GET);
    }
    private function templates(...$params)
    {
        $this->includeWithParams("message_templates.php", $_GET);
    }

    private function login(...$params)
    {
        $this->includeWithParams("login.php", $_GET);
    }
    private function Register(...$params)
    {
        $this->includeWithParams("register.php", $_GET);
    }
    private function forgetpassword(...$params)
    {
        $this->includeWithParams("auth-forgot-password-cover.php", $_GET);
    }
   
    private function pricing(...$params)
    {
        $this->includeWithParams("pages-pricing.php", $_GET);
    }
    private function payments(...$params)
    {
        $this->includeWithParams("payment_history.php", $_GET);
    }
    private function billing(...$params)
    {
        $this->includeWithParams("pages-account-settings-billing.php", $_GET);
    }
    
    private function ajaxMessages(...$params)
    {
        $this->includeWithParams("controller/messages.php", $_GET);
    }
    
    private function chat(...$params)
    {
        $this->includeWithParams("app-chat.php", $_GET);
    }

    private function view_tempates(...$params)
    {
        $this->includeWithParams("view-templates.php", $_GET);
    }

    private function includeWithParams($file, $params)
    {
        foreach ($params as $key => $value) {
            $key = $value;
        }
        include($file);
    }
	 private function add_vendor(...$params)
    {
        $this->includeWithParams("view/add_vendor.php", $_GET);
    }
    private function dashboard(...$params)
    {
        $this->includeWithParams("dashboard.php", $_GET);
    }
     private function ListProduct(...$params)
    {
        $this->includeWithParams("list_product.php", $_GET);
    }
	 private function add_product(...$params)
    {
        $this->includeWithParams("view/add_product.php", $_GET);
    }
     private function test(...$params)
    {
        $this->includeWithParams("view/test_image_upload.php", $_GET);
    }
	 private function theme(...$params)
    {
        $this->includeWithParams("view/colorPicker.php", $_GET);
    }
	 private function Orders(...$params)
    {
        $this->includeWithParams("view/order_details.php", $_GET);
    }
    
    private function home_offer(...$params)
    {
        $this->includeWithParams("view/home_offer.php", $_GET);
    }
    
    
    private function ProductwiseReport(...$params)
    {
        $this->includeWithParams("view/product_wise_report.php", $_GET);
    }
    
    private function CustomerReport(...$params)
    {
        $this->includeWithParams("view/customer_wise_report.php", $_GET);
    }
    
    private function currency_details(...$params)
    {
        $this->includeWithParams("view/currency_details.php", $_GET);
    }
    private function Promo(...$params)
    {
        $this->includeWithParams("view/add_promo_code.php", $_GET);
    }
    private function TailoringBatch(...$params)
    {
        $this->includeWithParams("view/tailoring_batches.php", $_GET);
    }
     private function TailoringUnit(...$params)
    {
        $this->includeWithParams("view/add_tailoring_unit.php", $_GET);
    }
    private function HomeVideo(...$params)
    {
        $this->includeWithParams("view/add_home_video.php", $_GET);
    }
     private function AllCustomers(...$params)
    {
        $this->includeWithParams("view/all_customers.php", $_GET);
    }

     private function UnpaidOrders(...$params)
    {
        $this->includeWithParams("view/unpaid_orders.php", $_GET);
    }
     private function SizeChart(...$params)
    {
        $this->includeWithParams("view/size_chart.php", $_GET);
    }
     private function PlatformTracking(...$params)
    {
        $this->includeWithParams("view/social_media_ads.php", $_GET);
    }
     private function payment_settings(...$params)
    {
        $this->includeWithParams("view/payment_settings.php", $_GET);
    }
    public function generateUrl($route, $params = [])
    {

        $url = "/$route?";
        $query = [];
        foreach ($params as $key => $value) {
            $encryptedValue = $this->encryption->encrypt($value);
            $query[] = "$key=" . urlencode($encryptedValue);
        }
        $url .= implode('&', $query);
        return $url;
    }
}


$obj = new RoutingClass();

// Generate a URL for the login route with parameters
//  $url = $obj->generateUrl('login', ['val' => '10']);
//  echo "<a href='$url'>Login</a>";
?>
