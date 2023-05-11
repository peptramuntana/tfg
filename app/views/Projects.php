<?php
$projects = Database::getProjects(1);
?>
<section class="projects">
    <?php foreach ($projects as $project) : ?>
        <?php
            $projectTexts = Database::getProjectTexts($project->id, 1);
            $projectTitle = $projectTexts[0]->project_title;
            $projectDecription = $projectTexts[0]->project_description;
            $projectSlider = Database::getProjectSlider($project->id, 1);
        ?>
        <div class="project" id="project-<?php echo $project -> id?>">
            <div id="projects-slider" class="swiper projects-swiper">
                <div class="swiper-wrapper">
                <?php foreach ($projectSlider as $img) : ?>
                    <img class="swiper-slide" src="/public/images/projects/<?php echo isset($img->img_url) ? $img -> img_url : '' ?>.jpg" alt="<?php echo isset($img->img_alt) ? $img->img_alt : ''?>" title="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="project__info">
                <div class="project__title"><?php echo isset($projectTitle) ? $projectTitle : '' ?></div>
                <div class="project__description">
                    <?php echo isset($projectDecription) ? $projectDecription : ''?></div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</section>

