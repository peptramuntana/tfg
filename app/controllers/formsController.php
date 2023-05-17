<?php 
    // Import the Core Class and Database Class
    require_once('../models/db.php');
    require_once('Core.php');

    // Define the global SYSTEM variables
    define("SYSTEM_LANG", $_POST['system_lang']);
    define("SYSTEM_LANG_ID", $_POST['system_lang_id']);
    $system_lang = SYSTEM_LANG;
    $system_lang_id = SYSTEM_LANG_ID;

    
    if (isset($_POST['login'])) {
        // If the login form is submitted check the login
        $counter = Database::checkLogin();
        if ($counter != 0) {
            session_start();
            $_SESSION['login'] = $_POST["password"];
            header("Location: http://localhost/".SYSTEM_LANG."/administrator");
            } else {
            session_destroy();
            header("Location: http://localhost/".SYSTEM_LANG."/login");
        }    }
    
    if (isset($_POST['logout'])) {
        // If the logout form is submitted destroy the session and redirect to login
        session_start();
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            session_destroy();
            header("Location: http://localhost/".SYSTEM_LANG."/login");
        } else {
            header("Location: http://localhost/".SYSTEM_LANG."/administrator");
        }
    }

    if (isset($_POST['update'])) {
        // If the update form is submitted update the texts
        // Get the texts from the form and create the array of images
        $project_id = $_POST['project_id'];
        $project_title = $_POST['project_title'];
        $project_content = $_POST['project_content'];
        $images = [];

        foreach ($_POST as $post => $value ) {
            // Iterate all the posts and check if the post is an image
            if(substr($post,0, -1) === 'image-id-') {
                // If the post is an image create an array with the image data and push it to the images array
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
        // Update the texts
        Database::updateProjectTexts($system_lang_id, $project_id, $project_title, $project_content);

        // Update the images
        foreach($images as $image => $value) {
            // Iterate the images array and update the images
            $image_id = $value['id'];
            $image_url = $value['url'];
            $image_alt = $value['alt'];
            $image_title = $value['title'];
            Database::updateImageProject($system_lang_id, $project_id, $image_id, $image_url, $image_title, $image_alt);
        }
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/#$project_id");
    }

    if (isset($_POST['hide-project'])) {
        // If the hide project form is submitted hide the project
        // Get the project id and the project state
        $project_id = $_POST['project_id'];
        $project_state = $_POST['project_state'];
        // Switch the project state
        $switched_state = $project_state == 1 ? 0 : 1;
        // Hide the project
        Database::hideProject($system_lang_id, $project_id, $switched_state);
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/#$project_id");
    }
    
    if (isset($_POST['delete'])) {
        // If the delete form is submitted delete the project
        $project_id = $_POST['project_id'];
        // Delete the project
        Database::deleteProjectTexts($project_id);
        // Delete the images
        Database::deleteProjectSlider($project_id);
        // Delete the gallery
        Database::deleteGallery($project_id);
        // Delete the project
        Database::deleteProject($project_id);
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/");
    }

    if (isset($_POST['create-project'])) {
        // If the create project form is submitted create the project
        // Get the texts from the form and create the array of images
        $project_title = $_POST['project_title'];
        $project_content = $_POST['project_content'];
        $image_url_1 = $_POST['image-url-1'];
        $image_alt_1 = $_POST['image-alt-1'];
        $image_title_1 = $_POST['image-title-1'];
        $image_url_2 = $_POST['image-url-2'];
        $image_alt_2 = $_POST['image-alt-2'];
        $image_title_2 = $_POST['image-title-2'];
        
        // Create the project
        $project_id = Database::createProject($project_title, 0);  
        // Create the gallery
        $gallery_id = Database::createGallery($project_title, $project_id);

        // Create the texts and images for each language
        $langs = Database::getLangs();  
        foreach($langs as $lang) {
            // Iterate the languages and create the texts and images
            Database::createProjectTexts($lang->id, $project_id, $project_title, $project_content);
            Database::createImage($lang->id, $gallery_id, $image_url_1, $image_alt_1, $image_title_1, 1);
            Database::createImage($lang->id, $gallery_id, $image_url_2, $image_alt_2, $image_title_2, 1);    
        }
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/");
    }
