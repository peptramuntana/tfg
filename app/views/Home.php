<?php
$textsData = Database::getTexts();
$links = Database::getLinks();
?>
<section class="resize top_menu">
    <div id="home-slider" class="swiper home-swiper">
        <div class="swiper-wrapper">
            <picture class="swiper-slide">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-1_mob.webp" type="image/webp">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-1_mob.jpg" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-1.webp" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-1.jpg" type="image/jpeg">
                <img loading="lazy" src="../../public/images/home/bg-header-home-1.jpg" alt="Intro 1" title="Home Slider 1">
            </picture>
            <picture class="swiper-slide">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-2_mob.webp" type="image/webp">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-2_mob.jpg" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-2.webp" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-2.jpg" type="image/jpeg">
                <img loading="lazy" src="../../public/images/home/bg-header-home-2.jpg" alt="Intro 2" title="Home Slider 2">
            </picture>
            <picture class="swiper-slide">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-3_mob.webp" type="image/webp">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-3_mob.jpg" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-3.webp" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-3.jpg" type="image/jpeg">
                <img loading="lazy" src="../../public/images/home/bg-header-home-3.jpg" alt="Intro 3" title="Home Slider 3">
            </picture>
            <picture class="swiper-slide">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-4_mob.webp" type="image/webp">
                <source media="(max-width: 768px)" srcset="../../public/images/home/bg-header-home-4_mob.jpg" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-4.webp" type="image/webp">
                <source srcset="../../public/images/home/bg-header-home-4.jpg" type="image/jpeg">
                <img loading="lazy" src="../../public/images/home/bg-header-home-4.jpg" alt="Intro 4" title="Home Slider 4">
            </picture>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="pad">
    <div class="container">
        <div class="img-text img-transition">
            <div class="img-text__img">
                <picture>
                    <source srcset="../../public/images/home/montport-intro.webp" type="image/webp">
                    <source srcset="../../public/images/home/montport-intro.jpg" type="image/jpeg">
                    <img loading="lazy" src="../../public/images/home/montport-intro.jpg" alt="Montport Intro" title="Montport Intro">
                </picture>
            </div>
            <div class="img-text__text">
                <div class="img-text__title"><?php echo $textsData['home-intro-h1']; ?></div>
                <div class="img-text__description"><?php echo $textsData['home-intro-p1']; ?></div>
            </div>
        </div>
    </div>
</section>

<section class="bg_home-services bg-text right shadow pad no_bot">
    <div class="container">
        <div class="">
            <div class="bg-text__title"><?php echo $textsData['home-services-h2']; ?></div>
        </div>
    </div>
    </div>
</section>

<section class="pad">
    <div class="grid-services-block container alt_background">
        <div class="grid-services img-transition">
            <div>
                <div class="grid_img">
                    <picture>
                        <source srcset="../../public/images/home/grid-services-1.webp" type="image/webp">
                        <source srcset="../../public/images/home/grid-services-1.jpg" type="image/jpeg">
                        <img alt="Vilkeer Projects Services 1" title="Vilkeer Projects Services 1" src="../../public/images/home/grid-services-1.jpg">
                    </picture>
                </div>
                <div class="grid_text">
                    <div class="grid_text__title"><?php echo $textsData['home-services-h3-1']; ?></div>
                    <div class="grid_text__description"><?php echo $textsData['home-services-p1']; ?></div>
                </div>
            </div>
            <div>
                <div class="grid_img">
                    <picture>
                        <source srcset="../../public/images/home/grid-services-2.webp" type="image/webp">
                        <source srcset="../../public/images/home/grid-services-2.jpg" type="image/jpeg">
                        <img loading="lazy" alt="Vilkeer Projects Services 2" title="Vilkeer Projects Services 2" src="../../public/images/home/grid-services-2.jpg">
                    </picture>
                </div>
                <div class="grid_text">
                    <div class="grid_text__title"><?php echo $textsData['home-services-h3-2']; ?></div>
                    <div class="grid_text__description"><?php echo $textsData['home-services-p2']; ?></div>
                </div>
            </div>
            <div>
                <div class="grid_img">
                    <picture>
                        <source srcset="../../public/images/home/grid-services-3.webp" type="image/webp">
                        <source srcset="../../public/images/home/grid-services-3.jpg" type="image/jpeg">
                        <img loading="lazy" alt="Vilkeer Projects Services 3" title="Vilkeer Projects Services 3" src="../../public/images/home/grid-services-3.jpg">
                    </picture>
                </div>
                <div class="grid_text">
                    <div class="grid_text__title"><?php echo $textsData['home-services-h3-3']; ?></div>
                    <div class="grid_text__description"><?php echo $textsData['home-services-p3']; ?></div>
                </div>
            </div>
        </div>
    </div>
</section>