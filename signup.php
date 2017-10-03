<?php
require("process.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<title></title>
</head>
<body class="background row">
        <script src="client_side_validation.js"></script>
		<svg viewbox="0 0 800 800"><polyline points ="0,0 1,20 20,20 20,40 60,40 60,80 120,80 120,100 180,100 180,300 600,300 600,320 800,320" style="fill: none;stroke:#6ecfef; stroke-width:1.6;" />
		<polyline points =" 0,0 10,0 10,30 30,30 30,50 70,50 70,90 130,90 130,110 190,110 190,310 800,310" style="fill: none;stroke:#f7f9d6; stroke-width:.8;" />
		<polyline points =" 600,110 600,30 600,40 620,40 600,40 600,48 610,48 " style="fill: none;stroke:#f7f9d6; stroke-width:5 ;" />
		<polyline points =" 640,103 640,50 640,60 660,60 640,60 640,68 650,68 " style="fill: none;stroke:#f7f9d6; stroke-width:5 ;" />
		<circle id="circle" cx="600" cy="100" r="30" style="fill: none;stroke:#bfe2f3; stroke-width:1;" />
		<circle id="circle1" cx="600" cy="100" r="10" style="fill: none;stroke: #1c77a1; stroke-width:4;" />
		<animate xlink:href="#circle" attributeName="stroke-width" from="1" to="4" dur="2s"  repeatCount="indefinite" />
		<animate xlink:href="#circle1" attributeName="stroke-width" from="4" to="6" dur="2.2s"  repeatCount="indefinite" />
		<circle id="circle2" cx="640" cy="100" r="20" style="fill: none;stroke:#bfe2f3; stroke-width:1;" />
		<circle id="circle3" cx="640" cy="100" r="5" style="fill: none;stroke:#1c77a1; stroke-width:4;" />
		<animate xlink:href="#circle2" attributeName="stroke-width" from="1" to="4" dur="2.5s"  repeatCount="indefinite" />
		<animate xlink:href="#circle3" attributeName="stroke-width" from="4" to="6" dur="3s"  repeatCount="indefinite" />
	</svg>
		<div><?php echo $error; ?></div>
	    <div class="box col-10 col-mid-10">	
	    				
	    					
						    <div class=" RegisterOPTION">New here ??

						    	<form  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onblur="validateForm();"  enctype="multipart/form-data" name="myForm">
									<input class="firstname" name="firstname" onfocus="delete_err_msg('error1');" onblur="validateForm();" placeholder="FIRST NAME"></input><span id="error1"></span><br/>
									<input class="lastname" name="lastname" onfocus="delete_err_msg('error2');" onblur="validateForm();" placeholder="LAST NAME"></input><span id="error2"></span><br/>
									<input class="username" name="scrname" onfocus="delete_err_msg('error3');" onblur="validateForm();" placeholder="USER NAME"></input><span id="error3"></span><br/>
									<input class="password" name="password" onfocus="delete_err_msg('error4');" onblur="validateForm();" type="password" placeholder="PASSWORD"></input><span id="error4"></span><br/>
									<input class="Confirmpassword" name="cpassword" onfocus="delete_err_msg('error5');" onblur="validateForm();" type="password" placeholder="CONFIRM PASSWORD"></input><span id="error5"></span><br/>
									<input class="email" name="email" onfocus="delete_err_msg('error6');" onblur="validateForm();" placeholder="E-MAIL"></input><span id="error6"></span><br/>
									<input class="file" name="file" onfocus="delete_err_msg('error7');" onblur="validateForm();" type="FILE" placeholder="FILE"></input><span id="error7"></span><br/>
									<input class="register1" type="submit" name="register" value="REGISTER" ></input> 

								</form>
						    </div>
						    <div><?php echo $error; ?></div>
						    
	    </div>

</body>
</html>