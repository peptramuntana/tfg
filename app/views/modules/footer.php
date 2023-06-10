<?php $textsData = Database::getTexts();
$links = Database::getLinks() ?>
<section class="bg_contact bg-text center shadow pad">
    <div class="container">
        <div class="">
            <div class="text__title"><?php echo $textsData['contact-banner-h2']; ?></div>
            <a class="btn" href="/<?php echo SYSTEM_LANG ?>/<?php echo $links['Contact']; ?> "><?php echo str_replace('-', ' ', ucwords(strtolower($links['Contact']))) ?></a>
        </div>
    </div>
</section>
<footer class="alt_background">
    <div class="container">
        <div class="footer-block">
            <div class="logo">
                <img src="../../../public/images/icons/icon-corp-green-lettered-rounded.svg" alt="Vilkeer Projects Logo" title="Vilkeer Projects Logo">
            </div>
            <div class="contact">
                <div>
                    <?php echo $textsData['footer-contact-p1']; ?>
                </div>
                <div>
                    <?php echo $textsData['footer-contact-p2']; ?>
                </div>
            </div>
            <div class="links">
                <?php echo $textsData['footer-legal-notice']; ?>
                <?php echo $textsData['footer-privacy-policy']; ?>
            </div>
        </div>
    </div>
</footer>