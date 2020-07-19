<?php
header("Content-Type:application/json");
$data=json_decode($_GET["id"]);
$Id=$data->id;
include("config.php");
session_start();
$Table=$_SESSION['Table'];
$query=mysqli_query($dbc,"SELECT * FROM $Table WHERE QUESTION_NO='$Id'");
$view=mysqli_fetch_array($query);

echo "<h5>Question No: ".$view['QUESTION_NO']."</h5><p>";
echo"<img src='{$view['QUESTION_IMAGE']}' width='330px' height='400px'><p>";
if($view['QUESTION_TYPE']=='multiple option'){
 echo"<input type='text' id='answer' name='answer' placeholder='Write Correct options(Ex.bd)'onfocusout='Answer(value)'";
}
else{
 echo"
<input type='radio'value='a' id='answer'name='answer' onclick='Answer(value)'>
  <label for='option'>a</label><br>
  <input type='radio' value='b' id='answer'name='answer'onclick='Answer(value)'>
  <label for='option'>b</label><br>
  <input type='radio' value='c' id='answer'name='answer'onclick='Answer(value)'>
  <label for='option'>c</label><br>
   <input type='radio' value='d' id='answer'name='answer'onclick='Answer(value)'>
  <label for='option'>d</label><br>";
}
?>
  <?php
  include("config.php");
  header("Content-Type:application/json");
$data=json_decode($_GET["id"]);
$Id=$data->id;
 $Fullname=$_SESSION['fullname'];
  
 $query=mysqli_query($dbc,"SELECT response_$Fullname FROM $Table WHERE QUESTION_NO='$Id'");
 $view=mysqli_fetch_array($query);
 $answer="response_".$Fullname;
  echo"<p>Your current answer is :<b>".$view[$answer]."</b>";
  ?>