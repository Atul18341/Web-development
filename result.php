<head>
<meta name="viewport" content="device-width, initial-scale=1">
<body id="result">
<?php
session_start();
include("config.php");

$Fullname=$_SESSION['fullname'];
$TOTAL_QUESTION=$_SESSION['Total_Question'];
$table=$_SESSION['Table'];
$query=mysqli_query($dbc,"SELECT CORRECT_ANSWER,response_$Fullname FROM $table WHERE CORRECT_ANSWER=response_$Fullname");
$final=mysqli_num_rows($query);
echo"<div class='result'>Thank you for participating in this test.Hope you gained a lot of 
      exprience during the test.<p>
      Your final marks is:
	  <p><div class='no'><b>$final /$TOTAL_QUESTION</div>
	  <a href='feedback.php'>Give your precious feedback.</a>";


?>
<style href="text/css">
#result{background-image:url("login.jpg");
       background-repeat:no-repeat;
	   background-size:100% 100%;
	   }
	   a{
	   color:red;}
.result{color:white;
        margin-top:25%;
		font-size:30px}
.no{margin-left:35%;
    font-size:30px;
	border:4px solid white;
	padding:20px;
	width:70px;}
	
p{margin-left:35%;
font-size:20px;}