<!DOCTYPE html>
<html>
<head>

</head>
<body>
ENTER VALUES:-
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="one"><br>
<input type="text" name="two"><br>
<input type="text" name="three"><br>
<input type="submit" name="submit">
</form>
<?php
require("connection.php");
if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))
{
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];

$query1 = "INSERT INTO `topics`(`id`, `category_id`,`topic_name`) VALUES ('$one','$two','$three')";


	if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
?>
</body>
</html>