<?php
require("process.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="css/log.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<title></title>
</head>
<body class="background row">
        
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
		
	    <div class="box col-10 col-mid-10">	
	    				    <div class="welcome"> <h1>Welcome</h1> </div>
	    					<div class="login">
	    						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
						    	<input class="username"  name="scrname" placeholder="USER NAME"></input><span id = 'login_error1'><?php echo $uname1 ; ?></span>
									<input class="password" type="password" name="password" placeholder="PASSWORD"></input><span id = 'login_error2'><?php echo $password1 ; ?></span>
									<input class="loggin" type="submit" name="login" value="LOGIN" ></input></form>
						    </div>
						    			<div class="link">
						    				<p onclick="window.location.href='signup.php'">New User|Register</p>
											<a href="PHPmail/sendmail.php"> FORGOT PASSWORD</a>
										</div>

						    
						    
	    </div>


</body>
</html>