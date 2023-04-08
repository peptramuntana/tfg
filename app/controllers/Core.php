<?php

/* Map the loaded URL from Client */
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // Constructor
    public function __construct() {
        $url = $this->getUrl();
    }


    public function getUrl() {
        //It gets the URL, starting from "index.php"
        echo "Hello world";
        var_dump($_GET);

        echo $_GET['url'];
    }
}

?>
