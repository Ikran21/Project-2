<?php
session_start();
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
session_destroy(); // End the session after game over
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
        <h1>You have won: <?php echo $score; ?></h1>
        <div class="button">
            <a href="homepage.html">Play Again</a>
        </div>
    </div>
</body>
</html>
