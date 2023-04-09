<?php

/* Map the loaded URL from Client */
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // Constructor
    // public function __construct() {
    //     $url = $this->getUrl();
    // }


    static function getUrl() {
        //It gets the URL, starting from "index.php"
        echo "Hello world";
        echo "<br>";
        echo "<br>";
        var_dump($_GET);
        echo "<br>";
        echo $_GET['url'];
        echo "<br>";
        echo "<br>";
    }
}

?>
