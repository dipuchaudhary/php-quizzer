<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Php Quizzer</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>You're done!</h2>
            <p>You have completed the Test.</p>
            <p>Final score: <?php echo $_SESSION['score']; ?></p>
            <?php session_destroy();?>
            <a href="question.php?n=1" class="submit">Take Again</a>
        </div>
    </main>
    <footer class="container">
        <p>copyright &copy; 2020 PHP Quizzer</p>
    </footer>
</body>
</html>