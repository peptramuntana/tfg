<!DOCTYPE html>
<html lang="<?php echo SYSTEM_LANG; ?>">

<head>
    <?php include __DIR__ . '/modules/head.php'; ?>
</head> 

<body>
    <?php echo "Hello world from indexViews.php"; ?>
    <?php echo "<br>"; ?>
    <?php echo "<br>"; ?>
    <?php Core::loadView(); ?>
    <?php include __DIR__ . '/modules/footer.php'; ?>
</body>

</html>
