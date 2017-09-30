<?php

	require("connection.php");

	if(isset($_SESSION['scrname']))
	{
		if($_SESSION['scrname'] != 'admin')
		{
			header("Location:log-in.php");
		}
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
	<style>

		button{

			float:right;

		}
		div.section{

			border:1px solid black;
			padding:5px;
			width: 100px;
			text-align: center;

		}
		.section:hover{

			cursor:pointer;

		}
		table,th,td{

			border:1px solid black;
			
		}
		img{

			height:50px;
			width:50px;

		}

    </style>
	<title> welcome admin </title>

	<script type="text/javascript">

		function logout()
		{
			window.location.href = "logout.php";
		}
		
	</script>
</head>
<body>

	<button onclick = 'logout()'>logout</button>

	<div id = 'content1'>

		<p><div class = 'section' >USERS</div>      : <?php echo $num_users ; ?></p>

		<p><div class = 'section'>CATEGORIES</div> : <?php echo $num_categories ; ?></p><a href = 'addnewcontent.php?content=categories'>Add new category</a>

		<p><div class = 'section'>TOPICS</div>     : <?php echo $num_topics ; ?></p><a href = ''>Add new topic</a>

		<p><div class = 'section'>QUESTIONS</div>  : <?php echo $num_questions; ?></p><a href = ''>Add new question</a>

   </div> 

   <div id = 'users-section'>

   <table>
   	<tr>
	   	<th> IMAGE </th>
	   	<th> NAME </th>
	   	<th> SCRNAME </th>
	   	<th> EMAIL </th>
	   	<th></th>
	   	<th></th>
	   	
    </tr>


   	<?php

   		for($i = 0 ; $i < $num_users ; $i++ )
   		{
   			echo "<tr>";

   			echo "<td><img src = '".$users[$i]['image']."' alt = '".$users[$i]['image']."' ></td>";

   			echo "<td>".$users[$i]['firstname']." ".$users[$i]['lastname']."</td>";

   			echo "<td>".$users[$i]['scrname']."</td>";

   			echo "<td>".$users[$i]['email']."</td>";

   			echo "<td><a href = 'delete.php?del=".$users[$i]['scrname']."&sec=users'>DELETE</a></td>";

   			

   			echo "</tr>";

   		}

   	?>
   	
   </table>

   </div>

   <div id = 'category-section'>

   		<table>

   			<tr>
   				<th>Categories</th>
   				<th>Delete Category</th>
   				
   			</tr>

   			<?php

   				for($i = 0 ; $i < $num_categories ; $i++ )
   				{

   					echo "<tr>";

   					echo "<td>".$categories[$i]['category_name']."</td>";

   					echo "<td><a href = 'delete.php?del=".$categories[$i]['category_name']."&sec=categories '>DELETE</a></td>";

   					echo "</tr>";
   				}

   			?>
   			
   		</table>



   </div>

   <div id = 'topic-section'>

   		<table>

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

   					echo "<td><a href = 'delete.php?del=".$topics[$i]['topic_name']."&sec=topics '>DELETE</a></td>";

   					echo "</tr>";
   				}

   			?>
   			
   		</table>



   </div>

   <div id = 'question-section'>

   		<table>

   			<tr>
   				
   				<th>Topic Name</th>
   				<th>Qusetions</th>
   				<th>Option 1</th>
   				<th>Option 2</th>
   				<th>Option 3</th>
   				<th>Option 4</th>
   				<th>Correct Answer</th>
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

   					echo "<td><a href = 'delete.php?del=".$questions[$i]['question']."&sec=question'>DELETE</a></td>";

   					echo "</tr>";
   				}

   			?>
   			
   		</table>



   </div>



</body>
</html>