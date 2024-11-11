<?php

class kite
{
private static $instance = array();
    function main()
    {
        require_once "lib" . DS . "node.php";
        $node = new node();
        $node->router();
    }


    // whenever you are  creating object you just need to do this
    public static function getinstance($class){
         if(isset(self::$instance[$class])) {
            return self::$instance[$class];
         }else{
            self::$instance[$class] = new $class();
            return self::$instance[$class];
         }

    }
}
