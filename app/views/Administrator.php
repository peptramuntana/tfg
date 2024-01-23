<?php
Core::checkSession();
?>

<div class="log-out">
    <form action="/app/controllers/formsController.php" method="POST">
        <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
        <input type="submit" name="logout" value="Cerrar sesión" class="btn btn-blue">
    </form>
</div>

<?php $projects = Database::getProjects(0); ?>

<section class="admin-project">
    <div class="heading create-heading">
        <h2>NUEVO PROYECTO</h2>
    </div>
    <form method="POST" action="/app/controllers/formsController.php" onsubmit="createForm(event, this)" class="create">
        <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
        <input type="hidden" name="system_lang_id" value="<?php echo SYSTEM_LANG_ID ?>">
        <input type="submit" name="create-project" value="Crear Proyecto" class="btn btn-green">

        <label for="project_title" class="project_title">Título del proyecto:</label>
        <input type="text" id="project_title" name="project_title">
        <label for="project_content" class="project_content">Descripción:</label>
        <textarea id="project_content" name="project_content"></textarea>
        <div class="images-container">
            <div class="images">
                <img src="/public/images/placeholder.jpg">
                <label for="image-url-1">URL:</label>
                <input type="text" id="image-url-1" name="image-url-1">
                <label for="image-alt-1">Alt:</label>
                <input type="text" id="image-alt-1" name="image-alt-1">
                <label for="image-title-1">Title:</label>
                <input type="text" id="image-title-1" name="image-title-1">
            </div>
            <div class="images">
                <img src="/public/images/placeholder.jpg">
                <label for="image-url-2">URL:</label>
                <input type="text" id="image-url-2" name="image-url-2">
                <label for="image-alt-2">Alt:</label>
                <input type="text" id="image-alt-2" name="image-alt-2">
                <label for="image-title-2">Title:</label>
                <input type="text" id="image-title-2" name="image-title-2">
            </div>
        </div>
    </form>
</section>

<?php foreach ($projects as $project) : ?>
    <?php
    $project_id = $project->id;
    $projectTexts = Database::getProjectTexts($project->id, 0);
    $projectState = $projectTexts[0]->active;
    $projectTitle = $projectTexts[0]->project_title;
    $projectSlider = Database::getProjectSlider($project->id, 0);
    $counter = 0;
    ?>
    <section class="admin-project" id="<?php echo $project_id ?>">
        <div class="heading <?php echo $projectState == 1 ? '' : 'hided' ?>">
            <h2><?php echo $projectTitle ?></h2>
        </div>
        <div class="delete-hide-container">
            <form class="hide-project" action="/app/controllers/formsController.php" onsubmit="<?php echo $projectState == 1 ? 'hideForm(event)' : 'showForm(event)' ?>" method="POST">
                <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                <input type="hidden" name="project_state" value="<?php echo $projectState ?>">
                <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
                <input type="hidden" name="system_lang_id" value="<?php echo SYSTEM_LANG_ID ?>">
                <input type="submit" name="hide-project" value="<?php echo $projectState == 1 ? 'Ocultar Proyecto' : 'Mostrar proyecto' ?>" class="btn">
            </form>
            <form class="delete-project" action="app/controllers/formsController.php" onsubmit="deleteForm(event);" method="POST">
                <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
                <input type="hidden" name="system_lang_id" value="<?php echo SYSTEM_LANG_ID ?>">
                <input type="submit" name="delete" value="Eliminar Proyecto" class="btn btn-red">
            </form>
        </div>
        <form class="update <?php echo $projectState == 1 ? '' : 'hided' ?>" action="/app/controllers/formsController.php" onsubmit="updateForm(event, this);" method="POST">
            <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
            <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
            <input type="hidden" name="system_lang_id" value="<?php echo SYSTEM_LANG_ID ?>">
            <input type="submit" name="update" value="Editar Proyecto" class="btn">
            <label for="project_title">Título del proyecto:</label>
            <input type="text" id="project_title" name="project_title" value="<?php echo isset($projectTitle) ? $projectTitle : '' ?>">
            <?php foreach ($projectTexts as $text) : ?>
                <label for="project_content">Descripción:</label>
                <textarea id="project_content" name="project_content"><?php echo isset($text->project_description) ? $text->project_description : '' ?></textarea>
            <?php endforeach; ?>
            <div class="images-container">
                <?php foreach ($projectSlider as $img) : ?>
                    <?php $counter++; ?>
                    <div class="images">
                        <img src="/public/images/projects/<?php echo isset($img->img_url) ? $img->img_url : '' ?>.jpg" alt="<?php echo isset($img->img_alt) ? $img->img_alt : '' ?>" title="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                        <input type="hidden" name="image-id-<?php echo $counter ?>" value="<?php echo isset($img->img_id) ? $img->img_id : '' ?>">

                        <label for="image-url-<?php echo $counter ?>">URL:</label>
                        <input type="text" id="image-url-<?php echo $counter ?>" name="image-url-<?php echo $counter ?>" class="image" value="<?php echo isset($img->img_url) ? $img->img_url : '' ?>">

                        <label for="image-alt-<?php echo $counter ?>">Alt:</label>
                        <input type="text" id="image-alt-<?php echo $counter ?>" name="image-alt-<?php echo $counter ?>" class="image" value="<?php echo isset($img->img_alt) ? $img->img_alt : '' ?>">

                        <label for="image-title-<?php echo $counter ?>">Title:</label>
                        <input type="text" id="image-title-<?php echo $counter ?>" name="image-title-<?php echo $counter ?>" class="image" value="<?php echo isset($img->img_title) ? $img->img_title : '' ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </section>
<?php endforeach; ?>