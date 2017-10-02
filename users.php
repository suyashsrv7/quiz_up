<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="adminpart.css">
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
</head>

<body class="background">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="row">
<div class="col-mid-12 value"><br><br><br>
<b><h1>ENTER VALUES</h1><br><br></b>
<input placeholder="ID" type="text" size="80" name="one"><br>
<input placeholder="FIRSTNAME" type="text" size="80" name="two"><br>
<input placeholder="LASTNAME" type="text" size="80" name="three"><br>
<input placeholder="SCRNAME" type="text" size="80" name="four"><br>
<input placeholder="PASSWORD" type="text" size="80" name="five"><br>
<input placeholder="IMAGE" type="text" size="80" name="six"><br>
<input placeholder="TYPE" type="text" size="80" name="seven"><br>
<input placeholder="EMAIL" type="text" size="80" name="eight"><br>
<input placeholder="ORIGINAL SCRNAME" type="text" size="80" name="nine"><br><br><br><br>
</div>
</div>

<div class="row">
<div class="col-mid-12 action">
<table cellspacing="10">
<tr>
<td><input type="radio" name="insert">INSERT<br><br></td>
<td><input type="radio" name="update">UPDATE<br><br></td>
<td><input type="radio" name="delete">DELETE<br><br></td>
</tr>
</table>
<input class="submit" type="submit" name="submit"><br>
</div>
</div>

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