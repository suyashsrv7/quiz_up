<?php

	require("connection.php");

	$del_item = $_GET['del']; 
	$del_from = $_GET['sec'];
	echo $del_item ; 
	echo $del_from ;


	if($del_from == 'users')
		$query = "DELETE FROM `users` WHERE `scrname` = '$del_item'";
	else if($del_from == 'categories')
		$query = "DELETE FROM `categories` WHERE `category_name` = '$del_item'";
	else if($del_from == 'topics')
		$query = "DELETE FROM `topics` WHERE `topic_name` = '$del_item'";
	else if($del_from == 'question')
		$query = "DELETE FROM `questions` WHERE `question` = '$del_item'";
	$result = $conn->query($query);
	if($result == true)
	{
		header("Location:adminpage.php");
	}

?>