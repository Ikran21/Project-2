<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div class="form-wrapper">
        <img src="gamelogo.png" alt="Who Wants to Be a Millionaire Logo" class="logo">
        <h2>Login</h2>
        <form action="login-submit.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
