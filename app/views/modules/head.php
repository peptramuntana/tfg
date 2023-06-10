<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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