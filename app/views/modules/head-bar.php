<?php
require_once('app/models/db.php');
$langs = Database::getLangs();
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
                        echo '<a href="/' . $key->tag . '">' . strtoupper($key->tag) . '</a>';
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

<?php
