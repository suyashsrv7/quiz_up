<?php

session_start();
require("connection.php");
require("admin_query.php");
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

$userinfo = new get_value();
$scrname = $_SESSION['scrname'];
$query = "SELECT * FROM `users` WHERE `scrname`='$scrname'";
if(run_query($query))
       $userinfo->get(run_query($query));
$query = "SELECT * FROM `challenge_request` WHERE `toid` = '$userinfo->id'";
$challenges = many_rows($query);//returns all requests
?>

<!DOCTYPE html>
<html>
<head>
	<title>player profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/pprofile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="png" href="Qlogo.png">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kalam" rel="stylesheet">
</head>
<body class="background">
	<div class="row" >
	<nav><a href=""><i class="fa fa-arrow-left back"></i></a>Profile<div class="logo"><img src="Qlogo.svg"></div></nav>
     </div>
      <div class="row">
      			<div class="col-mid-7  pic">
      				<div class="profile"><img src='<?php echo $userinfo->image;?>' alt='IMAGE'></div>
      				<div class="name"><?php echo $userinfo->scrname ;?></div>
      				<div class="xp"><?php echo $userinfo->xp ?></div>
      			</div>
      			
      			<div class="col-mid-5 request">
                              <?php
                                    if($challenges == false)
                                    {
                                          echo "NO REQUESTS YET";
                                    }
                                    else
                                    {
                                          for($i = 0; $i < count($challenges) ; $i++)
                                          {
                                                $fromid = $challenges[$i]['fromid'];
                                                $query = "SELECT  `scrname` FROM `users` WHERE `id` = '$fromid'";
                                                $challenger = run_query($query);
                                                echo "<div class='request1'>".$challenges[$i]['topic_name']."</div>
                                                      <div class='request2'>".$challenger."</div>
                                                      <a href=''><div class='button'></div></a>";
                                          }
                                    }
                              ?>
      				
                             
                              
      				
      			</div>
      </div>
      <div class="row">
      			<div class="col-mid-12  category">
      				
                              <?php
                              for($i = 0;$i < $num_categories; $i++ )
                              {
                                    echo "<table>
                                          <th>".$categories[$i]['category_name']."</th><tr>";

                                          for($j = 0;$j < $num_topics;$j++)
                                          {
                                                if($categories[$i]['category_id'] == $topics[$j]['category_id'])
                                                {
                                                      echo "<td><a href = ''>".$topics[$j]['topic_name']."</a></td>";
                                                }
                                          }

                                    echo  "</tr></table>";
                              }

                              ?>

      					<div class="selection"></div>
      			
      			</div>
      </div>
</body>
</html>