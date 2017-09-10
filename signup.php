<?php require("process.php");?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styl.css"/>
		<script src="client_side_validation.js"></script>
	</head>
	<body>
		<!--SIGN UP FORM-->
		<div class="form-container">
			<form  action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data" name="myForm">
				<input class="input" type="text"     placeholder="Firstname" onfocus="delete_err_msg('error1');"  onblur="validateForm();" name="firstname" /><br/><span id="error1"></span><br/>
				<input class="input" type="text"     placeholder="Lastname" onfocus="delete_err_msg('error2');"  onblur="validateForm();"  name="lastname"  /><br/><span id="error2"></span><br/>
				<input class="input" type="text" 	 placeholder="Screen name" onclick="delete_err_msg('error3');" onblur="validateForm();" name="scrname" /><br/><span id="error3"></span><br/>
				<input class="input" type="text"     placeholder="Email"  onclick="delete_err_msg('error6');" onblur="validateForm();"     name="email"  /><br/><span id="error6"></span><br/>
				<input class="input" type="password" placeholder="Password" onclick="delete_err_msg('error4');" onblur="validateForm();"   name="password"  /><br/><span id="error4"></span><br/>
				<input class="input" type="password" placeholder="Confirm Password" onclick="delete_err_msg('error5');" onblur="validateForm();" name="cpassword" /><br/><span id="error5"></span><br/>
				
				<input class="input" type="file"  name="image" onclick="delete_err_msg('error7');" onblur="validateForm();" /><br/><span id="error7" ></span><br/>
 				<input class="submit-btn"  type="submit" value="Register" name="register" 	><br/>
                <span id="error"></span>
			
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