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
        return null; 
    }

    private static function autoload($class) {
        $paths = array('testing', 'RouteWizard' . DS . 'controllers', 'app' . DS . 'models');
        foreach ($paths as $path) { 
            $file = $path . DS . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    public static function render($view){
$kite= KITE::getinstance("kite");
$kite->set('view',$view);
$tmpl= $kite->get('tmpl');

$request= KITE::getinstance("request");
if($request->get("templ")!= "null"){
    $tmpl= $request->get('tmpl');
}
if($request->get('type')=='json'){
    echo json_encode($basket);
}else{
    require_once "templates".DS."$tmpl".DS."index.php";

}


        require_once"templates".DS."startup".DS."index.php";
    }

    public static function app(){
        require_once"app".DS."views".DS."add".DS."default.php";

    }
}

$kite = new kite();
$kite->main();
