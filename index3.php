<?php
    //Import the Model and Controller
    require_once('app/controllers/indexControllers.php');
    require_once('app/Models/indexModels.php');

    //Call to the method which returns the URL
    $url = Core::getUrl();

    //If the URL don't have params, it will be redirected to the index.php
    if ($url == null) {
        $url = array('index.php');
        echo "null";
    }
    //If the URL has params...
    else {
        //Get the lang tags
        $getLangs = Database::getLangs();
        //Create an array with the tags
        $langsTags = array();
        //Push the tags in the array
        foreach ($getLangs as $lang) {
            array_push($langsTags, $lang->tag);
        }
        //Search if the first parameter of the URL is a tag
        if(in_array($url[0], $langsTags)) {
            //If it is, search the view and head to the URL with the tag
            $getLangId = Database::getLangId($url[0]);
            $langID = $getLangId[0]->id;
            if($url[1] == null) {
                header("Location:/");
            } else {
                $getMenu = Database::getMenu($url[1], $langID);
                if($getMenu[0]->url == null) {
                    // header("Location:error404.php");
                } else {
                    // header("Location:$getMenu[0]->url");
                }
            }
            echo $langID;
            print_r("<br>");
            print_r("true");
            print_r("<br>");
        } else {
            //If it's not, search the view in the default language and head to or return to index.php
            echo "false";
            echo "<br>";
        }
        // }
        // $defaultTag = $getDefaultLanguage[0]->tag;
        // //Get the first param of the URL
        // $firstParam = $url[0];
        // //If the first param is the default language, it will be removed
        // if ($firstParam == $defaultTag) {
        //     $getDefaultLanguage = Database::getDefault();
        // }
        // foreach ($url as $subQuery) {
        //     echo $subQuery;
        //     echo "<br>";
        // }
    }

    
    
    // foreach ($getDefault as $default) {
    //     echo $default -> tag;
    //     // echo $default;
    //     echo "<br>";
    // }

    // $test = Database::readMenus();
    // foreach ($test as $tested) {
    //     echo $tested->id;
    //     echo "<br>";
    // }
    // echo $test[0]->id;
?>