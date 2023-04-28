<h1>Login</h1>
<div class="login">
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="Send" value="Login" class="btn">
    </form>
</div>

<?php

if(isset($_SESSION["login"])){
    echo "Session login is set";
    echo "<br>";
} else {
    echo "Session login is not set";
    echo "<br>";
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission and call the Core::checkLogin() method
    Core::checkLogin();
}
?>