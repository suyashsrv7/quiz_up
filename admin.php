<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
VIEW:-
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="radio" name="users"  > USER <br>
<input type="radio" name="topic" >TOPICS<br>
<input type="radio" name="questions" >QUESTIONS<br>
<input type="radio" name="matchup" >MATCHUP<br>
<input type="radio" name="challengerequest" >CHALLENGE_REQUEST<br>
<input type="radio" name="category" >CATEGORY<br>
<input type="submit" name="submit"><br>
</form>
<?php 
$result=null;
if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))
{
	if(isset($_POST['users']))
		$table="users";
	if(isset($_POST['topic']))
		$table="topics";
	if(isset($_POST['questions']))
		$table="questions";
		if(isset($_POST['matchup']))
		$table="matchup";
		if(isset($_POST['challengerequest']))
			$table="challenge_request";
			if(isset($_POST['category']))
				$table="categories";
$query="SELECT * FROM `$table` WHERE 1";
$result=$conn->query($query);

if ( ($result) && $result->num_rows > 0)
{
         while( $row = $result->fetch_assoc())
          {
            print_r($row);
            echo "<br/>";
          }
      }
  }
        ?>
        WORK ON:-
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="radio" name="users"  > USER <br>
<input type="radio" name="topic" >TOPICS<br>
<input type="radio" name="questions" >QUESTIONS<br>
<input type="radio" name="category" >CATEGORY<br>
<input type="submit" name="submit1"><br>
  
 </form>
 <?php
 if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit1']))
 {
  if(isset($_POST['users']))
    header("Location:users.php");
  if(isset($_POST['topics']))
  header("Location:topics.php");
  if(isset($_POST['questions']))
  header("Location:questions.php");
      if(isset($_POST['category']))
        header("Location:category.php");
    }
    ?>
 
     
</body>
</html>