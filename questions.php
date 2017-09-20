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
	$topic = $_SESSION['topics-name'];
	$query = "SELECT `topic_id` FROM `topics` WHERE `topic_name` = '$topic'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	
	$topic_id=$row['topic_id'];
	$query = "SELECT * FROM `questions` WHERE `topic_id` = '$topic_id'";
	$questions = many_rows($query);
	print_r($questions);
	 $i = 0 ;
	

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
	<body onload = "change();">
		<script>
		
		 
		 function change()
		 {
		 	
            document.getElementById('question').innerHTML =" <?php echo $questions[$i]['question'] ;?>";
            document.getElementById('option1').innerHTML = " <?php echo $questions[$i]['option_1'] ;?>";
            document.getElementById('option2').innerHTML = " <?php echo $questions[$i]['option_2'] ;?>";
            document.getElementById('option3').innerHTML = " <?php echo $questions[$i]['option_3'] ;?>";
            document.getElementById('option4').innerHTML = " <?php echo $questions[$i]['option_4'] ;?>";
            <?php $i++; ?>
		 }
		</script>
		<div class="panel">
			<div class="question-panel" ><p id="question"></p></div>
			<div class="option-panel">
				<div class="option1"><button id="option1" onclick = "change();"></button></div>
				<div class="option1"><button id="option2" onclick = "change();"></button></div>
				<div class="option1"><button id="option3" onclick = "change();"></button></div>
				<div class="option1"><button id="option4" onclick = "change();"></button></div>
			</div>
		</div>

	</body>
</html>