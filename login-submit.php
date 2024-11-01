<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleform.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Read and check credentials from the file
    $userFile = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($userFile as $userData) {
        list($storedUsername, $storedPassword) = explode(",", $userData);

        if ($username === $storedUsername && password_verify($password, $storedPassword)) {
            $_SESSION['username'] = $username;
            // Redirect to the game page
            header("Location: game.php");
            exit;
        }
    }
    // If credentials don't match
    echo "<div class='error-container'>
    <img src='gamelogo.png' alt='Game Logo' class='error-logo'>
    <div class='error-message'>
        Incorrect Passwoord or Username<a href='loginn.php' class='link'>Try Again</a>
    </div>
  </div>";
} else {
    echo "<div class='error-message'> Invalid request.<a href='login.php'>Try again</a>.</div>";
}
?>
</body>
</html>
