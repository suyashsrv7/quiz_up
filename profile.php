<?php 

	session_start();
	require("connection.php");
	
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
	}
	else
	{
		header("Location:log-in.php");
	}
	
	
?>
<html>
	<head>
	<style>
	*{
		
		
		padding:0;
		margin:0;
	}
	body{
		background-color: #ffeecc;
	}
	.nav{
		height:40px;
		width:100%;
		background-color: #fff;
		text-align: center;
		margin-bottom: 6px;
	}
	.container{
		background-color: #1f1f14;
		height:500px;
		width:100%;
		position: relative;
    }
	.profile{
		position: absolute;
		top:20px;
		left:20px;
		width:500px;
		height:200px;
	}
	.image{
		width:150px;
	}
	.name-container{
		position: absolute;
		top:0px;
		left:170px;

	}
	h1{
		color:#fff;
	}
	li{
		list-style-type: none;
	    display: block;
	    margin-top: 0.8%;
	    
    }
    li.home{float: left;
    	margin-right: 100px}
    li.topics{float: left;}
    li.logout{float: right;
    	margin-right: 100px}
    
    a{
    	 text-decoration: none;
    	 color: black;
    	 background-color: #fff;

    }

	</style>	
	</head>
	<body>
		<div class="nav">
			<ul>
				<li class="home"><a href="#">HOME</a></li>
				<li class="topics"><a href="topics.php">TOPICS</a></li>
				<li class="logout"><a href="logout.php">LOGOUT</a></li>
				
			</ul>
		</div>
		<div class="container">
			<div class="profile">
				<div class="image"><img src="<?php echo $gett->image;?>" style="height:150px;width:150px"></div>
				<div class="name-container"><h1><?php echo $gett->firstname." ".$gett->lastname ;?></h1></div>
			</div>
		</div>
		
		
	
	</body>
</html>