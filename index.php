<?php include 'database.php'; ?>
<?php 
/*
*get total questions
*/
$query = "select * from questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

?>
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
            <h2>Test your php knowledge</h2>
            <p>This is multiple choice questions to test your php knowledge</p>
            <ul>
                <li><strong>Number of Questions:</strong><?php echo $total; ?></li>
                <li><strong>Question type:</strong> Multiple Choice</li>
                <li><strong>Estimated time:</strong> <?php echo $total*.5; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>
    <footer class="container">
        <p>copyright &copy; 2020 PHP Quizzer</p>
    </footer>
</body>

</html>