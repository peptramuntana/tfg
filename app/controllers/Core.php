<?php

class Core {

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

    static function defineClientVariables($array) {

        // Check if the $array is not in the root
        if(!empty($array)) {
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
                if(array_key_exists(1, $array)) {
                    define("URL_MENU", "error404");
                } else {
                    define("URL_MENU", strtolower($array[0]));
                }
            }
        } else {
            // Define the default language
            define("URL_LANG", "es");
            define("URL_MENU", "");
        }

    }

    static function defineSystemLang($langData) {
        if(empty($langData)) {
            define("SYSTEM_LANG", "es");
            define("SYSTEM_LANG_ID", "1");
        }
        else {
            define("SYSTEM_LANG", $langData[0]->tag);
            define("SYSTEM_LANG_ID", $langData[0]->id);
        }
    }

    static function defineSystemURL($array) {
        if(defined('URL_PARAM') || URL_MENU != $array[0]->menu_url || URL_LANG !== SYSTEM_LANG) {

            // echo "Error 404 defined in defineSystemURL()";
            // echo "<br>";

            // if (URL_MENU != $array[0]->menu_url) {
            //     echo "URL_MENU --> ".URL_MENU;
            //     echo "<br>";
            //     echo "array[0]->menu_url --> ".$array[0]->menu_url;
            //     echo "<br>";
            // }

            // if (URL_LANG !== SYSTEM_LANG) {
            //     echo "URL_LANG --> ".URL_LANG;
            //     echo "<br>";
            //     echo "SYSTEM_LANG --> ".SYSTEM_LANG;
            //     echo "<br>";
            // }

            // if(defined('URL_PARAM')){
            //     echo "URL_PARAM --> ".URL_PARAM;
            // }

            define("SYSTEM_VIEW", "error404");
            define("SYSTEM_VIEW_URL", "app/views");
            define("SYSTEM_URL", "");
        } else {
            // echo "System variables correctly defined in defineSystemURL()";
            // echo "<br>";
            foreach($array as $key) {
                define("SYSTEM_VIEW", $key->view_name);
                define("SYSTEM_VIEW_URL", $key->view_url);
                define("SYSTEM_URL", $key->menu_url);
            }

        }
    }

    static function redirect() {
        if(URL_LANG != SYSTEM_LANG || URL_MENU != SYSTEM_URL) {
            header("Location: http://localhost/".SYSTEM_LANG."/error404");
        }
    }

    static function loadView() {
        if(URL_LANG != SYSTEM_LANG || URL_MENU != SYSTEM_URL) {
            // echo "Load view error 404";
            // echo "<br>";
            require_once(SYSTEM_VIEW_URL."/error404.php");
            
        } else {
            // echo "Load system view";
            // echo "<br>";
            require_once(SYSTEM_VIEW_URL."/".SYSTEM_VIEW.".php");
        }
    }

    static function checkLogin() {     
        $counter = Database::checkLogin();
        if ($counter != 0) {
            session_start();
            $_SESSION['login'] = $_POST["password"];
            // echo ("
            //     <script>
            //         window.alert('Entrando al administrador...');
            //         window.location.href = 'http://localhost/administrator';
            //     </script>
            // ");
            header("Location: http://localhost/".SYSTEM_LANG."/administrator");
            } else {
            session_destroy();
            // echo ("
            //     <script>
            //         window.alert('Usuario, password o ambos incorrecto.');
            //         window.location.href = 'http://localhost/login';
            //     </script>
            // ");
            header("Location: http://localhost/login");
        }
    }

    static function checkSession() {
        session_start();
        if (!isset($_SESSION['login'])) {
            header("Location: http://localhost/login");
            // echo ("
            //         <script>
            //             window.alert('Necesitas iniciar sesión para acceder.');
            //             window.location.href = 'http://localhost/login';
            //         </script>
            //     ");
            }
    }

    static function closeSession() {
        session_start();
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            session_destroy();
            header("Location: http://localhost/login");
        } else {
            header("Location: http://localhost/administrator");
        }
}}
