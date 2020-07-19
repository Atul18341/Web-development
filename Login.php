<head>
 <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
 </head>
<body id="login">
<div class="box" id="form">
<i class="fa fa-user-circle-o" aria-hidden="true"></i>
<h2>Login to continue test</h2>
<form method="POST" action="Login.php" onsubmit="disappear()">
<div class="inputBox">
<i class="fa fa-user" aria-hidden="true"></i>
<input type="text" name="fullname"  placeholder="Your Name" required>
<label>Your Name</label>
</div>
<div class="inputBox">
<i class="fa fa-lock" aria-hidden="true"></i>
<input type="Password" name="password"  placeholder="Password"required>
<label>Password</label>
</div>
<input type="submit" name="submit" value="Login"id='submit'>
<br>
<br>
<p id="name"><a href="lost your password">Lost Your Password</a></p>
</form>
</div>
<script>
function disappear(){
    var y=document.getElementById("form").style.display="none";
}
</script>
<style type="text/css">
body
{
padding:0;
margin:0;
font-family:sans-serif;
background-size:cover;
}
.ps
{
width: 80px;
height: 80px;
border-radius: 90%;
position: absolute;
top: -10%;
left: calc(50% - 50px);}
.box
{position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 350px;
padding: 40px;
background: rgba(0,0,0,.8);
box-sizing: border-box;
box-shadow: 0 15px 25px rgba(0,0,0,.5);
border-ratio:10px;}
.box h2
{
margin: 0 0 30px;
padding: 0;
color: #fff;
text-align: center;
}
box .inputBox
{
position: relative;
}
.box .inputBox input
{
width: 100%;
height: 50%;
padding: 10px 0;
font-size: 16px;
color: #fff;
margin-bottom: 30px;
border:none;
border-bottom: 1px solid #fff;
outline: none;
background: transparent;
}
.box .inputBox label
{
position:relative;
top:-95px;
left:0;
padding: 10px 0;
font-size: 16px;
color: #fff;
pointer-events: none;
} 
.box input[type="submit"]
{
background: transparent; 
border:none;
outline: none;
color: #fff;
background:#03a9f4;
padding: 10px 20px;
cursor: pointer;
border-radius: 5px;
}

.input[type="button"]
{
background: transparent; 
border:none;
outline: none;
color: #fff;
background:#03a9f4;
padding: 10px 20px;
cursor: pointer;
border-radius: 5px;
}
</style>
<?php
if(isset($_POST['submit'])){
include("config.php");
session_start();
 $Fullname=$_POST['fullname'];
 $Password=$_POST['password'];
 echo $Password;
 $query=mysqli_query($dbc,"SELECT * FROM test_access WHERE STUDENT_NAME='$Fullname' AND PASSWORD='$Password'");
 $row=mysqli_num_rows($query);
 
 if($row==1){
    $CFullname=str_replace(' ','',$_POST['fullname']);
    echo"Full Name is:".$CFullname;
    $query=mysqli_query($dbc,"SELECT * FROM administrator_access WHERE ACCESS='Yes'");
    
    $final=mysqli_num_rows($query);
     if($final==1){
        $result=mysqli_fetch_array($query);
        $table=$result['TEST_NAME'];
	    $query="ALTER TABLE $table ADD response_$CFullname varchar(10) NOT NULL";
	    mysqli_query($dbc,$query);
        header("Location:first.php");
        $_SESSION['fullname']=$CFullname;
	   }
     else if($final==0){
	     echo"<div class='warning'><img src='cross.gif' width='100px' height='100px'><h1>Access Denied.Please ask the administrator to give access/start            the test.</h1></div>";
	     }
    } 
 else{
     echo"Incorrect Login.Try again.";
    }
  
}
?>
<style type="text/css">
#Login{background-color:#F4B02C;
       background-repeat:no-repeat;
	   background-size:100% 100%;
	   }
.warning{margin-top:10%;
}
.warning h1{margin-left:80px;
           
			color:white;}
.warning img{float:left;
}
h1{color:white;}
table{border:2px solid white;
color:white;
width:50%;
margin-top:20%;
font-size:20px;}
#first{border-right:1px solid white;}
th{border-bottom:1px solid white;}	
.marks{margin-left:30%}	 
#name{color:white;}
#success{background-color:#7df59d;}
#fail{background-color:#ed654a;}

</style>
