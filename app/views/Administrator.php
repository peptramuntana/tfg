<?php 
    Core::checkSession();
?>

<div class="log-out">
    <form action="app/controllers/formsController.php" method="POST">
        <input type="submit" name="logout" value="Cerrar sesión" class="btn">
    </form>
</div>