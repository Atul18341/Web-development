var slideindex=0;
	 Next_question();
	 function Next_question(){
	 var i;
	 var x=document.getElementsByClassName("questions");
	 for(i=0;i<x.length;i++)
		{x[i].style.display="none";
	  }
	  slideindex++;
	  if(slideindex>x.length)
	  {}
	  x[slideindex-1].style.display="block";
	 
		}
		function Previous_question(){
			 var i;
			var y=window.slideindex;
			var x=document.getElementsByClassName("questions");
			for(i=y;i>0;i--)
				{x[i].style.display="none";
	  }
	  slideindex--;
	  if(slideindex>x.length)
	  {}
	  x[slideindex-1].style.display="block";
	 document.getElementById("hide").value=slideindex;
	
		}
	function view(){
		var x=document.getElementsByClassName("questions");
	 for(i=0;i<x.length;i++)
		{x[i].style.display="none";
	  }
	  var z=document.getElementById("navigator").value;
	  alert(z);
	}
	

window.onload=function(){
	var minutes=3560;
	var sec=60;
interval=setInterval(function(){
		document.getElementById("count").innerHTML=minutes+":"+sec;
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
	$(".end").click(function(){
          $(".question").css("display","none");
	});		  