<?php
    $textsData = Database::getTetxs();
    $links = Database::getLinks();
?>
<section class="resize">
    <div id="home-slider" class="swiper home-swiper">
        <div class="swiper-wrapper">
            <img class="swiper-slide" src="../../public/images/home/bg-header-home-1.jpg" alt="Intro 1" title="Home Slider 1">
            <img class="swiper-slide" src="../../public/images/home/bg-header-home-2.jpg" alt="Intro 2" title="Home Slider 2">
            <img class="swiper-slide" src="../../public/images/home/bg-header-home-3.jpg" alt="Intro 3" title="Home Slider 3">
            <img class="swiper-slide" src="../../public/images/home/bg-header-home-4.jpg" alt="Intro 4" title="Home Slider 4">
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="pad">
    <div class="container">
        <div class="img-text">
            <div class="img-text__img">
                <img src="../../public/images/home/montport-intro.jpg" alt="Montport Intro" title="Montport Intro">
            </div>
            <div class="img-text__text">
                <div class="img-text__title"><?php echo $textsData['home-intro-h1']; ?></div>
                <div class="img-text__description"><?php echo $textsData['home-intro-p1']; ?></div>
                <div class="img-btn">
                    <a class="btn" href="/<?php echo SYSTEM_LANG ?>/<?php echo $links['About Us']; ?> "><?php echo str_replace('-', ' ', ucwords(strtolower($links['About Us']))) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg_home-services pad no_bot">
    <div class="container">
        <div class="bg-text right">
            <div class="text__title"><?php echo $textsData['home-services-h2']; ?></div>
            </div>
        </div>
    </div>
</section>

    

