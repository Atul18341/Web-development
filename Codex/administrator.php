<head>
<link rel="stylesheet" href="style.css">
</head>
<?php

include("../config.php");
$db="codex_question";
$dbc=mysqli_connect($host,$user,$password,$db)
     or die("Error Connecting to MYSQL database.");
if(isset($_POST["submit"]))
{
$Username=$_POST['username'];
$Password=$_POST['password'];

$query="SELECT * FROM admin_login WHERE USERNAME='$Username' AND PASSWORD='$Password'";
$result=mysqli_query($dbc,$query);
$final=mysqli_num_rows($result);
	if($final==1){
	$query="UPDATE admin_login SET GIVEN_START_PERMISSION='Yes'";
	mysqli_query($dbc,$query);
	echo"<h1>Administrator Login Successful.Now ask candidate to login and start the exam.</h1>";
	}
}
else{ 
echo"<h1>Administrator Login Failed.Please Login with correct credentials.</h1>";
    }
echo"<form method='POST' action='administrator.php'>
     <input type='submit' id='logout' value='Logout/End Exam Access'name='logout'></form>";

if(isset($_POST["logout"]))
{$query="UPDATE admin_login SET GIVEN_START_PERMISSION='No'";
 mysqli_query($dbc,$query);
 echo"<h1>Successfully Logout.</h1>";

}
?>	
<style type="text/css">

</style>
