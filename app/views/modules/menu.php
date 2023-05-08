<?php
$menusData = Database::getMenus();
foreach ($menusData as $key) {

    if ($key->name == "Home") {
        $home = $key->name;
        $home_url = $key->url;
    }

    if ($key->name == "Proyectos" || $key->name == "Projects") {
        $projects = $key->name;
        $projects_url = $key->url;
    }

    if ($key->name == "Sobre Nosotros" || $key->name == "About Us") {
        $about_us = $key->name;
        $about_us_url = $key->url;
    }

    if ($key->name == "Contacto" || $key->name == "Contact") {
        $contact = $key->name;
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