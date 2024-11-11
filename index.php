
<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);

class kite {
    public $routes = array();
    
    function router() {
        // Getting URL here
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            // Breaking URL
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            foreach ($url as $key => $value) {
                $this->routes[$key] = $value; 
            }
        } 

        require_once "app" . DS . "controllers" . DS . "root.php"; 
        $root = new root();

        // Getting the root
        if (isset($this->routes['0'])) {
            $alpha = ucfirst($this->routes['0']); // Capitalize the first letter of the controller name
            $file = "app" . DS . "controllers" . DS . strtolower($alpha) . ".php";

            // Debug output to verify file path
            echo "Looking for file: " . $file . "<br>";

            if (file_exists($file)) {
                require_once $file;
                if (class_exists($alpha)) {
                    $app = new $alpha();

                    if (isset($this->routes['1'])) {
                        $beta = $this->routes['1'];
                        if(method_exists($app, $beta)){
                            $app->$beta(); // Call the method
                        } else {
                            echo "Method '$beta' does not exist in class '$alpha'. Calling main() instead.";
                            $app->main();
                        }
                    } else {
                        // Default method if none specified
                        $app->main();
                    }
                } else {
                    echo "Class '$alpha' does not exist in file '$file'.";
                }
            } else {
                echo "File '$file' does not exist.";
            }
        } else {
            $root->main();
        }
    }
}

$kite = new kite();
$kite->router();
?>
