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
        foreach ($_POST as $post => $value ) {
            if(substr($post,0, -1) === 'image-id-') {
                $counter = substr($post, -1);
                $arrayImage = [
                    'id' => $_POST['image-id-'.$counter],
                    'url' => $_POST['image-url-'.$counter],
                    'alt' => $_POST['image-alt-'.$counter],
                    'title' => $_POST['image-title-'.$counter]
                ];
                array_push($images, $arrayImage);
            }
        }
        
        foreach($images as $image => $value) {
            print_r(var_dump($value));
            echo '<br>';
        }
        // echo '<br>';

        // foreach ($images as $image => $value) {
        //     print_r(var_dump("image --> ".$value));
        //     echo '<br>';
        // }
        
        echo '<br>';
        print_r("projectID -->$projectID");
        echo '<br>';
        print_r("title -->$title");
        echo '<br>';        
        print_r("description -->$description");
        echo '<br>';
        
    }
?>
