<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="quiz_up";

	$conn=new mysqli($servername,$username,$password,$dbname);//opens a new connection to mySQL

	if($conn->connect_error)
		die("Connection Failed". $conn->connect_error);// prints a message and exits the current script

	

?>