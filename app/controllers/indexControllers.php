<?php
    require_once('Core.php');
    
    // Get the URL
    $urlData = Core::getUrl();
    // Define the global variables from the URL
    Core::clientURL($urlData);
    print_r($urlData);
    echo "<br>";

    $langData = Database::getLang();


    $lang = Core::systemLang($langData);
    print_r($lang);
    echo "<br>";
    // $viewData = Database::getView();
    // Core::systemURL($viewData);


    // print_r("SYSTEM LANG --> " . DATABASE_LANG);
    // echo "<br>";
    // print_r("SYSTEM VIEW --> " . SYSTEM_VIEW);
    // echo "<br>";
    // print_r("SYSTEM VIEW URL--> " . SYSTEM_VIEW_URL);
    // echo "<br>";
    // print_r("SYSTEM URL --> " . SYSTEM_URL);
    // echo "<br>";


    // Cargamos si tenemos el controlador específico de la vista
    // include __DIR__ . '/'.Core::dameVista($url).'.php'; // REVISAR
?>