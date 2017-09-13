<?php 

	session_start();
	require("connection.php");
	if(isset($_SESSION['scrname']))
	{
		$scrname = $_SESSION['scrname'];
		$query = "SELECT * FROM `users` WHERE `scrname`='$scrname'";
		$result = $conn->query($query);
		if($result && $result->num_rows != 0)
		{
			$row = $result->fetch_assoc();
			$gett = new get_value();
			$gett->get($row);
            echo $gett->firstname;
            echo $gett->image;
		}
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
		<title></title>
	</head>
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="submit" name="logout" vlaue="button">
	    </form>
	</body>
	</html>