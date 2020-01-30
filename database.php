<?php
//connect to database
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "quizzer";

//create mysql object
$mysqli = new mysqli($servername,$username,$pass,$dbname);

//handle the error
if($mysqli->connect_error){
    echo "connection failed:".$mysqli->connect_error;
    exit();
}

?>