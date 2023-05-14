<?php $textsData = Database::getTexts(); ?>
<section class="pad">
    <div class="container">
        <div class="error">
            <?php echo $textsData['error']; ?>
            <a class="btn" href="/<?php echo SYSTEM_LANG?>">Home</a>
        </div>
    </div>
</section>