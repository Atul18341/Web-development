<?php include("../heading.php");?>
<head>
<title>Dashboard-Online Test</title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
</title>
</head>
<body><p>
 <center><h2><u>Online Test Platform</u></h2></center>
    <div class="dashboard"onclick="location.href='create resource.php'">
    <img src="./images/plus.png"><p>
     Add New Test
     </div>
    <div class="dashboard" onclick="location.href='upload_question.php'">
    <img src="./images/question.png"><p>
    Add Question
    </div>
    <div class="dashboard" onclick="location.href='administrator.php'">
    <img src="./images/access.png"><p>
     Give Test Access
    </div>
    <div class="dashboard" >
    <img src="./images/student.png"><p>
     Add Student
     </div>
     <div class="dashboard" >
     <img src="./images/delete.png"><p>
     Remove Student
     </div>
     <div class="dashboard" onclick="location.href='index.html'">
     <img src="./images/test.png"><p>
    View Student Platform
     </div>
     
</div>
<style type="text/css">
body{justify:center;}
.dashboard img{width:100px;
    height:100px;}
.dashboard{width:150px;
    height:180px;
    float:left;
    justify:center;
    font-weight:bold;
    border:1px double black;
    padding:20px;
    margin:20px;
    text-align:center;}