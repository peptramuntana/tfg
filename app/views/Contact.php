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
        <form action="/app/lib/PHPMailer/config.php" method="post">
            <div class="contact__form">
            <div class="contact__item">
                    <input required type="text" name="name" placeholder="<?php echo $textsData['contact-form-name']; ?>">
                </div>
                <div class="contact__item">
                    <input required type="text" name="email" placeholder="<?php echo $textsData['contact-form-email']; ?>">
                </div>
                <div class="contact__item is-100">
                    <input required type="text" name="subject" placeholder="<?php echo $textsData['contact-form-subject']; ?>">
                </div>
                <div class="contact__item is-100">
                    <textarea required type="text" name="message" placeholder="<?php echo $textsData['contact-form-message']; ?>"></textarea>
                </div>
                <div class="contact__item is-100">
                    <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
                    <button type="submit" name="send" class="btn"><?php echo $textsData['contact-form-btn']; ?></button>
                </div>
            </div>
        </form>
    </div>
</section>
