<?php 
if(isset($_GET['url'])){
    $url = $_GET['url'];
    $url= explode('/', $url);
     var_dump($url);
}

?>