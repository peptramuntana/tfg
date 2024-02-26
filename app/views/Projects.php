<?php
$projects = Database::getProjects(1);
$textsData = Database::getTexts();
?>
<section class="bg-header-projects header bg-text shadow pad">
    <div class="container">
        <div class="text__title"><?php echo $textsData['projects-header-h1']; ?></div>
    </div>
</section>
<section class="projects pad">
    <div class="container">
        <?php foreach ($projects as $project) : ?>
            <?php
            $projectTexts = Database::getProjectTexts($project->id, 1);
            $projectTitle = $projectTexts[0]->project_title;
            $projectDecription = $projectTexts[0]->project_description;
            $projectSlider = Database::getProjectSlider($project->id, 1);
            ?>

            <div class="project" id="project-<?php echo $project->id ?>">
                <div id="projects-slider" class="swiper projects-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($projectSlider as $img) : ?>
                            <picture class="swiper-slide">
                                <source srcset="/public/images/projects/<?php echo isset($img->img_url) ? $img->img_url : '' ?>.webp"  type="image/webp">
                                <source srcset="/public/images/projects/<?php echo isset($img->img_url) ? $img->img_url : '' ?>.jpg" type="image/jpeg">
                            <img loading="lazy"  src="/public/images/projects/<?php echo isset($img->img_url) ? $img->img_url : '' ?>.jpg" alt="<?php echo isset($img->img_alt) ? $img->img_alt : '' ?>" title="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                            </picture>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="project__info">
                    <div class="project__title">
                        <h2><?php echo isset($projectTitle) ? $projectTitle : '' ?></h2>
                    </div>
                    <div class="project__description">
                        <p><?php echo isset($projectDecription) ? $projectDecription : '' ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>