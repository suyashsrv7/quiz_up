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
	unset($_SESSION['challenge']);
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

//echo $_SESSION['challengeid'];

?>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="quizplay.css">
			 <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
	</head>
	<body class="background">
		
		<script>
		window.addEventListener("DOMContentLoaded", function() {
          if(<?php  if(isset($_SESSION['accept'])){echo "true";} else{echo "false";}?> )
          {
          	accept();
          }
          else if(<?php if(isset($_SESSION['challenge'])){echo "true";} else{echo "false";} ?>)
          {
          	challenge();
          }

        }, false);
		
		function setsubmit()
		{
			
			
			form.elements["toid"].value='<?php echo $player2->id ; ?>';
			form.elements["fromid"].value='<?php echo $player1->id ; ?>';
			form.elements["topic_name"].value = '<?php echo $topic; ?>';
			form.elements["status"].value = 0 ;
			document.getElementById('form').submit();
			window.Location.href ="questions.php"

		}
		function accept(){

			document.getElementById('winlose').style.display = "none";
			document.getElementById('challenge').style.display = 'none'; 
		}
		function challenge(){
			
			document.getElementById('winlose').style.display = 'none';
			document.getElementById('score').style.display = 'none';
			
			document.getElementById('play').style.display = 'none';
		}

		
		</script>
		<form name='form' method='post' action='quizplay.php' id='form'>
			
			<input type='hidden' value='' name='toid' id="toid">
			<input type='hidden' value='' name='topic_name' id="topic_name">
			<input type='hidden' value='' name='status' id="status">
			<input type='hidden' value='' name="fromid" id="fromid" >
		</form>
		<div class="row" >

			<div class="row winlose" id = 'winlose'>
				<div class="col-mid-6 stat1" >win or loose</div>
				<div class="col-mid-6 stat2" > win or loose</div>
			</div>
			<div class="row player">

				<div class="col-mid-5 player1" >
					<div class= "img">
					</div>
					<div class="name">p1 <?php echo $player1->scrname;?>
					</div>
				</div>
				<div class="col-mid-2 box">VS</div>
				<div class="col-mid-5 player2" >
					<div class= "img">
					</div>
					<div class="name">p2<?php echo $player2->scrname;?>
					</div>
				</div>

			</div>
			<div class= " row topic" id = 'topic'>
						
								<div class="col-mid-3 topic1" ></div> 
								<div class="col-mid-3 topic2" ></div>
								<div class="col-mid-3 topic3" ></div>
								<div class="col-mid-3 topic4" ></div>
		        <div class="image"></div>
				<div class="nam"><?php echo $topic;?></div>
			</div>
			
			<div class=" row score" id = 'score'>
				<div class= "col-mid-4 num1"> num1</div>
				<div class="col-mid-4 title">SCORE</div>
				<div class ="col-mid-4 num2">num2</div>
			</div>
			
			<div class="row play" id = 'play'>
				<button >PLAY</button>
			</div>
			<div class="row challenge" id = 'challenge'>
				<button onclick = "setsubmit();">CHALLENGE</button>
			</div>
	</div>
		
	</body>
	
</html>
