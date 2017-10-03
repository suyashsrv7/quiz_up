<?php
session_start();
if(isset($_SESSION['scrname']))
{
	if(!isset($_SESSION['opponent']) || !isset($_SESSION['topic']))
	{
		header("Location:playerprofile.php");
	}
}
else
{
	header("Location:playerprofile.php");
}

require("connection.php");

$opponent = $_SESSION['opponent'];
$topicname = $_SESSION['topic'];
$user = $_SESSION['scrname'];
if(isset($_SESSION['challengeid']))
{
	$challengeid = $_SESSION['challengeid'];
	$query = "SELECT `match_id`, `challenge_id`, `score_1`, `score_2`, `winner` FROM `matchup` WHERE `challenge_id`= 'challenegeid'";
	$match = run_query($query);
	
}


?>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="css/quizplay.css">
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
		
		<div class="row" >

			<div class="row winlose" id = 'winlose'>
				<div class="col-mid-6 stat1" >win or loose</div>
				<div class="col-mid-6 stat2" > win or loose</div>
			</div>
			<div class="row player">

				<div class="col-mid-5 player1" >
					<div class= "img">
					</div>
					<div class="name"> <?php echo $user;?>
					</div>
				</div>
				<div class="col-mid-2 box">VS</div>
				<div class="col-mid-5 player2" >
					<div class= "img">
					</div>
					<div class="name"><?php echo $opponent;?>
					</div>
				</div>

			</div>
			<div class= " row topic" id = 'topic'>
						
								<div class="col-mid-3 topic1" ></div> 
								<div class="col-mid-3 topic2" ></div>
								<div class="col-mid-3 topic3" ></div>
								<div class="col-mid-3 topic4" ></div>
		        <div class="image"></div>
				<div class="nam"><?php echo $topicname;?></div>
			</div>
			
			<div class=" row score" id = 'score'>
				<div class= "col-mid-4 num1"><?php if(isset($match['score_1']))
				{echo $match['score_1'];}else{echo "Not Played yet";}?></div>
				<div class="col-mid-4 title">SCORE</div>
				<div class ="col-mid-4 num2"><?php if(isset($match['score_2']))
				{echo $match['score_2'];}else{echo "Not Played yet";}?></div>
			</div>
			
			<div class="row play" id = 'play'>
				<button onclick = "window.location.href = 'playcard.php';"">PLAY</button>
			</div>
			<div class="row challenge" id = 'challenge'>
				<button><a  href = "challenge.php?from=<?php echo $user ;?>&to=<?php echo $opponent;?>&topic=<?php echo $topicname; ?>">CHALLENGE</a></button>
			</div>
	</div>
		
	</body>
	
</html>
