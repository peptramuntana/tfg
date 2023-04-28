<?php
    Core::checkSession();
    echo "<br>";
    if(isset($_SESSION["login"])){
        echo "Session login is set";
        echo "<br>";
    } else {
        echo "Session login is not set";
        echo "<br>";
    }
    echo "<br>";
    echo "Hello world from AdministratorView.php";
    echo "<br>";


?>