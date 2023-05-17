<?php
    // Import the Core Class
    require_once('Core.php');

    // Get the URL
    $urlData = Core::getClientUrl();

    // Define the global variables from the client (URL)
    Core::defineClientVariables($urlData);

    // Find the language with the data of the Client (URL)
    $systemLangData = Database::getUrlLang();

    // Compare the client language (URL) with the database languages (SYSTEM)
    // If the client language is not in the database define default language as system language, if not, define the system language as client language
    Core::defineSystemLang($systemLangData);

    // Find the view with the data of the Client (URL)
    $viewData = Database::getView();

    // Compare the client data (URL) with the database data (SYSTEM) of the views and the define tje system URL
    Core::defineSystemURL($viewData);

    // Redirect to error if the URL is not correct
    Core::redirect();
?>