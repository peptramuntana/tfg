<?php 
    Core::checkSession();
?>

<div class="log-out">
    <form action="app/controllers/formsController.php" method="POST">
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
            /*app/controllers/formsController.php*/
            print_r($_POST)
        ?>
        <section class="admin-project">
            <form class="elements" method="post" action="app/controllers/formsController.php">
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
                    <label for="image-url-<? echo $counter ?>">URL --></label>
                    <input type="text" id="image-url-<? echo $counter ?>" name="image-url-<? echo $counter ?>" class="image editable-small" value="/public/images/projects/<?php echo isset($img->img_url) ? $img -> img_url : '' ?>.jpg">
 
                    <label for="image-alt-<? echo $counter ?>">Alt --></label>
                    <input type="text" id="image-alt-<? echo $counter ?>" name="image-alt-<?php echo $counter ?>" class="image editable-small" value="<?php echo isset($img->img_alt) ? $img->img_alt : '' ?>">

                    <label for="image-title-<? echo $counter ?>">Title --></label>
                    <input type="text" id="image-title-<? echo $counter ?>" name="image-title-<? echo $counter ?>" class="image editable-small" value="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                </div>
                <?php endforeach; ?>
            </div>
            <input type="hidden" name="projectID" value="<?php echo $projectID?>">
            <input type="submit" name="update" value="Editar" class="btn">
            </form>
        </section>
    <?php endforeach; ?>