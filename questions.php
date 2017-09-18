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
<input type="text" name="four"><br>
<input type="text" name="five"><br>
<input type="text" name="six"><br>
<input type="text" name="seven"><br>
<input type="text" name="eight"><br>
<input type="submit" name="submit">
</form>
<?php
require("connection.php");
if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))
{
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
$four=$_POST['four'];
$five=$_POST['five'];
$six=$_POST['six'];
$seven=$_POST['seven'];
$eight=$_POST['eight'];

$query1 = "INSERT INTO `questions`(`id`, `topic_id`,`questions`,`option_1`,`option_2`,`option_3`,`option_4`,`answer`) VALUES ('$one','$two','$three','$four','$five','$six','$seven','$eight')";


	if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
?>
</body>
</html>