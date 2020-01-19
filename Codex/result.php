<?php
session_start();
include("../config.php");
$db="codex_question";
$dbc=mysqli_connect($host,$user,$password,$db);
$ROLL_NO=$_SESSION['Roll_no'];
$TOTAL_QUESTION=$_SESSION['Total_Question'];
$query="SELECT CORRECT_RESPONSE,response_$ROLL_NO FROM question WHERE CORRECT_RESPONSE=response_$ROLL_NO";
$result=mysqli_query($dbc,$query);
$array=mysqli_fetch_array($result);
$final=mysqli_num_rows($result);
echo"<div class='result'>Thank you for participating in this test.Hope you gained a lot of 
      exprience during the test.<p>
      Your final marks is:
	  <p><b>$final/$TOTAL_QUESTION";

