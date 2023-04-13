<?php
    //Import the Model and Controller
    require_once('app/Models/indexModels.php');
    require_once('app/controllers/indexControllers.php');
    

    //Call to the method which returns the URL
    echo "hello world";
    echo "<br>";
    echo $_SERVER['REQUEST_URI'];
    //defined("LANG") or define("LANG", "es");
    include 'app/views/indexViews.php';
    //include 'app/views/'.Core::dameVista($url).'.php';
    echo "<pre>";
    print_r($url);
    echo '</pre>';
    
?>