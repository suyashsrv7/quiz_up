<?php 

	session_start();
	require("connection.php");
	if(isset($_POST['name']))
	{
		$_SESSION['topics-name'] = $_POST['name'];
		header("Location:choosefrnz.php");
	}
	if(isset($_POST['friend']))
	{
		
		$_SESSION['friend'] = $_POST['friend'];
		$_SESSION['accept'] = 'accept';
		$_SESSION['challengeid'] = $_POST['challengeid'];
		$id = $_POST['challengeid'];
		echo $id;
		$query = "SELECT  `topic_name` FROM `challenge_request` WHERE `challenge_id` = `$id`";
		$row = run_query($query);
		$_SESSION['topics-name'] = $row['topic_name'];
		echo $row['topic_name'];
		//header("Location:quizplay.php");
	}
	if(isset($_SESSION['scrname']))
	{
		if($_SESSION['scrname'] == "admin")
			header("Location:admin.php");
		
		$scrname = $_SESSION['scrname'];
		$query = "SELECT * FROM `users` WHERE `scrname`='$scrname'";
		if(run_query($query))
			$gett->get(run_query($query));
		else
			echo "wrong";//change
        $query ="SELECT * FROM `user_medals` WHERE `user_id`='$gett->id'";
        if(run_query($query))
			$gett->get(run_query($query));
		$query = "SELECT * FROM `challenge_request` WHERE `toid` = '$gett->id'";
		$challenges = many_rows($query);//returns all requests
		

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
		background-color: #eed9f4;
	}
	.nav{
		height:40px;
		width:100%;
		background-color: #5f077a;
		text-align: center;
		margin-bottom: 6px;
	}
	.container{
		background-color: #1f1f14;
		height:200px;
		width:90%;
		position: relative;
		margin :20px auto;
    }
	.profile{
		position: absolute;
		top:0px;
		left:20px;
		width:500px;
		height:200px;
	}
	.image{
		position: absolute;
		top:20px;
		width:150px;
		border-radius:10px;

	}
	.image img{
		border-radius:10px;
	}
	.name-container{
		position: absolute;
		top:20px;
		left:170px;

	}
	.scrname{
		position: absolute;
		top:70px;
		left:170px;
		color:#fff;
	}
	.request-box{
		min-height:200px;
	}
	.xp{
		width:25px;
		height:10px;
		position: absolute;
		top:100px;
		left:170px;
		color:#fff;

	}
	.xp-display{
		width:150px;
		height:10px;
		position: absolute;
		top:103px;
		left:210px;
		border:1px solid #fff;
		border-radius: 2px;
	}
	#color{
		background-color: #13c113;
		height:9px;
	}
	#xp1{
		position: absolute;
		top:101px;
		left:363px;
		height:10px;
		color:#fff;
	}
	#badge{
		position: absolute;
		top:130px;
		left:170px;
		color:#fff;
	}
	#request-box{
		background-color: #fff;
	    height:195px;
		width:90%;
		position: relative;
		margin :20px auto;

	}
	.requests{
		background-color:#ece8ff;
		height:150px;
		width:370px;
		margin-top:25px;
		margin-left:29px;
		display: inline-block;

	}
	.status{
		width:150px;
		height:30px;
		border-radius: 6px;
		margin-left:110px;
		margin-top:15px;
		border:none;
		display: inline-block;


	}
	.req{
		width:300px;
		height:80px;
		margin-left: 35px;
		margin-top:15px;
		border: 1px solid black;
		text-align: center;
		border-radius:5px;
		background-color: #e5c0df;
		padding-top: 10px;

	}
	button{
		width:150px;
		height:30px;
		border-radius: 6px;
		display: inline-block;
		border: none;
		background-color: #eed9f4;
		font-size: 16px;
		border:1px solid black;
		cursor: pointer;

	}
	button:hover{
		background-color: #5f077a;
	}
	#no-req{
		text-align: center;
		font-family: courier;

	}
	.followed{
		background-color: #fff;
	    height:195px;
		width:90%;
		position: relative;
		margin :20px auto;
		text-align: center;


	}
	.box{
		height:150px;
		width:120px;
		border:1px solid black;
		margin: 25px auto;
		display: inline-block;
		margin-left: 10px;
	}
	.topic-img{
		height:120px;
		width:120px;
		border:1px solid black;
	}
	.topic-name{
		height:30px;
		width:120px;
		border:1px solid black;
	}
	h3{
		padding-top: 90px;
	}
	h1{
		color:#fff;
	}
	h4{
		font-family: courier;
		margin-top: 2px;
		margin-left: 4px;
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
    	 background-color: #5f077a;
    	 color: #f5eff7;

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
				<div class="scrname"><h5><?php echo $gett->scrname ;?></h5></div>
				<div class="xp"><h5><?php echo $gett->xp ;?></h5></div>
				<div class= "xp-display"><div id="color"></div></div>
				<div id ="xp1"><h6>xp</h6></div>
				<div id = "badge">"<?php echo $gett->badge ;?>"</div>
				<form name = 'form' id = 'form' action = "profile.php" method= "post">
				<input type = 'hidden' name = 'topic' >  
                </form>
                <form method = 'post' action = 'profile.php' id= 'form1' name = 'form1'>
                	
                	<input type = 'hidden' name = 'friend'>
                	<input type = 'hidden' name = 'challengeid'>
                </form>
				
			</div>
		</div>
		<div id= "request-box" >
			<?php
				
				if($challenges == false)
				{
					echo "<div id = 'no-req'><h3>NO REQUESTS YET.</h3></div>";

				}
				else
				{
					$i = 0;
					while(($i < count($challenges)) && ($i < 3))
					{
						echo "<div class = 'requests'>";
						$fromid = $challenges[$i]['fromid'];
						$query = "SELECT  `scrname` FROM `users` WHERE `id` = '$fromid'";
						$challenger = run_query($query);

						echo "<div class = 'req' >
							<h4>Request from <strong>'".$challenger['scrname']."'<strong></h4>
							<h4>Topic : ".$challenges[$i]['topic_name']."</h4>
						</div>
						<div class = 'status' id = '".$challenges[$i]['challenge_id']."' onclick = 'play(this.id);'>Accept</div>
						</div>";
						$i++;
					}
				}
			?>
		</div>

		<div class = "followed">
			<?php
				$query = "SELECT * FROM `followed_topics` WHERE `user_id` = '$gett->id'";
				$followed = many_rows($query);
				$i = 0;
				if($followed == false)
				{
					echo "<h3>NO FOLLOWED TOPICS</h3>";

				}
				else
				{

					while(($i < 5) && ($i <count($followed)))
					{
					echo "<div class = 'box' >
					<div class = 'topic-img'></div>
					<div id = '".$followed[$i]['topic_name']."class = 'topic-name' onclick = setsubmit(this)>".$followed[$i]['topic_name']."</div>
					</div>";$i++;
					}
				}

			?>
		</div>

		
		
	
	</body>
	<script>document.getElementById('color').style.width = <?php echo $gett->xp/10; ?> + "px" ;
						function setsubmit(e)
						{
							form.elements['topic'].value = e.id;
							document.getElementById('form').submit();

						}
						function play(e)
						{
							console.log(e);
							
							form1.elements['friend'].value = "<?php echo $challenger['scrname'] ;?>";
							form1.elements['challenegeid'] = e;
							
							document.getElementById('form1').submit();
						}
				</script>
</html>