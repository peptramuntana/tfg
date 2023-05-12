<?php
$menusData = Database::getMenus();
foreach ($menusData as $key) {

    if ($key->name == "Home") {
        $home = str_replace('-', ' ', ucwords(strtolower($key->url)));
        $home_url = $key->url;
    }

    if ($key->name == "Projects") {
        $projects = str_replace('-', ' ', ucwords(strtolower($key->url)));
        $projects_url = $key->url;
    }

    if ($key->name == "About Us") {
        $about_us = str_replace('-', ' ', ucwords(strtolower($key->url)));
        $about_us_url = $key->url;
    }

    if ($key->name == "Contact") {
        $contact = str_replace('-', ' ', ucwords(strtolower($key->url)));
        $contact_url = $key->url;
    }

}

?>
<div id="head_modal_controller">
    <div id="menu" class="menu">
        <nav>
            <ul>
                <li><a href="/<?php echo SYSTEM_LANG ?>">Home</a></li>
                <li><a href="/<?php echo SYSTEM_LANG ?>/<?php echo $projects_url ?>"><?php echo $projects ?></a></li>
                <li><a href="/<?php echo SYSTEM_LANG ?>/<?php echo $about_us_url ?>"><?php echo $about_us ?></a></li>
                <li><a href="/<?php echo SYSTEM_LANG ?>/<?php echo $contact_url ?>"><?php echo $contact ?></a></li>
            </ul>
        </nav>
    </div>
</div>