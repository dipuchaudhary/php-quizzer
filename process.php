<?php include 'database.php';?>
<?php 
session_start();

if(!isset($_SESSION['score'])){
     $_SESSION['score']=0;
}
if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    /*
    get the total questions
    */
    $query = "select * from questions";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

//get correct choice
    $query = "select * from choices
                where question_number = $number and is_correct = 1";
//get result
     $result = $mysqli->query($query) or die($mysqli->error.__LINE__); 
     //get row
     $row = $result->fetch_assoc();
     //get correct choice
     $correct_choice = $row['id']; 
     
     //compare
     if($selected_choice == $correct_choice){
         //correct answer
         $_SESSION['score']++;
     }
     //check if last question
     if ($number == $total) {
         header('location: final.php');
         exit();
     } else {
         header('location: question.php?n='.$next);
     }
     
}
?>