<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<h1>RESET PASSWORD</h1>
<div id="reset">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="password" name="reset" placeholder="enter new password."></input>
	<input type="submit" name="submit" value="reset"></input>
</form>

 <?php
 session_start();
 require("connection.php");
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['reset'])))
{
	$new=md5($_POST['reset']);
	$sname=$_SESSION['scrname']
$query="UPDATE `users` SET `password`='$new' WHERE `scrname`='tgupta'";
if($conn->query($query)==TRUE)
echo "<h3>NEW PASSWORD SET!</h3>";
else 
echo "error";
}



 ?>



</div>
</body>
</html>