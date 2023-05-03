<?php 
    require_once('../models/db.php');
    require_once('Core.php');

    define("SYSTEM_LANG", $_POST['system_lang']);
    define("SYSTEM_LANG_ID", $_POST['system_lang_id']);
    $system_lang = SYSTEM_LANG;
    $system_lang_id = SYSTEM_LANG_ID;

    if (isset($_POST['login'])) {
        Core::checkLogin();
    }
    
    if (isset($_POST['logout'])) {
        Core::closeSession();
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
        header("Location: http://localhost/".SYSTEM_LANG."/administrator");
    }

    if (isset($_POST['hide-project'])) {
        $project_id = $_POST['project_id'];
        $project_state = $_POST['project_state'];
        $project_state === 1 ? $switched_state = 0 : $switched_state = 1;
        Database::hideProject($system_lang_id, $project_id, $switched_state);
        header("Location: http://localhost/".SYSTEM_LANG."/administrator");
    }
?>
