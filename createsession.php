<?php
session_start();
if(isset($_GET['topic']) && isset($_GET['opponent']))
{
	$_SESSION['topic'] = $_GET['topic'];
	$_SESSION['opponent'] = $_GET['opponent'];
	unset($_GET['topic']);
	unset($_GET['opponent']);
	$_SESSION['accept'] = 'accept';
	if(isset($_SESSION['challenge']))
	{
		unset($_SESSION['challenge']);
	}
	echo "wrong";
	header("Location:quizplay.php");

}
else if(isset($_GET['topic']))
{
	$_SESSION['topic'] = $_GET['topic'];
	unset($_GET['topic']);

	header("Location:selectfrndz.php");
}
else if(isset($_GET['opponent']))
{
	$_SESSION['opponent'] = $_GET['opponent'];
	unset($_GET['opponent']);
	$_SESSION['challenge'] = "challenge";
	if(isset($_SESSION['accept']))
	{
		unset($_SESSION['accept']);
	}
	echo $_SESSION['challenge'];
	header("Location:quizplay.php");
}
?>