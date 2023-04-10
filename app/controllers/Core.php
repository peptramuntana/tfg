<?php

/* Map the loaded URL from Client */
class Core {

    static function getUrl() {
        if(isset($_GET['url'])) {
            //It removes the last slash
            $url = rtrim($_GET['url'], '/');
            //It removes the slashes
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //It splits the URL into an array
            $url = explode('/', $url);
            return $url;
        } else {
            return null;
        }
    }
}

?>
