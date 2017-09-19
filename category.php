<!DOCTYPE html>
<html>
<head>

</head>
<body>
ENTER VALUES:-
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID<input type="text" name="one"><br>
CATEGORY_NAME<input type="text" name="two"><br>
ORIGINAL ID<input type="text" name="three"><br>
<input type="radio" name="insert">INSERT<br>
<input type="radio" name="update">UPDATE<br>
<input type="radio" name="delete">DELETE<br>
<input type="submit" name="submit"><br>
</form>

<?php
require("connection.php");
if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))
{
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
if(isset($_POST['insert']))
{
$query = "INSERT INTO `categories`( `category_name`) VALUES ('$two')";


	if($conn->query($query)==TRUE)
		echo "INSERTED SUCCESSFULLY";
}
if(isset($_POST['update']))
{
	$query1="UPDATE `categories` SET `id`='$one',`category_name`='$two' WHERE `id`='$three'";
if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
if(isset($_POST['delete']))
{
	$query2="DELETE FROM `categories` WHERE `id`='$three'";
	if($conn->query($query2)==TRUE)
		echo "DELETED SUCCESSFULLY";
}
}

?>
</body>
</html>