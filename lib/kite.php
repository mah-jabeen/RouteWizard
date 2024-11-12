<?php
define('DS', DIRECTORY_SEPARATOR);

class kite {
    private static $instance = array();

    function main() {
        require_once "lib" . DS . "node.php";

        $node = self::getinstance('Node');
        $node->router();
    }

    // Whenever you are creating an object you just need to do this
    // Here checking if instance has been created or not
    public static function getinstance($class) {
        if (isset(self::$instance[$class])) {
            return self::$instance[$class];
        } else {
            if (class_exists($class)) {
                // We've to basically load the function here which is autoload
                self::autoload($class);
                self::$instance[$class] = new $class();
                return self::$instance[$class];
            }
        }
        return null; // Return null if class does not exist
    }

    public static function autoload($class) {
        $paths = array('testing', 'RouteWizard' . DS . 'controllers', 'app' . DS . 'models');
        foreach ($paths as $path) { // Corrected $paths to $path
            $file = $path . DS . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}

$kite = new kite();
$kite->main();
