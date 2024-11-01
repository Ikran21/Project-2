<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Confirmation</title>
    <link rel="stylesheet" href="styleform.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<div class='error-container'>
                <img src='gamelogo.png' alt='Game Logo' class='error-logo'>
                <div class='error-message'>
                    Passwords don't match. Please try again. <br>
                    <a href='signup.php' class='link'>Go back to Signup</a>
                </div>
              </div>";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the username and hashed password to a text file
    $userData = "$username,$hashedPassword\n";

    // Attempt to save user data to file
    if (file_put_contents("users.txt", $userData, FILE_APPEND) !== false) {
        echo "<div class='success-container'>
                <img src='gamelogo.png' alt='Game Logo' class='success-logo'>
                <div class='success-message'>
                    Signup successful! Welcome, $username! You can now <a href='login.php' class='link'>login</a> to start the game.
                </div>
              </div>";
    } else {
        echo "<div class='error-container'>
                <img src='gamelogo.png' alt='Game Logo' class='error-logo'>
                <div class='error-message'>
                    Error: Could not save user data. <a href='signup.php' class='link'>Try Again</a>
                </div>
              </div>";
    }
} else {
    echo "<div class='error-container'>Invalid request.
    <a href='signup.php' class='link'>Try Again</a></div>";
}
?>
</body>
</html>
