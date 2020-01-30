<?php include 'database.php'; ?>
<?php 
    if(isset($_POST['submit'])){
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        //create choice array
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        //insert query
        $query = "insert into questions(question_number,text) 
                 values('$question_number','$question_text')";
         //run query
         $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
         
         //validate insert 
         if($insert_row){
             foreach($choices as $choice => $value){
                 if($value !=''){
                     if($correct_choice == $choice){
                         $is_correct = 1;
                     }else{
                         $is_correct = 0;
                     }
                     //choice query
                     $query = "insert into choices(question_number,is_correct,text) 
                                values('$question_number','$is_correct','$value')";

                     $result = $mysqli->query($query) or die($mysqli->error.__LINE__); 
                     //validate insert
                     if($result){
                         continue;
                     }else{
                        die('Error: .('.$mysqli->errno.')'.$mysqli->error);
                     }      
                 }
             }
             $msg = "Question has been added";
         }

    }

    //get total question
    $query = "select * from questions";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;
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
            <h2>Add a Question</h2>
            <?php
                if(isset($msg)){
                    echo '<p>' .$msg. '</p>';
                }
            ?>
            <form action="add.php" method="post">
            <p>
                <label for="">Question Number : </label>
                <input type="number" value="<?php echo $total+1; ?>" name="question_number">
            </p>
            <p>
                <label for="">Question Text : </label>
                <input type="text" name="question_text">
            </p>
            <p>
                <label for="">Choice #1 : </label>
                <input type="text" name="choice1">
            </p>
            <p>
                <label for="">Choice #2 : </label>
                <input type="text" name="choice2">
            </p>
            <p>
                <label for="">Choice #3 : </label>
                <input type="text" name="choice3">
            </p>
            <p>
                <label for="">Choice #4 : </label>
                <input type="text" name="choice4">
            </p>
            <p>
                <label for="">Choice #5 : </label>
                <input type="text" name="choice5">
            </p>
            <p>
                <label for="">Correct choice Number : </label>
                <input type="number" name="correct_choice">
            </p>
            <input type="submit" name="submit" class="submit">
            </form>
        </div>
    </main>
    <footer class="container">
        <p>copyright &copy; 2020 PHP Quizzer</p>
    </footer>
</body>
</html>