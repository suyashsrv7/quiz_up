
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styl.css"/>
	</head>
	<body>
		<!--SIGN UP FORM-->
		<div class="form-container">
			<form action="validation.php" method="post" enctype="multipart/form-data">
				<input class="input" type="text" placeholder="Firstname" name="firstname" required/><br/>
				<input class="input" type="text" placeholder="Lastname" name="lastname" required/><br/>
				<input class="input" type="text" placeholder="Screen name" name="scrname" required/><br/>
				<input class="input" type="password" placeholder="Password" name="password" required/><br/>
				<input class="input" type="password" placeholder="Confirm Password" name="cpassword" required/><br/>
				<input class="input" type="file"  name="image" required/><br/>
				<input class="input" type="text" placeholder="Email" name="email" required/><br/>
				<input class="submit-btn" type="submit" value="Register" name="register"><br/>
			</form>
		</div>

		<!--LOGIN PAGE-->
		<!--<div class="form-container">
			<form>
				<input class="input" type="text" placeholder="Username" name="scrname" requied/>
				<input class="input" type="password" placeholder="Username" name="scrname" required/>
				<input class="input" type="text" placeholder="Username" name="scrname" required/>
				<input class="input" type="text" placeholder="Username" name="scrname" required/>
				<input class="submit-btn" type="submit" value="Login" name="submit">
			</form>
		</div>-->

	</body>

</html>