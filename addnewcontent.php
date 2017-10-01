<?php
	require("connection.php");
	require("admin_query.php");
	$content = $_GET['content'] ; 

	if( isset($_POST['ADD']) && ($content == 'categories') )
	{
	    $item = $_POST['category'];
		$query = "INSERT INTO `categories`(`category_name`) VALUES ('$item')";
		$result = $conn->query($query);
		if($result)
		{
			header("Location:admin.php");
		}
		else
		{
			
		}
	}
	else
	{
		echo "please fill the field";
	}

	

?>

<!DOCTYPE html>
<html>
<head>
	<script>

		window.addEventListener("DOMContentLoaded", function() {
        
        if( <?php if($content == 'categories'){echo true;} else{echo 0;}?> )
        {
        	showcategories();
        }

        if(<?php if($content == 'topics'){echo true;} else{echo 0;}?> )
        {
        	showtopics();
        }

        if(<?php if($content == 'questions'){echo true;} else{echo 0;}?> )
        {
        	showquestions();
        }

        }, false);

		function showcategories()
		{
			document.getElementById('add-topic').style.display = 'none';
			document.getElementById('add-question').style.display = 'none';
		}
		function showtopics()
		{
			document.getElementById('add-category').style.display = 'none';
			document.getElementById('add-question').style.display = 'none';
		}
		function showquestions()
		{
			document.getElementById('add-topic').style.display = 'none';
			document.getElementById('add-category').style.display = 'none';
		}
	</script>
	<title></title>
</head>
<body>

	<form action = '' method = 'post' name = 'myform'>
		
		<div id = 'add-category'>

			<label>Category Name:</label>
			<input type = "text" name = "category">
			
			
		</div>

		<div id = 'add-topic'>

			<select name = 'category'>

			<?php

				for($i = 0 ; $i < $num_categories ; $i++ )
				{
					echo "<option>".$categories[$i]['category_name']."</option>";

				}

			?>

			</select>
			<label>Topic Name:</label>
			<input type = "text" name = "topic">

			
		</div>

		<div id = 'add-question'>

			<select name = 'topic'>

			<?php

				for($i = 0 ; $i < $num_topics ; $i++ )
				{
					echo "<option>".$topics[$i]['topic_name']."</option>";

				}

			?>

			</select>
			<textarea form = 'myform' name = 'question' placeholder = 'add question here'></textarea>
			<input type="text" name="option1" placeholder = 'option1'>
			<input type="text" name="option2" placeholder = 'option2'>
			<input type="text" name="option3" placeholder = 'option3'>
			<input type="text" name="option4" placeholder = 'option4'>
			<select name = 'answer'>
				<option value = 'option1'>option1</option>
				<option value = 'option2'>option2</option>
				<option value = 'option3'>option3</option>
				<option value = 'option4'>option4</option>
			</select>

			
		</div>


		<input type = 'submit' name = 'add' value = 'ADD'>
		
	</form>

</body>
</html>