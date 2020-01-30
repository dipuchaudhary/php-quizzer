<?php include 'database.php' ?>
<?php session_start();?>
<?php 
/*
*Get questions
*/
$number = (int) $_GET['n'];

$query = "Select * from questions where question_number=$number";
//result

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

/*
    get the total questions
    */
    $query = "select * from questions";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

/*
*Get choices
*/
$query = "select * from choices where question_number=$number";

$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
            <div class="current">
                Questions <?php echo $question['question_number']; ?> of <?php echo $total; ?>
            </div>
            <p class="question">
                <?php echo $question['text']; ?>
            </p>
            <form action="process.php" method="post">
                <ul class="choices">
                    <?php while($row = $choices->fetch_assoc()): ?>
                        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"><?php echo $row['text'];?></li>
                    <?php endwhile; ?>
                </ul>
                <input type="submit" name="submit" class="submit">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
            </form>
        </div>
    </main>
    <footer class="container">
        <p>copyright &copy; 2020 PHP Quizzer</p>
    </footer>
</body>
</html>