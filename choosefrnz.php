<?php
  session_start();
	if(!isset($_SESSION['topics-name']))
	{
		echo "<script>alert('choose the topic first');</script>";
		header("Location:topics.php");
	}
	else{
		echo "topic chosen was ".$_SESSION['topics-name'];
	}
	
?>
<html>
	<head>
		<style>
		body{
			background-color: #ffeecc;
		}
		

		
		</style>
	</head>
	<body>

	</body>
</html>