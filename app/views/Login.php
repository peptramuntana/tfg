<h1>Login</h1>
<div class="login pad">
    <form action="/app/controllers/formsController.php" method="POST">
        <input type="text" name="name" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="hidden" name="system_lang" value="<?php echo SYSTEM_LANG ?>">
        <input type="submit" name="login" value="Login" class="btn">
    </form>
</div>