<?php 

	session_start();
	require("connection.php");
	$gett = new get_value();
	if(isset($_SESSION['scrname']))
	{
		$scrname = $_SESSION['scrname'];
		$query = "SELECT * FROM `users` WHERE `scrname`='$scrname'";
		if(run_query($query))
			$gett->get(run_query($query));
		else
			echo "wrong";//change
        $query ="SELECT * FROM `user_medals` WHERE `user_id`='$gett->id'";
        if(run_query($query))
			$gett->get(run_query($query));
		else
			echo "wrong";//change
		
    }
	else
	{
		header("Location:log-in.php");
	}
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("Location:log-in.php");
	}
	
?>
<html>
	<head>
	<style>
	*{
		background-color: #e1e1e1;
		font-size: 22px;
		font-weight: bolder;
	}
	</style>	
	</head>
	<body>
		
		<span><?php echo $gett->firstname ;?></span><br/>
		<span><?php echo $gett->lastname ;?></span><br/>
		<span><?php echo $gett->email;?></span><br/>
		<span><?php echo $gett->image ;?></span><br/>
		<span><?php echo $gett->id;?></span><br/>
		<span><?php echo $gett->badge;?></span><br/>
		<span><?php echo $gett->xp;?></span><br/>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<input type="submit" name="logout" value="logout">
	</form>

	</body>
</html>