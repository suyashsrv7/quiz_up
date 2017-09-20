<?php
session_start();
require("connection.php");
if(isset($_POST['toid']))
{
	$fromid = $_POST['fromid'];
	$toid = $_POST['toid'];
	$topic_name = $_POST['topic_name'];
	$query = "INSERT INTO `challenge_request`(`challenge_id`, `fromid`, `toid`, `topic_name`, `status`) VALUES ('NULL','$fromid','$toid','$topic_name','0')";
	$conn->query($query);
	header('Location:questions.php');
}
$topic = $_SESSION['topics-name'];
$player = $_SESSION['friend'];
$user = $_SESSION['scrname'];
$player1 = new get_value();
$player2 = new get_value();

$query = "SELECT * FROM `users` WHERE `scrname`='$player'";
$row = run_query($query);
$player2->get($row);
$query = "SELECT * FROM `users` WHERE `scrname`='$user'";
$row = run_query($query);
$player1->get($row);

?>
<html>
	<head>
		<style>
		body{
			background-color: #ffb380;
		}
		.playcard{
			height:560px;
			width:500px;
			background-color: #4d4d4d;
			margin:0 auto;
			border-radius: 2px;
			position: relative;
		}
		.player1{
			position: absolute;
			float: left;
			height:80px;
			width:200px;
			
			top:10px;


		}
		.player2{
			position: absolute;
			right:0px;
			height:80px;
			width:200px;
			
			top:10px;

		}
		.vs{
			position: absolute;
			
			height:20px;
			width:50px;
			left:220px;
			text-align: center;
			color:#fff;
			top:20px;
		}
		.player1-img{
			height:70px;
			width:70px;
			border-radius: 50%;
			
			position:absolute;
			top:4px;left:2px;
		}
		.player1-name{
			height:30px;
			width:120px;
			position: absolute;
			left:76px;
			top:25px;
			
			text-align: center;
			color:#fff;
		}
		.player2-img{
			height:70px;
			width:70px;
			border-radius: 50%;
			
			position:absolute;
			top:4px;right:2px;
		}
		.player2-name{
			height:30px;
			width:120px;
			position: absolute;
			right:76px;
			top:25px;
			
			text-align: center;
			color:#fff;
		}
		img{
			height:70px;
			width:70px;
			border-radius: 50%;

		}
		.challenge{
			height:40px;
			width:170px;
			border: 1px solid #ff6600;
			position: absolute;
			bottom:20px;
			left:165px;
		}
		.btn{
			height:40px;
			width:170px;
			border:none;
			background-color: #ff6600;
			font-size: 18px

		}
		.btn:hover{
			cursor:pointer;

		}
		</style>
	</head>
	<body>
		<script>
		function setsubmit()
		{
			
			
			form.elements["toid"].value='<?php echo $player2->id ; ?>';
			form.elements["fromid"].value='<?php echo $player1->id ; ?>';
			form.elements["topic_name"].value = '<?php echo $topic; ?>';
			form.elements["status"].value = 0 ;
			document.getElementById('form').submit();

		}
		</script>
		<form name='form' method='post' action='quizplay.php' id='form'>
			
			<input type='hidden' value='' name='toid' id="toid">
			<input type='hidden' value='' name='topic_name' id="topic_name">
			<input type='hidden' value='' name='status' id="status">
			<input type='hidden' value='' name="fromid" id="fromid" >
		</form>

		<div class="playcard" id='playcard'>
			<div class="player1">
				<div class="player1-img"><img src="<?php echo $player1->image ;?>"></div>
				<div class="player1-name"><?php echo $player1->scrname;?></div>
				
			</div>
			<div class = "vs">VS</div>
			<div class="player2">
				<div class="player2-img"><img src="<?php echo $player2->image;?>"></div>
				<div class="player2-name"><?php echo $player2->scrname;?></div>
				
			</div>
			<div class="challenge"><button class="btn" onclick="setsubmit()">CHALLENGE</button></div>
		</div>
		<div class="start">
		</div>
	</body>
</html>