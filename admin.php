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
        INSERT:-
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="radio" name="users"  > USER <br>
<input type="radio" name="topic" >TOPICS<br>
<input type="radio" name="questions" >QUESTIONS<br>
<input type="radio" name="matchup" >MATCHUP<br>
<input type="radio" name="challengerequest" >CHALLENGE_REQUEST<br>
<input type="radio" name="category" >CATEGORY<br>
<input type="submit" name="submit1"><br>
  
 </form>
 <?php
 if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit1']))
 {
  if(isset($_POST['users']))
  {

print("<td><form method='post' action="">
<input type='text' name='one'><br>
<input type='text' name='two'><br>
<input type='text' name='three'><br>
<input type='text' name='four'><br>
<input type='text' name='five'><br>
<input type='text' name='six'><br>
<input type='text' name='seven'><br>
<input type='text' name='eight'><br>
<input type='submit' name='submit2'>
</form>
</td>");

}

  if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit2']))
{
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
$four=$_POST['four'];
$five=$_POST['five'];
$six=$_POST['six'];
$seven=$_POST['seven'];
$eight=$_POST['eight'];

$query1 = "INSERT INTO `users`( `firstname`,`lastname`,`scrname`,`password`,`image`,`type`,`email`) VALUES ('$two','$three','$four','$five','$six','$seven','$eight')";


  if($conn->query($query1)==TRUE)
    echo "UPDATED SUCCESSFULLY";
  else
    echo "check";

}
  if(isset($_POST['topic']))
  {
    echo "ENTER VALUES:-
<form method='post' action=".<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>.">
<input type='text'name="one"><br>
<input type='text' name="two"><br>
<input type='text' name="three"><br>
<input type='submit' name="submit">
</form>";

  if(isset($_POST['questions']))
  header("Location:questions.php");
    if(isset($_POST['matchup']))
    header("Location:matchup.php");
    if(isset($_POST['challengerequest']))
      header("Location:challenge.php");
      if(isset($_POST['category']))
        header("Location:category.php");
    }
    ?>
 
     
</body>
</html>