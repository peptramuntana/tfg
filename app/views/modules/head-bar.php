<?php
require_once('app/models/db.php');
$langs = Database::getLangs();
$current_menu = Database::getCurrentMenu(); // Get the current menu from the database
?>

<div class="head-bar">
    <div class="logo">
        <a href="/<?php echo SYSTEM_LANG ?>"><img src="../../../public/images/icons/icon-corp-white-lettered-rectangular.svg" alt="Logo" /></a>
    </div>
    <div class="lang-burger">
        <div class="lang">
            <a class="active"><?php echo strtoupper(SYSTEM_LANG) ?></a>
            <ul>
                <?php
                foreach ($langs as $key) {
                    if ($key->tag != SYSTEM_LANG) {
                        // Fetch the URL for the current menu in the selected language from the database
                        $url = Database::getMenuUrl($key->tag, $current_menu);
                        echo '<a href="/' . $key->tag . '/' . $url . '">' . strtoupper($key->tag) . '</a>';
                    }
                }
                ?>
            </ul>
        </div>
        <button class="burger">
            <div></div>
            <div></div>
            <div></div>
        </button>
    </div>
</div>