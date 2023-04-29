<?php
    require_once('Core.php');
    Core::checkSession();
    if(isset($_SESSION["login"])){
        echo "Session login is set";
        echo "<br>";
    } else {
        echo "Session login is not set";
        echo "<br>";
    }

?>