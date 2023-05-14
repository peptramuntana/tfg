<!DOCTYPE html>
<html lang="<?php echo SYSTEM_LANG; ?>">

<head>
    <?php include __DIR__ . '/modules/head.php'; ?>
</head> 

<body>
    <?php
        if(SYSTEM_VIEW !== "administrator") {
            include __DIR__ . '/modules/menu.php';
            include __DIR__ . '/modules/head-bar.php';
        }
    ?>
    <?php Core::loadView(); ?>
    <?php
        if(SYSTEM_VIEW !== "administrator") {
            include __DIR__ . '/modules/footer.php';  
        }
    ?>
</body>

</html>
