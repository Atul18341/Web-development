<head>
 <title>New Test Creation:Mathematica</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 <form method="POST" action="create resource.php">
 <input type="text" name="topic" placeholder="Test Topic" required><p>
 <input type="number" name="no" placeholder="Test No" required><p>
 <input type="submit" name="create" value="Create Resources">
 </form>
 </body>

 <?php
 if(isset($_POST['create'])){
     include("config.php");
     $Topic=str_replace(' ','',$_POST['topic']);
     $No=$_POST['no'];
     
     $table=$Topic ."_test_".$No;
     $query=mysqli_query($dbc,"CREATE TABLE $table (QUESTION_NO int,QUESTION_TEXT varchar(3000),QUESTION_IMAGE varchar(200),CORRECT_ANSWER varchar(10))");
     if($query){
         echo"Resources Successfully Created.";
     }
     else{
         echo"Sorry, Resource Creation Failed.";
     }
     $folder=mkdir("./$table",0777,True);
     if($folder==TRUE){
         echo"Folder Successfully Created.";
     }
     else{
         echo"Folder Creation Failed.";
     }
    $query=mysqli_query($dbc,"INSERT INTO administrator_access(TEST_NAME,ACCESS)"."VALUES('$table','NO')")
            or die("failed insertion.");
 }