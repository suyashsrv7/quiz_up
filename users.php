<!DOCTYPE html>
<html>
<head>

</head>
<body>

ENTER VALUES:-
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID<input type="text" name="one"><br>
FIRSTNAME<input type="text" name="two"><br>
LASTNAME<input type="text" name="three"><br>
SCRNAME<input type="text" name="four"><br>
PASSWORD<input type="text" name="five"><br>
IMAGE<input type="text" name="six"><br>
TYPE<input type="text" name="seven"><br>
EMAIL<input type="text" name="eight"><br>
ORIGINAL SCRNAME<input type="text" name="nine"><br><br><br><br>

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
$four=$_POST['four'];
$five=$_POST['five'];
$six=$_POST['six'];
$seven=$_POST['seven'];
$eight=$_POST['eight'];
$nine=$_POST['nine'];

	if(isset($_POST['insert']))
	{
$query1 = "INSERT INTO `users`( `firstname`,`lastname`,`scrname`,`password`,`image`,`type`,`email`) VALUES ('$two','$three','$four','$five','$six','$seven','$eight')";


	if($conn->query($query1)==TRUE)
		echo "INSERTED SUCCESSFULLY";
	else
		echo "check";
}
if(isset($_POST['update']))
{



$query2 ="UPDATE `users` SET `id`='$one',`firstname`='$two',`lastname`='$three',`scrname`='$four',`password`='$five',`image`='$six',`type`='$seven',`email`='$eight' WHERE `scrname`='$nine'";
if($conn->query($query2)==TRUE)
echo "UPDATED SUCCESSFULLY";
}
if(isset($_POST['delete']))
{
	$query3="DELETE FROM `users` WHERE `scrname`='$nine'";
	if($conn->query($query3)==TRUE)
      echo "DELETED SUCCESSFULLY";
}
}

?>

</body>
</html>