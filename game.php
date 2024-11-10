<?php
 session_start();
 if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who Wants to Be a Millionaire?</title>
    <link rel="stylesheet" href="game_style.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <?php
    
    // Questions array
    $questions = [
        [
            "question" => "What color is the sky on a clear day?",
            "options" => ["Green", "Blue", "Red", "Yellow"],
            "correct" => 1,
            "points" => 1000
        ],
        [
            "question" => "What is the capital of France?",
            "options" => ["Berlin", "Madrid", "Paris", "Lisbon"],
            "correct" => 2,
            "points" => 3000
        ],
        [
            "question" => "Which fruit is known for its high potassium content?",
            "options" => ["Apple", "Banana", "Cherry", "Grape"],
            "correct" => 1,
            "points" =>5000
        ],
        [
            "question" => "Which gas do plants absorb from the atmosphere?",
            "options" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Helium"],
            "correct" => 2,
            "points" => 10000
        ],
        [
            "question" => "What is the smallest prime number?",
            "options" => ["0", "1", "2", "3"],
            "correct" => 2,
            "points" => 20000
        ],
        [
            "question" => "Which animal is known as the King of the Jungle?",
            "options" => ["Tiger", "Elephant", "Lion", "Cheetah"],
            "correct" => 2,
            "points" => 35000
        ],
        [
            "question" => "What is the main ingredient in guacamole?",
            "options" => ["Tomato", "Onion", "Avocado", "Pepper"],
            "correct" => 2,
            "points" => 50000
        ],
        [
            "question" => "In which continent is Egypt located?",
            "options" => ["Asia", "Europe", "Africa", "Australia"],
            "correct" => 2,
            "points" => 70000
        ],
        [
            "question" => "What is the chemical symbol for gold?",
            "options" => ["Au", "Ag", "Pb", "Fe"],
            "correct" => 100000
        ],
        [
            "question" => "Which planet is known as the 'Red Planet'?",
            "options" => ["Earth", "Venus", "Mars", "Jupiter"],
            "correct" => 2,
            "points" => 150000
        ],
        [
            "question" => "What is the largest ocean on Earth?",
            "options" => ["Atlantic Ocean", "Indian Ocean", "Arctic Ocean", "Pacific Ocean"],
            "correct" => 3,
            "points" => 250000
        ],
        [
            "question" => "What is the process of converting a liquid into a gas called?",
            "options" => ["Condensation", "Evaporation", "Sublimation", "Precipitation"],
            "correct" => 1,
            "points" => 400000
        ],
        [
            "question" => "Who wrote 'Romeo and Juliet'?",
            "options" => ["Charles Dickens", "Jane Austen", "William Shakespeare", "Mark Twain"],
            "correct" => 2,
            "points" => 600000
        ],
        [
            "question" => "Which organ is responsible for pumping blood throughout the body?",
            "options" => ["Liver", "Brain", "Heart", "Lung"],
            "correct" => 2,
            "points" => 1000000
        ],
        [
            "question" => "What is the largest land animal?",
            "options" => ["Rhino", "Elephant", "Giraffe", "Hippo"],
            "correct" => 1,
            "points" => 2000000
        ]
       
    ];

    // Check if the current question index is set in the session
    if (!isset($_SESSION['question_index'])) {
        $_SESSION['question_index'] = 0; // Start from the first question
        $_SESSION['points'] = 0; // Initialize score
    }

    $currentQuestionIndex = $_SESSION['question_index'];
    $currentQuestion = $questions[$currentQuestionIndex];

    // Check if answer is submitted
    if (isset($_POST['answer'])) {
        $userAnswer = (int)$_POST['answer'];

        // Check if the answer is correct
        if ($userAnswer === $currentQuestion['correct']) {
            $_SESSION['points'] += $questions[$currentQuestionIndex]['points'];
            $_SESSION['question_index']++;
            // Check if the game is over (all questions answered)
            if ($_SESSION['question_index'] >= count($questions)) {
                header("Location: gameover.php?score=" . $_SESSION['points']);
                exit;
            }
        } else {
            $_SESSION['points'] = 0;
            header("Location: gameover.php?score=" . $_SESSION['points']);
            exit;
        }

        // Reload the page to show the next question
        header("Refresh:0");
        exit;
    }
    ?>
     <div class="logout">
        <a href='logout.php' class="link">Logout</a>
    </div>

    <div class="game-container">
        <div class="question-box">
            <p>Question <?php echo $currentQuestionIndex + 1; ?></p>
            <h2><?php echo $currentQuestion["question"]; ?></h2>
        </div>

        <form method="POST" action="">
            <div class="options">
                <?php foreach ($currentQuestion["options"] as $index => $option): ?>
                    <div class="option">
                        <input type="radio" name="answer" value="<?php echo $index; ?>" id="option<?php echo $index; ?>">
                        <label for="option<?php echo $index; ?>"><?php echo $option; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit">Submit</button>
            
        </form>

        <div class="lifelines">
            <div class="lifeline">Ask a friend</div>
            <div class="lifeline">50/50</div>
            <div class="lifeline">Ask the audience</div>
            <div class="lifeline"><a href="gameover.php" class="link">Walk away</a></div>
        </div>

    </div>
    <div class="scoreboard">
    <img src="game_levels.png" alt="Game Levels">
        <div class="score-container">
            <?php 
        if (isset($_SESSION['username'])) {
            echo $_SESSION['username'] . "'s Score: " . $_SESSION['points'] . " $";
        } else {
            echo "Player's Score: " . $_SESSION['points'] . " $";
        }
            ?>
    </div>
    
</div>
    
</body>
</html>
