<?php 
    require_once('../models/db.php');
    require_once('Core.php');

    define("SYSTEM_LANG", $_POST['lang']);

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
            echo $key;
            echo '<br>';
            echo $value;
            echo '<br>';
            // if (substr($key, 0, -1) === 'image-url-') {
            //     $counter = substr($value, -1);
            //     $image = [
            //         'url' => $_POST['image-url-' . $counter],
            //         'alt' => $_POST['image-alt-' . $counter],
            //         'title' => $_POST['image-title-' . $counter]
            //     ];
            //     $images[] = $image;
            // }
            if (strpos($value, 'image-url-') !== false) {
                $counter = substr($key, -1);
                $image = [
                    'url' => $_POST['image-url-' . $counter],
                    'alt' => $_POST['image-alt-' . $counter],
                    'title' => $_POST['image-title-' . $counter]
                ];
                $images[] = $image;
            }
        }
        
        print_r("images[] -->".var_dump($images));
        echo '<br>';

        foreach ($_POST as $post => $value) {
            var_dump($post. ' --> ' .$value);
            echo '<br>';
        }
        
        echo '<br>';
        print_r("projectID -->$projectID");
        echo '<br>';
        print_r("title -->$title");
        echo '<br>';        
        print_r("description -->$description");
        echo '<br>';
        
    }
?>
