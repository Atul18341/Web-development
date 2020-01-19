<?php
session_start();
include("../config.php");
$db="codex_question";
$dbc=mysqli_connect($host,$user,$password,$db);
$QUESTION=$_SESSION['Question'];
$target_dir = "Program images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$query="UPDATE question SET PROGRAM_IMG ='$target_file' WHERE QUESTIONS='$QUESTION'";
$result=mysqli_query($dbc,$query);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5242880) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("refresh:5;url=question.html");