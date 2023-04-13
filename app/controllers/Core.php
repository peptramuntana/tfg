<?php

/* Map the loaded URL from Client */
class Core {

    static function getUrl() {
        //if(isset($_GET['url'])) {
            //It removes the last slash
        $urlTmp = $_SERVER["REQUEST_URI"];
        $urlTmp = filter_var($urlTmp, FILTER_SANITIZE_URL);
        $urlCompleta = explode('?',$urlTmp);
        $url = explode('/', $urlCompleta[0]);
        //$url = rtrim($_SERVER["REQUEST_URI"], '?');
        //It removes the slashes
        //$url = filter_var($url, FILTER_SANITIZE_URL);
        //It splits the URL into an array
        $url = array_filter($url);
        $salida = [];
        $primerItem = array_shift($url);
        if(strlen($primerItem) == 2)
        {
            // Defines IDIOMA
            define("LANG", $primerItem);
        }
        else{
            $salida[] = $primerItem;
        }
        foreach ($url as $key => $value) {
            # code...
            $salida[] = $value;
        }
        defined("LANG_TAG") or define("LANG_TAG", "es");
        return $salida;
       // } else {
          //  return null;
        //}

        // define("LANG", "es");
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
