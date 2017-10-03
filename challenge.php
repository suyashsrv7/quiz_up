<?php
	require("connection.php");
	if(isset($_GET['from']) && isset($_GET['to']) && isset($_GET['topic']))
	{
		$from = $_GET['from'];
		$to = $_GET['to'];
		$topic_name = $_GET['topic'];
		$query = "SELECT `id` FROM `users` WHERE `scrname` = '$from'";
		$row = run_query($query);
		$fromid = $row['id'];
		$query = "SELECT `id` FROM `users` WHERE `scrname` = '$to'";
		$row = run_query($query);
		$toid = $row['id'];
		$query = "INSERT INTO `challenge_request`( `fromid`, `toid`, `topic_name`, `status`) VALUES ('$fromid','$toid','$topic_name','0')";
		$result = $conn->query($query);
		$last_id = $conn->insert_id;
		$_SESSION['challengeid'] = $last_id;

		if($result == true)
		{
			header("Location:playcard.php");
		}
	}
	else
	{
		header("Location:playerprofile.php");
	}

?>