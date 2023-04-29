<?php 
    require_once('../models/db.php');
    require_once('Core.php');

    if (isset($_POST['login'])) {
        Core::checkLogin();
    }
    
    if (isset($_POST['logout'])) {
        Core::closeSession();
    }
?>
