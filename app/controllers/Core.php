<?php

class Core {

    static function getUrl() {

        // Define variables 
        $output = [];

        // Get the User URL
        $urlTmp = $_SERVER["REQUEST_URI"];
        // Removes the strange characters
        $urlTmp = filter_var($urlTmp, FILTER_SANITIZE_URL);
        // Split the URL into an array of 1 index
        $urlComplete = explode('?',$urlTmp);
        // Split the index[0] in more indexes split by /
        $url = explode('/', $urlComplete[0]);
        // Remove the first index of the array (empty)
        $url = array_filter($url);

        // Get the first parameter of the URL
        $firstParam = array_shift($url);
        // Check if the first parameter is a language
        if(strlen($firstParam) == 2)
        {
            // Define language set by the user
            define("LANG", $firstParam);
        }
        else{
            // Define the default language
            define("LANG", "es");
        }

        // Add the first param to the array
        $output[] = $firstParam;

        // Add the rest of the params to the array
        foreach ($url as $key => $value) {
            $output[] = $value;
        }
        
        return $output;
    }


    // Pasamos Array con URLs (ej: proyectos/categoria/filtro2) 
    static function dameVista($url)
    {
        if(count($url) == 1){
            // HAgo query y me devuelve datos de la vista   
            //return $vista['view'];
        }// Buscar $url[0] en menu: X
        // Si $url[1], buscar en menu y asociaciones si es hijo de X
        return $url[0];
    }
}

?>
