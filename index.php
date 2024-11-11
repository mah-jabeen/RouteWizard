
<?php

// Enable error reporting for debugging
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
require_once "lib" . DS . "kite.php";

$kite = KITE::getinstance("kite");
$kite->main();
?>
