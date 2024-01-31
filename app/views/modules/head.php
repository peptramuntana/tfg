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
<meta property="article:author" content="Vilkeer Projects">
<meta property="article:published_time" content="2024-01-31 11:04:50">
<meta property="article:modified_time" content="2024-01-31 14:15:50">
<meta property="og:locale" content="es-ES">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.vilkeerprojects.com/es/">
<meta property="og:site_name" content="Vilkeer Projects">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image" content="https://www.vilkeerprojects.com/es/public/images/og/opengraph.jpg">
<meta name="twitter:image:src" content="https://www.vilkeerprojects.com/es/public/images/og/opengraph.jpg">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="Vilkeer Projects">
<?php
$textsData = Database::getTexts();

if (SYSTEM_VIEW == "home") {
    echo '<meta property="og:title" content="' . $textsData['head-title-home'] . '">';
    echo '<meta property="og:description" content="' . $textsData['head-description-home'] . '">';
    echo '<meta name="twitter:description" content="' . $textsData['head-description-home'] . '">';
    echo '<meta name="twitter:title" content="' . $textsData['head-title-home'] . '">';
    echo '<title>' . $textsData['head-title-home'] . '</title>';
    echo '<meta name="description" content="' . $textsData['head-description-home'] . '">';
}

if (SYSTEM_VIEW == "projects") {
    echo '<meta property="og:title" content="' . $textsData['head-title-projects'] . '">';
    echo '<meta property="og:description" content="' . $textsData['head-description-projects'] . '">';
    echo '<meta name="twitter:description" content="' . $textsData['head-description-projects'] . '">';
    echo '<meta name="twitter:title" content="' . $textsData['head-title-projects'] . '">';
    echo '<title>' . $textsData['head-title-projects'] . '</title>';
    echo '<meta name="description" content="' . $textsData['head-description-projects'] . '">';
}

if (SYSTEM_VIEW == "contact") {
    echo '<meta property="og:title" content="' . $textsData['head-title-contact'] . '">';
    echo '<meta property="og:description" content="' . $textsData['head-description-contact'] . '">';
    echo '<meta name="twitter:description" content="' . $textsData['head-description-contact'] . '">';
    echo '<meta name="twitter:title" content="' . $textsData['head-title-contact'] . '">';
    echo '<title>' . $textsData['head-title-contact'] . '</title>';
    echo '<meta name="description" content="' . $textsData['head-description-contact'] . '">';
    echo '<script src="https://www.google.com/recaptcha/api.js?render=6Le-V2ApAAAAAEsVtCSTQUPf6DzT6AfaBe2fRpZc"></script>';
}

if (SYSTEM_VIEW ==  "projects" || SYSTEM_VIEW == "home") {
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>';
}

if (SYSTEM_VIEW == "administrator") {
    echo '<script src="https://cdn.tiny.cloud/1/7f0itvzdvwj3038qoaktkp5rh9kxycahhcgmgl17vcn9blyr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>';
}
?>



<link rel="stylesheet" href="../../../public/templates/css/styles.css">
<script src="../../../public/templates/js/scripts.js"></script>
