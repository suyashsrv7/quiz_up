<?php
session_start();
require("connection.php");
	$topic = $_SESSION['topics-name'];
	$query = "SELECT `topic_id` FROM `topics` WHERE `topic_name` = '$topic'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	
	$topic_id=$row['topic_id'];
	$query = "SELECT * FROM `questions` WHERE `topic_id` = '$topic_id'";
	$questions = many_rows($query);
	
	 $i = rand(0,1);
	 echo $questions[$i]['question']."[BRK]".$questions[$i]['option_1']."[BRK]".$questions[$i]['option_2']."[BRK]".$questions[$i]['option_3']."[BRK]".$questions[$i]['option_4'];

	
?>
