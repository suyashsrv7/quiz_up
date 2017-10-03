<?php
  session_start();
  require("connection.php");

  if(isset($_SESSION['scrname']))
  {
    if($_SESSION['scrname'] != 'admin')
    {
      header("Location:log-in.php");
    }
  }
  else
  {
    header("Location:log-in.php");
  }
  
  $query = "SELECT * FROM `users` WHERE 1";
  $users = many_rows($query);
  $num_users = count($users);

  $query = "SELECT * FROM `categories` WHERE 1";
  $categories = many_rows($query);
  $num_categories = count($categories);
  $table1 = 'users';

  $query = "SELECT topics.topic_name, categories.category_name, categories.category_id FROM topics INNER JOIN categories ON topics.category_id=categories.category_id";
  $topics = many_rows($query);
  $num_topics = count($topics);

  $query = "SELECT questions.question, questions.option_1, questions.option_2,questions.option_3,questions.option_4,questions.answer,topics.topic_name FROM questions INNER JOIN topics ON questions.topic_id=topics.topic_id";
  $questions = many_rows($query);
  $num_questions = count($questions);



?>

<!DOCTYPE html>
<html>
<head>
	<title>AdminPage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="css/adminpage1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kalam" rel="stylesheet">
</head>
<body class="background" >
       <div class="row">
       	<!--address of icon-->
        <nav><a href="logout.php"><i class="fa fa-user-times back"></i></a>Admin<div class="logo"><img src="Qlogo.svg"></div></nav>

      <div class="box" id="user">
           <div class="col-mid-10 col-12 container1">
           <a href="#close"><i class="fa fa-arrow-left"></i></a>
    <table class="row">
    <tr>
      <th> IMAGE </th>
      <th> NAME </th>
      <th> SCRNAME </th>
      <th> EMAIL </th>
      <th>DELETE</th>
      
    </tr>


    <?php

      for($i = 0 ; $i < $num_users ; $i++ )
      {
        echo "<tr>";

        echo "<td><img src = '".$users[$i]['image']."' alt = '".$users[$i]['image']."' ></td>";

        echo "<td>".$users[$i]['firstname']." ".$users[$i]['lastname']."</td>";

        echo "<td>".$users[$i]['scrname']."</td>";

        echo "<td>".$users[$i]['email']."</td>";

        echo "<td><a href = 'delete.php?del=".$users[$i]['scrname']."&sec=users'><i class='fa fa-trash'></i></a></td>";

        

        echo "</tr>";

      }

    ?>
    
   </table  >
                                                            
           </div>
      </div>

      <div class="box" id="topic">
            <div class="col-mid-10 col-12 container2">
            <a href="#close"><i class="fa fa-arrow-left"></i></a>
              <table class="row">

        <tr>
          <th>Category Name</th>
          <th>Topic Name</th>
          <th>Delete</th>
        </tr>

        <?php

          for($i = 0 ; $i < $num_topics ; $i++ )
          {

            echo "<tr>";

            echo "<td>".$topics[$i]['category_name']."</td>";

            echo "<td>".$topics[$i]['topic_name']."</td>";

            echo "<td><a href = 'delete.php?del=".$topics[$i]['topic_name']."&sec=topics '><i class='fa fa-trash'></i></a></td>";

            echo "</tr>";
          }

        ?>
        
      </table>

            </div>
      </div>

      <div class="box" id="category">
            <div class="col-mid-10 col-12 container3">
            <a href="#close"><i class="fa fa-arrow-right" style="float: right;"></i></a>
             <table class="row" cellspacing="50">

        <tr >
          <th >Categories</th>
          <th>Delete Category</th>
          
        </tr>

        <?php

          for($i = 0 ; $i < $num_categories ; $i++ )
          {

            echo "<tr>";

            echo "<td>".$categories[$i]['category_name']."</td>";

            echo "<td><a href = 'delete.php?del=".$categories[$i]['category_name']."&sec=categories '><i class='fa fa-trash'></i></a></td>";

            echo "</tr>";
          }

        ?>
        
      </table>   
                                            
            </div>
      </div>

      <div class="box" id="questions">
            <div class="col-mid-10 col-12 container4">
            <a href="#close"><i class="fa fa-arrow-right" style="float: right;"></i></a>
             <table class="row">

        <tr>
          
          <th>Topic Name</th>
          <th>Qusetions</th>
          <th>Option 1</th>
          <th>Option 2</th>
          <th>Option 3</th>
          <th>Option 4</th>
          <th>Correct Answer</th>
          <th>DELETE</th>
        </tr>

        <?php

          for($i = 0 ; $i < $num_questions ; $i++ )
          {

            echo "<tr>";

            echo "<td>".$questions[$i]['topic_name']."</td>";

            echo "<td>".$questions[$i]['question']."</td>";

            echo "<td>".$questions[$i]['option_1']."</td>";

            echo "<td>".$questions[$i]['option_2']."</td>";

            echo "<td>".$questions[$i]['option_3']."</td>";

            echo "<td>".$questions[$i]['option_4']."</td>";

            echo "<td>".$questions[$i]['answer']."</td>";

            echo "<td><a href = 'delete.php?del=".$questions[$i]['question']."&sec=question'><i class='fa fa-trash'></i></a></td>";

            echo "</tr>";
          }

        ?>
        
      </table>
                                           
            </div>
      </div>

       	    <div class="col-mid-12 col-12">


                     <div class="col-mid-6 col-6 ">

       	    	  <div class=" user"> <a href="#user" style="text-decoration: none;color: white;"> User</a><div class="userNo"><?php echo $num_users; ?></div> </div> 
                     </div>
                     <div class="col-mid-6 col-6 ">
		       	    	    <div class=" category"> <a href="#category" style="text-decoration: none;color: white;">Category</a>
		       	    	   	<div class="categoryNo"><?php echo $num_categories ; ?></div> 
		       	    	   	<div class="addCategory"><a href = 'addnewcontent.php?content=categories'><i class="fa fa-plus-square"></i></a></div></div> 
                     </div>  
       	    </div>
       	    <div class="col-mid-12 col-12">
                    <div class="col-mid-6 col-6 ">	
		       	    	    <div class=" topic"><a href="#topic" style="text-decoration: none;color: white;">Topic</a>
		       	    	   	<div class="topicNo"> <?php echo $num_topics ; ?></div> 
		       	    	   	<div class="addtopic"><a href = 'addnewcontent.php?content=topics'><i class="fa fa-plus-square"></i></a></div>
		       	    	   </div> 
                     </div>
                     <div class="col-mid-6 col-6 ">
		       	    	    <div class=" questions"><a href="#questions" style="text-decoration: none;color: white;">Question</a>
		       	    	   	<div class="questionsNo"> <?php echo $num_questions; ?></div> 
		       	    	   	<div class="addCategory"><a href = 'addnewcontent.php?content=questions'><i class="fa fa-plus-square"></i></a></div>
		       	    	   </div>
                     </div>
       	    </div>	
       	    </div>
       </div>
</body>
</html>