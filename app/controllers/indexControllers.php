<?php
    require_once('Core.php');
    
    // Get the URL
    $url = Core::getUrl();
    // Define the global variables from the URL
    Core::urlVariables($url);


    print_r($url);

    echo "<br>";
    print_r("The language is ". LANG);
    echo "<br>";

    print_r("La vista is ".VIEW .'.php');
    echo "<br>";

    $langId = Database::getLangId(LANG);
    echo "<br>";

    echo "<br>";

    print_r($langId);
    // $view = Database::getView();
    print_r($view);
    // Cargamos si tenemos el controlador específico de la vista
    // include __DIR__ . '/'.Core::dameVista($url).'.php'; // REVISAR
?>