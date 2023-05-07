<?php 
    require_once('../models/db.php');
    require_once('Core.php');

    define("SYSTEM_LANG", $_POST['system_lang']);
    define("SYSTEM_LANG_ID", $_POST['system_lang_id']);
    $system_lang = SYSTEM_LANG;
    $system_lang_id = SYSTEM_LANG_ID;

    if (isset($_POST['login'])) {
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
        
        $project_id = $_POST['project_id'];
        $project_title = $_POST['project_title'];
        $project_content = $_POST['project_content'];
    
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
        Database::updateProjectTexts($system_lang_id, $project_id, $project_title, $project_content);
        foreach($images as $image => $value) {
            $image_id = $value['id'];
            $image_url = $value['url'];
            $image_alt = $value['alt'];
            $image_title = $value['title'];
            Database::updateImageProject($system_lang_id, $project_id, $image_id, $image_url, $image_title, $image_alt);
        }
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/#$project_id");
    }

    if (isset($_POST['hide-project'])) {
        $project_id = $_POST['project_id'];
        $project_state = $_POST['project_state'];
        $switched_state = $project_state == 1 ? 0 : 1;
        Database::hideProject($system_lang_id, $project_id, $switched_state);
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/#$project_id");
    }
    
    if (isset($_POST['delete'])) {
        $project_id = $_POST['project_id'];
        Database::deleteProjectTexts($project_id);
        Database::deleteProjectSlider($project_id);
        Database::deleteGallery($project_id);
        Database::deleteProject($project_id);
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/");
    }

    if (isset($_POST['create-project'])) {
        $project_title = $_POST['project_title'];
        $project_content = $_POST['project_content'];
        $image_url_1 = $_POST['image-url-1'];
        $image_alt_1 = $_POST['image-alt-1'];
        $image_title_1 = $_POST['image-title-1'];
        $image_url_2 = $_POST['image-url-2'];
        $image_alt_2 = $_POST['image-alt-2'];
        $image_title_2 = $_POST['image-title-2'];
        
        $project_id = Database::createProject($project_title, 0);  
        $gallery_id = Database::createGallery($project_title, $project_id);

        $langs = Database::getLangs();  
        foreach($langs as $lang) {
            Database::createProjectTexts($lang->id, $project_id, $project_title, $project_content);
            Database::createImage($lang->id, $gallery_id, $image_url_1, $image_alt_1, $image_title_1, 1);
            Database::createImage($lang->id, $gallery_id, $image_url_2, $image_alt_2, $image_title_2, 1);    
        }
        header("Location: http://localhost/".SYSTEM_LANG."/administrator/");
    }
