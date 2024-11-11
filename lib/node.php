<?php

// Enable error reporting for debugging
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// define('DS', DIRECTORY_SEPARATOR);

class Node {
    var $arr = array('0' => 'alpha', '1' => 'beta', '2' => 'gamma', '3' => 'delta', '4' => 'epsilon');
    public $alpha;
    public $beta;
    public $gamma;
    public $delta;
    public $epsilon;

    // Set function is used to set the key and the value
    function set($key, $value) {
        $this->$key = $value;
    }

    // Get function to retrieve the stored value
    function get($key) {
        return $this->$key;
    }

    function router() {
        // Getting URL here
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            // Breaking URL
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            foreach ($url as $key => $value) {
                if (isset($this->arr[$key])) {
                    $this->set($this->arr[$key], $value);
                } else {
                    $this->set($key, $value);
                }
            }
            // var_dump($this); // For debugging
        }

        require_once "app" . DS . "controllers" . DS . "root.php";
        $root = new Root();

        // Getting the root
        if (isset($this->alpha)) {
            $alpha = ucfirst($this->alpha); // Capitalize the first letter of the controller name
            $file = "app" . DS . "controllers" . DS . strtolower($alpha) . ".php";

            // Debug output to verify file path
            echo "Looking for file: " . $file . "<br>";

            if (file_exists($file)) {
                require_once $file;
                if (class_exists($alpha)) {
                    $app = new $alpha();

                    if (isset($this->beta)) {
                        $beta = $this->beta;
                        // Debugging output to check the value of beta
                        echo "Beta method: " . $beta . "<br>";
                        
                        if (method_exists($app, $beta)) {
                            $app->$beta($this->alpha,$this->beta); // Call the method
                        } else {
                            echo "Method '$beta' does not exist in class '$alpha'.";
                            $app->main(); // Default method if specified method doesn't exist
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

$kite = new Node();
$kite->router();
?>
