<h1>LOGIN</h1>
<div class="login">
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="Send" value="Login" class="btn">
    </form>
</div>

<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission and call the Core::checkLogin() method
    $loginResult = Core::checkLogin();
    
    // Additional code for handling the form submission
    if ($loginResult > 0) {
        // Login successful
        echo "Login successful";
        echo "<br>";
    } else {
        // Login failed
        echo "Login failed";
        echo "<br>";

    }
}
?>