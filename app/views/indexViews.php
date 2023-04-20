<!DOCTYPE html>
<html lang="<?php echo SYSTEM_LANG; ?>">

<head>
    <?php include __DIR__ . '/modules/header.php'; ?>
    <link rel="stylesheet" href="/public/templates/css/styles.css">
    <script src="/public/templates/js/scripts.js"></script>
</head>

<body>
    <?php Core::loadView(); ?>
    <?php include __DIR__ . '/modules/footer.php'; ?>
</body>

</html>