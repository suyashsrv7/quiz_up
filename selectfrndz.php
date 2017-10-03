<?php
   session_start();
   require("connection.php");
   require("admin_query.php");
   if(!isset($_SESSION['topic']))
   {
        header("Location:playerprofile.php");
   }
   if(isset($_SESSION['scrname']))
   {
        if($_SESSION['scrname'] == 'admin')
        {
           header("Location:admin.php");
        }

  }
  else
  {
        header("Location:log-in.php");
  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>quiz up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/selectfrnd.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="png" href="Qlogo.png">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kalam" rel="stylesheet">
</head>
<body class="background">
		<div class="row" >
	    <nav><a href=""><i class="fa fa-arrow-left back"></i></a>Profile<div class="logo"><img src="Qlogo.svg"></div></nav>
        </div>
        <div class="row">
        	<div class="col-mid-12">
        		<div class="box">
        				<div class="select">Select Your Opponent</div>
                                        <?php
                                          for($i = 0;$i < $num_users;$i++)
                                          {
                                                echo "<div class='opponent'><a href = 'createsession.php?opponent=".$users[$i]['scrname']."'>".$users[$i]['scrname']."</a></div>";
                                          }
                                        ?>
        				
        			<div class="">
        		</div>
        	</div>
        </div>
</body>
</html>