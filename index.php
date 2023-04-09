<?php
    //Import the Core class
    require_once('app/controllers/indexControllers.php');
    require_once('app/Models/indexModels.php');

    //Create a new instance of the Core class
    Core::getUrl();

    phpinfo();


    $test = Database::readMenus();
    foreach ($test as $tested) {
        echo $tested->id;
        echo "<br>";
    }

?>