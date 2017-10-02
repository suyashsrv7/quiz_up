<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="admin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
</head>

<body class="background">

          <div class="row "><nav><h1>ADMIN</h1></nav></div>
          
          <div class="star0"><img src="star.svg"></div>
                <div class="star1"><img src="star.svg"></div>
                <div class="star2"><img src="star.svg"></div>
                <div class="star3"><img src="star.svg"></div>

    <div class="row">
          <div class="col-mid-3  container1" > 
            <div class="photo "></div> 
          </div>

          <div class="col-mid-9 col-12 container2" >
                <div class=" col-mid-10 name"><h3>name</h3></div>
                <div class=" col-mid-10 emailid"><h3>EMAIL id</h3></div> 
          </div>

    </div>
           <div class="row">
                  <div class="col-mid-12 col-12 container3" >
                  <div class="view"><h1>VIEW:-</h1></div>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <table class="row options">
                  <tr>
                  <td ><input  type="radio" name="users" > USER<br><br></td>
                  <td ><input type="radio" name="topic" >TOPICS<br><br></td>
                  <td ><input type="radio" name="questions" >QUESTIONS<br><br></td>
                  <td ><input type="radio" name="matchup" >MATCHUP<br><br></td>
                  <td ><input type="radio" name="challengerequest" >CHALLENGE_REQUEST<br><br></td>
                  <td ><input type="radio" name="category" >CATEGORY<br><br></td>
                  </tr>
                  </table>
                  <input class="button" type="submit" name="submit"><br>
                  </form>
                  </div>
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
  echo "<div class='row'>";
  echo "<table class=' col-mid-12 table1' border='1'>
  <tr class='row1'>";
  foreach ($row1 as $key => $value) {
  echo"<th class='head1'>".$key."</th>";
  }
  echo"</tr>";
  
         while($row=$result->fetch_assoc())
         {echo "<tr>";
          foreach ($row as $key => $value)
           {
          
           echo"<td class='delement'>".$value."</td>";

          }
          echo "<form method='post'>";
          echo "<td><input type='submit' name='".$row['id']."' value='delete'></td>";
          echo "<td><input type='submit' name='".$row['id']."' value='update'></td>";
          echo "</form>";
        }
        
          echo"</tr>
          </table>
          </div>";

          
          }


         if($_SERVER["REQUEST_METHOD"] == "POST") 
         { while($row1=$result->fetch_assoc());

         // foreach ($row1 as $key => $value)
          {
            if(isset($_POST['$key']))
            {
              $query1="DELETE FROM `users` WHERE `id`='$key'";
            
              if($conn->query($query1)==TRUE)
                echo "deleted successfully";
              else
                echo "error";
          }

         }
       }

      
  }
        ?>

        <div class="row">
              <div class="col-mid-12 col-12 container3" >
            <div class="view"><h1 >WORK ON:-</h1></div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
            <tr>
            <td><input type="radio" name="users"  > USERS </td>
            <td><input type="radio" name="topics" >TOPICS</td>
            <td><input type="radio" name="questions" >QUESTIONS</td>
            <td><input type="radio" name="category" >CATEGORY</td>
            </tr>
            </table>
            <input class="button" type="submit" name="submit1"><br>
            </form>
            </div>

        </div>
 <?php
 if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit1']))
 {
  if(isset($_POST['users']))
    header("Location:users.php");
  if(isset($_POST['topics']))
  header("Location:topic.php");
  if(isset($_POST['questions']))
  header("Location:questions.php");
      if(isset($_POST['category']))
        header("Location:category.php");
    }
    ?>
 
     
</body>
</html>