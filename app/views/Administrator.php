<?php 
    Core::checkSession();
?>

<div class="log-out">
    <form action="http://localhost/app/controllers/formsController.php" method="POST">
        <input type="submit" name="logout" value="Cerrar sesión" class="btn">
    </form>
</div>

<?php
$projects = Database::getProjects(0);

?>

    <?php foreach ($projects as $project) : ?>
        <?php
            $projectID = $project->id;
            $projectTexts = Database::getProjectTexts($project->id);
            $projectTitle = $projectTexts[0]->project_title;
            $projectSlider = Database::getProjectSlider($project->id);
            $counter = 0;
        ?>
        <section class="admin-project">
            <form action="http://localhost/app/controllers/formsController.php" class="elements" method="POST">
            <label for="title">Título del proyecto:</label>
            <input type="text" id="title" name="title" value="<?php echo isset($projectTitle) ? $projectTitle : '' ?>" class="editable">
            <?php foreach ($projectTexts as $text) : ?>
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="editable"><?php echo isset($text->project_description) ? $text->project_description : ''?></textarea>
            <?php endforeach; ?>
            <div class="images-box">
            <?php foreach ($projectSlider as $img) : ?>
                <?php $counter++;?>
                <div class="images">
                    <p>IMÁGEN <?php echo $counter; ?></p>

                    <input type="hidden" name="image-id-<?php echo $counter ?>" value="<?php echo isset($img->img_id) ? $img->img_id : '' ?>">

                    <label for="image-url-<?php echo $counter ?>">URL:</label>
                    <input type="text" id="image-url-<?php echo $counter ?>" name="image-url-<?php echo $counter ?>" class="image" value="/public/images/projects/<?php echo isset($img->img_url) ? $img->img_url : '' ?>.jpg">

                    <label for="image-alt-<?php echo $counter ?>">Alt:</label>
                    <input type="text" id="image-alt-<?php echo $counter ?>" name="image-alt-<?php echo $counter ?>" class="image" value="<?php echo isset($img->img_alt) ? $img->img_alt : '' ?>">

                    <label for="image-title-<?php echo $counter ?>">Title:</label>
                    <input type="text" id="image-title-<?php echo $counter ?>" name="image-title-<?php echo $counter ?>" class="image" value="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">                </div>
                <?php endforeach; ?>
            </div>
            <input type="hidden" name="projectID" value="<?php echo $projectID?>">
            <input type="hidden" name="lang" value="<?php echo SYSTEM_LANG ?>">
            <input type="submit" name="update" value="Editar" class="btn">
            </form>
        </section>
    <?php endforeach; ?>