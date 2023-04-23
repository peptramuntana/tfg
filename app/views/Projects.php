<?php
    echo "Hello world from ProjectsView.php";
    echo "<br>";
    $projects = Database::getProjects();
?>
    <section class="projects">
    <?php foreach ($projects as $project) : ?>
        <?php

        // $project_id = $project->id;
        // var_dump("project_id as--> ".$project_id);
        // echo "<br>";
        // var_dump("project[0]->id --> ".$project[0]->id);  
        // echo "<br>";

        $projectTexts = Database::getProjectTexts($project->id);
        $projectTitle = $projectTexts[0]->project_title;
        $projectSlider = Database::getProjectSlider($project->id);
        ?>
        <div class="project">
            <div class="slider">
                <?php foreach($projectSlider as $img) : ?>
                    <img src="public/images/projects/<?php echo $img->img_url ?>.jpg" alt="<?php echo $img->img_alt ?>" title="<?php echo $img->img_title ?>">
                <?php endforeach; ?>
            </div>
            <div class="project__info">
                <h2 class="project__title"><?php echo $projectTitle ?></h2>
                <?php foreach($projectTexts as $text) : ?>
                    <p class="project__description"><?php echo $text->project_description ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    </section>
<?php    
    print_r("projectsData --> ");
    var_dump($projectsData);
    echo "<br>";
    echo "<br>";
?>