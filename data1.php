<?php
session_start();
require("connection.php");
//require("data.php");
	$topic = $_SESSION['topics-name'];
	$query = "SELECT `topic_id` FROM `topics` WHERE `topic_name` = '$topic'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	
	$topic_id=$row['topic_id'];
	$query = "SELECT * FROM `questions` WHERE `topic_id` = '$topic_id'";
	$questions = many_rows($query);
	
	 $i = 1;
	 echo $questions[$i]['option_1'];
	 if($i<=2)
	 	$i++;
	
?>
