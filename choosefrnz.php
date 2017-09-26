<?php

  session_start();
  require("connection.php");
    if(isset($_POST['name']))
    {
    	$_SESSION['friend'] = $_POST['name'];
    	header("Location:quizplay.php");
    }
	if(!isset($_SESSION['topics-name']))
	{
		echo "<script>alert('choose the topic first');</script>";//handle this error 
		header("Location:topics.php");
	}
	else{
		echo "<form name='form' id='form' action='choosefrnz.php' method='post'>
		<input type='hidden' name='name' value='' id='datain'>";
		echo "<div class='friends'>
		<div class='title'>SELECT AMONG FRIENDS</div></div>";

		
		echo "<div class='random'>
		<div class='title'>SELECT RANDOMLY</div>";
		$query = "SELECT * FROM `users` WHERE 1";
		$rows = many_rows($query);
		for($i=0;$i<count($rows);$i++)
		{
			echo "<div class='box'>
			<div class='image-box'><img src=".$rows[$i]['image']."></div>
			<div class='name-box' onclick='setsubmit(this)' id='".$rows[$i]['scrname']."'>".$rows[$i]['scrname']."</div>
		    
			</div>";
		}
		echo "</div>";
	}
	
?>
<html>
	<head>
		<style>
		body{
			background-color: #ffeecc;
		}
		.friends{
			background-color: #fff;
			min-height: 150px;
			width:750px;
			position: relative;
			margin:30px auto;
			border-radius:4px;
		}
		.title{
			position: absolute;
			width:740px;
			height:30px;
			border: 1px solid #fff;
			margin-left: 5px;
			margin-top:2px;
			margin-bottom:20px;

		}
		.random{
			background-color: #fff;
			min-height: 260px;
			width:750px;
			border-radius:4px;
			margin:0 auto;
		
		}
		.box{
			min-height: 130px;
			width:120px;
			border:1px solid #fff;
			display:inline-block;
			margin-top:32px;
			margin-left:23px;
			position: relative;

		}
		.image-box{
			height:90px;
			width:90px;
			border-radius: 50%;
			border: 1px solid #999;
			margin:10px auto;
		}
		.name-box{
			height:15px;
			width:120px;
			border: 1px solid #888;
			text-align: center;
			font-size:12px;
			background-color:  #ffeecc;
			border-radius: 7%;
		}
		img{
			height:90px;
			width:90px;
			border-radius: 50%;

		}
		.name-box:hover{
			cursor:pointer;
		}
		

		
		</style>
	</head>
	<body>
		<script>
		function setsubmit(e){
			form.name.value = e.id;
			document.getElementById('form').submit();
		}
		</script>

	</body>
</html>