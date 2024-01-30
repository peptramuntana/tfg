<?php
$textsData = Database::getTexts();
$links = Database::getLinks();
?>

<section class="bg-header-contact header bg-text shadow pad">
    <div class="container">
        <div class="text__title"><?php echo $textsData['contact-header-h1']; ?></div>
    </div>
</section>

<section class="contact pad">
    <div class="container">
        <div class="contact__intro t-altem">
            <?php echo $textsData['contact-intro-h2']; ?>
        </div>
        <div id="formMessage" class="contact__message"></div>
        <form class="js-contactform" action="/app/lib/PHPMailer/config.php" method="post">
            <div class="contact__form">
                <div class="contact__item">
                    <input type="text" name="name" title="<?php echo $textsData['contact-form-name-title'] ?>" placeholder="<?php echo $textsData['contact-form-name']; ?>">
                </div>
                <div class="contact__item">
                    <input type="email" name="email" placeholder="<?php echo $textsData['contact-form-email']; ?>">
                </div>
                <div class="contact__item is-100">
                    <input type="text" name="subject" placeholder="<?php echo $textsData['contact-form-subject']; ?>">
                </div>
                <div class="contact__item is-100">
                    <textarea type="text" name="message" placeholder="<?php echo $textsData['contact-form-message']; ?>"></textarea>
                </div>
                <div class="contact__item is-100">
                    <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
                    <button type="submit" name="send" class="g-recaptcha btn" data-sitekey="6Le-V2ApAAAAAEsVtCSTQUPf6DzT6AfaBe2fRpZc" data-callback='onSubmit' data-action='submit'>
                        <?php echo $textsData['contact-form-btn']; ?>
                </button>
                </div>
            </div>
        </form>
        
    </div>
</section>