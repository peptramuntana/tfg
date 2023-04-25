<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
    if(SYSTEM_VIEW ==  "projects") {
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/keen-slider@latest/keen-slider.min.css">';
    }
?>
<link rel="stylesheet" href="../../../public/templates/css/styles.css">
<script src="https://cdn.jsdelivr.net/npm/keen-slider@latest/keen-slider.js"></script>
<script src="../../../public/templates/js/scripts.js"></script>
<title><?php echo str_replace("-", " ", ucwords(SYSTEM_URL)) ?></title>
