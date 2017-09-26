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
	<body onload = "show();">
		<script>
		
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
            }
        };
        x.open("GET","data.php",true);
        x.send();
    }


      /*var x1= new XMLHttpRequest();
        x1.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             {
                document.getElementById("option1").innerHTML = this.responseText;
            }
        };
        x1.open("GET","data1.php",true);
        x1.send();
    

      var x2= new XMLHttpRequest();
        x2.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             {
                document.getElementById("option2").innerHTML = this.responseText;
            }
        };
        x2.open("GET","data2.php",true);
        x2.send();


      var x3= new XMLHttpRequest();
        x3.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             {
                document.getElementById("option3").innerHTML = this.responseText;
            }
        };
        x3.open("GET","data3.php",true);
        x3.send();
		 


      var x4= new XMLHttpRequest();
        x4.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             {
                document.getElementById("option4").innerHTML = this.responseText;
            }
        };
        x4.open("GET","data4.php",true);
        x4.send();
		 }*/
		</script>
		<div class="panel">
			<div class="question-panel" ><p id="question"></p></div>
			<div class="option-panel">
				<div class="option1"><button id="option1" onclick = "show();"></button></div>
				<div class="option1"><button id="option2" onclick = "show();"></button></div>
				<div class="option1"><button id="option3" onclick = "show();"></button></div>
				<div class="option1"><button id="option4" onclick = "show();"></button></div>
			</div>
		</div>

	</body>
</html>