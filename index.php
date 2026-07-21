<?php
ini_set('error_log', __DIR__ . '/my_error_log.log');
session_start();

// Define a base path constant to avoid relative path issues
// define('BASE_PATH', realpath(__DIR__));

if (!isset($_SESSION["loggedin"])) {

    // Check if remember me cookies exist first
    if (isset($_COOKIE['remember_token']) && isset($_COOKIE['remember_user'])) {

        require_once(__DIR__ . '/controller/login_controller.php');

        $check = new userController();

        // Pass action instead of direct method call
        $result = $check->RequestAccept("check_remember_me");

        if ($result) {
            // Session will be set inside controller
            // No redirect needed
        }
    }
}

include('model/common/en_de_class.php');
class RoutingClass
{
    public $encryption,$url,$routes;
    private $key = 'S@nds1@b@Trichur1nf0p@rk123!456'; // Ensure this key is 32 bytes for AES-256

    public function __construct()
    {
        // Check if the request is from an allowed domain or local development
        $allowedDomains = array('darjanafashion.com', 'www.darjanafashion.com', 'localhost', '127.0.0.1');
        $currentHost    = parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'), PHP_URL_HOST);
       
        if (!in_array($currentHost, $allowedDomains)) {
            header("HTTP/1.0 404 Not Found!");
            echo "<p style='background-color: #7FB131; color: white;text-align: left;font-size:20px;padding:20px; font-family: Arial, Helvetica, sans-serif;'>Darjana Fashion - 404 Not Found - By ".htmlspecialchars($_SERVER['SERVER_NAME'] ?? 'unknown')."</p>";
            exit();
        } 

        // Initialize encryption class
        
          $this->encryption = new UrlEncryption($this->key);
        
        // Retrieve the requested URL
        $this->url = isset($_GET['url']) ? $_GET['url'] : '/';
        // Define the routes
        $this->routes = array(
            ''=>'Home',
            '/' => 'Home',
            'Shop'=>'Shop',
            'Shop/' => 'Shop',
            'ProductDetails'=>'ProductDetails',
            'ProductDetails/' => 'ProductDetails',
            'Cart'=>'Cart',
            'Cart/' => 'Cart',
            'Wishlist'=>'Wishlist',
            'Wishlist/' => 'Wishlist',
            'Login'=>'Login',
            'Login/' => 'Login',
            'Profile'=>'Profile',
            'Profile/' => 'Profile',
            'Registration'=>'Registration',
            'Registration/' => 'Registration',
            'ForgetPassword'=>'ForgetPassword',
            'ForgetPassword/' => 'ForgetPassword',
            'Orders' => 'Orders',
             'Orders/' => 'Orders',
             'PlaceOrder' => 'PlaceOrder',
             'PlaceOrder/' => 'PlaceOrder',
             'Orders_details' => 'Orders_details',
             'Orders_details/' => 'Orders_details',
            'OrderConfirmation' => 'OrderConfirmation',
            'OrderConfirmation/' => 'OrderConfirmation',
            'Address' => 'Address',
            'Address/' => 'Address',
             'Shopmenu' => 'Shopmenu',
            'Shopmenu/' => 'Shopmenu',
            'Home_test' => 'Home_test',
            'Home_test/' => 'Home_test',
            'Link'=>'Link',
             'Link/' => 'Link'
            
            
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
            header("HTTP/1.0 404 Not Found...!");
            echo "<p style='background-color: #7FB131; color: white;text-align: left;;font-size:20px;padding:20px; font-family: Arial, Helvetica, sans-serif;'Wrong Request - 404 Not Found - By ".$_SERVER['SERVER_NAME']."</p>";
        }
    }

    // Define functions for each route
    private function Home(...$params)
    {
        $this->includeWithParams("view/home_page.php", $_GET);
    }

    private function Home_test(...$params)
    {
        $this->includeWithParams("view/home_test.php", $_GET);
    }
    private function Shop(...$params)
    {
        $this->includeWithParams("view/shop.php", $_GET);
    }
    private function Registration(...$params)
    {
        $this->includeWithParams("view/registration_page.php", $_GET);
    }
       private function PlaceOrder(...$params)
    {
        $this->includeWithParams("view/place_order.php", $_GET);
    }
    private function ProductDetails(...$params)
    {
        $this->includeWithParams("view/product_details.php", $_GET);
    }

    private function Cart(...$params)
    {
        $this->includeWithParams("view/cart.php", $_GET);
    }

    private function Wishlist(...$params)
    {
        $this->includeWithParams("view/wishlist.php", $_GET);
    }

    private function Login(...$params)
    {
        $this->includeWithParams("view/login.php", $_GET);
    }

    private function Profile(...$params)
    {
        $this->includeWithParams("view/user_profile.php", $_GET);
    }
     private function Address(...$params)
    {
        $this->includeWithParams("view/address.php", $_GET);
    }
    
    private function OrderConfirmation(...$params)
    {
        $this->includeWithParams("view/order_confirmation.php", $_GET);
    }
    private function ForgetPassword(...$params)
    {
        $this->includeWithParams("view/forget_password.php", $_GET);
    }
    private function Orders(...$params)
    {
        $this->includeWithParams("view/orders.php", $_GET);
    }
    private function Orders_details(...$params)
    {
        $this->includeWithParams("view/order_details.php", $_GET);
    }
    
     private function Link(...$params)
    {
        $this->includeWithParams("view/product_details_encrypted_id.php", $_GET);
    }
    
    
    private function Shopmenu(...$params)
    {
        $this->includeWithParams("view/orders_new.php", $_GET);
    }
    private function includeWithParams($file, $params)
    {
        foreach ($params as $key => $value) {
            $key = $value;
        }
        include($file);
    }
    
    
    public function generateUrl($route, $params = [])
    {
        $this->encryption = new UrlEncryption($this->key);

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