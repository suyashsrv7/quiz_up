<?php
session_start();
require("connection.php");
if(!isset($_SESSION['scrname']))
{
	if($_SESSION['scrname'] == 'admin')
		header("Location:admin.php");
	else
        header("Location:log-in.php");
}
else
{
	/*$topic = $_SESSION['topics-name'];
	$query = "SELECT `topic_id` FROM `topics` WHERE `topic_name` = '$topic'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	
	$topic_id=$row['topic_id'];
	$query = "SELECT * FROM `questions` WHERE `topic_id` = '$topic_id'";
	$questions = many_rows($query);
	
	 $i = 0 ;*/

	

}
?>
<html>
	<head>
		<style>
		body{
			background-color:  #ffb380;
		}
		.panel{
			height:320px;
			width: 500px;
			margin:10% auto;
			background-color: #4d4d4d;
		}
		.question-panel{
			height:170px;
			width:450px;
			margin:0 auto;
			border: 1px solid #fff;
			color:#fff;
			text-align: center;
			font-size: 22px;
		}
		.option-panel{
			height:130px;
			width:450px;
			margin:0 auto;
			border:1px solid #fff;

		}
		.option1{
			height:30px;
			width:150px;
			border: 1px solid #fff;
			display:inline-block;
			margin-top: 20px;
			margin-left: 45px;
			text-align: center:;
		}
		button{
			height:30px;
			width:150px;
			border:none;
			background-color:  #ff6600;
		}
		button:hover{
			cursor:pointer;
		}
		</style>
	</head>
	<body onload = "show1();">
		<h1><div id="timer" style="text-align:center;">TIME</div></h1>
			<script>
				var score=0;
				var t=0;
				time();
				function time()
				{
					var id=setInterval(frame,1000);
					function frame()
					{
						t++;
						document.getElementById("timer").innerHTML=t;
						if(t>10)
						{
				
							clearInterval(id);
							window.location.href="log-in.php";
					}
}



				}
			function show1(z)

			{show();
		
		 function show(){


 
 	
      var x= new XMLHttpRequest();
        x.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             { 
			data = this.responseText.split ( "[BRK]" );
			document.getElementById("option1").innerHTML = data[1];
			document.getElementById("option2").innerHTML = data[2];
			document.getElementById("option3").innerHTML = data[3];
 			document.getElementById("option4").innerHTML = data[4];
 			
                document.getElementById("question").innerHTML = data[0];
                var k=data[5];
 			check(k);
            }
        };
        x.open("GET","data.php",true);
        x.send();
    }

    	function check(k)
    	{  console.log(k);
    		//var y=document.getElementById("z");
    		console.log(z);
    		if(z==k)
    			score=score+10;
    		document.getElementById("ans").innerHTML=score;



    	}
    }

		</script>
		<div class="panel">
			<div class="question-panel" ><p id="question"></p></div>
			<div class="option-panel">
				<div class="option1"><button id="option1" onclick = "show1(this.id);"></button></div>
				<div class="option1"><button id="option2" onclick = "show1(this.id);"></button></div>
				<div class="option1"><button id="option3" onclick = "show1(this.id);"></button></div>
				<div class="option1"><button id="option4" onclick = "show1(this.id);"></button></div>
			</div>
			<div class="option1"><button id="ans">SCORE</button></div>

		</div>

	</body>
</html>