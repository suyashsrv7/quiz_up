<?php
require("connection.php");
static $x=10;
$query="SELECT * FROM `users` WHERE `id`='$x++'";
$result=$conn->query($query);

if ( ($result) && $result->num_rows > 0)
{
	$row=$result->fetch_assoc();
	print_r($row);
}
else
{
	echo "error";
}
?>
