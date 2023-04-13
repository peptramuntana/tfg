<?php
    require('Core.php');
    $url = Core::getUrl();
    defined("VISTA") or define('VISTA', Core::dameVista($url));

    // Cargamos si tenemos el controlador específico de la vista
    include __DIR__ . '/'.Core::dameVista($url).'.php'; // REVISAR
?>