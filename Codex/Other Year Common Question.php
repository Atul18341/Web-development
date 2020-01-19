<!DOCTYPE html>
<html>
<head>
<title>Codex</title>
<meta charset="utf-8"/>
<meta name="viewport" content="device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<meta name="keywords" content="#Codex,coding plateform,MCE Motihari,#Computer Science">
<meta name="description" content="Codex is a coding platform for Motihari college of Engineering(MCE),Motihari students.The motive of this plateform is to develop coding interest in stuents of MCE and increase their coding level.">
<meta name="authors" content="developed by:Atul Kumar,Managed by:Abhishek Ranjan">
<link rel="stylesheet" href="style.css"/>
<script src="../jquery-3.4.1.min.js"></script>	
</head>
<body>
<div class="heading">

<?php

session_start();
include("../config.php");
$db="codex_question";
$ROLL_NO=$_SESSION['Roll_no'];
$dbc=mysqli_connect($host,$user,$password,$db)
     or die("Error connecting to the database.");
$query="SELECT * FROM other_year_common_test_1_question";
$result=mysqli_query($dbc,$query)
   or die("Error querying the database.");
   $t=1;
 
while($view=mysqli_fetch_array($result)){
	$img=$view['PROGRAM_IMG'];
echo"<div class='questions'>
      <form method='POST' action=''>
     <b><u>Question-$t:</u></b><p id='ques'>{$view['QUESTION']}
	 
	 <p><img src='$img' width='200px' height='auto'><p>
	 <p><input name='question_id' id='hide'type='hidden' value='$t'><p>
	 <p>Options<p><input type='checkbox' value='A' name='Answer' id='Answer'>{$view['OPTION1']}
	 <p><input type='checkbox' value='B' name='Answer' id='Answer'>{$view['OPTION2']}
	 <p><input type='checkbox' value='C' name='Answer'>{$view['OPTION3']}
	 <p><input type='checkbox' value='D' name='Answer'>{$view['OPTION4']}
	 <p><input type='submit' value='Save'name='response' class='save'></form>
	 <button class='previous' value='Previous' onclick='Previous_question()'>Prev <<</button>
	 <button class='next' value='Next' onclick='Next_question()'>Next >></button>	 

 <button id='navigator' value='$t'onclick='view()'>$t</button></div>"; 
 
 
  /* echo"<b><p>Correct answer:</b>{$view['CORRECT_RESPONSE']}<p>
      <b>My response:</b>{$view['response_$ROLL_NO']}<p>
	  <b>Expanation:</b><br>{$view['EXPLANATION']}</b>";    */
 $t++;

 }
 $_SESSION['Total_Question']=$t;
 
 
								 //* Save Answer Code
 if(isset($_POST['response'])){
$QUESTION_ID=$_POST['question_id'];
$ANSWER=$_POST['Answer'];
$query="UPDATE other_year_common_test_1_question SET response_$ROLL_NO='$ANSWER' WHERE QUESTION_ID='$QUESTION_ID' ";
mysqli_query($dbc,$query)
 or die("Error querying the database.");
 }
 
 
 ?>

<script src="Script.js"></script>

 <p>
<div class="number">
<span class="time">Time Remaining:</span><p><span id="count"></span><p>
<hr>
<a href="result.php"><input type="submit" class="end" name="end"value="End Test"></a>
</div>	
	

