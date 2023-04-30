<?php
$projects = Database::getProjects(1);
?>
<section class="projects">
    <?php foreach ($projects as $project) : ?>
        <?php
            $projectTexts = Database::getProjectTexts($project->id);
            $projectTitle = $projectTexts[0]->project_title;
            $projectSlider = Database::getProjectSlider($project->id);
        ?>
        <div class="project">
            <div id="slider" class="swiper">
                <div class="swiper-wrapper">
                <?php foreach ($projectSlider as $img) : ?>
                    <img class="swiper-slide" src="/public/images/projects/<?php echo isset($img->img_url) ? $img -> img_url : '' ?>.jpg" alt="<?php echo isset($img->img_alt) ? $img->img_alt : ''?>" title="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="project__info">
                <h2 class="project__title"><?php echo isset($projectTitle) ? $projectTitle : '' ?></h2>
                <?php foreach ($projectTexts as $text) : ?>
                    <p class="project__description"><?php echo isset($text->project_description) ? $text->project_description : ''?></p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>

