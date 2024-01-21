<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#8ABE3B">
<?php
if (SYSTEM_VIEW ==  "projects" || SYSTEM_VIEW == "home") {
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>';
}
?>

<?php
if (SYSTEM_VIEW == "administrator") {
    echo '<script src="https://cdn.tiny.cloud/1/7f0itvzdvwj3038qoaktkp5rh9kxycahhcgmgl17vcn9blyr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>';
}
?>
<link rel="stylesheet" href="../../../public/templates/css/styles.css">
<script src="../../../public/templates/js/scripts.js"></script>
<title><?php echo str_replace("-", " ", ucwords(SYSTEM_URL)) ?></title>