<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="adminpart.css">
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
</head>
<body class="background">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="row">
<div class="col-mid-12 value">
<b><h1>ENTER VALUES</h1></b><br><br>
<input placeholder="ID" type="text" name="one" size="80" height="20" class=""><br>
<input placeholder="CATEGORY NAME" type="text" size="80" height="20" name="two" class=""><br>
<input placeholder="ORIGINAL ID" type="text" size="80"  name="three" class=""><br>
</div>
</div>

<div class="row">
<div class="col-mid-12 action">
<table cellspacing="10">
<tr>
<td><input type="radio" name="insert">INSERT<br></td>
<td><input type="radio" name="update">UPDATE<br></td>
<td><input type="radio" name="delete">DELETE<br></td>
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