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
        <h2>Signup</h2>
        <a href="Homepage.html" class="home-button">Back to Homepage</a>
        <form action="signup-submit.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Re-enter password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
