<?php

class Core {

    // Get the URL and split it into an array
    static function getClientUrl() {

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

    // Define de Client URL variables
    static function defineClientVariables($array) {
        if(!empty($array)) {
            if(strlen($array[0]) == 2)
            {
                // If the first param is Language
                if(array_key_exists(3, $array)) {
                    // If the URL is in the root and has a language and has more than 3 params define error
                    define("URL_LANG", strtolower($array[0]));
                    define("URL_MENU", "error404");
                } else {  
                    if(array_key_exists(2, $array)) {
                        // If the URL is in the root and has a language and has 3 params define the params
                        define("URL_LANG", strtolower($array[0]));
                        define("URL_MENU", strtolower($array[1]));
                        define("URL_PARAM", strtolower($array[2]));
                    } else {
                        define("URL_LANG", strtolower($array[0]));
                        if(array_key_exists(1, $array)) {
                            // If the URL is in the root and has a language and has 2 param define the params
                            define("URL_MENU", strtolower($array[1]));
                        } else {
                            // If the URL is in the root and has a language and has 1 param define the params
                            define("URL_MENU", "");}
                    }
                }
            }
            else {
                // If the first param is not a language define default language
                define("URL_LANG", "es");
                if(array_key_exists(1, $array)) {
                    // If the first param is not a language and has 2 params define second param as error
                    define("URL_MENU", "error404");
                } else {
                    // If the first param is not a language and has 1 param define second param
                    define("URL_MENU", strtolower($array[0]));
                }
            }
        } else {
            // If the URL is in the root define the default language
            define("URL_LANG", "es");
            define("URL_MENU", "");
        }
    }

    // Define the system language as default or the same as the client language
    static function defineSystemLang($langData) {
        if(empty($langData)) {
            // Define the system language as default
            define("SYSTEM_LANG", "es");
            define("SYSTEM_LANG_ID", "1");
        }
        else {
            // Define the system language as the same as the client language
            define("SYSTEM_LANG", $langData[0]->tag);
            define("SYSTEM_LANG_ID", $langData[0]->id);
        }
    }

    // Define the system URL
    static function defineSystemURL($array) {
        if(defined('URL_PARAM') || URL_MENU != $array[0]->menu_url || URL_LANG !== SYSTEM_LANG) {
            // If there is a third param, or the second param is not in the database, or the language is not the same as the system language define error
            define("SYSTEM_VIEW", "error404");
            define("SYSTEM_VIEW_URL", "app/views");
            define("SYSTEM_URL", "");
        } else {
            foreach($array as $key) {
                // If the second param is in the database define the system URL, the system view and the system view URL
                define("SYSTEM_VIEW", $key->view_name);
                define("SYSTEM_VIEW_URL", $key->view_url);
                define("SYSTEM_URL", $key->menu_url);
            }
        }
    }

    // Redirect to error if the URL is not correct
    static function redirect() {
        if(URL_LANG != SYSTEM_LANG || URL_MENU != SYSTEM_URL) {
            header("Location: http://localhost/".SYSTEM_LANG."/error404");
        }
    }

    // Load the view
    static function loadView() {
        if(URL_LANG != SYSTEM_LANG || URL_MENU != SYSTEM_URL) {
            // If the client lang is not the same as the system lang or the client menu is not the same as the system menu load error
            require_once(SYSTEM_VIEW_URL."/error404.php");
            
        } else {
            // If the client lang is the same as the system lang and the client menu is the same as the system menu load the view
            require_once(SYSTEM_VIEW_URL."/".SYSTEM_VIEW.".php");
        }
    }

    // Check the session
    static function checkSession() {
        session_start();
        if (!isset($_SESSION['login'])) {
            // If the session is not set redirect to login
            header("Location: http://localhost/".SYSTEM_LANG."/login");
            }
    }
}
