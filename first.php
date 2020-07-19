<head>
  <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body onload="time()">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
         <div id="clock"></div>
         <div id="navigator">
          <?php 
            include("config.php");
            session_start();
            $Fullname=$_SESSION['fullname'];
            $query=mysqli_query($dbc,"SELECT * FROM administrator_access WHERE ACCESS='Yes'");
            $view=mysqli_fetch_array($query);
            $table=$view['TEST_NAME'];
            $_SESSION['Table']=$table;
           
          $query=mysqli_query($dbc,"SELECT * FROM $table");
          $total=mysqli_num_rows($query);
          $_SESSION['Total_Question']=$total;
          while($view=mysqli_fetch_array($query)){
          echo"<button type='button'value='{$view['QUESTION_NO']}' id='navigate' onclick='navigate(value)'>{$view['QUESTION_NO']}</button>";
           }
           ?>
        </div>
        <center><button type="button" id="end" onclick="location.href='result.php'">Submit Test</button></center>
      </div>
  <div class="col-md-9 mt-2">
    <form>
      <input type="hidden" id="hidden"value="1">
       <div id="question">
       <?php
         include('config.php');
         $query=mysqli_query($dbc,"SELECT * FROM $table WHERE QUESTION_NO='1'");
         $view=mysqli_fetch_array($query);
         echo "<h3>Question No: ".$view['QUESTION_NO']."</h3><p>";
         echo"<img src='{$view['QUESTION_IMAGE']}' width='330px' height='400px'><p>";
       ?>
  
  <input type="radio"value="a" id="answer"name="answer" onclick="Answer(value)">
  <label for="option">a</label><br>
  <input type="radio" value="b" id="answer"name="answer"onclick="Answer(value)">
  <label for="option">b</label><br>
  <input type="radio" value="c" id="answer"name="answer"onclick="Answer(value)">
  <label for="option">c</label><br>
   <input type="radio" value="d" id="answer"name="answer"onclick="Answer(value)">
  <label for="option">d</label><br>
   </div>
  
  <input type="button" value="Previous" id='previous'onclick="Previous()">
  <input type="button" value="Next" 'id='next'onclick="Next()">
<p id="result"></p>
   </form>
</div>

  <script>
  	function Answer(value){
  		var x=value;
  		var result=document.getElementById("result");
      var no=document.getElementById("hidden").value;
  		let xhr=new XMLHttpRequest();
  let url="answer.php";

  

  xhr.onreadystatechange=function(){
     if(xhr.readyState === 4 && xhr.status === 200){
      result.innerHTML=this.responseText;
     }
  };
  var data=JSON.stringify({"id":no,"answer":x});
  xhr.open("GET","answer.php?answer=" +data,true);

 
   xhr.send(data);
  	}

  function Next(){
    document.getElementById("previous").style.display="block";
    document.getElementById("result").innerHTML="";
    var i=parseInt(document.getElementById("hidden").value);

    var question=document.getElementById("question");
    var i=i+1;
    if(i===16){
     document.getElementById('next').style.display="none";
    }
    document.getElementById("hidden").value=i;
    let xhr=new XMLHttpRequest();
  let url="answer.php";

  

  xhr.onreadystatechange=function(){
     if(xhr.readyState === 4 && xhr.status === 200){
      question.innerHTML=this.responseText;
     }
  };
  var data=JSON.stringify({"id":i});
  xhr.open("GET","question.php?id=" +data,true);

 
   xhr.send(data);

  }
   function Previous(){
    var i=parseInt(document.getElementById("hidden").value);
    document.getElementById("result").innerHTML="";
    var question=document.getElementById("question");
    var i=i-1;
    if(i===1){
     document.getElementById('previous').style.display="none";
    }
    document.getElementById("hidden").value=i;
    let xhr=new XMLHttpRequest();
  let url="answer.php";

  

  xhr.onreadystatechange=function(){
     if(xhr.readyState === 4 && xhr.status === 200){
      question.innerHTML=this.responseText;
     }
  };
  var data=JSON.stringify({"id":i});
  xhr.open("GET","question.php?id=" +data,true);

 
   xhr.send(data);
 }
    window.onload=function(){
  var minutes=29;
  var sec=60;
interval=setInterval(function(){
    document.getElementById("clock").innerHTML=minutes+":"+sec;
    sec--;
    
    if(minutes==00 && sec==00){
  clearInterval(interval);
  alert("Time up.Your response is going to be submitted.");
  location.href='result.php';
      }
      if(sec==00){
      minutes--;
    sec=59;}
    
  },1000);

  }

  
 function navigate(value){
  var no=value;
  let xhr=new XMLHttpRequest();

  xhr.onreadystatechange=function(){
     if(xhr.readyState === 4 && xhr.status === 200){
      question.innerHTML=this.responseText;
     }
  };
  var data=JSON.stringify({"id":no});
  xhr.open("GET","question.php?id=" +data,true);

 
   xhr.send(data);
 }


 </script>

 <style type="text/css">
  body{background-color:#A6E7E6;}
  #previous{display:none;}
  #navigate{border-radius:50%;
            margin:5px;
            }
.col-md-9{padding:20px;
          border:1px solid black;
          margin-right:0px;
          background-color:#0EF7E4;}
#question{font-size:20px;
         }
#question img{float:left;
              margin-right:30px;}

#clock{padding:5px;
       border:5px groove brown;
       background-color:#CD8DF2;
       font-size:30px;
       width:150px;
       height:70px;
       margin:20px;
       font-weight:bold;
       text-align:center;}
.col-md-3{border:3px groove blue;
          padding:20px;
          background-color:#ffbd69;}
#navigator{background-color:#436f8a;
           padding:20px;}
#end{margin-top:100px;
     border-radius:10px;
     padding:10px;
     font-weight:20px;
     font-weight:bold;
     background-color:#2CA142;}