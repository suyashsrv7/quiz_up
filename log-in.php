<?php require("process.php");?>
<html>
	<head>
	</head>
	<body>
		<div class="form-container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" name="scrname" placeholder="scrname" ><?php echo $uname1?><br>
            	<input type="password" name="password"  placeholder="password"><?php echo $password1?><br/>
            	<input type="submit" name="login" value="LOGIN"><br>
			</form>
			
		</div>
	</body>

</html>