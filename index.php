
<?php

define('DS', DIRECTORY_SEPARATOR);
require_once "lib" . DS . "kite.php";

$kite = KITE::getinstance("kite");
$kite->main();
?>
