<?php

    require_once('Core.php');

    
    // Get the URL
    $urlData = Core::getClientUrl();
    // Define the global variables from the URL
    Core::defineClientVariables($urlData);
    
    // print_r($urlData);
    // echo "<br>";

    //If we are not in the root
    // if(!empty($urlData)) {
        // Get the data from the Database with the URL
        $systemLangData = Database::getLang();
        // Define the language of the system
        Core::defineSystemLang($systemLangData);

        $viewData = Database::getView();

        print_r("viewData --> ");
        var_dump($viewData);
        echo "<br>";
        echo "<br>";

        Core::defineSystemURL($viewData);

        // echo "----------------------------";
        // echo "<br>";
        // print_r("URL_LANG --> ". URL_LANG);
        // echo "<br>";
        // print_r("URL_MENU --> ". URL_MENU);
        // echo "<br>";
        // echo "----------------------------";
        // echo "<br>";
        // print_r("System Lang --> ". SYSTEM_LANG);
        // echo "<br>";
        // print_r("System URL --> ". SYSTEM_URL);
        // echo "<br>";
        // print_r("System View --> ". SYSTEM_VIEW);
        // echo "<br>";
        // print_r("System View URL--> ". SYSTEM_VIEW_URL);
        // echo "<br>";
        // echo "----------------------------";
        // echo "<br>";

        Core::redirect();
?>