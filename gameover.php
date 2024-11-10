<?php
session_start();
$points = isset($_SESSION['points']) ? $_SESSION['points'] : 0;
session_destroy(); // End the session after game over
// Check if there's a high score cookie
$highScore = isset($_COOKIE['high_score']) ? (int)$_COOKIE['high_score'] : 0;

// Update the high score if the current score is higher
if ($points > $highScore) {
    setcookie('high_score', $points, time() + (86400 * 30), "/"); // Set cookie for 30 days
    $highScore = $points; // Update high score variable for display
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css ">
    <title>Game Over</title>
</head>
<body>
    <div class="game-over-container">
        <img src="gamelogo.png">
        <h1>Congrats!</h1>
        <h1>You have won: <?php echo $points; ?></h1>
        <h2>Your Highest Score: <?php echo $highScore; ?> $</h2>
        <div class="button">
            <a href="game.php" class="link">Play Again</a>
            <br>
            <a href="homepage.html" class= "link">Return Homepage</a>
        </div>
    </div>
</body>
</html>
