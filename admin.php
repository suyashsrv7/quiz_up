<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
#body
{
  background:url(th.jpg);
  background-size:cover;
}
#head
{height:100px;
  position:relative;
font-size:200%;
}
#text
{
  margin-left:500px;
  color:white;
  margin-top:30px;
  position:absolute;
}
#view
{
  background-color:cyan;
  font-style:italic;
  text-align:center;
  width:700px;
  margin-left:350px;
}
#work
{
  background-color:cyan;
  margin-top:100px;
  font-style:italic;
  text-align:center;
  width:700px;
  margin-left:350px;
}
.button
{
  color:white;
  background-color:grey;

}
</style>
	
</head>
<body id="body">
<div id="head">
<h1 id="text"><i>ADMIN PANEL</i></h1>
</div>
<div id="view">
<h1 style="color:purple">VIEW:-</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>
<td><input type="radio" name="users"  > USER <br><br></td>
<td><input type="radio" name="topic" >TOPICS<br><br></td>
<td><input type="radio" name="questions" >QUESTIONS<br><br></td>
<td><input type="radio" name="matchup" >MATCHUP<br><br></td>
<td><input type="radio" name="challengerequest" >CHALLENGE_REQUEST<br><br></td>
<td><input type="radio" name="category" >CATEGORY<br><br></td>
</tr>
</table>
<input class="button" type="submit" name="submit"><br>
</form>
</div>
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
  $row1=$result->fetch_assoc();
  foreach ($row1 as $key => $value) {
  echo"<th>".$key."</th>";
  }echo"<br>";
         while($row=$result->fetch_assoc())
         {
          foreach ($row as $key => $value)
           {
          
           echo"<td>".$value."</td>";

          }
          echo"<br>";

          
          }
      }
  }
        ?>
        <div id="work">
        <h1 style="color:purple;">WORK ON:-</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table>
    <tr>
<td><input type="radio" name="users"  > USERS <br><br></td>
<td><input type="radio" name="topics" >TOPICS<br><br></td>
<td><input type="radio" name="questions" >QUESTIONS<br><br></td>
<td><input type="radio" name="category" >CATEGORY<br><br></td>
</tr>


  </table>
  <input class="button" type="submit" name="submit1"><br>
 </form>
 </div>
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