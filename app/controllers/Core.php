<?php

class Core {

    static function clientURL($array) {
        // Get the first parameter of the URL
        // $firstParam = array_shift($array);
        // Check if the first parameter is a language
        if(strlen($array[0]) == 2)
        {
            if(array_key_exists(3, $array)) {
                define("URL_LANG", strtolower($array[0]));
                define("URL_MENU", "error404");
                // Error 404
            } else {
                if(array_key_exists(2, $array)) {
                    define("URL_LANG", strtolower($array[0]));
                    define("URL_MENU", strtolower($array[1]));
                    define("URL_PARAM", strtolower($array[2]));
                } else {
                    define("URL_LANG", strtolower($array[0]));
                    if(array_key_exists(1, $array)) {
                        define("URL_MENU", strtolower($array[1]));
                    } else {
                        define("URL_MENU", "");}
                }
            }
        }
        else {
            // Define the default language
            define("URL_LANG", "es");
            if(array_key_exists(2, $array)) {
                define("URL_MENU", "Error404");
            } else {
                define("URL_MENU", strtolower($array[1]));
            }
        }
    }

    static function systemURL($array) {
        if(empty($array))
        {
            define("SYSTEM_VIEW", "error404");
            define("SYSTEM_VIEW_URL", "app/views");
            define("SYSTEM_URL", "");
        } else {
            foreach($array as $key) {
                define("SYSTEM_LANG", $key->lang_tag);
                if(empty($key->view_name)) {
                    define("SYSTEM_VIEW", "error404");
                }
                else {
                    define("SYSTEM_VIEW", $key->view_name);
                }
                define("SYSTEM_VIEW_URL", $key->view_url);
                define("SYSTEM_URL", $key->menu_url);
            }

        }
    }

    static function systemLang($langData) {
        if(empty($langData)) {
            $lang = "es";
        }
        else {
            $lang = $langData[0]->tag;
        }
        return $lang;
    }
    
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

        // Add the rest of the params to the array
        foreach ($url as $key => $value) {
            $output[] = $value;
        }
        return $output;
    }

    static function getView($url)
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
