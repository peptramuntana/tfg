<?php 
    require_once('../models/db.php');
    require_once('Core.php');

    if (isset($_POST['login'])) {
        Core::checkLogin();
    }
    
    if (isset($_POST['logout'])) {
        Core::closeSession();
    }

    if (isset($_POST['update'])) {
        $projectID = $_POST['projectID'];
        $title = $_POST['title'];
        $description = $_POST['description'];
    
        $images = [];
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'image-url-') === 0) {
                $counter = substr($key, strlen('image-url-'));
                $image = [
                    'url' => $_POST['image-url-' . $counter],
                    'alt' => $_POST['image-alt-' . $counter],
                    'title' => $_POST['image-title-' . $counter]
                ];
                $images[] = $image;
            }
        }
        
        print_r("projectID -->$projectID");
        echo '<br>';
        print_r("title -->$title");
        echo '<br>';        
        print_r("description -->$description");
        echo '<br>';
        var_dump($images);
        echo '<br>';
    }
?>
