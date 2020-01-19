<?php
session_start();
include("../config.php");
$db="codex_question";
$dbc=mysqli_connect($host,$user,$password,$db)
     or die("Error Connecting to MYSQL database.");

 
	 
$query="SELECT GIVEN_START_PERMISSION FROM admin_login WHERE GIVEN_START_PERMISSION='Yes'";
$result=mysqli_query($dbc,$query);
$final=mysqli_num_rows($result);
if($final==1){
	$NAME=$_POST['name'];
	$ROLL_NO=$_POST['rollno'];
	$query="ALTER TABLE question ADD response_$ROLL_NO varchar(10) NOT NULL";
	mysqli_query($dbc,$query);

	$_SESSION['Roll_no']=$ROLL_NO;
	$_SESSION['Name']=$NAME;
	
	header("Location:Question-1.php");
	}
else{
	
	echo"<h1>Access Denied.Please ask the administrator to give access/start the test.</h1>";
	}