<?php
header("Content-Type:application/json");
$data=json_decode($_GET["answer"]);
$Id=$data->id;
$Answer=$data->answer;
include("config.php");
session_start();
$Table=$_SESSION['Table'];
$Fullname=$_SESSION['fullname'];
$query=mysqli_query($dbc,"UPDATE $Table SET response_$Fullname='$Answer' WHERE QUESTION_NO='$Id'");
if($query){
    echo"<h2><i>Your Answer is successfully saved.Thankyou for your response.</i></h2>";
}
