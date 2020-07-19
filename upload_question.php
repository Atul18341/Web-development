<!DOCTYPE html>
<html>
<head>
<title>Upload Image</title>
<meta name="viewport"content="width=device-width,initial-scale=1">
</head>
<body>
<h1 align="center"><font face="lucida calligraphy" color="red">Question Uploading Portal</font></h1>

<form action="upload_question.php" method="post" enctype="multipart/form-data">
<select name="testname">
  <option value="#">Select Test</option>
<?php
include("config.php");
$query=mysqli_query($dbc,"SELECT * FROM administrator_access");
while($view=mysqli_fetch_array($query)){
 echo"<option value='{$view['TEST_NAME']}'>{$view['TEST_NAME']}</option>";
}
?>
</select><p>

<input type="number" name="no" placeholder="Question No"><p>
<input type="text" name="correct" placeholder="Correct Option"><p>
<input type="text" name="question" placeholder="Question Text(if any)"><p>
        <label>or</label><p>
    Select Question Image(max. size-50 Kb):<p>
    <input type="file" name="uploadfile"><p>
    <input type="submit" name="uploadfilesub" value="Upload">
</form>
</body>
</html>


<?php

if(isset($_POST['uploadfilesub'])) {
include("config.php");
session_start();
$No=$_POST['no'];
$Question=$_POST['question'];
$folder =$_POST['testname']."/";
$table=$_POST['testname'];
$filename =$folder.basename($_FILES['uploadfile']['name']);
$filetmpname = $_FILES['uploadfile']['tmp_name'];
$uploadOk=1;
$imageFileType=strtolower(pathinfo($filename,PATHINFO_EXTENSION));

move_uploaded_file($filetmpname,$filename);
$No=$_POST['no'];
$Correct=$_POST['correct'];
$query =mysqli_query($dbc, "INSERT INTO $table(QUESTION_NO,QUESTION_TEXT,QUESTION_IMAGE,CORRECT_ANSWER)"." VALUES ('$No','$Question','$filename','$Correct')");
if($query) {
echo "Question Successfully Inserted/Uploaded.";
}
else{
    echo"Question Insertion Failed.";
}
}
?>
