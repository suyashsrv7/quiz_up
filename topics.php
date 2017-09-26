<?php
	session_start();
	require("connection.php");
	if(isset($_POST['name']))
	{
		$_SESSION['topics-name'] = $_POST['name'];
		header("Location:choosefrnz.php");
	}
	if(!isset($_SESSION['scrname']))
	{
		header("Location:log-in.php");
	}
	else
	{
		$query="SELECT * FROM `categories` WHERE 1";
		$categories = many_rows($query);
		$query = "SELECT * FROM `topics` WHERE 1";
		$topics = many_rows($query);
		echo "<form action='topics.php' method='post' name='form' id='form'>
		<input type='hidden' id='datain' name='name'>";
		for($i=0;$i<count($categories);$i++)//generator
		{
			echo "<div class='category'>
					<div class='name'>".$categories[$i]['category_name']."</div>";
				$j=0;$c=0;
		     	while(($c<=4) && ($j<count($topics)))
		     	{
		     		if($categories[$i]['category_id']==$topics[$j]['category_id'])
		     		 {
		     		 	echo "<div class='topic'></div>";
		     		 	$c++;
		     		 }
		     		 $j++;
		     	}
		     	$j=0;$c=0;
		     	while(($c<=4) && ($j<count($topics)))
		     	{
		     		if($categories[$i]['category_id']==$topics[$j]['category_id'])
		     		 {
		     		 	echo "<div class='topic-name' onclick='setsubmit(this)' id='".$topics[$j]['topic_name']."'>".$topics[$j]['topic_name']."</div>";
		     		 	$c++;
		     		 }
		     		 $j++;
		     	}
		     	
		     echo "</div>";	
		     echo "</form>";
				  
		}
		
	}
?>
<html>
	<head>
		<style type="text/css">
		body{
			background-color: #ffeecc;
			
		}
		.container{
			width:60%;
			margin:0 auto;
			position: relative;
			border: 1px solid black;
		}
		.category{
			height:170px;
			width:750px;
			margin:0 auto;
			background-color: #fff;
			
			margin-top:10px;
			
			border-radius: 4px;
			font-size: 20px;
		}
		.topic{
			height:90px;
			width:90px;
			border:1px solid black;
			display: inline-block;
			margin:10px 0 auto;
			margin-left:50px;
			border-radius: 4px
		}
		.topic:hover{
			background-color: #99ebff;

			
		}
		.name{
			height:25px;
			margin-left: 10px;
			
			margin-top: 10px;
			
			text-align: left;
        }
		.topic-name{
			height:20px;
			width:90px;
			border:1px solid #fff;	
			display: inline-block;
			
			margin-left:50px;
			font-size: 10px;
			text-align: center;
			cursor: pointer;

		}
		.topic-name:hover{
			cursor:hand;
		}
		</style>
	</head>
	<body>
		<script>
			function setsubmit(e)
			{
				e.id//topic name 
				form.name.value = e.id;
				document.getElementById('form').submit();
			}
		</script>

		
		<!--<div class="category" id="c1">
			<div class="name"><?php //echo $categories[0]['category_name']?></div>
			<div class="topic" id="t1"></div>
			<div class="topic" id="t2"></div>
			<div class="topic" id="t3"></div>
			<div class="topic" id="t4"></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
		</div>
		<div class="category" id="c2">
			<div class="name"><?php //echo $categories[1]['category_name']?></div>
			<div class="topic" id="t1"></div>
			<div class="topic" id="t2"></div>
			<div class="topic" id="t3"></div>
			<div class="topic" id="t4"></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php //echo $topics[0]['topic_name']?></div>
			<div class="topic-name"><?php// echo $topics[0]['topic_name']?></div>
		</div>-->
	</body>
</html>