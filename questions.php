<!DOCTYPE html>
<html>
<head>

</head>
<body>
ENTER VALUES:-
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID<input type="text" name="one"><br>
TOPIC ID<input type="text" name="two"><br>
QUESTION<input type="text" name="three"><br>
OPTION 1<input type="text" name="four"><br>
OPTION 2<input type="text" name="five"><br>
OPTION 3<input type="text" name="six"><br>
OPTION 4<input type="text" name="seven"><br>
ANSWER<input type="text" name="eight"><br>
ORIGINAL ID<input type="text" name="nine"><br><br><br><br>
<input type="radio" name="insert">INSERT<br>
<input type="radio" name="update">UPDATE<br>
<input type="radio" name="delete">DELETE<br>
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
$nine=$_POST['nine'];
if(isset($_POST['insert']))
{
$query = "INSERT INTO `questions`(`topic_id`, `question`,`option_1`,`option_2`,`option_3`,`option_4`,`answer`) VALUES ('$two','$three','$four','$five','$six','$seven','$eight')";


	if($conn->query($query)==TRUE)
		echo "INSERTED SUCCESSFULLY";
}
if(isset($_POST['update']))
{
	$query1="UPDATE `questions` SET `id`='$one',`topic_id`='$two',`question`='$three',`option_1`='$four',`option_2`='$five',`option_3`='$six',`option_4`='$seven',`answer`='$eight' WHERE `id`='$nine'";
	if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
if(isset($_POST['delete']))
{
	$query2="DELETE FROM `questions` WHERE `id`='$nine'";
	if($conn->query($query2)==TRUE)
		echo "DELETED SUCCESSFULLY";


}
}
?>
</body>
</html>